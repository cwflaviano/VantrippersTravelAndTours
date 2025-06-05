<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- css libraries, imports, cnds -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?= $this->endSection() ?>

<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/admin-style.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/export.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?= $this->section('section1') ?>
    <div class="dashboard-layout">
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="../assets/images/main_logo.png" alt="Time Tracker">
                <h1>ADMINISTRATOR</h1>
            </div>
            
            <div class="sidebar-title">Main</div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            </ul>
            
            <div class="sidebar-title">User's</div>
            <ul class="sidebar-menu">
                <li><a href="<?= base_url('/timetracker/admin/dashboard') ?>"><i class="fas fa-users"></i> System User's <i class="fas fa-chevron-right submenu-toggle"></i></a></li>
            </ul>
            
            <div class="sidebar-title">Time Management</div>
            <ul class="sidebar-menu">
                <li><a href="<?= base_url('/timetracker/admin/import') ?>"><i class="fas fa-file-import"></i> Import Data</a></li>
                <li><a href="<?= base_url('/timetracker/admin/reports') ?>"><i class="fas fa-chart-bar"></i> Reports</a></li>
                <li><a href="<?= base_url('/timetracker/admin/export') ?>" class="active"><i class="fas fa-file-export"></i> Export</a></li>
            </ul>
            
            <div class="sidebar-title">Settings</div>
            <ul class="sidebar-menu">
                <li><a href="<?= base_url('/timetracker/admin/settings') ?>"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
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
                    <h2>Export Time Records</h2>
                    <div>
                        <a href="<?= base_url('/timetracker/admin/reports') ?>" class="btn btn-light"><i class="fas fa-arrow-left"></i> Back to Reports</a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Filter Options</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/timetracker/admin/export') ?>" method="get" class="filter-form">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" id="start_date" name="start_date" value="<?= $startDate ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" id="end_date" name="end_date" value="<?= $endDate ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="employee_id">Employee</label>
                                <select id="employee_id" name="employee_id">
                                    <option value="">All Employees</option>
                                    <?php 
                                    
                                    foreach ($employees as $employee): 
                                    ?>
                                        <option value="<?= $employee['employee_id'] ?>" <?= $employeeId === $employee['employee_id'] ? 'selected' : '' ?>>
                                            <?= $employee['name'] ?> (<?= $employee['employee_id'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="employee_type">Employee Type</label>
                                <select id="employee_type" name="employee_type">
                                    <option value="">All Types</option>
                                    <option value="Staff" <?= $employeeType === 'Staff' ? 'selected' : '' ?>>Staff</option>
                                    <option value="OJT" <?= $employeeType === 'OJT' ? 'selected' : '' ?>>OJT</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                
                <h3>Choose Export Format</h3>
                
                <div class="export-options">
                    <div class="export-option" onclick="exportFormat('csv')">
                        <i class="fas fa-file-csv"></i>
                        <h4>CSV</h4>
                        <p>Export as CSV file for use in spreadsheet applications.</p>
                        <button class="btn btn-primary"><i class="fas fa-download"></i> Download CSV</button>
                    </div>
                    
                    <div class="export-option" onclick="exportFormat('excel')">
                        <i class="fas fa-file-excel"></i>
                        <h4>Excel</h4>
                        <p>Export as Excel file with formatted data and styling.</p>
                        <button class="btn btn-primary"><i class="fas fa-download"></i> Download Excel</button>
                    </div>
                    
                    <div class="export-option" onclick="exportFormat('pdf')">
                        <i class="fas fa-file-pdf"></i>
                        <h4>PDF</h4>
                        <p>Export as PDF document for printing or sharing.</p>
                        <button class="btn btn-primary"><i class="fas fa-download"></i> Download PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Scripts -->
<?= $this->section('js') ?>
    <script>
        function exportFormat(format) {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const employeeId = document.getElementById('employee_id').value;
            const employeeType = document.getElementById('employee_type').value;
            const url = '<?= base_url('/timetracker/admin/export?' . http_build_query(['start_date' => $startDate, 'end_date' => $endDate, 'employee_id' => $employeeId, 'employee_type' => $employeeType])) ?>';
            window.location.href = url;
        }
    </script>
<?= $this->endSection() ?>