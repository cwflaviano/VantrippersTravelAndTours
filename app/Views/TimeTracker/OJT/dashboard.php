<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/ojt-style.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/ojt_dashboard.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>




<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?= $this->section('section1') ?>
    <nav class="navbar">
        <h1><i class="fas fa-clock"></i> Time Tracker</h1>
        <div class="user-info">
            <span>Welcome, <?= session()->get('name') ?></span>
            <a href="<?= base_url('/logout')?>" class="btn-logout">Logout</a>
        </div>
    </nav>
<?= $this->endSection() ?>


<?= $this->section('section2')?>
    <div class="container">
        <div class="card">
            <div class="time-clock">
                <div class="time-display" id="currentTime"></div>
                <div class="date-display" id="currentDate"></div>
                
                <div class="current-status">
                    <?php if ($todayLog): ?>
                        <div class="status-badge status-<?= strtolower($todayLog['status']) ?>">
                            <?= $todayLog['status'] ?>
                        </div>
                        <div class="time-info">
                            <?php if ($todayLog['time_in']): ?>
                                <div class="time-info-item">
                                    <div class="time-info-label">Time In</div>
                                    <div class="time-info-value"><?= date('h:i A', strtotime($todayLog['time_in'])) ?></div>
                                </div>
                                
                                <?php if (!$todayLog['time_out']): ?>
                                <div class="time-info-item">
                                    <div class="time-info-label">Running Time</div>
                                    <div class="time-info-value" id="runningTime">Calculating...</div>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if ($todayLog['time_out']): ?>
                                <div class="time-info-item">
                                    <div class="time-info-label">Time Out</div>
                                    <div class="time-info-value"><?= date('h:i A', strtotime($todayLog['time_out'])) ?></div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($todayLog['break_start']): ?>
                                <div class="time-info-item">
                                    <div class="time-info-label">Break Time</div>
                                    <div class="time-info-value">
                                        <?= date('h:i A', strtotime($todayLog['break_start'])) ?>
                                        <?php if ($todayLog['break_end']): ?>
                                            - <?= date('h:i A', strtotime($todayLog['break_end'])) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($todayLog['total_hours']): ?>
                                <div class="time-info-item">
                                    <div class="time-info-label">Total Hours</div>
                                    <div class="time-info-value"><?php
                                            if(isset($todayLog['total_hours'])) {
                                                $hours = floor($weeklyHours);
                                                $minutes = round(($weeklyHours - $hours) * 60);
                                                echo sprintf("%d hrs %02d mins", $hours, $minutes);
                                            } 
                                            else {
                                                '-';
                                            }
                                    ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="status-badge status-absent">Not Timed In</div>
                        <p>You haven't timed in today yet.</p>
                    <?php endif; ?>
                </div>
                
                <div id="alertMessage"></div>
                
                <div class="btn-group">
                    <button class="btn btn-success" onclick="timeAction('time_in')" 
                            <?= ($todayLog && $todayLog['time_in']) ? 'disabled' : '' ?>>
                        🕐 Time In
                    </button>
                    <button class="btn btn-warning" onclick="timeAction('break_start')"
                            <?= (!$todayLog || !$todayLog['time_in'] || $todayLog['time_out'] || ($todayLog['break_start'] && !$todayLog['break_end'])) ? 'disabled' : '' ?>>
                        ☕ Start Break
                    </button>
                    <button class="btn btn-info" onclick="timeAction('break_end')"
                            <?= (!$todayLog || !$todayLog['break_start'] || $todayLog['break_end']) ? 'disabled' : '' ?>>
                        🔄 End Break
                    </button>
                    <button class="btn btn-danger" onclick="timeAction('time_out')"
                            <?= (!$todayLog || !$todayLog['time_in'] || $todayLog['time_out']) ? 'disabled' : '' ?>>
                        🕐 Time Out
                    </button>
                </div>
            </div>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?= $daysWorkedThisWeek ?></div>
                <div class="stat-label">Days This Week</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php 
                        $hours = floor($weeklyHours);
                        $minutes = round(($weeklyHours - $hours) * 60);
                        sprintf("%d hrs %02d mins", $hours, $minutes);
                    ?>
                </div>
                <div class="stat-label">Hours This Week</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $daysWorkedThisMonth ?></div>
                <div class="stat-label">Days This Month</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php
                        $hours = floor($monthlyHours);
                        $minutes = round(($monthlyHours - $hours) * 60);
                        sprintf("%d hrs %02d mins", $hours, $minutes);
                    ?>
                </div>
                <div class="stat-label">Hours This Month</div>
            </div>
        </div>
        
        <div class="card">
            <div class="tabs">
                <button class="tab active" onclick="showTab('weekly')">Weekly Summary</button>
                <button class="tab" onclick="showTab('monthly')">Monthly Summary</button>
            </div>
            
            <div id="weekly" class="tab-content active">
                <h3>Weekly Time Summary (Last 7 Days)</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Break Time</th>
                            <th>Total Hours</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($weeklyLogs)): ?>
                            <tr>
                                <td colspan="6" style="text-align: center; color: #666;">No time logs found for this week</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($weeklyLogs as $log): ?>
                                <tr>
                                    <td><?= date('M d, Y', strtotime($log['log_date'])) ?></td>
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
                                    <td><?php
                                            if($log['total_hours']) {
                                                $hours = floor($log['total_hours']);
                                                $minutes = round(($log['total_hours'] - $hours) * 60);
                                                sprintf("%d hrs %02d mins", $hours, $minutes);
                                            }
                                            else {
                                                '-';
                                            } 
                                        ?>
                                    </td>
                                    <td>
                                        <span class="status-badge status-<?= strtolower($log['status']) ?>">
                                            <?= $log['status'] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div id="monthly" class="tab-content">
                <h3>Monthly Time Summary (Last 30 Days)</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Break Time</th>
                            <th>Total Hours</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($monthlyLogs)): ?>
                            <tr>
                                <td colspan="6" style="text-align: center; color: #666;">No time logs found for this month</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($monthlyLogs as $log): ?>
                                <tr>
                                    <td><?= date('M d, Y', strtotime($log['log_date'])) ?></td>
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
                                    <td><?php
                                            if($log['total_hours']) {
                                                $hours = floor($log['total_hours']);
                                                $minutes = round(($log['total_hours'] - $hours) * 60);
                                                sprintf("%d hrs %02d mins", $hours, $minutes);
                                            }
                                            else {
                                                '-';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <span class="status-badge status-<?= strtolower($log['status']) ?>">
                                            <?= $log['status'] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Scripts  -->
<?= $this->section('js') ?>
    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour12: true,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            const dateString = now.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            document.getElementById('currentTime').textContent = timeString;
            document.getElementById('currentDate').textContent = dateString;
            
            // Update running time if element exists and user is timed in
            updateRunningTime();
        }
        
        function updateRunningTime() {
            const runningTimeElement = document.getElementById('runningTime');
            if (runningTimeElement) {
                <?php if ($todayLog && $todayLog['time_in'] && !$todayLog['time_out']): ?>
                    // Get time in timestamp
                    const timeInStr = '<?= $todayLog['time_in'] ?>';
                    const timeInDate = new Date('<?= date('Y-m-d', strtotime($todayLog['log_date'])) ?>T' + timeInStr);
                    
                    // Calculate time difference
                    const now = new Date();
                    let diffMs = now - timeInDate;
                    
                    // Adjust for break time if applicable
                    <?php if ($todayLog['break_start'] && $todayLog['break_end']): ?>
                        const breakStartStr = '<?= $todayLog['break_start'] ?>';
                        const breakEndStr = '<?= $todayLog['break_end'] ?>';
                        const breakStartDate = new Date('<?= date('Y-m-d', strtotime($todayLog['log_date'])) ?>T' + breakStartStr);
                        const breakEndDate = new Date('<?= date('Y-m-d', strtotime($todayLog['log_date'])) ?>T' + breakEndStr);
                        const breakTimeMs = breakEndDate - breakStartDate;
                        diffMs -= breakTimeMs;
                    <?php elseif ($todayLog['break_start'] && !$todayLog['break_end']): ?>
                        // If on break, don't count time since break started
                        const breakStartStr = '<?= $todayLog['break_start'] ?>';
                        const breakStartDate = new Date('<?= date('Y-m-d', strtotime($todayLog['log_date'])) ?>T' + breakStartStr);
                        diffMs = breakStartDate - timeInDate;
                    <?php endif; ?>
                    
                    // Format the time difference
                    const diffSec = Math.floor(diffMs / 1000) % 60;
                    const diffMin = Math.floor(diffMs / (1000 * 60)) % 60;
                    const diffHr = Math.floor(diffMs / (1000 * 60 * 60));
                    
                    // Display formatted time
                    runningTimeElement.textContent = `${diffHr.toString().padStart(2, '0')}:${diffMin.toString().padStart(2, '0')}:${diffSec.toString().padStart(2, '0')}`;
                <?php else: ?>
                    runningTimeElement.textContent = 'Not active';
                <?php endif; ?>
            }
        }
        
        setInterval(updateTime, 1000);
        updateTime();
        
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
            const alertDiv = document.getElementById('alertMessage');
            alertDiv.innerHTML = `<div class="alert alert-${type}">${message}</div>`;
            setTimeout(() => {
                alertDiv.innerHTML = '';
            }, 5000);
        }
        
        function timeAction(action) {
            const now = new Date();
            const clientTimestamp = now.toISOString();
            
            const formData = new FormData();
            formData.append('action', action);
            formData.append('client_timestamp', clientTimestamp);
            
            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showAlert(data.message, 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    showAlert(data.message, 'error');
                }
            })
            .catch(error => {
                showAlert('An error occurred. Please try again.', 'error');
            });
        }
    </script>
<?= $this->endSection() ?>
