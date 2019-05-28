/**
 * Js_of_ocaml__Dom_svg
 * @providesModule Js_of_ocaml__Dom_svg
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_vkern__0 = caml_new_string("vkern");
var cst_view__0 = caml_new_string("view");
var cst_use__0 = caml_new_string("use");
var cst_tspan__0 = caml_new_string("tspan");
var cst_tref__0 = caml_new_string("tref");
var cst_title__0 = caml_new_string("title");
var cst_textpath__0 = caml_new_string("textpath");
var cst_text__0 = caml_new_string("text");
var cst_symbol__0 = caml_new_string("symbol");
var cst_switch__0 = caml_new_string("switch");
var cst_svg__0 = caml_new_string("svg");
var cst_style__0 = caml_new_string("style");
var cst_stop__0 = caml_new_string("stop");
var cst_set__0 = caml_new_string("set");
var cst_script__0 = caml_new_string("script");
var cst_rect__0 = caml_new_string("rect");
var cst_radialgradient__0 = caml_new_string("radialgradient");
var cst_polyline__0 = caml_new_string("polyline");
var cst_polygon__0 = caml_new_string("polygon");
var cst_pattern__0 = caml_new_string("pattern");
var cst_path__0 = caml_new_string("path");
var cst_mpath__0 = caml_new_string("mpath");
var cst_missing_glyph__0 = caml_new_string("missing-glyph");
var cst_metadata__0 = caml_new_string("metadata");
var cst_mask__0 = caml_new_string("mask");
var cst_lineargradient__0 = caml_new_string("lineargradient");
var cst_line__0 = caml_new_string("line");
var cst_image__0 = caml_new_string("image");
var cst_hkern__0 = caml_new_string("hkern");
var cst_glyphref__0 = caml_new_string("glyphref");
var cst_glyph__0 = caml_new_string("glyph");
var cst_g__0 = caml_new_string("g");
var cst_foreignobject__0 = caml_new_string("foreignobject");
var cst_font_face_uri__0 = caml_new_string("font-face-uri");
var cst_font_face_src__0 = caml_new_string("font-face-src");
var cst_font_face_name__0 = caml_new_string("font-face-name");
var cst_font_face_format__0 = caml_new_string("font-face-format");
var cst_font_face__0 = caml_new_string("font-face");
var cst_font__0 = caml_new_string("font");
var cst_filter__0 = caml_new_string("filter");
var cst_ellipse__0 = caml_new_string("ellipse");
var cst_desc__0 = caml_new_string("desc");
var cst_defs__0 = caml_new_string("defs");
var cst_cursor__0 = caml_new_string("cursor");
var cst_clippath__0 = caml_new_string("clippath");
var cst_circle__0 = caml_new_string("circle");
var cst_animatetransform__0 = caml_new_string("animatetransform");
var cst_animatemotion__0 = caml_new_string("animatemotion");
var cst_animatecolor__0 = caml_new_string("animatecolor");
var cst_animate__0 = caml_new_string("animate");
var cst_altglyphitem__0 = caml_new_string("altglyphitem");
var cst_altglyphdef__0 = caml_new_string("altglyphdef");
var cst_altglyph__0 = caml_new_string("altglyph");
var cst_a__0 = caml_new_string("a");
var cst_vkern = caml_new_string("vkern");
var cst_view = caml_new_string("view");
var cst_use = caml_new_string("use");
var cst_tspan = caml_new_string("tspan");
var cst_tref = caml_new_string("tref");
var cst_title = caml_new_string("title");
var cst_textpath = caml_new_string("textpath");
var cst_text = caml_new_string("text");
var cst_symbol = caml_new_string("symbol");
var cst_switch = caml_new_string("switch");
var cst_svg = caml_new_string("svg");
var cst_style = caml_new_string("style");
var cst_stop = caml_new_string("stop");
var cst_set = caml_new_string("set");
var cst_script = caml_new_string("script");
var cst_rect = caml_new_string("rect");
var cst_radialgradient = caml_new_string("radialgradient");
var cst_polyline = caml_new_string("polyline");
var cst_polygon = caml_new_string("polygon");
var cst_pattern = caml_new_string("pattern");
var cst_path = caml_new_string("path");
var cst_mpath = caml_new_string("mpath");
var cst_missing_glyph = caml_new_string("missing-glyph");
var cst_metadata = caml_new_string("metadata");
var cst_mask = caml_new_string("mask");
var cst_lineargradient = caml_new_string("lineargradient");
var cst_line = caml_new_string("line");
var cst_image = caml_new_string("image");
var cst_hkern = caml_new_string("hkern");
var cst_glyphref = caml_new_string("glyphref");
var cst_glyph = caml_new_string("glyph");
var cst_g = caml_new_string("g");
var cst_foreignobject = caml_new_string("foreignobject");
var cst_font_face_uri = caml_new_string("font-face-uri");
var cst_font_face_src = caml_new_string("font-face-src");
var cst_font_face_name = caml_new_string("font-face-name");
var cst_font_face_format = caml_new_string("font-face-format");
var cst_font_face = caml_new_string("font-face");
var cst_font = caml_new_string("font");
var cst_filter = caml_new_string("filter");
var cst_ellipse = caml_new_string("ellipse");
var cst_desc = caml_new_string("desc");
var cst_defs = caml_new_string("defs");
var cst_cursor = caml_new_string("cursor");
var cst_clippath = caml_new_string("clippath");
var cst_circle = caml_new_string("circle");
var cst_animatetransform = caml_new_string("animatetransform");
var cst_animatemotion = caml_new_string("animatemotion");
var cst_animatecolor = caml_new_string("animatecolor");
var cst_animate = caml_new_string("animate");
var cst_altglyphitem = caml_new_string("altglyphitem");
var cst_altglyphdef = caml_new_string("altglyphdef");
var cst_altglyph = caml_new_string("altglyph");
var cst_a = caml_new_string("a");
var cst_Js_of_ocaml_Dom_svg_SVGError = caml_new_string(
  "Js_of_ocaml__Dom_svg.SVGError"
);
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Not_found = global_data["Not_found"];
var xmlns = "http://www.w3.org/2000/svg";
var SVGError = [
  248,
  cst_Js_of_ocaml_Dom_svg_SVGError,
  runtime["caml_fresh_oo_id"](0)
];

function createElement(doc, name) {
  function ld(x) {
    return caml_call1(caml_get_public_method(x, -387984539, 192), x);
  }
  var le = name.toString();
  return function(t2, t0, t1, param) {return t2.createElementNS(t0, t1);}(doc, xmlns, le, ld
  );
}

function unsafeCreateElement(doc, name) {return createElement(doc, name);}

function createA(doc) {return unsafeCreateElement(doc, cst_a);}

function createAltGlyph(doc) {return unsafeCreateElement(doc, cst_altglyph);}

function createAltGlyphDef(doc) {
  return unsafeCreateElement(doc, cst_altglyphdef);
}

function createAltGlyphItem(doc) {
  return unsafeCreateElement(doc, cst_altglyphitem);
}

function createAnimate(doc) {return unsafeCreateElement(doc, cst_animate);}

function createAnimateColor(doc) {
  return unsafeCreateElement(doc, cst_animatecolor);
}

function createAnimateMotion(doc) {
  return unsafeCreateElement(doc, cst_animatemotion);
}

function createAnimateTransform(doc) {
  return unsafeCreateElement(doc, cst_animatetransform);
}

function createCircle(doc) {return unsafeCreateElement(doc, cst_circle);}

function createClipPath(doc) {return unsafeCreateElement(doc, cst_clippath);}

function createCursor(doc) {return unsafeCreateElement(doc, cst_cursor);}

function createDefs(doc) {return unsafeCreateElement(doc, cst_defs);}

function createDesc(doc) {return unsafeCreateElement(doc, cst_desc);}

function createEllipse(doc) {return unsafeCreateElement(doc, cst_ellipse);}

function createFilter(doc) {return unsafeCreateElement(doc, cst_filter);}

function createFont(doc) {return unsafeCreateElement(doc, cst_font);}

function createFontFace(doc) {return unsafeCreateElement(doc, cst_font_face);}

function createFontFaceFormat(doc) {
  return unsafeCreateElement(doc, cst_font_face_format);
}

function createFontFaceName(doc) {
  return unsafeCreateElement(doc, cst_font_face_name);
}

function createFontFaceSrc(doc) {
  return unsafeCreateElement(doc, cst_font_face_src);
}

function createFontFaceUri(doc) {
  return unsafeCreateElement(doc, cst_font_face_uri);
}

function createForeignObject(doc) {
  return unsafeCreateElement(doc, cst_foreignobject);
}

function createG(doc) {return unsafeCreateElement(doc, cst_g);}

function createGlyph(doc) {return unsafeCreateElement(doc, cst_glyph);}

function createGlyphRef(doc) {return unsafeCreateElement(doc, cst_glyphref);}

function createhkern(doc) {return unsafeCreateElement(doc, cst_hkern);}

function createImage(doc) {return unsafeCreateElement(doc, cst_image);}

function createLineElement(doc) {return unsafeCreateElement(doc, cst_line);}

function createLinearElement(doc) {
  return unsafeCreateElement(doc, cst_lineargradient);
}

function createMask(doc) {return unsafeCreateElement(doc, cst_mask);}

function createMetaData(doc) {return unsafeCreateElement(doc, cst_metadata);}

function createMissingGlyph(doc) {
  return unsafeCreateElement(doc, cst_missing_glyph);
}

function createMPath(doc) {return unsafeCreateElement(doc, cst_mpath);}

function createPath(doc) {return unsafeCreateElement(doc, cst_path);}

function createPattern(doc) {return unsafeCreateElement(doc, cst_pattern);}

function createPolygon(doc) {return unsafeCreateElement(doc, cst_polygon);}

function createPolyline(doc) {return unsafeCreateElement(doc, cst_polyline);}

function createRadialgradient(doc) {
  return unsafeCreateElement(doc, cst_radialgradient);
}

function createRect(doc) {return unsafeCreateElement(doc, cst_rect);}

function createScript(doc) {return unsafeCreateElement(doc, cst_script);}

function createSet(doc) {return unsafeCreateElement(doc, cst_set);}

function createStop(doc) {return unsafeCreateElement(doc, cst_stop);}

function createStyle(doc) {return unsafeCreateElement(doc, cst_style);}

function createSvg(doc) {return unsafeCreateElement(doc, cst_svg);}

function createSwitch(doc) {return unsafeCreateElement(doc, cst_switch);}

function createSymbol(doc) {return unsafeCreateElement(doc, cst_symbol);}

function createTextElement(doc) {return unsafeCreateElement(doc, cst_text);}

function createTextpath(doc) {return unsafeCreateElement(doc, cst_textpath);}

function createTitle(doc) {return unsafeCreateElement(doc, cst_title);}

function createTref(doc) {return unsafeCreateElement(doc, cst_tref);}

function createTspan(doc) {return unsafeCreateElement(doc, cst_tspan);}

function createUse(doc) {return unsafeCreateElement(doc, cst_use);}

function createView(doc) {return unsafeCreateElement(doc, cst_view);}

function createvkern(doc) {return unsafeCreateElement(doc, cst_vkern);}

function kY(x) {
  return caml_call1(caml_get_public_method(x, 946564599, 193), x);
}

var kZ = Js_of_ocaml_Js[50][1];
var svg_element = function(t3, param) {return t3.SVGElement;}(kZ, kY);

function k0(x) {
  return caml_call1(caml_get_public_method(x, 454225691, 194), x);
}

var k1 = Js_of_ocaml_Js[50][1];
var document = function(t4, param) {return t4.document;}(k1, k0);

function getElementById(id) {
  function k6(e) {
    if (e instanceof svg_element) {return e;}
    throw runtime["caml_wrap_thrown_exception"](Not_found);
  }
  function k7(param) {throw runtime["caml_wrap_thrown_exception"](Not_found);}
  function k8(x) {
    return caml_call1(caml_get_public_method(x, -332188296, 195), x);
  }
  var k9 = id.toString();
  function k_(x) {
    return caml_call1(caml_get_public_method(x, 454225691, 196), x);
  }
  var la = Js_of_ocaml_Js[50][1];
  var lb = function(t5, param) {return t5.document;}(la, k_);
  var lc = function(t7, t6, param) {return t7.getElementById(t6);}(lb, k9, k8);
  return caml_call3(Js_of_ocaml_Js[5][7], lc, k7, k6);
}

function element(e) {
  if (e instanceof svg_element) {return caml_call1(Js_of_ocaml_Js[2], e);}
  return Js_of_ocaml_Js[1];
}

function unsafeCoerce(e, tag) {
  var k2 = tag.toString();
  function k3(x) {
    return caml_call1(caml_get_public_method(x, 946097238, 197), x);
  }
  function k4(x) {
    return caml_call1(caml_get_public_method(x, 578170309, 198), x);
  }
  var k5 = function(t8, param) {return t8.tagName;}(e, k4);
  if (function(t9, param) {return t9.toLowerCase();}(k5, k3) === k2) {return caml_call1(Js_of_ocaml_Js[2], e);}
  return Js_of_ocaml_Js[1];
}

function a(e) {return unsafeCoerce(e, cst_a__0);}

function altGlyph(e) {return unsafeCoerce(e, cst_altglyph__0);}

function altGlyphDef(e) {return unsafeCoerce(e, cst_altglyphdef__0);}

function altGlyphItem(e) {return unsafeCoerce(e, cst_altglyphitem__0);}

function animate(e) {return unsafeCoerce(e, cst_animate__0);}

function animateColor(e) {return unsafeCoerce(e, cst_animatecolor__0);}

function animateMotion(e) {return unsafeCoerce(e, cst_animatemotion__0);}

function animateTransform(e) {
  return unsafeCoerce(e, cst_animatetransform__0);
}

function circle(e) {return unsafeCoerce(e, cst_circle__0);}

function clipPath(e) {return unsafeCoerce(e, cst_clippath__0);}

function cursor(e) {return unsafeCoerce(e, cst_cursor__0);}

function defs(e) {return unsafeCoerce(e, cst_defs__0);}

function desc(e) {return unsafeCoerce(e, cst_desc__0);}

function ellipse(e) {return unsafeCoerce(e, cst_ellipse__0);}

function filter(e) {return unsafeCoerce(e, cst_filter__0);}

function font(e) {return unsafeCoerce(e, cst_font__0);}

function fontFace(e) {return unsafeCoerce(e, cst_font_face__0);}

function fontFaceFormat(e) {return unsafeCoerce(e, cst_font_face_format__0);}

function fontFaceName(e) {return unsafeCoerce(e, cst_font_face_name__0);}

function fontFaceSrc(e) {return unsafeCoerce(e, cst_font_face_src__0);}

function fontFaceUri(e) {return unsafeCoerce(e, cst_font_face_uri__0);}

function foreignObject(e) {return unsafeCoerce(e, cst_foreignobject__0);}

function g(e) {return unsafeCoerce(e, cst_g__0);}

function glyph(e) {return unsafeCoerce(e, cst_glyph__0);}

function glyphRef(e) {return unsafeCoerce(e, cst_glyphref__0);}

function hkern(e) {return unsafeCoerce(e, cst_hkern__0);}

function image(e) {return unsafeCoerce(e, cst_image__0);}

function lineElement(e) {return unsafeCoerce(e, cst_line__0);}

function linearElement(e) {return unsafeCoerce(e, cst_lineargradient__0);}

function mask(e) {return unsafeCoerce(e, cst_mask__0);}

function metaData(e) {return unsafeCoerce(e, cst_metadata__0);}

function missingGlyph(e) {return unsafeCoerce(e, cst_missing_glyph__0);}

function mPath(e) {return unsafeCoerce(e, cst_mpath__0);}

function path(e) {return unsafeCoerce(e, cst_path__0);}

function pattern(e) {return unsafeCoerce(e, cst_pattern__0);}

function polygon(e) {return unsafeCoerce(e, cst_polygon__0);}

function polyline(e) {return unsafeCoerce(e, cst_polyline__0);}

function radialgradient(e) {return unsafeCoerce(e, cst_radialgradient__0);}

function rect(e) {return unsafeCoerce(e, cst_rect__0);}

function script(e) {return unsafeCoerce(e, cst_script__0);}

function set(e) {return unsafeCoerce(e, cst_set__0);}

function stop(e) {return unsafeCoerce(e, cst_stop__0);}

function style(e) {return unsafeCoerce(e, cst_style__0);}

function svg(e) {return unsafeCoerce(e, cst_svg__0);}

function switch__0(e) {return unsafeCoerce(e, cst_switch__0);}

function symbol(e) {return unsafeCoerce(e, cst_symbol__0);}

function textElement(e) {return unsafeCoerce(e, cst_text__0);}

function textpath(e) {return unsafeCoerce(e, cst_textpath__0);}

function title(e) {return unsafeCoerce(e, cst_title__0);}

function tref(e) {return unsafeCoerce(e, cst_tref__0);}

function tspan(e) {return unsafeCoerce(e, cst_tspan__0);}

function use(e) {return unsafeCoerce(e, cst_use__0);}

function view(e) {return unsafeCoerce(e, cst_view__0);}

function vkern(e) {return unsafeCoerce(e, cst_vkern__0);}

var Js_of_ocaml_Dom_svg = [
  0,
  xmlns,
  SVGError,
  createElement,
  createA,
  createAltGlyph,
  createAltGlyphDef,
  createAltGlyphItem,
  createAnimate,
  createAnimateColor,
  createAnimateMotion,
  createAnimateTransform,
  createCircle,
  createClipPath,
  createCursor,
  createDefs,
  createDesc,
  createEllipse,
  createFilter,
  createFont,
  createFontFace,
  createFontFaceFormat,
  createFontFaceName,
  createFontFaceSrc,
  createFontFaceUri,
  createForeignObject,
  createG,
  createGlyph,
  createGlyphRef,
  createhkern,
  createImage,
  createLineElement,
  createLinearElement,
  createMask,
  createMetaData,
  createMissingGlyph,
  createMPath,
  createPath,
  createPattern,
  createPolygon,
  createPolyline,
  createRadialgradient,
  createRect,
  createScript,
  createSet,
  createStop,
  createStyle,
  createSvg,
  createSwitch,
  createSymbol,
  createTextElement,
  createTextpath,
  createTitle,
  createTref,
  createTspan,
  createUse,
  createView,
  createvkern,
  svg_element,
  document,
  getElementById,
  [
    0,
    element,
    a,
    altGlyph,
    altGlyphDef,
    altGlyphItem,
    animate,
    animateColor,
    animateMotion,
    animateTransform,
    circle,
    clipPath,
    cursor,
    defs,
    desc,
    ellipse,
    filter,
    font,
    fontFace,
    fontFaceFormat,
    fontFaceName,
    fontFaceSrc,
    fontFaceUri,
    foreignObject,
    g,
    glyph,
    glyphRef,
    hkern,
    image,
    lineElement,
    linearElement,
    mask,
    metaData,
    missingGlyph,
    mPath,
    path,
    pattern,
    polygon,
    polyline,
    radialgradient,
    rect,
    script,
    set,
    stop,
    style,
    svg,
    switch__0,
    symbol,
    textElement,
    textpath,
    title,
    tref,
    tspan,
    use,
    view,
    vkern
  ]
];

runtime["caml_register_global"](
  119,
  Js_of_ocaml_Dom_svg,
  "Js_of_ocaml__Dom_svg"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Dom_svg;