/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"main": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["./src/js/index.js","vendor"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/blocks/modules/footer/footer.js":
/*!*********************************************!*\
  !*** ./src/blocks/modules/footer/footer.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./src/blocks/modules/header/header.js":
/*!*********************************************!*\
  !*** ./src/blocks/modules/header/header.js ***!
  \*********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var regenerator_runtime_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! regenerator-runtime/runtime */ "./node_modules/regenerator-runtime/runtime.js");
/* harmony import */ var regenerator_runtime_runtime__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(regenerator_runtime_runtime__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _js_utils_select__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../js/utils/select */ "./src/js/utils/select.js");
/* harmony import */ var _js_utils_label__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../js/utils/label */ "./src/js/utils/label.js");
/* harmony import */ var _js_utils_cart__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../js/utils/cart */ "./src/js/utils/cart.js");
/* harmony import */ var _js_utils_cart__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_js_utils_cart__WEBPACK_IMPORTED_MODULE_4__);
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }






$(document).on('click', '.select__items div', function () {
  var selectOptionsObj = $(this).parent().siblings('select')[0];
  var activeOption = selectOptionsObj.querySelectorAll('option')[selectOptionsObj.options.selectedIndex];
  var sizeKey = activeOption.dataset.key;
  var sizeValue = activeOption.value;
  var productId = $(this).closest('.pdp__options').find("input[name='product_id']").val();
  var priceEl = $(this).closest('.pdp-control').find('.pdp__price'); // const productInfo = async () => {

  var productInfo = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
      var url, res, data;
      return regeneratorRuntime.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.prev = 0;
              url = "/wp-json/giardino/product/?id=".concat(productId, "&").concat(sizeKey, "=").concat(sizeValue);
              _context.next = 4;
              return fetch(url);

            case 4:
              res = _context.sent;
              _context.next = 7;
              return res.json();

            case 7:
              data = _context.sent;

              if (data.price) {
                priceEl.text(priceEl.text().replace(/\d*/, data.price));
              }

              _context.next = 14;
              break;

            case 11:
              _context.prev = 11;
              _context.t0 = _context["catch"](0);
              console.log(_context.t0);

            case 14:
            case "end":
              return _context.stop();
          }
        }
      }, _callee, null, [[0, 11]]);
    }));

    return function productInfo() {
      return _ref.apply(this, arguments);
    };
  }();

  productInfo();
}); // Utils  **START**
// Count

$(document).on("click", ".count__btn", function (e) {
  e.preventDefault();
  var inputEL = $(this).siblings("input");
  var currentValue = parseInt(inputEL.val());

  if ($(this).hasClass("count__minus") && currentValue >= 2) {
    inputEL.val(currentValue - 1);
  } else if ($(this).hasClass("count__plus")) {
    inputEL.val(currentValue + 1);
  }
}); // Toggler

$(".pdp-measure__btn").on("click", function name(e) {
  e.preventDefault();
  $(this).addClass("active").siblings(".active").removeClass("active");
}); // Step Radio

$(".step__radio").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
}); // Tooltip

$(".tooltip").on("click", function (e) {
  e.preventDefault();
  $(this).toggleClass("active");
}); // Utils **END**
// Header **START**
// scroll Fixed

$(window).on("scroll", function () {
  if ($(window).scrollTop() > 100 && $(window).width() <= 992) {
    $(".header").addClass("header_fixed");
  } else {
    $(".header").removeClass("header_fixed");
  }
});
$(".burger").on("click", function (e) {
  e.preventDefault();
  $(".navbar").slideToggle();
});
$(".navbar").on("click", function (e) {
  if ($(e.target).hasClass("navbar")) {
    $(".navbar").slideToggle("slide");
  }
});
$(".navbar__close").on("click", function (e) {
  e.preventDefault();
  $(".navbar").slideToggle();
});
$(".navbar__header-back").on("click", function (e) {
  e.preventDefault();
  $(".navbar__block.active").removeClass("active").siblings(".navbar__main").addClass("active");
});
$(".navbar-link__direction_dropdown").on("click", function (e) {
  e.preventDefault();
  var navTarget = $(".navbar__block[data-nav-id=".concat($(this).data("target"), "]"));
  $(".navbar__block.active").removeClass("active");
  navTarget.addClass("active");
});
$(".header__basket").on("click", function (e) {
  e.preventDefault();
  $(".cart").addClass("cart_open");
});
$(".cart").on("click", function (e) {
  if ($(e.target).hasClass("cart_open")) {
    closeCart();
  }
});
$(".cart__head-close, .cart__head-title").on("click", function (e) {
  e.preventDefault();
  closeCart();
});

function closeCart() {
  $(".cart").removeClass("cart_open");
} // Header **END**
// SORT **START**


$(".sort__head, .sort__burger").on("click", function () {
  $(this).parent().toggleClass("active");
  $(this).siblings(".sort__dropdown").slideToggle();
});
$(".sort__dropdown-link, .sort__close-mob").on("click", function (e) {
  $(this).parent().slideToggle().parent().toggleClass("active");
});
$(".sort").on("click", function (e) {
  if ($(e.target).hasClass("active")) {
    $(this).removeClass("active").find(".sort__dropdown").slideToggle();
  }
}); // SORT **END**
// CHECKOUT **START**

$(".checkout-nav__step").on("click", function (e) {
  e.preventDefault();
  var checkoutStepNum = $(this).data("step-target");
  var stepTarget = $('.step[data-step="' + checkoutStepNum + '"]');

  if ($(this).prev().hasClass("active")) {
    $(this).addClass("active").prev().toggleClass("active pass");
    toggleStep(stepTarget);
  }

  if ($(this).hasClass("pass")) {
    $(this).toggleClass("pass active").nextAll().removeClass("active pass");
    toggleStep(stepTarget);
  }
});
$(".step-next").on("click", function (e) {
  e.preventDefault();
  var stepTarget;

  if ($(this).hasClass("step-next_inner")) {
    stepTarget = $(".step.active .step__inner.active").next();
    toggleStep(stepTarget);
  } else {
    stepTarget = $(".step.active").next();
    toggleStep(stepTarget, true);
  }
});

function toggleStep(stepEL) {
  var toggleNav = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

  if (toggleNav) {
    $(".checkout-nav__step.active").toggleClass("active pass").next().addClass("active");
  }

  stepEL.addClass("active").slideToggle().siblings(".active").slideToggle().removeClass("active");
} // CHECKOUT **END**
// SLIDERS **START**
// Same products


$(".products-slider__list").slick({
  slidesToShow: 4,
  slidesToScroll: 2,
  autoplay: true,
  dots: true,
  responsive: [{
    breakpoint: 992,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      infinite: true,
      dots: true
    }
  }, {
    breakpoint: 768,
    settings: "unslick"
  }]
}); // Gallery product

$(".pdp__slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".pdp__slider-nav"
});
$(".pdp__slider-nav").slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  asNavFor: ".pdp__slider-for",
  focusOnSelect: true,
  vertical: true,
  verticalSwiping: true,
  responsive: [{
    breakpoint: 993,
    settings: {
      slidesToShow: 4
    }
  }, {
    breakpoint: 769,
    settings: {
      vertical: false,
      centerMode: true,
      slidesToShow: 1,
      variableWidth: true
    }
  }]
}); // SLIDERS **END**
// Product page **START**
// Tabs

$(".pdp-tabs__nav-item").on("click", function () {
  var tabTargetNum = $(this).data("tab-target");
  var tabTargetEl = $(".pdp-tabs__tab[data-tab=".concat(tabTargetNum, "]"));
  $(this).addClass("active").siblings(".active").removeClass("active");
  tabTargetEl.addClass("active").slideDown().siblings(".active").removeClass("active").slideUp();
}); // Size options

$(".pdp-look__size-option").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
}); // Color options

$(".pdp-look__color-option").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
}); // Collection

$(".dropdown-toggler").on("click", function () {
  $(this).toggleClass("active").siblings().slideToggle();
}); // Look mobile view toggle

if ($(".pdp-look").length) {
  var pdpViewMobToggle = function pdpViewMobToggle() {
    if ($(window).width() < 993 && $(".pdp-look__info .pdp-look__info-body").length) {
      $(".pdp-look").each(function (index, el) {
        var toggleBlock = $(el).find(".pdp-look__info-body").addClass("col");
        $(el).append(toggleBlock);
      });
    } else if ($(window).width() >= 993 && $(".pdp-look__info-body.col").length) {
      $(".pdp-look").each(function (index, el) {
        var toggleBlock = $(el).find(".pdp-look__info-body").removeClass("col");
        $(el).find(".pdp-look__info").append(toggleBlock);
      });
    }
  };

  $(window).on("resize", pdpViewMobToggle);
  pdpViewMobToggle();
} // Color towel


$(".towel-colors__item").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
}); // Product page **END**
// Modals

$(".modal-trigger").click(function (e) {
  e.preventDefault();
  var target = $(this).attr("modal-target");
  $(".modal").hasClass("modal_active") ? $(".modal__body").slideUp() : $(".modal").addClass("modal_active");
  $(target).delay(500).slideDown();
});
$(".modal__close, .modal__close-btn").click(function (e) {
  e.preventDefault();
  modalClose();
});
$(".modal").click(function (e) {
  if ($(e.target).hasClass("modal_active")) {
    modalClose();
  }
});

function modalClose() {
  $(".modal").hasClass("modal_active") ? $(".modal").removeClass("modal_active") : $(".modal").addClass("modal_active");
  $(".modal__body").slideUp();
}
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./src/js/import/modules.js":
/*!**********************************!*\
  !*** ./src/js/import/modules.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_header_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! %modules%/header/header */ "./src/blocks/modules/header/header.js");
/* harmony import */ var _modules_footer_footer__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! %modules%/footer/footer */ "./src/blocks/modules/footer/footer.js");
/* harmony import */ var _modules_footer_footer__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_modules_footer_footer__WEBPACK_IMPORTED_MODULE_1__);



/***/ }),

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _import_modules__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./import/modules */ "./src/js/import/modules.js");


/***/ }),

/***/ "./src/js/utils/cart.js":
/*!******************************!*\
  !*** ./src/js/utils/cart.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {// Add product
$(document).on('click', '.btn-to-cart', function (e) {
  var productTargetParent = $(this).closest('.pdp-control');
  var productId = productTargetParent.find('input[name=product_id]').val();
  var ajaxData = {
    "data[product_id]": productId
  };

  if (productTargetParent.find('.pdp__size-select').length) {
    var productSizeEl = productTargetParent.find('.pdp__size-select select')[0];
    var activeOption = productSizeEl.querySelectorAll('option')[productSizeEl.options.selectedIndex];
    var sizeValue = activeOption.value;
    ajaxData["data[pa_size]"] = sizeValue;
  }

  if (productTargetParent.find('.pdp-look__color-list').length) {
    checkColor(productTargetParent.find('.pdp-look__color-list'));
    ajaxData["data[pa_color]"] = $('.pdp-look__color-option.active .pdp-look__color-name').data('value');
  }

  console.log('ajaxData', ajaxData);
  updateAjax('add', ajaxData);
}); // Remove product

$(document).on('click', '.cart__product-cancel', function (e) {
  e.preventDefault();
  var productKey = $(this).closest('.cart__product').data('item-key');
  var ajaxData = {
    "data[item_key]": productKey
  };
  updateAjax('remove', ajaxData);
}); // Change Quantity

$(document).on('click', '.cart__product .count__btn', function (e) {
  var _this = this;

  console.log('change quantity');
  var productKey = $(this).closest('.cart__product').data('item-key');

  function callbackChange(newDoc) {
    var currentActiveProduct = $(".cart__product[data-item-key = ".concat(productKey, "]"));
    var newActiveProduct = newDoc.find(".cart__product[data-item-key = ".concat(productKey, "]"));
    currentActiveProduct.after(newActiveProduct);
    currentActiveProduct.remove();
    initSelect(newActiveProduct[0]);
  }

  setTimeout(function () {
    var ajaxData = {
      "data[item_key]": productKey,
      "data[quantity]": $(_this).siblings('input').val()
    };
    updateAjax('quantity', ajaxData, callbackChange);
  }, 100);
}); // Remove

$(document).on('click', '.cart__product-cancel', function (e) {
  var productKey = $(this).closest('.cart__product').data('item-key');
  var ajaxData = {
    "data[item_key]": productKey
  };
  updateAjax('remove', ajaxData);
});

function checkColor(parentEl) {
  if (parentEl.find('.pdp-look__color-option.active').length) {
    return true;
  }

  parentEl.find('.pdp-look__color-option').first().addClass('active');
}

function updateAjax(action, ajaxData, cb) {
  ajaxData.action = action;
  console.log('ajaxData', ajaxData);
  var settingsAjaxCart = {
    "url": location.origin,
    "method": "POST",
    "timeout": 0,
    "headers": {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    "data": ajaxData
  };
  $.ajax(settingsAjaxCart).done(function (response) {
    var parser = new DOMParser();
    var htmlDoc = parser.parseFromString(response, 'text/html');

    if (cb) {
      cb($(htmlDoc));
    } else {
      $('.cart .cart__body').remove();
      $('.cart .cart__head').after($(htmlDoc).find('.cart .cart__body'));
      $(".cart").addClass("cart_open");
      initSelect($('.cart')[0]);
    }

    updateTotal($(htmlDoc).find('.cart .cart__products-price').text());
  });
}

function updateTotal(newTotalPrice) {
  $('.cart .cart__products-price').html(newTotalPrice);
} // "data[item_key]": "75",
// "data[product_id]": "75",
// "data[pa_color]": "red",
// "action": "add",
// "data[quantity]": "1"
// Remove
// "action": "remove",
// "data[item_key]": "75",
// Change
// "action": "quantity",
// "data[item_key]": "75",
// "data[pa_color]": "red",
// "data[quantity]": "1"
// Quanity
// "action": "quantity",
// "data[item_key]": "75",
// "data[quantity]": "1"
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./src/js/utils/label.js":
/*!*******************************!*\
  !*** ./src/js/utils/label.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

initLabel();

function initLabel() {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(".group").each(function (i, el) {
    var inputEl = jquery__WEBPACK_IMPORTED_MODULE_0___default()(el).find("input");
    inputEl.on("blur", function () {
      labelToggle(inputEl);
    });
    labelToggle(inputEl);
  });
}

function labelToggle(inputEl) {
  if (inputEl && inputEl.val()) {
    inputEl.addClass("filled");
  } else {
    inputEl.removeClass("filled");
  }
}

/***/ }),

/***/ "./src/js/utils/select.js":
/*!********************************!*\
  !*** ./src/js/utils/select.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);


window.initSelect = function (initArea) {
  console.log('init select');
  var x, i, j, l, ll, selElmnt, a, b, c;
  /* Look for any elements with the class "custom-select": */

  if (initArea) {
    console.log(initArea);
    x = initArea.querySelectorAll(".select");
  } else {
    console.log('document');
    x = document.getElementsByClassName("select");
  }

  console.log(x);
  l = x.length;

  for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /* For each element, create a new DIV that will act as the selected item: */

    a = document.createElement("DIV");
    a.setAttribute("class", "select__selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */

    b = document.createElement("DIV");
    b.setAttribute("class", "select__items select_hide");

    for (j = 0; j < ll; j++) {
      /* For each option in the original select element,
      create a new DIV that will act as an option item: */
      c = document.createElement("DIV");

      if (j == 0) {
        c.classList.add('same-as-selected');
      }

      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function (e) {
        /* When an item is clicked, update the original select box,
          and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;

        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;

            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }

            this.setAttribute("class", "same-as-selected");
            break;
          }
        }

        h.click();
      });
      b.appendChild(c);
    }

    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
      /* When the select box is clicked, close any other select boxes,
      and open/close the current select box: */
      e.stopPropagation();
      closeAllSelect(this);
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(this.nextSibling).slideToggle();
      this.classList.toggle("active");
    });
  }
};

initSelect();

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x,
      y,
      i,
      xl,
      yl,
      arrNo = [];
  x = document.getElementsByClassName("select__items");
  y = document.getElementsByClassName("select__selected");
  xl = x.length;
  yl = y.length;

  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i);
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }

  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select_hide");
    }
  }
}
/* If the user clicks anywhere outside the select box,
then close all select boxes: */


document.addEventListener("click", closeAllSelect);

/***/ })

/******/ });
//# sourceMappingURL=main.js.map