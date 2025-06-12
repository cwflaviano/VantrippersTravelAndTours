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
                <form id="createUserForm" action="<?= base_url('') ?>" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column align-items-center text-center">
                        <?php
                        // Use a default image for new users since no profile picture exists yet.
                        $defaultImage = base_url('images/user/png') ;
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