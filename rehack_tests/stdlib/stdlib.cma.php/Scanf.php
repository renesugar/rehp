<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Scanf {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $make_scanf = new Ref();
    $take_fmtty_format_readers = new Ref();
    $take_fmtty_format_readers__0 = new Ref();
    $take_format_readers = new Ref();
    $take_ignored_format_readers = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_bytes_get = $runtime["caml_bytes_get"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_int_of_string = $runtime["caml_int_of_string"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $is_int = $runtime["is_int"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_end_of_input_not_found = $string("end of input not found");
    $cst_scanf_bad_conversion_a = $string("scanf: bad conversion \"%a\"");
    $cst_scanf_bad_conversion_t = $string("scanf: bad conversion \"%t\"");
    $cst_scanf_missing_reader = $string("scanf: missing reader");
    $cst_scanf_bad_conversion_custom_converter = $string(
      "scanf: bad conversion \"%?\" (custom converter)"
    );
    $cst_scanf_bad_conversion = $string("scanf: bad conversion \"%*\"");
    $cst_scanf_bad_conversion__1 = $string("scanf: bad conversion \"%*\"");
    $cst_scanf_bad_conversion__0 = $string("scanf: bad conversion \"%-\"");
    $cst_scanf_bad_conversion__2 = $string("scanf: bad conversion \"%*\"");
    $cst__2 = $string("\"");
    $cst__3 = $string("\"");
    $cst__1 = $string("\"");
    $cst_in_format = $string(" in format \"");
    $cst_an = $string("an");
    $cst_x = $string("x");
    $cst_nfinity = $string("nfinity");
    $cst_digits = $string("digits");
    $cst_decimal_digits = $string("decimal digits");
    $cst_0b = $string("0b");
    $cst_0o = $string("0o");
    $cst_0u = $string("0u");
    $cst_0x = $string("0x");
    $cst_false = $string("false");
    $cst_true = $string("true");
    $cst_not_a_valid_float_in_hexadecimal_notation = $string(
      "not a valid float in hexadecimal notation"
    );
    $cst_no_dot_or_exponent_part_found_in_float_token = $string(
      "no dot or exponent part found in float token"
    );
    $cst__0 = $string("-");
    $cst_unnamed_function = $string("unnamed function");
    $cst_unnamed_character_string = $string("unnamed character string");
    $cst_unnamed_Pervasives_input_channel = $string(
      "unnamed Pervasives input channel"
    );
    $cst = $string("-");
    $cst_Scanf_Scan_failure = $string("Scanf.Scan_failure");
    $cst_binary = $string("binary");
    $cst_octal = $string("octal");
    $cst_hexadecimal = $string("hexadecimal");
    $cst_a_Char = $string("a Char");
    $cst_a_String = $string("a String");
    $CamlinternalFormat =  CamlinternalFormat::get ();
    $CamlinternalFormatBasics =  CamlinternalFormatBasics::get ();
    $String =  String_::get ();
    $Failure =  Failure::get ();
    $Pervasives =  Pervasives::get ();
    $Assert_failure =  Assert_failure::get ();
    $Buffer =  Buffer::get ();
    $End_of_file =  End_of_file::get ();
    $Invalid_argument =  Invalid_argument::get ();
    $Printf =  Printf::get ();
    $List =  List_::get ();
    $Not_found =  Not_found::get ();
    $r_ = Vector{0, 91};
    $q_ = Vector{0, 123};
    $s_ = Vector{0, $string("scanf.ml"), 1455, 13};
    $t_ = Vector{0, Vector{3, 0, Vector{10, 0}}, $string("%S%!")};
    $p_ = Vector{0, 37, $string("")};
    $o_ = Vector{
      0,
      Vector{
        11,
        $string("scanf: bad input at char number "),
        Vector{4, 3, 0, 0, Vector{11, $string(": "), Vector{2, 0, 0}}}
      },
      $string("scanf: bad input at char number %i: %s")
    };
    $n_ = Vector{
      0,
      Vector{
        11,
        $string("the character "),
        Vector{1, Vector{11, $string(" cannot start a boolean"), 0}}
      },
      $string("the character %C cannot start a boolean")
    };
    $m_ = Vector{
      0,
      Vector{
        11,
        $string("bad character hexadecimal encoding \\"),
        Vector{0, Vector{0, 0}}
      },
      $string("bad character hexadecimal encoding \\%c%c")
    };
    $l_ = Vector{
      0,
      Vector{
        11,
        $string("bad character decimal encoding \\"),
        Vector{0, Vector{0, Vector{0, 0}}}
      },
      $string("bad character decimal encoding \\%c%c%c")
    };
    $k_ = Vector{
      0,
      Vector{
        11,
        $string("character "),
        Vector{
          1,
          Vector{
            11,
            $string(" is not a valid "),
            Vector{2, 0, Vector{11, $string(" digit"), 0}}
          }
        }
      },
      $string("character %C is not a valid %s digit")
    };
    $j_ = Vector{
      0,
      Vector{
        11,
        $string("character "),
        Vector{1, Vector{11, $string(" is not a decimal digit"), 0}}
      },
      $string("character %C is not a decimal digit")
    };
    $i_ = Vector{0, $string("scanf.ml"), 555, 9};
    $h_ = Vector{
      0,
      Vector{11, $string("invalid boolean '"), Vector{2, 0, Vector{12, 39, 0}}
      },
      $string("invalid boolean '%s'")
    };
    $g_ = Vector{
      0,
      Vector{
        11,
        $string("looking for "),
        Vector{1, Vector{11, $string(", found "), Vector{1, 0}}}
      },
      $string("looking for %C, found %C")
    };
    $f_ = Vector{
      0,
      Vector{
        11,
        $string("scanning of "),
        Vector{
          2,
          0,
          Vector{
            11,
            $string(
              " failed: premature end of file occurred before end of token"
            ),
            0
          }
        }
      },
      $string(
        "scanning of %s failed: premature end of file occurred before end of token"
      )
    };
    $e_ = Vector{
      0,
      Vector{
        11,
        $string("scanning of "),
        Vector{
          2,
          0,
          Vector{
            11,
            $string(" failed: the specified length was too short for token"),
            0
          }
        }
      },
      $string(
        "scanning of %s failed: the specified length was too short for token"
      )
    };
    $d_ = Vector{
      0,
      Vector{11, $string("illegal escape character "), Vector{1, 0}},
      $string("illegal escape character %C")
    };
    $null_char = 0;
    $next_char = (dynamic $ib) ==> {
      try {
        $c = $call1($ib[7], 0);
        $ib[2] = $c;
        $ib[3] = 1;
        $ib[4] = (int) ($ib[4] + 1);
        if (10 === $c) {$ib[5] = (int) ($ib[5] + 1);}
        return $c;
      }
      catch(\Throwable $bH_) {
        $bH_ = $runtime["caml_wrap_exception"]($bH_);
        if ($bH_ === $End_of_file) {
          $ib[2] = $null_char;
          $ib[3] = 0;
          $ib[1] = 1;
          return $null_char;
        }
        throw $caml_wrap_thrown_exception_reraise($bH_) as \Throwable;
      }
    };
    $peek_char = (dynamic $ib) ==> {
      return $ib[3] ? $ib[2] : ($next_char($ib));
    };
    $checked_peek_char = (dynamic $ib) ==> {
      $c = $peek_char($ib);
      if ($ib[1]) {
        throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
      }
      return $c;
    };
    $end_of_input = (dynamic $ib) ==> {$peek_char($ib);return $ib[1];};
    $eof = (dynamic $ib) ==> {return $ib[1];};
    $beginning_of_input = (dynamic $ib) ==> {return 0 === $ib[4] ? 1 : (0);};
    $name_of_input = (dynamic $ib) ==> {
      $bG_ = $ib[9];
      if ($is_int($bG_)) {
        return 0 === $bG_
          ? $cst_unnamed_function
          : ($cst_unnamed_character_string);
      }
      else {
        if (0 === $bG_[0]) {return $cst_unnamed_Pervasives_input_channel;}
        $fname = $bG_[1];
        return $fname;
      }
    };
    $char_count = (dynamic $ib) ==> {
      return $ib[3] ? (int) ($ib[4] + -1) : ($ib[4]);
    };
    $line_count = (dynamic $ib) ==> {return $ib[5];};
    $reset_token = (dynamic $ib) ==> {return $call1($Buffer[9], $ib[8]);};
    $invalidate_current_char = (dynamic $ib) ==> {$ib[3] = 0;return 0;};
    $token_string = (dynamic $ib) ==> {
      $token_buffer = $ib[8];
      $tok = $call1($Buffer[2], $token_buffer);
      $call1($Buffer[8], $token_buffer);
      $ib[6] = (int) ($ib[6] + 1);
      return $tok;
    };
    $token_count = (dynamic $ib) ==> {return $ib[6];};
    $skip_char = (dynamic $width, dynamic $ib) ==> {
      $invalidate_current_char($ib);
      return $width;
    };
    $ignore_char = (dynamic $width, dynamic $ib) ==> {
      return $skip_char((int) ($width + -1), $ib);
    };
    $store_char = (dynamic $width, dynamic $ib, dynamic $c) ==> {
      $call2($Buffer[10], $ib[8], $c);
      return $ignore_char($width, $ib);
    };
    $default_token_buffer_size = 1024;
    $create = (dynamic $iname, dynamic $next) ==> {
      return Vector{
        0,
        0,
        $null_char,
        0,
        0,
        0,
        0,
        $next,
        $call1($Buffer[1], $default_token_buffer_size),
        $iname
      };
    };
    $from_string = (dynamic $s) ==> {
      $i = Vector{0, 0};
      $len = $caml_ml_string_length($s);
      $next = (dynamic $param) ==> {
        if ($len <= $i[1]) {
          throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
        }
        $c = $caml_string_get($s, $i[1]);
        $i[1] += 1;
        return $c;
      };
      return $create(1, $next);
    };
    $a_ = 0;
    $from_function = (dynamic $bF_) ==> {return $create($a_, $bF_);};
    $len = 1024;
    $scan_close_at_end = (dynamic $ic) ==> {
      $call1($Pervasives[81], $ic);
      throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
    };
    $scan_raise_at_end = (dynamic $ic) ==> {
      throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
    };
    $from_ic = (dynamic $scan_close_ic, dynamic $iname, dynamic $ic) ==> {
      $buf = $runtime["caml_create_bytes"](1024);
      $i = Vector{0, 0};
      $lim = Vector{0, 0};
      $eof = Vector{0, 0};
      $next = (dynamic $param) ==> {
        if ($i[1] < $lim[1]) {
          $c = $caml_bytes_get($buf, $i[1]);
          $i[1] += 1;
          return $c;
        }
        if ($eof[1]) {
          throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
        }
        $lim[1] = $call4($Pervasives[72], $ic, $buf, 0, $len);
        if (0 === $lim[1]) {$eof[1] = 1;return $call1($scan_close_ic, $ic);}
        $i[1] = 1;
        return $caml_bytes_get($buf, 0);
      };
      return $create($iname, $next);
    };
    $from_ic_close_at_end = (dynamic $bD_, dynamic $bE_) ==> {
      return $from_ic($scan_close_at_end, $bD_, $bE_);
    };
    $from_ic_raise_at_end = (dynamic $bB_, dynamic $bC_) ==> {
      return $from_ic($scan_raise_at_end, $bB_, $bC_);
    };
    $stdin = $from_ic(
      $scan_raise_at_end,
      Vector{1, $cst, $Pervasives[26]},
      $Pervasives[26]
    );
    $open_in_file = (dynamic $open_in, dynamic $fname) ==> {
      if ($caml_string_notequal($fname, $cst__0)) {
        $ic = $call1($open_in, $fname);
        return $from_ic_close_at_end(Vector{1, $fname, $ic}, $ic);
      }
      return $stdin;
    };
    $b_ = $Pervasives[67];
    $open_in = (dynamic $bA_) ==> {return $open_in_file($b_, $bA_);};
    $c_ = $Pervasives[68];
    $open_in_bin = (dynamic $bz_) ==> {return $open_in_file($c_, $bz_);};
    $from_channel = (dynamic $ic) ==> {
      return $from_ic_raise_at_end(Vector{0, $ic}, $ic);
    };
    $close_in = (dynamic $ib) ==> {
      $by_ = $ib[9];
      if ($is_int($by_)) {return 0;}
      else {
        if (0 === $by_[0]) {
          $ic = $by_[1];
          return $call1($Pervasives[81], $ic);
        }
        $ic__0 = $by_[2];
        return $call1($Pervasives[81], $ic__0);
      }
    };
    $memo = Vector{0, 0};
    $memo_from_ic = (dynamic $scan_close_ic, dynamic $ic) ==> {
      try {$bw_ = $call2($List[40], $ic, $memo[1]);return $bw_;}
      catch(\Throwable $bx_) {
        $bx_ = $runtime["caml_wrap_exception"]($bx_);
        if ($bx_ === $Not_found) {
          $ib = $from_ic($scan_close_ic, Vector{0, $ic}, $ic);
          $memo[1] = Vector{0, Vector{0, $ic, $ib}, $memo[1]};
          return $ib;
        }
        throw $caml_wrap_thrown_exception_reraise($bx_) as \Throwable;
      }
    };
    $memo_from_channel = (dynamic $bv_) ==> {
      return $memo_from_ic($scan_raise_at_end, $bv_);
    };
    $Scan_failure = Vector{
      248,
      $cst_Scanf_Scan_failure,
      $runtime["caml_fresh_oo_id"](0)
    };
    $bad_input = (dynamic $s) ==> {
      throw $caml_wrap_thrown_exception(Vector{0, $Scan_failure, $s}) as \Throwable;
    };
    $bad_input_escape = (dynamic $c) ==> {
      return $bad_input($call2($Printf[4], $d_, $c));
    };
    $bad_token_length = (dynamic $message) ==> {
      return $bad_input($call2($Printf[4], $e_, $message));
    };
    $bad_end_of_input = (dynamic $message) ==> {
      return $bad_input($call2($Printf[4], $f_, $message));
    };
    $bad_float = (dynamic $param) ==> {
      return $bad_input($cst_no_dot_or_exponent_part_found_in_float_token);
    };
    $bad_hex_float = (dynamic $param) ==> {
      return $bad_input($cst_not_a_valid_float_in_hexadecimal_notation);
    };
    $character_mismatch_err = (dynamic $c, dynamic $ci) ==> {
      return $call3($Printf[4], $g_, $c, $ci);
    };
    $character_mismatch = (dynamic $c, dynamic $ci) ==> {
      return $bad_input($character_mismatch_err($c, $ci));
    };
    $skip_whites = (dynamic $ib) ==> {
      for (;;) {
        $c = $peek_char($ib);
        $bt_ = 1 - $eof($ib);
        if ($bt_) {
          $bu_ = (int) ($c + -9);
          $switch__0 = 4 < $unsigned_right_shift_32($bu_, 0)
            ? 23 === $bu_ ? 1 : (0)
            : (1 < $unsigned_right_shift_32((int) ($bu_ + -2), 0) ? 1 : (0));
          if ($switch__0) {$invalidate_current_char($ib);continue;}
          return 0;
        }
        return $bt_;
      }
    };
    $check_this_char = (dynamic $ib, dynamic $c) ==> {
      $ci = $checked_peek_char($ib);
      return $ci === $c
        ? $invalidate_current_char($ib)
        : ($character_mismatch($c, $ci));
    };
    $check_newline = (dynamic $ib) ==> {
      $ci = $checked_peek_char($ib);
      if (10 === $ci) {return $invalidate_current_char($ib);}
      if (13 === $ci) {
        $invalidate_current_char($ib);
        return $check_this_char($ib, 10);
      }
      return $character_mismatch(10, $ci);
    };
    $check_char = (dynamic $ib, dynamic $c) ==> {
      return 10 === $c
        ? $check_newline($ib)
        : (32 === $c ? $skip_whites($ib) : ($check_this_char($ib, $c)));
    };
    $token_char = (dynamic $ib) ==> {
      return $caml_string_get($token_string($ib), 0);
    };
    $token_bool = (dynamic $ib) ==> {
      $s = $token_string($ib);
      return $caml_string_notequal($s, $cst_false)
        ? $caml_string_notequal($s, $cst_true)
         ? $bad_input($call2($Printf[4], $h_, $s))
         : (1)
        : (0);
    };
    $integer_conversion_of_char = (dynamic $param) ==> {
      $switcher = (int) ($param + -88);
      if (! (32 < $unsigned_right_shift_32($switcher, 0))) {
        switch($switcher) {
          // FALLTHROUGH
          case 10:
            return 0;
          // FALLTHROUGH
          case 12:
            return 1;
          // FALLTHROUGH
          case 17:
            return 2;
          // FALLTHROUGH
          case 23:
            return 3;
          // FALLTHROUGH
          case 29:
            return 4;
          // FALLTHROUGH
          case 0:
          // FALLTHROUGH
          case 32:
            return 5;
          }
      }
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $i_}) as \Throwable;
    };
    $token_int_literal = (dynamic $conv, dynamic $ib) ==> {
      switch($conv) {
        // FALLTHROUGH
        case 0:
          $bp_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0b, $bp_);
          break;
        // FALLTHROUGH
        case 3:
          $bq_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0o, $bq_);
          break;
        // FALLTHROUGH
        case 4:
          $br_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0u, $br_);
          break;
        // FALLTHROUGH
        case 5:
          $bs_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0x, $bs_);
          break;
        // FALLTHROUGH
        default:
          $tok = $token_string($ib);
        }
      $l = $caml_ml_string_length($tok);
      if (0 !== $l) {
        if (43 === $caml_string_get($tok, 0)) {
          return $call3($String[4], $tok, 1, (int) ($l + -1));
        }
      }
      return $tok;
    };
    $token_int = (dynamic $conv, dynamic $ib) ==> {
      return $caml_int_of_string($token_int_literal($conv, $ib));
    };
    $token_float = (dynamic $ib) ==> {
      return $runtime["caml_float_of_string"]($token_string($ib));
    };
    $token_nativeint = (dynamic $conv, dynamic $ib) ==> {
      return $caml_int_of_string($token_int_literal($conv, $ib));
    };
    $token_int32 = (dynamic $conv, dynamic $ib) ==> {
      return $caml_int_of_string($token_int_literal($conv, $ib));
    };
    $token_int64 = (dynamic $conv, dynamic $ib) ==> {
      return $runtime["caml_int64_of_string"]($token_int_literal($conv, $ib));
    };
    $scan_decimal_digit_star = (dynamic $width, dynamic $ib) ==> {
      $width__0 = $width;
      for (;;) {
        if (0 === $width__0) {return $width__0;}
        $c = $peek_char($ib);
        if ($eof($ib)) {return $width__0;}
        if (58 <= $c) {
          if (95 === $c) {
            $width__1 = $ignore_char($width__0, $ib);
            $width__0 = $width__1;
            continue;
          }
        }
        else {
          if (48 <= $c) {
            $width__2 = $store_char($width__0, $ib, $c);
            $width__0 = $width__2;
            continue;
          }
        }
        return $width__0;
      }
    };
    $scan_decimal_digit_plus = (dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $bad_token_length($cst_decimal_digits);}
      $c = $checked_peek_char($ib);
      $switcher = (int) ($c + -48);
      if (9 < $unsigned_right_shift_32($switcher, 0)) {return $bad_input($call2($Printf[4], $j_, $c));
      }
      $width__0 = $store_char($width, $ib, $c);
      return $scan_decimal_digit_star($width__0, $ib);
    };
    $scan_digit_star = (dynamic $digitp, dynamic $width, dynamic $ib) ==> {
      $scan_digits = (dynamic $width, dynamic $ib) ==> {
        $width__0 = $width;
        for (;;) {
          if (0 === $width__0) {return $width__0;}
          $c = $peek_char($ib);
          if ($eof($ib)) {return $width__0;}
          if ($call1($digitp, $c)) {
            $width__1 = $store_char($width__0, $ib, $c);
            $width__0 = $width__1;
            continue;
          }
          if (95 === $c) {
            $width__2 = $ignore_char($width__0, $ib);
            $width__0 = $width__2;
            continue;
          }
          return $width__0;
        }
      };
      return $scan_digits($width, $ib);
    };
    $scan_digit_plus = 
    (dynamic $basis, dynamic $digitp, dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $bad_token_length($cst_digits);}
      $c = $checked_peek_char($ib);
      if ($call1($digitp, $c)) {
        $width__0 = $store_char($width, $ib, $c);
        return $scan_digit_star($digitp, $width__0, $ib);
      }
      return $bad_input($call3($Printf[4], $k_, $c, $basis));
    };
    $is_binary_digit = (dynamic $param) ==> {
      $switcher = (int) ($param + -48);
      return 1 < $unsigned_right_shift_32($switcher, 0) ? 0 : (1);
    };
    $scan_binary_int = (dynamic $bn_, dynamic $bo_) ==> {
      return $scan_digit_plus($cst_binary, $is_binary_digit, $bn_, $bo_);
    };
    $is_octal_digit = (dynamic $param) ==> {
      $switcher = (int) ($param + -48);
      return 7 < $unsigned_right_shift_32($switcher, 0) ? 0 : (1);
    };
    $scan_octal_int = (dynamic $bl_, dynamic $bm_) ==> {
      return $scan_digit_plus($cst_octal, $is_octal_digit, $bl_, $bm_);
    };
    $is_hexa_digit = (dynamic $param) ==> {
      $bk_ = (int) ($param + -48);
      $switch__0 = 22 < $unsigned_right_shift_32($bk_, 0)
        ? 5 < $unsigned_right_shift_32((int) ($bk_ + -49), 0) ? 0 : (1)
        : (6 < $unsigned_right_shift_32((int) ($bk_ + -10), 0) ? 1 : (0));
      return $switch__0 ? 1 : (0);
    };
    $scan_hexadecimal_int = (dynamic $bi_, dynamic $bj_) ==> {
      return $scan_digit_plus($cst_hexadecimal, $is_hexa_digit, $bi_, $bj_);
    };
    $scan_sign = (dynamic $width, dynamic $ib) ==> {
      $c = $checked_peek_char($ib);
      $switcher = (int) ($c + -43);
      if (! (2 < $unsigned_right_shift_32($switcher, 0))) {
        switch($switcher) {
          // FALLTHROUGH
          case 0:
            return $store_char($width, $ib, $c);
          // FALLTHROUGH
          case 1:break;
          // FALLTHROUGH
          default:
            return $store_char($width, $ib, $c);
          }
      }
      return $width;
    };
    $scan_optionally_signed_decimal_int = (dynamic $width, dynamic $ib) ==> {
      $width__0 = $scan_sign($width, $ib);
      return $scan_decimal_digit_plus($width__0, $ib);
    };
    $scan_unsigned_int = (dynamic $width, dynamic $ib) ==> {
      $c = $checked_peek_char($ib);
      if (48 === $c) {
        $width__0 = $store_char($width, $ib, $c);
        if (0 === $width__0) {return $width__0;}
        $c__0 = $peek_char($ib);
        if ($eof($ib)) {return $width__0;}
        if (99 <= $c__0) {
          if (111 === $c__0) {
            return $scan_octal_int($store_char($width__0, $ib, $c__0), $ib);
          }
          $switch__0 = 120 === $c__0 ? 1 : (0);
        }
        else {
          if (88 === $c__0) {$switch__0 = 1;}
          else {
            if (98 <= $c__0) {
              return $scan_binary_int($store_char($width__0, $ib, $c__0), $ib);
            }
            $switch__0 = 0;
          }
        }
        return $switch__0
          ? $scan_hexadecimal_int($store_char($width__0, $ib, $c__0), $ib)
          : ($scan_decimal_digit_star($width__0, $ib));
      }
      return $scan_decimal_digit_plus($width, $ib);
    };
    $scan_optionally_signed_int = (dynamic $width, dynamic $ib) ==> {
      $width__0 = $scan_sign($width, $ib);
      return $scan_unsigned_int($width__0, $ib);
    };
    $scan_int_conversion = (dynamic $conv, dynamic $width, dynamic $ib) ==> {
      switch($conv) {
        // FALLTHROUGH
        case 0:
          return $scan_binary_int($width, $ib);
        // FALLTHROUGH
        case 1:
          return $scan_optionally_signed_decimal_int($width, $ib);
        // FALLTHROUGH
        case 2:
          return $scan_optionally_signed_int($width, $ib);
        // FALLTHROUGH
        case 3:
          return $scan_octal_int($width, $ib);
        // FALLTHROUGH
        case 4:
          return $scan_decimal_digit_plus($width, $ib);
        // FALLTHROUGH
        default:
          return $scan_hexadecimal_int($width, $ib);
        }
    };
    $scan_fractional_part = (dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $width;}
      $c = $peek_char($ib);
      if ($eof($ib)) {return $width;}
      $switcher = (int) ($c + -48);
      return 9 < $unsigned_right_shift_32($switcher, 0)
        ? $width
        : ($scan_decimal_digit_star($store_char($width, $ib, $c), $ib));
    };
    $scan_exponent_part = (dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $width;}
      $c = $peek_char($ib);
      if ($eof($ib)) {return $width;}
      if (69 !== $c) {if (101 !== $c) {return $width;}}
      return $scan_optionally_signed_decimal_int(
        $store_char($width, $ib, $c),
        $ib
      );
    };
    $scan_integer_part = (dynamic $width, dynamic $ib) ==> {
      $width__0 = $scan_sign($width, $ib);
      return $scan_decimal_digit_star($width__0, $ib);
    };
    $scan_float = (dynamic $width, dynamic $precision, dynamic $ib) ==> {
      $width__0 = $scan_integer_part($width, $ib);
      if (0 === $width__0) {return Vector{0, $width__0, $precision};}
      $c = $peek_char($ib);
      if ($eof($ib)) {return Vector{0, $width__0, $precision};}
      if (46 === $c) {
        $width__1 = $store_char($width__0, $ib, $c);
        $precision__0 = $call2($Pervasives[4], $width__1, $precision);
        $width__2 = (int)
        ($width__1 -
           (int)
           ($precision__0 - $scan_fractional_part($precision__0, $ib)));
        return Vector{0, $scan_exponent_part($width__2, $ib), $precision__0};
      }
      return Vector{0, $scan_exponent_part($width__0, $ib), $precision};
    };
    $check_case_insensitive_string = 
    (dynamic $width, dynamic $ib, dynamic $error, dynamic $str) ==> {
      $lowercase = (dynamic $c) ==> {
        $switcher = (int) ($c + -65);
        return 25 < $unsigned_right_shift_32($switcher, 0)
          ? $c
          : ($call1($Pervasives[17], (int) ((int) ($c - 65) + 97)));
      };
      $len = $caml_ml_string_length($str);
      $width__0 = Vector{0, $width};
      $bf_ = (int) ($len + -1);
      $be_ = 0;
      if (! ($bf_ < 0)) {
        $i = $be_;
        for (;;) {
          $c = $peek_char($ib);
          $bg_ = $lowercase($caml_string_get($str, $i));
          if ($lowercase($c) !== $bg_) {$call1($error, 0);}
          if (0 === $width__0[1]) {$call1($error, 0);}
          $width__0[1] = $store_char($width__0[1], $ib, $c);
          $bh_ = (int) ($i + 1);
          if ($bf_ !== $i) {$i = $bh_;continue;}
          break;
        }
      }
      return $width__0[1];
    };
    $scan_hex_float = (dynamic $width, dynamic $precision, dynamic $ib) ==> {
      $a2_ = 0 === $width ? 1 : (0);
      $a3_ = $a2_ ? $a2_ : ($end_of_input($ib));
      if ($a3_) {$bad_hex_float(0);}
      $width__0 = $scan_sign($width, $ib);
      $a4_ = 0 === $width__0 ? 1 : (0);
      $a5_ = $a4_ ? $a4_ : ($end_of_input($ib));
      if ($a5_) {$bad_hex_float(0);}
      $c = $peek_char($ib);
      if (78 <= $c) {
        $switcher = (int) ($c + -79);
        if (30 < $unsigned_right_shift_32($switcher, 0)) {
          if (! (32 <= $switcher)) {
            $width__1 = $store_char($width__0, $ib, $c);
            $a6_ = 0 === $width__1 ? 1 : (0);
            $a7_ = $a6_ ? $a6_ : ($end_of_input($ib));
            if ($a7_) {$bad_hex_float(0);}
            return $check_case_insensitive_string(
              $width__1,
              $ib,
              $bad_hex_float,
              $cst_an
            );
          }
          $switch__0 = 0;
        }
        else {$switch__0 = 26 === $switcher ? 1 : (0);}
      }
      else {
        if (48 === $c) {
          $width__3 = $store_char($width__0, $ib, $c);
          $a__ = 0 === $width__3 ? 1 : (0);
          $ba_ = $a__ ? $a__ : ($end_of_input($ib));
          if ($ba_) {$bad_hex_float(0);}
          $width__4 = $check_case_insensitive_string(
            $width__3,
            $ib,
            $bad_hex_float,
            $cst_x
          );
          if (0 !== $width__4) {
            if (! $end_of_input($ib)) {
              $match = $peek_char($ib);
              $bb_ = (int) ($match + -46);
              $switch__1 = 34 < $unsigned_right_shift_32($bb_, 0)
                ? 66 === $bb_ ? 1 : (0)
                : (32 < $unsigned_right_shift_32((int) ($bb_ + -1), 0)
                 ? 1
                 : (0));
              $width__5 = $switch__1
                ? $width__4
                : ($scan_hexadecimal_int($width__4, $ib));
              if (0 !== $width__5) {
                if (! $end_of_input($ib)) {
                  $c__0 = $peek_char($ib);
                  if (46 === $c__0) {
                    $width__6 = $store_char($width__5, $ib, $c__0);
                    if (0 === $width__6) {$switch__2 = 0;}
                    else {
                      if ($end_of_input($ib)) {$switch__2 = 0;}
                      else {
                        $match__0 = $peek_char($ib);
                        if (80 === $match__0) {$switch__3 = 0;}
                        else {
                          if (112 === $match__0) {$switch__3 = 0;}
                          else {
                            $precision__0 = $call2($Pervasives[4], $width__6, $precision
                            );
                            $width__10 = (int)
                            ($width__6 -
                               (int)
                               ($precision__0 - $scan_hexadecimal_int($precision__0, $ib)));
                            $switch__3 = 1;
                          }
                        }
                        if (! $switch__3) {$width__10 = $width__6;}
                        $width__7 = $width__10;
                        $switch__2 = 1;
                      }
                    }
                    if (! $switch__2) {$width__7 = $width__6;}
                    $width__8 = $width__7;
                  }
                  else {$width__8 = $width__5;}
                  if (0 !== $width__8) {
                    if (! $end_of_input($ib)) {
                      $c__1 = $peek_char($ib);
                      if (80 !== $c__1) {if (112 !== $c__1) {return $width__8;}}
                      $width__9 = $store_char($width__8, $ib, $c__1);
                      $bc_ = 0 === $width__9 ? 1 : (0);
                      $bd_ = $bc_ ? $bc_ : ($end_of_input($ib));
                      if ($bd_) {$bad_hex_float(0);}
                      return $scan_optionally_signed_decimal_int($width__9, $ib);
                    }
                  }
                  return $width__8;
                }
              }
              return $width__5;
            }
          }
          return $width__4;
        }
        $switch__0 = 73 === $c ? 1 : (0);
      }
      if ($switch__0) {
        $width__2 = $store_char($width__0, $ib, $c);
        $a8_ = 0 === $width__2 ? 1 : (0);
        $a9_ = $a8_ ? $a8_ : ($end_of_input($ib));
        if ($a9_) {$bad_hex_float(0);}
        return $check_case_insensitive_string(
          $width__2,
          $ib,
          $bad_hex_float,
          $cst_nfinity
        );
      }
      return $bad_hex_float(0);
    };
    $scan_caml_float_rest = (dynamic $width, dynamic $precision, dynamic $ib) ==> {
      $aY_ = 0 === $width ? 1 : (0);
      $aZ_ = $aY_ ? $aY_ : ($end_of_input($ib));
      if ($aZ_) {$bad_float(0);}
      $width__0 = $scan_decimal_digit_star($width, $ib);
      $a0_ = 0 === $width__0 ? 1 : (0);
      $a1_ = $a0_ ? $a0_ : ($end_of_input($ib));
      if ($a1_) {$bad_float(0);}
      $c = $peek_char($ib);
      $switcher = (int) ($c + -69);
      if (32 < $unsigned_right_shift_32($switcher, 0)) {
        if (-23 === $switcher) {
          $width__1 = $store_char($width__0, $ib, $c);
          $precision__0 = $call2($Pervasives[4], $width__1, $precision);
          $width_precision = $scan_fractional_part($precision__0, $ib);
          $frac_width = (int) ($precision__0 - $width_precision);
          $width__2 = (int) ($width__1 - $frac_width);
          return $scan_exponent_part($width__2, $ib);
        }
      }
      else {
        $switcher__0 = (int) ($switcher + -1);
        if (30 < $unsigned_right_shift_32($switcher__0, 0)) {return $scan_exponent_part($width__0, $ib);}
      }
      return $bad_float(0);
    };
    $scan_caml_float = (dynamic $width, dynamic $precision, dynamic $ib) ==> {
      $aK_ = 0 === $width ? 1 : (0);
      $aL_ = $aK_ ? $aK_ : ($end_of_input($ib));
      if ($aL_) {$bad_float(0);}
      $width__0 = $scan_sign($width, $ib);
      $aM_ = 0 === $width__0 ? 1 : (0);
      $aN_ = $aM_ ? $aM_ : ($end_of_input($ib));
      if ($aN_) {$bad_float(0);}
      $c = $peek_char($ib);
      if (49 <= $c) {
        if (! (58 <= $c)) {
          $width__1 = $store_char($width__0, $ib, $c);
          $aO_ = 0 === $width__1 ? 1 : (0);
          $aP_ = $aO_ ? $aO_ : ($end_of_input($ib));
          if ($aP_) {$bad_float(0);}
          return $scan_caml_float_rest($width__1, $precision, $ib);
        }
      }
      else {
        if (48 <= $c) {
          $width__2 = $store_char($width__0, $ib, $c);
          $aQ_ = 0 === $width__2 ? 1 : (0);
          $aR_ = $aQ_ ? $aQ_ : ($end_of_input($ib));
          if ($aR_) {$bad_float(0);}
          $c__0 = $peek_char($ib);
          if (88 !== $c__0) {
            if (120 !== $c__0) {
              return $scan_caml_float_rest($width__2, $precision, $ib);
            }
          }
          $width__3 = $store_char($width__2, $ib, $c__0);
          $aS_ = 0 === $width__3 ? 1 : (0);
          $aT_ = $aS_ ? $aS_ : ($end_of_input($ib));
          if ($aT_) {$bad_float(0);}
          $width__4 = $scan_hexadecimal_int($width__3, $ib);
          $aU_ = 0 === $width__4 ? 1 : (0);
          $aV_ = $aU_ ? $aU_ : ($end_of_input($ib));
          if ($aV_) {$bad_float(0);}
          $c__1 = $peek_char($ib);
          $switcher = (int) ($c__1 + -80);
          if (32 < $unsigned_right_shift_32($switcher, 0)) {
            if (-34 === $switcher) {
              $width__5 = $store_char($width__4, $ib, $c__1);
              if (0 === $width__5) {$switch__1 = 0;}
              else {
                if ($end_of_input($ib)) {$switch__1 = 0;}
                else {
                  $match = $peek_char($ib);
                  if (80 === $match) {$switch__2 = 0;}
                  else {
                    if (112 === $match) {$switch__2 = 0;}
                    else {
                      $precision__0 = $call2($Pervasives[4], $width__5, $precision
                      );
                      $width__10 = (int)
                      ($width__5 -
                         (int)
                         ($precision__0 - $scan_hexadecimal_int($precision__0, $ib)));
                      $switch__2 = 1;
                    }
                  }
                  if (! $switch__2) {$width__10 = $width__5;}
                  $width__6 = $width__10;
                  $switch__1 = 1;
                }
              }
              if (! $switch__1) {$width__6 = $width__5;}
              $width__7 = $width__6;
              $switch__0 = 0;
            }
            else {$switch__0 = 1;}
          }
          else {
            $switcher__0 = (int) ($switcher + -1);
            if (30 < $unsigned_right_shift_32($switcher__0, 0)) {$width__7 = $width__4;$switch__0 = 0;}
            else {$switch__0 = 1;}
          }
          $width__8 = $switch__0 ? $bad_float(0) : ($width__7);
          if (0 !== $width__8) {
            if (! $end_of_input($ib)) {
              $c__2 = $peek_char($ib);
              if (80 !== $c__2) {if (112 !== $c__2) {return $width__8;}}
              $width__9 = $store_char($width__8, $ib, $c__2);
              $aW_ = 0 === $width__9 ? 1 : (0);
              $aX_ = $aW_ ? $aW_ : ($end_of_input($ib));
              if ($aX_) {$bad_hex_float(0);}
              return $scan_optionally_signed_decimal_int($width__9, $ib);
            }
          }
          return $width__8;
        }
      }
      return $bad_float(0);
    };
    $scan_string = (dynamic $stp, dynamic $width, dynamic $ib) ==> {
      $loop = (dynamic $width) ==> {
        $width__0 = $width;
        for (;;) {
          if (0 === $width__0) {return $width__0;}
          $c = $peek_char($ib);
          if ($eof($ib)) {return $width__0;}
          if ($stp) {
            $c__0 = $stp[1];
            if ($c === $c__0) {return $skip_char($width__0, $ib);}
            $width__1 = $store_char($width__0, $ib, $c);
            $width__0 = $width__1;
            continue;
          }
          $aJ_ = (int) ($c + -9);
          $switch__0 = 4 < $unsigned_right_shift_32($aJ_, 0)
            ? 23 === $aJ_ ? 1 : (0)
            : (1 < $unsigned_right_shift_32((int) ($aJ_ + -2), 0) ? 1 : (0));
          if ($switch__0) {return $width__0;}
          $width__2 = $store_char($width__0, $ib, $c);
          $width__0 = $width__2;
          continue;
        }
      };
      return $loop($width);
    };
    $scan_char = (dynamic $width, dynamic $ib) ==> {
      return $store_char($width, $ib, $checked_peek_char($ib));
    };
    $char_for_backslash = (dynamic $c) ==> {
      if (110 <= $c) {
        if (! (117 <= $c)) {
          $switcher = (int) ($c + -110);
          switch($switcher) {
            // FALLTHROUGH
            case 0:
              return 10;
            // FALLTHROUGH
            case 4:
              return 13;
            // FALLTHROUGH
            case 6:
              return 9;
            }
        }
      }
      else {if (98 === $c) {return 8;}}
      return $c;
    };
    $decimal_value_of_char = (dynamic $c) ==> {return (int) ($c - 48);};
    $char_for_decimal_code = (dynamic $c0, dynamic $c1, dynamic $c2) ==> {
      $aH_ = $decimal_value_of_char($c2);
      $aI_ = (int) (10 * $decimal_value_of_char($c1));
      $c = (int)
      ((int) ((int) (100 * $decimal_value_of_char($c0)) + $aI_) + $aH_);
      if (0 <= $c) {if (! (255 < $c)) {return $call1($Pervasives[17], $c);}}
      return $bad_input($call4($Printf[4], $l_, $c0, $c1, $c2));
    };
    $hexadecimal_value_of_char = (dynamic $d) ==> {
      return 97 <= $d
        ? (int) ($d + -87)
        : (65 <= $d ? (int) ($d + -55) : ((int) ($d - 48)));
    };
    $char_for_hexadecimal_code = (dynamic $c1, dynamic $c2) ==> {
      $aG_ = $hexadecimal_value_of_char($c2);
      $c = (int) ((int) (16 * $hexadecimal_value_of_char($c1)) + $aG_);
      if (0 <= $c) {if (! (255 < $c)) {return $call1($Pervasives[17], $c);}}
      return $bad_input($call3($Printf[4], $m_, $c1, $c2));
    };
    $check_next_char = (dynamic $message, dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $bad_token_length($message);}
      $c = $peek_char($ib);
      return $eof($ib) ? $bad_end_of_input($message) : ($c);
    };
    $check_next_char_for_char = (dynamic $aE_, dynamic $aF_) ==> {
      return $check_next_char($cst_a_Char, $aE_, $aF_);
    };
    $check_next_char_for_string = (dynamic $aC_, dynamic $aD_) ==> {
      return $check_next_char($cst_a_String, $aC_, $aD_);
    };
    $scan_backslash_char = (dynamic $width, dynamic $ib) ==> {
      $c = $check_next_char_for_char($width, $ib);
      if (40 <= $c) {
        if (58 <= $c) {
          $switcher = (int) ($c + -92);
          if (28 < $unsigned_right_shift_32($switcher, 0)) {$switch__0 = 0;}
          else {
            switch($switcher) {
              // FALLTHROUGH
              case 28:
                $get_digit = (dynamic $param) ==> {
                  $c = $next_char($ib);
                  $aB_ = (int) ($c + -48);
                  $switch__0 = 22 < $unsigned_right_shift_32($aB_, 0)
                    ? 5 < $unsigned_right_shift_32((int) ($aB_ + -49), 0)
                     ? 0
                     : (1)
                    : (6 < $unsigned_right_shift_32((int) ($aB_ + -10), 0)
                     ? 1
                     : (0));
                  return $switch__0 ? $c : ($bad_input_escape($c));
                };
                $c1 = $get_digit(0);
                $c2 = $get_digit(0);
                return $store_char(
                  (int)
                  ($width + -2),
                  $ib,
                  $char_for_hexadecimal_code($c1, $c2)
                );
              // FALLTHROUGH
              case 0:
              // FALLTHROUGH
              case 6:
              // FALLTHROUGH
              case 18:
              // FALLTHROUGH
              case 22:
              // FALLTHROUGH
              case 24:
                $switch__0 = 1;
                break;
              // FALLTHROUGH
              default:
                $switch__0 = 0;
              }
          }
        }
        else {
          if (48 <= $c) {
            $get_digit__0 = (dynamic $param) ==> {
              $c = $next_char($ib);
              $switcher = (int) ($c + -48);
              return 9 < $unsigned_right_shift_32($switcher, 0)
                ? $bad_input_escape($c)
                : ($c);
            };
            $c1__0 = $get_digit__0(0);
            $c2__0 = $get_digit__0(0);
            return $store_char(
              (int)
              ($width + -2),
              $ib,
              $char_for_decimal_code($c, $c1__0, $c2__0)
            );
          }
          $switch__0 = 0;
        }
      }
      else {$switch__0 = 34 === $c ? 1 : (39 <= $c ? 1 : (0));}
      return $switch__0
        ? $store_char($width, $ib, $char_for_backslash($c))
        : ($bad_input_escape($c));
    };
    $scan_caml_char = (dynamic $width, dynamic $ib) ==> {
      $find_stop = (dynamic $width) ==> {
        $c = $check_next_char_for_char($width, $ib);
        return 39 === $c
          ? $ignore_char($width, $ib)
          : ($character_mismatch(39, $c));
      };
      $find_char = (dynamic $width) ==> {
        $c = $check_next_char_for_char($width, $ib);
        return 92 === $c
          ? $find_stop($scan_backslash_char($ignore_char($width, $ib), $ib))
          : ($find_stop($store_char($width, $ib, $c)));
      };
      $find_start = (dynamic $width) ==> {
        $c = $checked_peek_char($ib);
        return 39 === $c
          ? $find_char($ignore_char($width, $ib))
          : ($character_mismatch(39, $c));
      };
      return $find_start($width);
    };
    $scan_caml_string = (dynamic $width, dynamic $ib) ==> {
      $scan_backslash = new Ref();
      $skip_newline = new Ref();
      $skip_spaces = new Ref();
      $find_stop__0 = (dynamic $counter, dynamic $width) ==> {
        $width__0 = $width;
        for (;;) {
          $c = $check_next_char_for_string($width__0, $ib);
          if (34 === $c) {return $ignore_char($width__0, $ib);}
          if (92 === $c) {
            $aA_ = $ignore_char($width__0, $ib);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $scan_backslash->contents($counter__0, $aA_);
            }
            return $caml_trampoline_return(
              $scan_backslash->contents,
              varray[0,$aA_]
            );
          }
          $width__1 = $store_char($width__0, $ib, $c);
          $width__0 = $width__1;
          continue;
        }
      };
      $scan_backslash->contents = (dynamic $counter, dynamic $width) ==> {
        $match = $check_next_char_for_string($width, $ib);
        if (10 === $match) {
          $ax_ = $ignore_char($width, $ib);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $skip_spaces->contents($counter__0, $ax_);
          }
          return $caml_trampoline_return(
            $skip_spaces->contents,
            varray[0,$ax_]
          );
        }
        if (13 === $match) {
          $ay_ = $ignore_char($width, $ib);
          if ($counter < 50) {
            $counter__1 = (int) ($counter + 1);
            return $skip_newline->contents($counter__1, $ay_);
          }
          return $caml_trampoline_return(
            $skip_newline->contents,
            varray[0,$ay_]
          );
        }
        $az_ = $scan_backslash_char($width, $ib);
        if ($counter < 50) {
          $counter__2 = (int) ($counter + 1);
          return $find_stop__0($counter__2, $az_);
        }
        return $caml_trampoline_return($find_stop__0, varray[0,$az_]);
      };
      $skip_newline->contents = (dynamic $counter, dynamic $width) ==> {
        $match = $check_next_char_for_string($width, $ib);
        if (10 === $match) {
          $av_ = $ignore_char($width, $ib);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $skip_spaces->contents($counter__0, $av_);
          }
          return $caml_trampoline_return(
            $skip_spaces->contents,
            varray[0,$av_]
          );
        }
        $aw_ = $store_char($width, $ib, 13);
        if ($counter < 50) {
          $counter__1 = (int) ($counter + 1);
          return $find_stop__0($counter__1, $aw_);
        }
        return $caml_trampoline_return($find_stop__0, varray[0,$aw_]);
      };
      $skip_spaces->contents = (dynamic $counter, dynamic $width) ==> {
        $width__0 = $width;
        for (;;) {
          $match = $check_next_char_for_string($width__0, $ib);
          if (32 === $match) {
            $width__1 = $ignore_char($width__0, $ib);
            $width__0 = $width__1;
            continue;
          }
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $find_stop__0($counter__0, $width__0);
          }
          return $caml_trampoline_return($find_stop__0, varray[0,$width__0]);
        }
      };
      $find_stop = (dynamic $width) ==> {
        return $caml_trampoline($find_stop__0(0, $width));
      };
      $find_start = (dynamic $width) ==> {
        $c = $checked_peek_char($ib);
        return 34 === $c
          ? $find_stop($ignore_char($width, $ib))
          : ($character_mismatch(34, $c));
      };
      return $find_start($width);
    };
    $scan_bool = (dynamic $ib) ==> {
      $c = $checked_peek_char($ib);
      $m = 102 === $c
        ? 5
        : (116 === $c ? 4 : ($bad_input($call2($Printf[4], $n_, $c))));
      return $scan_string(0, $m, $ib);
    };
    $scan_chars_in_char_set = 
    (dynamic $char_set, dynamic $scan_indic, dynamic $width, dynamic $ib) ==> {
      $scan_chars = (dynamic $i, dynamic $stp) ==> {
        $i__0 = $i;
        for (;;) {
          $c = $peek_char($ib);
          $ar_ = 0 < $i__0 ? 1 : (0);
          if ($ar_) {
            $as_ = 1 - $eof($ib);
            if ($as_) {
              $at_ = $call2($CamlinternalFormat[1], $char_set, $c);
              $au_ = $at_ ? $c !== $stp ? 1 : (0) : ($at_);
            }
            else {$au_ = $as_;}
          }
          else {$au_ = $ar_;}
          if ($au_) {
            $store_char($Pervasives[7], $ib, $c);
            $i__1 = (int) ($i__0 + -1);
            $i__0 = $i__1;
            continue;
          }
          return $au_;
        }
      };
      if ($scan_indic) {
        $c = $scan_indic[1];
        $scan_chars($width, $c);
        $aq_ = 1 - $eof($ib);
        if ($aq_) {
          $ci = $peek_char($ib);
          return $c === $ci
            ? $invalidate_current_char($ib)
            : ($character_mismatch($c, $ci));
        }
        return $aq_;
      }
      return $scan_chars($width, -1);
    };
    $scanf_bad_input = (dynamic $ib, dynamic $x) ==> {
      if ($x[1] === $Scan_failure) {$s = $x[2];}
      else {
        if ($x[1] !== $Failure) {
          throw $caml_wrap_thrown_exception($x) as \Throwable;
        }
        $s = $x[2];
      }
      $i = $char_count($ib);
      return $bad_input($call3($Printf[4], $o_, $i, $s));
    };
    $get_counter = (dynamic $ib, dynamic $counter) ==> {
      switch($counter) {
        // FALLTHROUGH
        case 0:
          return $line_count($ib);
        // FALLTHROUGH
        case 1:
          return $char_count($ib);
        // FALLTHROUGH
        default:
          return $token_count($ib);
        }
    };
    $width_of_pad_opt = (dynamic $pad_opt) ==> {
      if ($pad_opt) {$width = $pad_opt[1];return $width;}
      return $Pervasives[7];
    };
    $stopper_of_formatting_lit = (dynamic $fmting) ==> {
      if (6 === $fmting) {return $p_;}
      $str = $call1($CamlinternalFormat[17], $fmting);
      $stp = $caml_string_get($str, 1);
      $sub_str = $call3(
        $String[4],
        $str,
        2,
        (int)
        ($caml_ml_string_length($str) + -2)
      );
      return Vector{0, $stp, $sub_str};
    };
    $take_format_readers__0 = (dynamic $counter, dynamic $k, dynamic $fmt) ==> {
      $fmt__0 = $fmt;
      for (;;) {
        if ($is_int($fmt__0)) {return $call1($k, 0);
        }
        else {
          $continue_label = null;
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmt__1 = $fmt__0[1];
              $fmt__0 = $fmt__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              $fmt__2 = $fmt__0[1];
              $fmt__0 = $fmt__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 2:
              $fmt__3 = $fmt__0[2];
              $fmt__0 = $fmt__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $fmt__4 = $fmt__0[2];
              $fmt__0 = $fmt__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              $fmt__5 = $fmt__0[4];
              $fmt__0 = $fmt__5;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 5:
              $fmt__6 = $fmt__0[4];
              $fmt__0 = $fmt__6;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $fmt__7 = $fmt__0[4];
              $fmt__0 = $fmt__7;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 7:
              $fmt__8 = $fmt__0[4];
              $fmt__0 = $fmt__8;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $fmt__9 = $fmt__0[4];
              $fmt__0 = $fmt__9;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 9:
              $fmt__10 = $fmt__0[2];
              $fmt__0 = $fmt__10;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 10:
              $fmt__11 = $fmt__0[1];
              $fmt__0 = $fmt__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmt__12 = $fmt__0[2];
              $fmt__0 = $fmt__12;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__13 = $fmt__0[2];
              $fmt__0 = $fmt__13;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $fmt__14 = $fmt__0[3];
              $fmt__0 = $fmt__14;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 14:
              $rest = $fmt__0[3];
              $fmtty = $fmt__0[2];
              $an_ = $call1($CamlinternalFormat[22], $fmtty);
              $ao_ = $call1($CamlinternalFormatBasics[2], $an_);
              if ($counter < 50) {
                $counter__1 = (int) ($counter + 1);
                return $take_fmtty_format_readers__0->contents(
                  $counter__1,
                  $k,
                  $ao_,
                  $rest
                );
              }
              return $caml_trampoline_return(
                $take_fmtty_format_readers__0->contents,
                varray[0,$k,$ao_,$rest]
              );
            // FALLTHROUGH
            case 15:
              $fmt__15 = $fmt__0[1];
              $fmt__0 = $fmt__15;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 16:
              $fmt__16 = $fmt__0[1];
              $fmt__0 = $fmt__16;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 17:
              $fmt__17 = $fmt__0[2];
              $fmt__0 = $fmt__17;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $ap_ = $fmt__0[1];
              if (0 === $ap_[0]) {
                $rest__0 = $fmt__0[2];
                $match = $ap_[1];
                $fmt__18 = $match[1];
                $fmt__19 = $call2(
                  $CamlinternalFormatBasics[3],
                  $fmt__18,
                  $rest__0
                );
                $fmt__0 = $fmt__19;
                $continue_label = "#";break;
              }
              $rest__1 = $fmt__0[2];
              $match__0 = $ap_[1];
              $fmt__20 = $match__0[1];
              $fmt__21 = $call2(
                $CamlinternalFormatBasics[3],
                $fmt__20,
                $rest__1
              );
              $fmt__0 = $fmt__21;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 19:
              $fmt_rest = $fmt__0[1];
              return (dynamic $reader) ==> {
                $new_k = (dynamic $readers_rest) ==> {
                  return $call1($k, Vector{0, $reader, $readers_rest});
                };
                return $take_format_readers->contents($new_k, $fmt_rest);
              };
            // FALLTHROUGH
            case 20:
              $fmt__22 = $fmt__0[3];
              $fmt__0 = $fmt__22;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 21:
              $fmt__23 = $fmt__0[2];
              $fmt__0 = $fmt__23;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 22:
              $fmt__24 = $fmt__0[1];
              $fmt__0 = $fmt__24;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 23:
              $rest__2 = $fmt__0[2];
              $ign = $fmt__0[1];
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1);
                return $take_ignored_format_readers->contents(
                  $counter__0,
                  $k,
                  $ign,
                  $rest__2
                );
              }
              return $caml_trampoline_return(
                $take_ignored_format_readers->contents,
                varray[0,$k,$ign,$rest__2]
              );
            // FALLTHROUGH
            default:
              $fmt__25 = $fmt__0[3];
              $fmt__0 = $fmt__25;
              $continue_label = "#";break;
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $take_fmtty_format_readers__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $fmtty, dynamic $fmt) ==> {
      $fmtty__0 = $fmtty;
      for (;;) {
        if ($is_int($fmtty__0)) {
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $take_format_readers__0($counter__0, $k, $fmt);
          }
          return $caml_trampoline_return(
            $take_format_readers__0,
            varray[0,$k,$fmt]
          );
        }
        else {
          $continue_label = null;
          switch($fmtty__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmtty__1 = $fmtty__0[1];
              $fmtty__0 = $fmtty__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              $fmtty__2 = $fmtty__0[1];
              $fmtty__0 = $fmtty__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 2:
              $fmtty__3 = $fmtty__0[1];
              $fmtty__0 = $fmtty__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $fmtty__4 = $fmtty__0[1];
              $fmtty__0 = $fmtty__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              $fmtty__5 = $fmtty__0[1];
              $fmtty__0 = $fmtty__5;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 5:
              $fmtty__6 = $fmtty__0[1];
              $fmtty__0 = $fmtty__6;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $fmtty__7 = $fmtty__0[1];
              $fmtty__0 = $fmtty__7;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 7:
              $fmtty__8 = $fmtty__0[1];
              $fmtty__0 = $fmtty__8;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $fmtty__9 = $fmtty__0[2];
              $fmtty__0 = $fmtty__9;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 9:
              $rest = $fmtty__0[3];
              $ty2 = $fmtty__0[2];
              $ty1 = $fmtty__0[1];
              $am_ = $call1($CamlinternalFormat[22], $ty1);
              $ty = $call2($CamlinternalFormat[23], $am_, $ty2);
              $fmtty__10 = $call2($CamlinternalFormatBasics[1], $ty, $rest);
              $fmtty__0 = $fmtty__10;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 10:
              $fmtty__11 = $fmtty__0[1];
              $fmtty__0 = $fmtty__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmtty__12 = $fmtty__0[1];
              $fmtty__0 = $fmtty__12;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmtty__13 = $fmtty__0[1];
              $fmtty__0 = $fmtty__13;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $fmt_rest = $fmtty__0[1];
              return (dynamic $reader) ==> {
                $new_k = (dynamic $readers_rest) ==> {
                  return $call1($k, Vector{0, $reader, $readers_rest});
                };
                return $take_fmtty_format_readers->contents(
                  $new_k,
                  $fmt_rest,
                  $fmt
                );
              };
            // FALLTHROUGH
            default:
              $fmt_rest__0 = $fmtty__0[1];
              return (dynamic $reader) ==> {
                $new_k = (dynamic $readers_rest) ==> {
                  return $call1($k, Vector{0, $reader, $readers_rest});
                };
                return $take_fmtty_format_readers->contents(
                  $new_k,
                  $fmt_rest__0,
                  $fmt
                );
              };
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $take_ignored_format_readers->contents = 
    (dynamic $counter, dynamic $k, dynamic $ign, dynamic $fmt) ==> {
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $take_format_readers__0($counter__1, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__2 = (int) ($counter + 1);
              return $take_format_readers__0($counter__2, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 2:
            return (dynamic $reader) ==> {
              $new_k = (dynamic $readers_rest) ==> {
                return $call1($k, Vector{0, $reader, $readers_rest});
              };
              return $take_format_readers->contents($new_k, $fmt);
            };
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__3 = (int) ($counter + 1);
              return $take_format_readers__0($counter__3, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__4 = (int) ($counter + 1);
              return $take_format_readers__0($counter__4, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__5 = (int) ($counter + 1);
              return $take_format_readers__0($counter__5, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 2:
            if ($counter < 50) {
              $counter__6 = (int) ($counter + 1);
              return $take_format_readers__0($counter__6, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 3:
            if ($counter < 50) {
              $counter__7 = (int) ($counter + 1);
              return $take_format_readers__0($counter__7, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 4:
            if ($counter < 50) {
              $counter__8 = (int) ($counter + 1);
              return $take_format_readers__0($counter__8, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 5:
            if ($counter < 50) {
              $counter__9 = (int) ($counter + 1);
              return $take_format_readers__0($counter__9, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 6:
            if ($counter < 50) {
              $counter__10 = (int) ($counter + 1);
              return $take_format_readers__0($counter__10, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 7:
            if ($counter < 50) {
              $counter__11 = (int) ($counter + 1);
              return $take_format_readers__0($counter__11, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 8:
            if ($counter < 50) {
              $counter__12 = (int) ($counter + 1);
              return $take_format_readers__0($counter__12, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 9:
            $fmtty = $ign[2];
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $take_fmtty_format_readers__0->contents(
                $counter__0,
                $k,
                $fmtty,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $take_fmtty_format_readers__0->contents,
              varray[0,$k,$fmtty,$fmt]
            );
          // FALLTHROUGH
          case 10:
            if ($counter < 50) {
              $counter__13 = (int) ($counter + 1);
              return $take_format_readers__0($counter__13, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__14 = (int) ($counter + 1);
              return $take_format_readers__0($counter__14, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          }
      }
    };
    $take_format_readers->contents = (dynamic $k, dynamic $fmt) ==> {
      return $caml_trampoline($take_format_readers__0(0, $k, $fmt));
    };
    $take_fmtty_format_readers->contents = 
    (dynamic $k, dynamic $fmtty, dynamic $fmt) ==> {
      return $caml_trampoline(
        $take_fmtty_format_readers__0->contents(0, $k, $fmtty, $fmt)
      );
    };
    $pad_prec_scanf = 
    (dynamic $ib, dynamic $fmt, dynamic $readers, dynamic $pad, dynamic $prec, dynamic $scan, dynamic $token) ==> {
      if ($is_int($pad)) {
        if ($is_int($prec)) {
          if (0 === $prec) {
            $call3($scan, $Pervasives[7], $Pervasives[7], $ib);
            $x = $call1($token, $ib);
            return Vector{0, $x, $make_scanf->contents($ib, $fmt, $readers)};
          }
          return $call1($Pervasives[1], $cst_scanf_bad_conversion);
        }
        $p = $prec[1];
        $call3($scan, $Pervasives[7], $p, $ib);
        $x__0 = $call1($token, $ib);
        return Vector{0, $x__0, $make_scanf->contents($ib, $fmt, $readers)};
      }
      else {
        if (0 === $pad[0]) {
          if (0 === $pad[1]) {
            return $call1($Pervasives[1], $cst_scanf_bad_conversion__0);
          }
          $al_ = $pad[2];
          if ($is_int($prec)) {
            if (0 === $prec) {
              $call3($scan, $al_, $Pervasives[7], $ib);
              $x__1 = $call1($token, $ib);
              return Vector{
                0,
                $x__1,
                $make_scanf->contents($ib, $fmt, $readers)
              };
            }
            return $call1($Pervasives[1], $cst_scanf_bad_conversion__1);
          }
          $p__0 = $prec[1];
          $call3($scan, $al_, $p__0, $ib);
          $x__2 = $call1($token, $ib);
          return Vector{0, $x__2, $make_scanf->contents($ib, $fmt, $readers)};
        }
        return $call1($Pervasives[1], $cst_scanf_bad_conversion__2);
      }
    };
    $make_scanf->contents = (dynamic $ib, dynamic $fmt, dynamic $readers) ==> {
      $fmt__0 = $fmt;
      for (;;) {
        if ($is_int($fmt__0)) {return 0;}
        else {
          $continue_label = null;
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $rest = $fmt__0[1];
              $scan_char(0, $ib);
              $c = $token_char($ib);
              return Vector{0, $c, $make_scanf->contents($ib, $rest, $readers)
              };
            // FALLTHROUGH
            case 1:
              $rest__0 = $fmt__0[1];
              $scan_caml_char(0, $ib);
              $c__0 = $token_char($ib);
              return Vector{
                0,
                $c__0,
                $make_scanf->contents($ib, $rest__0, $readers)
              };
            // FALLTHROUGH
            case 2:
              $K_ = $fmt__0[2];
              $L_ = $fmt__0[1];
              if (! $is_int($K_)) {
                switch($K_[0]) {
                  // FALLTHROUGH
                  case 17:
                    $rest__1 = $K_[2];
                    $fmting_lit = $K_[1];
                    $match = $stopper_of_formatting_lit($fmting_lit);
                    $str = $match[2];
                    $stp = $match[1];
                    $scan__0 = (dynamic $width, dynamic $param, dynamic $ib) ==> {
                      return $scan_string(Vector{0, $stp}, $width, $ib);
                    };
                    $str_rest = Vector{11, $str, $rest__1};
                    return $pad_prec_scanf(
                      $ib,
                      $str_rest,
                      $readers,
                      $L_,
                      0,
                      $scan__0,
                      $token_string
                    );
                  // FALLTHROUGH
                  case 18:
                    $M_ = $K_[1];
                    if (0 === $M_[0]) {
                      $rest__2 = $K_[2];
                      $match__0 = $M_[1];
                      $fmt__1 = $match__0[1];
                      $scan__1 = (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_string($q_, $width, $ib);
                      };
                      return $pad_prec_scanf(
                        $ib,
                        $call2($CamlinternalFormatBasics[3], $fmt__1, $rest__2),
                        $readers,
                        $L_,
                        0,
                        $scan__1,
                        $token_string
                      );
                    }
                    $rest__3 = $K_[2];
                    $match__1 = $M_[1];
                    $fmt__2 = $match__1[1];
                    $scan__2 = (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_string($r_, $width, $ib);
                    };
                    return $pad_prec_scanf(
                      $ib,
                      $call2($CamlinternalFormatBasics[3], $fmt__2, $rest__3),
                      $readers,
                      $L_,
                      0,
                      $scan__2,
                      $token_string
                    );
                  }
              }
              $scan = (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_string(0, $width, $ib);
              };
              return $pad_prec_scanf(
                $ib,
                $K_,
                $readers,
                $L_,
                0,
                $scan,
                $token_string
              );
            // FALLTHROUGH
            case 3:
              $rest__4 = $fmt__0[2];
              $pad = $fmt__0[1];
              $scan__3 = (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_caml_string($width, $ib);
              };
              return $pad_prec_scanf(
                $ib,
                $rest__4,
                $readers,
                $pad,
                0,
                $scan__3,
                $token_string
              );
            // FALLTHROUGH
            case 4:
              $rest__5 = $fmt__0[4];
              $prec = $fmt__0[3];
              $pad__0 = $fmt__0[2];
              $iconv = $fmt__0[1];
              $c__1 = $integer_conversion_of_char(
                $call1($CamlinternalFormat[16], $iconv)
              );
              $scan__4 = (dynamic $width, dynamic $param, dynamic $ib) ==> {
                return $scan_int_conversion($c__1, $width, $ib);
              };
              return $pad_prec_scanf(
                $ib,
                $rest__5,
                $readers,
                $pad__0,
                $prec,
                $scan__4,
                (dynamic $ak_) ==> {return $token_int($c__1, $ak_);}
              );
            // FALLTHROUGH
            case 5:
              $rest__6 = $fmt__0[4];
              $prec__0 = $fmt__0[3];
              $pad__1 = $fmt__0[2];
              $iconv__0 = $fmt__0[1];
              $c__2 = $integer_conversion_of_char(
                $call1($CamlinternalFormat[16], $iconv__0)
              );
              $scan__5 = (dynamic $width, dynamic $param, dynamic $ib) ==> {
                return $scan_int_conversion($c__2, $width, $ib);
              };
              return $pad_prec_scanf(
                $ib,
                $rest__6,
                $readers,
                $pad__1,
                $prec__0,
                $scan__5,
                (dynamic $aj_) ==> {return $token_int32($c__2, $aj_);}
              );
            // FALLTHROUGH
            case 6:
              $rest__7 = $fmt__0[4];
              $prec__1 = $fmt__0[3];
              $pad__2 = $fmt__0[2];
              $iconv__1 = $fmt__0[1];
              $c__3 = $integer_conversion_of_char(
                $call1($CamlinternalFormat[16], $iconv__1)
              );
              $scan__6 = (dynamic $width, dynamic $param, dynamic $ib) ==> {
                return $scan_int_conversion($c__3, $width, $ib);
              };
              return $pad_prec_scanf(
                $ib,
                $rest__7,
                $readers,
                $pad__2,
                $prec__1,
                $scan__6,
                (dynamic $ai_) ==> {return $token_nativeint($c__3, $ai_);}
              );
            // FALLTHROUGH
            case 7:
              $rest__8 = $fmt__0[4];
              $prec__2 = $fmt__0[3];
              $pad__3 = $fmt__0[2];
              $iconv__2 = $fmt__0[1];
              $c__4 = $integer_conversion_of_char(
                $call1($CamlinternalFormat[16], $iconv__2)
              );
              $scan__7 = (dynamic $width, dynamic $param, dynamic $ib) ==> {
                return $scan_int_conversion($c__4, $width, $ib);
              };
              return $pad_prec_scanf(
                $ib,
                $rest__8,
                $readers,
                $pad__3,
                $prec__2,
                $scan__7,
                (dynamic $ah_) ==> {return $token_int64($c__4, $ah_);}
              );
            // FALLTHROUGH
            case 8:
              $N_ = $fmt__0[1];
              if (15 === $N_) {
                $rest__9 = $fmt__0[4];
                $prec__3 = $fmt__0[3];
                $pad__4 = $fmt__0[2];
                return $pad_prec_scanf(
                  $ib,
                  $rest__9,
                  $readers,
                  $pad__4,
                  $prec__3,
                  $scan_caml_float,
                  $token_float
                );
              }
              if (16 <= $N_) {
                $rest__10 = $fmt__0[4];
                $prec__4 = $fmt__0[3];
                $pad__5 = $fmt__0[2];
                return $pad_prec_scanf(
                  $ib,
                  $rest__10,
                  $readers,
                  $pad__5,
                  $prec__4,
                  $scan_hex_float,
                  $token_float
                );
              }
              $rest__11 = $fmt__0[4];
              $prec__5 = $fmt__0[3];
              $pad__6 = $fmt__0[2];
              return $pad_prec_scanf(
                $ib,
                $rest__11,
                $readers,
                $pad__6,
                $prec__5,
                $scan_float,
                $token_float
              );
            // FALLTHROUGH
            case 9:
              $rest__12 = $fmt__0[2];
              $pad__7 = $fmt__0[1];
              $scan__8 = (dynamic $param, dynamic $ag_, dynamic $ib) ==> {return $scan_bool($ib);
              };
              return $pad_prec_scanf(
                $ib,
                $rest__12,
                $readers,
                $pad__7,
                0,
                $scan__8,
                $token_bool
              );
            // FALLTHROUGH
            case 10:
              $rest__13 = $fmt__0[1];
              if ($end_of_input($ib)) {
                $fmt__0 = $rest__13;
                $continue_label = "#";break;
              }
              return $bad_input($cst_end_of_input_not_found);
            // FALLTHROUGH
            case 11:
              $fmt__3 = $fmt__0[2];
              $str__0 = $fmt__0[1];
              $O_ = (dynamic $af_) ==> {return $check_char($ib, $af_);};
              $call2($String[8], $O_, $str__0);
              $fmt__0 = $fmt__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__4 = $fmt__0[2];
              $chr = $fmt__0[1];
              $check_char($ib, $chr);
              $fmt__0 = $fmt__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $rest__14 = $fmt__0[3];
              $fmtty = $fmt__0[2];
              $pad_opt = $fmt__0[1];
              $scan_caml_string($width_of_pad_opt($pad_opt), $ib);
              $s = $token_string($ib);
              try {
                $Q_ = $call2($CamlinternalFormat[14], $s, $fmtty);
                $fmt__5 = $Q_;
              }
              catch(\Throwable $exn) {
                $exn = $runtime["caml_wrap_exception"]($exn);
                if ($exn[1] !== $Failure) {
                  throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
                }
                $msg = $exn[2];
                $P_ = $bad_input($msg);
                $fmt__5 = $P_;
              }
              return Vector{
                0,
                $fmt__5,
                $make_scanf->contents($ib, $rest__14, $readers)
              };
            // FALLTHROUGH
            case 14:
              $rest__15 = $fmt__0[3];
              $fmtty__0 = $fmt__0[2];
              $pad_opt__0 = $fmt__0[1];
              $scan_caml_string($width_of_pad_opt($pad_opt__0), $ib);
              $s__0 = $token_string($ib);
              try {
                $match__2 = $call2($CamlinternalFormat[13], 0, $s__0);
                $fmt__8 = $match__2[1];
                $match__3 = $call2($CamlinternalFormat[13], 0, $s__0);
                $fmt__9 = $match__3[1];
                $U_ = $call1($CamlinternalFormat[22], $fmtty__0);
                $V_ = $call1($CamlinternalFormatBasics[2], $U_);
                $fmt__10 = $call2($CamlinternalFormat[12], $fmt__9, $V_);
                $W_ = $call1($CamlinternalFormatBasics[2], $fmtty__0);
                $X_ = $call2($CamlinternalFormat[12], $fmt__8, $W_);
                $fmt__7 = $X_;
                $fmt__6 = $fmt__10;
              }
              catch(\Throwable $exn) {
                $exn = $runtime["caml_wrap_exception"]($exn);
                if ($exn[1] !== $Failure) {
                  throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
                }
                $msg__0 = $exn[2];
                $R_ = $bad_input($msg__0);
                $S_ = $R_[2];
                $T_ = $R_[1];
                $fmt__7 = $T_;
                $fmt__6 = $S_;
              }
              return Vector{
                0,
                Vector{0, $fmt__7, $s__0},
                $make_scanf->contents(
                  $ib,
                  $call2($CamlinternalFormatBasics[3], $fmt__6, $rest__15),
                  $readers
                )
              };
            // FALLTHROUGH
            case 15:
              return $call1($Pervasives[1], $cst_scanf_bad_conversion_a);
            // FALLTHROUGH
            case 16:
              return $call1($Pervasives[1], $cst_scanf_bad_conversion_t);
            // FALLTHROUGH
            case 17:
              $fmt__11 = $fmt__0[2];
              $formatting_lit = $fmt__0[1];
              $Y_ = $call1($CamlinternalFormat[17], $formatting_lit);
              $Z_ = (dynamic $ae_) ==> {return $check_char($ib, $ae_);};
              $call2($String[8], $Z_, $Y_);
              $fmt__0 = $fmt__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $aa_ = $fmt__0[1];
              if (0 === $aa_[0]) {
                $rest__16 = $fmt__0[2];
                $match__4 = $aa_[1];
                $fmt__12 = $match__4[1];
                $check_char($ib, 64);
                $check_char($ib, 123);
                $fmt__13 = $call2(
                  $CamlinternalFormatBasics[3],
                  $fmt__12,
                  $rest__16
                );
                $fmt__0 = $fmt__13;
                $continue_label = "#";break;
              }
              $rest__17 = $fmt__0[2];
              $match__5 = $aa_[1];
              $fmt__14 = $match__5[1];
              $check_char($ib, 64);
              $check_char($ib, 91);
              $fmt__15 = $call2(
                $CamlinternalFormatBasics[3],
                $fmt__14,
                $rest__17
              );
              $fmt__0 = $fmt__15;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 19:
              $fmt_rest = $fmt__0[1];
              if ($readers) {
                $readers_rest = $readers[2];
                $reader = $readers[1];
                $x = $call1($reader, $ib);
                return Vector{
                  0,
                  $x,
                  $make_scanf->contents($ib, $fmt_rest, $readers_rest)
                };
              }
              return $call1($Pervasives[1], $cst_scanf_missing_reader);
            // FALLTHROUGH
            case 20:
              $ab_ = $fmt__0[3];
              $ac_ = $fmt__0[2];
              $ad_ = $fmt__0[1];
              if (! $is_int($ab_) && 17 === $ab_[0]) {
                $rest__18 = $ab_[2];
                $fmting_lit__0 = $ab_[1];
                $match__6 = $stopper_of_formatting_lit($fmting_lit__0);
                $str__1 = $match__6[2];
                $stp__0 = $match__6[1];
                $width__0 = $width_of_pad_opt($ad_);
                $scan_chars_in_char_set(
                  $ac_,
                  Vector{0, $stp__0},
                  $width__0,
                  $ib
                );
                $s__2 = $token_string($ib);
                $str_rest__0 = Vector{11, $str__1, $rest__18};
                return Vector{
                  0,
                  $s__2,
                  $make_scanf->contents($ib, $str_rest__0, $readers)
                };
              }
              $width = $width_of_pad_opt($ad_);
              $scan_chars_in_char_set($ac_, 0, $width, $ib);
              $s__1 = $token_string($ib);
              return Vector{
                0,
                $s__1,
                $make_scanf->contents($ib, $ab_, $readers)
              };
            // FALLTHROUGH
            case 21:
              $rest__19 = $fmt__0[2];
              $counter = $fmt__0[1];
              $count = $get_counter($ib, $counter);
              return Vector{
                0,
                $count,
                $make_scanf->contents($ib, $rest__19, $readers)
              };
            // FALLTHROUGH
            case 22:
              $rest__20 = $fmt__0[1];
              $c__5 = $checked_peek_char($ib);
              return Vector{
                0,
                $c__5,
                $make_scanf->contents($ib, $rest__20, $readers)
              };
            // FALLTHROUGH
            case 23:
              $rest__21 = $fmt__0[2];
              $ign = $fmt__0[1];
              $match__7 = $call2($CamlinternalFormat[6], $ign, $rest__21);
              $fmt__16 = $match__7[1];
              $match__8 = $make_scanf->contents($ib, $fmt__16, $readers);
              if ($match__8) {$arg_rest = $match__8[2];return $arg_rest;}
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $s_}
                    ) as \Throwable;
            // FALLTHROUGH
            default:
              return $call1(
                $Pervasives[1],
                $cst_scanf_bad_conversion_custom_converter
              );
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $kscanf = (dynamic $ib, dynamic $ef, dynamic $param) ==> {
      $str = $param[2];
      $fmt = $param[1];
      $apply = (dynamic $f, dynamic $args) ==> {
        $f__0 = $f;
        $args__0 = $args;
        for (;;) {
          if ($args__0) {
            $args__1 = $args__0[2];
            $x = $args__0[1];
            $f__1 = $call1($f__0, $x);
            $f__0 = $f__1;
            $args__0 = $args__1;
            continue;
          }
          return $f__0;
        }
      };
      $k = (dynamic $readers, dynamic $f) ==> {
        $reset_token($ib);
        try {
          $J_ = Vector{0, $make_scanf->contents($ib, $fmt, $readers)};
          $D_ = $J_;
        }
        catch(\Throwable $exc) {
          $exc = $runtime["caml_wrap_exception"]($exc);
          if ($exc[1] === $Scan_failure) {$switch__0 = 0;}
          else {
            if ($exc[1] === $Failure) {$switch__0 = 0;}
            else {
              if ($exc === $End_of_file) {$switch__0 = 0;}
              else {
                if ($exc[1] !== $Invalid_argument) {
                  throw $caml_wrap_thrown_exception_reraise($exc) as \Throwable;
                }
                $msg = $exc[2];
                $E_ = $call1($String[13], $str);
                $F_ = $call2($Pervasives[16], $E_, $cst__1);
                $G_ = $call2($Pervasives[16], $cst_in_format, $F_);
                $H_ = $call2($Pervasives[16], $msg, $G_);
                $I_ = $call1($Pervasives[1], $H_);
                $C_ = $I_;
                $switch__0 = 1;
              }
            }
          }
          if (! $switch__0) {$C_ = Vector{1, $exc};}
          $D_ = $C_;
        }
        if (0 === $D_[0]) {$args = $D_[1];return $apply($f, $args);}
        $exc = $D_[1];
        return $call2($ef, $ib, $exc);
      };
      return $take_format_readers->contents($k, $fmt);
    };
    $bscanf = (dynamic $ib, dynamic $fmt) ==> {
      return $kscanf($ib, $scanf_bad_input, $fmt);
    };
    $ksscanf = (dynamic $s, dynamic $ef, dynamic $fmt) ==> {
      return $kscanf($from_string($s), $ef, $fmt);
    };
    $sscanf = (dynamic $s, dynamic $fmt) ==> {
      return $kscanf($from_string($s), $scanf_bad_input, $fmt);
    };
    $scanf = (dynamic $fmt) ==> {
      return $kscanf($stdin, $scanf_bad_input, $fmt);
    };
    $bscanf_format = (dynamic $ib, dynamic $format, dynamic $f) ==> {
      $scan_caml_string($Pervasives[7], $ib);
      $str = $token_string($ib);
      try {$B_ = $call2($CamlinternalFormat[15], $str, $format);$fmt = $B_;}
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($exn[1] !== $Failure) {
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
        $msg = $exn[2];
        $A_ = $bad_input($msg);
        $fmt = $A_;
      }
      return $call1($f, $fmt);
    };
    $sscanf_format = (dynamic $s, dynamic $format, dynamic $f) ==> {
      return $bscanf_format($from_string($s), $format, $f);
    };
    $string_to_String = (dynamic $s) ==> {
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 2));
      $call2($Buffer[10], $b, 34);
      $y_ = (int) ($l + -1);
      $x_ = 0;
      if (! ($y_ < 0)) {
        $i = $x_;
        for (;;) {
          $c = $caml_string_get($s, $i);
          if (34 === $c) {$call2($Buffer[10], $b, 92);}
          $call2($Buffer[10], $b, $c);
          $z_ = (int) ($i + 1);
          if ($y_ !== $i) {$i = $z_;continue;}
          break;
        }
      }
      $call2($Buffer[10], $b, 34);
      return $call1($Buffer[2], $b);
    };
    $format_from_string = (dynamic $s, dynamic $fmt) ==> {
      $w_ = (dynamic $x) ==> {return $x;};
      return $sscanf_format($string_to_String($s), $fmt, $w_);
    };
    $unescaped = (dynamic $s) ==> {
      $u_ = (dynamic $x) ==> {return $x;};
      $v_ = $call2($Pervasives[16], $s, $cst__2);
      return $call1($sscanf($call2($Pervasives[16], $cst__3, $v_), $t_), $u_);
    };
    $kfscanf = (dynamic $ic, dynamic $ef, dynamic $fmt) ==> {
      return $kscanf($memo_from_channel($ic), $ef, $fmt);
    };
    $fscanf = (dynamic $ic, dynamic $fmt) ==> {
      return $kscanf($memo_from_channel($ic), $scanf_bad_input, $fmt);
    };
    $Scanf = Vector{
      0,
      Vector{
        0,
        $stdin,
        $open_in,
        $open_in_bin,
        $close_in,
        $open_in,
        $open_in_bin,
        $from_string,
        $from_function,
        $from_channel,
        $end_of_input,
        $beginning_of_input,
        $name_of_input,
        $stdin
      },
      $Scan_failure,
      $bscanf,
      $sscanf,
      $scanf,
      $kscanf,
      $ksscanf,
      $bscanf_format,
      $sscanf_format,
      $format_from_string,
      $unescaped,
      $fscanf,
      $kfscanf
    };
    
     return ($Scanf);

  }
  public static function Scan_failure() {
    return static::get()[2]();
  }
  public static function bscanf(dynamic $ib, dynamic $fmt) {
    return static::get()[3]($ib, $fmt);
  }
  public static function sscanf(dynamic $s, dynamic $fmt) {
    return static::get()[4]($s, $fmt);
  }
  public static function scanf(dynamic $fmt) {
    return static::get()[5]($fmt);
  }
  public static function kscanf(dynamic $ib, dynamic $ef, dynamic $param) {
    return static::get()[6]($ib, $ef, $param);
  }
  public static function ksscanf(dynamic $s, dynamic $ef, dynamic $fmt) {
    return static::get()[7]($s, $ef, $fmt);
  }
  public static function bscanf_format(dynamic $ib, dynamic $format, dynamic $f) {
    return static::get()[8]($ib, $format, $f);
  }
  public static function sscanf_format(dynamic $s, dynamic $format, dynamic $f) {
    return static::get()[9]($s, $format, $f);
  }
  public static function format_from_string(dynamic $s, dynamic $fmt) {
    return static::get()[10]($s, $fmt);
  }
  public static function unescaped(dynamic $s) {
    return static::get()[11]($s);
  }
  public static function fscanf(dynamic $ic, dynamic $fmt) {
    return static::get()[12]($ic, $fmt);
  }
  public static function kfscanf(dynamic $ic, dynamic $ef, dynamic $fmt) {
    return static::get()[13]($ic, $ef, $fmt);
  }

}
/* Hashing disabled */
