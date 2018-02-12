'use strict';

var gulp        = require('gulp'),
    shell       = require('gulp-shell'),
    sass        = require('gulp-sass'),
    del         = require('del'),
    concat      = require('gulp-concat'),
    browserSync = require('browser-sync').create(),
    runSequence = require('run-sequence'),
    sourcemaps  = require('gulp-sourcemaps'),
    minify      = require('gulp-minify'),
    less        = require('gulp-less'),
    minifyCss   = require('gulp-minify-css'),
    theme       = require('./theme.json');


var themeName = theme.name.toLowerCase();

// Publish Locations
var publicPath          = '../../public';
var themePath           = publicPath + '/themes/' + themeName.toLowerCase();

// Theme Locations
var assetsDir           = "assets";
var resourceDir         = "resources";
var resourceAssetsDir   = resourceDir + "/assets";

// Resource Locations
var cssDir              = resourceAssetsDir + "/css";
var jsDir               = resourceAssetsDir + "/js";
var imgDir              = resourceAssetsDir + "/img";
var fontsDir            = resourceAssetsDir + "/fonts";
var sassDir             = resourceDir + "/scss";

// Assets Locations
var assetsCssDir        = assetsDir + "/css";
var assetsJsDir         = assetsDir + "/js";
var assetsImgDir        = assetsDir + "/img";
var assetsFontDir       = assetsDir + "/fonts";
var assetsVendorDir     = assetsDir + "/vendor";

gulp.task('clear-public', function () {
   return del(themePath+'/**/*', {force:true});
});

gulp.task('sass-source', function () {
    return gulp.src([
        sassDir + '/**/*.scss'
    ])
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(sourcemaps.write(resourceDir+'/maps'))
    .pipe(gulp.dest(cssDir))
    .pipe(browserSync.reload({
        stream: true
    }));
});

gulp.task('sass-public', function () {
    gulp.src([
        sassDir + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write(themePath+'/maps'))
        .pipe(gulp.dest(themePath+'/css'))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('combine', function() {
    return gulp.src([
        assetsVendorDir + "/revolution/js/jquery.themepunch.tools.min.js",
        assetsVendorDir + "/revolution/js/jquery.themepunch.revolution.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.actions.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.carousel.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.kenburn.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.layeranimation.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.migration.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.navigation.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.parallax.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.slideanims.min.js",
        assetsVendorDir + "/revolution/js/extensions/revolution.extension.video.min.js"
    ])
        .pipe(concat('jquery.revolution.min.js'))
        .pipe(gulp.dest(jsDir));
});

gulp.task('copy', function () {
    return gulp.src(resourceAssetsDir+"/**")
        .pipe(gulp.dest(assetsDir));
});

gulp.task('js-public', function(){
    gulp.src(jsDir+'/**/*')
        .pipe(gulp.dest(themePath+'/js'));
});

gulp.task('production', ['clear-public', 'sass-source', 'combine', 'copy'], function () {
    return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + theme.name));
});

// Configure the proxy server for livereload
var proxyServer = "http://dev.lejant.com";

var arrAddFiles = [
    'views/**/*.php'
];

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: proxyServer,
        files: arrAddFiles,
        ghostMode: {
            clicks: true,
            location: true,
            forms: true,
            scroll: true
        },
        notify: false,
        open: false
    });
});

gulp.task('watch', ['browser-sync'], function () {
    gulp.watch([sassDir + '/**/*.scss'], ['sass-public']);
    gulp.watch('views/**/*.php', browserSync.reload);
    gulp.watch(resourceAssetsDir+'/js/**/*.js', ['js-public']);
    gulp.watch(resourceAssetsDir+'/js/**/*.js', browserSync.reload);
});