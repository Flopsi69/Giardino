
// Add product
$(document).on('click', '.btn-to-cart', function (e) {
  const productTargetParent = $(this).closest('.pdp-control');
  const productId = productTargetParent.find('input[name=product_id]').val();
  let ajaxData = {
    "data[product_id]": productId
  }
  
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

// Remove
$(document).on('click', '.cart__product-cancel', function (e) {
  const productKey = $(this).closest('.cart__product').data('item-key');
  let ajaxData = {
    "data[item_key]": productKey,
  }
  updateAjax('remove', ajaxData);
})


function checkColor(parentEl) {
  if (parentEl.find('.pdp-look__color-option.active').length) {
    return true;
  }
  parentEl.find('.pdp-look__color-option').first().addClass('active');
}

function updateAjax(action, ajaxData, cb) {
  ajaxData.action = action;
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
    
  });
}


// "data[item_key]": "75",
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







