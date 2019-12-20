/**
 * @flow strict
 * Nativeint
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_d = runtime["caml_new_string"]("%d");
var Failure = require("Failure.js");
var Sys = require("Sys.js");
var zero = 0;
var one = 1;
var minus_one = -1;

function succ(n) {return n + 1 | 0;}

function pred(n) {return n - 1 | 0;}

function abs(n) {return runtime["caml_greaterequal"](n, 0) ? n : - n | 0;}

var size = Sys[10];
var min_int = 1 << (size + -1 | 0);
var max_int = min_int - 1 | 0;

function lognot(n) {return n ^ -1;}

function to_string(n) {return runtime["caml_format_int"](cst_d, n);}

function of_string_opt(s) {
  try {var a_ = [0,runtime["caml_int_of_string"](s)];return a_;}
  catch(b_) {
    b_ = runtime["caml_wrap_exception"](b_);
    if (b_[1] === Failure) {return 0;}
    throw caml_wrap_thrown_exception_reraise(b_);
  }
}

function compare(x, y) {return runtime["caml_int_compare"](x, y);}

function equal(x, y) {return 0 === compare(x, y) ? 1 : 0;}

var Nativeint = [
  0,
  zero,
  one,
  minus_one,
  succ,
  pred,
  abs,
  size,
  max_int,
  min_int,
  lognot,
  of_string_opt,
  to_string,
  compare,
  equal
];

exports = Nativeint;

/*::type Exports = {
  zero: any
  one: any
  minus_one: any
  succ: (n: any) => any,
  pred: (n: any) => any,
  abs: (n: any) => any,
  size: any
  max_int: any
  min_int: any
  lognot: (n: any) => any,
  of_string_opt: (s: any) => any,
  to_string: (n: any) => any,
  compare: (x: any, y: any) => any,
  equal: (x: any, y: any) => any,
}*/
/** @type {{
  zero: any,
  one: any,
  minus_one: any,
  succ: (any) => any,
  pred: (any) => any,
  abs: (any) => any,
  size: any,
  max_int: any,
  min_int: any,
  lognot: (any) => any,
  of_string_opt: (any) => any,
  to_string: (any) => any,
  compare: (any, any) => any,
  equal: (any, any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.zero = module.exports[1];
module.exports.one = module.exports[2];
module.exports.minus_one = module.exports[3];
module.exports.succ = module.exports[4];
module.exports.pred = module.exports[5];
module.exports.abs = module.exports[6];
module.exports.size = module.exports[7];
module.exports.max_int = module.exports[8];
module.exports.min_int = module.exports[9];
module.exports.lognot = module.exports[10];
module.exports.of_string_opt = module.exports[11];
module.exports.to_string = module.exports[12];
module.exports.compare = module.exports[13];
module.exports.equal = module.exports[14];

/* Hashing disabled */
