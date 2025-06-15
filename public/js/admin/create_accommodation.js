// Function to update page numbers for each entry
function updatePageNumbers() {
    $('.accommodation-entry').each(function(index) {
    $(this).find('.page-number').text(index + 1);
    });
}

$(document).ready(function() {
    // Confirmation for form submission
    $('.confirm-create').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);
    Swal.fire({
        title: 'Confirm Create',
        text: "Are you sure you want to add this new accommodation?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, create it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
        form.unbind('submit').submit();
        }
    });
    });

    // Alternative Cloning: Manually copy select values from the last entry
    $('#addEntry').click(function() {
    var lastEntry = $('#accommodationContainer .accommodation-entry').last();
    // Retrieve select values from the last entry
    var selectValues = [];
    lastEntry.find('select').each(function() {
        selectValues.push($(this).val());
    });
    // Clone the last entry without events
    var newEntry = lastEntry.clone(false);
    // Clear only inputs and textareas with clearDefault class
    newEntry.find('input.clearDefault').val('');
    newEntry.find('textarea.clearDefault').val('');
    // For each select in newEntry, set its value to the corresponding one in selectValues
    newEntry.find('select').each(function(index) {
        $(this).val(selectValues[index]);
    });
    // Append new entry and update page numbers
    $('#accommodationContainer').append(newEntry);
    updatePageNumbers();
    });

    // Remove an entry and update page numbers
    $(document).on('click', '.remove-entry', function() {
    if ($('.accommodation-entry').length > 1) {
        $(this).closest('.accommodation-entry').remove();
        updatePageNumbers();
    } else {
        alert("At least one entry is required.");
    }
    });

    // Pet Friendly event delegation
    $(document).on('change', '.petFriendly', function() {
    var selectElement = $(this);
    var container = selectElement.closest('.accommodation-entry');
    if (selectElement.val() === 'yes_with_fee') {
        Swal.fire({
        title: 'Pet Fee Description',
        input: 'text',
        inputLabel: 'Enter fee description (e.g., 200 per pet):',
        inputPlaceholder: 'Enter fee description',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
            return 'You need to enter a fee description!';
            }
        }
        }).then((result) => {
        if (result.isConfirmed) {
            container.find('.petFeeDesc').val(result.value);
            container.find('.petFeeDisplay').text('Pet Fee: ' + result.value).show();
        } else {
            selectElement.val('yes_free');
            container.find('.petFeeDesc').val('');
            container.find('.petFeeDisplay').hide().text('');
        }
        });
    } else {
        container.find('.petFeeDesc').val('');
        container.find('.petFeeDisplay').hide().text('');
    }
    });

    // Function Hall event delegation
    $(document).on('change', '.functionHall', function() {
    var selectElement = $(this);
    var container = selectElement.closest('.accommodation-entry');
    if (selectElement.val() === 'yes') {
        Swal.fire({
        title: 'Function Hall Quantity',
        input: 'number',
        inputLabel: 'Enter the quantity:',
        inputPlaceholder: 'e.g., 3',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
            return 'You need to enter a quantity!';
            }
        }
        }).then((result) => {
        if (result.isConfirmed) {
            container.find('.functionHallQty').val(result.value);
            container.find('.functionHallDisplay').text('Quantity: ' + result.value).show();
        } else {
            selectElement.val('no');
            container.find('.functionHallQty').val('');
            container.find('.functionHallDisplay').hide().text('');
        }
        });
    } else {
        container.find('.functionHallQty').val('');
        container.find('.functionHallDisplay').hide().text('');
    }
    });
});


// archived or restoring user
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const status = params.get('status');
    const message = params.get('message');

    if(status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Added new accommodation',
            text: 'successfully inserted accommodation',
            timer: 1000,
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
    else if(status === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: decodeURIComponent(message),
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
});