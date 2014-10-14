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

gulp.task('assemble', function () {
  gulp.src('app/templates/pages/*.hbs')
    .pipe($.plumber())
    .pipe($.assemble(assembleOptions))
    .pipe(gulp.dest('.tmp'))
    .pipe(reload({stream: true}))
    .pipe($.size({title: 'HTML'}))
    .pipe($.size({title: 'HTML gzip', gzip: true}));
});


// Static server
gulp.task('bs', function() {
    browserSync({
        server: {
            baseDir: ['.tmp', 'app'],
            routes: {
            	'/bower_components': '../bower_components'
            }
        }
    });
});


gulp.task('watch', function () {
	gulp.watch('app/templates/**/*.hbs', ['assemble', reload])
})


gulp.task('default', ['watch','assemble','bs']);