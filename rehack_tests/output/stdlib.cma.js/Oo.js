/**
 * @flow strict
 * Oo
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var CamlinternalOO = require("CamlinternalOO.js");
var copy = CamlinternalOO[22];
var new_method = CamlinternalOO[1];
var public_method_label = CamlinternalOO[1];
var Oo = [0,copy,new_method,public_method_label];

exports = Oo;

/*::type Exports = {
  copy: any
  new_method: any
  public_method_label: any
}*/
/** @type {{
  copy: any,
  new_method: any,
  public_method_label: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.copy = module.exports[1];
module.exports.new_method = module.exports[2];
module.exports.public_method_label = module.exports[3];

/* Hashing disabled */