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
    .scripts([
        'resources/js/main.js',
        'resources/js/exchange.js',
    ], 'public/js/main_page.js')

    .scripts([
        'resources/js/admin.js',
    ], 'public/js/admin.js')
    .scripts([
        'resources/js/registerAdmin.js',
    ], 'public/js/registerAdmin.js')

    .styles([
        'resources/css/reset.css',
        'resources/css/app.css',
        // 'resources/css/forms.css',
        // 'resources/css/main.css',
    ], 'public/css/all.css')
    .sass('resources/sass/app.scss', 'public/css');
