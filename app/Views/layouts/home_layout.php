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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Good+Dog&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('css/front_page.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css') ?>?v=<?= time() ?>">
    
    <!-- render page specific css libraries and css files-->
    <?= $this->renderSection('css_libraries') ?>
    <?= $this->renderSection(sectionName: 'css') ?>
</head>
<body>  
    <!-- render header -->
    <?= $this->include('home/partials/header') ?> <!-- included header -->
    <!-- Render main content -->
    <?= $this->renderSection('main_content') ?> <!-- *in case of using this layout because of diffrent header and footer -->
    <!-- render footer -->
    <?= $this->include('home/partials/footer') ?> <!-- included footer -->
    <!-- render modals -->
    <?= $this->renderSection('modals') ?>

    <!-- Global js libraries and custom js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script src="<?= base_url('js/script.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('js/load_packages.js') ?>?v=<?= time() ?>"></script>

    <!-- render page specific js libraries and files -->
    <?= $this->renderSection('js_libraries') ?>
    <?= $this->renderSection('js') ?>

    <!-- Global Script  -->
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>