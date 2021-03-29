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

mix
    .js('resources/js/home.js', 'public/js').vue({version:2}).sourceMaps()
    .js('resources/js/detail.js', 'public/js').vue({version:2}).sourceMaps()
    .js('resources/js/app.js', 'public/js').vue({version:2}).sourceMaps()
    .js('resources/js/dashboard.js', 'public/js').vue({version:2}).sourceMaps()
    .js('resources/js/checkout.js', 'public/js').vue({version:2}).sourceMaps()
    .js('resources/js/success.js', 'public/js').vue({ version: 2 }).sourceMaps()
    .js('resources/js/statistics.js', 'public/js').vue({ version: 2 }).sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')

    // nostro file di stile
    .sass('resources/sass/style.scss', 'public/css')
    .options({processCssUrls: false});
    // .mjml('resources/mail', 'resources/views/mail'['.blade.php']);
