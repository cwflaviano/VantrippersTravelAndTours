<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/terms.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>




<?= $this->section('main_content') ?>
<?= $this->endSection() ?>


<?= $this->section('modals') ?>
    <?= $this->include("")?>
<?= $this->endSection() ?>




<?= $this->section('js') ?>
<?= $this->endSection() ?>
