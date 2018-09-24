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
   .sass('resources/sass/app.scss', 'public/css');

mix
    //--- SweetAlert2
    .copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js',   'public/vendor/sweetalert2')
    .copy('node_modules/sweetalert2/dist/sweetalert2.min.css',      'public/vendor/sweetalert2')
;