<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Stack.php
 */

namespace Rehack;

final class Stack {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $List_ = List_::get();
    Stack::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Stack;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
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
    $cst_Stack_Empty = $runtime["caml_new_string"]("Stack.Empty");
    $List = $global_data["List_"];
    $Empty = Vector{248, $cst_Stack_Empty, $runtime["caml_fresh_oo_id"](0)};
    $create = function(dynamic $param) {return Vector{0, 0, 0};};
    $clear = function(dynamic $s) {$s[1] = 0;$s[2] = 0;return 0;};
    $copy = function(dynamic $s) {return Vector{0, $s[1], $s[2]};};
    $push = function(dynamic $x, dynamic $s) {
      $s[1] = Vector{0, $x, $s[1]};
      $s[2] = (int) ($s[2] + 1);
      return 0;
    };
    $pop = function(dynamic $s) use ($Empty,$runtime) {
      $gU = $s[1];
      if ($gU) {
        $tl = $gU[2];
        $hd = $gU[1];
        $s[1] = $tl;
        $s[2] = (int) ($s[2] + -1);
        return $hd;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty) as \Throwable;
    };
    $top = function(dynamic $s) use ($Empty,$runtime) {
      $gT = $s[1];
      if ($gT) {$hd = $gT[1];return $hd;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty) as \Throwable;
    };
    $is_empty = function(dynamic $s) {return 0 === $s[1] ? 1 : (0);};
    $length = function(dynamic $s) {return $s[2];};
    $iter = function(dynamic $f, dynamic $s) use ($List,$caml_call2) {
      return $caml_call2($List[15], $f, $s[1]);
    };
    $fold = function(dynamic $f, dynamic $acc, dynamic $s) use ($List,$caml_call3) {
      return $caml_call3($List[20], $f, $acc, $s[1]);
    };
    $Stack = Vector{
      0,
      $Empty,
      $create,
      $push,
      $pop,
      $top,
      $clear,
      $copy,
      $is_empty,
      $length,
      $iter,
      $fold
    };
    
    $runtime["caml_register_global"](2, $Stack, "Stack");

  }
}