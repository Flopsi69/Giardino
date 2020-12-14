import $ from 'jquery';


$(document).on('click', '.pdp-measure__btn', function name(e) {
  e.preventDefault();
  $(this).addClass("active").siblings(".active").removeClass("active");
  if ($(this).text() == 'inc') {
    localStorage.setItem('measure', 'inc');
  } else {
    localStorage.setItem('measure', 'cm');
  }
  initMeasure();
});


function initMeasure() {
  let measure = localStorage.getItem('measure'); // cm or inc
  if (measure && measure == 'inc') {
    if ($('.pdp-measure__btn.active').next().length) {
      $('.pdp-measure__btn.active').removeClass('active').next().addClass('active');
    }
  }

  countMeasure(measure);
}

function countMeasure(type) {
  $(".select__items div, .pdp-look__size-option, .select__selected, .pdp__size-select select option").each((index, element) => {
    let coef = type == "cm" ? 2.5 : 0.4;
    let measureArray = $(element).text().split(" ");
    
    let measureValue = measureArray.map(val => {
      if (RegExp(/[\d\.]+(x|х)[\d\.]+/).test(val)) {
        if (val.split('x').length > 1) {
          val = val.split('x').map(val => {
            if (val.split('+').length > 1) {
              return val.split('+')[0] * coef + "+" + val.split('+')[1];
            } else {
              return val * coef;
            }
          })
        } else {
          val = val.split('х').map(val => {
            if (val.split('+').length > 1) {
              return val.split('+')[0] * coef + val.split('+')[1];
            } else {
              return val * coef;
            }
          })
        }
        return val.join('x');
      }
      return val;
    });

    let newVal = measureValue.join(" ").replace(/(cm|inc)/, type);

    let additional = newVal.match(/\+(\d+)\b/);
    if (additional) {
      additional = additional[1] * coef;
    }
    
    newVal = newVal.replace(/\+(\d+)\b/, "+"+additional);
    $(element).text(newVal);
  })
}

if (localStorage.getItem('measure') == "inc") {
  initMeasure();
}