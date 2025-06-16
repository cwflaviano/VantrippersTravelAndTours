<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('css/admin/list_accommodation.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>



<!--  main content  -->
<?= $this->section('main_content') ?>
<!-- content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Accommodation Management</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Accommodation Listing Table -->
                <div class="card">
                    <div class="card-header bg-dark">Accommodation List</div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%;">
                            <thead class="bg-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Place</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Description</th>
                                    <th>Remarks</th>
                                    <th>FB</th>
                                    <th>Hotel Name</th>
                                    <th>Room Type</th>
                                    <th>Total Rate</th>
                                    <th>Per Head</th>
                                    <th>Capacity</th>
                                    <th>Star Rating</th>
                                    <th>Pet Friendly</th>
                                    <th>Breakfast</th>
                                    <th>Pool</th>
                                    <th>Elevator</th>
                                    <th>Function Hall</th>
                                    <th>Beach Front</th>
                                    <th>Distance From</th>
                                    <th>Distance Location</th>
                                    <th>Area</th>
                                    <th>Pin Location</th>
                                    <th>Can Accommodate w/o extra bed</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data loaded via AJAX from server_processing.php -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Listing Table -->
            </div>
        </section>
    </div>
<?= $this->endSection() ?>


<!-- Modals -->
<?= $this->include('admin/pages/accommodation/list_accommodation_modals') ?>

<!-- js -->
<?= $this->section('js') ?>
    <script src="<?= base_url('js/admin/list_accommodation.js')?>?v=<?= time() ?>"></script>
<?= $this->endSection() ?>