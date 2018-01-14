'use  strict'

const gulp = require('gulp');
const sass = require('gulp-ruby-sass');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('autoprefixer');


gulp.task('sass', () =>
    sass('sass/main.scss')
        .on('error', sass.logError)
        .pipe(gulp.dest('sass/')));

gulp.task('style', function () {
    return gulp.src('sass/**/*.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest('public/css/'));

});

