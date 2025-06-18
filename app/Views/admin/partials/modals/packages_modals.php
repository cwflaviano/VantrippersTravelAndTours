<!-- Modal: Items -->
<div class="modal fade" id="itemsModal" tabindex="-1" aria-labelledby="itemsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemsModalLabel">Package Inclusion/Exclusion</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body" style="white-space: pre-wrap;">
                <div id="modal-items-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Package Full Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body" style="white-space: pre-wrap;">
                <div id="modal-details-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-outline-primary"
                    id="copyDetailsBtn">
                    Copy
                </button>
                <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


        <!-- Create Modal -->
        <!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered"><!-- make it large to fit two columns comfortably -->
        <div class="modal-content">
            <form method="POST" action="<?= base_url('/admin/crm/sales/packages/create')?>">
                <input type="hidden" name="action" value="create">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="createModalLabel">Add New Package</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sku" class="form-label">Package Title</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="ex: ILOCOS-LA UNION 3D2N 32+2(XL)" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" min="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="ex: 3D2N" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price per Head</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price per Head" required step="1" min="0"
                                oninput="this.value = this.value.replace(/\D/g, '')" inputmode="numeric" pattern="[0-9]+">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="items" class="form-label">Package Inclusion/Exclusion</label>
                            <textarea class="form-control" id="items" name="items" rows="5" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="item_full_details" class="form-label">Package Full Details</label>
                            <textarea class="form-control" id="item_full_details" name="item_full_details" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>