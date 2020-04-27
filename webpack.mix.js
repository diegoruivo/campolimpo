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

// Assets Admin2
     .styles([
        'resources/views/admin/assets/plugins/fontawesome-free/css/all.min.css',
        'resources/views/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
        'resources/views/admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
        'resources/views/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',

        'resources/views/admin/assets/plugins/select2/css/select2.min.css',
        'resources/views/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',

        'resources/views/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'resources/views/admin/assets/plugins/jqvmap/jqvmap.min.css',
        'resources/views/admin/assets/dist/css/adminlte.min.css',
        'resources/views/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'resources/views/admin/assets/plugins/daterangepicker/daterangepicker.css',
        'resources/views/admin/assets/plugins/summernote/summernote-bs4.css',
        'resources/views/admin/assets/plugins/sweetalert2/sweetalert2.min.css',
        'resources/views/admin/assets/plugins/toastr/toastr.min.css'
    ], 'public/backend/assets/css/libs.css')


    .scripts([
        'resources/views/admin/assets/plugins/jquery/jquery.min.js',
        'resources/views/admin/assets/plugins/jquery-ui/jquery-ui.min.js',
        'resources/views/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js',

        'resources/views/admin/assets/plugins/select2/js/select2.full.min.js',
        'resources/views/admin/assets/plugins/moment/moment.min.js',
        'resources/views/admin/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js',

        'resources/views/admin/assets/plugins/sparklines/sparkline.js',
        'resources/views/admin/assets/plugins/jquery-knob/jquery.knob.min.js',
        'resources/views/admin/assets/plugins/moment/moment.min.js',
        'resources/views/admin/assets/plugins/daterangepicker/daterangepicker.js',
        'resources/views/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        'resources/views/admin/assets/plugins/summernote/summernote-bs4.min.js',
        'resources/views/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'resources/views/admin/assets/dist/js/adminlte.js',
        'resources/views/admin/assets/dist/js/pages/dashboard.js',
        'resources/views/admin/assets/dist/js/demo.js',
    ], 'public/backend/assets/js/libs.js')

    .scripts([
        'resources/views/admin/assets/plugins/datatables/jquery.dataTables.min.js',
        'resources/views/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
        'resources/views/admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js',
        'resources/views/admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    ], 'public/backend/assets/js/libs_table.js')


    // .scripts([
    //     'resources/views/admin/assets/plugins/moment/moment.min.js',
    //     'resources/views/admin/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js'
    // ], 'public/backend/assets/js/inputmask.js')


    .sass('resources/views/admin/assets/scss/login.scss', 'public/backend/assets/css/login.css')
    .sass('resources/views/admin/assets/scss/style.scss', 'public/backend/assets/css/style.css')

    // .scripts([
    //     'resources/views/admin/assets/js/jquery.min.js'
    // ], 'public/backend/assets/js/jquery.js')

    .scripts([
        'resources/views/admin/assets/js/login.js'
    ], 'public/backend/assets/js/login.js')

    // .scripts([
    //     'resources/views/admin/assets/js/jquery.form.js',
    // ], 'public/backend/assets/js/libs_up.js')

    .scripts([
        'resources/views/admin/assets/js/scripts.js'
    ], 'public/backend/assets/js/scripts.js')

    .copyDirectory('resources/views/admin/assets/scss', 'public/backend/assets/scss')
    .copyDirectory('resources/views/admin/assets/js', 'public/backend/assets/js')



    .copyDirectory('resources/views/admin/assets/plugins/fontawesome-free/css', 'public/backend/assets/plugins/fontawesome-free/css')
    .copyDirectory('resources/views/admin/assets/plugins/tempusdominus-bootstrap-4/css', 'public/backend/assets/plugins/tempusdominus-bootstrap-4/css')
    .copyDirectory('resources/views/admin/assets/plugins/icheck-bootstrap', 'public/backend/assets/plugins/icheck-bootstrap')
    .copyDirectory('resources/views/admin/assets/plugins/jqvmap', 'public/backend/assets/plugins/jqvmap')
    .copyDirectory('resources/views/admin/assets/dist/css', 'public/backend/assets/dist/css')
    .copyDirectory('resources/views/admin/assets/plugins/overlayScrollbars/css', 'public/backend/assets/plugins/overlayScrollbars/css')
    .copyDirectory('resources/views/admin/assets/plugins/daterangepicker', 'public/backend/assets/plugins/daterangepicker')
    .copyDirectory('resources/views/admin/assets/plugins/summernote', 'public/backend/assets/plugins/summernote')


    .copyDirectory('resources/views/admin/assets/plugins/bootstrap/js', 'public/backend/assets/plugins/bootstrap/js')
    .copyDirectory('resources/views/admin/assets/plugins/sparklines', 'public/backend/assets/plugins/sparklines')
    .copyDirectory('resources/views/admin/assets/plugins/jqvmap', 'public/backend/assets/plugins/jqvmap')
    .copyDirectory('resources/views/admin/assets/plugins/jqvmap/maps', 'public/backend/assets/plugins/jqvmap/maps')
    .copyDirectory('resources/views/admin/assets/plugins/jquery-knob', 'public/backend/assets/plugins/jquery-knob')
    .copyDirectory('resources/views/admin/assets/plugins/moment', 'public/backend/assets/plugins/moment')
    .copyDirectory('resources/views/admin/assets/plugins/daterangepicker', 'public/backend/assets/plugins/daterangepicker')
    .copyDirectory('resources/views/admin/assets/plugins/tempusdominus-bootstrap-4/js', 'public/backend/assets/plugins/tempusdominus-bootstrap-4/js')
    .copyDirectory('resources/views/admin/assets/plugins/summernote', 'public/backend/assets/plugins/summernote')
    .copyDirectory('resources/views/admin/assets/plugins/overlayScrollbars/js', 'public/backend/assets/plugins/overlayScrollbars/js')
    .copyDirectory('resources/views/admin/assets/dist/js', 'public/backend/assets/dist/js')
    .copyDirectory('resources/views/admin/assets/dist/js/pages', 'public/backend/assets/dist/js/pages')
    .copyDirectory('resources/views/admin/assets/plugins/summernote', 'public/backend/assets/plugins/summernote')

    .copyDirectory('resources/views/admin/assets/plugins/select2/css', 'public/backend/assets/plugins/select2/css')
    .copyDirectory('resources/views/admin/assets/plugins/select2-bootstrap4-theme', 'public/backend/assets/plugins/select2-bootstrap4-theme')


    .copyDirectory('resources/views/admin/assets/plugins/select2/js', 'public/backend/assets/plugins/select2/js')
    .copyDirectory('resources/views/admin/assets/plugins/bootstrap4-duallistbox', 'public/backend/assets/plugins/bootstrap4-duallistbox')
    .copyDirectory('resources/views/admin/assets/plugins/moment', 'public/backend/assets/plugins/moment')
    .copyDirectory('resources/views/admin/assets/plugins/inputmask/min', 'public/backend/assets/plugins/inputmask/min')
    .copyDirectory('resources/views/admin/assets/plugins/daterangepicker', 'public/backend/assets/plugins/daterangepicker')
    .copyDirectory('resources/views/admin/assets/plugins/bootstrap-colorpicker/js', 'public/backend/assets/plugins/bootstrap-colorpicker/js')
    .copyDirectory('resources/views/admin/assets/plugins/tempusdominus-bootstrap-4/js', 'public/backend/assets/plugins/tempusdominus-bootstrap-4/js')
    .copyDirectory('resources/views/admin/assets/plugins/bootstrap-switch/js', 'public/backend/assets/plugins/bootstrap-switch/js')
    .copyDirectory('resources/views/admin/assets/plugins/sweetalert2', 'public/backend/assets/plugins/sweetalert2')
    .copyDirectory('resources/views/admin/assets/plugins/toastr', 'public/backend/assets/plugins/toastr')

    .copyDirectory('resources/views/admin/assets/plugins/datatables', 'public/backend/assets/plugins/datatables')
    .copyDirectory('resources/views/admin/assets/plugins/datatables-bs4/js', 'public/backend/assets/plugins/datatables-bs4/js')
    .copyDirectory('resources/views/admin/assets/plugins/datatables-responsive/js', 'public/backend/assets/plugins/datatables-responsive/js')
    .copyDirectory('resources/views/admin/assets/plugins/datatables-responsive/js', 'public/backend/assets/plugins/datatables-responsive/js')
    .copyDirectory('resources/views/admin/assets/plugins/datatables-bs4/css', 'public/backend/assets/plugins/datatables-bs4/css')
    .copyDirectory('resources/views/admin/assets/plugins/datatables-responsive/css', 'public/backend/assets/plugins/datatables-responsive/css')

    .options({
        processCssUrls: false
    })

    .version()

;