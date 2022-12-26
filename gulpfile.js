// prettier-ignore
const gulp = require('gulp'),
      sass = require('gulp-sass')(require('sass')),
      autoPrefixer = require('gulp-autoprefixer'),
      // sourcemaps = require('gulp-sourcemaps'),
      concat = require('gulp-concat'),
      imagemin = require('gulp-imagemin'),
      plumber = require('gulp-plumber'),
      uglify = require('gulp-uglify');

const paths = {
  root: '.',
  minified: './minified_assets',
};

const sources = {
  img: [`${paths.root}/assets/img/**/!(_)*.+(png|jpg|jpeg|gif|svg|ico)`],
  css: [
    `${paths.root}/assets/styles/**/_*.+(css|scss)`,
    `${paths.root}/assets/styles/**/!(_)*.+(css|scss)`,
    `${paths.root}/assets/styles/**/!(_)*.rtl.+(css|scss)`,
  ],
  js: [`${paths.root}/assets/js/**/*.js`],
  lib: [`${paths.root}/assets/lib/**/*.*`],
};

const tasks = {
  img: 'img',
  css: 'css',
  js: 'js',
  lib: 'lib',
  start: 'start',
  watch: 'watch',
  default: 'default',
};

// handel img
gulp.task(tasks.img, (_, dest = `${paths.minified}/img`) => {
  return gulp.src(sources.img).pipe(plumber()).pipe(imagemin()).pipe(gulp.dest(dest));
});

// handel css
gulp.task(tasks.css, (done, dest = `${paths.minified}/css`) => {
  /**
   * In css task we use that method to stop duplicates in all.min.css
   * this for watching only: _*.+(css|scss)
   * this for watching & compiling only: !(_)*.+(css|scss)
   * console.log(sources.css.filter(item => !item.includes('_*')));
   */

  // ltr
  gulp
    .src(sources.css[1])
    .pipe(plumber())
    // .pipe(sourcemaps.init())
    .pipe(concat('all.min.css'))
    .pipe(sass.sync({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoPrefixer({ cascade: true }))
    // .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(dest));

  // rtl
  gulp
    .src(sources.css[2])
    .pipe(plumber())
    // .pipe(sourcemaps.init())
    .pipe(concat('all.rtl.min.css'))
    .pipe(sass.sync({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoPrefixer({ cascade: true }))
    // .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(dest));

  gulp.src(sources.css);
  done();
});

// handel js
gulp.task(tasks.js, (_, dest = `${paths.minified}/js`) => {
  return (
    gulp
      .src(sources.js)
      .pipe(plumber())
      // .pipe(sourcemaps.init())
      .pipe(concat('all.min.js'))
      .pipe(uglify())
      // .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest(dest))
  );
});

// handel lib
gulp.task(tasks.lib, (_, dest = `${paths.minified}/lib`) => {
  return gulp.src(sources.lib).pipe(gulp.dest(dest));
});

// watch files
gulp.task(tasks.watch, done => {
  gulp.watch(sources.img, gulp.series(tasks.img));
  gulp.watch(sources.css, gulp.series(tasks.css));
  gulp.watch(sources.js, gulp.series(tasks.js));
  gulp.watch(sources.lib, gulp.series(tasks.lib));

  done();
});

// starting
gulp.task(tasks.start, gulp.series(tasks.img, tasks.css, tasks.js, tasks.lib));
gulp.task(tasks.default, gulp.parallel(tasks.watch, tasks.start));
