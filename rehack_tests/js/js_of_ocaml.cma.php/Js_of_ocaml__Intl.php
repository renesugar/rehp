<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Intl.php
 */

namespace Rehack;

final class Js_of_ocaml__Intl {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $CamlinternalOO = CamlinternalOO::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__Intl::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Intl;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function(dynamic $f, dynamic $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function(dynamic $f, dynamic $a0, dynamic $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function(dynamic $f, dynamic $a0, dynamic $a1, dynamic $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst__3 = $caml_new_string("");
    $cst__2 = $caml_new_string("");
    $cst__1 = $caml_new_string("");
    $cst__0 = $caml_new_string("");
    $cst = $caml_new_string("");
    $cst_localeMatcher = $caml_new_string("localeMatcher");
    $shared = Vector{
      0,
      $caml_new_string("sensitivity"),
      $caml_new_string("caseFirst"),
      $caml_new_string("ignorePunctuation"),
      $caml_new_string("localeMatcher"),
      $caml_new_string("usage"),
      $caml_new_string("numeric")
    };
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $CamlinternalOO = $global_data["CamlinternalOO"];
    $mC = Vector{
      0,
      $caml_new_string("_type"),
      $caml_new_string("localeMatcher")
    };
    $mD = Vector{
      0,
      $caml_new_string("year"),
      $caml_new_string("weekday"),
      $caml_new_string("timeZoneName"),
      $caml_new_string("timeZone"),
      $caml_new_string("second"),
      $caml_new_string("month"),
      $caml_new_string("minute"),
      $caml_new_string("localeMatcher"),
      $caml_new_string("hourCycle"),
      $caml_new_string("hour12"),
      $caml_new_string("hour"),
      $caml_new_string("formatMatcher"),
      $caml_new_string("era"),
      $caml_new_string("day")
    };
    $mE = Vector{
      0,
      $caml_new_string("useGrouping"),
      $caml_new_string("style"),
      $caml_new_string("minimumSignificantDigits"),
      $caml_new_string("minimumIntegerDigits"),
      $caml_new_string("minimumFractionDigits"),
      $caml_new_string("maximumSignificantDigits"),
      $caml_new_string("maximumFractionDigits"),
      $caml_new_string("localeMatcher"),
      $caml_new_string("currencyDisplay"),
      $caml_new_string("currency")
    };
    $mF = Vector{
      0,
      $caml_new_string("localeMatcher"),
      $caml_new_string("_type")
    };
    $mG = Vector{
      0,
      $caml_new_string("usage"),
      $caml_new_string("sensitivity"),
      $caml_new_string("numeric"),
      $caml_new_string("localeMatcher"),
      $caml_new_string("ignorePunctuation"),
      $caml_new_string("caseFirst")
    };
    $mH = Vector{
      0,
      $caml_new_string("hour"),
      $caml_new_string("hour12"),
      $caml_new_string("year"),
      $caml_new_string("minute"),
      $caml_new_string("second"),
      $caml_new_string("timeZone"),
      $caml_new_string("hourCycle"),
      $caml_new_string("day"),
      $caml_new_string("era"),
      $caml_new_string("localeMatcher"),
      $caml_new_string("month"),
      $caml_new_string("weekday"),
      $caml_new_string("timeZoneName"),
      $caml_new_string("formatMatcher")
    };
    $mI = Vector{0, $caml_new_string("localeMatcher")};
    $mJ = Vector{
      0,
      $caml_new_string("minimumIntegerDigits"),
      $caml_new_string("maximumFractionDigits"),
      $caml_new_string("minimumFractionDigits"),
      $caml_new_string("minimumSignificantDigits"),
      $caml_new_string("useGrouping"),
      $caml_new_string("style"),
      $caml_new_string("localeMatcher"),
      $caml_new_string("currencyDisplay"),
      $caml_new_string("maximumSignificantDigits"),
      $caml_new_string("currency")
    };
    $mK = Vector{0, 0, 0, 0};
    $object_options = function(dynamic $param) use ($CamlinternalOO,$caml_call1,$caml_call2,$caml_call3,$cst,$cst_localeMatcher,$mI,$mK) {
      $o5 = function(dynamic $self, dynamic $localeMatcher) use ($CamlinternalOO,$caml_call1,$caml_call2,$caml_call3,$cst,$cst_localeMatcher,$mI,$mK) {
        if (! $mK[1]) {
          $o7 = $caml_call1($CamlinternalOO[16], $mI);
          $o8 = $caml_call2($CamlinternalOO[3], $o7, $cst);
          $o9 = $caml_call2($CamlinternalOO[7], $o7, $cst_localeMatcher);
          $o_ = function(dynamic $self_1) use ($o8) {
            $env = $self_1[$o8 + 1];
            return $env[1];
          };
          $caml_call3($CamlinternalOO[10], $o7, $o9, $o_);
          $pa = function(dynamic $pb) use ($CamlinternalOO,$caml_call2,$o7,$o8) {
            $pc = $caml_call2($CamlinternalOO[24], 0, $o7);
            $pc[$o8 + 1] = $pb;
            return $pc;
          };
          $caml_call1($CamlinternalOO[17], $o7);
          $mK[1] = $pa;
        }
        return $caml_call1($mK[1], Vector{0, $localeMatcher});
      };
      $o6 = "best fit";
      return (function(dynamic $t0, dynamic $param) {
         return (object)darray["localeMatcher"=>$t0];
       })($o6, $o5);
    };
    $mL = Vector{0, 0, 0, 0};
    $options = function(dynamic $param) use ($CamlinternalOO,$Js_of_ocaml_Js,$caml_call1,$caml_call2,$cst__0,$mG,$mL,$shared) {
      $oG = function
      (dynamic $self, dynamic $localeMatcher, dynamic $usage, dynamic $sensitivity, dynamic $ignorePunctuation, dynamic $numeric, dynamic $caseFirst) use ($CamlinternalOO,$caml_call1,$caml_call2,$cst__0,$mG,$mL,$shared) {
        if (! $mL[1]) {
          $oN = $caml_call1($CamlinternalOO[16], $shared);
          $oO = $caml_call2($CamlinternalOO[3], $oN, $cst__0);
          $oP = $caml_call2($CamlinternalOO[8], $oN, $mG);
          $oQ = $oP[1];
          $oR = $oP[2];
          $oS = $oP[3];
          $oT = $oP[4];
          $oU = $oP[5];
          $oV = $oP[6];
          $oW = function(dynamic $self_2) use ($oO) {
            $env = $self_2[$oO + 1];
            return $env[1];
          };
          $oX = function(dynamic $self_2) use ($oO) {
            $env = $self_2[$oO + 1];
            return $env[2];
          };
          $oY = function(dynamic $self_2) use ($oO) {
            $env = $self_2[$oO + 1];
            return $env[3];
          };
          $oZ = function(dynamic $self_2) use ($oO) {
            $env = $self_2[$oO + 1];
            return $env[4];
          };
          $o0 = function(dynamic $self_2) use ($oO) {
            $env = $self_2[$oO + 1];
            return $env[5];
          };
          $o1 = Vector{
            0,
            $oT,
            function(dynamic $self_2) use ($oO) {
              $env = $self_2[$oO + 1];
              return $env[6];
            },
            $oQ,
            $o0,
            $oR,
            $oZ,
            $oU,
            $oY,
            $oS,
            $oX,
            $oV,
            $oW
          };
          $caml_call2($CamlinternalOO[11], $oN, $o1);
          $o2 = function(dynamic $o3) use ($CamlinternalOO,$caml_call2,$oN,$oO) {
            $o4 = $caml_call2($CamlinternalOO[24], 0, $oN);
            $o4[$oO + 1] = $o3;
            return $o4;
          };
          $caml_call1($CamlinternalOO[17], $oN);
          $mL[1] = $o2;
        }
        return $caml_call1(
          $mL[1],
          Vector{
            0,
            $caseFirst,
            $numeric,
            $ignorePunctuation,
            $sensitivity,
            $usage,
            $localeMatcher
          }
        );
      };
      $oH = "false";
      $oI = $Js_of_ocaml_Js[8];
      $oJ = $Js_of_ocaml_Js[8];
      $oK = "variant";
      $oL = "sort";
      $oM = "best fit";
      return (function
       (dynamic $t1, dynamic $t2, dynamic $t3, dynamic $t4, dynamic $t5, dynamic $t6, dynamic $param) {
         return (object)darray[
          "localeMatcher"=>$t1,
          "usage"=>$t2,
          "sensitivity"=>$t3,
          "ignorePunctuation"=>$t4,
          "numeric"=>$t5,
          "caseFirst"=>$t6];
       })($oM, $oL, $oK, $oJ, $oI, $oH, $oG);
    };
    $Collator = Vector{0, $object_options, $options};
    $mM = Vector{0, 0, 0, 0};
    $options__0 = function(dynamic $param) use ($CamlinternalOO,$Js_of_ocaml_Js,$caml_call1,$caml_call2,$cst__1,$mD,$mH,$mM) {
      $nU = function
      (dynamic $self, dynamic $localeMatcher, dynamic $timeZone, dynamic $hour12, dynamic $hourCycle, dynamic $formatMatcher, dynamic $weekday, dynamic $era, dynamic $year, dynamic $month, dynamic $day, dynamic $hour, dynamic $minute, dynamic $second, dynamic $timeZoneName) use ($CamlinternalOO,$caml_call1,$caml_call2,$cst__1,$mD,$mH,$mM) {
        if (! $mM[1]) {
          $n9 = $caml_call1($CamlinternalOO[16], $mH);
          $n_ = $caml_call2($CamlinternalOO[3], $n9, $cst__1);
          $oa = $caml_call2($CamlinternalOO[8], $n9, $mD);
          $ob = $oa[1];
          $oc = $oa[2];
          $od = $oa[3];
          $oe = $oa[4];
          $of = $oa[5];
          $og = $oa[6];
          $oh = $oa[7];
          $oi = $oa[8];
          $oj = $oa[9];
          $ok = $oa[10];
          $ol = $oa[11];
          $om = $oa[12];
          $on = $oa[13];
          $oo = $oa[14];
          $op = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[1];
          };
          $oq = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[2];
          };
          $or = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[3];
          };
          $os = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[4];
          };
          $ot = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[5];
          };
          $ou = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[6];
          };
          $ov = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[7];
          };
          $ow = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[8];
          };
          $ox = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[9];
          };
          $oy = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[10];
          };
          $oz = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[11];
          };
          $oA = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[12];
          };
          $oB = function(dynamic $self_3) use ($n_) {
            $env = $self_3[$n_ + 1];
            return $env[13];
          };
          $oC = Vector{
            0,
            $oi,
            function(dynamic $self_3) use ($n_) {
              $env = $self_3[$n_ + 1];
              return $env[14];
            },
            $oe,
            $oB,
            $ok,
            $oA,
            $oj,
            $oz,
            $om,
            $oy,
            $oc,
            $ox,
            $on,
            $ow,
            $ob,
            $ov,
            $og,
            $ou,
            $oo,
            $ot,
            $ol,
            $os,
            $oh,
            $or,
            $of,
            $oq,
            $od,
            $op
          };
          $caml_call2($CamlinternalOO[11], $n9, $oC);
          $oD = function(dynamic $oE) use ($CamlinternalOO,$caml_call2,$n9,$n_) {
            $oF = $caml_call2($CamlinternalOO[24], 0, $n9);
            $oF[$n_ + 1] = $oE;
            return $oF;
          };
          $caml_call1($CamlinternalOO[17], $n9);
          $mM[1] = $oD;
        }
        return $caml_call1(
          $mM[1],
          Vector{
            0,
            $timeZoneName,
            $second,
            $minute,
            $hour,
            $day,
            $month,
            $year,
            $era,
            $weekday,
            $formatMatcher,
            $hourCycle,
            $hour12,
            $timeZone,
            $localeMatcher
          }
        );
      };
      $nV = $Js_of_ocaml_Js[3];
      $nW = $Js_of_ocaml_Js[3];
      $nX = $Js_of_ocaml_Js[3];
      $nY = $Js_of_ocaml_Js[3];
      $nZ = $Js_of_ocaml_Js[3];
      $n0 = $Js_of_ocaml_Js[3];
      $n1 = $Js_of_ocaml_Js[3];
      $n2 = $Js_of_ocaml_Js[3];
      $n3 = $Js_of_ocaml_Js[3];
      $n4 = "best fit";
      $n5 = $Js_of_ocaml_Js[3];
      $n6 = $Js_of_ocaml_Js[3];
      $n7 = $Js_of_ocaml_Js[3];
      $n8 = "best fit";
      return (function
       (dynamic $t7, dynamic $t8, dynamic $t9, dynamic $t10, dynamic $t11, dynamic $t12, dynamic $t13, dynamic $t14, dynamic $t15, dynamic $t16, dynamic $t17, dynamic $t18, dynamic $t19, dynamic $t20, dynamic $param) {
         return (object)darray[
          "localeMatcher"=>$t7,
          "timeZone"=>$t8,
          "hour12"=>$t9,
          "hourCycle"=>$t10,
          "formatMatcher"=>$t11,
          "weekday"=>$t12,
          "era"=>$t13,
          "year"=>$t14,
          "month"=>$t15,
          "day"=>$t16,
          "hour"=>$t17,
          "minute"=>$t18,
          "second"=>$t19,
          "timeZoneName"=>$t20];
       })(
        $n8,
        $n7,
        $n6,
        $n5,
        $n4,
        $n3,
        $n2,
        $n1,
        $n0,
        $nZ,
        $nY,
        $nX,
        $nW,
        $nV,
        $nU
      );
    };
    $DateTimeFormat = Vector{0, $object_options, $options__0};
    $mN = Vector{0, 0, 0, 0};
    $options__1 = function(dynamic $param) use ($CamlinternalOO,$Js_of_ocaml_Js,$caml_call1,$caml_call2,$cst__2,$mE,$mJ,$mN) {
      $nj = function
      (dynamic $self, dynamic $localeMatcher, dynamic $style, dynamic $currency, dynamic $currencyDisplay, dynamic $useGrouping, dynamic $minimumIntegerDigits, dynamic $minimumFractionDigits, dynamic $maximumFractionDigits, dynamic $minimumSignificantDigits, dynamic $maximumSignificantDigits) use ($CamlinternalOO,$caml_call1,$caml_call2,$cst__2,$mE,$mJ,$mN) {
        if (! $mN[1]) {
          $nu = $caml_call1($CamlinternalOO[16], $mJ);
          $nv = $caml_call2($CamlinternalOO[3], $nu, $cst__2);
          $nw = $caml_call2($CamlinternalOO[8], $nu, $mE);
          $nx = $nw[1];
          $ny = $nw[2];
          $nz = $nw[3];
          $nA = $nw[4];
          $nB = $nw[5];
          $nC = $nw[6];
          $nD = $nw[7];
          $nE = $nw[8];
          $nF = $nw[9];
          $nG = $nw[10];
          $nH = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[1];
          };
          $nI = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[2];
          };
          $nJ = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[3];
          };
          $nK = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[4];
          };
          $nL = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[5];
          };
          $nM = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[6];
          };
          $nN = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[7];
          };
          $nO = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[8];
          };
          $nP = function(dynamic $self_4) use ($nv) {
            $env = $self_4[$nv + 1];
            return $env[9];
          };
          $nQ = Vector{
            0,
            $nE,
            function(dynamic $self_4) use ($nv) {
              $env = $self_4[$nv + 1];
              return $env[10];
            },
            $ny,
            $nP,
            $nG,
            $nO,
            $nF,
            $nN,
            $nx,
            $nM,
            $nA,
            $nL,
            $nB,
            $nK,
            $nD,
            $nJ,
            $nz,
            $nI,
            $nC,
            $nH
          };
          $caml_call2($CamlinternalOO[11], $nu, $nQ);
          $nR = function(dynamic $nS) use ($CamlinternalOO,$caml_call2,$nu,$nv) {
            $nT = $caml_call2($CamlinternalOO[24], 0, $nu);
            $nT[$nv + 1] = $nS;
            return $nT;
          };
          $caml_call1($CamlinternalOO[17], $nu);
          $mN[1] = $nR;
        }
        return $caml_call1(
          $mN[1],
          Vector{
            0,
            $maximumSignificantDigits,
            $minimumSignificantDigits,
            $maximumFractionDigits,
            $minimumFractionDigits,
            $minimumIntegerDigits,
            $useGrouping,
            $currencyDisplay,
            $currency,
            $style,
            $localeMatcher
          }
        );
      };
      $nk = $Js_of_ocaml_Js[3];
      $nl = $Js_of_ocaml_Js[3];
      $nm = $Js_of_ocaml_Js[3];
      $nn = $Js_of_ocaml_Js[3];
      $no = $Js_of_ocaml_Js[3];
      $np = $Js_of_ocaml_Js[7];
      $nq = $Js_of_ocaml_Js[3];
      $nr = $Js_of_ocaml_Js[3];
      $ns = "decimal";
      $nt = "best fit";
      return (function
       (dynamic $t21, dynamic $t22, dynamic $t23, dynamic $t24, dynamic $t25, dynamic $t26, dynamic $t27, dynamic $t28, dynamic $t29, dynamic $t30, dynamic $param) {
         return (object)darray[
          "localeMatcher"=>$t21,
          "style"=>$t22,
          "currency"=>$t23,
          "currencyDisplay"=>$t24,
          "useGrouping"=>$t25,
          "minimumIntegerDigits"=>$t26,
          "minimumFractionDigits"=>$t27,
          "maximumFractionDigits"=>$t28,
          "minimumSignificantDigits"=>$t29,
          "maximumSignificantDigits"=>$t30];
       })($nt, $ns, $nr, $nq, $np, $no, $nn, $nm, $nl, $nk, $nj);
    };
    $NumberFormat = Vector{0, $object_options, $options__1};
    $mO = Vector{0, 0, 0, 0};
    $options__2 = function(dynamic $param) use ($CamlinternalOO,$caml_call1,$caml_call2,$cst__3,$mC,$mF,$mO) {
      $m7 = function(dynamic $self, dynamic $localeMatcher, dynamic $type) use ($CamlinternalOO,$caml_call1,$caml_call2,$cst__3,$mC,$mF,$mO) {
        if (! $mO[1]) {
          $m_ = $caml_call1($CamlinternalOO[16], $mC);
          $na = $caml_call2($CamlinternalOO[3], $m_, $cst__3);
          $nb = $caml_call2($CamlinternalOO[8], $m_, $mF);
          $nc = $nb[1];
          $nd = $nb[2];
          $ne = function(dynamic $self_5) use ($na) {
            $env = $self_5[$na + 1];
            return $env[1];
          };
          $nf = Vector{
            0,
            $nc,
            function(dynamic $self_5) use ($na) {
              $env = $self_5[$na + 1];
              return $env[2];
            },
            $nd,
            $ne
          };
          $caml_call2($CamlinternalOO[11], $m_, $nf);
          $ng = function(dynamic $nh) use ($CamlinternalOO,$caml_call2,$m_,$na) {
            $ni = $caml_call2($CamlinternalOO[24], 0, $m_);
            $ni[$na + 1] = $nh;
            return $ni;
          };
          $caml_call1($CamlinternalOO[17], $m_);
          $mO[1] = $ng;
        }
        return $caml_call1($mO[1], Vector{0, $type, $localeMatcher});
      };
      $m8 = "cardinal";
      $m9 = "best fit";
      return (function(dynamic $t31, dynamic $t32, dynamic $param) {
         return (object)darray["localeMatcher"=>$t31,"type"=>$t32];
       })($m9, $m8, $m7);
    };
    $PluralRules = Vector{0, $object_options, $options__2};
    $mP = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -475689828, 237), $x);
    };
    $mQ = $Js_of_ocaml_Js[50][1];
    $intl = (function(dynamic $t33, dynamic $param) {return $t33->Intl;})($mQ, $mP);
    $mR = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -438302079, 238), $x);
    };
    $mS = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -475689828, 239), $x);
    };
    $mT = $Js_of_ocaml_Js[50][1];
    $mU = (function(dynamic $t34, dynamic $param) {return $t34->Intl;})($mT, $mS);
    $collator_constr = (function(dynamic $t35, dynamic $param) {return $t35->Collator;
     })($mU, $mR);
    $mV = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 568382385, 240), $x);
    };
    $mW = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -475689828, 241), $x);
    };
    $mX = $Js_of_ocaml_Js[50][1];
    $mY = (function(dynamic $t36, dynamic $param) {return $t36->Intl;})($mX, $mW);
    $dateTimeFormat_constr = (function(dynamic $t37, dynamic $param) {return $t37->DateTimeFormat;
     })($mY, $mV);
    $mZ = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 941696479, 242), $x);
    };
    $m0 = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -475689828, 243), $x);
    };
    $m1 = $Js_of_ocaml_Js[50][1];
    $m2 = (function(dynamic $t38, dynamic $param) {return $t38->Intl;})($m1, $m0);
    $numberFormat_constr = (function(dynamic $t39, dynamic $param) {return $t39->NumberFormat;
     })($m2, $mZ);
    $m3 = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 544366260, 244), $x);
    };
    $m4 = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -475689828, 245), $x);
    };
    $m5 = $Js_of_ocaml_Js[50][1];
    $m6 = (function(dynamic $t40, dynamic $param) {return $t40->Intl;})($m5, $m4);
    $pluralRules_constr = (function(dynamic $t41, dynamic $param) {return $t41->PluralRules;
     })($m6, $m3);
    $is_supported = function(dynamic $param) use ($Js_of_ocaml_Js,$caml_call1,$intl) {
      return $caml_call1($Js_of_ocaml_Js[6][5], $intl);
    };
    $Js_of_ocaml_Intl = Vector{
      0,
      $Collator,
      $DateTimeFormat,
      $NumberFormat,
      $PluralRules,
      $intl,
      $collator_constr,
      $dateTimeFormat_constr,
      $numberFormat_constr,
      $pluralRules_constr,
      $is_supported
    };
    
    $runtime["caml_register_global"](
      70,
      $Js_of_ocaml_Intl,
      "Js_of_ocaml__Intl"
    );

  }
}