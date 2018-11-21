"use strict";

import gulp from "gulp";
import sourcemaps from "gulp-sourc;
import concat from 'gulp-concat';

    gutil = require("gulp-util"),

    newer = require("gulp-newer"),
    debug = require("gulp-debug"),
    series = require("gulp-series"),
    rigger = require("gulp-rigger"),
    notify = require("gulp-notify"),


    {phpMinify} = require("@cedx/gulp-php-minify"),
    imageOptim = require("gulp-imageoptim");
    htmlclean = require("gulp-htmlclean");

const paths = {
    src: "src/**/*",
    srcPhp: "src/**/*.php",

    srcJs: "src/public/js/**/*.js",
    srcImg: "src/public/img/**/*.jpg",


    dist: "dist/",
    distIndex: "dist/Index.php",
    distPhp: "dist/",

    distJs: "dist/public/js/",
    distImg: "dist/public/img/",

};

const styles = {
      sassSrc: ".src/public/sass/",
      sassDest: ".src/public/css",
      srcCss: ".src/public/css",
      srccCss: "./dist/css"
    };

// modular sass -> css style gulp.task.
gulp.task("sassCss", () => {
    import sass from "gulp-sass";
    import sourcemaps from "gulp-sourcemaps";
    import cleanCss from "gulp-clean-css";
    import concat from "gulp-concat";


    import babelify from 'babelify';
		import fs from 'fs';
		import browserify from 'browserify';

    gulp.src(sassSrc + "/**.*.scss")
    return gulp.src(".src/public/sass/**/*.scss")
	    .pipe(sourcemaps.init(".map"))
		  .pipe(concat("style.min.css"), {newLine: ""})
	    .pipe(sass().on("error", sass.logError))
	    .pipe(gulp.dest(".src/public/css")
		  .pipe(sourcemaps.write('.map'))
	    .pipe(cleanCss( { })
	    .pipe(gulp.dest(paths.srcCss));
});


gulp.task("sass", function () {

});

gulp.task("miniCss", () => {
    return gulp.src("src/public/css/**/*.css")

    }))

    .pipe(gulp.dest(paths.distCss))
};





// rigger
gulp.task("js", function() {
    return gulp.src(paths.srcJs)
        .pipe(newer(paths.distJs))
        .pipe(rigger())
        .pipe(gulp.dest(paths.distJs))
        .pipe(debug({ title: "JS:" }))
});

gulp.task("image", function() {

    return gulp.src(paths.srcImg)
        .pipe(imageOptim.optimize())
        .pipe(gulp.dest(paths.distImg));
});

// PHP

gulp.task("php-copy", function() {
    return gulp.src(paths.srcPhp)
      .pipe(newer(paths.dist))
      .pipe(gulp.dest(paths.dist));
});

gulp.task("browser-sync", function () {
    browserSync.init({
        server: {
            baseDir: paths.dist
        }
    })
});


// watch

// build
gulp.task("default", ["sass, "]);