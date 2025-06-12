<?php /** @var CodeIgniter\View\View $this */?>

<!-- Use this layout if header or footer has different header or footer partials -->
<!-- main layout -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('images/main_logo.png') ?>?v=<?= time() ?>" type="image/x-icon">
    <!-- title : default -->
    <title><?= $title ?? "Administrator Page" ?></title>

    <!-- Global css libraries and custom css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha384-2aZ3Q0N2xJY6D/FwFEIVWVlH76zHTAeMv6/6XlVWkwnb3nVbs1Fq0dMnh2ImE4Uk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- GLOBAL CUSTOM CSS -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/jqvmap/jqvmap.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>?v=<? time() ?>">

    <link rel="stylesheet" href="<?= base_url('css/admin/sidebar.css') ?>?v=<? time() ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin/all.css') ?>?v=<? time() ?>">

    <!-- render css libraries and css files-->
    <?= $this->renderSection('css_libraries') ?>
    <?= $this->renderSection('css') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed w-100 d-flex">
    <div class="wrapper w-100">
        <!-- render page header -->
        <?= $this->include('admin/partials/page_header') ?>
        <!-- render page side navbar -->
        <?= $this->include('admin/partials/side_nav') ?>

        <!-- Render main content -->
        <?= $this->renderSection('main_content') ?> <!-- *in case of using this layout because of diffrent header and footer -->

        <!-- render page footer -->
        <?= $this->include('admin/partials/page_footer') ?>
    </div>

    <!-- render modals -->
    <?= $this->renderSection('modals') ?>

    
    <!-- Global js libraries and custom js -->
    <!-- <?= base_url('') ?>?v=<? time() ?> -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>$.widget.bridge('uibutton', $.ui.button)</script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/chart.js/Chart.min.js"></script>
    <script src="../assets/plugins/sparklines/sparkline.js"></script>
    <script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="../assets/plugins/moment/moment.min.js"></script>
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../assets/dist/js/adminlte.js"></script>
    <script src="../assets/dist/js/pages/dashboard.js"></script>
    
    <!-- render js libraries and files -->
    <?= $this->renderSection('js_libraries') ?>
    <?= $this->renderSection('js') ?>

    <script> 
        $.widget.bridge('uibutton', $.ui.button);

        $(document).ready(function() {
            $('.nav-link[data-widget="pushmenu"]').on('click', function() {
                setTimeout(() => {
                    if ($('body').hasClass('sidebar-collapse')) {
                        $('.logo-circle').hide();
                        $('.logo-responsive').show();
                    } else {
                        $('.logo-circle').show();
                        $('.logo-responsive').hide();
                    }
                }, 100);
            });
        });
    </script>
</body>
</html>