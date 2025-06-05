<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/ojt-style.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('TimeTracker/css/first_login.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?= $this->section('section1') ?>
    <div class="login-container">
        <h2>First Login: Set Username & Password</h2>
        <?php if (session()->has('message')): ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('message')) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= base_url('/timetracker/ojt/first-time-login') ?>">
            <div class="form-group">
                <label for="username">New Username</label>
                <input type="text" name="username" id="username" >
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" >
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" >
            </div>
            <button type="submit" class="btn btn-primary">Set Credentials</button>
        </form>
    </div>
<?= $this->endSection() ?>
