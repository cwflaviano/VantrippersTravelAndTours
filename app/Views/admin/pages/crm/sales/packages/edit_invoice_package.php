<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/packages.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>



<!-- main content -->
<?= $this->section('main_content') ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Invoice Package Management</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Invoice Package Listing Table -->
                <div class="card">
                    <div class="card-header bg-dark">Invoice Package List</div>
                    <div class="card-body">
                    <form id="editForm" method="POST" action="<?= base_url('/admin/crm/sales/packages/edit/'. $id)?>">
                        <input type="hidden" name="action" value="update">

                        <div class="mb-3">
                            <label for="sku" class="form-label">Package Title</label>
                            <input type="text" class="form-control" id="sku" name="sku" value="<?= esc($package['sku']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= esc($package['quantity']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?= esc($package['category']); ?>" >
                        </div>

                        <div class="mb-3">
                            <label for="items" class="form-label">Package Inclusion/Exclusion</label>
                            <textarea class="form-control" id="items" name="items" rows="6" ><?= esc($package['items']); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="item_full_details" class="form-label">Package Full Details</label>
                            <textarea class="form-control" id="item_full_details" name="item_full_details" rows="6" required><?= esc($package['item_full_details']); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price per Head</label>
                            <input type="number" step="1" min="0" class="form-control" id="price" name="price" value="<?= esc($package['price']); ?>" 
                                    oninput="this.value = this.value.replace(/\D/g, '')" inputmode="numeric" pattern="[0-9]+">
                        </div>

                        <button type="submit" class="btn btn-success">Update Package</button>
                        <a href="invoice_package.php" class="btn btn-secondary">Cancel</a>
                    </form>
                    </div>
                </div>
                <!-- End Listing Table -->
            </div>
        </section>
    </div>
<?= $this->endSection() ?>


<?= $this->section('modals') ?>
<?= $this->endSection() ?>




<?= $this->section('js') ?>
    <script>
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?'
                , text: 'Do you want to save the changes?'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: 'Yes'
                , cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
        });

        if(<?= session()->has('success') ?>) {
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                title: 'Updated!',
                text: <?= session()->getFlashdata('success')?>,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(() => {
                e.reload();
              });
            });
        }
        if(<?= session()->has('error') ?>) {
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                title: 'Updated!',
                text: <?= session()->getFlashdata('error')?>,
                icon: 'success',
                confirmButtonText: 'OK'
              }).then(() => {
                e.reload();
              });
            });
        }
    </script>
<?= $this->endSection() ?>