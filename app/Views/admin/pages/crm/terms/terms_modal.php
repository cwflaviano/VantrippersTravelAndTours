<!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?= base_url('/admin/crm/terms') ?>">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Term</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="action" value="create">
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Details</label>
                                <textarea name="details" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?= base_url('/admin/crm/terms') ?>">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Term</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" id="editId">
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" id="editCategory" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Details</label>
                                <textarea name="details" id="editDetails" class="form-control" rows="4"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>