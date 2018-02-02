/**
 * Created by Administrator on 2018/2/1.
 */
/*var gulp = require('gulp');

gulp.task('default', function() {
    // 将你的默认的任务代码放在这
});*/
/*
var elixir = require('laravel-elixir');
elixir(function(mix) {
    mix.less('app.less');
});*/
var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.browserify('app.js');
});

