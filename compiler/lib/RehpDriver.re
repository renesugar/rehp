/* Js_of_ocaml compiler
 * http://www.ocsigen.org/js_of_ocaml/
 * Copyright (C) 2010 Jérôme Vouillon
 * Laboratoire PPS - CNRS Université Paris Diderot
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, with linking exception;
 * either version 2.1 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

let debug = Debug.find("main");
let times = Debug.find("times");

open Stdlib;

let tailcall = p => {
  if (debug()) {
    Format.eprintf("Tail-call optimization...@.");
  };
  Tailcall.f(p);
};

let deadcode' = p => {
  if (debug()) {
    Format.eprintf("Dead-code...@.");
  };
  Deadcode.f(p);
};

let deadcode = p => {
  let (r, _) = deadcode'(p);
  r;
};

let inline = p =>
  if (Config.Flag.inline() && Config.Flag.deadcode()) {
    let (p, live_vars) = deadcode'(p);
    if (debug()) {
      Format.eprintf("Inlining...@.");
    };
    Inline.f(p, live_vars);
  } else {
    p;
  };

let specialize_1 = ((p, info)) => {
  if (debug()) {
    Format.eprintf("Specialize...@.");
  };
  Specialize.f(info, p);
};

let specialize_js = ((p, info)) => {
  if (debug()) {
    Format.eprintf("Specialize js...@.");
  };
  Specialize_js.f(info, p);
};

let specialize_js_once = p => {
  if (debug()) {
    Format.eprintf("Specialize js once...@.");
  };
  Specialize_js.f_once(p);
};

let specialize' = ((p, info)) => {
  let p = specialize_1((p, info));
  let p = specialize_js((p, info));
  (p, info);
};

let specialize = p => fst(specialize'(p));

let eval = ((p, info)) =>
  if (Config.Flag.staticeval()) {
    Eval.f(info, p);
  } else {
    p;
  };

let flow = p => {
  if (debug()) {
    Format.eprintf("Data flow...@.");
  };
  Flow.f(p);
};

let flow_simple = p => {
  if (debug()) {
    Format.eprintf("Data flow...@.");
  };
  Flow.f(~skip_param=true, p);
};

let phi = p => {
  if (debug()) {
    Format.eprintf("Variable passing simplification...@.");
  };
  Phisimpl.f(p);
};

let print = p => {
  if (debug()) {
    Code.print_program((_, _) => "", p);
  };
  p;
};

let (>>) = (f, g, x) => g(f(x));

let rec loop = (max, name, round, i, p: 'a): 'a => {
  let p' = round(p);
  if (i >= max || Code.eq(p', p)) {
    p';
  } else {
    if (times()) {
      Format.eprintf("Start Iteration (%s) %d...@.", name, i);
    };
    loop(max, name, round, i + 1, p');
  };
};

let identity = x => x;

/* o1 */

let o1: 'a => 'a =
  /* print >> */
  tailcall
  >> flow_simple  /* flow simple to keep information for furture tailcall opt */
  >> specialize'
  >> eval
  >> inline  /* inlining may reveal new tailcall opt */
  >> deadcode
  >> tailcall
  >> phi
  >> flow
  >> specialize'
  >> eval
  >> inline
  >> deadcode
  /* print >> */
  >> flow
  >> specialize'
  >> eval
  >> inline
  >> deadcode
  >> phi
  >> flow
  >> specialize
  >> identity;

/* o2 */

let o2: 'a => 'a = loop(10, "o1", o1, 1) >> print;

/* o3 */

let round1: 'a => 'a =
  print
  >> tailcall
  >> inline  /* inlining may reveal new tailcall opt */
  >> deadcode
  /* deadcode required before flow simple -> provided by constant */
  >> flow_simple  /* flow simple to keep information for furture tailcall opt */
  >> specialize'
  >> eval
  >> identity;

let round2 = flow >> specialize' >> eval >> deadcode >> o1;

let o3 =
  loop(10, "tailcall+inline", round1, 1)
  >> loop(10, "flow", round2, 1)
  >> print;

let generate = (d, ~accessRuntimeThrough, (p, live_vars)) => {
  if (times()) {
    Format.eprintf("Start Generation...@.");
  };
  Generate.f(p, ~exported_runtime=accessRuntimeThrough, live_vars, d);
};

let git_version = () => "temporarily-disabled-git-version";

let header = (formatter, ~custom_header) => {
  let version = git_version();
  let _gitComment = "// Generated by js_of_ocaml " ++ version ++ "\n";
  let (hd, _indent, _ft) = custom_header;
  Pretty_print.string(formatter, hd ++ "\n");
};

let header_php = (formatter, ~custom_header) => {
  let version = git_version();
  let _gitComment = "// Generated by js_of_ocaml " ++ version ++ "\n";
  let (hd, indent, _ft) = custom_header;
  Pretty_print.string(formatter, hd ++ "\n");
  Pretty_print.space(~indent, formatter);
};

let debug_linker = Debug.find("linker");

let globalObject = Constant.global_object;
let globalVar = Rehp.EVar(Id.ident(globalObject));

let extra_js_files =
  lazy(
    List.fold_left(Constant.extra_js_files, ~init=[], ~f=(acc, file) =>
      try({
        let ss =
          List.fold_left(
            Linker.parse_file(file), ~init=StringSet.empty, ~f=(ss, fragment) =>
            switch (fragment.Linker.provides) {
            | Some((_, name, _, _)) => StringSet.add(name, ss)
            | _ => ss
            }
          );
        [(file, ss), ...acc];
      }) {
      | _ => acc
      }
    )
  );

let report_missing_primitives = missing => {
  let missing =
    List.fold_left(
      Lazy.force(extra_js_files),
      ~init=missing,
      ~f=(missing, (file, pro)) => {
        let d = StringSet.inter(missing, pro);
        if (!StringSet.is_empty(d)) {
          warn("Missing primitives provided by %s:@.", file);
          StringSet.iter(nm => warn("  %s@.", nm), d);
          StringSet.diff(missing, pro);
        } else {
          missing;
        };
      },
    );
  if (!StringSet.is_empty(missing)) {
    warn("Missing primitives:@.");
    StringSet.iter(nm => warn("  %s@.", nm), missing);
  };
};

let gen_missing = (js, missing) => {
  open Rehp;
  let miss =
    StringSet.fold(
      (prim, acc) => {
        let p = Id.ident(prim);
        [
          (
            p,
            Some((
              ECond(
                EBin(
                  NotEqEq,
                  EDot(globalVar, prim),
                  EVar(Id.ident("undefined")),
                ),
                EDot(globalVar, prim),
                EFun((
                  None,
                  [],
                  [
                    (
                      Statement(
                        Expression_statement(
                          ECall(
                            EVar(Id.ident("caml_failwith")),
                            [
                              EBin(
                                Plus,
                                EStr(prim, `Utf8),
                                EStr(" not implemented", `Utf8),
                              ),
                            ],
                            N,
                          ),
                        ),
                      ),
                      N,
                    ),
                  ],
                  N,
                )),
              ),
              Loc.N,
            )),
          ),
          ...acc,
        ];
      },
      missing,
      [],
    );
  if (!StringSet.is_empty(missing)) {
    warn("There are some missing primitives@.");
    warn("Dummy implementations (raising 'Failure' exception) ");
    warn("will be used if they are not available at runtime.@.");
    warn("You can prevent the generation of dummy implementations with ");
    warn("the commandline option '--disable genprim'@.");
    report_missing_primitives(missing);
  };
  [(Statement(Variable_statement(miss)), Loc.N), ...js];
};

/**
 * Prepends `let runtime = global_object.jsoo_runtime`. This also allows the
 * driver to decide how to bring into scope unknown identifiers. In this case,
 * we just assume they're on the runtime.
 */
let placeRuntimeVarAtTop = (~runtimeVarName, idents, rehp) =>
  switch (runtimeVarName) {
  | None => rehp
  | Some(runtimeName) =>
    report_missing_primitives(idents);
    let mainRuntimeVar = (
      Id.V(runtimeName),
      Some((Rehp.EDot(globalVar, "jsoo_runtime"), Loc.N)),
    );
    /* let freeVars = */
    /*   List.fold_left(StringSet.elements(idents), ~init=[], ~f=(soFar, id) => */
    /*     [runtimeVar(runtimeName, id), ...soFar] */
    /*   ); */
    /* let vars = [mainRuntimeVar, ...freeVars]; */
    let vars = [mainRuntimeVar];
    [(Rehp.Statement(Variable_statement(vars)), Loc.N), ...rehp];
  };

let getFree = rehp => {
  let traverse = new Rehp_traverse.free;
  let rehp = traverse#program(rehp);
  let free = traverse#get_free_name;
  (rehp, free);
};

let augmentWithLinkInfoSeparate = (~runtimeAccessesAreThrough, rehp) => {
  let (rehp, free) = getFree(rehp);
  (
    placeRuntimeVarAtTop(
      ~runtimeVarName=runtimeAccessesAreThrough,
      free,
      rehp,
    ),
    None,
  );
};

let augmentWithLinkInfoStandalone =
    (
      ~linkall,
      ~shouldExportRuntime,
      ~objWrapper,
      ~runtimeAccessesAreThrough,
      rehp,
    ) => {
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Linking...@.");
  };
  /*
   * Note: These free vars won't show free vars from the JS->Rehp.  So some of
   * the conversions from Js->Php won't have their proper dependencies linked
   * in. Include these in the exe/runtime header templates instead.
   */
  let (rehp, free) = getFree(rehp);

  /**
   * `Primitive.get_external` include all primitives whether they were observed
   * by the linker or synthesized as "internal primitives" in `Generate`.
   * `Linker.get_provided` is the subset of those that were added by linking.
   */
  /* Because Linker.load_files was already called, Primitive.get_external and
   * Linker.get_provided return the right things at this point, without having
   * to even call anything in Rehp_traverse, and keeping the Js stubs in their
   * original Js form. */
  let prim = Primitive.get_external();
  let prov = Linker.get_provided(); /* Provided by the linking of stubs */

  let all_external = StringSet.union(prim, prov);

  /*
   * Note that the only thing that puts usage of global runtime functions into
   * scope is in generate.ml. Everything in driver.re simply observes which
   * functions are available for linking from the linking process, observes
   * which variables are free, and warns you if generate.ml did not put the
   * variable in scope.
   * This means you cannot perform a transform on a Rehp tree after
   * generate.ml, and make the output consume runtime functions.
   *
   * The standalone mode that includes the runtime is different because it
   *
   * That makes it difficult to do Rehp transforms while pulling in all the
   * runtime. The solution is then to
   */
  let usedExternals = StringSet.inter(free, all_external);

  let linkinfos = Linker.init();
  /* If an identifier isn't present in `used` it won't be linked. */
  let (linkinfos, missing) =
    Linker.resolve_deps(~linkall, linkinfos, usedExternals);

  /* gen_missing may use caml_failwith */
  let (linkinfos, missing) =
    if (!StringSet.is_empty(missing) && Config.Flag.genprim()) {
      let (linkinfos, missing2) =
        Linker.resolve_deps(linkinfos, StringSet.singleton("caml_failwith"));
      (linkinfos, StringSet.union(missing, missing2));
    } else {
      (linkinfos, missing);
    };

  let rehp =
    if (Config.Flag.genprim()) {
      gen_missing(rehp, missing);
    } else {
      rehp;
    };
  if (times()) {
    Format.eprintf("  linking: %a@.", Timer.print, t);
  };
  let rehp =
    if (shouldExportRuntime) {
      open Rehp;
      let all = Linker.all(linkinfos);
      let all =
        List.map(~f=name => (Id.PNI(name), EVar(Id.ident(name))), all);
      [
        (
          Statement(
            Expression_statement(
              EBin(
                Eq,
                EDot(globalVar, "jsoo_runtime"),
                objWrapper(EObj(all)),
              ),
            ),
          ),
          Loc.N,
        ),
        ...rehp,
      ];
    } else {
      rehp;
    };
  (
    placeRuntimeVarAtTop(
      ~runtimeVarName=runtimeAccessesAreThrough,
      missing,
      rehp,
    ),
    Some(linkinfos),
  );
};

/*
 * Check doesn't find everything that was linked in for some reason.
 * Module loaders and static type checkers should do a better job of detecting
 * undefined modules/variables.
 */
let check = (languageProvided, (rehp, linkinfos)) => {
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Checks...@.");
  };

  let traverse = new Rehp_traverse.free;
  let rehp = traverse#program(rehp);
  let free = traverse#get_free_name;

  let prim = Primitive.get_external();
  let prov = Linker.get_provided();

  let all_external = StringSet.union(prim, prov);
  let used = StringSet.inter(free, all_external);
  let missing = StringSet.diff(used, languageProvided);

  let other = StringSet.diff(free, missing);

  let res = VarPrinter.get_reserved();
  let other = StringSet.diff(other, res);
  if (!StringSet.is_empty(missing)) {
    report_missing_primitives(missing);
  };

  let probably_prov = StringSet.inter(other, languageProvided);
  let other = StringSet.diff(other, probably_prov);

  if (!StringSet.is_empty(other) && debug_linker()) {
    warn("Missing variables:@.");
    StringSet.iter(nm => warn("  %s@.", nm), other);
  };

  if (!StringSet.is_empty(probably_prov) && debug_linker()) {
    warn("Variables provided by the browser:@.");
    StringSet.iter(nm => warn("  %s@.", nm), probably_prov);
  };
  if (times()) {
    Format.eprintf("  checks: %a@.", Timer.print, t);
  };
  (rehp, linkinfos);
};

let coloring_js = (languageProvided, (rehp, linkinfos)) => {
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Coloring...@.");
  };
  let traverse = new Rehp_traverse.free;
  let rehp = traverse#program(rehp);
  let free = traverse#get_free_name;
  /*
   * TODO: Add the identifiers from the linker/runtime.
   */
  VarPrinter.add_reserved(StringSet.elements(free));
  VarPrinter.add_reserved(StringSet.elements(languageProvided));
  let rehp = Js_assign.program(rehp);
  if (times()) {
    Format.eprintf("  coloring: %a@.", Timer.print, t);
  };
  (rehp, linkinfos);
};

let coloring_php = (languageProvided, (rehp, linkinfos)) => {
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Coloring...@.");
  };
  let traverse = new Rehp_traverse.free;
  let rehp = traverse#program(rehp);
  let free = traverse#get_free_name;
  VarPrinter.add_reserved(StringSet.elements(free));
  VarPrinter.add_reserved(StringSet.elements(languageProvided));
  let rehp = Js_assign.program(rehp);
  if (times()) {
    Format.eprintf("  coloring: %a@.", Timer.print, t);
  };
  (rehp, linkinfos);
};

let output_js =
    (formatter, ~custom_header, ~source_map=?, (), (rehp, linkinfos)) => {
  let js = Javascript_from_rehp.from_rehp(rehp);
  let jsWithRuntime =
    switch (linkinfos) {
    | None => js
    | Some(linkinfos) =>
      let {Linker.runtime_code, always_required_codes} =
        Linker.link(linkinfos);
      List.flatten(
        List.rev([
          js,
          runtime_code,
          ...List.map(~f=ar => ar.Linker.program, always_required_codes),
        ]),
      );
    };
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Writing file...@.");
  };
  header(~custom_header, formatter);
  Js_output_impl.program(
    formatter,
    ~custom_header,
    ~source_map?,
    jsWithRuntime,
  );
  if (times()) {
    Format.eprintf("  write: %a@.", Timer.print, t);
  };
};

let output_php =
    (
      languageProvided,
      formatter,
      ~custom_header,
      ~source_map=?,
      (),
      (rehp, linkinfos),
    ) => {
  let addOneStr = (env, name) => Php_from_rehp.addOne(env, Id.ident(name));

  /* let missing = StringSet.diff(used, languageProvided); */

  /* let other = StringSet.diff(free, missing); */

  let initialEnv =
    List.fold_left(
      ~f=addOneStr,
      ~init=Php_from_rehp.empty,
      StringSet.elements(languageProvided),
    );
  let (runtimePhp, env) =
    switch (linkinfos) {
    | None => (
        [],
        Php_from_rehp.{vars: initialEnv, label: Php_from_rehp.NoLabel},
      )
    | Some(linkinfos) =>
      let envWithRuntimeVars =
        List.fold_left(
          ~f=addOneStr,
          ~init=initialEnv,
          Linker.all(linkinfos),
        );
      let {Linker.runtime_code, always_required_codes} =
        Linker.link(linkinfos);
      let initialEnv =
        Php_from_rehp.{vars: initialEnv, label: Php_from_rehp.NoLabel};
      let (_, mapped) =
        [
          runtime_code,
          ...List.map(~f=ar => ar.Linker.program, always_required_codes),
        ]
        |> List.rev
        |> List.map(~f=js => Rehp_from_javascript.raws_from_javascript(js))
        |> List.flatten
        /* Render the stubs with an env that includes themselves because we
         * know they'll be placed in the correct topological sort (mostly). */
        |> Php_from_rehp.(program(initialEnv));
      (
        mapped,
        Php_from_rehp.{
          vars: envWithRuntimeVars,
          label: Php_from_rehp.NoLabel,
        },
      );
    };

  let (_, php) = Php_from_rehp.(program(env, rehp));
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Writing file (Php)...@.");
  };
  let allPhp = List.concat([runtimePhp, php]);
  header_php(~custom_header, formatter);
  Php_output.program(formatter, ~custom_header, ~source_map?, allPhp);
  if (times()) {
    Format.eprintf("  write: %a@.", Timer.print, t);
  };
};

let pack = rehp => {
  /* pre pack optim */
  let rehp =
    if (Config.Flag.share_constant()) {
      let t1 = Timer.make();
      let rehp = (new Rehp_traverse.share_constant)#program(rehp);
      if (times()) {
        Format.eprintf("    share constant: %a@.", Timer.print, t1);
      };
      rehp;
    } else {
      rehp;
    };
  if (Config.Flag.compact_vardecl()) {
    let t2 = Timer.make();
    let rehp = (new Rehp_traverse.compact_vardecl)#program(rehp);
    if (times()) {
      Format.eprintf("    compact var decl: %a@.", Timer.print, t2);
    };
    rehp;
  } else {
    rehp;
  };
};

let post_pack_optimizations = js => {
  /* post pack optim */
  let t3 = Timer.make();
  /**
   * The [simpl] and [clean] phases don't need to run on the JS stubs because
   * they don't do any non-local optimizations and you could have written those
   * optimizations by hand in the JS stubs if they were really that important.
   */
  let js = (new Rehp_traverse.simpl)#program(js);
  if (times()) {
    Format.eprintf("    simpl: %a@.", Timer.print, t3);
  };
  let t4 = Timer.make();
  let js = (new Rehp_traverse.clean)#program(js);
  if (times()) {
    Format.eprintf("    clean: %a@.", Timer.print, t4);
  };
  if (Config.Flag.shortvar()) {
    let t5 = Timer.make();
    let keep = StringSet.empty;
    let js = (new Rehp_traverse.rename_variable)(keep)#program(js);
    if (times()) {
      Format.eprintf("    shortten vars: %a@.", Timer.print, t5);
    };
    js;
  } else {
    js;
  };
};

let pack_js = rehp => {
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Optimizing rehp...@.");
  };
  let rehp = pack(rehp);

  let rehp = post_pack_optimizations(rehp);
  if (times()) {
    Format.eprintf("  optimizing: %a@.", Timer.print, t);
  };
  rehp;
};

let pack_php = rehp => {
  let t = Timer.make();
  if (times()) {
    Format.eprintf("Start Optimizing rehp...@.");
  };
  let rehp = pack(rehp);
  let rehp = post_pack_optimizations(rehp);
  if (times()) {
    Format.eprintf("  optimizing: %a@.", Timer.print, t);
  };
  rehp;
};

let configure = (formatter, p) => {
  let pretty = Config.Flag.pretty();
  Pretty_print.set_compact(formatter, !pretty);
  Code.Var.set_pretty(pretty && !Config.Flag.shortvar());
  Code.Var.set_stable(Config.Flag.stable_var());
  p;
};

type profile = Code.program => Code.program;

let f =
    (
      ~standalone=true,
      ~profile=o1,
      /* Actually is dynlink | runtime-only */
      ~dynlink=false,
      ~backend=Backend.Js,
      ~linkall=false,
      ~source_map=?,
      ~custom_header,
      formatter,
      d,
    ) => {
  let shouldExportRuntime = dynlink;
  /* You either export a runtime or consume an exported runtime. */
  let usesExternalRuntime = !standalone;
  let accessRuntimeThrough =
    if (usesExternalRuntime) {
      Some(Code.Var.fresh_n("runtime"));
    } else {
      None;
    };
  let linkall = linkall || dynlink;
  let (objWrapper, packer, coloring, check, outputter) =
    switch (backend) {
    | Php => (
        (obj => Rehp.ECall(EVar(Id.ident("ObjectLiteral")), [obj], N)),
        pack_php,
        coloring_php(Reserved.provided_php),
        check(Reserved.provided_php),
        output_php(Reserved.provided_php),
      )
    | Js => (
        (_o => _o),
        pack_js,
        coloring_js(Reserved.provided_js),
        check(Reserved.provided_js),
        output_js,
      )
    };

  let augmentWithLinkInfo =
    standalone
      ? augmentWithLinkInfoStandalone(
          ~linkall,
          ~shouldExportRuntime,
          ~objWrapper,
        )
      : augmentWithLinkInfoSeparate;

  configure(formatter)
  >> specialize_js_once
  >> profile
  >> print
  >> Generate_closure.f
  >> print
  >> deadcode'
  >> generate(d, ~accessRuntimeThrough, ~backend)
  /* Performs some high level operations/simplifications */
  >> packer
  /* All the linked stubs have already been registered before Driver.f even
   * begins. Their arities have been recorded, and their contents have been
   * maintained in a list. Now we need to use that information to detect what
   * is in scope, in order to pull in required dependencies for them. */
  >> augmentWithLinkInfo(~runtimeAccessesAreThrough=accessRuntimeThrough)
  /* Assign names to compiler generated variables. */
  >> coloring
  >> check
  /* Print the transformed target langauge and include any linked stubs  */
  >> outputter(formatter, ~custom_header, ~source_map?, ());
};

let profiles = [(1, o1), (2, o2), (3, o3)];
let profile = i =>
  try(Some(List.assoc(i, profiles))) {
  | Not_found => None
  };

let backends = Backend.[(to_string(Js), Js), (to_string(Php), Php)];
