// webpack.mix.js

let mix = require('laravel-mix');
require( 'laravel-mix-modernizr' );
require( 'laravel-mix-copy-watched' );

mix.js('assets/src/scripts/app.js', 'assets/dist/js').modernizr()
   .sass('assets/src/sass/style.scss', 'assets/dist/css')
   .setPublicPath('./assets/dist')
   .sourceMaps()
   .autoload({
     jquery: ['$', 'window.jquery', 'jQuery']
   })
   .options({
     processCssUrls: false
   });