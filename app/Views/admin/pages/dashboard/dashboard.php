<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/dashboard.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>




<?= $this->section('main_content') ?>
    <div class="content-wrapper dashboard">
        <div class="content-header">
            <div class="top d-flex justify-content-between">
                <h1>Dashboard</h1>

                <div class="btn">
                    <button>
                        <i class="fa-solid fa-gear"></i>
                    </button>
                    <button>
                        Create a report
                    </button>
                    <button>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="content mt-1">
                <div class="upcoming-schedule card">
                    <h5>Upcoming Schedule</h5>
                </div>

                <div class="group-container">
                    <div class="group">
                        <div class="total-deals card">
                            <h5>Total Deals</h5>
                        </div>

                        <div class="map card">
                            <h5>map</h5>
                        </div>

                        <div class="visa card">
                            <h5>visa</h5>
                        </div>
                    </div>

                    <div class="group">
                        <div class="payroll-expenses-breakdown card">
                            <h5>Payroll Expenses Breakdown</h5>
                        </div>

                        <div class="recent-sells card">
                            <div class="group d-flex justify-content-between">
                                <h5>Recent Sells</h5>
                                <input type="search" name="" id="" placeholder="Search...">
                                <button>Sort by <i class="fa-solid fa-chevron-down"></i></button>
                            </div>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Header 1</th>
                                        <th>Header 2</th>
                                        <th>Header 3</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                    </tr>
                                    <tr>
                                        <td>Data 4</td>
                                        <td>Data 5</td>
                                        <td>Data 6</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>



<?= $this->section('modals') ?>
<!-- Modal includes should be place here -->
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<?= $this->endSection() ?>