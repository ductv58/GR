let mix = require('laravel-mix');

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

mix.js('resources/assets/js/homepage/app.js', 'public/homepage/js').version()
    .sass('resources/assets/sass/homepage/app.scss', 'public/homepage/css').version()
    .sass('resources/assets/sass/admin/app.scss', 'public/admin/css').version();
