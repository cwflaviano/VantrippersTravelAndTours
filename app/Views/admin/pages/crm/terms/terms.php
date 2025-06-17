<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/terms.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>




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
                    <!-- Create Button -->
                    <div class="mb-3">
                        <button id="showCreateModal" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fas fa-plus"></i> Add Term
                        </button>
                    </div>

                    <table id="termsTable" class="table table-bordered table-hover dt-responsive nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($terms as $term): ?>
                                <tr>
                                    <td>
                                        <?= $term['id'] ?>
                                    </td>
                                    <td>
                                        <?= esc($term['category']) ?>
                                    </td>
                                    <td>
                                        <?= nl2br(esc($term['details'])) ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary showEditModal"
                                            data-id="<?= $term['id'] ?>"
                                            data-category="<?= esc($term['category'], 'attr') ?>"
                                            data-details="<?= esc($term['details'], 'attr') ?>">
                                            Edit
                                        </button>
                                        <a href="<?= base_url('/admin/crm/terms/delete/'.$term['id']) ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this term?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Listing Table -->
        </div>
    </section>
</div>
<?= $this->endSection() ?>


<?= $this->section('modals') ?>
    <?= $this->include('admin/pages/crm/terms/terms_modal')?>
<?= $this->endSection() ?>




<?= $this->section('js') ?>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#termsTable').DataTable({
                responsive: true
            });

            // Open Edit Modal with data
            $('#termsTable').on('click', '.showEditModal', function() {
                const btn = $(this);
                $('#editId').val(btn.data('id'));
                $('#editCategory').val(btn.data('category'));
                $('#editDetails').val(btn.data('details'));
                $('#editModal').modal('show');
            });
        });   
    </script>
<?= $this->endSection() ?>
