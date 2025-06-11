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
    <title><?= $title ?? "Vantripper Travel & Tours" ?></title>

    <!-- Global css libraries and custom css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- render page specific css libraries and css files-->
    <?= $this->renderSection('css_libraries') ?>
    <?= $this->renderSection(sectionName: 'css') ?>
</head>
<body>  
    <!-- render header -->
    <?= $this->renderSection('home/partials/header') ?> <!-- included header -->
    <!-- Render main content -->
    <?= $this->renderSection('main_content') ?> <!-- *in case of using this layout because of diffrent header and footer -->
    <!-- render footer -->
    <?= $this->renderSection('home/partials/footer') ?> <!-- included footer -->
    <!-- render modals -->
    <?= $this->renderSection('home/partials/login_modal') ?> <!-- included footer -->

    <!-- Global js libraries and custom js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- render page specific js libraries and files -->
    <?= $this->renderSection('js_libraries') ?>
    <?= $this->renderSection('js') ?>
</body>
</html>