<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Imports -->
<?= $this->section('css_libraries') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?= $this->endSection() ?>
<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/login.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?= $this->section('section1') ?>
    <div class="login-container">
        <div class="logo-container">
            <div class="logo-placeholder">
                <img src="<?= base_url('TimeTracker/images/main_logo.png') ?>" alt="Time Tracker Logo">
            </div>
        </div>
        
        <div class="login-header">
            <h1>Time Tracker Login</h1>
            <p>Sign in to continue</p>
        </div>
        
        <?php if (session()->has('error')): ?>
            <div class="error"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>
        
        <form method="post" action="<?= base_url('/timetracker/login') ?>">
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="text" id="username" name="username" placeholder="Email Address">
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
            </div>
            
            <button type="submit" class="btn">Sign in</button>
            <div class="divider">
                <a href="<?= base_url('/signin') ?>" style="text-decoration: none; color: goldenrod;">
                    <span>Login</span>
                </a>
                    
            </div>
        </form>
    </div>
<?= $this->endSection() ?>
