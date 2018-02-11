/**
 * Created by Administrator on 2018/2/5.
 */

var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.browserify('app.js');
});
