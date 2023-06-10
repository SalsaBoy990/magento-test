const gulp        = require('gulp');
const babel       = require("babelify");
const browserify  = require('browserify');
const buffer      = require('vinyl-buffer');
const less        = require('gulp-less');
const source      = require('vinyl-source-stream');
const sourcemaps  = require("gulp-sourcemaps");
const uglify      = require('gulp-uglify');
const rename      = require('gulp-rename');
const cleanCSS    = require('gulp-clean-css');


const paths = {
    styles: {
        src: 'src/less/main.less',
        dest: 'view/frontend/web/css/'
    },
    scripts: {
        src: 'src/js/main.js',
        dest: 'view/frontend/web/js/'
    }
};


const watchPaths = {
    styles: 'src/less/**/*.less',
    scripts: 'src/js/**/*.js',
}


/* Not all tasks need to use streams, a gulpfile is just another node program
 * and you can use all packages available on npm, but it must return either a
 * Promise, a Stream or take a callback and call it
 */
function clean() {
    // You can use multiple globbing patterns as you would with `gulp.src`,
    // for example if you are using del 2.0 or above, return its promise
    return del(['view/web/js/main.min.js', 'view/web/css/main.min.css']);
}


/*
 * Process SASS files
 */
function styles() {
    return gulp.src(paths.styles.src)
        .pipe(less())
        // .pipe(cleanCSS())
        // pass in options to the stream
        .pipe(rename({
            basename: 'main',
            suffix: ''
        }))
        .pipe(gulp.dest(paths.styles.dest, {sourcemaps: true}));
}


/*
 * Process JavaScript files
 */
function scripts() {

    const bundler = browserify({entries: paths.scripts.src}, {debug: false}).transform(babel);

    bundler.bundle()
        .on("error", function (err) {
            console.error(err);
            this.emit("end");
        })
        .pipe(source('main.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(paths.scripts.dest));
}


/* Watch files changes and trigger asset re-building */
function watch() {
    gulp.watch(watchPaths.scripts, scripts);
    gulp.watch(watchPaths.styles, styles);
}


/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.series(clean, gulp.parallel(styles, scripts));


/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.build = build;
/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = build;
