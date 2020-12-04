import $ from 'jquery';


// $(document).on('click', '.pdp-measure__btn', function name(e) {
//   e.preventDefault();
//   $(this).addClass("active").siblings(".active").removeClass("active");
//   if ($(this).text() == 'inc') {
//     localStorage.setItem('measure', 'inc');
//   } else {
//     localStorage.setItem('measure', 'cm');
//   }
//   initMeasure();
// });


// function initMeasure() {
//   let measure = localStorage.getItem('measure'); // cm or inc
//   if (measure && measure == 'inc') {
//     if ($('.pdp-measure.active').next()) {
//       $('.pdp-measure.active').removeClass('active').next().addClass('active');
//    }
//     $(".select__items div, .pdp-look__size-option, .select__selected").each((index, element) => {
//       let measureArray = $(element).text().split(" ");
//       let measureValue = measureArray[0].split('x').map(val => {
//         return (val * 0.393701).toFixed(1);
//       });

//       $(element).text(measureValue.join('x') + ' inc');
//     })
//   } else {
//     localStorage.setItem('measure', 'cm');
//   }
// }

// initMeasure();