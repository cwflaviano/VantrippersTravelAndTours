$(document).ready(function() {
    $('#example1').DataTable({
        "stateSave": true,
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "ajax": {
            url: "http://localhost/VantrippersTravelAndTours/public/admin/crm/sales/packages/fetch", // Relative to current file
            type: 'POST',
            data: function(d) {
                d.csrf_token_name = '<?php echo csrf_token(); ?>';
                d.csrf_token_value = '<?php echo csrf_hash(); ?>';
            },
            error: function(xhr, error, thrown) {
                console.log('AJAX Error:', xhr.responseText, error, thrown);
                alert('Error loading data: ' + error);
            }
        },
        "order": [[0, "desc"]],
        "scrollX": true,
        "columns": [{
                "data": "id"
            },
            {
                "data": "place"
            },
            {
                "data": "email"
            },
            {
                "data": "contact"
            },
            {
                "data": "description",
                "render": function(data, type, row) {
                    var maxLength = 10;
                    return '<a href="#" onclick="showFullDescription(event, \'' + encodeURIComponent(data) + '\')" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> View</a>';
                }
            },
            {
                "data": "remarks",
                "render": function(data, type, row) {
                    var maxLength = 10;
                    return '<a href="#" onclick="showFullRemarks(event, \'' + encodeURIComponent(data) + '\')" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> View</a>';
                }
            },
            {
                "data": "fb",
                "render": function(data, type, row) {
                    return '<a href="' + data + '" target="_blank">Website</a>';
                }
            },
            {
                "data": "hotel_name"
            },
            {
                "data": "room_type"
            },
            {
                "data": "total_rate",
                "render": function(data, type, row) {
                    return '₱' + data;
                }
            },
            {
                "data": "per_head",
                "render": function(data, type, row) {
                    return '₱' + data;
                }
            },
            {
                "data": "capacity"
            },
            {
                "data": "star_rating"
            },
            {
                "data": "pet_friendly"
            },
            {
                "data": "breakfast"
            },
            {
                "data": "pool"
            },
            {
                "data": "elevator"
            },
            {
                "data": "function_hall"
            },
            {
                "data": "beachfront"
            },
            {
                "data": "distance_from"
            },
            {
                "data": "distance_location"
            },
            {
                "data": "area"
            },
            {
                "data": "pin_location"
            },
            {
                "data": "can_accommodate"
            },
            {
                "data": "created_by"
            },
            {
                "data": "updated_by"
            },
            {
                "data": null,
                "orderable": false,
                "render": function(data, type, row) {
                    return '<a href="' + row.id + '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a> ' +
                        '<a href="' + row.id + '" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash"></i> Delete</a>';
                }
            }
        ]
    });

    // Delete confirmation using SweetAlert2
    $(document).on('click', '.delete-link', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete this record?",
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

// Function to show full description in modal
function showFullDescription(event, encodedDescription) {
    event.preventDefault();
    var fullText = decodeURIComponent(encodedDescription);
    document.getElementById('fullDescriptionContent').innerText = fullText;
    var descriptionModal = new bootstrap.Modal(document.getElementById('descriptionModal'));
    descriptionModal.show();
}

// Function to show full remarks in modal
function showFullRemarks(event, encodedRemarks) {
    event.preventDefault();
    var fullText = decodeURIComponent(encodedRemarks);
    document.getElementById('fullRemarksContent').innerText = fullText;
    var remarksModal = new bootstrap.Modal(document.getElementById('remarksModal'));
    remarksModal.show();
}