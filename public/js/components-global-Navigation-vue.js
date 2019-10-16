(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["components-global-Navigation-vue"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/babel-loader/lib??ref--10-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/global/Navigation.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Navigation",
  methods: {
    showMenu: function showMenu() {
      window.$('.site-nav').slideToggle(300);
    }
  },
  computed: {
    screenWidth: function screenWidth() {
      return this.$store.getters.getScreenWidth;
    }
  },
  watch: {
    '$route': function $route() {
      if (this.screenWidth <= 767) {
        window.$('.site-nav').slideUp(0);
      }
    },
    screenWidth: function screenWidth() {
      // 为了避免频繁触发resize函数导致页面卡顿，使用定时器
      if (!this.timer) {
        if (this.screenWidth > 767) {
          window.$('.site-nav').slideDown(0);
        } else {
          window.$('.site-nav').slideUp(0);
        }

        var that = this;
        setTimeout(function () {
          that.timer = false;
        }, 400);
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/sass-loader/dist/cjs.js??ref--6-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".header[data-v-9652e536] {\n  width: 100%;\n}\n@media (max-width: 766.9px) {\n.header .header-inner[data-v-9652e536] {\n    width: auto;\n    margin-bottom: 50px;\n    padding: 10px;\n    background-color: #f5f5f5;\n}\n.header .header-inner .site-meta[data-v-9652e536] {\n    float: left;\n}\n.header .header-inner .site-meta .site-title[data-v-9652e536] {\n    font-size: 22px;\n    color: #000;\n    font-weight: bold;\n}\n.header .header-inner .site-meta .site-describe[data-v-9652e536] {\n    display: none;\n}\n.header .header-inner .site-nav-toggle[data-v-9652e536] {\n    position: static;\n    float: right;\n    display: block;\n    top: 10px;\n    left: 10px;\n}\n.header .header-inner .site-nav-toggle button[data-v-9652e536] {\n    margin-top: 5px;\n    padding: 9px 10px;\n    background: transparent;\n    border: none;\n}\n.header .header-inner .site-nav-toggle button .btn-bar[data-v-9652e536] {\n    display: block;\n    width: 22px;\n    height: 2px;\n    background: #555;\n    border-radius: 1px;\n}\n.header .header-inner .site-nav-toggle button .btn-bar + .btn-bar[data-v-9652e536] {\n    margin-top: 4px;\n}\n.header .header-inner .site-nav[data-v-9652e536] {\n    display: none;\n    margin: 0 -10px;\n    padding: 0 10px;\n    clear: both;\n    border-top: 1px solid #ddd;\n}\n.header .header-inner .site-nav .menu[data-v-9652e536] {\n    float: none;\n    margin: 10px 0 0 0;\n    padding: 0;\n}\n.header .header-inner .site-nav .menu .menu-item[data-v-9652e536] {\n    display: block;\n}\n.header .header-inner .site-nav .menu .menu-item a[data-v-9652e536] {\n    display: block;\n    text-align: left;\n    padding: 0 10px;\n    color: #555;\n    text-decoration: none;\n}\n.header .header-inner[data-v-9652e536]:before, .header .header-inner[data-v-9652e536]:after {\n    content: \" \";\n    display: table;\n}\n.header .header-inner[data-v-9652e536]:after {\n    clear: both;\n}\n.header .header-inner[data-v-9652e536]:before, .header .header-inner[data-v-9652e536]:after {\n    content: \" \";\n    display: table;\n}\n}\n@media (min-width: 767px) {\n.header .header-inner[data-v-9652e536] {\n    padding: 60px 0 0 0;\n}\n.header .header-inner .site-meta[data-v-9652e536] {\n    text-align: center;\n}\n.header .header-inner .site-meta .site-title[data-v-9652e536] {\n    padding: 8px;\n    color: #fff;\n    font-size: 18px;\n    font-weight: bold;\n    background-color: red;\n}\n.header .header-inner .site-meta .site-describe[data-v-9652e536] {\n    margin: 10px 0 20px 0;\n    color: grey;\n}\n.header .header-inner .site-nav-toggle[data-v-9652e536] {\n    display: none;\n}\n.header .header-inner .site-nav[data-v-9652e536] {\n    display: block;\n}\n.header .header-inner .site-nav .menu[data-v-9652e536] {\n    padding: 0;\n    text-align: center;\n}\n.header .header-inner .site-nav .menu .menu-item[data-v-9652e536] {\n    margin: 0 20px;\n    display: inline-block;\n    list-style: none;\n    font-size: 18px;\n    color: red;\n}\n.header .header-inner .site-nav .menu .menu-item a[data-v-9652e536] {\n    color: red;\n    text-decoration: none;\n}\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/sass-loader/dist/cjs.js??ref--6-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/sass-loader/dist/cjs.js??ref--6-3!../../../../node_modules/vue-loader/lib??vue-loader-options!./Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=template&id=9652e536&scoped=true&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/global/Navigation.vue?vue&type=template&id=9652e536&scoped=true& ***!
  \********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("header", { staticClass: "header" }, [
    _c("div", { staticClass: "header-inner" }, [
      _vm._m(0),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "site-nav-toggle", on: { click: _vm.showMenu } },
        [_vm._m(1)]
      ),
      _vm._v(" "),
      _c("nav", { staticClass: "site-nav" }, [
        _c("ul", { staticClass: "menu" }, [
          _c(
            "li",
            { staticClass: "menu-item" },
            [
              _c("router-link", { attrs: { to: { name: "home" } } }, [
                _vm._v("\n                        主页\n                    ")
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "li",
            { staticClass: "menu-item" },
            [
              _c("router-link", { attrs: { to: { name: "category" } } }, [
                _vm._v("\n                        分类\n                    ")
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "li",
            { staticClass: "menu-item" },
            [
              _c("router-link", { attrs: { to: { name: "tag" } } }, [
                _vm._v("\n                        标签\n                    ")
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "li",
            { staticClass: "menu-item" },
            [
              _c("router-link", { attrs: { to: { name: "archive" } } }, [
                _vm._v("\n                        归档\n                    ")
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "li",
            { staticClass: "menu-item" },
            [
              _c("router-link", { attrs: { to: { name: "about" } } }, [
                _vm._v("\n                        关于\n                    ")
              ])
            ],
            1
          )
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "site-meta" }, [
      _c("span", { staticClass: "site-title" }, [_vm._v("PikachuKing")]),
      _vm._v(" "),
      _c("p", { staticClass: "site-describe" }, [
        _vm._v("PikachuKing PikachuKing")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("button", { attrs: { "aria-label": "切换导航栏" } }, [
      _c("span", { staticClass: "btn-bar" }),
      _vm._v(" "),
      _c("span", { staticClass: "btn-bar" }),
      _vm._v(" "),
      _c("span", { staticClass: "btn-bar" })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/global/Navigation.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/global/Navigation.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Navigation_vue_vue_type_template_id_9652e536_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Navigation.vue?vue&type=template&id=9652e536&scoped=true& */ "./resources/js/components/global/Navigation.vue?vue&type=template&id=9652e536&scoped=true&");
/* harmony import */ var _Navigation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Navigation.vue?vue&type=script&lang=js& */ "./resources/js/components/global/Navigation.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Navigation_vue_vue_type_style_index_0_id_9652e536_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true& */ "./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Navigation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Navigation_vue_vue_type_template_id_9652e536_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Navigation_vue_vue_type_template_id_9652e536_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "9652e536",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/global/Navigation.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/global/Navigation.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/global/Navigation.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_10_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/babel-loader/lib??ref--10-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Navigation.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_babel_loader_lib_index_js_ref_10_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true&":
/*!*****************************************************************************************************************!*\
  !*** ./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true& ***!
  \*****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_style_index_0_id_9652e536_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/sass-loader/dist/cjs.js??ref--6-3!../../../../node_modules/vue-loader/lib??vue-loader-options!./Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=style&index=0&id=9652e536&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_style_index_0_id_9652e536_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_style_index_0_id_9652e536_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_style_index_0_id_9652e536_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_style_index_0_id_9652e536_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_sass_loader_dist_cjs_js_ref_6_3_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_style_index_0_id_9652e536_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/global/Navigation.vue?vue&type=template&id=9652e536&scoped=true&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/global/Navigation.vue?vue&type=template&id=9652e536&scoped=true& ***!
  \**************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_template_id_9652e536_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Navigation.vue?vue&type=template&id=9652e536&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/global/Navigation.vue?vue&type=template&id=9652e536&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_template_id_9652e536_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Navigation_vue_vue_type_template_id_9652e536_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);