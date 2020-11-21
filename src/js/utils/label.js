import $ from "jquery";

initLabel();

function initLabel() {
  $(".group").each((i, el) => {
    let inputEl = $(el).find("input");
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
