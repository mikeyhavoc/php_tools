'use  strict'

const gulp = require('gulp');
const sass = require('gulp-ruby-sass');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('autoprefixer');
const imagemin = require('gulp-imagemin');
const {phpMinify} = require('@cedx/gulp-php-minify');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const pump = require('pump');

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



gulp.task('images', function () {
    return gulp.src('./public/img/**/*.jpg')
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest('./dist/imgs/'));
});

gulp.task('minifyphp', () => gulp.src('./**/*.php', {read: false})
    .pipe(phpMinify())
    .pipe(gulp.dest('./dist'))
);

gulp.task('minify-css',() => {
    return gulp.src('./public/**/*.css')
        .pipe(sourcemaps.init())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./dist/public/'));
});

gulp.task('compress', function (cb) {
    pump([
            gulp.src('./public/js/**/*.js'),
            uglify(),
            gulp.dest('./dist/public/')
        ],
        cb
    );
});