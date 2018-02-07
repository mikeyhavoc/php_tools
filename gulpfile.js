'use  strict'

const sourceJs = './src/public/js/**/*.js';
const destJs = './dest/public/js/';

const gulp = require('gulp');
const sass = require('gulp-ruby-sass');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('autoprefixer');
const imagemin = require('gulp-imagemin');
const phpMinify = require('@cedx/gulp-php-minify');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const pump = require('pump');
const gutil = require('gutil');

gulp.task('sass', function () {
    sass('./src/public/sass/**/*.scss')
        .on('error', sass.logError)
        .pipe(gulp.dest('./dist/public/sass/'))
});


gulp.task('build-css', function () {
    return gulp.src('./src/public/sass/**/*.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest('./dist/public/css/'));

});

gulp.task('minify-css',() => {
    return gulp.src('./src/public/**/*.css')
        .pipe(sourcemaps.init())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./dist/public/css/maps/'))
        .pipe(gulp.dest('./dist/public/css/'));
});

gulp.task('images', function () {
    return gulp.src('./src/public/img/**/*.jpg')
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest('./dist/public/imgs/'));
});

function minifyJS(srcJs, destJs, filenameRoot) {
    return gulp.src(sourceFiles)
        .pipe(plumber())
    return gulp.src(sourceFiles)
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(concat(filenameRoot + '.js'))
        .pipe(gulp.dest(destinationFolder)) // save .js
        .pipe(uglify({preserveComments: 'license'}))
        .pipe(rename({extname: '.min.js'}))
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest(destinationFolder)) // save .min.js
});

gulp.task('minifyphp', () => gulp.src('.src/**/*.php', {read: false})
    .pipe(phpMinify())
    .pipe(gulp.dest('./dist/'))
);





gulp.task('watch', function () {
    gulp.watch('./src/public/sass/**/*.scss', ['sass']);
    gulp.watch('./src/public/sass/**/*.css', ['build-css']);
    gulp.watch('./src/public/**/*.css', ['minify-css']);
    gulp.watch('./src/public/img/**/*.jpg', ['images']);
    gulp.watch('./src/public/js/**/*.js', ['compress']);
    gulp.watch('.src/**/*.php', ['minifyphp']);


});