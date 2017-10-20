'use  strict';

const gulp = require('gulp');
const concat = require('gulp-concat');

gulp.task('concatScripts', () =>
   gulp.src([
     'js/vendor/modernizr-2.8.9-respond-1.4.2.min.js',
     'js/main.js'
   ])
);