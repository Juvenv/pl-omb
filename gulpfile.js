const elixir = require('laravel-elixir');
const vueify = require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application.
 |
 */

 elixir((mix) => {
  // mix.styles(['../../../node_modules/bulma/bulma.sass'], 'public/css/styles.css');
  mix.sass([
    'app.sass',
    '../../../node_modules/bulma/bulma.sass'
  ], 'public/css/styles.css');

  mix.browserify('main.js');
});
