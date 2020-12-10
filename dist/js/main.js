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
/* harmony import */ var slick_lightbox__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! slick-lightbox */ "./node_modules/slick-lightbox/dist/slick-lightbox.js");
/* harmony import */ var slick_lightbox__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(slick_lightbox__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _js_utils_select__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../js/utils/select */ "./src/js/utils/select.js");
/* harmony import */ var _js_utils_label__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../js/utils/label */ "./src/js/utils/label.js");
/* harmony import */ var _js_utils_cart__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../js/utils/cart */ "./src/js/utils/cart.js");
/* harmony import */ var _js_utils_cart__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_js_utils_cart__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _js_utils_measure__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../js/utils/measure */ "./src/js/utils/measure.js");
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }








$(".nav__list-item").hover(function () {
  $(this).addClass('nav-item-hover');
}, function () {
  var _this = this;

  setTimeout(function () {
    $(_this).removeClass('nav-item-hover');
  }, 500);
});

if ($('.pdp__collection-options').length) {
  var firstEl = $('.pdp__collection-row').first();
  firstEl.find('.pdp__collection-checkbox').click();
  $('.pdp__price').text(firstEl.find('.pdp__collection-price').text());
} // Utils  **START**
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
}); // Tooltip

$(".tooltip").on("click", function (e) {
  e.preventDefault();
  $(this).toggleClass("active");
}); // Utils **END**
// Size options

$(document).on("click", ".pdp-look__size-option", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
}); // Color options

$(document).on("click", ".pdp-look__color-option", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
});
$(document).on('click', '.pdp-control .select__items div, .pdp__collection-checkbox', function () {
  var selectOptionsObj;

  if ($(this).hasClass('pdp__collection-checkbox')) {
    selectOptionsObj = $(this).siblings('.select').find('select')[0];
  } else {
    selectOptionsObj = $(this).parent().siblings('select')[0];
  }

  var activeOption = selectOptionsObj.querySelectorAll('option')[selectOptionsObj.options.selectedIndex];
  var sizeValue = activeOption.value;
  var productId;

  if ($(this).closest('.pdp__collection-row').length) {
    productId = $(this).closest('.pdp__collection-row').find("input[name='product_id']").val();
    var priceEl = $(this).closest('.pdp__collection-row').find('.pdp__collection-price');
    updatePrice(productId, sizeValue, priceEl);
  } else {
    productId = $(this).closest('.pdp__options-product').find("input[name='product_id']").val();

    var _priceEl = $(this).closest('.pdp-control').find('.pdp__price');

    updatePrice(productId, sizeValue, _priceEl);
  }
}); // $(document).on('click', '.pdp__collection-checkbox', function () {
// })

$(document).on('click', '.pdp-look .pdp-look__size-option, .pdp-look .count__btn', function () {
  var productEl = $(this).closest('.pdp-look');
  var sizeValue = productEl.find('.pdp-look__size-option.active').data('value');
  var productId = productEl.find("input[name='product_id']").val();
  var priceEl = productEl.find('.pdp-look__buy-price');
  var quantity = productEl.find('.count__value').val();
  updatePrice(productId, sizeValue, priceEl, quantity);
});

function updatePrice(productId, sizeValue, priceEl) {
  var quantity = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 1;
  console.log('--------------');
  console.log('update price');

  var productInfo = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
      var url, res, data, totalPrice;
      return regeneratorRuntime.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.prev = 0;
              url = "/wp-json/giardino/product/?id=".concat(productId, "&pa_size=").concat(sizeValue);
              _context.next = 4;
              return fetch(url);

            case 4:
              res = _context.sent;
              _context.next = 7;
              return res.json();

            case 7:
              data = _context.sent;

              if (!data.price) {
                _context.next = 12;
                break;
              }

              _context.next = 11;
              return priceEl.each(function (index, el) {
                var price = quantity == 1 ? data.price : data.price * quantity;
                $(el).text($(el).text().replace(/[\d\.]*/, price));

                if ($(el).hasClass('pdp__price')) {
                  $(el).attr("data-main-price", price);
                }
              });

            case 11:
              if ($('.pdp-control .pdp__collection-inner').length) {
                totalPrice = 0;

                if ($('.pdp-control .pdp__options-product').length) {
                  if ($('.pdp__price').attr('data-main-price')) {} else {
                    $('.pdp__price').attr('data-main-price', parseFloat($('.pdp__price').text()));
                  }

                  totalPrice = parseFloat($('.pdp__price').attr('data-main-price'));
                }

                document.querySelectorAll('.pdp-control .pdp__collection-row').forEach(function (element) {
                  if ($(element).find('.checkbox__input').is(':checked')) {
                    totalPrice += parseFloat($(element).find('.pdp__collection-price').text());
                  }
                });
                $('.pdp__price').text($('.pdp__price').text().replace(/[\d\.]*/, totalPrice));
              }

            case 12:
              _context.next = 17;
              break;

            case 14:
              _context.prev = 14;
              _context.t0 = _context["catch"](0);
              console.log(_context.t0);

            case 17:
            case "end":
              return _context.stop();
          }
        }
      }, _callee, null, [[0, 14]]);
    }));

    return function productInfo() {
      return _ref.apply(this, arguments);
    };
  }();

  productInfo();
} // Header **START**
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
  openCart();
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
  $("body").removeClass('scroll-off');
}

function openCart() {
  $(".cart").addClass("cart_open");
  $("body").addClass('scroll-off');
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
// $(".checkout-nav__step").on("click", function (e) {
//   e.preventDefault();
//   let checkoutStepNum = $(this).data("step-target");
//   let stepTarget = $('.step[data-step="' + checkoutStepNum + '"]');
//   if ($(this).prev().hasClass("active")) {
//     $(this).addClass("active").prev().toggleClass("active pass");
//     toggleStep(stepTarget);
//   }
//   if ($(this).hasClass("pass")) {
//     $(this).toggleClass("pass active").nextAll().removeClass("active pass");
//     toggleStep(stepTarget);
//   }
// });
// Step Radio

$(document).on("click", ".step__radio", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
  $(this).closest('ul').find('.radio.active').removeClass('active');
});
$(".step-next").on("click", function (e) {
  e.preventDefault();
  var stepTarget;

  if ($(".step-one.active").length) {
    var check = checkCheckoutInputs($(this).closest('form'));

    if (check) {
      stepTarget = $(".step.active").next();
      toggleStep(stepTarget, true);
    }
  } else if ($(this).hasClass("step-next_inner")) {
    var _check = checkCheckoutInputs($(this).closest('form'));

    if (_check) {
      var settings = {
        "url": location.origin + "/?wc-ajax=update_order_review",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
          "payment_method": "",
          "country": $('.step__countries').find('select').val(),
          "state": $("input[name='state']").val(),
          "postcode": $("input[name='postcode']").val(),
          "city": $("input[name='city']").val(),
          "address": $("input[name='address']").val(),
          "address_2": $("input[name='address_2']").val(),
          "has_full_address": "true",
          "security": $("input[name='security']").val()
        }
      }; //         security: 6a93f4368b
      // payment_method: cheque
      // country: MC
      // state: 
      // postcode: 
      // city: 
      // address: 
      // address_2: 
      // s_country: MC
      // s_state: 
      // s_postcode: 
      // s_city: 
      // s_address: 
      // s_address_2: 
      // has_full_address: false
      // post_data: billing_first_name=&billing_last_name=&billing_company=&billing_country=MC&billing_address_1=&billing_address_2=&billing_city=&billing_state=&billing_postcode=&billing_phone=&billing_email=v_zol%40ukr.net&shipping_first_name=&shipping_last_name=&shipping_company=&shipping_country=MC&shipping_address_1=&shipping_address_2=&shipping_city=&shipping_state=&shipping_postcode=&order_comments=&payment_method=cheque&woocommerce-process-checkout-nonce=0c75cdcf1e&_wp_http_referer=%2Fcheckout%2F%3Fpayment_method%3Dppec_paypal%26woocommerce_checkout_place_order%3DPlace%2Border%26woocommerce-process-checkout-nonce%3D0c75cdcf1e%26_wp_http_referer%3D%252F%253Fwc-ajax%253Dupdate_order_review

      $.ajax(settings).done(function (response) {
        window.resultStep = response;

        if (response.result == "success") {
          $('.woocommerce-shipping-methods').remove();
          var payment = $(response.fragments[".woocommerce-checkout-payment"]);
          var shipping = $(response.fragments[".woocommerce-checkout-review-order-table"]).find('.woocommerce-shipping-methods');
          $('.step-two__second-form').prepend(shipping);
          shipping.find('input').addClass('radio__input');
          shipping.find('label').each(function (i, el) {
            $(el).addClass('step__radio radio');
            $(el).prepend($(el).siblings('input').addClass('radio__input'));
            $(el).append("<span class='radio__mark'></span>");
          });
          $('.step-three__form').prepend(payment);
          payment.find('input').addClass('radio__input');
          payment.find('label').each(function (i, el) {
            $(el).addClass('step__radio radio');
            $(el).prepend($(el).siblings('input').addClass('radio__input'));
            $(el).append("<span class='radio__mark'></span>");
          });
          payment.find(".button").addClass("step-two__btn btn btn_blue w-100").before('<div class="step__divider group"></div>');
          stepTarget = $(".step.active .step__inner.active").next();
          toggleStep(stepTarget);
        } else {
          $('.step.active').append($(response.massages));
        }
      });
    }
  } else {
    stepTarget = $(".step.active").next();

    if (stepTarget) {
      toggleStep(stepTarget, true);
    } else {
      console.log('finish');
    }
  }
});

function checkCheckoutInputs(parent) {
  var check = true;
  parent.find('.input').each(function (index, el) {
    if ($(el).val()) {
      if ($(el).siblings('.error__text').length) {
        $(el).siblings('.error__text').remove();
      }

      if ($(el).parents('.group.error').length) {
        $(el).parents('.group.error').removeClass('error');
      }

      return;
    }

    if (!$(el).parents('.group.error').length) {
      $(el).parents('.group').addClass('error').append($('<p>').addClass('error__text').text('Required*'));
    }

    check = false;
  });
  return check;
}

function toggleStep(stepEL) {
  var toggleNav = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

  if (toggleNav) {
    $(".checkout-nav__step.active").toggleClass("active pass").next().addClass("active");
  }

  stepEL.addClass("active").show().siblings(".active").hide().removeClass("active");
} // CHECKOUT **END**
// SLIDERS **START**
// Same products


$(".products-slider__list").slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  dots: true,
  responsive: [{
    breakpoint: 992,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
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
});
$('.pdp__slider-for').slickLightbox({
  src: 'src',
  itemSelector: '.pdp__slide img'
});
$('.pdp-look__preview').slickLightbox({
  src: 'src',
  itemSelector: 'img'
}); // SLIDERS **END**
// Product page **START**
// Tabs

$(".pdp-tabs__nav-item").on("click", function () {
  var tabTargetNum = $(this).data("tab-target");
  var tabTargetEl = $(".pdp-tabs__tab[data-tab=".concat(tabTargetNum, "]"));
  $(this).addClass("active").siblings(".active").removeClass("active");
  tabTargetEl.addClass("active").slideDown().siblings(".active").removeClass("active").slideUp();
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
} // Product page **END**
// Modals


$(document).on('click', '.modal-trigger, .pdp__guide', function (e) {
  e.preventDefault();
  var target = $(this).attr("modal-target");

  if ($(this).hasClass('pdp__guide')) {
    var desktopGuide = $(this).data('image');
    var mobileGuide = $(this).data('mobile');
    target = '#m-guide';

    if ($(window).width() > 992) {
      $(target).find('.m-guide__image').attr('src', desktopGuide);
    } else {
      $(target).find('.m-guide__image').attr('src', mobileGuide);
    }
  }

  $(".modal").hasClass("modal_active") ? $(".modal__body").slideUp() : $(".modal").addClass("modal_active");
  $(target).delay(500).slideDown();
  $('body').addClass('scroll-off');
});
$(".modal__close, .modal__close-btn").click(function (e) {
  e.preventDefault();
  modalClose();
});
$(".modal").on('click', function (e) {
  if ($(e.target).hasClass("modal_active")) {
    modalClose();
  }
});

function modalClose() {
  $(".modal").hasClass("modal_active") ? $(".modal").removeClass("modal_active") : $(".modal").addClass("modal_active");
  $(".modal__body").slideUp();
  $('body.scroll-off').removeClass('scroll-off');
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
  var productParent = $(this).closest('.pdp__row');
  console.log(productParent);

  if (productParent.find('.pdp__collection-inner').length) {
    var ajaxData = [];
    productParent.find('.pdp__collection-inner').each(function (index, element) {
      if ($(element).find('.checkbox__input').is(':checked')) {
        ajaxData.push(prepareToAdd($(element), true));
      }
    });

    if ($('.pdp__options-product').length) {
      ajaxData.push(prepareToAdd($('.pdp__options-product'), true));
    }

    updateAjax('add', ajaxData);
  } else {
    var _ajaxData = prepareToAdd($('.pdp__options-product'));

    updateAjax('add', _ajaxData);
  }
});

function prepareToAdd(product, isArray) {
  var ajaxData = {};
  var productId = $(product).find("input[name='product_id']").val();

  if (isArray) {
    ajaxData["product_id"] = productId;
  } else {
    ajaxData["data[product_id]"] = productId;
  }

  if ($(product).find('.pdp__size-select').length) {
    var productSizeEl = $(product).find('.pdp__size-select select')[0];
    var activeOption = productSizeEl.querySelectorAll('option')[productSizeEl.options.selectedIndex];
    var sizeValue = activeOption.value;

    if (isArray) {
      ajaxData["pa_size"] = sizeValue;
    } else {
      ajaxData["data[pa_size]"] = sizeValue;
    }
  }

  if ($(product).find('.pdp-look__color-list').length) {
    checkColor($(product).find('.pdp-look__color-list'));

    if (isArray) {
      ajaxData["pa_color"] = $(product).find('.pdp-look__color-option.active .pdp-look__color-name').data('value');
    } else {
      ajaxData["data[pa_color]"] = $(product).find('.pdp-look__color-option.active .pdp-look__color-name').data('value');
    }
  }

  if ($(product).find('.towel-colors__list').length) {
    checkColor($(product).find('.towel-colors__list'));

    if (isArray) {
      ajaxData["pa_color"] = $(product).find('.towel-colors__item.active').data('value');
    } else {
      ajaxData["data[pa_color]"] = $(product).find('.towel-colors__item.active').data('value');
    }
  }

  return ajaxData;
}

$(document).on('click', '.pdp-look__buy-btn', function (e) {
  var ajaxData = {};
  var productTargetParent = $(this).closest('.pdp-look');
  var productId = productTargetParent.find('input[name=product_id]').val();
  ajaxData["data[product_id]"] = productId;

  if (productTargetParent.find('.pdp-look__size-option.active').length) {
    ajaxData["data[pa_size]"] = productTargetParent.find('.pdp-look__size-option.active').data('value');
  }

  if (productTargetParent.find('.count__value').length) {
    ajaxData["data[quantity]"] = productTargetParent.find('.count__value').val();
  }

  if (productTargetParent.find('.towel-colors__item.active').length) {
    ajaxData["data[pa_color]"] = productTargetParent.find('.towel-colors__item.active').data('value');
  }

  updateAjax('add', ajaxData);
}); // Remove product

$(document).on('click', '.cart__product-cancel', function (e) {
  e.preventDefault();
  var productKey = $(this).closest('.cart__product').data('item-key');
  var ajaxData = {
    "data[item_key]": productKey
  };
  updateAjax('remove', ajaxData);
});
$(document).on("click", ".towel-colors__item", function () {
  if ($(this).closest('.towel-colors').length) {
    var colorName = $(this).data('name');
    $(this).closest('.towel-colors').find('.towel-colors__caption span').text(colorName);
  }

  $(this).addClass("active").siblings(".active").removeClass("active");
}); // Сhange

$(document).on('click', '.cart__product .towel-colors__item, .cart__product .select__items>div', function (e) {
  var productTargetParent = $(this).closest('.cart__product');
  var productKey = productTargetParent.data('item-key');
  var ajaxData = {
    "data[item_key]": productKey
  };

  if (productTargetParent.find('.pdp__size-select').length) {
    var productSizeEl = productTargetParent.find('.pdp__size-select select')[0];
    var activeOption = productSizeEl.querySelectorAll('option')[productSizeEl.options.selectedIndex];
    var sizeValue = activeOption.value;
    ajaxData["data[pa_size]"] = sizeValue;
  }

  if (productTargetParent.find('.towel-colors__list').length) {
    ajaxData["data[pa_color]"] = productTargetParent.find('.towel-colors__item.active').data('value');
  }

  function callbackChange(newDoc) {
    var currentActiveProduct = $(".cart__product[data-item-key = ".concat(productKey, "]"));
    var elPosition = currentActiveProduct.index();
    var newActiveProduct = newDoc.find(".cart__product").not(function (i, el) {
      console.log($(".cart__product[data-item-key='".concat($(el).data('item-key'), "'")).length);

      if ($(".cart__product[data-item-key='".concat($(el).data('item-key'), "'")).length) {
        return true;
      }
    });
    currentActiveProduct.after(newActiveProduct);
    currentActiveProduct.remove();
    initSelect(newActiveProduct[0]);
  }

  setTimeout(function () {
    updateAjax('change', ajaxData, callbackChange);
  }, 100);
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
});

function checkColor(parentEl) {
  if (parentEl.find('.active').length) {
    return true;
  } else if (parentEl.find('.pdp-look__color-option').length) {
    parentEl.find('.pdp-look__color-option').first().addClass('active');
  } else if (parentEl.find('.towel-colors__item').length) {
    parentEl.find('.towel-colors__item').first().addClass('active');
  }
}

function updateAjax(action, ajaxData, cb) {
  $('.cart__inner').addClass('cart__inner_load');

  if (Array.isArray(ajaxData)) {
    ajaxData = {
      "data": ajaxData,
      "action": action
    };
  } else {
    ajaxData.action = action;
  } // ajaxData.push(action);


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
    $('.basket-quantity').remove();

    if ($(htmlDoc).find('.basket-quantity').length) {
      $('.header__basket').append($(htmlDoc).find('.basket-quantity'));
    }

    if (cb) {
      cb($(htmlDoc));
    } else {
      $('.cart .cart__body').remove();
      $('.cart .cart__head').after($(htmlDoc).find('.cart .cart__body'));
      $(".cart").addClass("cart_open");
      $("body").addClass('scroll-off');
      initSelect($('.cart')[0]);
    }

    updateTotal($(htmlDoc).find('.cart .cart__products-price').text());
    $('.cart__inner').removeClass('cart__inner_load');
  });
}

function updateTotal(newTotalPrice) {
  $('.cart .cart__products-price').html(newTotalPrice);
}
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

/***/ "./src/js/utils/measure.js":
/*!*********************************!*\
  !*** ./src/js/utils/measure.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).on('click', '.pdp-measure__btn', function name(e) {
  e.preventDefault();
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).addClass("active").siblings(".active").removeClass("active");

  if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).text() == 'inc') {
    localStorage.setItem('measure', 'inc');
  } else {
    localStorage.setItem('measure', 'cm');
  }

  initMeasure();
});

function initMeasure() {
  var measure = localStorage.getItem('measure'); // cm or inc

  if (measure && measure == 'inc') {
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('.pdp-measure__btn.active').next().length) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('.pdp-measure__btn.active').removeClass('active').next().addClass('active');
    }
  }

  countMeasure(measure);
}

function countMeasure(type) {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(".select__items div, .pdp-look__size-option, .select__selected, .pdp__size-select select option").each(function (index, element) {
    var coef = type == "cm" ? 2.5 : 0.4;
    var measureArray = jquery__WEBPACK_IMPORTED_MODULE_0___default()(element).text().split(" ");
    var measureValue = measureArray.map(function (val) {
      if (RegExp(/[\d\.]+(x|х)[\d\.]+/).test(val)) {
        if (val.split('x').length > 1) {
          val = val.split('x').map(function (val) {
            if (val.split('+').length > 1) {
              return val.split('+')[0] * coef + "+" + val.split('+')[1];
            } else {
              return val * coef;
            }
          });
        } else {
          val = val.split('х').map(function (val) {
            if (val.split('+').length > 1) {
              return val.split('+')[0] * coef + val.split('+')[1];
            } else {
              return val * coef;
            }
          });
        }

        return val.join('x');
      }

      return val;
    });
    var newVal = measureValue.join(" ").replace(/(cm|inc)/, type);
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(element).text(newVal);
  });
}

if (localStorage.getItem('measure') == "inc") {
  initMeasure();
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
  var x, i, j, l, ll, selElmnt, a, b, c;
  /* Look for any elements with the class "custom-select": */

  if (initArea) {
    x = initArea.querySelectorAll(".select");
  } else {
    x = document.getElementsByClassName("select");
  }

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
      y[i].classList.remove("active");
    }
  }

  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(x[i]).slideUp();
    }
  }
}
/* If the user clicks anywhere outside the select box,
then close all select boxes: */


document.addEventListener("click", closeAllSelect);

/***/ })

/******/ });
//# sourceMappingURL=main.js.map