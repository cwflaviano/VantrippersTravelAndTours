<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/dashboard.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>




<?= $this->section('main_content') ?>
<?= $this->endSection() ?>




