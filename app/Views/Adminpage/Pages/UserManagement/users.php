<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/admin_layout') ?>

<!-- HEAD TAG -->
    <!-- Title -->
    <?= $this->section('title') ?>
        <title>User Management</title>
    <?= $this->endSection() ?>
<!-- END OF HEAD TAG -->


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
    <!-- Session -->
    <?= $this->section('sessions')?>
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
    <?= $this->endSection() ?>

    <!-- Nav bar top -->
    <?= $this->section('navigation') ?>
        <?= view('Adminpage/Includes/top_nav') ?>
    <?= $this->endSection() ?>

    <!-- side bar / links / settings -->
    <?= $this->section('aside') ?>
        <?= view('Adminpage/Includes/aside_nav') ?>
    <?= $this->endSection() ?>


    <!-- PAGE CONTENTS -->
    <?= $this->section('contents') ?>
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Users Management</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Contents -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Users
                                </div>
                                <div class="card-body">
                                    <!-- FILTERS -->
                                    <div class="row">
                                        <!-- FILTER 1 -->
                                        <form method="GET" action="">
                                            <label for="filter">Filter Users:</label>
                                            <select style="border-radius: 10px; border-color:lightblue;" name="filter" id="filter" class="form-select btn-default-info btn-sm" onchange="this.form.submit()">
                                                <option disabled value="">Archives Filter</option>
                                                <option value="active" <?= ($filter == 'active') ? 'selected' : '' ?>>Active Users</option>
                                                <option value="archived" <?= ($filter == 'archived') ? 'selected' : '' ?>>Archived Users</option>
                                            </select>
                                        </form>
                                        
                                        <!-- FIlter 2 -->
                                        <form class="ml-2" method="GET" action="">
                                            <select style="border-radius: 10px; border-color:lightblue;" name="status" id="status" class="form-select btn-default-info btn-sm" onchange="this.form.submit()">
                                                <option disabled value="">Status Filter</option>
                                                <option value="1" <?= ($statusFilter === 1) ? 'selected' : '' ?>>Active</option>
                                                <option value="0" <?= ($statusFilter === 0) ? 'selected' : '' ?>>Pending</option>
                                                <option value="2" <?= ($statusFilter === 2) ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                        </form>
                                        <!-- RESET ALL FILTERS -->
                                        <form class="ml-2" method="GET" action="">
                                            <button style="border-radius: 10px;" type="submit" class="btn btn-outline-info btn-sm">Reset Filters</button>
                                        </form>
                                    </div>
                                    <br>

                                    <!-- CREATE NEW USER BUTTON -->
                                    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#createUserModal">
                                        <i class="fas fa-user-plus"></i> Create User
                                    </button>

                                    <!-- USERS TABLE DATA -->
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
                                                    <td><?= esc($user->id) ?></td>
                                                    <td><?= esc($user->emp_id) ?></td>
                                                    <td><?= esc($user->first_name) ?></td>
                                                    <td><?= esc($user->middle_name) ?></td>
                                                    <td><?= esc($user->last_name) ?></td>
                                                    <td><?= esc($user->gender) ?></td>
                                                    <td><?= esc($user->email) ?></td>
                                                    <td><?= esc($user->contact) ?></td>
                                                    <td><?= esc($user->position) ?></td>
                                                    <td><?= esc($user->type_of_contract) ?></td>
                                                    <td style="font-weight:700" class="text-purple"><?= esc($user->department_name) ?></td>
                                                    <td style="font-weight:700" class="text-olive"><?= esc($user->role_name) ?></td>
                                                    <td>
                                                        <?php 
                                                            switch($user->status) {
                                                                case 1:
                                                                    echo '<span class="badge badge-success">Active</span>';
                                                                    break;
                                                                case 0:
                                                                    echo '<span class="badge badge-warning">Pending</span>';
                                                                    break;
                                                                case 2:
                                                                    echo '<span class="badge badge-danger">Inactive</span>';
                                                                    break;
                                                                default:
                                                                    echo '<span class="badge badge-secondary">Unknown</span>';
                                                                    break;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('/admin/view_user/'.$user->id) ?>  " class="btn btn-dark btn-sm"><i class="far fa-eye"></i> Show</a>
                                                        <a href="edit_user.php?id=<?= $user->id ?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
                                                        <?php if ($user->user_archived == 0): ?>
                                                            <a href="<?= base_url('/admin/archived_user/'.$user->id) ?>" class="btn btn-warning btn-sm">
                                                                <i class="fas fa-archive"></i> Archive
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= base_url('/admin/restore_user/'.$user->id) ?>" class="btn btn-success btn-sm">
                                                                <i class="fas fa-undo"></i> Restore
                                                            </a>
                                                        <?php endif; ?>

                                                        <a href="<?= base_url('/admin/delete_user/'.$user->id) ?>" class="btn btn-danger btn-sm delete-user">
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

    <!-- footer -->
    <?= $this->section('footer') ?>
        <?= view('Adminpage/Includes/footer.php') ?>
    <?= $this->endSection() ?>

    
    <!-- MODALS -->                                                      
    <?= $this->section('modals') ?>
        <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Create User Form -->
                        <form id="createUserForm" action="<?= base_url('/admin/create_user') ?>" method="POST" enctype="multipart/form-data">
                            <div class="d-flex flex-column align-items-center text-center">
                                <?php
                                // Use a default image for new users since no profile picture exists yet.
                                $defaultImage = base_url('Assets/images/user.png');
                                ?>
                                <img id="profilePicture" src="<?= esc($defaultImage) ?>" class="rounded-circle mb-3" alt="Profile Picture">
                                <input type="file" id="imageInput" name="profile_picture" accept="image/*">
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="emp_id">Employee ID</label>
                                    <input type="text" class="form-control" name="emp_id" placeholder="Auto Generated" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="birthdate" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Age</label>
                                    <input type="number" class="form-control" name="age" placeholder="Enter Age" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Position</label>
                                    <input type="text" class="form-control" name="position" placeholder="Enter Position" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Enter Contact Number" required>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" value="User1234" name="password" placeholder="Enter Password" required id="passwordField">

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()" id="toggleBtn">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Type of Contract</label>
                                    <select class="form-control" name="type_of_contract" required>
                                        <option value="">Select Contract Type</option>
                                        <option value="Full-Time">Full-Time</option>
                                        <option value="Part-Time">Part-Time</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Intern">Intern</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Date of Joining</label>
                                    <input type="date" class="form-control" name="date_of_joining" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Department</label>
                                    <select class="form-control" name="department_id" required>
                                        <option value="" disabled>Select Department</option>
                                        <?php foreach ($departments as $dept): ?>
                                            <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Role</label>
                                    <select class="form-control" name="role_id" required>
                                        <option value="" disabled>Select Role</option>
                                        <?php foreach ($roles as $role): ?>
                                            <option value="<?= $role['id'] ?>"><?= htmlspecialchars($role['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Pending</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-success float-right">
                                        <i class="fas fa-save"></i> Save User
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- End of Create User Form -->
                    </div>
                </div>
            </div>
        </div>
    <?= $this->endSection() ?>
<!-- END OF MAIN CONTENT -->


    <!-- Library / imports / js -->
    <?= $this->section('js_libraries') ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>                               
    <?= $this->endSection() ?>

    <!-- script -->
    <?= $this->section('scripts') ?>
        <script>        
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

            // for sweet alert modals
             window.flashData = {
                status: "<?= session()->has('success') ? 'success' : (session()->has('error') ? 'error' : '') ?>",
                message: "<?= esc(session()->getFlashdata('success') ?? session()->getFlashdata('error')) ?>"
            };
            window.flashData = {
                status: "<?= session()->has('delete') ? : 'delete'?>";
                message: "<?= esc(session()->getFlashdata('delete') ?? session()->getFlashdata('delete')) ?>"
            }
        </script>

        <script src="<?= base_url('Adminpage/js/users_management.js') ?>?v=<?= time() ?>"></script>
    <?= $this->endSection() ?>

   

