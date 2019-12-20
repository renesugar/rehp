<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class ArrayLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $Array =  Array_::get ();
    $make_float = $Array[1];
    $init = $Array[2];
    $make_matrix = $Array[3];
    $create_matrix = $Array[4];
    $append = $Array[5];
    $concat = $Array[6];
    $sub = $Array[7];
    $copy = $Array[8];
    $fill = $Array[9];
    $blit = $Array[10];
    $to_list = $Array[11];
    $of_list = $Array[12];
    $iter = $Array[13];
    $iteri = $Array[14];
    $map = $Array[15];
    $mapi = $Array[16];
    $fold_left = $Array[17];
    $fold_right = $Array[18];
    $iter2 = $Array[19];
    $map2 = $Array[20];
    $for_all = $Array[21];
    $exists = $Array[22];
    $mem = $Array[23];
    $memq = $Array[24];
    $sort = $Array[25];
    $stable_sort = $Array[26];
    $fast_sort = $Array[27];
    $Floatarray = $Array[28];
    $ArrayLabels = Vector{
      0,
      $init,
      $make_matrix,
      $create_matrix,
      $append,
      $concat,
      $sub,
      $copy,
      $fill,
      $blit,
      $to_list,
      $of_list,
      $iter,
      $map,
      $iteri,
      $mapi,
      $fold_left,
      $fold_right,
      $iter2,
      $map2,
      $exists,
      $for_all,
      $mem,
      $memq,
      $make_float,
      $sort,
      $stable_sort,
      $fast_sort,
      $Floatarray
    };
    
     return ($ArrayLabels);

  }
  public static function init() {
    return static::get()[1]();
  }
  public static function make_matrix() {
    return static::get()[2]();
  }
  public static function create_matrix() {
    return static::get()[3]();
  }
  public static function append() {
    return static::get()[4]();
  }
  public static function concat() {
    return static::get()[5]();
  }
  public static function sub() {
    return static::get()[6]();
  }
  public static function copy() {
    return static::get()[7]();
  }
  public static function fill() {
    return static::get()[8]();
  }
  public static function blit() {
    return static::get()[9]();
  }
  public static function to_list() {
    return static::get()[10]();
  }
  public static function of_list() {
    return static::get()[11]();
  }
  public static function iter() {
    return static::get()[12]();
  }
  public static function map() {
    return static::get()[13]();
  }
  public static function iteri() {
    return static::get()[14]();
  }
  public static function mapi() {
    return static::get()[15]();
  }
  public static function fold_left() {
    return static::get()[16]();
  }
  public static function fold_right() {
    return static::get()[17]();
  }
  public static function iter2() {
    return static::get()[18]();
  }
  public static function map2() {
    return static::get()[19]();
  }
  public static function exists() {
    return static::get()[20]();
  }
  public static function for_all() {
    return static::get()[21]();
  }
  public static function mem() {
    return static::get()[22]();
  }
  public static function memq() {
    return static::get()[23]();
  }
  public static function make_float() {
    return static::get()[24]();
  }
  public static function sort() {
    return static::get()[25]();
  }
  public static function stable_sort() {
    return static::get()[26]();
  }
  public static function fast_sort() {
    return static::get()[27]();
  }
  public static function Floatarray() {
    return static::get()[28]();
  }

}
/* Hashing disabled */
