const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/Mymain.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
// its used fot boostrap from an answer . it will add two files one is bootstrap.css and another is bootstrap.js
   mix
   .styles([
       './node_modules/bootstrap/dist/css/bootstrap.css',
       './node_modules/font-awesome/css/font-awesome.css'
   ], 'public/css/bootstrap.css')
   .js([
       './node_modules/jquery/dist/jquery.js',
       './node_modules/bootstrap/dist/js/bootstrap.js',
   ], 'public/js/bootstrap.js');
   // its used fot boostrap from an answer
