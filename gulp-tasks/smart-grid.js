"use strict";

import gulp from "gulp";
const smartgrid = require("smart-grid");

gulp.task("smart-grid", (cb) => {
  smartgrid("./src/styles/vendor/import/", {
    outputStyle: "scss",
    filename: "_smart-grid",
    columns: 12, // number of grid columns
    offset: "30px", // gutter width - 30px
    mobileFirst: false,
    mixinNames: {
      container: "container",
    },
    container: {
      maxWidth: "1260px", // 1280 px
      fields: "15px", // side fields - 15px
    },
    breakPoints: {
      xs: {
        width: "576px", // 576px
      },
      sm: {
        width: "768px", // 768px
      },
      md: {
        width: "992px", //  992px
      },
      lg: {
        width: "1270px", // 80rem
      },
    },
  });
  cb();
});
