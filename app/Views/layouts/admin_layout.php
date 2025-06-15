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
    <?= $this->include('admin/partials/cdn/cdn_css') ?>

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

    <!-- Globally Included Logout Modal -->
    <?= $this->include('admin/partials/logout_modal') ?>

    <!-- Global js libraries and custom js -->
    <?= $this->include('admin/partials/cdn/cdn_js') ?>

    
    <!-- render js libraries and files -->
    <?= $this->renderSection('js_libraries') ?>
    <?= $this->renderSection('js') ?>
    
    <script>$.widget.bridge('uibutton', $.ui.button)</script>
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
                }, 100);
            });
        });
    </script>
</body>
</html>