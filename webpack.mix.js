// noinspection JSAnnotator
const {mix} = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 | > npm run production
 */

/*
 * System Stuff
 */
mix.copy('resources/assets/system/.htaccess', 'public/.htaccess');
mix.copy('resources/assets/system/index.php', 'public/index.php');
mix.copy('resources/assets/system/robots.txt', 'public/robots.txt');

/*
 * Voyager
 */
mix.copyDirectory('resources/assets/vendor/tcg', 'public/vendor/tcg');


/*
 * Welcome Page
 */
mix.scripts([
        'resources/assets/vendor/js/jquery-2.1.1.min.js',
        'resources/assets/vendor/js/skrollr.js'
    ],
    'public/js/welcome-vendor.js'
);
mix.js('resources/assets/js/welcome.js', 'public/js/welcome-app.js');
mix.sass('resources/assets/sass/welcome.scss', 'public/css/welcome-style.css');
mix.copy('resources/assets/misc/iosifv.vcf', 'public/assets/iosifv.vcf');

/*
 * CV Page
 */
mix.copy('resources/assets/css/cv.css', 'public/css/cv-style.css');

mix.copy('resources/assets/vendor/css/animate.css', 'public/css/vendor-animate.css');
mix.copy('resources/assets/vendor/css/bootstrap-v3.3.6.min.css', 'public/css/vendor-bootstrap-v3.3.min.css');
mix.copy('resources/assets/vendor/js/cv/jquery.min.js', 'public/js/cv-vendor-jquery.js');

mix.copy('resources/assets/vendor/js/cv/jquery.lettering.js', 'public/js/cv-vendor-jq-lettering.js');
mix.copy('resources/assets/vendor/js/cv/jquery.textillate.js', 'public/js/cv-vendor-jq-textillate.js');
mix.copy('resources/assets/vendor/js/cv/smoothscroll.js', 'public/js/cv-vendor-smoothscroll.js');

mix.js('resources/assets/js/cv.js', 'public/js/cv-app.js');

// Scss/Sass
mix.sass('resources/assets/sass/iosifv-style.scss', 'public/css/iosifv-style.css');

// Images
mix.copyDirectory('resources/assets/images', 'public/assets/images');

// Fonts
mix.copy('resources/assets/vendor/fontawesome-free/css/all.css', 'public/vendor/fontawesome-free/css/all.css');
mix.copyDirectory('resources/assets/vendor/fontawesome-free/webfonts', 'public/vendor/fontawesome-free/webfonts');

mix.copy(         'resources/assets/vendor/css/ionicons.min.css', 'public/vendor/ionicons/css/ionicons.min.css');
mix.copyDirectory('resources/assets/vendor/fonts', 'public/vendor/ionicons/fonts');

// Materialize
mix.
mix.copyDirectory('resources/assets/vendor/materialize-css', 'public/materialize-css');
