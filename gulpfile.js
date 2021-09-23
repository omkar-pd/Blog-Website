const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
function style() {
  return gulp
    .src("./static/scss/**/*.scss")
    .pipe(sass())
    .on("error", sass.logError)
    .pipe(gulp.dest("./static/css"));
}

function watch() {
  gulp.watch("./static/scss/**/*.scss", style);
}

exports.style = style;
exports.watch = watch;
