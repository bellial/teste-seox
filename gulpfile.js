'use strict';

const gulp = require('gulp');
const babel = require('gulp-babel');
const sass = require('gulp-sass')(require('node-sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const scsslint = require('gulp-sass-lint');
const cssnano = require('gulp-cssnano');

/**
 * Here we set a prefix for our compiled and stylesheet and scripts.
 */
const themePrefix = 'seox';

/**
 * Paths and files
 */
const srcScss = 'scss/**/*.scss';
const srcJsDir = 'assets';
const srcJsFiles = [
    `${srcJsDir}/js/main.js`,
];
const destCss = './';
const destJs = '/assets/js';

/**
 * Scss lint
 */
gulp.task('scss-lint', () => {
    return gulp.src(srcScss)
        .pipe(scsslint());
});

/**
 * Task for styles.
 *
 * Scss files are compiled and sent over to `/`.
 */
gulp.task('css', gulp.series('scss-lint', () => {
    return gulp.src(srcScss)
        .pipe(sass().on('error', sass.logError))
        //.pipe(autoprefixer({ cascade : false }))
        .pipe(autoprefixer())
        .pipe(cssnano({discardComments:false}))
        .pipe(rename(`style.css`))
        .pipe(cleancss())
        .pipe(gulp.dest(destCss));
}));

/**
 * Task for scripts.
 *
 * Js files are uglified and sent over to `assets/js`.
 */
gulp.task('js', () => {
    return gulp.src(srcJsFiles)
        .pipe(babel({
            presets : ['@babel/env']
        }))
        .pipe(concat(`${themePrefix}.min.js`))
        .pipe(uglify())
        .pipe(gulp.dest(destJs));
});

/**
 * Task for watching styles and scripts.
 */
gulp.task('watch', () => {
    gulp.watch(srcScss, gulp.series('css'));
    gulp.watch(srcJsFiles, gulp.series('js'));
});

/**
 * Default task
 */
gulp.task('default', gulp.series('css', 'js') );