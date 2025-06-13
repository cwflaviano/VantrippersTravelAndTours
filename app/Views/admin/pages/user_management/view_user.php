<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<!-- css -->
<?= $this->section('css') ?>
<!-- custom css for this page -->
<?= $this->endSection() ?>




<?= $this->section('main_content') ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="<?= base_url('/admin/user-management') ?>" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Back to list</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                View Users
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="card mb-4 text-center">
                                            <div class="card-body">

                                                <div class="d-flex flex-column align-items-center text-center">
                                                <?php $profileImage =  $user['profile_picture'] ?? base_url('images/user.png'); ?>
                                                <img src="<?= base_url($profileImage) ?>" class="rounded-circle mb-3" alt="Profile Picture">

                                                    <h4 class="card-title text-bold"><?= esc($user['first_name'] . ' ' . $user['middle_name'] . ' ' . $user['last_name']); ?></h4>
                                                    <p> <?= esc($user['position']); ?></p>
                                                </div>

                                                <div class="stats-container mb-4">
                                                    <div class="row">
                                                        <div class="col">
                                                            <strong>Department Role</strong>
                                                            <p class="mb-0"><?= esc($user['department_name']); ?> Department</p>
                                                        </div>
                                                        <div class="col">
                                                            <strong>Role Name</strong>
                                                            <p class="mb-0"><?= esc($user['role_name']); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body ">
                                                <h5 class="card-title mb">Other Details</h5>
                                                <br>
                                                <br>
                                                <div class="mb-3">
                                                    <h6 class="text-bold">Date of Joining</h6>
                                                    <p><?= esc(date('F d, Y', strtotime($user['date_of_joining']))); ?></p>
                                                </div>

                                                <div class="mb-3">
                                                    <h6 class="text-bold">Type of Contract</h6>
                                                    <p><?= esc($user['type_of_contract']); ?></p>
                                                </div>
                                                <div class="mb-3">
                                                    <h6 class="text-bold">Account Status</h6>
                                                    <p>
                                                        <?php
                                                            switch ($user['status']) {
                                                                case 1: echo '<span class="badge badge-success">Active</span>'; break;                                                                   
                                                                case 0: echo '<span class="badge badge-warning">Pending</span>'; break;                                                                
                                                                case 2:echo '<span class="badge badge-danger">Inactive</span>';break;
                                                                default:echo '<span class="badge badge-secondary">Unknown</span>';break;
                                                            }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card ">
                                            <div class="card-header bg-light">
                                                Basic Information
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="emp_id" class="form-label">Employee ID </label>
                                                            <input type="text" class="form-control" value="<?= esc($user['emp_id']); ?>" id="emp_id" readonly>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="name" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" value="<?= esc($user['first_name']); ?>" id="first_name" readonly>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="middle_name" class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control" value="<?= esc($user['middle_name']); ?>" id="middle_name" readonly>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="last_name" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" value="<?= esc($user['last_name']); ?>" id="last_name" readonly>
                                                        </div>


                                                        <div class="col-12 mb-2">
                                                            <hr>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="gender" class="form-label">Gender</label>
                                                            <input type="gender" class="form-control" id="gender" value="<?= esc($user['gender']); ?>" readonly>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label for="birthdate" class="form-label">Date of Birth</label>
                                                            <input type="birthdate" class="form-control" id="birthdate" value="<?= esc(date('F d, Y', strtotime($user['birthdate']))); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="age" class="form-label">Age</label>
                                                            <input type="age" class="form-control" id="age" value="<?= esc((date('Y') - date('Y', strtotime($user['birthdate'])))); ?>" readonly>
                                                        </div>

                                                        <div class="col-12 mb-2">
                                                            <hr>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="address" class="form-label">Address</label>
                                                            <input type="address" class="form-control" id="address" value="<?= esc($user['address']); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label for="contact" class="form-label">Contact</label>
                                                            <input type="contact" class="form-control" id="contact" value="<?= esc($user['contact']); ?>" readonly>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" value="<?= esc($user['email']); ?>" readonly>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>



<!-- modals -->
<?= $this->section('modals') ?>
<!-- Modal includes should be place here -->
<?= $this->endSection() ?>



<!-- js -->
<?= $this->section('js') ?>
    <?= $this->include('admin/pages/user_management/cdn/cdn_js_users_management') ?>
    <script src="<?= base_url('js/admin/user.js') ?>?v=<?= time() ?>"></script>
    <script>const reload = "<?= base_url('/admin/user-management') ?>";</script>
<?= $this->endSection() ?>
