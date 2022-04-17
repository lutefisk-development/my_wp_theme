/*
 * Laravel Mix
 *
 * https://laravel-mix.com/
 */

const webpack = require( 'webpack' );
let mix = require('laravel-mix');
//require( 'laravel-mix-modernizr' );
require( 'laravel-mix-copy-watched' );

mix.js('assets/src/scripts/app.js', 'assets/dist/js')
   .sass('assets/src/sass/style.scss', 'assets/dist/css')
   .setPublicPath('./assets/dist')
   .sourceMaps()
   .autoload({
     jquery: ['$', 'window.jquery', 'jQuery']
   })
   .options({
     processCssUrls: false
   });

mix.setResourceRoot( '../' );

mix.webpackConfig({
	plugins: [
		new webpack.ProgressPlugin( ( percentage, message ) => {
			if ( 0 === percentage * 100 % 5 ) {
				console.log( `${( percentage * 100 ).toFixed()}% ${message}` );
			}
		})
	]
});