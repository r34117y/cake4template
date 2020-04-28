/**
 * https://css-tricks.com/gulp-for-beginners/
 */
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var yuidoc = require("gulp-yuidoc");
var autoprefixer = require('autoprefixer');
var postcss = require('gulp-postcss');
/**
 * Tworzy plik ze źródłami, który pozwala przeglądarce wskazywać
 * na źródłowe pliki .scss, zamiast na wynikowy bundle.
 * https://symfonycasts.com/screencast/gulp/sourcemaps
 */
var sourcemaps = require("gulp-sourcemaps");

// Lint Task
// https://blog.sideci.com/automatically-check-javascript-code-using-jshint-c9c1ca1ce2d1
// https://jshint.com/docs/options/
gulp.task('lint', function() {
    return gulp.src('./src/scripts/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

/*gulp.task('sass', function() {
    return gulp.src('src/scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded',
            indentType: 'tab',
            indentWidth: '1'
        }).on('error', sass.logError))
        .pipe(minifyCSS({
            processImport: true
        }))
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('css'));
});*/

gulp.task('sass', function() {
    return gulp.src('src/scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded',
            indentType: 'tab',
            indentWidth: '1'
        }).on('error', sass.logError))
        .pipe(minifyCSS({
            processImport: true
        }))
        .pipe(postcss([
            autoprefixer('last 2 versions', '> 1%')
        ]))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('css'));
});

gulp.task('docs', function() {
    return gulp.src(["./src/scripts/*.js", "./app/Controller/*.php", "./app/Model/*.php"])
        .pipe(yuidoc())
        .pipe(gulp.dest("./docs"));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('./src/scripts/*.js')
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(uglify())
        .pipe(gulp.dest('./app/webroot/js'));
});

gulp.task('watch', function() {
    gulp.watch('src/scripts/*.js', ['lint', 'scripts']);
    gulp.watch('src/scss/*.scss', ['sass']);
});

gulp.task('default', gulp.series('sass', 'scripts', 'watch', 'docs'));
