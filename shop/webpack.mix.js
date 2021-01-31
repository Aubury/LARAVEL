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

mix.js('resources/js/app.js','public/js').extract(['vue'])
    .js('node_modules/popper.js/dist/popper.js','public/js').sourceMaps()
    .js( 'node_modules/cropperjs/dist/cropper.js','public/js').sourceMaps()
    .js('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js', 'public/js').sourceMaps()
    .js('node_modules/tinymce/tinymce.js','public/js').sourceMaps()
    // .js('node_modules/vue/dist/vue.js','public/js').sourceMaps()

    .scripts([
        'resources/js/main.js',
        'resources/js/exchange.js',
    ], 'public/js/main_page.js')

    .scripts([
        'resources/js/admin.js',
        'resources/js/products.js'
    ], 'public/js/admin.js')
    .scripts([
        'resources/js/image.js',
    ], 'public/js/image.js')
    .scripts([
        'resources/js/registerAdmin.js',
    ], 'public/js/registerAdmin.js')

    .styles([
        'resources/css/reset.css',
        'resources/css/app.css',
        // 'resources/css/forms.css',
        // 'resources/css/main.css',
    ], 'public/css/all.css')
    .sass('resources/sass/app.scss', 'public/css')
;
