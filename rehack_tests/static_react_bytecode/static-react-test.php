<?hh

/**
 * Main executable compiled output. Runtime included in compilation output.
 */
namespace Rehack;

function main() {
  $joo_global_object = \Rehack\GlobalObject::get();

  $Object = $joo_global_object->Object;
  $Func = $joo_global_object->Func;
  $ObjectLiteral = $joo_global_object->ObjectLiteral;
  $ArrayLiteral = $joo_global_object->ArrayLiteral;
  $Array = $joo_global_object->Array;
  $RegExp = $joo_global_object->RegExp;
  $String = $joo_global_object->String;
  $Math = $joo_global_object->Math;
  $plus = $joo_global_object->plus;
  $eqEq = $joo_global_object->eqEq;
  $eqEqEq = $joo_global_object->eqEqEq;
  $typeof = $joo_global_object->typeof;
  $Date = $joo_global_object->Date;
  $Boolean = $joo_global_object->Boolean;
  $Number = $joo_global_object->Number;
  $unsigned_right_shift_32 = $joo_global_object->unsigned_right_shift_32;
  $left_shift_32 = $joo_global_object->left_shift_32;
  $right_shift_32 = $joo_global_object->right_shift_32;
  $max_int = $joo_global_object->max_int;
  $min_int = $joo_global_object->min_int;
  $NaN = $joo_global_object->NaN;
  $Infinity = $joo_global_object->Infinity;
  $require = $joo_global_object->require;
  $module = $joo_global_object->module;

  

  
  
$ArrayLiteral=$joo_global_object->ArrayLiteral;
  
  
  
  
$Func=$joo_global_object->Func;
  
  
  
  
    $caml_alloc_dummy_function = $Func(
      function($size, $arity) use (
        $ArrayLiteral,
        $Func,
        $joo_global_object
      ) {
        print("WARNING: caml_alloc_dummy_function is not yet tested");
        $f = new Ref();
        $f->contents = $Func(
          function() use ($ArrayLiteral, $f, $joo_global_object) {
            return $f->contents
              ->fun
              ->apply(
                $joo_global_object->context,
                $ArrayLiteral(\func_get_args())
              );
          }
        );
        $f->contents->length = $arity;
        return $f->contents;
      }
    );
  
  
  
  
$caml_arity_test = function($f) {
  $php_f = ($f instanceof Func) ? $f->fun : $f;
  if (is_object($php_f) && ($php_f instanceof \Closure)) {
    return (new \ReflectionFunction($php_f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
};
  
  
  $raw_array_sub = $Func(
    function($a, $i, $l) use ($Array,$plus) {
      $b = $Array->new($l);
      for ($j = 0;$j < $l;$j++) $b[$j] = $a[$plus($i, $j)];
      return $b;
    }
  );
  $caml_subarray_to_string = $Func(
    function($a, $i, $len) use ($Math,$String,$eqEq,$plus,$raw_array_sub) {
      $f = $String->fromCharCode;
      if ($i == 0 && $len <= 4096 && $eqEq($len, $a->length)) {return $f->apply(varray[], $a);}
      $s = $String->new("");
      for (;0 < $len;($i += 1024) || true ? $len -= 1024 : ($len -= 1024)) $s =
        $plus(
          $s,
          $f->apply(varray[], $raw_array_sub($a, $i, $Math->min($len, 1024)))
        );
      return $s;
    }
  );
  $caml_convert_string_to_array = $Func(
    function($s) use ($Array,$joo_global_object) {
      if ($joo_global_object->Uint8Array) {
        $a = $joo_global_object->Uint8Array->new($s->l);
      }
      else {$a = $Array->new($s->l);}
      $b = $s->c;$l = $b->length;$i = 0;
      for (;$i < $l;$i++) $a[$i] = $b->charCodeAt($i);
      for ($l = $s->l;$i < $l;$i++) $a[$i] = 0;
      $s->c = $a;
      $s->t = 4;
      return $a;
    }
  );
  $caml_blit_bytes = $Func(
    function($s1, $i1, $s2, $i2, $len) use ($Math,$caml_convert_string_to_array,$caml_subarray_to_string,$eqEq,$plus) {
      if ($len == 0) {return 0;}
      if (
        $i2 == 0 &&
          ($len >= $s2->l || $s2->t == 2 && $len >= $s2->c->length)
      ) {
        $s2->c =
          $s1->t == 4
            ? $caml_subarray_to_string($s1->c, $i1, $len)
            : ($i1 == 0 && $eqEq($s1->c->length, $len)
             ? $s1->c
             : ($s1->c->substr($i1, $len)));
        $s2->t = $eqEq($s2->c->length, $s2->l) ? 0 : (2);
      }
      else {
        if ($s2->t == 2 && $eqEq($i2, $s2->c->length)) {
          $s2->c =
            $plus(
              $s2->c,
              $s1->t == 4
                ? $caml_subarray_to_string($s1->c, $i1, $len)
                : ($i1 == 0 && $eqEq($s1->c->length, $len)
                 ? $s1->c
                 : ($s1->c->substr($i1, $len)))
            );
          $s2->t = $eqEq($s2->c->length, $s2->l) ? 0 : (2);
        }
        else {
          if ($s2->t != 4) {$caml_convert_string_to_array($s2);}
          $c1 = $s1->c;$c2 = $s2->c;
          if ($s1->t == 4) {
            if ($i2 <= $i1) {
              for ($i = 0;$i < $len;$i++) $c2[$plus($i2, $i)] =
                $c1[$plus($i1, $i)];
            }
            else {
              for ($i = $len - 1;$i >= 0;$i--) $c2[$plus($i2, $i)] =
                $c1[$plus($i1, $i)];
            }
          }
          else {
            $l = $Math->min($len, $c1->length - $i1);
            for ($i = 0;$i < $l;$i++) $c2[$plus($i2, $i)] =
              $c1->charCodeAt($plus($i1, $i));
            for (;$i < $len;$i++) $c2[$plus($i2, $i)] = 0;
          }
        }
      }
      return 0;
    }
  );
  $caml_blit_string = $Func(
    function($s1, $i1, $s2, $i2, $len) use ($caml_blit_bytes) {
      return $caml_blit_bytes($s1, $i1, $s2, $i2, $len);
    }
  );
  $caml_bytes_unsafe_get = $Func(
    function($s, $i) {
      switch($s->t & 6) {
        // FALLTHROUGH
        default:
          if ($i >= $s->c->length) {return 0;}
        // FALLTHROUGH
        case 0:
          return $s->c->charCodeAt($i) | 0;
        // FALLTHROUGH
        case 4:
          return $s->c[$i];
        }
    }
  );
  $caml_bytes_unsafe_set = $Func(
    function($s, $i, $c) use ($String,$caml_convert_string_to_array,$eqEq,$plus) {
      $c &= 255;
      if ($s->t != 4) {
        if ($eqEq($i, $s->c->length)) {
          $s->c = $plus($s->c, $String->fromCharCode($c));
          if ($eqEq($i + 1, $s->l)) {$s->t = 0;}
          return 0;
        }
        $caml_convert_string_to_array($s);
      }
      $s->c[$i] = $c;
      return 0;
    }
  );
  $raw_array_append_one = $Func(
    function($a, $x) use ($Array) {
      $l = $a->length;
      $b = $Array->new($l + 1);
      $i = 0;
      for (;$i < $l;$i++) $b[$i] = $a[$i];
      $b[$i] = $x;
      return $b;
    }
  );
  
  
  
  $caml_call_gen = new Ref();
  $caml_call_gen->contents =
    function($f, $args) use ($Func,$caml_arity_test,$caml_call_gen,$raw_array_append_one,$raw_array_sub) {
      if (instance_of($f, $Func)) {
        return $caml_call_gen->contents($f->fun, $args);
      }
      $n = $caml_arity_test($f);
      $argsLen = $args->length;
      $d = $n - $argsLen;
      if ($d === 0) {
        return \call_user_func_array($f, $args->__toPhpArray());
      } else {
        if ($d < 0) {
          return $caml_call_gen->contents(
            \call_user_func_array($f, $raw_array_sub($args, 0, $n)->__toPhpArray()),
            $raw_array_sub($args, $n, $argsLen - $n)
          );
        } else {
          return function($x) use ($args,$caml_call_gen,$f,$raw_array_append_one) {
            return $caml_call_gen->contents(
              $f,
              $raw_array_append_one($args, $x)
            );
          };
        }
      }
    };
  $caml_call_gen=$caml_call_gen->contents;
  
  
  
  
$String = $joo_global_object->String;
  
  
  $caml_named_values = $ObjectLiteral((object)darray[]);
  $caml_named_value = $Func(
    function($nm) use ($caml_named_values) {return $caml_named_values[$nm];}
  );
  $caml_global_data = varray[0];
  
  
  
$caml_wrap_thrown_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return new RehpExceptionBox($e);
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.

  // Wrap Error in Js.Error exception
  if($e instanceof \Exception) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return new RehpExceptionBox(R(0, $String->new("phpError"), $e), $e->getCode(), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return new RehpExceptionBox(R(0, $caml_global_data->Failure, $e));
};
  
  
  $caml_raise_with_arg = $Func(
    function($tag, $arg) use ($caml_wrap_thrown_exception) {
      throw $caml_wrap_thrown_exception(varray[0,$tag,$arg]);
    }
  );
  $caml_str_repeat = $Func(
    function($n, $s) use ($String,$plus,$right_shift_32) {
      if ($s->repeat) {return $s->repeat($n);}
      $r = $String->new("");$l = 0;
      if ($n == 0) {return $r;}
      for (;;) {
        if ($n & 1) {$r = $plus($r, $s);}
        $n = $right_shift_32($n, 1);
        if ($n == 0) {return $r;}
        $s = $plus($s, $s);
        $l++;
        if ($l == 9) {$s->slice(0, 1);}
      }
    }
  );
  $caml_convert_string_to_bytes = $Func(
    function($s) use ($String,$caml_str_repeat,$caml_subarray_to_string,$plus) {
      if ($s->t == 2) {
        $s->c =
          $plus(
            $s->c,
            $caml_str_repeat($s->l - $s->c->length, $String->new("\0"))
          );
      }
      else {$s->c = $caml_subarray_to_string($s->c, 0, $s->c->length);}
      $s->t = 0;
    }
  );
  $caml_is_ascii = $Func(
    function($s) use ($RegExp,$String) {
      if ($s->length < 24) {
        for ($i = 0;$i < $s->length;$i++) if ($s->charCodeAt($i) > 127) {return false;}
        return true;
      }
      else {return ! $RegExp->new($String->new("[^\\x00-\\x7f]"))->test($s);}
    }
  );
  $caml_utf16_of_utf8 = $Func(
    function($s) use ($String,$eqEq,$left_shift_32,$plus,$right_shift_32) {
      for (
        $b = $String->new(""),
        $t = $String->new(""),
        $c,
        $c1,
        $c2,
        $v,
        $i = 0,
        $l = $s->length;
        $i < $l;
        $i++
      ) {
        $c1 = $s->charCodeAt($i);
        if ($c1 < 128) {
          for ($j = $i + 1;$j < $l && ($c1 = $s->charCodeAt($j)) < 128;$j++) ;
          if ($j - $i > 512) {
            $t->substr(0, 1);
            $b = $plus($b, $t);
            $t = $String->new("");
            $b = $plus($b, $s->slice($i, $j));
          }
          else {$t = $plus($t, $s->slice($i, $j));}
          if ($eqEq($j, $l)) {break;}
          $i = $j;
        }
        $v = 1;
        if (++$i < $l && (($c2 = $s->charCodeAt($i)) & - 64) == 128) {
          $c = $c2 + $left_shift_32($c1, 6);
          if ($c1 < 224) {
            $v = $c - 12416;
            if ($v < 128) {$v = 1;}
          }
          else {
            $v = 2;
            if (++$i < $l && (($c2 = $s->charCodeAt($i)) & - 64) == 128) {
              $c = $c2 + $left_shift_32($c, 6);
              if ($c1 < 240) {
                $v = $c - 925824;
                if ($v < 2048 || $v >= 55295 && $v < 57344) {$v = 2;}
              }
              else {
                $v = 3;
                if (
                  ++$i < $l &&
                    (($c2 = $s->charCodeAt($i)) & - 64) == 128 &&
                    $c1 < 245
                ) {
                  $v = $c2 - 63447168 + $left_shift_32($c, 6);
                  if ($v < 65536 || $v > 1114111) {$v = 3;}
                }
              }
            }
          }
        }
        if ($v < 4) {
          $i -= $v;
          $t = $plus($t, $String->new("\ufffd"));
        }
        else {
          if ($v > 65535) {
            $t =
              $plus(
                $t,
                $String->fromCharCode(
                  55232 + $right_shift_32($v, 10),
                  56320 + ($v & 1023)
                )
              );
          }
          else {$t = $plus($t, $String->fromCharCode($v));}
        }
        if ($t->length > 1024) {
          $t->substr(0, 1);
          $b = $plus($b, $t);
          $t = $String->new("");
        }
      }
      return $plus($b, $t);
    }
  );
  $caml_to_js_string = $Func(
    function($s) use ($caml_convert_string_to_bytes,$caml_is_ascii) {
      switch($s->t) {
        // FALLTHROUGH
        case 9:
          return $s->c;
        // FALLTHROUGH
        default:
          $caml_convert_string_to_bytes($s);
        // FALLTHROUGH
        case 0:
          if ($caml_is_ascii($s->c)) {$s->t = 9;return $s->c;}
          $s->t = 8;
        // FALLTHROUGH
        case 8:
          return $s->c;
        }
    }
  );
  $MlBytes = $Func(
    function($tag, $contents, $length) use ($joo_global_object) {
      $joo_global_object->context->t = $tag;
      $joo_global_object->context->c = $contents;
      $joo_global_object->context->l = $length;
    }
  );
  
  $MlBytes->prototype->toString =
    $Func(
      function() use ($caml_to_js_string,$joo_global_object) {
        return $caml_to_js_string($joo_global_object->context);
      }
    );
  
  $MlBytes->prototype->slice =
    $Func(
      function() use ($MlBytes,$joo_global_object) {
        $content = $joo_global_object->context->t == 4
          ? $joo_global_object->context->c->slice()
          : ($joo_global_object->context->c);
        return $MlBytes->new(
          $joo_global_object->context->t,
          $content,
          $joo_global_object->context->l
        );
      }
    );
  
  $caml_new_string_impl = $Func(
    function($s) use ($MlBytes) {return $MlBytes->new(0, $s, $s->length);}
  );
  $caml_new_string = $Func(
    function($s) use ($String,$caml_new_string_impl) {
      if (! instance_of($s, $String)) {
        return $caml_new_string_impl($String->new($s));
      }
      return $caml_new_string_impl($s);
    }
  );
  $caml_raise_with_string = $Func(
    function($tag, $msg) use ($caml_new_string,$caml_raise_with_arg) {
      $caml_raise_with_arg($tag, $caml_new_string($msg));
    }
  );
  $caml_invalid_argument = $Func(
    function($msg) use ($caml_global_data,$caml_raise_with_string) {
      $caml_raise_with_string($caml_global_data->Invalid_argument, $msg);
    }
  );
  $caml_array_bound_error = $Func(
    function() use ($String,$caml_invalid_argument) {
      $caml_invalid_argument($String->new("index out of bounds"));
    }
  );
  $caml_check_bound = $Func(
    function($array, $index) use ($caml_array_bound_error,$unsigned_right_shift_32) {
      if ($unsigned_right_shift_32($index, 0) >= $array->length - 1) {$caml_array_bound_error();}
      return $array;
    }
  );
  $caml_create_bytes = $Func(
    function($len) use ($MlBytes,$String,$caml_invalid_argument) {
      if ($len < 0) {$caml_invalid_argument($String->new("Bytes.create"));}
      return $MlBytes->new($len ? 2 : (9), $String->new(""), $len);
    }
  );
  $caml_int64_compare = $Func(
    function($x, $y) use ($left_shift_32) {
      $x3 = $left_shift_32($x[3], 16);
      $y3 = $left_shift_32($y[3], 16);
      if ($x3 > $y3) {return 1;}
      if ($x3 < $y3) {return - 1;}
      if ($x[2] > $y[2]) {return 1;}
      if ($x[2] < $y[2]) {return - 1;}
      if ($x[1] > $y[1]) {return 1;}
      if ($x[1] < $y[1]) {return - 1;}
      return 0;
    }
  );
  $caml_int_compare = $Func(
    function($a, $b) use ($eqEq) {
      if ($a < $b) {return - 1;}
      if ($eqEq($a, $b)) {return 0;}
      return 1;
    }
  );
  $caml_string_compare = $Func(
    function($s1, $s2) use ($caml_convert_string_to_bytes) {
      $s1->t & 6 && $caml_convert_string_to_bytes($s1);
      $s2->t & 6 && $caml_convert_string_to_bytes($s2);
      return $s1->c < $s2->c ? - 1 : ($s1->c > $s2->c ? 1 : (0));
    }
  );
  
  
  
  $NaN=\NAN;
  
  
  
  
  $is_in = function($key, $val) {
   return isset($val[$key]);
  };
  
  
  $caml_compare_val = $Func(
    function($a, $b, $total) use ($Array,$MlBytes,$NaN,$String,$caml_int64_compare,$caml_int_compare,$caml_invalid_argument,$caml_string_compare,$eqEq,$eqEqEq,$is_in,$typeof) {
      $stack = varray[];
      for (;;) {
        if (! ($total && $eqEqEq($a, $b))) {
          if (instance_of($a, $MlBytes)) {
            if (instance_of($b, $MlBytes)) {
              if (! $eqEqEq($a, $b)) {
                $x = $caml_string_compare($a, $b);
                if ($x != 0) {return $x;}
              }
            }
            else {return 1;}
          }
          else {
            if (instance_of($a, $Array) && $eqEqEq($a[0], $a[0] | 0)) {
              $ta = $a[0];
              if ($ta === 254) {$ta = 0;}
              if ($ta === 250) {
                $a = $a[1];
                continue;
              }
              else {
                if (instance_of($b, $Array) && $eqEqEq($b[0], $b[0] | 0)) {
                  $tb = $b[0];
                  if ($tb === 254) {$tb = 0;}
                  if ($tb === 250) {
                    $b = $b[1];
                    continue;
                  }
                  else {
                    if (! $eqEq($ta, $tb)) {
                      return $ta < $tb ? - 1 : (1);
                    }
                    else {
                      switch($ta) {
                        // FALLTHROUGH
                        case 248:
                          {
                            $x = $caml_int_compare($a[2], $b[2]);
                            if ($x != 0) {return $x;}
                            break;
                          }
                        // FALLTHROUGH
                        case 251:
                          {
                            $caml_invalid_argument($String->new("equal: abstract value")
                            );
                          }
                        // FALLTHROUGH
                        case 255:
                          {
                            $x = $caml_int64_compare($a, $b);
                            if ($x != 0) {return $x;}
                            break;
                          }
                        // FALLTHROUGH
                        default:
                          if (! $eqEq($a->length, $b->length)) {
                            return $a->length < $b->length ? - 1 : (1);
                          }
                          if ($a->length > 1) {$stack->push($a, $b, 1);}
                        }
                    }
                  }
                }
                else {return 1;}
              }
            }
            else {
              if (
                instance_of($b, $MlBytes) ||
                  instance_of($b, $Array) &&
                    $eqEqEq($b[0], $b[0] | 0)
              ) {return - 1;}
              else {
                if (
                  !
                  $eqEq($typeof($a), $String->new("number")) && $a &&
                    $is_in("compare", $a)
                ) {
                  $cmp = $a->compare($b, $total);
                  if ($cmp != 0) {return $cmp;}
                }
                else {
                  if ($eqEq($typeof($a), $String->new("function"))) {
                    $caml_invalid_argument(
                      $String->new("compare: functional value")
                    );
                  }
                  else {
                    if ($a < $b) {return - 1;}
                    if ($a > $b) {return 1;}
                    if (! $eqEq($a, $b)) {
                      if (! $total) {return $NaN;}
                      if ($eqEq($a, $a)) {return 1;}
                      if ($eqEq($b, $b)) {return - 1;}
                    }
                  }
                }
              }
            }
          }
        }
        if ($stack->length == 0) {return 0;}
        $i = $stack->pop();
        $b = $stack->pop();
        $a = $stack->pop();
        if ($i + 1 < $a->length) {$stack->push($a, $b, $i + 1);}
        $a = $a[$i];
        $b = $b[$i];
      }
    }
  );
  $caml_equal = $Func(
    function($x, $y) use ($caml_compare_val) {
      return + ($caml_compare_val($x, $y, false) == 0);
    }
  );
  
  
  
  $isFinite = function($value) {
   $value = to_number($value);
   return !($value === \INF || $value === -\INF || PHP\is_nan($value));
  };
  
  
  $caml_jsbytes_of_string = $Func(
    function($s) use ($caml_convert_string_to_bytes) {
      if (($s->t & 6) != 0) {$caml_convert_string_to_bytes($s);}
      return $s->c;
    }
  );
  $caml_parse_format = $Func(
    function($fmt) use ($ObjectLiteral,$String,$caml_invalid_argument,$caml_jsbytes_of_string) {
      $fmt = $caml_jsbytes_of_string($fmt);
      $len = $fmt->length;
      if ($len > 31) {
        $caml_invalid_argument($String->new("format_int: format too long"));
      }
      $f = $ObjectLiteral(
        (object)darray[
         "justify"=>$String->new("+"),
         "signstyle"=>$String->new("-"),
         "filler"=>$String->new(" "),
         "alternate"=>false,
         "base"=>0,
         "signedconv"=>false,
         "width"=>0,
         "uppercase"=>false,
         "sign"=>1,
         "prec"=>- 1,
         "conv"=>$String->new("f")]
      );
      for ($i = 0;$i < $len;$i++) {
        $c = $fmt->charAt($i);
        switch($c) {
          // FALLTHROUGH
          case $String->new("-"):
            $f->justify = $String->new("-");
            break;
          // FALLTHROUGH
          case $String->new("+"):
          // FALLTHROUGH
          case $String->new(" "):
            $f->signstyle = $c;
            break;
          // FALLTHROUGH
          case $String->new("0"):
            $f->filler = $String->new("0");
            break;
          // FALLTHROUGH
          case $String->new("#"):
            $f->alternate = true;
            break;
          // FALLTHROUGH
          case $String->new("1"):
          // FALLTHROUGH
          case $String->new("2"):
          // FALLTHROUGH
          case $String->new("3"):
          // FALLTHROUGH
          case $String->new("4"):
          // FALLTHROUGH
          case $String->new("5"):
          // FALLTHROUGH
          case $String->new("6"):
          // FALLTHROUGH
          case $String->new("7"):
          // FALLTHROUGH
          case $String->new("8"):
          // FALLTHROUGH
          case $String->new("9"):
            $f->width = 0;
            while
             (($c = $fmt->charCodeAt($i) - 48) || true
                ? $c >= 0 && $c <= 9
                : ($c >= 0 && $c <= 9)) {
               $f->width = $f->width * 10 + $c;
               $i++;
             }
            $i--;
            break;
          // FALLTHROUGH
          case $String->new("."):
            $f->prec = 0;
            $i++;
            while
             (($c = $fmt->charCodeAt($i) - 48) || true
                ? $c >= 0 && $c <= 9
                : ($c >= 0 && $c <= 9)) {
               $f->prec = $f->prec * 10 + $c;
               $i++;
             }
            $i--;
          // FALLTHROUGH
          case $String->new("d"):
          // FALLTHROUGH
          case $String->new("i"):$f->signedconv = true;
          // FALLTHROUGH
          case $String->new("u"):$f->base = 10;break;
          // FALLTHROUGH
          case $String->new("x"):$f->base = 16;break;
          // FALLTHROUGH
          case $String->new("X"):
            $f->base = 16;
            $f->uppercase = true;
            break;
          // FALLTHROUGH
          case $String->new("o"):$f->base = 8;break;
          // FALLTHROUGH
          case $String->new("e"):
          // FALLTHROUGH
          case $String->new("f"):
          // FALLTHROUGH
          case $String->new("g"):
            $f->signedconv = true;
            $f->conv = $c;
            break;
          // FALLTHROUGH
          case $String->new("E"):
          // FALLTHROUGH
          case $String->new("F"):
          // FALLTHROUGH
          case $String->new("G"):
            $f->signedconv = true;
            $f->uppercase = true;
            $f->conv = $c->toLowerCase();
            break;
          }
      }
      return $f;
    }
  );
  $caml_finish_formatting = $Func(
    function($f, $rawbuffer) use ($String,$caml_new_string,$eqEq,$plus) {
      if ($f->uppercase) {$rawbuffer = $rawbuffer->toUpperCase();}
      $len = $rawbuffer->length;
      if (
        $f->signedconv &&
          ($f->sign < 0 || ! $eqEq($f->signstyle, $String->new("-")))
      ) {$len++;}
      if ($f->alternate) {
        if ($f->base == 8) {$len = $plus($len, 1);}
        if ($f->base == 16) {$len = $plus($len, 2);}
      }
      $buffer = $String->new("");
      if (
        $eqEq($f->justify, $String->new("+")) &&
          $eqEq($f->filler, $String->new(" "))
      ) {
        for ($i = $len;$i < $f->width;$i++) $buffer =
          $plus($buffer, $String->new(" "));
      }
      if ($f->signedconv) {
        if ($f->sign < 0) {
          $buffer = $plus($buffer, $String->new("-"));
        }
        else {
          if (! $eqEq($f->signstyle, $String->new("-"))) {$buffer = $plus($buffer, $f->signstyle);}
        }
      }
      if ($f->alternate && $f->base == 8) {
        $buffer = $plus($buffer, $String->new("0"));
      }
      if ($f->alternate && $f->base == 16) {
        $buffer = $plus($buffer, $String->new("0x"));
      }
      if (
        $eqEq($f->justify, $String->new("+")) &&
          $eqEq($f->filler, $String->new("0"))
      ) {
        for ($i = $len;$i < $f->width;$i++) $buffer =
          $plus($buffer, $String->new("0"));
      }
      $buffer = $plus($buffer, $rawbuffer);
      if ($eqEq($f->justify, $String->new("-"))) {
        for ($i = $len;$i < $f->width;$i++) $buffer =
          $plus($buffer, $String->new(" "));
      }
      return $caml_new_string($buffer);
    }
  );
  
  
  
  $isNaN = function($value) {
   return PHP\is_nan(to_number($value));
  };
  
  
  $caml_format_float = $Func(
    function($fmt, $x) use ($Infinity,$String,$caml_finish_formatting,$caml_parse_format,$eqEq,$isFinite,$isNaN,$plus) {
      $s = NULL;$f = $caml_parse_format($fmt);
      $prec = $f->prec < 0 ? 6 : ($f->prec);
      if ($x < 0 || $x == 0 && 1 / $x == - $Infinity) {$f->sign = - 1;$x = - $x;}
      if ($isNaN($x)) {
        $s = $String->new("nan");
        $f->filler = $String->new(" ");
      }
      else {
        if (! $isFinite($x)) {
          $s = $String->new("inf");
          $f->filler = $String->new(" ");
        }
        else {
          switch($f->conv) {
            // FALLTHROUGH
            case $String->new("e"):
              $s = $x->toExponential($prec);
              $i = $s->length;
              if ($eqEq($s->charAt($i - 3), $String->new("e"))) {
                $s =
                  $plus(
                    $plus($s->slice(0, $i - 1), $String->new("0")),
                    $s->slice($i - 1)
                  );
              }
              break;
            // FALLTHROUGH
            case $String->new("f"):
              $s = $x->toFixed($prec);
              break;
            // FALLTHROUGH
            case $String->new("g"):
              $prec = $prec ? $prec : (1);
              $s = $x->toExponential($prec - 1);
              $j = $s->indexOf($String->new("e"));
              $exp = + $s->slice($j + 1);
              if ($exp < - 4 || $x >= 1e+21 || $x->toFixed(0)->length > $prec
              ) {
                $i = $j - 1;
                while($eqEq($s->charAt($i), $String->new("0"))) $i--;
                if ($eqEq($s->charAt($i), $String->new("."))) {$i--;}
                $s = $plus($s->slice(0, $i + 1), $s->slice($j));
                $i = $s->length;
                if ($eqEq($s->charAt($i - 3), $String->new("e"))) {
                  $s =
                    $plus(
                      $plus($s->slice(0, $i - 1), $String->new("0")),
                      $s->slice($i - 1)
                    );
                }
                break;
              }
              else {
                $p = $prec;
                if ($exp < 0) {
                  $p -= $exp + 1;
                  $s = $x->toFixed($p);
                }
                else {
                  while
                   (($s = $x->toFixed($p)) || true
                      ? $s->length > $prec + 1
                      : ($s->length > $prec + 1)) $p--;
                }
                if ($p) {
                  $i = $s->length - 1;
                  while($eqEq($s->charAt($i), $String->new("0"))) $i--;
                  if ($eqEq($s->charAt($i), $String->new("."))) {$i--;}
                  $s = $s->slice(0, $i + 1);
                }
              }
              break;
            }
        }
      }
      return $caml_finish_formatting($f, $s);
    }
  );
  $caml_oo_last_id = 0;
  $caml_fresh_oo_id = $Func(
    function() use ($caml_oo_last_id) {return $caml_oo_last_id++;}
  );
  $caml_string_unsafe_get = $Func(
    function($s, $i) {
      switch($s->t & 6) {
        // FALLTHROUGH
        default:
          if ($i >= $s->c->length) {return 0;}
        // FALLTHROUGH
        case 0:
          return $s->c->charCodeAt($i);
        // FALLTHROUGH
        case 4:
          return $s->c[$i];
        }
    }
  );
  $caml_ml_string_length = $Func(function($s) {return $s->l;});
  $caml_parse_sign_and_base = $Func(
    function($s) use ($caml_ml_string_length,$caml_string_unsafe_get,$plus) {
      $i = 0;$len = $caml_ml_string_length($s);$base = 10;$sign = 1;
      if ($len > 0) {
        switch($caml_string_unsafe_get($s, $i)) {
          // FALLTHROUGH
          case 45:
            $i++;
            $sign = - 1;
            break;
          // FALLTHROUGH
          case 43:
            $i++;
            $sign = 1;
            break;
          }
      }
      if ($i + 1 < $len && $caml_string_unsafe_get($s, $i) == 48) {
        switch($caml_string_unsafe_get($s, $i + 1)) {
          // FALLTHROUGH
          case 120:
          // FALLTHROUGH
          case 88:
            $base = 16;
            $i = $plus($i, 2);
            break;
          // FALLTHROUGH
          case 111:
          // FALLTHROUGH
          case 79:
            $base = 8;
            $i = $plus($i, 2);
            break;
          // FALLTHROUGH
          case 98:
          // FALLTHROUGH
          case 66:
            $base = 2;
            $i = $plus($i, 2);
            break;
          }
      }
      return varray[$i,$sign,$base];
    }
  );
  $caml_parse_digit = $Func(
    function($c) {
      if ($c >= 48 && $c <= 57) {return $c - 48;}
      if ($c >= 65 && $c <= 90) {return $c - 55;}
      if ($c >= 97 && $c <= 122) {return $c - 87;}
      return - 1;
    }
  );
  $caml_failwith = $Func(
    function($msg) use ($caml_global_data,$caml_raise_with_string) {
      $caml_raise_with_string($caml_global_data->Failure, $msg);
    }
  );
  $caml_int_of_string = $Func(
    function($s) use ($String,$caml_failwith,$caml_ml_string_length,$caml_parse_digit,$caml_parse_sign_and_base,$caml_string_unsafe_get,$eqEq,$unsigned_right_shift_32) {
      $r = $caml_parse_sign_and_base($s);
      $i = $r[0];$sign = $r[1];$base = $r[2];
      $len = $caml_ml_string_length($s);
      $threshold = $unsigned_right_shift_32(- 1, 0);
      $c = $i < $len ? $caml_string_unsafe_get($s, $i) : (0);
      $d = $caml_parse_digit($c);
      if ($d < 0 || $d >= $base) {
        $caml_failwith($String->new("int_of_string"));
      }
      $res = $d;
      for ($i++;$i < $len;$i++) {
        $c = $caml_string_unsafe_get($s, $i);
        if ($c == 95) {continue;}
        $d = $caml_parse_digit($c);
        if ($d < 0 || $d >= $base) {break;}
        $res = $base * $res + $d;
        if ($res > $threshold) {
          $caml_failwith($String->new("int_of_string"));
        }
      }
      if (! $eqEq($i, $len)) {$caml_failwith($String->new("int_of_string"));}
      $res = $sign * $res;
      if ($base == 10 && ! $eqEq($res | 0, $res)) {
        $caml_failwith($String->new("int_of_string"));
      }
      return $res | 0;
    }
  );
  $caml_ml_bytes_length = $Func(function($s) {return $s->l;});
  $caml_raise_sys_error = $Func(
    function($msg) use ($caml_global_data,$caml_raise_with_string) {
      $caml_raise_with_string($caml_global_data->Sys_error, $msg);
    }
  );
  $caml_ml_channels = $Array->new();
  $caml_ml_flush = $Func(
    function($chanid) use ($String,$caml_global_data,$caml_ml_channels,$caml_raise_sys_error,$eqEq) {
      $chan = $caml_ml_channels[$chanid];
      if (! $chan->opened) {
        $caml_raise_sys_error($String->new("Cannot flush a closed channel"));
      }
      if (! $chan->buffer || $eqEq($chan->buffer, $String->new(""))) {return 0;}
      if (
        $chan->fd && $caml_global_data->fds[$chan->fd] &&
          $caml_global_data->fds[$chan->fd]->output
      ) {
        $output = $caml_global_data->fds[$chan->fd]->output;
        switch($output->length) {
          // FALLTHROUGH
          case 2:
            $output($chanid, $chan->buffer);
            break;
          // FALLTHROUGH
          default:
            $output($chan->buffer);
          }
        ;
      }
      $chan->buffer = $String->new("");
      return 0;
    }
  );
  
  if ($joo_global_object->process && $joo_global_object->process->cwd) {
    $caml_current_dir = $joo_global_object->process->cwd()->replace(
      $RegExp->new($String->new("\\\\"), $String->new("g")),
      $String->new("/")
    );
  }
  else {$caml_current_dir = $String->new("/static");}
  
  if (! $eqEqEq($caml_current_dir->slice(- 1), $String->new("/"))) {$caml_current_dir = $plus($caml_current_dir, $String->new("/"));
  }
  
  $caml_make_path = $Func(
    function($name) use ($MlBytes,$String,$caml_current_dir,$plus) {
      $name = instance_of($name, $MlBytes) ? $name->toString() : ($name);
      if ($name->charCodeAt(0) != 47) {
        $name = $plus($caml_current_dir, $name);
      }
      $comp = $name->split($String->new("/"));
      $ncomp = varray[];
      for ($i = 0;$i < $comp->length;$i++) {
        switch($comp[$i]) {
          // FALLTHROUGH
          case $String->new(".."):
            if ($ncomp->length > 1) {$ncomp->pop();}
            break;
          // FALLTHROUGH
          case $String->new("."):break;
          // FALLTHROUGH
          case $String->new(""):
            if ($ncomp->length == 0) {$ncomp->push($String->new(""));}
            break;
          // FALLTHROUGH
          default:
            $ncomp->push($comp[$i]);
            break;
          }
      }
      $ncomp->orig = $name;
      return $ncomp;
    }
  );
  $caml_raise_no_such_file = $Func(
    function($name) use ($MlBytes,$String,$caml_raise_sys_error,$plus) {
      $name = instance_of($name, $MlBytes) ? $name->toString() : ($name);
      $caml_raise_sys_error(
        $plus($name, $String->new(": No such file or directory"))
      );
    }
  );
  $caml_string_of_array = $Func(
    function($a) use ($MlBytes) {return $MlBytes->new(4, $a, $a->length);}
  );
  $caml_string_bound_error = $Func(
    function() use ($String,$caml_invalid_argument) {
      $caml_invalid_argument($String->new("index out of bounds"));
    }
  );
  $caml_bytes_get = $Func(
    function($s, $i) use ($caml_bytes_unsafe_get,$caml_string_bound_error,$unsigned_right_shift_32) {
      if ($unsigned_right_shift_32($i, 0) >= $s->l) {$caml_string_bound_error();}
      return $caml_bytes_unsafe_get($s, $i);
    }
  );
  $MlFile = $Func(function() {});
  $MlFakeFile = $Func(
    function($content) use ($joo_global_object) {
      $joo_global_object->context->data = $content;
    }
  );
  
  $MlFakeFile->prototype = $MlFile->new();
  
  $MlFakeFile->prototype->truncate =
    $Func(
      function($len) use ($caml_blit_bytes,$caml_create_bytes,$joo_global_object) {
        $old = $joo_global_object->context->data;
        $joo_global_object->context->data = $caml_create_bytes($len | 0);
        $caml_blit_bytes($old, 0, $joo_global_object->context->data, 0, $len);
      }
    );
  
  $MlFakeFile->prototype->length =
    $Func(
      function() use ($caml_ml_bytes_length,$joo_global_object) {
        return $caml_ml_bytes_length($joo_global_object->context->data);
      }
    );
  
  $MlFakeFile->prototype->write =
    $Func(
      function($offset, $buf, $pos, $len) use ($caml_blit_bytes,$caml_create_bytes,$joo_global_object,$plus) {
        $clen = $joo_global_object->context->length();
        if ($plus($offset, $len) >= $clen) {
          $new_str = $caml_create_bytes($plus($offset, $len));
          $old_data = $joo_global_object->context->data;
          $joo_global_object->context->data = $new_str;
          $caml_blit_bytes(
            $old_data,
            0,
            $joo_global_object->context->data,
            0,
            $clen
          );
        }
        $caml_blit_bytes(
          $buf,
          $pos,
          $joo_global_object->context->data,
          $offset,
          $len
        );
        return 0;
      }
    );
  
  $MlFakeFile->prototype->read =
    $Func(
      function($offset, $buf, $pos, $len) use ($caml_blit_bytes,$joo_global_object) {
        $clen = $joo_global_object->context->length();
        $caml_blit_bytes(
          $joo_global_object->context->data,
          $offset,
          $buf,
          $pos,
          $len
        );
        return 0;
      }
    );
  
  $MlFakeFile->prototype->read_one =
    $Func(
      function($offset) use ($caml_bytes_get,$joo_global_object) {
        return $caml_bytes_get($joo_global_object->context->data, $offset);
      }
    );
  
  $MlFakeFile->prototype->close = $Func(function() {});
  
  $MlFakeFile->prototype->constructor = $MlFakeFile;
  
  $MlFakeDevice = $Func(
    function($root, $f) use ($ObjectLiteral,$joo_global_object) {
      $joo_global_object->context->content = $ObjectLiteral((object)darray[]);
      $joo_global_object->context->root = $root;
      $joo_global_object->context->lookupFun = $f;
    }
  );
  
  $MlFakeDevice->prototype->nm =
    $Func(
      function($name) use ($joo_global_object,$plus) {
        return $plus($joo_global_object->context->root, $name);
      }
    );
  
  $MlFakeDevice->prototype->lookup =
    $Func(
      function($name) use ($MlFakeFile,$caml_new_string,$joo_global_object) {
        if (
          !
          $joo_global_object->context->content[$name] && $joo_global_object->context->lookupFun
        ) {
          $res = $joo_global_object->context->lookupFun(
            $caml_new_string($joo_global_object->context->root),
            $caml_new_string($name)
          );
          if ($res != 0) {
            $joo_global_object->context->content[$name] = $MlFakeFile->new($res[1]);
          }
        }
      }
    );
  
  $MlFakeDevice->prototype->exists =
    $Func(
      function($name) use ($RegExp,$String,$eqEq,$joo_global_object,$plus) {
        if ($eqEq($name, $String->new(""))) {return 1;}
        $name_slash = $plus($name, $String->new("/"));
        $r = $RegExp->new($plus($String->new("^"), $name_slash));
        foreach(
          $joo_global_object->context->content->__all_enumerable_keys()
          as
          
          $n=> $____
        ) {if ($n->match($r)) {return 1;}}
        $joo_global_object->context->lookup($name);
        return $joo_global_object->context->content[$name] ? 1 : (0);
      }
    );
  
  $MlFakeDevice->prototype->readdir =
    $Func(
      function($name) use ($ObjectLiteral,$RegExp,$String,$eqEq,$joo_global_object,$plus) {
        $name_slash = $eqEq($name, $String->new(""))
          ? $String->new("")
          : ($plus($name, $String->new("/")));
        $r = $RegExp->new(
          $plus($plus($String->new("^"), $name_slash), $String->new("([^/]*)")
          )
        );
        $seen = $ObjectLiteral((object)darray[]);
        $a = varray[];
        foreach(
          $joo_global_object->context->content->__all_enumerable_keys()
          as
          
          $n=> $____
        ) {
          $m = $n->match($r);
          if ($m && ! $seen[$m[1]]) {$seen[$m[1]] = true;$a->push($m[1]);}
        }
        return $a;
      }
    );
  
  $MlFakeDevice->prototype->is_dir =
    $Func(
      function($name) use ($RegExp,$String,$eqEq,$joo_global_object,$plus) {
        $name_slash = $eqEq($name, $String->new(""))
          ? $String->new("")
          : ($plus($name, $String->new("/")));
        $r = $RegExp->new(
          $plus($plus($String->new("^"), $name_slash), $String->new("([^/]*)")
          )
        );
        $a = varray[];
        foreach(
          $joo_global_object->context->content->__all_enumerable_keys()
          as
          
          $n=> $____
        ) {$m = $n->match($r);if ($m) {return 1;}}
        return 0;
      }
    );
  
  $MlFakeDevice->prototype->unlink =
    $Func(
      function($name) use ($joo_global_object) {
        $ok = $joo_global_object->context->content[$name] ? true : (false);
        unset($joo_global_object->context->content[$name]);
        return $ok;
      }
    );
  
  $MlFakeDevice->prototype->open =
    $Func(
      function($name, $f) use ($MlFakeFile,$String,$caml_create_bytes,$caml_raise_no_such_file,$caml_raise_sys_error,$joo_global_object,$plus) {
        if ($f->rdonly && $f->wronly) {
          $caml_raise_sys_error(
            $plus(
              $joo_global_object->context->nm($name),
              $String->new(
                " : flags Open_rdonly and Open_wronly are not compatible"
              )
            )
          );
        }
        if ($f->text && $f->binary) {
          $caml_raise_sys_error(
            $plus(
              $joo_global_object->context->nm($name),
              $String->new(
                " : flags Open_text and Open_binary are not compatible"
              )
            )
          );
        }
        $joo_global_object->context->lookup($name);
        if ($joo_global_object->context->content[$name]) {
          if ($joo_global_object->context->is_dir($name)) {
            $caml_raise_sys_error(
              $plus(
                $joo_global_object->context->nm($name),
                $String->new(" : is a directory")
              )
            );
          }
          if ($f->create && $f->excl) {
            $caml_raise_sys_error(
              $plus(
                $joo_global_object->context->nm($name),
                $String->new(" : file already exists")
              )
            );
          }
          $file = $joo_global_object->context->content[$name];
          if ($f->truncate) {$file->truncate();}
          return $file;
        }
        else {
          if ($f->create) {
            $joo_global_object->context->content[$name] = $MlFakeFile->new($caml_create_bytes(0));
            return $joo_global_object->context->content[$name];
          }
          else {
            $caml_raise_no_such_file($joo_global_object->context->nm($name));
          }
        }
      }
    );
  
  $MlFakeDevice->prototype->register =
    $Func(
      function($name, $content) use ($Array,$MlBytes,$MlFakeFile,$String,$caml_new_string,$caml_raise_sys_error,$caml_string_of_array,$joo_global_object,$plus) {
        if ($joo_global_object->context->content[$name]) {
          $caml_raise_sys_error(
            $plus(
              $joo_global_object->context->nm($name),
              $String->new(" : file already exists")
            )
          );
        }
        if (instance_of($content, $MlBytes)) {
          $joo_global_object->context->content[$name] = $MlFakeFile->new($content);
        }
        else {
          if (instance_of($content, $Array)) {
            $joo_global_object->context->content[$name] =
              $MlFakeFile->new($caml_string_of_array($content));
          }
          else {
            if ($content->toString) {
              $mlstring = $caml_new_string($content->toString());
              $joo_global_object->context->content[$name] = $MlFakeFile->new($mlstring);
            }
          }
        }
      }
    );
  
  $MlFakeDevice->prototype->constructor = $MlFakeDevice;
  
  $caml_array_of_string = $Func(
    function($s) use ($caml_convert_string_to_array) {
      if ($s->t != 4) {$caml_convert_string_to_array($s);}
      return $s->c;
    }
  );
  $caml_bytes_set = $Func(
    function($s, $i, $c) use ($caml_bytes_unsafe_set,$caml_string_bound_error,$unsigned_right_shift_32) {
      if ($unsigned_right_shift_32($i, 0) >= $s->l) {$caml_string_bound_error();}
      return $caml_bytes_unsafe_set($s, $i, $c);
    }
  );
  $Buffer = $joo_global_object->Buffer;
  $MlNodeFile = $Func(
    function($fd) use ($String,$joo_global_object,$require) {
      $joo_global_object->context->fs = $require($String->new("fs"));
      $joo_global_object->context->fd = $fd;
    }
  );
  
  $MlNodeFile->prototype = $MlFile->new();
  
  $MlNodeFile->prototype->truncate =
    $Func(
      function($len) use ($joo_global_object) {
        $joo_global_object->context->fs->ftruncateSync(
          $joo_global_object->context->fd,
          $len | 0
        );
      }
    );
  
  $MlNodeFile->prototype->length =
    $Func(
      function() use ($joo_global_object) {
        return $joo_global_object->context->fs->fstatSync(
          $joo_global_object->context->fd
        )->size;
      }
    );
  
  $MlNodeFile->prototype->write =
    $Func(
      function($offset, $buf, $buf_offset, $len) use ($Buffer,$caml_array_of_string,$joo_global_object) {
        $a = $caml_array_of_string($buf);
        if (! instance_of($a, $joo_global_object->Uint8Array)) {$a = $joo_global_object->Uint8Array->new($a);}
        $buffer = $Buffer->from($a);
        $joo_global_object->context->fs->writeSync(
          $joo_global_object->context->fd,
          $buffer,
          $buf_offset,
          $len,
          $offset
        );
        return 0;
      }
    );
  
  $MlNodeFile->prototype->read =
    $Func(
      function($offset, $buf, $buf_offset, $len) use ($Buffer,$caml_array_of_string,$caml_bytes_set,$joo_global_object,$plus) {
        $a = $caml_array_of_string($buf);
        if (! instance_of($a, $joo_global_object->Uint8Array)) {$a = $joo_global_object->Uint8Array->new($a);}
        $buffer = $Buffer->from($a);
        $joo_global_object->context->fs->readSync(
          $joo_global_object->context->fd,
          $buffer,
          $buf_offset,
          $len,
          $offset
        );
        for ($i = 0;$i < $len;$i++) {
          $caml_bytes_set(
            $buf,
            $plus($buf_offset, $i),
            $buffer[$plus($buf_offset, $i)]
          );
        }
        return 0;
      }
    );
  
  $MlNodeFile->prototype->read_one =
    $Func(
      function($offset) use ($Buffer,$joo_global_object) {
        $a = $joo_global_object->Uint8Array->new(1);
        $buffer = $Buffer->from($a);
        $joo_global_object->context->fs->readSync(
          $joo_global_object->context->fd,
          $buffer,
          0,
          1,
          $offset
        );
        return $buffer[0];
      }
    );
  
  $MlNodeFile->prototype->close =
    $Func(
      function() use ($joo_global_object) {
        $joo_global_object->context->fs->closeSync(
          $joo_global_object->context->fd
        );
      }
    );
  
  $MlNodeFile->prototype->constructor = $MlNodeFile;
  
  $MlNodeDevice = $Func(
    function($root) use ($String,$joo_global_object,$require) {
      $joo_global_object->context->fs = $require($String->new("fs"));
      $joo_global_object->context->root = $root;
    }
  );
  
  $MlNodeDevice->prototype->nm =
    $Func(
      function($name) use ($joo_global_object,$plus) {
        return $plus($joo_global_object->context->root, $name);
      }
    );
  
  $MlNodeDevice->prototype->exists =
    $Func(
      function($name) use ($joo_global_object) {
        return $joo_global_object->context->fs->existsSync(
           $joo_global_object->context->nm($name)
         )
          ? 1
          : (0);
      }
    );
  
  $MlNodeDevice->prototype->readdir =
    $Func(
      function($name) use ($joo_global_object) {
        return $joo_global_object->context->fs->readdirSync(
          $joo_global_object->context->nm($name)
        );
      }
    );
  
  $MlNodeDevice->prototype->is_dir =
    $Func(
      function($name) use ($joo_global_object) {
        return $joo_global_object->context->fs->statSync(
           $joo_global_object->context->nm($name)
         )->isDirectory()
          ? 1
          : (0);
      }
    );
  
  $MlNodeDevice->prototype->unlink =
    $Func(
      function($name) use ($joo_global_object) {
        $b = $joo_global_object->context->fs->existsSync(
           $joo_global_object->context->nm($name)
         )
          ? 1
          : (0);
        $joo_global_object->context->fs->unlinkSync(
          $joo_global_object->context->nm($name)
        );
        return $b;
      }
    );
  
  $MlNodeDevice->prototype->open =
    $Func(
      function($name, $f) use ($MlNodeFile,$String,$joo_global_object,$require) {
        $consts = $require($String->new("constants"));
        $res = 0;
        foreach($f->__all_enumerable_keys() as $key=> $____) {
          switch($key) {
            // FALLTHROUGH
            case $String->new("rdonly"):
              $res |= $consts->O_RDONLY;
              break;
            // FALLTHROUGH
            case $String->new("wronly"):
              $res |= $consts->O_WRONLY;
              break;
            // FALLTHROUGH
            case $String->new("append"):
              $res |= $consts->O_WRONLY | $consts->O_APPEND;
              break;
            // FALLTHROUGH
            case $String->new("create"):
              $res |= $consts->O_CREAT;
              break;
            // FALLTHROUGH
            case $String->new("truncate"):
              $res |= $consts->O_TRUNC;
              break;
            // FALLTHROUGH
            case $String->new("excl"):
              $res |= $consts->O_EXCL;
              break;
            // FALLTHROUGH
            case $String->new("binary"):
              $res |= $consts->O_BINARY;
              break;
            // FALLTHROUGH
            case $String->new("text"):
              $res |= $consts->O_TEXT;
              break;
            // FALLTHROUGH
            case $String->new("nonblock"):
              $res |= $consts->O_NONBLOCK;
              break;
            }
        }
        $fd = $joo_global_object->context->fs->openSync(
          $joo_global_object->context->nm($name),
          $res
        );
        return $MlNodeFile->new($fd);
      }
    );
  
  $MlNodeDevice->prototype->rename =
    $Func(
      function($o, $n) use ($joo_global_object) {
        $joo_global_object->context->fs->renameSync(
          $joo_global_object->context->nm($o),
          $joo_global_object->context->nm($n)
        );
      }
    );
  
  $MlNodeDevice->prototype->constructor = $MlNodeDevice;
  
  $caml_root = $caml_current_dir->match(
     $RegExp->new($String->new("[^\\/]*\\/"))
   )[0
   ];
  $fs_node_supported = $Func(
    function() use ($String,$eqEqEq,$joo_global_object,$typeof) {
      return !
      $eqEqEq($typeof($joo_global_object->process), $String->new("undefined")) &&
        !
        $eqEqEq(
          $typeof($joo_global_object->process->versions),
          $String->new("undefined")
        ) &&
        !
        $eqEqEq(
          $typeof($joo_global_object->process->versions->node),
          $String->new("undefined")
        );
    }
  );
  $jsoo_mount_point = varray[];
  
  if ($fs_node_supported()) {
    $jsoo_mount_point->push(
      $ObjectLiteral(
        (object)darray[
         "path"=>$caml_root,
         "device"=>$MlNodeDevice->new($caml_root)]
      )
    );
  }
  else {
    $jsoo_mount_point->push(
      $ObjectLiteral(
        (object)darray[
         "path"=>$caml_root,
         "device"=>$MlFakeDevice->new($caml_root)]
      )
    );
  }
  
  $jsoo_mount_point->push(
    $ObjectLiteral(
      (object)darray[
       "path"=>$plus($caml_root, $String->new("static/")),
       "device"=>
       $MlFakeDevice->new($plus($caml_root, $String->new("static/")))]
    )
  );
  
  $resolve_fs_device = $Func(
    function($name) use ($ObjectLiteral,$String,$caml_make_path,$jsoo_mount_point,$plus) {
      $path = $caml_make_path($name);
      $name = $path->join($String->new("/"));
      $name_slash = $plus($name, $String->new("/"));
      $res = NULL;
      for ($i = 0;$i < $jsoo_mount_point->length;$i++) {
        $m = $jsoo_mount_point[$i];
        if (
          $name_slash->search($m->path) == 0 &&
            (! $res || $res->path->length < $m->path->length)
        ) {
          $res =
            $ObjectLiteral(
              (object)darray[
               "path"=>$m->path,
               "device"=>$m->device,
               "rest"=>$name->substring($m->path->length, $name->length)]
            );
        }
      }
      return $res;
    }
  );
  $caml_std_output = $Func(
    function($chanid, $s) use ($caml_ml_channels,$caml_ml_string_length,$caml_new_string,$plus) {
      $chan = $caml_ml_channels[$chanid];
      $str = $caml_new_string($s);
      $slen = $caml_ml_string_length($str);
      $chan->file->write($chan->offset, $str, 0, $slen);
      $chan->offset = $plus($chan->offset, $slen);
      return 0;
    }
  );
  $js_print_stderr = $Func(
    function($s) use ($joo_global_object) {
      $g = $joo_global_object;
      if ($g->process && $g->process->stdout && $g->process->stdout->write) {$g->process->stderr->write($s);}
      else {
        if ($s->charCodeAt($s->length - 1) == 10) {$s = $s->substr(0, $s->length - 1);}
        $v = $g->console;
        $v && $v->error && $v->error($s);
      }
    }
  );
  $js_print_stdout = $Func(
    function($s) use ($joo_global_object) {
      $g = $joo_global_object;
      if ($g->process && $g->process->stdout && $g->process->stdout->write) {$g->process->stdout->write($s);}
      else {
        if ($s->charCodeAt($s->length - 1) == 10) {$s = $s->substr(0, $s->length - 1);}
        $v = $g->console;
        $v && $v->log && $v->log($s);
      }
    }
  );
  $caml_sys_open_internal = $Func(
    function($idx, $output, $file, $flags) use ($Array,$ObjectLiteral,$caml_global_data) {
      if ($caml_global_data->fds === NULL) {
        $caml_global_data->fds = $Array->new();
      }
      $flags = $flags ? $flags : ($ObjectLiteral((object)darray[]));
      $info = $ObjectLiteral((object)darray[]);
      $info->file = $file;
      $info->offset = $flags->append ? $file->length() : (0);
      $info->flags = $flags;
      $info->output = $output;
      $caml_global_data->fds[$idx] = $info;
      if (
        !
        $caml_global_data->fd_last_idx ||
          $idx > $caml_global_data->fd_last_idx
      ) {$caml_global_data->fd_last_idx = $idx;}
      return $idx;
    }
  );
  $caml_sys_open = $Func(
    function($name, $flags, $_perms) use ($ObjectLiteral,$String,$caml_global_data,$caml_raise_sys_error,$caml_std_output,$caml_sys_open_internal,$plus,$resolve_fs_device) {
      $f = $ObjectLiteral((object)darray[]);
      while($flags) {
         switch($flags[1]) {
           // FALLTHROUGH
           case 0:
             $f->rdonly = 1;
             break;
           // FALLTHROUGH
           case 1:
             $f->wronly = 1;
             break;
           // FALLTHROUGH
           case 2:
             $f->append = 1;
             break;
           // FALLTHROUGH
           case 3:
             $f->create = 1;
             break;
           // FALLTHROUGH
           case 4:
             $f->truncate = 1;
             break;
           // FALLTHROUGH
           case 5:
             $f->excl = 1;
             break;
           // FALLTHROUGH
           case 6:
             $f->binary = 1;
             break;
           // FALLTHROUGH
           case 7:
             $f->text = 1;
             break;
           // FALLTHROUGH
           case 8:
             $f->nonblock = 1;
             break;
           }
         $flags = $flags[2];
       }
      if ($f->rdonly && $f->wronly) {
        $caml_raise_sys_error(
          $plus(
            $name->toString(),
            $String->new(
              " : flags Open_rdonly and Open_wronly are not compatible"
            )
          )
        );
      }
      if ($f->text && $f->binary) {
        $caml_raise_sys_error(
          $plus(
            $name->toString(),
            $String->new(
              " : flags Open_text and Open_binary are not compatible"
            )
          )
        );
      }
      $root = $resolve_fs_device($name);
      $file = $root->device->open($root->rest, $f);
      $idx = $caml_global_data->fd_last_idx
        ? $caml_global_data->fd_last_idx
        : (0);
      return $caml_sys_open_internal($idx + 1, $caml_std_output, $file, $f);
    }
  );
  
  $caml_sys_open_internal(
    0,
    $caml_std_output,
    $MlFakeFile->new($caml_create_bytes(0))
  );
  
  $caml_sys_open_internal(
    1,
    $js_print_stdout,
    $MlFakeFile->new($caml_create_bytes(0))
  );
  
  $caml_sys_open_internal(
    2,
    $js_print_stderr,
    $MlFakeFile->new($caml_create_bytes(0))
  );
  
  $caml_ml_open_descriptor_in = $Func(
    function($fd) use ($ObjectLiteral,$String,$caml_global_data,$caml_ml_channels,$caml_raise_sys_error,$plus) {
      $data = $caml_global_data->fds[$fd];
      if ($data->flags->wronly) {
        $caml_raise_sys_error(
          $plus($plus($String->new("fd "), $fd), $String->new(" is writeonly")
          )
        );
      }
      $channel = $ObjectLiteral(
        (object)darray[
         "file"=>$data->file,
         "offset"=>$data->offset,
         "fd"=>$fd,
         "opened"=>true,
         "out"=>false,
         "refill"=>varray[]]
      );
      $caml_ml_channels[$channel->fd] = $channel;
      return $channel->fd;
    }
  );
  $caml_ml_open_descriptor_out = $Func(
    function($fd) use ($ObjectLiteral,$String,$caml_global_data,$caml_ml_channels,$caml_raise_sys_error,$plus) {
      $data = $caml_global_data->fds[$fd];
      if ($data->flags->rdonly) {
        $caml_raise_sys_error(
          $plus($plus($String->new("fd "), $fd), $String->new(" is readonly"))
        );
      }
      $channel = $ObjectLiteral(
        (object)darray[
         "file"=>$data->file,
         "offset"=>$data->offset,
         "fd"=>$fd,
         "opened"=>true,
         "out"=>true,
         "buffer"=>$String->new("")]
      );
      $caml_ml_channels[$channel->fd] = $channel;
      return $channel->fd;
    }
  );
  $caml_ml_out_channels_list = $Func(
    function() use ($caml_ml_channels) {
      $l = 0;
      for ($c = 0;$c < $caml_ml_channels->length;$c++) {
        if (
          $caml_ml_channels[$c] &&
            $caml_ml_channels[$c]->opened &&
            $caml_ml_channels[$c]->out
        ) {$l = varray[0,$caml_ml_channels[$c]->fd,$l];}
      }
      return $l;
    }
  );
  $caml_ml_output_bytes = $Func(
    function($chanid, $buffer, $offset, $len) use ($String,$caml_blit_bytes,$caml_create_bytes,$caml_jsbytes_of_string,$caml_ml_bytes_length,$caml_ml_channels,$caml_ml_flush,$caml_raise_sys_error,$eqEq,$plus) {
      $chan = $caml_ml_channels[$chanid];
      if (! $chan->opened) {
        $caml_raise_sys_error(
          $String->new("Cannot output to a closed channel")
        );
      }
      $string = NULL;
      if ($offset == 0 && $eqEq($caml_ml_bytes_length($buffer), $len)) {$string = $buffer;}
      else {
        $string = $caml_create_bytes($len);
        $caml_blit_bytes($buffer, $offset, $string, 0, $len);
      }
      $jsstring = $caml_jsbytes_of_string($string);
      $id = $jsstring->lastIndexOf($String->new("\n"));
      if ($id < 0) {
        $chan->buffer = $plus($chan->buffer, $jsstring);
      }
      else {
        $chan->buffer = $plus($chan->buffer, $jsstring->substr(0, $id + 1));
        $caml_ml_flush($chanid);
        $chan->buffer = $plus($chan->buffer, $jsstring->substr($id + 1));
      }
      return 0;
    }
  );
  $caml_ml_output = $Func(
    function($chanid, $buffer, $offset, $len) use ($caml_ml_output_bytes) {
      return $caml_ml_output_bytes($chanid, $buffer, $offset, $len);
    }
  );
  $caml_raise_constant = $Func(
    function($tag) use ($caml_wrap_thrown_exception) {
      throw $caml_wrap_thrown_exception($tag);
    }
  );
  $caml_raise_zero_divide = $Func(
    function() use ($caml_global_data,$caml_raise_constant) {
      $caml_raise_constant($caml_global_data->Division_by_zero);
    }
  );
  $caml_mod = $Func(
    function($x, $y) use ($caml_raise_zero_divide) {
      if ($y == 0) {$caml_raise_zero_divide();}
      return $x % $y;
    }
  );
  $caml_obj_tag = $Func(
    function($x) use ($Array,$MlBytes) {
      return instance_of($x, $Array)
        ? $x[0]
        : (instance_of($x, $MlBytes) ? 252 : (1000));
    }
  );
  $caml_register_global = $Func(
    function($n, $v, $name_opt) use ($caml_global_data,$joo_global_object) {
      if ($name_opt && $joo_global_object->toplevelReloc) {$n = $joo_global_object->toplevelReloc($name_opt);}
      $caml_global_data[$n + 1] = $v;
      if ($name_opt) {$caml_global_data[$name_opt] = $v;}
    }
  );
  $caml_string_get = $Func(
    function($s, $i) use ($caml_string_bound_error,$caml_string_unsafe_get,$unsigned_right_shift_32) {
      if ($unsigned_right_shift_32($i, 0) >= $s->l) {$caml_string_bound_error();}
      return $caml_string_unsafe_get($s, $i);
    }
  );
  $caml_initial_time = $Date->new()->getTime() * 0.001;
  $caml_sys_time = $Func(
    function() use ($Date,$caml_initial_time) {
      return $Date->new()->getTime() * 0.001 - $caml_initial_time;
    }
  );
  
  
  
  $caml_update_dummy = function($x, $y) {
    if(PHP\is_callable($y)) {
      $x->fun = $y;
      return 0;
    }
    if(isset($y->fun)) {
      $x->fun = $y->fun;
      return 0;
    }
    $i = $y->length;
    while ($i--) $x[$i] = $y[$i];
    return 0;
  };
  
  
  
  
$caml_wrap_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e->contents;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return $e;
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.
  // Wrap Error in Js.Error exception
  if($e instanceof \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return R(0, $String->new("phpError"), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return R(0, $caml_global_data->Failure, $e);
};
  
  
  
  
$caml_wrap_thrown_exception_reraise = $caml_wrap_thrown_exception;
  
  
  
  
  $is_int=$joo_global_object->is_int;
  
  
  
  
$unsigned_right_shift_32=$joo_global_object->unsigned_right_shift_32;
  
  
  $append = new Ref();
  $au = new Ref();
  $d = new Ref();
  $extractList = new Ref();
  $flatten = new Ref();
  $indentForDepth = new Ref();
  $initSubtree = new Ref();
  $map = new Ref();
  $printInstanceCollection = new Ref();
  $reconcile = new Ref();
  $reconcileSubtree = new Ref();
  $native_warn = $joo_global_object->native_warn !== NULL
    ? $joo_global_object->native_warn
    : (function() use ($caml_failwith) {
     $caml_failwith("native_warn" . " not implemented");
   });
  $native_log = $joo_global_object->native_log !== NULL
    ? $joo_global_object->native_log
    : (function() use ($caml_failwith) {
     $caml_failwith("native_log" . " not implemented");
   });
  $native_error = $joo_global_object->native_error !== NULL
    ? $joo_global_object->native_error
    : (function() use ($caml_failwith) {
     $caml_failwith("native_error" . " not implemented");
   });
  $native_debug = $joo_global_object->native_debug !== NULL
    ? $joo_global_object->native_debug
    : (function() use ($caml_failwith) {
     $caml_failwith("native_debug" . " not implemented");
   });
  $caml_call1 = function($f, $a0) use ($caml_arity_test,$caml_call_gen) {
    return $caml_arity_test($f) === 1
      ? $f($a0)
      : ($caml_call_gen($f, varray[$a0]));
  };
  $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$caml_call_gen) {
    return $caml_arity_test($f) === 2
      ? $f($a0, $a1)
      : ($caml_call_gen($f, varray[$a0,$a1]));
  };
  $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$caml_call_gen) {
    return $caml_arity_test($f) === 3
      ? $f($a0, $a1, $a2)
      : ($caml_call_gen($f, varray[$a0,$a1,$a2]));
  };
  $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$caml_call_gen) {
    return $caml_arity_test($f) === 4
      ? $f($a0, $a1, $a2, $a3)
      : ($caml_call_gen($f, varray[$a0,$a1,$a2,$a3]));
  };
  $Out_of_memory = Vector{248, $caml_new_string("Out_of_memory"), -1};
  $Sys_error = Vector{248, $caml_new_string("Sys_error"), -2};
  $Failure = Vector{248, $caml_new_string("Failure"), -3};
  $Invalid_argument = Vector{248, $caml_new_string("Invalid_argument"), -4};
  $End_of_file = Vector{248, $caml_new_string("End_of_file"), -5};
  $Division_by_zero = Vector{248, $caml_new_string("Division_by_zero"), -6};
  $Not_found = Vector{248, $caml_new_string("Not_found"), -7};
  $Match_failure = Vector{248, $caml_new_string("Match_failure"), -8};
  $Stack_overflow = Vector{248, $caml_new_string("Stack_overflow"), -9};
  $Sys_blocked_io = Vector{248, $caml_new_string("Sys_blocked_io"), -10};
  $Assert_failure = Vector{248, $caml_new_string("Assert_failure"), -11};
  $Undefined_recursive_module = Vector{
    248,
    $caml_new_string("Undefined_recursive_module"),
    -12
  };
  
  $caml_register_global(
    11,
    $Undefined_recursive_module,
    "Undefined_recursive_module"
  );
  
  $caml_register_global(10, $Assert_failure, "Assert_failure");
  
  $caml_register_global(9, $Sys_blocked_io, "Sys_blocked_io");
  
  $caml_register_global(8, $Stack_overflow, "Stack_overflow");
  
  $caml_register_global(7, $Match_failure, "Match_failure");
  
  $caml_register_global(6, $Not_found, "Not_found");
  
  $caml_register_global(5, $Division_by_zero, "Division_by_zero");
  
  $caml_register_global(4, $End_of_file, "End_of_file");
  
  $caml_register_global(3, $Invalid_argument, "Invalid_argument");
  
  $caml_register_global(2, $Failure, "Failure");
  
  $caml_register_global(1, $Sys_error, "Sys_error");
  
  $caml_register_global(0, $Out_of_memory, "Out_of_memory");
  
  $c = $caml_new_string("%.12g");
  $b = $caml_new_string(".");
  $g = $caml_new_string("String.contains_from / Bytes.contains_from");
  $f = $caml_new_string("");
  $e = $caml_new_string("String.concat");
  $h = $caml_new_string("Random.int");
  $i = Vector{
    0,
    987910699,
    495797812,
    364182224,
    414272206,
    318284740,
    990407751,
    383018966,
    270373319,
    840823159,
    24560019,
    536292337,
    512266505,
    189156120,
    730249596,
    143776328,
    51606627,
    140166561,
    366354223,
    1003410265,
    700563762,
    981890670,
    913149062,
    526082594,
    1021425055,
    784300257,
    667753350,
    630144451,
    949649812,
    48546892,
    415514493,
    258888527,
    511570777,
    89983870,
    283659902,
    308386020,
    242688715,
    482270760,
    865188196,
    1027664170,
    207196989,
    193777847,
    619708188,
    671350186,
    149669678,
    257044018,
    87658204,
    558145612,
    183450813,
    28133145,
    901332182,
    710253903,
    510646120,
    652377910,
    409934019,
    801085050
  };
  $k = Vector{0, 0, 0};
  $m = $caml_new_string("  ");
  $n = $caml_new_string("");
  $o = $caml_new_string("  ");
  $p = $caml_new_string("    ");
  $q = $caml_new_string("      ");
  $r = $caml_new_string("        ");
  $s = $caml_new_string("          ");
  $t = $caml_new_string("            ");
  $u = $caml_new_string("              ");
  $v = $caml_new_string("                ");
  $aj = $caml_new_string("\"");
  $ak = $caml_new_string("\"");
  $ag = $caml_new_string("@max-depth");
  $ae = $caml_new_string("@max-length");
  $ac = $caml_new_string("~unknown");
  $aa = $caml_new_string("~lazy");
  $Y = Vector{0, $caml_new_string("[|"), $caml_new_string("|]")};
  $V = $caml_new_string(")");
  $W = $caml_new_string("closure(");
  $T = Vector{0, $caml_new_string("{"), $caml_new_string("}")};
  $K = $caml_new_string(",\n");
  $E = $caml_new_string("");
  $F = $caml_new_string("]");
  $G = $caml_new_string("\n");
  $H = $caml_new_string(",\n");
  $I = $caml_new_string("\n");
  $J = $caml_new_string("[");
  $P = $caml_new_string(", ");
  $L = $caml_new_string("");
  $M = $caml_new_string("]");
  $N = $caml_new_string(", ");
  $O = $caml_new_string("[");
  $A = $caml_new_string(",\n");
  $w = $caml_new_string("");
  $x = $caml_new_string("\n");
  $y = $caml_new_string(",\n");
  $z = $caml_new_string("\n");
  $D = $caml_new_string(", ");
  $B = $caml_new_string("");
  $C = $caml_new_string(", ");
  $l = Vector{0, 0, 0};
  $ap = $caml_new_string("\n");
  $ao = $caml_new_string("\n");
  $an = $caml_new_string("\n");
  $am = $caml_new_string("\n");
  $aq = $caml_new_string("Length changing sequences aren't supported yet.");
  $ar = $caml_new_string("Empty list cannot be split at ");
  $as = $caml_new_string("");
  $at = $caml_new_string("Impossible");
  $aK = $caml_new_string("");
  $av = $caml_new_string(" ");
  $aw = $caml_new_string("IEmpty");
  $ax = $caml_new_string(")");
  $ay = $caml_new_string(" ");
  $az = $caml_new_string("IOne(");
  $aA = $caml_new_string(")");
  $aB = $caml_new_string("\n");
  $aC = $caml_new_string("\n");
  $aD = $caml_new_string(",");
  $aE = $caml_new_string("\n");
  $aF = $caml_new_string("ITwo(");
  $aG = $caml_new_string(")");
  $aH = $caml_new_string(" ");
  $aI = $caml_new_string(",");
  $aJ = $caml_new_string("IOrderedMap(");
  $aV = $caml_new_string("");
  $aL = $caml_new_string("}");
  $aM = $caml_new_string("\n");
  $aN = $caml_new_string(" ");
  $aO = $caml_new_string("  subtree: ");
  $aP = $caml_new_string(",\n");
  $aS = $caml_new_string("\"");
  $aT = $caml_new_string("\"");
  $aU = $caml_new_string("-");
  $aQ = $caml_new_string("  state: ");
  $aR = $caml_new_string("{\n");
  $aX = $caml_new_string("\n");
  $aY = $caml_new_string("\n\n");
  $aZ = $caml_new_string("\n");
  $a0 = $caml_new_string("<NotRendered>");
  $a1 = $caml_new_string("\n\n");
  $aW = $caml_new_string("\n\n");
  $a2 = $caml_new_string("");
  $a4 = $caml_new_string("deafult");
  $a3 = Vector{0, $caml_new_string("buttonClass")};
  $a6 = $caml_new_string("deafult");
  $a5 = Vector{0, $caml_new_string("childContainer")};
  $a7 = $caml_new_string("size changed times:");
  $a8 = Vector{0, $caml_new_string("ButtonInContainerThatCountsSizeChanges")};
  $a_ = $caml_new_string("deafult");
  $a9 = Vector{0, $caml_new_string("divRenderedByInput")};
  $bb = $caml_new_string("divClicked!");
  $ba = $caml_new_string("MyReducer:");
  $bf = $caml_new_string("AppInstance");
  $bc = Vector{0, $caml_new_string("initialInputText")};
  $be = $caml_new_string("haha I am controlling your input");
  $bd = Vector{0, $caml_new_string("divRenderedByAppContainsInput")};
  $bj = $caml_new_string(")");
  $bk = $caml_new_string("->animFiredWithDeepDivState(");
  $bl = $caml_new_string("rafDeepDiv");
  $bm = Vector{0, $caml_new_string("rafSecond")};
  $bn = Vector{0, $caml_new_string("rafFirstDiv")};
  $bi = $caml_new_string("initialAnimationFrameSetup");
  $bh = Vector{0, $caml_new_string("TODO")};
  $bo = $caml_new_string("default");
  $bp = $caml_new_string("HELLO");
  $bs = Vector{0, $caml_new_string("stateless")};
  $bt = $caml_new_string(
    "\n\n-------------------\nChild Container \n-------------------"
  );
  $b0 = Vector{0, $caml_new_string("stateless")};
  $b2 = Vector{0, $caml_new_string("Foo")};
  $bu = $caml_new_string(
    "\n\n-------------------\nGets Derived State From Props\n-------------------"
  );
  $bw = Vector{0, $caml_new_string("Foo")};
  $bx = $caml_new_string("Init:");
  $bz = Vector{0, $caml_new_string("Foo")};
  $bA = $caml_new_string("Update Without Changing Props:");
  $bC = Vector{0, $caml_new_string("Foo")};
  $bD = $caml_new_string("Update With Changing Props:");
  $bE = $caml_new_string(
    "\n\n------------------------------\nApp With Controlled Input\n------------------------------"
  );
  $bG = $caml_new_string("Init:");
  $bJ = $caml_new_string("Update:");
  $bK = $caml_new_string(
    "\n\n------------------------------\nApp With Request Animation Frame \n----------------------"
  );
  $bL = Vector{0, 2, 3};
  $bM = Vector{0, $caml_new_string("")};
  $bN = $caml_new_string("Init:");
  $bO = $caml_new_string("Update After raf tick:");
  $bP = $caml_new_string("Update After raf tick:");
  $bQ = $caml_new_string(
    "\n\n------------------------------\nApp With Polymoprhic State \n----------------------------"
  );
  $bS = $caml_new_string("zero");
  $bT = $caml_new_string("hello");
  $bU = $caml_new_string("Init:");
  $bW = $caml_new_string("zero");
  $bY = $caml_new_string("Another Type Init:");
  $bq = $caml_new_string("Total ms (Title): %d ");
  $br = $caml_new_string("Second Part Of Tuple:");
  $invalid_arg = function($s) use ($Invalid_argument,$caml_wrap_thrown_exception) {
    throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $s});
  };
  
  $caml_fresh_oo_id(0);
  
  $a = function($s1, $s2) use ($caml_blit_string,$caml_create_bytes,$caml_ml_string_length) {
    $l1 = $caml_ml_string_length($s1);
    $l2 = $caml_ml_string_length($s2);
    $s = $caml_create_bytes((int) ($l1 + $l2));
    $caml_blit_string($s1, 0, $s, 0, $l1);
    $caml_blit_string($s2, 0, $s, $l1, $l2);
    return $s;
  };
  $string_of_int = function($n) use ($caml_new_string) {
    return $caml_new_string("" . $n);
  };
  $valid_float_lexem = function($s) use ($a,$b,$caml_ml_string_length,$caml_string_get) {
    $l = $caml_ml_string_length($s);
    $loop = function($i) use ($a,$b,$caml_string_get,$l,$s) {
      $i__0 = $i;
      for (;;) {
        if ($l <= $i__0) {return $a($s, $b);}
        $match = $caml_string_get($s, $i__0);
        $switch__0 = 48 <= $match
          ? 58 <= $match ? 0 : (1)
          : (45 === $match ? 1 : (0));
        if ($switch__0) {$i__1 = (int) ($i__0 + 1);$i__0 = $i__1;continue;}
        return $s;
      }
    };
    return $loop(0);
  };
  $string_of_float = function($f) use ($c,$caml_format_float,$valid_float_lexem) {
    return $valid_float_lexem($caml_format_float($c, $f));
  };
  $_ = $append->contents =
    function($l1, $l2) use ($append) {
      if ($l1) {
        $tl = $l1[2];
        $hd = $l1[1];
        return Vector{0, $hd, $append->contents($tl, $l2)};
      }
      return $l2;
    };
  
  $caml_ml_open_descriptor_in(0);
  
  $stdout = $caml_ml_open_descriptor_out(1);
  
  $caml_ml_open_descriptor_out(2);
  
  $flush_all = function($param) use ($Sys_error,$caml_ml_flush,$caml_ml_out_channels_list,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise) {
    $iter = function($param) use ($Sys_error,$caml_ml_flush,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          try {$caml_ml_flush($a);}
          catch(\Throwable $ew) {
            $ew = $caml_wrap_exception($ew);
            if ($ew[1] !== $Sys_error) {
              throw $caml_wrap_thrown_exception_reraise($ew);
            }
          }
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    return $iter($caml_ml_out_channels_list(0));
  };
  $output_string = function($oc, $s) use ($caml_ml_output,$caml_ml_string_length) {
    return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
  };
  $print_string = function($s) use ($output_string,$stdout) {
    return $output_string($stdout, $s);
  };
  $do_at_exit = function($param) use ($flush_all) {return $flush_all(0);};
  $rev_append = function($l1, $l2) {
    $l1__0 = $l1;
    $l2__0 = $l2;
    for (;;) {
      if ($l1__0) {
        $l1__1 = $l1__0[2];
        $a = $l1__0[1];
        $l2__1 = Vector{0, $a, $l2__0};
        $l1__0 = $l1__1;
        $l2__0 = $l2__1;
        continue;
      }
      return $l2__0;
    }
  };
  $rev = function($l) use ($rev_append) {return $rev_append($l, 0);};
  $_ = $flatten->contents =
    function($param) use ($append,$flatten) {
      if ($param) {
        $r = $param[2];
        $l = $param[1];
        return $append->contents($l, $flatten->contents($r));
      }
      return 0;
    };
  $_ = $map->contents =
    function($f, $param) use ($caml_call1,$map) {
      if ($param) {
        $l = $param[2];
        $a = $param[1];
        $r = $caml_call1($f, $a);
        return Vector{0, $r, $map->contents($f, $l)};
      }
      return 0;
    };
  $_ = $d->contents =
    function($i, $f, $param) use ($caml_call2,$d) {
      if ($param) {
        $l = $param[2];
        $a = $param[1];
        $r = $caml_call2($f, $i, $a);
        return Vector{0, $r, $d->contents((int) ($i + 1), $f, $l)};
      }
      return 0;
    };
  $mapi = function($f, $l) use ($d) {return $d->contents(0, $f, $l);};
  $iter = function($f, $param) use ($caml_call1) {
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $param__1 = $param__0[2];
        $a = $param__0[1];
        $caml_call1($f, $a);
        $param__0 = $param__1;
        continue;
      }
      return 0;
    }
  };
  $fold_left = function($f, $accu, $l) use ($caml_call2) {
    $accu__0 = $accu;
    $l__0 = $l;
    for (;;) {
      if ($l__0) {
        $l__1 = $l__0[2];
        $a = $l__0[1];
        $accu__1 = $caml_call2($f, $accu__0, $a);
        $accu__0 = $accu__1;
        $l__0 = $l__1;
        continue;
      }
      return $accu__0;
    }
  };
  $copy = function($s) use ($caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length) {
    $len = $caml_ml_bytes_length($s);
    $r = $caml_create_bytes($len);
    $caml_blit_bytes($s, 0, $r, 0, $len);
    return $r;
  };
  $escaped = function($s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_bytes_length,$copy,$unsigned_right_shift_32) {
    $n = Vector{0, 0};
    $ep = (int) ($caml_ml_bytes_length($s) + -1);
    $eo = 0;
    if (! ($ep < 0)) {
      $i__0 = $eo;
      for (;;) {
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $et = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($et, 0)) {
            if (93 <= $et) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($et + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
            else {$switch__1 = 1;}
          }
          if ($switch__1) {$eu = 1;$switch__0 = 2;}
        }
        else {
          $switch__0 = 11 <= $match
            ? 13 === $match ? 1 : (0)
            : (8 <= $match ? 1 : (0));
        }
        switch($switch__0) {
          // FALLTHROUGH
          case 0:
            $eu = 4;
            break;
          // FALLTHROUGH
          case 1:
            $eu = 2;
            break;
          }
        $n[1] = (int) ($n[1] + $eu);
        $ev = (int) ($i__0 + 1);
        if ($ep !== $i__0) {$i__0 = $ev;continue;}
        break;
      }
    }
    if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
    $s__0 = $caml_create_bytes($n[1]);
    $n[1] = 0;
    $er = (int) ($caml_ml_bytes_length($s) + -1);
    $eq = 0;
    if (! ($er < 0)) {
      $i = $eq;
      for (;;) {
        $c = $caml_bytes_unsafe_get($s, $i);
        if (35 <= $c) {
          $switch__2 = 92 === $c ? 1 : (127 <= $c ? 0 : (2));
        }
        else {
          if (32 <= $c) {
            $switch__2 = 34 <= $c ? 1 : (2);
          }
          else {
            if (14 <= $c) {
              $switch__2 = 0;
            }
            else {
              switch($c) {
                // FALLTHROUGH
                case 8:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 98);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                case 9:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 116);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                case 10:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 110);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                case 13:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 114);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                default:
                  $switch__2 = 0;
                }
            }
          }
        }
        switch($switch__2) {
          // FALLTHROUGH
          case 0:
            $caml_bytes_unsafe_set($s__0, $n[1], 92);
            $n[1] += 1;
            $caml_bytes_unsafe_set($s__0, $n[1], (int) (48 + (int) ($c / 100))
            );
            $n[1] += 1;
            $caml_bytes_unsafe_set(
              $s__0,
              $n[1],
              (int)
              (48 + (int) ((int) ($c / 10) % 10))
            );
            $n[1] += 1;
            $caml_bytes_unsafe_set($s__0, $n[1], (int) (48 + (int) ($c % 10)));
            break;
          // FALLTHROUGH
          case 1:
            $caml_bytes_unsafe_set($s__0, $n[1], 92);
            $n[1] += 1;
            $caml_bytes_unsafe_set($s__0, $n[1], $c);
            break;
          // FALLTHROUGH
          case 2:
            $caml_bytes_unsafe_set($s__0, $n[1], $c);
            break;
          }
        $n[1] += 1;
        $es = (int) ($i + 1);
        if ($er !== $i) {$i = $es;continue;}
        break;
      }
    }
    return $s__0;
  };
  $bos = function($en) {return $en;};
  $bts = function($em) {return $em;};
  $ensure_ge = function($x, $y) use ($e,$invalid_arg) {
    return $y <= $x ? $x : ($invalid_arg($e));
  };
  $sum_lengths = function($acc, $seplen, $param) use ($caml_ml_string_length,$ensure_ge) {
    $acc__0 = $acc;
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $ek = $param__0[2];
        $el = $param__0[1];
        if ($ek) {
          $acc__1 = $ensure_ge(
            (int)
            ((int) ($caml_ml_string_length($el) + $seplen) + $acc__0),
            $acc__0
          );
          $acc__0 = $acc__1;
          $param__0 = $ek;
          continue;
        }
        return (int) ($caml_ml_string_length($el) + $acc__0);
      }
      return $acc__0;
    }
  };
  $unsafe_blits = function($dst, $pos, $sep, $seplen, $param) use ($caml_blit_string,$caml_ml_string_length) {
    $pos__0 = $pos;
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $ei = $param__0[2];
        $ej = $param__0[1];
        if ($ei) {
          $caml_blit_string($ej, 0, $dst, $pos__0, $caml_ml_string_length($ej)
          );
          $caml_blit_string(
            $sep,
            0,
            $dst,
            (int)
            ($pos__0 + $caml_ml_string_length($ej)),
            $seplen
          );
          $pos__1 = (int)
          ((int) ($pos__0 + $caml_ml_string_length($ej)) + $seplen);
          $pos__0 = $pos__1;
          $param__0 = $ei;
          continue;
        }
        $caml_blit_string($ej, 0, $dst, $pos__0, $caml_ml_string_length($ej));
        return $dst;
      }
      return $dst;
    }
  };
  $concat = function($sep, $l) use ($bts,$caml_create_bytes,$caml_ml_string_length,$f,$sum_lengths,$unsafe_blits) {
    if ($l) {
      $seplen = $caml_ml_string_length($sep);
      return $bts(
        $unsafe_blits(
          $caml_create_bytes($sum_lengths(0, $seplen, $l)),
          0,
          $sep,
          $seplen,
          $l
        )
      );
    }
    return $f;
  };
  $escaped__0 = function($s) use ($bos,$bts,$caml_bytes_unsafe_get,$caml_ml_string_length,$escaped,$unsigned_right_shift_32) {
    $needs_escape = function($i) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$s,$unsigned_right_shift_32) {
      $i__0 = $i;
      for (;;) {
        if ($caml_ml_string_length($s) <= $i__0) {return 0;}
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $eh = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($eh, 0)) {
            if (93 <= $eh) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($eh + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
            else {$switch__1 = 1;}
          }
          if ($switch__1) {$i__1 = (int) ($i__0 + 1);$i__0 = $i__1;continue;}
        }
        else {
          $switch__0 = 11 <= $match
            ? 13 === $match ? 1 : (0)
            : (8 <= $match ? 1 : (0));
        }
        return $switch__0 ? 1 : (1);
      }
    };
    return $needs_escape(0) ? $bts($escaped($bos($s))) : ($s);
  };
  $index_rec = function($s, $lim, $i, $c) use ($Not_found,$caml_bytes_unsafe_get,$caml_wrap_thrown_exception) {
    $i__0 = $i;
    for (;;) {
      if ($lim <= $i__0) {throw $caml_wrap_thrown_exception($Not_found);}
      if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
      $i__1 = (int) ($i__0 + 1);
      $i__0 = $i__1;
      continue;
    }
  };
  $contains_from = function($s, $i, $c) use ($Not_found,$caml_ml_string_length,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise,$g,$index_rec,$invalid_arg) {
    $l = $caml_ml_string_length($s);
    if (0 <= $i) {
      if (! ($l < $i)) {
        try {$index_rec($s, $l, $i, $c);$ef = 1;return $ef;}
        catch(\Throwable $eg) {
          $eg = $caml_wrap_exception($eg);
          if ($eg === $Not_found) {return 0;}
          throw $caml_wrap_thrown_exception_reraise($eg);
        }
      }
    }
    return $invalid_arg($g);
  };
  $contains = function($s, $c) use ($contains_from) {
    return $contains_from($s, 0, $c);
  };
  
  $caml_fresh_oo_id(0);
  
  $caml_fresh_oo_id(0);
  
  $bits = function($s) use ($caml_check_bound,$unsigned_right_shift_32) {
    $s[2] = (int) ((int) ($s[2] + 1) % 55);
    $ec = $s[2];
    $curval = $caml_check_bound($s[1], $ec)[$ec + 1];
    $ed = (int) ((int) ($s[2] + 24) % 55);
    $newval = (int)
    ($caml_check_bound($s[1], $ed)[$ed + 1] +
       ($curval ^ (int) $unsigned_right_shift_32($curval, 25) & 31));
    $newval30 = $newval & 1073741823;
    $ee = $s[2];
    $caml_check_bound($s[1], $ee)[$ee + 1] = $newval30;
    return $newval30;
  };
  $intaux = function($s, $n) use ($bits,$caml_mod) {
    for (;;) {
      $r = $bits($s);
      $v = $caml_mod($r, $n);
      if ((int) ((int) (1073741823 - $n) + 1) < (int) ($r - $v)) {continue;}
      return $v;
    }
  };
  $int__0 = function($s, $bound) use ($h,$intaux,$invalid_arg) {
    if (! (1073741823 < $bound)) {
      if (0 < $bound) {return $intaux($s, $bound);}
    }
    return $invalid_arg($h);
  };
  $default__0 = Vector{0, $i->toVector(), 0};
  $int__1 = function($bound) use ($default__0,$int__0) {
    return $int__0($default__0, $bound);
  };
  $j = 5;
  $detectList = function($maxLength, $o) use ($caml_equal,$caml_obj_tag) {
    $maxLength__0 = $maxLength;
    $o__0 = $o;
    for (;;) {
      if (0 === $maxLength__0) {return 1;}
      $tag = $caml_obj_tag($o__0);
      $match = $tag === 1000 ? 1 : (0);
      if (0 === $match) {
        $size = $o__0->count() - 1;
        $d_ = $tag === 0 ? 1 : (0);
        if ($d_) {
          $ea = 2 === $size ? 1 : (0);
          if ($ea) {
            $o__1 = $o__0[2];
            $maxLength__1 = (int) ($maxLength__0 + -1);
            $maxLength__0 = $maxLength__1;
            $o__0 = $o__1;
            continue;
          }
          $eb = $ea;
        }
        else {$eb = $d_;}
        return $eb;
      }
      return $caml_equal($o__0, 0);
    }
  };
  $_ = $extractList->contents =
    function($maxNum, $o) use ($extractList,$is_int,$k) {
      if (0 === $maxNum) {return Vector{0, 1 - $is_int($o), 0};}
      if ($is_int($o)) {return $k;}
      $match = $extractList->contents((int) ($maxNum + -1), $o[2]);
      $rest = $match[2];
      $restWasTruncated = $match[1];
      return Vector{0, $restWasTruncated, Vector{0, $o[1], $rest}};
    };
  $extractFields = function($maxNum, $o) {
    $extractFields = function($maxNum, $fieldsSoFar, $numFields) use ($o) {
      $maxNum__0 = $maxNum;
      $fieldsSoFar__0 = $fieldsSoFar;
      $numFields__0 = $numFields;
      for (;;) {
        if (0 === $maxNum__0) {
          return Vector{0, 0 < $numFields__0 ? 1 : (0), $fieldsSoFar__0};
        }
        if (0 === $numFields__0) {return Vector{0, 0, $fieldsSoFar__0};}
        $numFields__1 = (int) ($numFields__0 + -1);
        $fieldsSoFar__1 = Vector{
          0,
          $o[(int) ($numFields__0 + -1) + 1],
          $fieldsSoFar__0
        };
        $maxNum__1 = (int) ($maxNum__0 + -1);
        $maxNum__0 = $maxNum__1;
        $fieldsSoFar__0 = $fieldsSoFar__1;
        $numFields__0 = $numFields__1;
        continue;
      }
    };
    return $extractFields($maxNum, 0, $o->count() - 1);
  };
  $getBreakData = function($itms) use ($caml_ml_string_length,$contains,$fold_left,$l) {
    $match = $fold_left(
      function($param, $itm) use ($caml_ml_string_length,$contains) {
        $curDidBreak = $param[2];
        $curTotalLen = $param[1];
        $containsNewline = $contains($itm, 10);
        $curDidBreak__0 = $curDidBreak || $containsNewline;
        return Vector{
          0,
          (int)
          ((int) ($curTotalLen + $caml_ml_string_length($itm)) + 2),
          $curDidBreak__0
        };
      },
      $l,
      $itms
    );
    $someChildBroke = $match[2];
    $allItemsLen = $match[1];
    return Vector{0, $allItemsLen, $someChildBroke};
  };
  $_ = $indentForDepth->contents =
    function($n__0) use ($a,$indentForDepth,$m,$n,$o,$p,$q,$r,$s,$t,$u,$unsigned_right_shift_32,$v) {
      if (8 < $unsigned_right_shift_32($n__0, 0)) {
        return $a($indentForDepth->contents((int) ($n__0 + -1)), $m);
      }
      switch($n__0) {
        // FALLTHROUGH
        case 0:
          return $n;
        // FALLTHROUGH
        case 1:
          return $o;
        // FALLTHROUGH
        case 2:
          return $p;
        // FALLTHROUGH
        case 3:
          return $q;
        // FALLTHROUGH
        case 4:
          return $r;
        // FALLTHROUGH
        case 5:
          return $s;
        // FALLTHROUGH
        case 6:
          return $t;
        // FALLTHROUGH
        case 7:
          return $u;
        // FALLTHROUGH
        default:
          return $v;
        }
    };
  $printTreeShape = function($pair, $self, $depth, $o) use ($A,$B,$C,$D,$a,$caml_call1,$caml_call3,$caml_ml_string_length,$concat,$extractFields,$getBreakData,$indentForDepth,$j,$map,$w,$x,$y,$z) {
    $right = $pair[2];
    $left = $pair[1];
    $match = $extractFields($j, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth);
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      function($o) use ($caml_call3,$dNext,$self) {
        return $caml_call3($self[13], $self, Vector{0, $dNext}, $o);
      },
      $lst
    );
    $match__0 = $getBreakData($itms);
    $someChildBroke = $match__0[2];
    $allItemsLen = $match__0[1];
    if (
      !
      (70 <=
         (int)
         ((int) ($caml_ml_string_length($indent) + 2) + $allItemsLen))
    ) {
      if (! $someChildBroke) {
        $truncationMsg__0 = 0 === $wasTruncated
          ? $B
          : ($a($D, $caml_call1($self[6], $self)));
        $d9 = $a($truncationMsg__0, $right);
        return $a($left, $a($concat($C, $itms), $d9));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $w
      : ($a($A, $a($indentNext, $caml_call1($self[6], $self))));
    $d8 = $a($truncationMsg, $a($x, $a($indent, $right)));
    return $a(
      $left,
      $a($z, $a($indentNext, $a($concat($a($y, $indentNext), $itms), $d8)))
    );
  };
  $printListShape = function($self, $depth, $o) use ($E,$F,$G,$H,$I,$J,$K,$L,$M,$N,$O,$P,$a,$caml_call1,$caml_call3,$caml_ml_string_length,$concat,$extractList,$getBreakData,$indentForDepth,$j,$map) {
    $match = $extractList->contents($j, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth);
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      function($o) use ($caml_call3,$dNext,$self) {
        return $caml_call3($self[13], $self, Vector{0, $dNext}, $o);
      },
      $lst
    );
    $match__0 = $getBreakData($itms);
    $someChildBroke = $match__0[2];
    $allItemsLen = $match__0[1];
    if (
      !
      (70 <=
         (int)
         ((int) ($caml_ml_string_length($indent) + 2) + $allItemsLen))
    ) {
      if (! $someChildBroke) {
        $truncationMsg__0 = 0 === $wasTruncated
          ? $L
          : ($a($P, $caml_call1($self[6], $self)));
        $d7 = $a($truncationMsg__0, $M);
        return $a($O, $a($concat($N, $itms), $d7));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $E
      : ($a($K, $a($indentNext, $caml_call1($self[6], $self))));
    $d6 = $a($truncationMsg, $a($G, $a($indent, $F)));
    return $a(
      $J,
      $a($I, $a($indentNext, $a($concat($a($H, $indentNext), $itms), $d6)))
    );
  };
  $Q = function($self, $opt, $o) use ($caml_call1,$caml_call2,$caml_call3,$caml_obj_tag,$detectList,$j) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    if (70 < $depth) {return $caml_call1($self[5], $self);}
    $tag = $caml_obj_tag($o);
    if ($tag === 252) {
      $match = 0 === $depth ? 1 : (0);
      return 0 === $match
        ? $caml_call2($self[3], $self, $o)
        : ($caml_call2($self[2], $self, $o));
    }
    return $tag === 1000
      ? $caml_call2($self[1], $self, $o)
      : ($tag === 253
       ? $caml_call2($self[4], $self, $o)
       : ($tag === 247
        ? $caml_call2($self[10], $self, $o)
        : ($tag === 254
         ? $caml_call3($self[9], $self, 0, $o)
         : ($tag === 246
          ? $caml_call2($self[8], $self, $o)
          : ($detectList($j, $o)
           ? $caml_call3($self[12], $self, Vector{0, $depth}, $o)
           : ($tag === 0
            ? $caml_call3($self[11], $self, Vector{0, $depth}, $o)
            : ($caml_call2($self[7], $self, $o))))))));
  };
  $R = function($self, $opt, $o) use ($printListShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printListShape($self, $depth, $o);
  };
  $S = function($self, $opt, $o) use ($T,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($T, $self, $depth, $o);
  };
  $U = function($self, $f) use ($V,$W,$a,$string_of_int) {
    return $a($W, $a($string_of_int((int) $f), $V));
  };
  $X = function($self, $opt, $o) use ($Y,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($Y, $self, $depth, $o);
  };
  $Z = function($self, $o) use ($aa) {return $aa;};
  $ab = function($self, $o) use ($ac) {return $ac;};
  $ad = function($self) use ($ae) {return $ae;};
  $af = function($self) use ($ag) {return $ag;};
  $ah = function($self, $f) use ($string_of_float) {
    return $string_of_float($f);
  };
  $ai = function($self, $s) use ($a,$aj,$ak,$caml_call2) {
    return $a($ak, $a($caml_call2($self[2], $self, $s), $aj));
  };
  $al = function($self, $s) {return $s;};
  $base = Vector{
    0,
    function($self, $i) use ($string_of_int) {return $string_of_int($i);},
    $al,
    $ai,
    $ah,
    $af,
    $ad,
    $ab,
    $Z,
    $X,
    $U,
    $S,
    $R,
    $Q
  };
  $makeStandardChannelsConsole = function($objectPrinter) use ($a,$am,$an,$ao,$ap,$caml_call3,$native_debug,$native_error,$native_log,$native_warn) {
    $d2 = function($a__0) use ($a,$am,$caml_call3,$native_debug,$objectPrinter) {
      return $native_debug(
        $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $am)
      );
    };
    $d3 = function($a__0) use ($a,$an,$caml_call3,$native_error,$objectPrinter) {
      return $native_error(
        $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $an)
      );
    };
    $d4 = function($a__0) use ($a,$ao,$caml_call3,$native_warn,$objectPrinter) {
      return $native_warn(
        $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $ao)
      );
    };
    $d5 = function($a) use ($caml_call3,$native_log,$objectPrinter) {
      return $native_log(
        $caml_call3($objectPrinter[13], $objectPrinter, 0, $a)
      );
    };
    return Vector{
      0,
      function($a__0) use ($a,$ap,$caml_call3,$native_log,$objectPrinter) {
        return $native_log(
          $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $ap)
        );
      },
      $d5,
      $d4,
      $d3,
      $d2
    };
  };
  $defaultGlobalConsole = $makeStandardChannelsConsole($base);
  $log = function($a) use ($caml_call1,$defaultGlobalConsole) {
    return $caml_call1($defaultGlobalConsole[1], $a);
  };
  $mapi3 = function($f, $iSoFar, $revSoFar, $listA, $listB, $listC) use ($Invalid_argument,$aq,$caml_call4,$caml_wrap_thrown_exception,$rev) {
    $iSoFar__0 = $iSoFar;
    $revSoFar__0 = $revSoFar;
    $listA__0 = $listA;
    $listB__0 = $listB;
    $listC__0 = $listC;
    for (;;) {
      if ($listA__0) {
        if ($listB__0) {
          if ($listC__0) {
            $listC__1 = $listC__0[2];
            $hdc = $listC__0[1];
            $listB__1 = $listB__0[2];
            $hdb = $listB__0[1];
            $listA__1 = $listA__0[2];
            $hda = $listA__0[1];
            $revSoFar__1 = Vector{
              0,
              $caml_call4($f, $iSoFar__0, $hda, $hdb, $hdc),
              $revSoFar__0
            };
            $iSoFar__1 = (int) ($iSoFar__0 + 1);
            $iSoFar__0 = $iSoFar__1;
            $revSoFar__0 = $revSoFar__1;
            $listA__0 = $listA__1;
            $listB__0 = $listB__1;
            $listC__0 = $listC__1;
            continue;
          }
        }
      }
      else {if (! $listB__0) {if (! $listC__0) {return $rev($revSoFar__0);}}}
      throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $aq});
    }
  };
  $mapi3__0 = function($f, $listA, $listB, $listC) use ($mapi3) {
    return $mapi3($f, 0, 0, $listA, $listB, $listC);
  };
  $splitList = function($revCount, $revSoFar, $splitAt, $lst) use ($Invalid_argument,$a,$ar,$caml_wrap_thrown_exception,$rev,$string_of_int) {
    $revCount__0 = $revCount;
    $revSoFar__0 = $revSoFar;
    $lst__0 = $lst;
    for (;;) {
      if ($lst__0) {
        $tl = $lst__0[2];
        $hd = $lst__0[1];
        $match = $revCount__0 === $splitAt ? 1 : (0);
        if (0 === $match) {
          $revSoFar__1 = Vector{0, $hd, $revSoFar__0};
          $revCount__1 = (int) ($revCount__0 + 1);
          $revCount__0 = $revCount__1;
          $revSoFar__0 = $revSoFar__1;
          $lst__0 = $tl;
          continue;
        }
        return Vector{0, $rev($revSoFar__0), $hd, $tl};
      }
      throw $caml_wrap_thrown_exception(
              Vector{0, $Invalid_argument, $a($ar, $string_of_int($splitAt))}
            );
    }
  };
  $splitList__0 = function($splitAt, $lst) use ($splitList) {
    return $splitList(0, 0, $splitAt, $lst);
  };
  $nonReducer = function($param, $d1) use ($as) {return $as;};
  $nonEventHandler = function($e) {return 0;};
  $spec = function($param) use ($nonEventHandler) {
    if (0 === $param[0]) {
      $reducer = $param[3];
      $subelems = $param[2];
      $state = $param[1];
      return Vector{0, $state, $reducer, $nonEventHandler, $subelems};
    }
    $spec = $param[1];
    return $spec;
  };
  $withState = function($inst, $state) {
    $d0 = $inst[5];
    return Vector{
      0,
      $inst[1],
      $inst[2],
      $inst[3],
      $inst[4],
      Vector{0, $state, $d0[2], $d0[3], $d0[4]},
      $inst[6]
    };
  };
  $newSelf = function($replacer, $subreplacer) use ($caml_call1,$caml_call2,$caml_update_dummy,$reconcile,$withState) {
    $self = varray[];
    $dU = function($extractor, $e, $inst) use ($caml_call1,$caml_call2,$reconcile,$withState) {
      $dY = $caml_call1($extractor, $e);
      $nextState = $caml_call2($inst[5][2], $inst, $dY);
      $dZ = $inst[4];
      return $reconcile->contents($withState($inst, $nextState), $dZ);
    };
    $dV = function($action) use ($caml_call1,$caml_call2,$reconcile,$replacer,$withState) {
      return $caml_call1(
        $replacer,
        function($inst) use ($action,$caml_call2,$reconcile,$withState) {
          $nextState = $caml_call2($inst[5][2], $inst, $action);
          $dX = $inst[4];
          return $reconcile->contents($withState($inst, $nextState), $dX);
        }
      );
    };
    $caml_update_dummy(
      $self,
      Vector{
        0,
        function($actionExtractor, $ev) use ($caml_call1,$caml_call2,$reconcile,$replacer,$withState) {
          $action = $caml_call1($actionExtractor, $ev);
          return $caml_call1(
            $replacer,
            function($inst) use ($action,$caml_call2,$reconcile,$withState) {
              $nextState = $caml_call2($inst[5][2], $inst, $action);
              $dW = $inst[4];
              return $reconcile->contents($withState($inst, $nextState), $dW);
            }
          );
        },
        $dV,
        $dU
      }
    );
    return $self;
  };
  $init = function($replacer, $renderable) use ($caml_call1,$caml_call2,$initSubtree,$newSelf,$spec) {
    $subreplacer = function($subtreeSwapper) use ($caml_call1,$replacer) {
      return $caml_call1(
        $replacer,
        function($inst) use ($caml_call1,$subtreeSwapper) {
          $nextSubtree = $caml_call1($subtreeSwapper, $inst[6]);
          $match = $inst[6] !== $nextSubtree ? 1 : (0);
          return 0 === $match
            ? $inst
            : (Vector{
             0,
             $inst[1],
             $inst[2],
             $inst[3],
             $inst[4],
             $inst[5],
             $nextSubtree
           });
        }
      );
    };
    $self = $newSelf($replacer, $subreplacer);
    $nextSpec = $spec($caml_call2($renderable, 0, $self));
    return Vector{
      0,
      $replacer,
      $subreplacer,
      $self,
      $renderable,
      $nextSpec,
      $initSubtree->contents($subreplacer, $nextSpec[4])
    };
  };
  $_ = $initSubtree->contents =
    function($thisReplacer, $jsx) use ($caml_call1,$flatten,$init,$initSubtree,$is_int,$mapi,$splitList__0) {
      if ($is_int($jsx)) {return 0;}
      else {
        switch($jsx[0]) {
          // FALLTHROUGH
          case 0:
            $renderable = $jsx[1];
            $nextReplacer = function($instSwapper) use ($caml_call1,$thisReplacer) {
              return $caml_call1(
                $thisReplacer,
                function($subtree) use ($caml_call1,$instSwapper) {
                  $inst = $subtree[1];
                  $next = $caml_call1($instSwapper, $inst);
                  $match = $inst !== $next ? 1 : (0);
                  return 0 === $match ? $subtree : (Vector{0, $next});
                }
              );
            };
            return Vector{0, $init($nextReplacer, $renderable)};
          // FALLTHROUGH
          case 1:
            $stateRendererB = $jsx[2];
            $stateRendererA = $jsx[1];
            $nextReplacerA = function($aSwapper) use ($caml_call1,$thisReplacer) {
              return $caml_call1(
                $thisReplacer,
                function($subtree) use ($aSwapper,$caml_call1) {
                  $b = $subtree[2];
                  $a = $subtree[1];
                  $next = $caml_call1($aSwapper, $a);
                  $match = $next === $a ? 1 : (0);
                  return 0 === $match ? Vector{1, $next, $b} : ($subtree);
                }
              );
            };
            $nextReplacerB = function($bSwapper) use ($caml_call1,$thisReplacer) {
              return $caml_call1(
                $thisReplacer,
                function($subtree) use ($bSwapper,$caml_call1) {
                  $b = $subtree[2];
                  $a = $subtree[1];
                  $next = $caml_call1($bSwapper, $b);
                  $match = $next === $b ? 1 : (0);
                  return 0 === $match ? Vector{1, $a, $next} : ($subtree);
                }
              );
            };
            $dT = $initSubtree->contents($nextReplacerB, $stateRendererB);
            return Vector{
              1,
              $initSubtree->contents($nextReplacerA, $stateRendererA),
              $dT
            };
          // FALLTHROUGH
          default:
            $elems = $jsx[1];
            $initElem = function($i, $e) use ($caml_call1,$flatten,$initSubtree,$splitList__0,$thisReplacer) {
              $subreplacer = function($swapper) use ($caml_call1,$flatten,$i,$splitList__0,$thisReplacer) {
                return $caml_call1(
                  $thisReplacer,
                  function($subtree) use ($caml_call1,$flatten,$i,$splitList__0,$swapper) {
                    $iLst = $subtree[1];
                    $match = $splitList__0($i, $iLst);
                    $post = $match[3];
                    $inst = $match[2];
                    $pre = $match[1];
                    $next = $caml_call1($swapper, $inst);
                    $match__0 = $next === $inst ? 1 : (0);
                    return 0 === $match__0
                      ? Vector{
                       2,
                       $flatten->contents(
                         Vector{
                           0,
                           $pre,
                           Vector{0, Vector{0, $next, 0}, Vector{0, $post, 0}}
                         }
                       )
                     }
                      : ($subtree);
                  }
                );
              };
              return $initSubtree->contents($subreplacer, $e);
            };
            $sub = $mapi($initElem, $elems);
            return Vector{2, $sub};
          }
      }
    };
  $_ = $reconcile->contents =
    function($inst, $renderable) use ($caml_call2,$reconcileSubtree,$spec) {
      $nextSpec = $spec(
        $caml_call2($renderable, Vector{0, $inst[5][1]}, $inst[3])
      );
      $dS = $reconcileSubtree->contents($inst[6], $inst[5][4], $nextSpec[4]);
      return Vector{
        0,
        $inst[1],
        $inst[2],
        $inst[3],
        $renderable,
        $nextSpec,
        $dS
      };
    };
  $_ = $reconcileSubtree->contents =
    function($subtree, $prevJsx, $match) use ($is_int,$mapi3__0,$reconcile,$reconcileSubtree) {
      if ($is_int($subtree)) {return 0;}
      else {
        switch($subtree[0]) {
          // FALLTHROUGH
          case 0:
            $r = $match[1];
            $rPrev = $prevJsx[1];
            $i = $subtree[1];
            $match__0 = $r === $rPrev ? 1 : (0);
            return 0 === $match__0
              ? Vector{0, $reconcile->contents($i, $r)}
              : ($subtree);
          // FALLTHROUGH
          case 1:
            $rb = $match[2];
            $ra = $match[1];
            $rbPrev = $prevJsx[2];
            $raPrev = $prevJsx[1];
            $ib = $subtree[2];
            $ia = $subtree[1];
            $dR = $reconcileSubtree->contents($ib, $rbPrev, $rb);
            return Vector{
              1,
              $reconcileSubtree->contents($ia, $raPrev, $ra),
              $dR
            };
          // FALLTHROUGH
          default:
            $eLst = $match[1];
            $eLstPrev = $prevJsx[1];
            $iLst = $subtree[1];
            $nextSeq = $mapi3__0(
              function($i, $itm, $r, $rPrev) use ($reconcileSubtree) {
                return $reconcileSubtree->contents($itm, $rPrev, $r);
              },
              $iLst,
              $eLst,
              $eLstPrev
            );
            return Vector{2, $nextSeq};
          }
      }
    };
  $control = function($param, $controlledState) use ($caml_call2) {
    $renderable = $param[1];
    return Vector{
      0,
      function($state, $self) use ($caml_call2,$controlledState,$renderable) {
        return $caml_call2($renderable, Vector{0, $controlledState}, $self);
      }
    };
  };
  $create = function($param) use ($Invalid_argument,$at,$caml_call1,$caml_update_dummy,$caml_wrap_thrown_exception) {
    $root = varray[];
    $dP = 0;
    $caml_update_dummy(
      $root,
      Vector{
        0,
        function($swapper) use ($Invalid_argument,$at,$caml_call1,$caml_wrap_thrown_exception,$root) {
          $dQ = $root[2];
          if ($dQ) {
            $ei = $dQ[1];
            $curInst = $ei[2];
            $curElems = $ei[1];
            $nextEi = Vector{0, $curElems, $caml_call1($swapper, $curInst)};
            $root[2] = Vector{0, $nextEi};
            return 0;
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $at});
        },
        $dP
      }
    );
    return $root;
  };
  $render = function($root, $elems) use ($initSubtree,$reconcileSubtree) {
    $dO = $root[2];
    if ($dO) {
      $ei = $dO[1];
      $curSubtree = $ei[2];
      $curElems = $ei[1];
      $nextEi = Vector{
        0,
        $elems,
        $reconcileSubtree->contents($curSubtree, $curElems, $elems)
      };
      $root[2] = Vector{0, $nextEi};
      return 0;
    }
    $nextEi__0 = Vector{0, $elems, $initSubtree->contents($root[1], $elems)};
    $root[2] = Vector{0, $nextEi__0};
    return 0;
  };
  $counter = Vector{0, 0};
  $subscribers = Vector{0, 0};
  $request = function($cb) use ($counter,$subscribers) {
    $subscribers[1] = Vector{0, $cb, $subscribers[1]};
    $counter[1] = (int) ($counter[1] + 1);
    return $counter[1];
  };
  $tick = function($param) use ($caml_call1,$iter,$subscribers) {
    $prevSubscribers = $subscribers[1];
    $subscribers[1] = 0;
    return $iter(
      function($cb) use ($caml_call1) {return $caml_call1($cb, 0);},
      $prevSubscribers
    );
  };
  $clearAll = function($param) use ($subscribers) {
    $subscribers[1] = 0;
    return 0;
  };
  $element = function($x) {return $x;};
  $suppress = Vector{0, 0};
  $_ = $printInstanceCollection->contents =
    function($opt, $subtree) use ($a,$aA,$aB,$aC,$aD,$aE,$aF,$aG,$aH,$aI,$aJ,$aK,$au,$av,$aw,$ax,$ay,$az,$concat,$is_int,$map,$printInstanceCollection) {
      if ($opt) {
        $sth = $opt[1];
        $s = $sth;
      }
      else {$s = $aK;}
      $dNext = $a($av, $s);
      if ($is_int($subtree)) {return $aw;}
      else {
        switch($subtree[0]) {
          // FALLTHROUGH
          case 0:
            $n = $subtree[1];
            return $a($az, $a($au->contents(Vector{0, $a($ay, $s)}, $n), $ax));
          // FALLTHROUGH
          case 1:
            $n2 = $subtree[2];
            $n1 = $subtree[1];
            $dK = $a($aB, $a($s, $aA));
            $dL = $a(
              $aD,
              $a(
                $aC,
                $a(
                  $dNext,
                  $a(
                    $printInstanceCollection->contents(Vector{0, $dNext}, $n2),
                    $dK
                  )
                )
              )
            );
            return $a(
              $aF,
              $a(
                $aE,
                $a(
                  $dNext,
                  $a(
                    $printInstanceCollection->contents(Vector{0, $dNext}, $n1),
                    $dL
                  )
                )
              )
            );
          // FALLTHROUGH
          default:
            $lst = $subtree[1];
            $dM = Vector{0, $a($aH, $s)};
            return $a(
              $aJ,
              $a(
                $concat(
                  $aI,
                  $map->contents(
                    function($dN) use ($dM,$printInstanceCollection) {
                      return $printInstanceCollection->contents($dM, $dN);
                    },
                    $lst
                  )
                ),
                $aG
              )
            );
          }
      }
    };
  $_ = $au->contents =
    function($opt, $n) use ($a,$aL,$aM,$aN,$aO,$aP,$aQ,$aR,$aS,$aT,$aU,$aV,$caml_obj_tag,$escaped__0,$is_int,$printInstanceCollection,$string_of_int) {
      if ($opt) {
        $sth = $opt[1];
        $s = $sth;
      }
      else {$s = $aV;}
      $match = $n[5];
      $state = $match[1];
      $dG = $a($aM, $a($s, $aL));
      $dH = $n[6];
      $dI = $a(
        $aP,
        $a(
          $s,
          $a(
            $aO,
            $a(
              $printInstanceCollection->contents(Vector{0, $a($aN, $s)}, $dH),
              $dG
            )
          )
        )
      );
      $dJ = $is_int($state)
        ? $string_of_int($state)
        : ($caml_obj_tag($state) === 252
         ? $a($aT, $a($escaped__0($state), $aS))
         : ($aU));
      return $a($aR, $a($s, $a($aQ, $a($dJ, $dI))));
    };
  $printSection = function($s) use ($a,$aW,$log,$suppress) {
    return $suppress[1] ? 0 : ($log($a($aW, $s)));
  };
  $printRoot = function($title, $root) use ($a,$a0,$a1,$aX,$aY,$aZ,$log,$printInstanceCollection,$suppress) {
    $dF = $root[2];
    if (0 === $suppress[1]) {
      if ($dF) {
        $match = $dF[1];
        $subtree = $match[2];
        $log($a($aY, $a($title, $aX)));
        return $log($printInstanceCollection->contents(0, $subtree));
      }
      $log($title);
      return $log($a($a1, $a($a0, $aZ)));
    }
    return 0;
  };
  $domEventHandler = function($e) {return 0;};
  $domStateToString = function($state) {return $state;};
  $render__0 = function($onClick, $opt, $children, $state, $self) use ($a2,$domEventHandler) {
    if ($opt) {
      $sth = $opt[1];
      $className = $sth;
    }
    else {$className = $a2;}
    return Vector{
      1,
      Vector{
        0,
        $className,
        function($inst, $param) {$str = $param[1];return $str;},
        $domEventHandler,
        $children
      }
    };
  };
  $render__1 = function($opt, $size, $children, $dA, $self) use ($a3,$a4,$element,$nonReducer,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a4;}
    if ($dA) {
      $sth__0 = $dA[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $dB = 0;
    $dC = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function($dD, $dE) use ($a3,$dB,$dC,$render__0) {
            return $render__0($dC, $a3, $dB, $dD, $dE);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__2 = function($opt, $children, $dw, $self) use ($a5,$a6,$element,$nonReducer,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a6;}
    if ($dw) {
      $sth__0 = $dw[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $dx = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function($dy, $dz) use ($a5,$children,$dx,$render__0) {
            return $render__0($dx, $a5, $children, $dy, $dz);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__3 = function($opt, $size, $children, $dj, $self) use ($a,$a7,$a8,$element,$render__0,$render__1,$string_of_int) {
    ;
    if ($dj) {
      $sth = $dj[1];
      $state = $sth;
    }
    else {$state = Vector{0, $size, 0};}
    $curChangeCount = $state[2];
    $curSize = $state[1];
    $match = $curSize !== $size ? 1 : (0);
    $nextChangeCount = 0 === $match
      ? $curChangeCount
      : ((int) ($curChangeCount + 1));
    $dk = function($param, $dv) use ($state) {return $state;};
    $dl = 0;
    $dm = Vector{0, $a($a7, $string_of_int($nextChangeCount))};
    $dn = 0;
    $dp = $element(
      Vector{
        0,
        function($dt, $du) use ($dl,$dm,$dn,$render__0) {
          return $render__0($dn, $dm, $dl, $dt, $du);
        }
      }
    );
    $dq = 0;
    return Vector{
      0,
      Vector{0, $size, $nextChangeCount},
      Vector{
        1,
        $element(
          Vector{
            0,
            function($dr, $ds) use ($a8,$children,$dq,$render__1) {
              return $render__1($a8, $dq, $children, $dr, $ds);
            }
          }
        ),
        $dp
      },
      $dk
    };
  };
  $render__4 = function($opt, $children, $dc, $self) use ($a9,$a_,$element,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $initialText = $sth;
    }
    else {$initialText = $a_;}
    if ($dc) {
      $sth__0 = $dc[1];
      $state = $sth__0;
    }
    else {$state = $initialText;}
    $dd = function($param, $di) use ($state) {return $state;};
    $de = 0;
    $df = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function($dg, $dh) use ($a9,$de,$df,$render__0) {
            return $render__0($df, $a9, $de, $dg, $dh);
          }
        }
      ),
      $dd
    };
  };
  $render__5 = function($children, $opt, $self) use ($a,$ba,$bb,$caml_int_of_string,$print_string,$render__0,$string_of_int) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = 0;}
    $c6 = function($param, $db) use ($caml_int_of_string) {
      $next = $db[1];
      return $caml_int_of_string($next);
    };
    $c7 = 0;
    $c8 = Vector{0, $a($ba, $string_of_int($state))};
    $c9 = Vector{
      0,
      function($e) use ($bb,$print_string) {return $print_string($bb);}
    };
    return Vector{
      0,
      $state,
      Vector{
        0,
        function($c_, $da) use ($c7,$c8,$c9,$render__0) {
          return $render__0($c9, $c8, $c7, $c_, $da);
        }
      },
      $c6
    };
  };
  $render__6 = function($shouldControlInput, $children, $opt, $self) use ($bc,$bd,$be,$bf,$control,$element,$nonReducer,$render__0,$render__4,$render__5) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = $bf;}
    $cW = 0;
    $input = $element(
      Vector{
        0,
        function($c4, $c5) use ($bc,$cW,$render__4) {
          return $render__4($bc, $cW, $c4, $c5);
        }
      }
    );
    $input__0 = 0 === $shouldControlInput ? $input : ($control($input, $be));
    $cX = 0;
    $cY = $element(
      Vector{
        0,
        function($c2, $c3) use ($cX,$render__5) {
          return $render__5($cX, $c2, $c3);
        }
      }
    );
    $cZ = 0;
    return Vector{
      0,
      $state,
      Vector{
        1,
        $element(
          Vector{
            0,
            function($c0, $c1) use ($bd,$cZ,$input__0,$render__0) {
              return $render__0($cZ, $bd, $input__0, $c0, $c1);
            }
          }
        ),
        $cY
      },
      $nonReducer
    };
  };
  $render__7 = function($anyProp, $size, $children, $opt, $self) use ($render__0) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = Vector{0, $anyProp, $anyProp};}
    $cQ = function($param, $action) use ($state) {return $state;};
    $cR = 0;
    $cS = Vector{0, $size};
    $cT = 0;
    return Vector{
      0,
      $state,
      Vector{
        0,
        function($cU, $cV) use ($cR,$cS,$cT,$render__0) {
          return $render__0($cT, $cS, $cR, $cU, $cV);
        }
      },
      $cQ
    };
  };
  $bg = function($x, $getDefault) use ($caml_call1) {
    if ($x) {$x__0 = $x[1];return $x__0;}
    return $caml_call1($getDefault, 0);
  };
  $onRaf = function($e) use ($bh) {return $bh;};
  $initialStateGetter = function($self, $param) use ($bi,$caml_call1,$onRaf,$request) {
    $request($caml_call1($self[1], $onRaf));
    return $bi;
  };
  $render__8 = function($opt, $param, $state, $self) use ($a,$bg,$bj,$bk,$bl,$bm,$bn,$caml_call1,$domStateToString,$element,$initialStateGetter,$int__1,$onRaf,$render__0,$request,$string_of_int) {
    ;
    $state__0 = $bg(
      $state,
      function($cP) use ($initialStateGetter,$self) {
        return $initialStateGetter($self, $cP);
      }
    );
    $cA = function($inst, $action) use ($a,$bj,$bk,$caml_call1,$domStateToString,$onRaf,$request,$self,$state__0) {
      $match = $inst[6][2][1][6];
      $deepestDiv = $match[1];
      $divStateStr = $domStateToString($deepestDiv[5][1]);
      $request($caml_call1($self[1], $onRaf));
      return $a($state__0, $a($bk, $a($divStateStr, $bj)));
    };
    $cB = 0;
    $cC = Vector{0, $a($bl, $string_of_int($int__1(10)))};
    $cD = 0;
    $cE = $element(
      Vector{
        0,
        function($cN, $cO) use ($cB,$cC,$cD,$render__0) {
          return $render__0($cD, $cC, $cB, $cN, $cO);
        }
      }
    );
    $cF = 0;
    $cG = $element(
      Vector{
        0,
        function($cL, $cM) use ($bm,$cE,$cF,$render__0) {
          return $render__0($cF, $bm, $cE, $cL, $cM);
        }
      }
    );
    $cH = 0;
    $cI = 0;
    return Vector{
      0,
      $state__0,
      Vector{
        1,
        $element(
          Vector{
            0,
            function($cJ, $cK) use ($bn,$cH,$cI,$render__0) {
              return $render__0($cI, $bn, $cH, $cJ, $cK);
            }
          }
        ),
        $cG
      },
      $cA
    };
  };
  $render__9 = function($opt, $children) use ($bo,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $bo;}
    $cv = 0;
    $cw = Vector{0, $txt};
    $cx = 0;
    return function($cy, $cz) use ($cv,$cw,$cx,$render__0) {
      return $render__0($cx, $cw, $cv, $cy, $cz);
    };
  };
  
  $log($bp);
  
  $startSeconds = $caml_sys_time(0);
  
  $suppress[1] = 0;
  
  $i__0 = 0;
  
  for (;;) {
    $stateless = $element(Vector{0, $render__9($bs, 0)});
    $printSection($bt);
    $containerRoot = $create(0);
    $j__0 = 0;
    for (;;) {
      $b1 = $element(Vector{0, $render__9($b0, 0)});
      $render(
        $containerRoot,
        $element(
          Vector{
            0,
            (function($cs) use ($b2,$render__2) {
               return function($ct, $cu) use ($b2,$cs,$render__2) {
                 return $render__2($b2, $cs, $ct, $cu);
               };
             })($b1)
          }
        )
      );
      $b3 = (int) ($j__0 + 1);
      if (10 !== $j__0) {$j__0 = $b3;continue;}
      $printSection($bu);
      $counterRoot = $create(0);
      $bv = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function($stateless, $cp) use ($bw,$render__3) {
               return function($cq, $cr) use ($bw,$cp,$render__3,$stateless) {
                 return $render__3($bw, $cp, $stateless, $cq, $cr);
               };
             })($stateless, $bv)
          }
        )
      );
      $printRoot($bx, $counterRoot);
      $by = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function($stateless, $cm) use ($bz,$render__3) {
               return function($cn, $co) use ($bz,$cm,$render__3,$stateless) {
                 return $render__3($bz, $cm, $stateless, $cn, $co);
               };
             })($stateless, $by)
          }
        )
      );
      $printRoot($bA, $counterRoot);
      $bB = 8;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function($stateless, $cj) use ($bC,$render__3) {
               return function($ck, $cl) use ($bC,$cj,$render__3,$stateless) {
                 return $render__3($bC, $cj, $stateless, $ck, $cl);
               };
             })($stateless, $bB)
          }
        )
      );
      $printRoot($bD, $counterRoot);
      $printSection($bE);
      $appRoot = $create(0);
      $bF = 0;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function($stateless, $cg) use ($render__6) {
               return function($ch, $ci) use ($cg,$render__6,$stateless) {
                 return $render__6($cg, $stateless, $ch, $ci);
               };
             })($stateless, $bF)
          }
        )
      );
      $printRoot($bG, $appRoot);
      $bH = 0;
      $bI = 1;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function($cc, $cd) use ($render__6) {
               return function($ce, $cf) use ($cc,$cd,$render__6) {
                 return $render__6($cd, $cc, $ce, $cf);
               };
             })($bH, $bI)
          }
        )
      );
      $printRoot($bJ, $appRoot);
      $printSection($bK);
      $animRoot = $create(0);
      $render(
        $animRoot,
        $element(
          Vector{
            0,
            function($ca, $cb) use ($bL,$bM,$render__8) {
              return $render__8($bM, $bL, $ca, $cb);
            }
          }
        )
      );
      $printRoot($bN, $animRoot);
      $tick(0);
      $printRoot($bO, $animRoot);
      $tick(0);
      $printRoot($bP, $animRoot);
      $clearAll(0);
      $printSection($bQ);
      $polyRoot = $create(0);
      $bR = 0;
      $render(
        $polyRoot,
        $element(
          Vector{
            0,
            (function($b8) use ($bS,$bT,$render__7) {
               return function($b9, $b_) use ($b8,$bS,$bT,$render__7) {
                 return $render__7($bT, $bS, $b8, $b9, $b_);
               };
             })($bR)
          }
        )
      );
      $printRoot($bU, $polyRoot);
      $anotherPolyRoot = $create(0);
      $bV = 0;
      $bX = 0;
      $render(
        $anotherPolyRoot,
        $element(
          Vector{
            0,
            (function($b4, $b5) use ($bW,$render__7) {
               return function($b6, $b7) use ($b4,$b5,$bW,$render__7) {
                 return $render__7($b5, $bW, $b4, $b6, $b7);
               };
             })($bV, $bX)
          }
        )
      );
      $printRoot($bY, $anotherPolyRoot);
      $bZ = (int) ($i__0 + 1);
      if (0 !== $i__0) {$i__0 = $bZ;goto a_continue;}
      $endSeconds = $caml_sys_time(0);
      $log(
        $a($bq, $string_of_int((int) (($endSeconds - $startSeconds) * 1000)))
      );
      $f__0 = $caml_alloc_dummy_function(1, 2);
      $z__0 = varray[];
      $caml_update_dummy($f__0, function($x, $y) {return 1;});
      $caml_update_dummy($z__0, Vector{0, Vector{0, $f__0, $br}});
      if ($z__0) {
        $match = $z__0[1];
        $str = $match[2];
        $f__1 = $match[1];
        $log($a($str, $string_of_int($caml_call2($f__1, 0, 0))));
      }
      $do_at_exit(0);
    }
    a_continue:;
    
  }
  a_break:

}

main();