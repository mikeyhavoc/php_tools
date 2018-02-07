const
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    gutil = require('gulp-util'),
    image = require('gulp-image'),
    newer = require('gulp-newer'),
    debug = require('gulp-debug'),
    series = require('gulp-series'),
    rigger = require('gulp-rigger'),
    notify = require('gulp-notify'),
    browserSync = require('browser-sync'),
    sourcemaps = require('gulp-sourcemaps'),
    {phpMinify} = require('@cedx/gulp-php-minify'),
    imageOptim = require('gulp-imageoptim'),
    htmlclean = require('gulp-htmlclean');

const paths = {
    src: 'src/**/*',
    srcPhp: 'src/**/*.php',
    srcCss: 'src/public/css/**/*.css',
    srcJs: 'src/public/js/**/*.js',
    srcImg: 'src/public/img/**/*.jpg',

    tmp: 'tmp',
    tmpIndex: 'tmp/index.php',
    tmpCss: 'tmp/**/*.css',
    tmpJs: 'tmp/**/*.js',

    dist: 'dist',
    distIndex: 'dist/Index.php',
    distPhp: 'dist/**/*.php',
    distCss: 'dist/public/css/**/*.css',
    distJs: 'dist/public/js/**/*.js',
    distImg: 'dist/public/img/**/*.jpg',

};









// SASS
gulp.task('sass', function () {
    return gulp.src(src + '/public/sass/**/*.scss')
        .pipe(newer(dest + '/public/css/'))
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed',
            }).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(dest + '/public/css'))
        .pipe(debug({ title: 'sass:' }))
});

// rigger
gulp.task('js', function() {
    return gulp.src(src + '/public/js/**/*.js')
        .pipe(newer(dest + 'public/js'))
        .pipe(rigger())
        .pipe(gulp.dest(dest + '/public/js'))
        .pipe(debug({ title: 'js:' }))
});

// html
gulp.task('php-minify', function() {
    return gulp.src('src/**/*.php', {read: false})

        .pipe(newer(dest))

        .pipe(gulp.dest(dest))
        .pipe(debug({ title: 'PHP:' }))
});

gulp.task('browser-sync', function () {
    browserSync.init({
        server: {
            baseDir: 'dest/'
        }
    })
});

gulp.task('image', function() {
    return gulp.src('src/public/img/**/*')
        .pipe(imageOptim.optimize())
        .pipe(gulp.dest('dest/public/img/'));
});

// watch
gulp.task('watch', ['php-minify', 'image', 'sass', 'js', 'browser-sync'], function() {
    gulp.watch(src + '/public/sass/*.scss', ['sass']);
    gulp.watch(dest + '/dest/public/css/*.css', browserSync.reload);
    gulp.watch(src + '/**/*.php', ['php-minify']);

    gulp.watch(src + '/public/js/*', ['js'], );
    gulp.watch(dest + '/public/js/', browserSync.reload)
    gulp.watch(src + '/public/img/*', ['image']);
    gulp.watch(dest + '/public/img/', browserSync.reload);
    gulp.watch(src + '/**/*.php', ['phpMinify']);
    gulp.watch(dest + '/**/*', browserSync.reload);

});

// build
gulp.task('default', ['watch'])