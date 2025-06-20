<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<!-- css -->
<?= $this->section('css') ?>
<!-- custom css for this page -->
<?= $this->endSection() ?>



<!-- main content -->
<?= $this->section('main_content') ?>
    <!-- error and sucess modal notification -->
    <?php if (session()->has('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?= session()->getFlashdata('success'); ?>'
            });
        </script>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '<?= session()->getFlashdata('error'); ?>'
            });
        </script>
    <?php endif; ?>

    <!-- content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users Management</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h1>Users
                                    <br>
                                </h1>

                                <div class="row">
                                    <form method="GET" action="">
                                        <label for="filter">Filter Users:</label>
                                        <select style="border-radius: 10px; border-color:lightblue;" name="filter" id="filter" class="form-select btn-default-info btn-sm" onchange="this.form.submit()">
                                            <option disabled value="">Archives Filter</option>
                                            <option value="active" <?= ($filter == 'active') ? 'selected' : '' ?>>Active Users</option>
                                            <option value="archived" <?= ($filter == 'archived') ? 'selected' : '' ?>>Archived Users</option>
                                        </select>
                                    </form>

                                    <form class="ml-2" method="GET" action="">
                                        <select style="border-radius: 10px; border-color:lightblue;" name="status" id="status" class="form-select btn-default-info btn-sm" onchange="this.form.submit()">
                                            <option disabled value="">Status Filter</option>
                                            <option value="1" <?= ($statusFilter === 1) ? 'selected' : '' ?>>Active</option>
                                            <option value="0" <?= ($statusFilter === 0) ? 'selected' : '' ?>>Pending</option>
                                            <option value="2" <?= ($statusFilter === 2) ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                    </form>

                                    <form class="ml-2" method="GET" action="">
                                        <button style="border-radius: 10px;" type="submit" class="btn btn-outline-info btn-sm">Reset Filters</button>
                                    </form>
                                </div>

                                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#createUserModal">
                                    <i class="fas fa-user-plus"></i> Create User
                                </button>

                                <table id="example1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employee ID</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Position</th>
                                            <th>Contract Type</th>
                                            <th>Department Name</th>
                                            <th>Role Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($user['id']) ?></td>
                                                <td><?= htmlspecialchars($user['emp_id']) ?></td>
                                                <td><?= htmlspecialchars($user['first_name']) ?></td>
                                                <td><?= htmlspecialchars($user['middle_name']) ?></td>
                                                <td><?= htmlspecialchars($user['last_name']) ?></td>
                                                <td><?= htmlspecialchars($user['gender']) ?></td>
                                                <td><?= htmlspecialchars($user['email']) ?></td>
                                                <td><?= htmlspecialchars($user['contact']) ?></td>
                                                <td><?= htmlspecialchars($user['position']) ?></td>
                                                <td><?= htmlspecialchars($user['type_of_contract']) ?></td>
                                                <td style="font-weight:700" class="text-purple"><?= htmlspecialchars($user['department_name']) ?></td>
                                                <td style="font-weight:700" class="text-olive"><?= htmlspecialchars($user['role_name']) ?></td>
                                                <td>
                                                <?php
                                                    switch($user['status']) {
                                                        case 1: echo '<span class="badge badge-success">Active</span>'; break;
                                                        case 0: echo '<span class="badge badge-warning">Pending</span>'; break;
                                                        case 2: echo '<span class="badge badge-danger">Inactive</span>'; break;
                                                        default: echo '<span class="badge badge-secondary">Unknown</span>'; break; 
                                                    }
                                                ?>
                                                 <!-- getStatusBadge($user['status']) -->
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('/admin/user-management/view/' . $user['id']) ?>" class="btn btn-dark btn-sm"><i class="far fa-eye"></i> Show</a>
                                                    <a href="<?= base_url('/admin/user-management/edit/' . $user['id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
                                                    <?php if ($user['user_archived'] == 0): ?>
                                                        <a href="<?= base_url('/admin/user-management/archived/' . $user['id']) ?>" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-archive"></i> Archive
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('/admin/user-management/restore/' . $user['id']) ?>" class="btn btn-success btn-sm">
                                                            <i class="fas fa-undo"></i> Restore
                                                        </a>
                                                    <?php endif; ?>

                                                    <a href="<?= base_url('/admin/user-management/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm delete-user">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection() ?>

<!-- modals -->
<!-- Modal includes should be place here -->
<?= $this->section('modals') ?>
    <?= $this->include('admin/partials/modals/create_user_modal') ?>
<?= $this->endSection() ?>




<!-- js -->
<?= $this->section('js') ?>
    <script src="<?= base_url('js/admin/user.js') ?>?v=<?= time() ?>"></script>
    <script>
        const reload = "<?= base_url('/admin/user-management') ?>";
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "lengthMenu": [10, 25, 50, 100],
                "pageLength": 10,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); // Move buttons to the desired location
        });
    </script>
<?= $this->endSection() ?>