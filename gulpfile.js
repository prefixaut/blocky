/* ~ Setup
 * ------------------------------------------------------ */
const gulp = require('gulp');

// Utility
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();

// Styles
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');

// Scripts
const uglify = require('gulp-uglify');

/* ~ Configuration
 * ------------------------------------------------------ */
const config = {
  sass: {
    outputStyle: 'expanded'
  },
  browserSync: {
    server: {
      baseDir: './',
      directory: true
    }
  }
};

/* ~ Functions
 * ------------------------------------------------------ */
function compileStyles() {
  return gulp.src('./assets/styles/**/*.scss')
    .pipe(sass(config.sass))
    //.pipe(autoprefixer())
    .pipe(gulp.dest('./assets/styles/'))
    .pipe(browserSync.stream());
}

function minifyStyles() {
  return gulp.src([
    './node_modules/font-awesome/css/font-awesome.css',
    './node_modules/bootstrap/dist/css/bootstrap.css',
    './node_modules/wallop/css/wallop.css',
    './assets/styles/*.css'
  ])
    .pipe(concat('theme.css'))
    .pipe(cleanCSS())
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
}

function minifyScripts() {
    return gulp.src([
        './node_modules/jquery/dist/jquery.js',
        './node_modules/wallop/js/Wallop.js',
        './assets/scripts/**/*.js'
    ])
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
}

/* ~ Tasks
 * ------------------------------------------------------ */
// Compilation
gulp.task('compile:styles', compileStyles);
gulp.task('compile', gulp.parallel('compile:styles'));

// Minification
gulp.task('minify:styles', minifyStyles);
gulp.task('minify:scripts', minifyScripts);
gulp.task('minify', gulp.parallel('minify:styles', 'minify:scripts'));

// General Tasks
gulp.task('styles', gulp.series('compile:styles', 'minify:styles'));
gulp.task('scripts', gulp.series('minify:scripts'));

gulp.task('build', gulp.parallel('styles', 'scripts'));

// Watchers
gulp.task('watch', () => {
    gulp.watch('./assets/styles/**/*.scss', compileStyles)
        .on('change', (path) => {
            console.log(path + ' has changed, compiling sass ...');
        });

    gulp.watch('./assets/styles/*.css', minifyStyles)
        .on('change', (path) => {
            console.log(path + ' has changed, minifiying styles ...');
        });

    gulp.watch('./assets/scripts/**/*.js', minifyScripts)
        .on('change', (path) => {
            console.log(path + ' has changed, minifiying styles ...');
        });
    
    gulp.watch('./**/*.html', (done) => {
        browserSync.reload();
        done();
    });
});

// Browser Sync
gulp.task('serve', gulp.parallel('watch', () => {
  browserSync.init(config.browserSync);
}));

// Default Task
gulp.task('default', gulp.series('build'));
