// NOTE: DEFAULT
var path=require('path'),Argv=require('minimist')(process.argv);
// NOTE: COMMON PACKAGE
var fs=require('fs-extra'),clc=require('cli-color'),extend=require('node.extend');
// NOTE: REQUIRE PACKAGE
var gulp=require('gulp'),sass=require('gulp-sass'),minifyCss=require('gulp-minify-css'),uglify=require('gulp-uglify'),concat=require('gulp-concat'),include=require('gulp-include');
// NOTE: REQUIRE DATA
var Package=JSON.parse(fs.readFileSync('package.json'));
// NOTE: GULP
var rootAsset=path.join(Package.config.common.asset.root);
var rootPublic=path.join(Package.config.common.public.root);





var style = {
  normal:{
    sass:{
      debugInfo: false,
      lineNumbers: true,
      errLogToConsole: true,
      outputStyle: 'nested'
    },
    js:{
      //mangle:false,
      output:{
          beautify: true,
          comments:'license'
      },
      compress:false,
      //outSourceMap: true,
      preserveComments:'license'
    }
  },
  compressed:{
    sass:{
      debugInfo: true,
      lineNumbers: false,
      errLogToConsole: true,
      outputStyle: 'compressed'
    },
    js:{
      //mangle:false,
      output:{
          beautify: true,
          comments:'license'
      },
      compress:true,
      //outSourceMap: true,
      preserveComments:'license'
    }
  },
};

var codeStyle = Argv.style;
if (codeStyle && style[codeStyle]) {
  codeStyle = style[codeStyle];
} else {
  codeStyle=style.normal;
}
// NOTE: SASS
gulp.task('sass', function () {
  return gulp
    .src(path.join(rootAsset,'sass','*([^A-Z0-9-]).scss'))
    .pipe(sass(codeStyle.sass).on('error', sass.logError))
    .pipe(gulp.dest(path.join(rootPublic,'css')));
});
// NOTE: SCRIPT
gulp.task('script',function(){
    gulp.src(path.join(rootAsset,'javascript','*([^A-Z0-9-]).js'))
    //.pipe(concat('all.min.js'))
    .pipe(include().on('error', console.log))
    .pipe(uglify(codeStyle.js).on('error', console.log))
    .pipe(gulp.dest(path.join(rootPublic,'js')));
});
// NOTE: WATCH
gulp.task('watch', function() {
    gulp.watch(path.join(rootAsset,'sass','*.scss'), ['sass']);
    gulp.watch(path.join(rootAsset,'javascript','*.js'), ['script']);
});
// NOTE: TASK
gulp.task('default', ['watch']);
