'use strict';


var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var assembleOptions = {
  partials: 'app/templates/partials/*.hbs',
  layoutdir: 'app/templates/layouts/',
  layout: 'default.hbs'
};

gulp.task('clean:tmp', function (cb) {
  del([
    '.tmp/**',
  ], cb);
});

gulp.task('clean:dist', function (cb) {
  del([
    'dist/**',
    '!dist/.git'
  ], cb);
});

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
      'README.md',
      '.tmp/*.html',
      'app/**',
      '!app/templates/**'
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


gulp.task('build', ['clean:dist'],function () {
  gulp.start('copy:all');
});


gulp.task('watch', function () {
	gulp.watch('app/templates/**/*.hbs', ['html:assemble']);
})


gulp.task('default', ['clean:tmp','html:assemble','bs'], function (){
  gulp.start('watch');
});
