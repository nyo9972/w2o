const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .less('node_modules/bootstrap/less/bootstrap.less', 'public/site/bootstrap.css')

    .scripts('node_modules/jquery/dist/jquery.js', 'public/site/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.js', 'public/site/bootstrap.js')
