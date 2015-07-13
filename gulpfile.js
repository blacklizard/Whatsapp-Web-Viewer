var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var clean = require('gulp-clean');
var ignore = require('gulp-ignore');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var concat = require('gulp-concat-util');
var notify = require("gulp-notify");

gulp.task('clean', function () {
    return gulp.src([
        'public/js/**/*.*',
        'public/css/**/*.*',
        'public/font/*.*',
        'public/images/**/*.*'

    ], {
        read: false
    })
        .pipe(ignore(['node_modules/**', '.gitignore']))
        .pipe(clean());
});

gulp.task('vendor', function () {
    var jsVendor = [
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/modernizr/modernizr.js',
        'bower_components/foundation/js/foundation.min.js'
    ];

    var cssVendor = [
        'bower_components/foundation/scss/normalize.scss',
        'bower_components/foundation/scss/foundation.scss'
    ];

    var fontVendor = [
        'bower_components/fontawesome/fonts/*.*'
    ];

    var js = [];

    var images = ['resources/assets/images/**/*.*'];

    gulp.src(jsVendor)
        .pipe(uglify())
        .pipe(gulp.dest('public/js/vendor'));

    gulp.src(js)
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));

    gulp.src(cssVendor)
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(gulp.dest('public/css/vendor'));

    gulp.src(fontVendor)
        .pipe(gulp.dest('public/font'));

    gulp.src(images)
        .pipe(gulp.dest('public/images'));
});

gulp.task('init', ['vendor']);
