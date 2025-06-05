// Address Show and Hide Function

document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("addressToggle");
    const addrFields = document.getElementById("addressFields");
    const icon = toggleBtn.querySelector("i");

    toggleBtn.addEventListener("click", function () {
        // Toggle visibility
        const isHidden = getComputedStyle(addrFields).display === "none";
        addrFields.style.display = isHidden ? "flex" : "none";

        // Flip chevron
        icon.classList.toggle("fa-chevron-down", !isHidden);
        icon.classList.toggle("fa-chevron-up", isHidden);
    });
});

// Product Add and Remove, and Reset Function
$(function () {
    const $tbody = $(".table-responsive table tbody");

    function renumberRows() {
        $tbody.find("tr").each(function (idx) {
            const rowNum = idx + 1;
            const $tr = $(this);

            $tr.find("td").eq(0).text(rowNum); // item number
            $tr
                .find('input[name="item_package_title[]"]')
                .attr("id", `itemPackageTitle${rowNum}`);
            $tr.find('textarea[name="item_desc[]"]').attr("id", `itemDesc${rowNum}`);
            $tr.find('input[name="item_qty[]"]').attr("id", `itemQty${rowNum}`);
            $tr.find('input[name="item_rate[]"]').attr("id", `itemRate${rowNum}`);
        });

        // disable remove if only one row
        const onlyOne = $tbody.find("tr").length === 1;
        $tbody.find(".remove-product").prop("disabled", onlyOne);
    }

    // Initial numbering
    renumberRows();

    // Add row
    $("#addProduct").on("click", function () {
        const $newRow = $tbody.find("tr:last").clone();

        // clear values
        $newRow.find('input[name="item_package_title[]"]').val("");
        $newRow.find('textarea[name="item_desc[]"]').val("");
        $newRow.find('input[name="item_qty[]"]').val(1);
        $newRow.find('input[name="item_rate[]"]').val("");
        $newRow.find("td").eq(4).text("₱0.00");

        $tbody.append($newRow);
        renumberRows();
    });

    // Remove row
    $tbody.on("click", ".remove-product", function () {
        $(this).closest("tr").remove();
        renumberRows();
    });

    // Reset button
    $("#resetProduct").on("click", function () {
        // Keep the first row, remove all others
        $tbody.find("tr:gt(0)").remove();

        // Reset the first row's values
        const $firstRow = $tbody.find("tr:first");
        $firstRow.find('input[name="item_package_title[]"]').val("");
        $firstRow.find('textarea[name="item_desc[]"]').val("");
        $firstRow.find('input[name="item_qty[]"]').val(1);
        $firstRow.find('input[name="item_rate[]"]').val("");
        $firstRow.find("td").eq(4).text("₱0.00");

        renumberRows();
    });
});

// File Upload and Image Preview Script

function previewImage(input) {
    const previewContainer = document.getElementById("imagePreviewContainer");
    const preview = document.getElementById("imagePreview");
    const uploadBtn = document.getElementById("attachmentContainer");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            // Display the image preview
            preview.src = e.target.result;
            previewContainer.style.display = "block";
            // Modify the upload button
            uploadBtn.style.borderColor = "#28a745";
            uploadBtn.innerHTML =
                '<i class="fas fa-check-circle fa-2x mb-2 text-success"></i><span>Image Selected</span>';
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const input = document.getElementById("attachmentInput");
    const previewContainer = document.getElementById("imagePreviewContainer");
    const uploadBtn = document.getElementById("attachmentContainer");

    // Clear the file input
    input.value = "";

    // Hide the preview
    previewContainer.style.display = "none";

    // Reset the upload button
    uploadBtn.style.borderColor = "#ccc";
    uploadBtn.innerHTML =
        '<i class="fas fa-plus-circle fa-2x mb-2"></i><span>Upload from Computer</span>';
}

function handleDocumentUpload(input) {
    const previewContainer = document.getElementById("documentPreviewContainer");
    const documentName = document.getElementById("documentName");
    const uploadBtn = document.getElementById("documentContainer");

    if (input.files && input.files[0]) {
        const fileName = input.files[0].name;

        // Display document info
        documentName.textContent = fileName;
        previewContainer.style.display = "block";

        // Modify the upload button
        uploadBtn.style.borderColor = "#28a745";
        uploadBtn.innerHTML =
            '<i class="fas fa-check-circle fa-2x mb-2 text-success"></i><span>Document Selected</span>';
    }
}

function removeDocument() {
    const input = document.getElementById("documentInput");
    const previewContainer = document.getElementById("documentPreviewContainer");
    const uploadBtn = document.getElementById("documentContainer");

    // Clear the file input
    input.value = "";

    // Hide the preview
    previewContainer.style.display = "none";

    // Reset the upload button
    uploadBtn.style.borderColor = "#ccc";
    uploadBtn.innerHTML =
        '<i class="fas fa-file-alt fa-2x mb-2"></i><span>Upload from Document</span>';
}

// Add drag and drop functionality
document.addEventListener("DOMContentLoaded", function () {
    const imageDropArea = document.getElementById("attachmentContainer");
    const documentDropArea = document.getElementById("documentContainer");

    // Prevent default drag behaviors
    ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
        imageDropArea.addEventListener(eventName, preventDefaults, false);
        documentDropArea.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight drop area when item is dragged over it
    ["dragenter", "dragover"].forEach((eventName) => {
        imageDropArea.addEventListener(eventName, highlight, false);
        documentDropArea.addEventListener(eventName, highlight, false);
    });

    ["dragleave", "drop"].forEach((eventName) => {
        imageDropArea.addEventListener(eventName, unhighlight, false);
        documentDropArea.addEventListener(eventName, unhighlight, false);
    });

    // Handle dropped files
    imageDropArea.addEventListener("drop", handleImageDrop, false);
    documentDropArea.addEventListener("drop", handleDocumentDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight(e) {
        this.style.borderColor = "#007bff";
        this.style.backgroundColor = "rgba(0, 123, 255, 0.1)";
    }

    function unhighlight(e) {
        this.style.borderColor = "#ccc";
        this.style.backgroundColor = "";
    }

    function handleImageDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length) {
            document.getElementById("attachmentInput").files = files;
            previewImage(document.getElementById("attachmentInput"));
        }
    }

    function handleDocumentDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length) {
            document.getElementById("documentInput").files = files;
            handleDocumentUpload(document.getElementById("documentInput"));
        }
    }
});

// Payment Dropdown Select

document.addEventListener("DOMContentLoaded", () => {
    const select = document.getElementById("payment_methods");
    const otherInput = document.getElementById("otherPayment");

    select.addEventListener("change", async function () {
        if (this.value === "Other") {
            const { value: custom } = await Swal.fire({
                title: "Enter custom payment type",
                input: "text",
                inputPlaceholder: "e.g. Bitcoin, PayPal, etc.",
                showCancelButton: true,
                confirmButtonText: "OK",
                cancelButtonText: "Cancel",
            });

            if (custom) {
                otherInput.value = custom;
                // Optionally change the select display text:
                this.querySelector(
                    'option[value="Other"]'
                ).textContent = `Other (${custom})`;
            } else {
                // User cancelled or left blank: reset select
                this.value = "";
                otherInput.value = "";
            }
        } else {
            // clear any previous custom
            otherInput.value = "";
            // restore the select option text if needed
            this.querySelector('option[value="Other"]').textContent = "Other";
        }
    });
});

// DataTables Init & Package Selection
$(document).ready(function () {
    let tableInit = false;
    let activeRowIndex = null;

    // Initialize or clear DataTable each time modal opens
    $("#packageModal").on("show.bs.modal", function () {
        if (!tableInit) {
            $("#packageTable").DataTable({
                processing: true,
                serverSide: true,
                ajax: "../admin/server_invoice.php",
                columns: [
                    {
                        data: "id",
                        orderable: false,
                        render: (id, _, row) => `
                <input type="checkbox" class="package-checkbox"
                       value="${id}"
                       data-title="${row.sku}"
                       data-category="${row.category}"
                       data-name="${row.items}"
                       data-rate="${row.price}"
                       data-quantity="${row.quantity}">`,
                    },
                    { data: "sku" },
                    { data: "category" },
                    { data: "items" },
                    {
                        data: "price",
                        render: (p) => `₱${parseFloat(p).toLocaleString()}`,
                    },
                    {
                        // new Qty column
                        data: "quantity",
                        title: "Qty",
                        orderable: true,
                    },
                ],
                order: [[1, "asc"]],
                lengthMenu: [5, 10, 25],
                pageLength: 5,
            });
            tableInit = true;
        }

        // clear any previous package-checkbox selection
        $("#packageTable").find("input.package-checkbox").prop("checked", false);
    });

    // When a row’s “Select Package” button is clicked…
    $(document).on("click", ".select-package-btn", function () {
        activeRowIndex = $(this).closest("tr").index();
        $("#packageTable").find("input.package-checkbox").prop("checked", false);
        $("#packageModal").modal("show");
    });

    // “Add Selected” handler now reads data-quantity
    $("#confirmPackages").on("click", function () {
        if (activeRowIndex === null) return;
        const box = document.querySelector(".package-checkbox:checked");
        if (!box) return;

        const title = box.dataset.title;
        const desc = box.dataset.name;
        const rate = parseFloat(box.dataset.rate) || 0;
        const qty = parseInt(box.dataset.quantity, 10) || 0;
        const $tr = $(".table-responsive tbody tr").eq(activeRowIndex);

        // Populate that specific row
        $tr.find('input[name="item_package_title[]"]').val(title);
        $tr.find('textarea[name="item_desc[]"]').val(desc);
        $tr.find('input[name="item_qty[]"]').val(qty);
        $tr.find('input[name="item_rate[]"]').val(rate);
        $tr.find(".item-amount").text(`₱${(qty * rate).toFixed(2)}`);

        $tr
            .find('input[name="item_qty[]"], input[name="item_rate[]"]')
            .trigger("input");

        $("#packageModal").modal("hide");
        activeRowIndex = null;

        renumberRows();
        if (typeof updateTotals === "function") updateTotals();
    });
});

// Other fees

(function () {
    let detailCount = 0;
    const template = document.getElementById("detailTemplate");
    const container = document.getElementById("detailsContainer");
    const btn = document.getElementById("addDetailsBtn");

    // Handler to add a new detail row
    btn.addEventListener("click", () => {
        detailCount++;
        const clone = template.cloneNode(true);
        clone.style.display = "flex";
        clone.id = "";

        // Update inputs
        clone.querySelectorAll("input[data-name]").forEach((input) => {
            const base = input.getAttribute("data-name");
            input.name = `${base}[${detailCount}]`;
            input.id = `${base}_${detailCount}`;
            input.value = "";
        });

        // Attach remove handler
        clone.querySelector(".remove-detail").addEventListener("click", () => {
            container.removeChild(clone);
            updateTotals();
        });

        container.appendChild(clone);
        updateTotals();
    });
})();

// Quantity × Rate to Amount and Totals

function recalcRow($tr) {
    const qty = parseFloat($tr.find('input[name="item_qty[]"]').val()) || 0;
    const rate = parseFloat($tr.find('input[name="item_rate[]"]').val()) || 0;
    const amount = qty * rate;
    $tr.find(".item-amount").text(`₱${amount.toFixed(2)}`);
    return amount;
}
function fmt(n) {
    return n.toLocaleString("en-PH", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });
}
function updateTotals() {
    // 1) sum invoice‐item rows
    let sub = 0;
    $(".table-responsive tbody tr").each(function () {
        sub += recalcRow($(this));
    });

    // 2) sum detail‐rows
    let detail = 0;
    $("#detailsContainer .detail-row").each(function () {
        const $r = $(this);
        const kids = parseFloat($r.find('input[id^="detail_kids"]').val()) || 0;
        const bed = parseFloat($r.find('input[name="bed"]').val()) || 0;
        const bf = parseFloat($r.find('input[name="breakfast"]').val()) || 0;
        const tp = parseFloat($r.find('input[name="transpo"]').val()) || 0;
        const af = parseFloat($r.find('input[name="airfare"]').val()) || 0;
        const isl = parseFloat($r.find('input[name="island_hopping"]').val()) || 0;
        detail += kids * (bed + bf + tp + af + isl);
    });
    sub += detail;

    // 3) calculate discount (amount or %)
    let discRaw = $("#discount_amount").val().trim();
    let disc = 0;
    if (discRaw.endsWith("%")) {
        let pct = parseFloat(discRaw.slice(0, -1)) || 0;
        disc = (sub * pct) / 100;
    } else {
        disc = parseFloat(discRaw) || 0;
    }

    // 4) read deposit (fixed amount)
    const dep = parseFloat($("#deposit_amount").val()) || 0;

    // 5) compute net total after discount & deposit
    const net = Math.max(sub - disc - dep, 0);

    // 6) write raw values for PHP
    $("#sub_total").val(net.toFixed(2)); // Sub Total after both
    $("#total_price").val(net.toFixed(2)); // Total after both
    $("#amount_due").val(net.toFixed(2)); // Amount Due after both

    // 7) display formatted values
    $("#sub_total_disp").val(fmt(net));
    $("#discount_amount_disp").val(fmt(disc));
    $("#total_price_disp").val(fmt(net));
    $("#amount_due_disp").val(fmt(net));
}

// Recalc on any relevant change
$(document).on(
    "input change",
    'input[name="item_qty[]"], input[name="item_rate[]"], ' +
    "#discount_amount, #deposit_amount, " +
    "#detailsContainer .detail-row input",
    updateTotals
);

// Initialize on load
$(document).ready(updateTotals);
