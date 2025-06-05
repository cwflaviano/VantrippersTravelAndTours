<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- css scripts, cdn, imports -->
<?= $this->section('css_libraries') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('TimeTracker/css/admin-style.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/dashboard_admin.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?= $this->section('section1') ?>
    <div class="dashboard-layout">
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="<?= base_url('TimeTracker/images/main_logo.png')?>" alt="Van Trippers">
                <h1>ADMINISTRATOR</h1>
            </div>

            <div class="sidebar-title">Main</div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php <?= base_url('/timetracker/admin/dashboard') ?>" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            </ul>

            <div class="sidebar-title">Time Management</div>
            <ul class="sidebar-menu">
                <li><a href="<?= base_url('/timetracker/admin/import') ?>"><i class="fas fa-file-import"></i> Import Data</a></li>
                <li><a href="<?= base_url('/timetracker/admin/reports') ?>"><i class="fas fa-chart-bar"></i> Reports</a></li>
                <li><a href="<?= base_url('/timetracker/admin/export') ?>"><i class="fas fa-file-export"></i> Export</a></li>
            </ul>

            <div class="sidebar-title">Settings</div>
            <ul class="sidebar-menu">
                <li><a href="<?= base_url('/timetracker/admin/settings') ?>"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>

            <div class="sidebar-footer">
                <a href="#"><i class="fas fa-money-bill-alt"></i></a>
                <a href="#"><i class="fas fa-envelope"></i></a>
                <a href="#"><i class="fas fa-cog"></i></a>
                <a href="<?= base_url('/logout') ?>"><i class="fas fa-power-off"></i></a>
            </div>
        </div>

        <div class="main-content">
            <nav class="navbar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-info">
                    <div class="user-avatar">
                        <?= strtoupper(substr(session()->get('name'), 0, 1)) ?>
                    </div>
                    <span><?= session()->get('name') ?></span>
                    <a href="<?= base_url('/logout') ?>" class="btn-logout">Logout</a>
                </div>
            </nav>

            <div class="container">
                <div class="page-header">
                    <h2>Dashboard</h2>
                    <!-- <div>
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Employee</button>
                    </div> -->
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number"><?= count($employees) ?></div>
                        <div class="stat-label">Total Employees</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-number"><?= count(array_filter($todaySummary, function ($e) {
                                                        return $e['time_in'];
                                                    })) ?></div>
                        <div class="stat-label">Checked In Today</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-number"><?= count(array_filter($todaySummary, function ($e) {
                                                        return $e['time_out'];
                                                    })) ?></div>
                        <div class="stat-label">Completed Today</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-number"><?= count(array_filter($todaySummary, function ($e) {
                                                        return $e['break_start'] && !$e['break_end'];
                                                    })) ?></div>
                        <div class="stat-label">Currently On Break</div>
                    </div>
                </div>

                <div class="card">
                    <div class="time-clock">
                        <div class="time-display" id="currentTime"></div>
                        <div class="form-group">
                            <label for="employee_select">Select Employee for Time Actions:</label>
                            <select id="employee_select">
                                <option value="">Choose Employee...</option>
                                <?php foreach ($employees as $emp): ?>
                                    <option value="<?= $emp['employee_id'] ?>">
                                        <?= $emp['name'] ?> (<?= $emp['employee_id'] ?>) - <?= $emp['type'] ?><?php if (!empty($emp['department_name'])): ?> [<?= esc($emp['department_name']) ?>]<?php endif; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div id="alertMessage"></div>

                        <div class="btn-group">
                            <button class="btn btn-success" onclick="timeAction('time_in')">
                                <i class="fas fa-sign-in-alt"></i> Time In
                            </button>
                            <button class="btn btn-warning" onclick="timeAction('break_start')">
                                <i class="fas fa-coffee"></i> Break
                            </button>
                            <button class="btn btn-info" onclick="timeAction('break_end')">
                                <i class="fas fa-mug-hot"></i> End Break
                            </button>
                            <button class="btn btn-danger" onclick="timeAction('time_out')">
                                <i class="fas fa-sign-out-alt"></i> Out
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3>Employee Management</h3>
                    <div id="employeeAlertMessage"></div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Add New Employee</h3>
                        </div>
                        <form id="addEmployeeForm">
                            <div class="form-group">
                                <label for="employee_id">Employee ID</label>
                                <input type="text" id="employee_id" name="employee_id" placeholder="Auto-generated" readonly required>
                            </div>

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter full name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter email address" required>
                            </div>

                            <div class="form-group">
                                <label for="type">Employee Type</label>
                                <select id="type" name="type" required>
                                    <option value="">Select type</option>
                                    <option value="Staff">Staff</option>
                                    <option value="OJT">OJT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select id="department_id" name="department_id" required>
                                    <option value="">Select department</option>
                                    <?php foreach ($departments as $dept): ?>
                                        <option value="<?= esc($dept['id']) ?>"><?= esc($dept['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Employee</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="tabs">
                        <button class="tab active" onclick="showTab('employees')">All Employees</button>
                        <button class="tab" onclick="showTab('weekly')">Weekly Summary</button>
                        <button class="tab" onclick="showTab('timesheet')">Detailed Timesheet</button>
                    </div>

                    <div id="employees" class="tab-content active">
                        <h3>All Employees</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employees as $emp): ?>
                                    <tr>
                                        <td><?= $emp['employee_id'] ?></td>
                                        <td><?= $emp['name'] ?></td>
                                        <td><?= $emp['type'] ?></td>
                                        <td><?= !empty($emp['department_name']) ? htmlspecialchars($emp['department_name']) : '-' ?></td>
                                        <td>
                                            <button class="btn btn-danger" onclick="deleteEmployee('<?= $emp['employee_id'] ?>')">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="pagination" style="margin-top: 10px;">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?= $page - 1 ?>&filter_dept=<?= urlencode($filter_dept) ?>" class="btn btn-light">&laquo; Prev</a>
                            <?php endif; ?>
                            <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                                <a href="?page=<?= $p ?>&filter_dept=<?= urlencode($filter_dept) ?>" class="btn btn-light<?= ($p == $page) ? ' active' : '' ?>"><?= $p ?></a>
                            <?php endfor; ?>
                            <?php if ($page < $totalPages): ?>
                                <a href="?page=<?= $page + 1 ?>&filter_dept=<?= urlencode($filter_dept) ?>" class="btn btn-light">Next &raquo;</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div id="weekly" class="tab-content">
                        <div class="card">
                            <div class="card-header">
                                <h3>Weekly Summary</h3>
                                <div class="card-actions">
                                    <button class="btn btn-sm btn-light"><i class="fas fa-download"></i> Export</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Days Worked</th>
                                            <th>Total Hours</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($weeklySummary as $employee): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($employee['employee_id']) ?></td>
                                                <td><?= htmlspecialchars($employee['name']) ?></td>
                                                <td><?= htmlspecialchars($employee['type']) ?></td>
                                                <td><?= $employee['days_worked'] ?: 0 ?></td>
                                                <td><?= $employee['total_hours'] ? number_format($employee['total_hours'], 2) . ' hrs' : '0 hrs' ?></td>
                                                <td class="table-actions">
                                                    <button class="btn btn-sm btn-light"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-sm btn-light"><i class="fas fa-edit"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="timesheet" class="tab-content">
                        <h3>Detailed Timesheet (Last 30 Days)</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th>Break</th>
                                    <th>Total Hours</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($timesheet as $record): ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($record['name']) ?></strong> (<?= htmlspecialchars($record['employee_id']) ?>)
                                            <br>
                                            <small><?= htmlspecialchars($record['type']) ?></small>
                                        </td>
                                        <td><?= date('M d, Y', strtotime($record['log_date'])) ?></td>
                                        <td><?= $record['time_in'] ? date('h:i A', strtotime($record['time_in'])) : '-' ?></td>
                                        <td><?= $record['time_out'] ? date('h:i A', strtotime($record['time_out'])) : '-' ?></td>
                                        <td>
                                            <?php if ($record['break_start'] && $record['break_end']): ?>
                                                <?= date('h:i A', strtotime($record['break_start'])) ?> -
                                                <?= date('h:i A', strtotime($record['break_end'])) ?>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td><?php   if($record['total_hours']) {
                                                        $hours = floor($record['total_hours']);
                                                        $minutes = round(($record['total_hours'] - $hours) * 60);
                                                        echo sprintf("%d hrs %02d mins", $hours, $minutes);
                                                    }
                                                    else { '-'; }
                                            ?>
                                        </td>
                                        <td>
                                            <span class="status-badge status-<?= strtolower($record['status']) ?>">
                                                <?= $record['status'] ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Today's Summary</h3>
                    <div class="card-actions">
                        <button class="btn btn-sm btn-light" onclick="location.reload();"><i class="fas fa-sync-alt"></i> Refresh</button>
                    </div>
                </div>
                <div id="todaySummary">
                    <?php foreach ($todaySummary as $employee): ?>
                        <div class="employee-status">
                            <div>
                                <strong><?= esc($employee['name']) ?></strong> (<?= esc($employee['employee_id']) ?>)
                                <br>
                                <small><?= esc($employee['type']) ?></small>
                            </div>

                            <div>
                                <?php if (!$employee['time_in']): ?>
                                    <span class="status-badge status-absent">Not Timed In</span>
                                    <button class="btn btn-sm btn-primary" onclick="timeAction('time_in', '<?= $employee['employee_id'] ?>')"><i class="fas fa-sign-in-alt"></i> Time In</button>
                                <?php elseif (!$employee['time_out']): ?>
                                    <?php if ($employee['break_start'] && !$employee['break_end']): ?>
                                        <span class="status-badge status-break">On Break</span>
                                        <button class="btn btn-sm btn-secondary" onclick="timeAction('break_end', '<?= $employee['employee_id'] ?>')"><i class="fas fa-mug-hot"></i> End Break</button>
                                    <?php else: ?>
                                        <span class="status-badge status-active">Active</span>
                                        <button class="btn btn-sm btn-warning" onclick="timeAction('break_start', '<?= $employee['employee_id'] ?>')"><i class="fas fa-coffee"></i> Break</button>
                                        <button class="btn btn-sm btn-danger" onclick="timeAction('time_out', '<?= $employee['employee_id'] ?>')"><i class="fas fa-sign-out-alt"></i> Out</button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="status-badge status-completed">Completed</span>
                                    <span>  <?php if($employee['total_hours']) {
                                                    $hours = floor($employee['total_hours']);
                                                    $minutes = round(($employee['total_hours'] - $hours) * 60);
                                                    echo sprintf("%d hrs %02d mins", $hours, $minutes);
                                                }else { '-'; }
                                            ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- js scripts, cdn, imports -->
<?= $this->section('js')?>
    <script>
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });

            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });

            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }

        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;

            const icon = document.createElement('i');
            if (type === 'success') {
                icon.className = 'fas fa-check-circle';
            } else if (type === 'error') {
                icon.className = 'fas fa-exclamation-circle';
            }

            alertDiv.appendChild(icon);
            alertDiv.appendChild(document.createTextNode(' ' + message));

            const container = document.querySelector('.container');
            container.insertBefore(alertDiv, container.firstChild);

            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

        function timeAction(action, employeeId) {
            const formData = new FormData();
            formData.append('action', action);
            formData.append('employee_id', employeeId);

            fetch('', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    showAlert(data.message, data.status === 'success' ? 'success' : 'error');
                    if (data.status === 'success') {
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                })
                .catch(error => {
                    showAlert('An error occurred. Please try again.', 'error');
                });
        }

        const typeField = document.getElementById('type');
        const deptField = document.getElementById('department_id');
        const empIdField = document.getElementById('employee_id');

        function updateEmployeeId() {
            const type = typeField.value;
            const dept = deptField.value;
            if (type && dept) {
                const formData = new FormData();
                formData.append('action', 'generate_employee_id');
                formData.append('type', type);
                formData.append('department_id', dept);
                fetch('', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.employee_id) {
                            empIdField.value = data.employee_id;
                        }
                    });
            } else {
                empIdField.value = '';
            }
        }
        typeField.addEventListener('change', updateEmployeeId);
        deptField.addEventListener('change', updateEmployeeId);

        // Existing submit handler

        document.getElementById('addEmployeeForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append('action', 'add_employee');

            fetch('', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    showAlert(data.message, data.status === 'success' ? 'success' : 'error');
                    if (data.status === 'success') {
                        this.reset();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                })
                .catch(error => {
                    showAlert('An error occurred. Please try again.', 'error');
                    showAlert('An error occurred. Please try again.', 'error', 'employeeAlertMessage');
                });
        });

        function deleteEmployee(employeeId) {
            if (confirm('Are you sure you want to delete this employee?')) {
                const formData = new FormData();
                formData.append('action', 'delete_employee');
                formData.append('employee_id', employeeId);

                fetch('', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            showAlert(data.message, 'success', 'employeeAlertMessage');
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        } else {
                            showAlert(data.message, 'error', 'employeeAlertMessage');
                        }
                    })
                    .catch(error => {
                        showAlert('An error occurred. Please try again.', 'error', 'employeeAlertMessage');
                    });
            }
        }
    </script>
<?= $this->endSection() ?>
