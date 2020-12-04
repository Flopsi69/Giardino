
// Add product
$(document).on('click', '.btn-to-cart, .pdp-look__buy-btn', function (e) {
  let ajaxData = {}
  let productTargetParent = $(this).closest('.pdp-control');
  if (productTargetParent.length) {
    const productId = productTargetParent.find('input[name=product_id]').val();
    ajaxData["data[product_id]"] = productId;
    if (productTargetParent.find('.pdp__size-select').length) {
      const productSizeEl = productTargetParent.find('.pdp__size-select select')[0];
      const activeOption = productSizeEl.querySelectorAll('option')[productSizeEl.options.selectedIndex];
      const sizeValue = activeOption.value;
      ajaxData["data[pa_size]"] = sizeValue;
    }

    if (productTargetParent.find('.pdp-look__color-list').length) {
      checkColor(productTargetParent.find('.pdp-look__color-list'));
      ajaxData["data[pa_color]"] = $('.pdp-look__color-option.active .pdp-look__color-name').data('value');
    }
  } else {
    let productTargetParent = $(this).closest('.pdp-look');
    const productId = productTargetParent.find('input[name=product_id]').val();
    ajaxData["data[product_id]"] = productId;
    if (productTargetParent.find('.pdp-look__size-option.active').length) {
      ajaxData["data[pa_size]"] = productTargetParent.find('.pdp-look__size-option.active').data('value')
    }

    if (productTargetParent.find('.count__value').length) {
      ajaxData["data[quantity]"] = productTargetParent.find('.count__value').val();
    }

    if (productTargetParent.find('.towel-colors__item.active').length) {
      ajaxData["data[pa_color]"] = productTargetParent.find('.towel-colors__item.active').data('value');
    }
  }
  console.log('ajaxData', ajaxData);
  updateAjax('add', ajaxData);
})



// Remove product
$(document).on('click', '.cart__product-cancel', function (e) {
  e.preventDefault();
  const productKey = $(this).closest('.cart__product').data('item-key');
  let ajaxData = {
    "data[item_key]": productKey,
  }
  updateAjax('remove', ajaxData);
})

$(document).on("click", ".towel-colors__item", function () {
  if ($(this).closest('.towel-colors').length) {
    let colorName = $(this).data('name');
    $(this).closest('.towel-colors').find('.towel-colors__caption span').text(colorName);
  }
  $(this).addClass("active").siblings(".active").removeClass("active");
});

// Сhange
$(document).on('click', '.cart__product .towel-colors__item, .cart__product .select__items>div', function (e) {
  console.log('changes');
  let productTargetParent = $(this).closest('.cart__product');
  const productKey = productTargetParent.data('item-key');
  function callbackChange(newDoc) {
    let currentActiveProduct = $(`.cart__product[data-item-key = ${productKey}]`);
    let newActiveProduct = newDoc.find(`.cart__product[data-item-key = ${productKey}]`);
    // let newActiveProduct = newDoc.find(`.cart__product`).first();
    currentActiveProduct.after(newActiveProduct);
    currentActiveProduct.remove();
    initSelect(newActiveProduct[0]);
  }

  let ajaxData = {
    "data[item_key]": productKey
  }
  
  if (productTargetParent.find('.pdp__size-select').length) {
    const productSizeEl = productTargetParent.find('.pdp__size-select select')[0];
    const activeOption = productSizeEl.querySelectorAll('option')[productSizeEl.options.selectedIndex];
    const sizeValue = activeOption.value;
    ajaxData["data[pa_size]"] = sizeValue;
  }

  if (productTargetParent.find('.towel-colors__list').length) {
    // checkColor(productTargetParent.find('.towel-colors__list'));
    ajaxData["data[pa_color]"] = productTargetParent.find('.towel-colors__item.active').data('value');
  }

  setTimeout(() => {
    updateAjax('change', ajaxData);
  }, 100);
})


// Change Quantity
$(document).on('click', '.cart__product .count__btn', function (e) {
  console.log('change quantity');
  const productKey = $(this).closest('.cart__product').data('item-key');
  function callbackChange(newDoc) {
    let currentActiveProduct = $(`.cart__product[data-item-key = ${productKey}]`);
    let newActiveProduct = newDoc.find(`.cart__product[data-item-key = ${productKey}]`);
    currentActiveProduct.after(newActiveProduct);
    currentActiveProduct.remove();
    initSelect(newActiveProduct[0]);
  }
  setTimeout(() => {
    let ajaxData = {
      "data[item_key]": productKey,
      "data[quantity]": $(this).siblings('input').val()
    }
    updateAjax('quantity', ajaxData, callbackChange);
  }, 100);
})

function checkColor(parentEl) {
  if (parentEl.find('.pdp-look__color-option.active').length) {
    return true;
  }
  parentEl.find('.pdp-look__color-option').first().addClass('active');
}

function updateAjax(action, ajaxData, cb) {
  ajaxData.action = action;
  if (action == 'add') {
    let basketNum = $('.header__basket .basket-quantity');
    if (basketNum.text().trim()) {
      basketNum.html(parseInt(basketNum.text()) + 1);
    } else {
      basketNum.html('1');
    }
  } if (action == 'remove') {
    let basketNum = $('.header__basket .basket-quantity');
    basketNum.text(parseInt(basketNum.text()) - 1);
   }

  console.log('ajaxData', ajaxData);
  const settingsAjaxCart = {
    "url": location.origin,
    "method": "POST",
    "timeout": 0,
    "headers": {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    "data": ajaxData
  };
  $.ajax(settingsAjaxCart).done(function (response) {
    const parser = new DOMParser();
    const htmlDoc = parser.parseFromString(response, 'text/html');
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
}





