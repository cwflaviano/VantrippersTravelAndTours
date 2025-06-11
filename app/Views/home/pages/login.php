<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/auth_layout') ?>


<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>




<!-- Main Content -->
<?= $this->section('main_content') ?>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('/') ?>" title="Redirect back to homepage">
                    <div class="logo">
                    <img class="rounded-circle" src="<?= base_url('images/main_logo.png') ?>" alt="" width="150px" height="150px;">
                </div>
                </a>
                <h3>Welcome Back!</h3>
                <p class="text-muted">
                    Sign in to continue
                </p>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= base_url('/login') ?>">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" autocomplete="email">
                        <label style="color:gray;" for="floatingEmail"><i class="bi bi-envelope-fill me-2"></i>Email Address</label>
                    </div>
                    <div class="form-floating position-relative">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" autocomplete="new-password">
                        <label style="color:gray;" for="floatingPassword"><i class="bi bi-lock-fill me-2"></i>Password</label>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <a style="text-decoration:none" href="#" class="small">Forgot password?</a>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">Sign in</button>
                    <div class="divider">
                        <span>OR continue with</span>
                    </div>
                    <div class="social-login">
                        <a href="<?= base_url('/timetracker/login') ?>" class="social-btn time-tracker">
                            <i class="bi bi-clock"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center mt-4 signup-link">
            <p class="text-dark">Don't have an account? <a href="<?= base_url('/signup') ?>" class="fw-bold">Sign up</a></p>
        </div>
    </div>
<?= $this->endSection() ?>




<!-- js -->
<?= $this->section('js') ?>
    <script>
        const login_url = "<?= base_url('/admin/dashboard') ?>";

        var sessionData = {
            info: <?= json_encode(session()->get('info') ?? null) ?>,
            error: <?= json_encode(session()->get('error') ?? null) ?>,
            success: <?= json_encode(session()->get('success') ?? null) ?>,
            firstName: <?= json_encode(session()->get('first_name') ?? null) ?>,
            lastName: <?= json_encode(session()->get('last_name') ?? null) ?>,
        };
    </script>
    <script src="<?= base_url('js/login.js') ?>?v=<? time() ?>"></script>
<?= $this->endSection() ?>