const minPriceInput = document.getElementById("minPrice");
const minRange = document.getElementById("minRange");
const maxPriceInput = document.getElementById("maxPrice");
const maxRange = document.getElementById("maxRange");
const rangeValue = document.getElementById("rangeValue");

function formatPrice(value) {
    return `₱${parseInt(value).toLocaleString()}`;
}

function updateRangeDisplay() {
    rangeValue.textContent = `${formatPrice(minPriceInput.value)} - ${formatPrice(maxPriceInput.value)}`;
}

// Sync min price input with min range slider
minRange.addEventListener("input", function() {
    let value = parseInt(this.value);
    if (value >= parseInt(maxPriceInput.value)) {
        value = parseInt(maxPriceInput.value) - 100;
    }
    minPriceInput.value = value;
    this.value = value;
    updateRangeDisplay();
});

minPriceInput.addEventListener("input", function() {
    let value = parseInt(this.value) || 1000;
    if (value < 1000) value = 1000;
    if (value >= parseInt(maxPriceInput.value)) {
        value = parseInt(maxPriceInput.value) - 100;
    }
    this.value = value;
    minRange.value = value;
    updateRangeDisplay();
});

// Sync max price input with max range slider
maxRange.addEventListener("input", function() {
    let value = parseInt(this.value);
    if (value <= parseInt(minPriceInput.value)) {
        value = parseInt(minPriceInput.value) + 100;
    }
    maxPriceInput.value = value;
    this.value = value;
    updateRangeDisplay();
});

maxPriceInput.addEventListener("input", function() {
    let value = parseInt(this.value) || 200000;
    if (value > 200000) value = 200000;
    if (value <= parseInt(minPriceInput.value)) {
        value = parseInt(minPriceInput.value) + 100;
    }
    this.value = value;
    maxRange.value = value;
    updateRangeDisplay();
});

// Initialize display
updateRangeDisplay();




$(document).ready(function(){
    // Event handler for "Add to Favorite" button
    $(document).on('click', '.add-to-fav', function(e){
        e.preventDefault();
        var hotelId = $(this).data('hotel-id');
        
        // Show confirmation dialog
        Swal.fire({
            title: 'Add to Favorites?',
            text: "Do you want to add this hotel to your favorites?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Make AJAX request to update the favorite status
                $.ajax({
                    url: 'update_favorite.php', // Update the URL if necessary.
                    type: 'POST',
                    data: { update_favorite: true, id: hotelId },
                    success: function(response) {
                        var trimmedResponse = $.trim(response);
                        console.log("Response: [" + trimmedResponse + "]");
                        
                        if (trimmedResponse === "Success") {
                            Swal.fire({
                                title: 'Success',
                                text: 'Hotel has been added to favorites.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(function() {
                                // Reload the page after the alert is closed
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: trimmedResponse,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Update failed. Please try again.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });

    // Accordion behavior (if needed)
    document.querySelectorAll(".accordion-header").forEach(header => {
        header.addEventListener("click", function() {
            let parent = this.parentElement;
            let isActive = parent.classList.contains("active");
            document.querySelectorAll(".accordion-item").forEach(item => {
                item.classList.remove("active");
            });
            if (!isActive) {
                parent.classList.add("active");
            }
        });
    });
});