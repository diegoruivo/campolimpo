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
    // Assets Web
    .sass('resources/views/web/assets/css/font-awesome.min.css', 'public/frontend/assets/css/font-awesome.min.css')

    .styles([
        'resources/views/web/assets/css/isotope/styles.css'
    ], 'public/frontend/assets/css/isotope/styles.css')

    .sass('resources/views/web/assets/css/animate.min.css', 'public/frontend/assets/css/animate.min.css')
    .sass('resources/views/web/assets/css/bootstrap.min.css', 'public/frontend/assets/css/bootstrap.min.css')
    .sass('resources/views/web/assets/css/carousel.css', 'public/frontend/assets/css/carousel.css')
    .sass('resources/views/web/assets/css/responsive.css', 'public/frontend/assets/css/responsive.css')

    // .scripts([
    //     'resources/views/web/assets/js/jquery-1.12.3.min.js',
    //     'resources/views/web/assets/js/waypoints.min.js',
    //     'resources/views/web/assets/js/jquery.counterup.min.js',
    //     'resources/views/web/assets/js/gmaps.min.js',
    //     'resources/views/web/assets/js/isotope/min/scripts-min.js',
    //     'resources/views/web/assets/js/isotope/cells-by-row.js',
    //     'resources/views/web/assets/js/isotope/isotope.pkgd.min.js',
    //     'resources/views/web/assets/js/isotope/packery-mode.pkgd.min.js',
    //     'resources/views/web/assets/js/isotope/scripts.js',
    //     'resources/views/web/assets/js/backtotop.js',
    //     'resources/views/web/assets/js/jquery.localScroll.min.js',
    //     'resources/views/web/assets/js/jquery.scrollTo.min.js',
    //     'resources/views/web/assets/js/wow.min.js',
    //     'resources/views/web/assets/js/assets/js/bootstrap.min.js',
    //     'resources/views/web/assets/js/assets/js/main.js'
    // ], 'public/frontend/assets/js/scripts.js')


    // Assets Admin
    .sass('resources/views/admin/assets/scss/reset.scss', 'public/backend/assets/css/reset.css')
    .sass('resources/views/admin/assets/scss/boot.scss', 'public/backend/assets/css/boot.css')
    .sass('resources/views/admin/assets/scss/login.scss', 'public/backend/assets/css/login.css')
    .sass('resources/views/admin/assets/scss/style.scss', 'public/backend/assets/css/style.css')

    .styles([
        'resources/views/admin/assets/js/datatables/css/jquery.dataTables.min.css',
        'resources/views/admin/assets/js/datatables/css/responsive.dataTables.min.css',
        'resources/views/admin/assets/js/select2/css/select2.min.css'
    ], 'public/backend/assets/css/libs.css')


    .scripts([
        'resources/views/admin/assets/js/jquery.min.js'
    ], 'public/backend/assets/js/jquery.js')

    .scripts([
        'resources/views/admin/assets/js/login.js'
    ], 'public/backend/assets/js/login.js')

    .scripts([
        'resources/views/admin/assets/js/datatables/js/jquery.dataTables.min.js',
        'resources/views/admin/assets/js/datatables/js/dataTables.responsive.min.js',
        'resources/views/admin/assets/js/select2/js/select2.min.js',
        'resources/views/admin/assets/js/select2/js/i18n/pt-BR.js',
        'resources/views/admin/assets/js/jquery.form.js',
        'resources/views/admin/assets/js/jquery.mask.js',
    ], 'public/backend/assets/js/libs.js')

    .scripts([
        'resources/views/admin/assets/js/scripts.js'
    ], 'public/backend/assets/js/scripts.js')

    .copyDirectory('resources/views/admin/assets/js/datatables', 'public/backend/assets/js/datatables')
    .copyDirectory('resources/views/admin/assets/js/select2', 'public/backend/assets/js/select2')
    .copyDirectory('resources/views/admin/assets/js/tinymce', 'public/backend/assets/js/tinymce')


    .copyDirectory('resources/views/admin/assets/css/fonts', 'public/backend/assets/css/fonts')
    .copyDirectory('resources/views/admin/assets/images', 'public/backend/assets/images')

    .options({
        processCssUrls: false
    })

    .version()

;