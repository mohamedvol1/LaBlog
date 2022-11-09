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

mix.webpackConfig({
	resolve: {
		fallback: {
			https: require.resolve('https-browserify'),
			http: require.resolve('stream-http'),
			stream: require.resolve('stream-browserify'),
			zlib: require.resolve('zlib-browserify')
		}
	},
  stats: {
    children: true,
},
});

mix
	.js('resources/js/app.js', 'public/js')
	.postCss('resources/css/app.css', 'public/css', [
		require('postcss-import'),
		require('tailwindcss'),
		require('postcss-nested'),
		require('autoprefixer')
	]);

if (mix.inProduction()) {
	mix.version();
}
