<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/search_accommodation.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>




<?= $this->section('main_content') ?>
<!-- not yet migrated -->
<?= $this->endSection() ?>

<?= $this->section('modals') ?>
    <?= $this->include('admin/pages/accommodation/search_accommodation_modal')?>
<?= $this->endSection() ?>





<?= $this->section('js') ?>
    <script src="<?= base_url('js/admin/search_accommodation.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('js/admin/search_list_view.js') ?>?v=<?= time() ?>"></script>
<?= $this->endSection() ?>


