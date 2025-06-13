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
                        <a href="<?= base_url('/admin/user-management') ?>" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back to list</a>
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
                                Edit User
                            </div>
                            <div class="card-body">
                                <h2 class="mb-3"> <i class="fas fa-user"></i> Edit User Information
                                </h2>
                                <form id="editUserForm" action="<?= base_url('/admin/user-management/edit/'.$user['id']) ?>" method="post" enctype="multipart/form-data">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <?php $profileImage = $user['profile_picture'] ?? base_url('images/user.png'); ?>
                                        <img id="profilePicture" src="<?= base_url($profileImage) ?>" class="rounded-circle mb-3" alt="Profile Picture">
                                        <input type="file" id="imageInput" name="profile_picture" accept="image/*">
                                    </div>

                                    <input type="hidden" name="id" value="<?= esc($user['id']) ?>">

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="emp_id">Employee ID</label>
                                            <input type="text" class="form-control" name="emp_id" value="<?= esc($user['emp_id']) ?>" readonly>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name" value="<?= esc($user['first_name']) ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="middle_name" value="<?= esc($user['middle_name']) ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name" value="<?= esc($user['last_name']) ?>">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Gender</label>
                                            <input type="text" class="form-control" name="gender" value="<?= esc($user['gender']) ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="birthdate" value="<?= esc($user['birthdate']) ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Contact</label>
                                            <input type="text" class="form-control" name="contact" value="<?= esc($user['contact']) ?>">
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="<?= esc($user['address']) ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= esc($user['email']) ?>">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Position</label>
                                            <input type="text" class="form-control" name="position" value="<?= esc($user['position']) ?>">
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>



                                        <div class="col-md-6 mb-3">
                                            <label>Type of Contract</label>
                                            <select class="form-control" name="type_of_contract">
                                                <option value="Full-Time" <?= ($user['type_of_contract'] == 'Full-Time') ? 'selected' : '' ?>>Full-Time</option>
                                                <option value="Part-Time" <?= ($user['type_of_contract'] == 'Part-Time') ? 'selected' : '' ?>>Part-Time</option>
                                                <option value="Contractual" <?= ($user['type_of_contract'] == 'Contractual') ? 'selected' : '' ?>>Contractual</option>
                                                <option value="Intern" <?= ($user['type_of_contract'] == 'Intern') ? 'selected' : '' ?>>Intern</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Date of Joining</label>
                                            <input type="date" class="form-control" name="date_of_joining" value="<?= esc($user['date_of_joining']) ?>">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Department</label>
                                            <select class="form-control" name="department_id">
                                                <?php foreach ($departments as $dept): ?>
                                                    <option value="<?= $dept['id'] ?>" <?= $user['department_id'] == $dept['id'] ? 'selected' : '' ?>><?= esc($dept['name']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Role</label>
                                            <select class="form-control" name="role_id">
                                                <?php foreach ($roles as $role): ?>
                                                    <option value="<?= $role['id'] ?>" <?= $user['role_id'] == $role['id'] ? 'selected' : '' ?>><?= esc($role['name']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" <?= $user['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                                <option value="0" <?= $user['status'] == 0 ? 'selected' : '' ?>>Pending</option>
                                                <option value="2" <?= $user['status'] == 2 ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success float-right">
                                                <i class="fas fa-save"></i> Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>



<!-- Modals -->
<?= $this->section('modals') ?>
<!-- Modal includes should be place here -->
<?= $this->endSection() ?>



<!-- js -->
<?= $this->section('css') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script> 
        const submition_url = "<?= base_url('/admin/user-management/edit') ?>?v=<?= time() ?>";
    </script>
    <script src="<?= base_url('js/admin/edit_user.js') ?>?v=<?= time() ?>"></script>
<?= $this->endSection() ?>  
