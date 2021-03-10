const mix = require('laravel-mix')
            require('@tinypixelco/laravel-mix-wp-blocks')
            require('laravel-mix-purgecss')
            require('laravel-mix-copy-watched')
            require('laravel-mix-tailwind-extract')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix.setPublicPath('./dist')
    .browserSync('employmentvegas.test');

mix.sass('resources/assets/styles/app.scss', 'styles')
    .sass('resources/assets/styles/editor.scss', 'styles')
    .purgeCss({
        keyframes: true,
        whitelistPatterns: [/has-[\w\d\-]*-color/, /has-[\w\d\-]*-font-size/],
    });

mix.js('resources/assets/scripts/app.js', 'scripts')
    .js('resources/assets/scripts/customizer.js', 'scripts')
    .blocks('resources/assets/scripts/editor.js', 'scripts')
    .extract();

mix.copyWatched('resources/assets/images', 'dist/images')
    .copyWatched('resources/assets/fonts', 'dist/fonts');

mix.autoload({
    jquery: ['$', 'window.jQuery'],
});

mix.options({
    processCssUrls: false,
    postCss: [
        require('tailwindcss')('./tailwind.config.js'),
    ],
    cssNano: {
        discardComments: {
            removeAll: true
        },
    }
});

mix.sourceMaps(false, 'source-map')
    .version();

mix.tailwindExtract();
