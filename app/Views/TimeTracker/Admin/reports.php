<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- css libraries, imports, cnds -->
<?= $this->section('css') ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?= $this->endSection() ?>

<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/admin-style.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/report.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?= $this->section('section1') ?>
    <div class="dashboard-layout">
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="<?= base_url('TimeTracker/images/main_logo.png')?>" alt="Time Tracker">
                <h1>ADMINISTRATOR</h1>
            </div>
            
            <div class="sidebar-title">Main</div>
            <ul class="sidebar-menu">
                <li><a href="<?= base_url('/timetracker/admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            </ul>
            
            <div class="sidebar-title">Time Management</div>
            <ul class="sidebar-menu">
                <li><a href="<?= base_url('/timetracker/admin/import') ?>"><i class="fas fa-file-import"></i> Import Data</a></li>
                <li><a href="<?= base_url('/timetracker/admin/reports') ?>" class="active"><i class="fas fa-chart-bar"></i> Reports</a></li>
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
                    <h2>Time Reports</h2>
                    <div>
                        <a href="<?= base_url('/timetracker/admin/export?'. http_build_query(['start_date' => $startDate, 'end_date' => $endDate, 'employee_id' => $employeeId, 'employee_type' => $employeeType])) ?>" class="btn btn-primary">
                            <i class="fas fa-file-export"></i> Export Report
                        </a>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Filter Options</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/timetracker/admin/reports') ?>" method="get" class="filter-form">
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
                                    <?php foreach ($employees as $employee): ?>
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
                            
                            <div class="form-group" style="display: flex; align-items: flex-end;">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter"></i> Apply Filters
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="stats-grid-extended">
                    <div class="stat-card">
                        <div class="stat-number"><?= count($timeLogs) ?></div>
                        <div class="stat-label">Total Records</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-number"><?= count($employeeStats) ?></div>
                        <div class="stat-label">Employees</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-number"><?= $totalDays ?></div>
                        <div class="stat-label">Days</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-number">
                            <?php 
                                if ($totalRegularHours === null) return '-';
                                $hours = floor($totalRegularHours);
                                $minutes = round(($totalRegularHours - $hours) * 60);
                                echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                            ?>
                        </div>
                        <div class="stat-label">Regular Hours</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-number">
                            <?php 
                                if ($totalExtraHours === null) return '-';
                                $hours = floor($totalExtraHours);
                                $minutes = round(($totalExtraHours - $hours) * 60);
                                echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                            ?>
                        </div>
                        <div class="stat-label">Extra Hours</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-number">
                             <?php 
                                if ($totalDoubleHours === null) return '-';
                                $hours = floor($totalDoubleHours);
                                $minutes = round(($totalDoubleHours - $hours) * 60);
                                echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                            ?>
                        </div>
                        <div class="stat-label">Double Time Hours</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-number">
                             <?php 
                                if ($totalCalculatedHours === null) return '-';
                                $hours = floor($totalCalculatedHours);
                                $minutes = round(($totalCalculatedHours - $hours) * 60);
                                echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                            ?>
                        </div>
                        <div class="stat-label">Total Calculated Hours</div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Hours by Day (Including Overtime)</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="hoursChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3>Employee Summary (with Overtime)</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Type</th>
                                        <th>Days Worked</th>
                                        <th>Regular Hours</th>
                                        <th>Extra Hours</th>
                                        <th>Double Hours</th>
                                        <th>Total Calculated</th>
                                        <th>Avg Hours/Day</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($employeeStats as $stat): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($stat['name']) ?> (<?= htmlspecialchars($stat['employee_id']) ?>)</td>
                                            <td><?= htmlspecialchars($stat['type']) ?></td>
                                            <td><?= $stat['days_worked'] ?></td>
                                            <td>
                                                <?php 
                                                    if ($stat['regular_hours'] === null) return '-';
                                                    $hours = floor($stat['regular_hours']);
                                                    $minutes = round(($stat['regular_hours'] - $hours) * 60);
                                                    echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($stat['extra_hours'] === null) return '-';
                                                    $hours = floor($stat['extra_hours']);
                                                    $minutes = round(($stat['extra_hours'] - $hours) * 60);
                                                    echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($stat['double_hours'] === null) return '-';
                                                    $hours = floor($stat['double_hours']);
                                                    $minutes = round(($stat['double_hours'] - $hours) * 60);
                                                    echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                ?>
                                            </td>
                                            <td>
                                                <strong>
                                                     <?php 
                                                        if ($stat['total_calculated_hours'] === null) return '-';
                                                        $hours = floor($stat['total_calculated_hours']);
                                                        $minutes = round(($stat['total_calculated_hours'] - $hours) * 60);
                                                        echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                    ?>
                                                </strong>
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($stat['avg_hours_per_day'] === null) return '-';
                                                    $hours = floor($stat['avg_hours_per_day']);
                                                    $minutes = round(($stat['avg_hours_per_day'] - $hours) * 60);
                                                    echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                ?>
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
                        <h3>Detailed Time Logs (with Overtime Management)</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employee</th>
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                        <th>Break</th>
                                        <th>Regular Hours</th>
                                        <th>Overtime</th>
                                        <th>Total Calculated</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($timeLogs as $log): ?>
                                        <tr id="row-<?= $log['id'] ?>">
                                            <td><?= date('M d, Y', strtotime($log['log_date'])) ?></td>
                                            <td><?= htmlspecialchars($log['name']) ?> (<?= htmlspecialchars($log['employee_id']) ?>)</td>
                                            <td><?= $log['time_in'] ? date('h:i A', strtotime($log['time_in'])) : '-' ?></td>
                                            <td><?= $log['time_out'] ? date('h:i A', strtotime($log['time_out'])) : '-' ?></td>
                                            <td>
                                                <?php if ($log['break_start'] && $log['break_end']): ?>
                                                    <?= date('h:i A', strtotime($log['break_start'])) ?> - 
                                                    <?= date('h:i A', strtotime($log['break_end'])) ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($log['total_hours'] === null) return '-';
                                                    $hours = floor($log['total_hours']);
                                                    $minutes = round(($log['total_hours'] - $hours) * 60);
                                                    echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($log['extra_hours'] > 0): ?>
                                                    <span class="overtime-badge extra">+
                                                         <?php 
                                                            if ($log['extra_hours'] === null) return '-';
                                                            $hours = floor($log['extra_hours']);
                                                            $minutes = round(($log['extra_hours'] - $hours) * 60);
                                                            echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                        ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if ($log['double_hours'] > 0): ?>
                                                    <span class="overtime-badge double">2x
                                                         <?php 
                                                            if ($log['double_hours'] === null) return '-';
                                                            $hours = floor($log['double_hours']);
                                                            $minutes = round(($log['double_hours'] - $hours) * 60);
                                                            echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                        ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if ($log['extra_hours'] == 0 && $log['double_hours'] == 0): ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td><strong>
                                                    <?php 
                                                        if ($log['calculated_total_hours'] === null) return '-';
                                                        $hours = floor($log['calculated_total_hours']);
                                                        $minutes = round(($log['calculated_total_hours'] - $hours) * 60);
                                                        echo sprintf("%d hrs %02d mins", $hours, $minutes);        
                                                    ?>
                                            </strong></td>
                                            <td>
                                                <span class="status-badge status-<?= strtolower($log['status']) ?>">
                                                    <?= $log['status'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button onclick="openOvertimeModal(<?= $log['id'] ?>, <?= $log['extra_hours'] ?>, <?= $log['double_hours'] ?>)" 
                                                        class="update-overtime-btn">
                                                    <i class="fas fa-clock"></i> Overtime
                                                </button>
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
    </div>
    
    <!-- Overtime Modal -->
    <div id="overtimeModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 30px; border-radius: 8px; min-width: 400px;">
            <h3>Update Overtime Hours</h3>
            <form id="overtimeForm">
                <input type="hidden" id="log_id" name="log_id">
                <div class="overtime-controls">
                    <div class="overtime-input">
                        <label>Extra Time (1x rate)</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <div>
                                <label>Hours</label>
                                <input type="number" id="extra_hours" name="extra_hours" min="0" max="24" step="1" value="0">
                            </div>
                            <div>
                                <label>Minutes</label>
                                <input type="number" id="extra_minutes" name="extra_minutes" min="0" max="59" step="1" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="overtime-input">
                        <label>Double Time (2x rate)</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <div>
                                <label>Hours</label>
                                <input type="number" id="double_hours" name="double_hours" min="0" max="24" step="1" value="0">
                            </div>
                            <div>
                                <label>Minutes</label>
                                <input type="number" id="double_minutes" name="double_minutes" min="0" max="59" step="1" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                    <button type="button" onclick="closeOvertimeModal()" style="padding: 8px 16px; background: #6c757d; color: white; border: none; border-radius: 4px;">Cancel</button>
                    <button type="submit" style="padding: 8px 16px; background: #28a745; color: white; border: none; border-radius: 4px;">Update</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Scripts -->
<?= $this->section('js') ?>
    <script>
        // Chart initialization
        const ctx = document.getElementById('hoursChart').getContext('2d');
        const hoursChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($chartLabels) ?>,
                datasets: [
                    {
                        label: 'Regular Hours',
                        data: <?= json_encode($chartRegularData) ?>,
                        backgroundColor: 'rgba(52, 152, 219, 0.7)',
                        borderColor: 'rgba(52, 152, 219, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Extra Hours',
                        data: <?= json_encode($chartExtraData) ?>,
                        backgroundColor: 'rgba(255, 193, 7, 0.7)',
                        borderColor: 'rgba(255, 193, 7, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Double Time (calculated)',
                        data: <?= json_encode($chartDoubleData) ?>,
                        backgroundColor: 'rgba(220, 53, 69, 0.7)',
                        borderColor: 'rgba(220, 53, 69, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Hours'
                        }
                    }
                }
            }
        });
        
        // Overtime modal functions
        function openOvertimeModal(logId, extraHours, doubleHours) {
            document.getElementById('log_id').value = logId;
            
            // Convert decimal hours to hours and minutes
            const extraTime = decimalToHoursMinutes(extraHours || 0);
            const doubleTime = decimalToHoursMinutes(doubleHours || 0);
            
            // Set hours and minutes values
            document.getElementById('extra_hours').value = extraTime.hours;
            document.getElementById('extra_minutes').value = extraTime.minutes;
            document.getElementById('double_hours').value = doubleTime.hours;
            document.getElementById('double_minutes').value = doubleTime.minutes;
            
            document.getElementById('overtimeModal').style.display = 'block';
        }
        
        // Helper function to convert decimal hours to hours and minutes
        function decimalToHoursMinutes(decimalHours) {
            const hours = Math.floor(decimalHours);
            let minutes = Math.round((decimalHours - hours) * 60);
            
            // Round to nearest 15 minutes
            minutes = Math.round(minutes / 15) * 15;
            if (minutes === 60) {
                minutes = 0;
            }
            
            return {
                hours: hours,
                minutes: minutes
            };
        }
        
        function closeOvertimeModal() {
            document.getElementById('overtimeModal').style.display = 'none';
        }
        
        // Handle overtime form submission
        document.getElementById('overtimeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const logId = document.getElementById('log_id').value;
            const extraHours = parseInt(document.getElementById('extra_hours').value) || 0;
            const extraMinutes = parseInt(document.getElementById('extra_minutes').value) || 0;
            const doubleHours = parseInt(document.getElementById('double_hours').value) || 0;
            const doubleMinutes = parseInt(document.getElementById('double_minutes').value) || 0;
            
            const url = "<?= base_url('/timetracker/admin/calculate_overtime') ?>";
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    log_id: logId,
                    extra_hours: extraHours,
                    extra_minutes: extraMinutes,
                    double_hours: doubleHours,
                    double_minutes: doubleMinutes
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeOvertimeModal();
                    location.reload(); // Refresh to show updated data
                } else {
                    alert('Error updating overtime: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating overtime');
            });
        });
        
        // Close modal when clicking outside
        document.getElementById('overtimeModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeOvertimeModal();
            }
        });
    </script>
<?= $this->endSection() ?>
