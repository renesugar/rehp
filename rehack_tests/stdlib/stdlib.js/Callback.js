/**
 * @flow strict
 * Callback
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_register_named_value = runtime["caml_register_named_value"];
var Obj = require("Obj.js");

function register(name, v) {return caml_register_named_value(name, v);}

function register_exception(name, exn) {
  var slot = runtime["caml_obj_tag"](exn) === Obj[8] ? exn : exn[1];
  return caml_register_named_value(name, slot);
}

var Callback = [0,register,register_exception];

exports = Callback;

/*::type Exports = {
  register: (name: any, v: any) => any,
  register_exception: (name: any, exn: any) => any,
}*/
/** @type {{
  register: (any, any) => any,
  register_exception: (any, any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.register = module.exports[1];
module.exports.register_exception = module.exports[2];

/* Hashing disabled */
