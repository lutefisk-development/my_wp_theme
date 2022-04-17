// gulpfile.js
const { watch, series, src, dest } = require("gulp");
var uglify = require('gulp-uglify');
var browserSync = require("browser-sync").create();
var postcss = require("gulp-postcss");

// Task for compiling our CSS files using PostCSS
function cssTask(cb) {
    return src("./assets/src/css/*.css") // read .css files from ./assets/src/css folder
        .pipe(postcss()) // compile using postcss
        .pipe(dest("./assets/dist/css")) // paste them in ./assets/dist/css folder
        .pipe(browserSync.stream());
    cb();
}

// Gulp task to minify JavaScript files
function jsTask(cb) {
	return src("./assets/src/scripts/*.js") // read .js files from ./assets/src/scripts folder
		.pipe(uglify()) // Minify the file
		.pipe(dest("./assets/dist/js")) // paste them in ./assets/dist/js folder
		.pipe(browserSync.stream());
	cb();
}

// Serve from browserSync server
function browsersyncServe(cb) {
    browserSync.init({
        server: {
            baseDir: "./",
        },
    });
    cb();
}

function browsersyncReload(cb) {
    browserSync.reload();
    cb();
}

// Watch Files & Reload browser after tasks
function watchTask() {
    watch("./**/*.html", browsersyncReload);
    watch(["./assets/src/css/*.css"], series(cssTask, browsersyncReload));
    watch(["./assets/src/js/*.js"], series(jsTask, browsersyncReload));
}

// Default Gulp Task
exports.default = series(cssTask, jsTask, browsersyncServe, watchTask);
exports.css = cssTask;
exports.js = jsTask;
