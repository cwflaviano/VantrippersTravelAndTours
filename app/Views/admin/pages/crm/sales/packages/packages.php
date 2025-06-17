<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/packages.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>



<!-- main content -->
<?= $this->section('main_content') ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Invoice Package Management</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Invoice Package Listing Table -->
                <div class="card">
                    <div class="card-header bg-dark">Invoice Package List</div>
                    <div class="card-body">
                        <!-- Create Button -->
                        <div class="mb-3">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus"></i> Add New Package
                            </button>
                        </div>
                        <table id="example1" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%;">
                            <thead class="bg-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Package Title</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Package Inclusion/Exclusion</th>
                                    <th>Package Full Details</th>
                                    <th>Price per Head</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data loaded via AJAX from server_package.php -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Listing Table -->
            </div>
        </section>
    </div>


<?= $this->endSection() ?>


<!-- modals -->
<?= $this->section('modals') ?>
    <?= $this->include('admin/partials/modals/packages_modals') ?>
<?= $this->endSection() ?>




<!-- js -->
<?= $this->section('js') ?>
    <script src="<?= base_url('js/admin/packages.js') ?>?v=<?= time() ?>"></script>

    <script>
        const fetch_data = "<?= base_url('/admin/crm/packages/fetch')?>"
        // const create = '< ?= base_url('/admin/crm/packages/create') ?>';
        // const edit = '< ?= base_url('/admin/crm/packages/edit') ?>';
        // const delete = '< ?= base_url('/admin/crm/packages/delete') ?>';

        // Handle flashdata for success/error messages 
        <?php if (session()->has('success')): ?>
            Swal.fire({
                title: 'Success!',
                text: '<?= session()->getFlashdata('success') ?>',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        <?php elseif (session()->has('error')): ?>
            Swal.fire({
                title: 'Error!',
                text: '<?= session()->getFlashdata('error') ?>',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    </script>
<?= $this->endSection() ?>