<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN LAYOUT - FRONT PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('Assets/images/main_logo.png') ?>" type="image/x-icon"> <!-- Set to default tab icon -->
    <title><?= ($title) ?? "Vantrippers Travel & Tours" ?></title>

    <!-- CSS Libraries, Scripts -->
    <?= $this->renderSection('css_libraries') ?>
    <?= $this->renderSection('css') ?>
</head>
<body>
    <!-- Header section -->
    <?= $this->renderSection('header') ?>
    <!-- Main Content -->
    <?= $this->renderSection('section1') ?>
    <?= $this->renderSection('section2') ?>
    <?= $this->renderSection('section3') ?>
    <?= $this->renderSection('section4') ?>
    <?= $this->renderSection('section5') ?>
    <?= $this->renderSection('section6') ?>
    <?= $this->renderSection('section7') ?>
    <?= $this->renderSection('section8') ?>
    <?= $this->renderSection('section9') ?>
    <?= $this->renderSection('section10') ?>
    <!-- Footer section -->
    <?= $this->renderSection('footer') ?>

    <!-- Modals -->
    <?= $this->renderSection('modals') ?>

    <!-- JS Libraries, Scripts -->
    <?= $this->renderSection('js_libraries') ?>
    <?= $this->renderSection('js') ?>

    <!-- Common -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <!-- <script src="<?= base_url('Frontpage/js/pageConfig.js') ?>?v=<?= time() ?>"></script> --> <!-- disable page inspect, right click or keyboard shourcuts -->
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>