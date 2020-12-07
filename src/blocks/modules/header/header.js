import 'regenerator-runtime/runtime';
import "slick-carousel";
import 'slick-lightbox';
import "../../../js/utils/select";
import "../../../js/utils/label";
import "../../../js/utils/cart";
import "../../../js/utils/measure";

$(".nav__list-item").hover(function () {
  $(this).addClass('nav-item-hover');
}, function () {
    setTimeout(() => {
      $(this).removeClass('nav-item-hover');
    }, 500);
})

if ($('.pdp__collection-options').length) {
  $('.pdp__price').text($('.pdp__price').text().replace(/[\d\.]*/, 0));
}

// Utils  **START**
// Count
$(document).on("click", ".count__btn", function (e) {
  e.preventDefault();
  const inputEL = $(this).siblings("input");
  const currentValue = parseInt(inputEL.val());
  if ($(this).hasClass("count__minus") && currentValue >= 2) {
    inputEL.val(currentValue - 1);
  } else if ($(this).hasClass("count__plus")) {
    inputEL.val(currentValue + 1);
  }
});

// Step Radio
$(".step__radio").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
});

// Tooltip
$(".tooltip").on("click", function (e) {
  e.preventDefault();
  $(this).toggleClass("active");
});
// Utils **END**
// Size options
$(document).on("click", ".pdp-look__size-option", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
});

// Color options
$(document).on("click", ".pdp-look__color-option", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
});

$(document).on('click', '.pdp-control .select__items div, .pdp__collection-checkbox', function () {
  let selectOptionsObj;
  if ($(this).hasClass('pdp__collection-checkbox')) {
    selectOptionsObj = $(this).siblings('.select').find('select')[0];
  } else {
    selectOptionsObj = $(this).parent().siblings('select')[0];
  }
  const activeOption = selectOptionsObj.querySelectorAll('option')[selectOptionsObj.options.selectedIndex];
  const sizeValue = activeOption.value;
  let productId;
  if ($(this).closest('.pdp__collection-row').length) {
    productId = $(this).closest('.pdp__collection-row').find("input[name='product_id']").val();
    const priceEl = $(this).closest('.pdp__collection-row').find('.pdp__collection-price');
    updatePrice(productId, sizeValue, priceEl);
  } else {
    productId = $(this).closest('.pdp__options-product').find("input[name='product_id']").val();
    const priceEl = $(this).closest('.pdp-control').find('.pdp__price');
    updatePrice(productId, sizeValue, priceEl);
  }
})

// $(document).on('click', '.pdp__collection-checkbox', function () {

// })

$(document).on('click', '.pdp-look .pdp-look__size-option, .pdp-look .count__btn', function () {
  const productEl = $(this).closest('.pdp-look');
  const sizeValue = productEl.find('.pdp-look__size-option.active').data('value');
  const productId = productEl.find("input[name='product_id']").val();
  const priceEl = productEl.find('.pdp-look__buy-price');
  const quantity = productEl.find('.count__value').val();
  updatePrice(productId, sizeValue, priceEl, quantity);
})
function updatePrice(productId, sizeValue, priceEl, quantity = 1) {
  console.log('--------------');

  console.log('update price');

  const productInfo = async() => {
    try {
      const url = `/wp-json/giardino/product/?id=${productId}&pa_size=${sizeValue}`;
      const res = await fetch(url);
      const data = await res.json()
      if (data.price) {
        await priceEl.each((index, el) => {
          let price = quantity == 1 ? data.price : data.price * quantity;
          $(el).text($(el).text().replace(/[\d\.]*/, price));
          if ($(el).hasClass('pdp__price')) {
            $(el).attr("data-main-price", price);
          }
        }) 

        if ($('.pdp-control .pdp__collection-inner').length) {
          let totalPrice = 0;
          if ($('.pdp-control .pdp__options-product').length) {
            if ($('.pdp__price').attr('data-main-price')) {
            } else {
              $('.pdp__price').attr('data-main-price', parseFloat($('.pdp__price').text()));
            }

            totalPrice = parseFloat($('.pdp__price').attr('data-main-price'));
          } 

          document.querySelectorAll('.pdp-control .pdp__collection-row').forEach(element => {
            if ($(element).find('.checkbox__input').is(':checked')) {
              totalPrice += parseFloat($(element).find('.pdp__collection-price').text());
            }
          });
          $('.pdp__price').text($('.pdp__price').text().replace(/[\d\.]*/, totalPrice));
        }
      }
     } catch (e) {
       console.log(e)
     }
  }
  productInfo();
}

// Header **START**
// scroll Fixed
$(window).on("scroll", () => {
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
  $(".navbar__block.active")
    .removeClass("active")
    .siblings(".navbar__main")
    .addClass("active");
});

$(".navbar-link__direction_dropdown").on("click", function (e) {
  e.preventDefault();
  let navTarget = $(`.navbar__block[data-nav-id=${$(this).data("target")}]`);
  $(".navbar__block.active").removeClass("active");
  navTarget.addClass("active");
});

$(".header__basket").on("click", function (e) {
  e.preventDefault();
  $(".cart").addClass("cart_open");
});

$(".cart").on("click", (e) => {
  if ($(e.target).hasClass("cart_open")) {
    closeCart();
  }
});

$(".cart__head-close, .cart__head-title").on("click", (e) => {
  e.preventDefault();
  closeCart();
});

function closeCart() {
  $(".cart").removeClass("cart_open");
}
// Header **END**

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
});
// SORT **END**

// CHECKOUT **START**
$(".checkout-nav__step").on("click", function (e) {
  e.preventDefault();
  let checkoutStepNum = $(this).data("step-target");
  let stepTarget = $('.step[data-step="' + checkoutStepNum + '"]');

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
  let stepTarget;
  if ($(this).hasClass("step-next_inner")) {
    stepTarget = $(".step.active .step__inner.active").next();
    toggleStep(stepTarget);
  } else {
    stepTarget = $(".step.active").next();
    toggleStep(stepTarget, true);
  }
});

function toggleStep(stepEL, toggleNav = false) {
  if (toggleNav) {
    $(".checkout-nav__step.active")
      .toggleClass("active pass")
      .next()
      .addClass("active");
  }
  stepEL
    .addClass("active")
    .slideToggle()
    .siblings(".active")
    .slideToggle()
    .removeClass("active");
}
// CHECKOUT **END**

// SLIDERS **START**
// Same products
$(".products-slider__list").slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  dots: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 768,
      settings: "unslick",
    },
  ],
});

// Gallery product
$(".pdp__slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".pdp__slider-nav",
});
$(".pdp__slider-nav").slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  asNavFor: ".pdp__slider-for",
  focusOnSelect: true,
  vertical: true,
  verticalSwiping: true,
  responsive: [
    {
      breakpoint: 993,
      settings: {
        slidesToShow: 4,
      },
    },
    {
      breakpoint: 769,
      settings: {
        vertical: false,
        centerMode: true,
        slidesToShow: 1,
        variableWidth: true,
      },
    },
  ],
});

$('.pdp__slider-for').slickLightbox({
  src: 'src',
  itemSelector: '.pdp__slide img'
});

$('.pdp-look__preview').slickLightbox({
  src: 'src',
  itemSelector: 'img'
});
// SLIDERS **END**

// Product page **START**
// Tabs
$(".pdp-tabs__nav-item").on("click", function () {
  const tabTargetNum = $(this).data("tab-target");
  const tabTargetEl = $(`.pdp-tabs__tab[data-tab=${tabTargetNum}]`);
  $(this).addClass("active").siblings(".active").removeClass("active");
  tabTargetEl
    .addClass("active")
    .slideDown()
    .siblings(".active")
    .removeClass("active")
    .slideUp();
});

// Collection
$(".dropdown-toggler").on("click", function () {
  $(this).toggleClass("active").siblings().slideToggle();
});

// Look mobile view toggle
if ($(".pdp-look").length) {
  function pdpViewMobToggle() {
    if (
      $(window).width() < 993 &&
      $(".pdp-look__info .pdp-look__info-body").length
    ) {
      $(".pdp-look").each((index, el) => {
        let toggleBlock = $(el).find(".pdp-look__info-body").addClass("col");
        $(el).append(toggleBlock);
      });
    } else if (
      $(window).width() >= 993 &&
      $(".pdp-look__info-body.col").length
    ) {
      $(".pdp-look").each((index, el) => {
        let toggleBlock = $(el).find(".pdp-look__info-body").removeClass("col");
        $(el).find(".pdp-look__info").append(toggleBlock);
      });
    }
  }
  $(window).on("resize", pdpViewMobToggle);
  pdpViewMobToggle();
}

// Product page **END**

// Modals
$(document).on('click', '.modal-trigger, .pdp__guide', function (e) {
  e.preventDefault();
  let target = $(this).attr("modal-target");
  if ($(this).hasClass('pdp__guide')) {
    let desktopGuide = $(this).data('image');
    let mobileGuide = $(this).data('mobile');
    target = '#m-guide';
    if ($(window).width() > 992) {
      $(target).find('.m-guide__image').attr('src', desktopGuide);
    } else {
      $(target).find('.m-guide__image').attr('src', mobileGuide);
    }
  }
  $(".modal").hasClass("modal_active")
    ? $(".modal__body").slideUp()
    : $(".modal").addClass("modal_active");
  $(target).delay(500).slideDown();
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
  $(".modal").hasClass("modal_active")
    ? $(".modal").removeClass("modal_active")
    : $(".modal").addClass("modal_active");
  $(".modal__body").slideUp();
}
