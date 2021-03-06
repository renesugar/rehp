<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__digest {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_md5_string = $runtime["caml_md5_string"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string__0 = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Digest_from_hex__0 = $string__0("Digest.from_hex");
    $cst_Digest_from_hex = $string__0("Digest.from_hex");
    $cst_Digest_to_hex = $string__0("Digest.to_hex");
    $cst_Digest_substring = $string__0("Digest.substring");
    $Stdlib = Stdlib::get();
    $Stdlib_char = Stdlib__char::get();
    $Stdlib_bytes = Stdlib__bytes::get();
    $Stdlib_string = Stdlib__string::get();
    $compare = $Stdlib_string[33];
    $equal = $Stdlib_string[34];
    $string = (dynamic $str) : dynamic ==> {
      return $caml_md5_string($str, 0, $caml_ml_string_length($str));
    };
    $bytes = (dynamic $b) : dynamic ==> {
      return $string($call1($Stdlib_bytes[42], $b));
    };
    $substring = (dynamic $str, dynamic $ofs, dynamic $len) : dynamic ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_string_length($str) - $len) < $ofs)) {return $caml_md5_string($str, $ofs, $len);}
        }
      }
      return $call1($Stdlib[1], $cst_Digest_substring);
    };
    $subbytes = (dynamic $b, dynamic $ofs, dynamic $len) : dynamic ==> {
      return $substring($call1($Stdlib_bytes[42], $b), $ofs, $len);
    };
    $file = (dynamic $filename) : dynamic ==> {
      $d = null as dynamic;
      $ic = $call1($Stdlib[80], $filename);
      try {$d = $runtime["caml_md5_chan"]($ic, -1);}
      catch(\Throwable $e) {
        $e = $runtime["caml_wrap_exception"]($e);
        $call1($Stdlib[93], $ic);
        throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
      }
      $call1($Stdlib[93], $ic);
      return $d;
    };
    $output = (dynamic $chan, dynamic $digest) : dynamic ==> {
      return $call2($Stdlib[66], $chan, $digest);
    };
    $input = (dynamic $chan) : dynamic ==> {
      return $call2($Stdlib[86], $chan, 16);
    };
    $char_hex = (dynamic $n) : dynamic ==> {
      $e_ = 10 <= $n ? 87 : (48);
      return (int) ($n + $e_);
    };
    $to_hex = (dynamic $d) : dynamic ==> {
      $d_ = null as dynamic;
      $x = null as dynamic;
      if (16 !== $caml_ml_string_length($d)) {
        $call1($Stdlib[1], $cst_Digest_to_hex);
      }
      $result = $caml_create_bytes(32);
      $i = 0 as dynamic;
      for (;;) {
        $x = $caml_string_get($d, $i);
        $caml_bytes_unsafe_set(
          $result,
          (int)
          ($i * 2),
          $char_hex((int) $unsigned_right_shift_32($x, 4))
        );
        $caml_bytes_unsafe_set(
          $result,
          (int)
          ((int) ($i * 2) + 1),
          $char_hex($x & 15)
        );
        $d_ = (int) ($i + 1) as dynamic;
        if (15 !== $i) {$i = $d_;continue;}
        return $call1($Stdlib_bytes[42], $result);
      }
    };
    $from_hex = (dynamic $s) : dynamic ==> {
      $a_ = null as dynamic;
      $b_ = null as dynamic;
      if (32 !== $caml_ml_string_length($s)) {
        $call1($Stdlib[1], $cst_Digest_from_hex);
      }
      $digit = (dynamic $c) : dynamic ==> {
        $switcher = null as dynamic;
        if (65 <= $c) {
          if (97 <= $c) {
            if (! (103 <= $c)) {return (int) ((int) ($c - 97) + 10);}
          }
          else {if (! (71 <= $c)) {return (int) ((int) ($c - 65) + 10);}}
        }
        else {
          $switcher = (int) ($c + -48) as dynamic;
          if (! (9 < $unsigned_right_shift_32($switcher, 0))) {return (int) ($c - 48);}
        }
        throw $caml_wrap_thrown_exception(
                Vector{0, $Stdlib[6], $cst_Digest_from_hex__0}
              ) as \Throwable;
      };
      $byte__0 = (dynamic $i) : dynamic ==> {
        $c_ = $digit($caml_string_get($s, (int) ($i + 1)));
        return (int)
        ($left_shift_32($digit($caml_string_get($s, $i)), 4) + $c_);
      };
      $result = $caml_create_bytes(16);
      $i = 0 as dynamic;
      for (;;) {
        $a_ = $byte__0((int) (2 * $i));
        $runtime["caml_bytes_set"]($result, $i, $call1($Stdlib_char[1], $a_));
        $b_ = (int) ($i + 1) as dynamic;
        if (15 !== $i) {$i = $b_;continue;}
        return $call1($Stdlib_bytes[42], $result);
      }
    };
    $Stdlib_digest = Vector{
      0,
      $compare,
      $equal,
      $string,
      $bytes,
      $substring,
      $subbytes,
      $file,
      $output,
      $input,
      $to_hex,
      $from_hex
    } as dynamic;
    
    return($Stdlib_digest);

  }
  public static function string(dynamic $str): dynamic {
    return static::syncCall(__FUNCTION__, 3, $str);
  }
  public static function bytes(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 4, $b);
  }
  public static function substring(dynamic $str, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 5, $str, $ofs, $len);
  }
  public static function subbytes(dynamic $b, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 6, $b, $ofs, $len);
  }
  public static function file(dynamic $filename): dynamic {
    return static::syncCall(__FUNCTION__, 7, $filename);
  }
  public static function output(dynamic $chan, dynamic $digest): dynamic {
    return static::syncCall(__FUNCTION__, 8, $chan, $digest);
  }
  public static function input(dynamic $chan): dynamic {
    return static::syncCall(__FUNCTION__, 9, $chan);
  }
  public static function to_hex(dynamic $d): dynamic {
    return static::syncCall(__FUNCTION__, 10, $d);
  }
  public static function from_hex(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 11, $s);
  }

}
/* Hashing disabled */
