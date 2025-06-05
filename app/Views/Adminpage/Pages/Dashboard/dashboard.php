<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- DASHBOARD --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?= $this->extend('Layouts/admin_layout') ?>

<!-- HEAD TAG -->
    <!-- Title -->
    <?= $this->section('title') ?>
        <title>Dashboard</title>
    <?= $this->endSection() ?>
<!-- END OF HEAD TAG -->


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
    <!-- Nav bar top -->
    <?= $this->section('navigation') ?>
        <?= view('Adminpage/Includes/top_nav') ?>
    <?= $this->endSection() ?>

    <!-- side bar / links / settings -->
    <?= $this->section('aside') ?>
        <?= view('Adminpage/Includes/aside_nav') ?>
    <?= $this->endSection() ?>

    <!-- Contents -->
    <?= $this->section('contents') ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Admin Dashboard</li>
                                <li class="breadcrumb-item"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Analytics & Reports
                                </div>
                                <div class="card-body">

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
<!-- END OF MAIN CONTENT -->
