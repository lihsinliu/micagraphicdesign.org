'use strict';


var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var assembleOptions = {
  partials: 'app/templates/partials/*.hbs',
  layoutdir: 'app/templates/layouts/',
  layout: 'default.hbs'
};

gulp.task('html:assemble', function () {
  return gulp.src('app/templates/pages/*.hbs')
    .pipe($.plumber())
    .pipe($.assemble(assembleOptions))
    .pipe(gulp.dest('.tmp'))
    .pipe(reload({stream: true, once: true}))
    .pipe($.size({title: 'HTML'}))
    .pipe($.size({title: 'HTML gzip', gzip: true}));
});


gulp.task('copy:all', function () {
  return gulp.src([
      '.tmp/*.html',
      'app/css',
      'app/img',
      'app/js'
    ])
    .pipe(gulp.dest('dist'))
    .pipe($.size({title: 'Assets'}))
});


// Static server
gulp.task('bs', function() {
    browserSync({
        notify: true,
        server: {
            baseDir: ['.tmp', 'app'],
            directory: true
        }
    });
});


gulp.task('watch', function () {
	gulp.watch('app/templates/**/*.hbs', ['html:assemble']);
})


gulp.task('default', ['watch','html:assemble','bs']);
