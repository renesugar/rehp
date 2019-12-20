<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__WebSockets {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $a_ = (dynamic $x) ==> {
      return $call1(
        $runtime["caml_get_public_method"]($x, -492394744, 211),
        $x
      );
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $webSocket = ((dynamic $t0, dynamic $param) ==> {return $t0->WebSocket;})($b_, $a_);
    $is_supported = (dynamic $param) ==> {
      return $call1($Js_of_ocaml_Js[6][5], $webSocket);
    };
    $Js_of_ocaml_WebSockets = Vector{
      0,
      $webSocket,
      $webSocket,
      $webSocket,
      $is_supported
    };
    
     return ($Js_of_ocaml_WebSockets);

  }
  public static function webSocket() {
    return static::get()[1]();
  }
  public static function webSocket() {
    return static::get()[2]();
  }
  public static function webSocket() {
    return static::get()[3]();
  }
  public static function is_supported(dynamic $param) {
    return static::get()[4]($param);
  }

}
/* Hashing disabled */
