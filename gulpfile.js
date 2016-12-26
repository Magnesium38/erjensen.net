process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');
require('laravel-elixir-vue-2');

elixir(function (mix) {
    mix.webpack('app.js');
});