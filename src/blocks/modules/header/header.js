import 'regenerator-runtime/runtime';
import "slick-carousel";
import "../../../js/utils/select";
import "../../../js/utils/label";
import "../../../js/utils/cart";


$(document).on('click', '.select__items div', function () {
  const selectOptionsObj = $(this).parent().siblings('select')[0];
  const activeOption = selectOptionsObj.querySelectorAll('option')[selectOptionsObj.options.selectedIndex];
  const sizeKey = activeOption.dataset.key;
  const sizeValue = activeOption.value;
  const productId = $(this).closest('.pdp__options').find("input[name='product_id']").val();
  const priceEl = $(this).closest('.pdp-control').find('.pdp__price');
  
  // const productInfo = async () => {
  const productInfo = async() => {
    try {
      const url = `/wp-json/giardino/product/?id=${productId}&${sizeKey}=${sizeValue}`;
      const res = await fetch(url);
      const data = await res.json()
      if (data.price) {
        priceEl.text(priceEl.text().replace(/\d*/, data.price));
      }
     } catch (e) {
       console.log(e)
     }
  }
  productInfo();
})

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

// Toggler
$(".pdp-measure__btn").on("click", function name(e) {
  e.preventDefault();
  $(this).addClass("active").siblings(".active").removeClass("active");
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
  slidesToScroll: 2,
  autoplay: true,
  dots: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
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

// Size options
$(".pdp-look__size-option").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
});

// Color options
$(".pdp-look__color-option").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
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

// Color towel
$(".towel-colors__item").on("click", function () {
  $(this).addClass("active").siblings(".active").removeClass("active");
});

// Product page **END**

// Modals
$(".modal-trigger").click(function (e) {
  e.preventDefault();
  let target = $(this).attr("modal-target");
  $(".modal").hasClass("modal_active")
    ? $(".modal__body").slideUp()
    : $(".modal").addClass("modal_active");
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
  $(".modal").hasClass("modal_active")
    ? $(".modal").removeClass("modal_active")
    : $(".modal").addClass("modal_active");
  $(".modal__body").slideUp();
}
