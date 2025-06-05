<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN LAYOUT FOR ADMIN PANEL --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DEFAULT IMPORTS / LIBRARIES / CSS LINKS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha384-2aZ3Q0N2xJY6D/FwFEIVWVlH76zHTAeMv6/6XlVWkwnb3nVbs1Fq0dMnh2ImE4Uk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('Assets/plugins/fontawesome-free/css/all.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/jqvmap/jqvmap.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/dist/css/adminlte.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/daterangepicker/daterangepicker.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/summernote/summernote-bs4.min.css') ?>?v=<?= time() ?>">

    <link rel="stylesheet" href="<?= base_url('Assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Assets/dist/css/adminlte.min.css')?>?v=<?= time() ?>">
    
    <link rel="stylesheet" href="<?= base_url('Adminpage/css/all.css') ?>">
    <!-- END OF DEFAULT IMPORTS / LIBRARIES / CSS LINKS -->



    <!-- CSS Libraries, Scripts -->
    <?= $this->renderSection('css_libraries') ?>
    <?= $this->renderSection('css') ?>

    <!-- Tab Icon -->
    <?php if(trim($this->renderSection('tab_icon')) !== '') : ?>
        <?= $this->renderSection('tab_icon') ?> 
    <?php else :?>
        <link rel="shortcut icon" href="<?= base_url('Assets/images/main_logo.png') ?>" type="image/x-icon"> <!-- Set to default tab icon -->
    <?php endif; ?>


    <!-- Title -->
    <?= $this->renderSection('title') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?= $this->renderSection('sessions') ?>

    <!-- MAIN Content -->
    <div class="wrapper">
        <!-- navigation -->
        <?= $this->renderSection('navigation')?>

        <?= $this->renderSection('aside') ?>
        <!-- page content -->
        <?=$this->renderSection('contents')?>
    </div>
    

    <!-- footer  -->
    <?= $this->renderSection('footer') ?>
    <!-- Modals -->
    <?= $this->renderSection('modals') ?>


    <!-- JS Libraries, Scripts -->
    <?= $this->renderSection('js_libraries') ?>
    <?= $this->renderSection('js') ?>
    <?= $this->renderSection('scripts') ?>



    <!-- DEFAULT IMPORTS / LIBRARIES / JS LINKS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src=" <?= base_url('Assets/plugins/jquery/jquery.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/jquery-ui/jquery-ui.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/chart.js/Chart.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/sparklines/sparkline.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/jqvmap/jquery.vmap.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/jquery-knob/jquery.knob.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/moment/moment.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/daterangepicker/daterangepicker.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/summernote/summernote-bs4.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/dist/js/adminlte.js') ?>?v=<?= time() ?>"></script>
    <script src=" <?= base_url('Assets/dist/js/pages/dashboard.js') ?>?v=<?= time() ?>"></script>

    <!-- datatables js -->
    <script src="<?= base_url('Assets/plugins/datatables/jquery.dataTables.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/jszip/jszip.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/pdfmake/pdfmake.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/pdfmake/vfs_fonts.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>?v=<?= time() ?>"></script>


    <Script src="<?= base_url('Admin/js/all.js') ?>"></Script>
    <script> $.widget.bridge('uibutton', $.ui.button)</script>
    <!-- END OF DEFAULT IMPORTS / LIBRARIES / JS LINKS -->
     <script>
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
                }, 100); // Delay to sync with sidebar animation
            });
        });
         $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "lengthMenu": [10, 25, 50, 100],
            "pageLength": 10,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); // Move buttons to the desired location
    });
    </script>
</body>
</html>