$(document).ready(function() {
    // Initialize DataTable
    $('#example1').DataTable({
        stateSave: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: fetch_data,
        order: [[0, 'desc']],
        scrollX: true,
        columns: [
            { data: 'id' },
            { data: 'sku' },
            { data: 'quantity' },
            { data: 'category' },
            {
                data: 'items',
                orderable: false,
                render: function(data, type, row) {
                    return '<button class="btn btn-outline-info btn-sm view-items-btn" ' +
                           'data-items="' + $('<div>').text(data).html() + '"><i class="fas fa-eye"></i> View</button>';
                }
            },
            {
                data: 'item_full_details',
                orderable: false,
                render: function(data, type, row) {
                    return '<button class="btn btn-outline-info btn-sm view-details-btn" ' +
                           'data-details="' + $('<div>').text(data).html() + '"><i class="fas fa-eye"></i> View</button>';
                }
            },
            { data: 'price' },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return '<a href="'+ "edit" + row.id + '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a> ' +
                           '<a href="'+ "delete" + row.id + '" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash"></i> Delete</a>';
                }
            }
        ]
    });

    // Items modal
    $(document).on('click', '.view-items-btn', function() {
        var items = $(this).attr('data-items');
        $('#modal-items-content').html(items);
        var modal = new bootstrap.Modal(document.getElementById('itemsModal'));
        modal.show();
    });

    // Details modal
    $(document).on('click', '.view-details-btn', function() {
        var details = $(this).attr('data-details');
        $('#modal-details-content').html(details);
        var modal = new bootstrap.Modal(document.getElementById('detailsModal'));
        modal.show();
    });

    // Delete confirmation
    $(document).on('click', '.delete-link', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you really want to delete this record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        });
    });
});

// Copy button for details modal
document.addEventListener('DOMContentLoaded', function() {
    const copyBtn = document.getElementById('copyDetailsBtn');
    copyBtn.addEventListener('click', function() {
        const content = document.getElementById('modal-details-content').innerText;
        navigator.clipboard.writeText(content).then(() => {
            this.textContent = 'Copied';
            this.disabled = true;
            setTimeout(() => {
                this.textContent = 'Copy';
                this.disabled = false;
            }, 2000);
        }).catch(err => {
            console.error('Copy failed', err);
        });
    });
});