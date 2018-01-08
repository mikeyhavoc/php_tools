'use  strict'

const gulp = require('gulp');
const concat = require('gulp-concat');
const postcss = require('gulp-postcss');
let path = require('path');
const sass = require('gulp-ruby-sass');


gulp.task('sass', () =>
    sass('sass/main.scss')
        .on('error', sass.logError)
        .pipe(gulp.dest('public/css/')));
