var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass("app.scss", 'public/assets/app.css');
});