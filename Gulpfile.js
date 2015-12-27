var gulp = require('gulp');
var sass = require('gulp-sass');
var flatten = require('gulp-flatten');
var browserSync = require('browser-sync').create();

gulp.task('styles', function(){
  gulp.src('sass/**/*.scss')
  .pipe(flatten())
    .pipe(sass({outputStyle: 'condensed'}).on('error', sass.logError))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
});

gulp.task('serve', ['styles'], function() {
    browserSync.init({
        proxy: "carolynewhelan.dev"
    });
    gulp.watch('sass/**/*.scss',['styles']);
    gulp.watch('*.php').on('change', browserSync.reload);
});


gulp.task('default', ['serve']);
