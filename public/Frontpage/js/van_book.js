// Initialize Bootstrap tooltips
document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll(".wizard-step");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const submitBtn = document.getElementById("submitBtn");
    const progressBar = document.querySelector(".progress-bar");
    let currentStep = 0;

    // Show the current step
    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.toggle("active", index === stepIndex);
        });
        prevBtn.disabled = stepIndex === 0;
        nextBtn.style.display =
            stepIndex === steps.length - 1 ? "none" : "inline-block";
        submitBtn.style.display =
            stepIndex === steps.length - 1 ? "inline-block" : "none";
        updateProgressBar(stepIndex);
    }

    // Update the progress bar
    function updateProgressBar(stepIndex) {
        const progress = ((stepIndex + 1) / steps.length) * 100;
        progressBar.style.width = `${progress}%`;
        progressBar.setAttribute("aria-valuenow", progress);
    }

    // Validate the current step
    function validateStep(stepIndex) {
        const currentStepFields = steps[stepIndex].querySelectorAll(
            "input, select, textarea"
        );
        let isValid = true;
        currentStepFields.forEach((field) => {
            if (!field.checkValidity()) {
                isValid = false;
                field.classList.add("is-invalid");
            } else {
                field.classList.remove("is-invalid");
            }
        });
        return isValid;
    }

    // Next button click
    nextBtn.addEventListener("click", function () {
        if (validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        }
    });

    // Previous button click
    prevBtn.addEventListener("click", function () {
        currentStep--;
        showStep(currentStep);
    });

    // Form submission
    document
        .getElementById("bookingForm")
        .addEventListener("submit", function (event) {
            if (!validateStep(currentStep)) {
                event.preventDefault();
                event.stopPropagation();
            }
        });

    // Initialize the wizard
    showStep(currentStep);
});


// Address autocomplete function for pickup and dropoff locations.
function initAddressAutocomplete(inputSelector, suggestionsSelector) {
    var debounceTimer;
    $(inputSelector).on('input', function() {
        clearTimeout(debounceTimer);
        var query = $(this).val();
        if (query.length < 3) {
            $(suggestionsSelector).empty();
            return;
        }
        debounceTimer = setTimeout(function() {
            $.ajax({
                url: 'https://nominatim.openstreetmap.org/search',
                data: {
                    q: query + ', Philippines',
                    format: 'json',
                    addressdetails: 1,
                    limit: 5,
                    viewbox: '116.5,4.5,126.5,21.5',
                    bounded: 1,
                    countrycodes: 'ph',
                    featuretype: 'city,town,village,neighbourhood'
                },
                dataType: 'json',
                headers: {
                    'User-Agent': 'Vantrippers Travel and Tour'
                },
                success: function(data) {
                    var suggestions = $(suggestionsSelector);
                    suggestions.empty();
                    if (data.length > 0) {
                        data.forEach(function(item) {
                            var address = item.display_name;
                            var li = $('<li>').text(address).on('click', function() {
                                $(inputSelector).val(address);
                                suggestions.empty();
                            });
                            suggestions.append(li);
                        });
                    } else {
                        suggestions.append('<li>No results found</li>');
                    }
                },
                error: function(xhr, status, error) {
                    $(suggestionsSelector).empty().append('<li>Failed to fetch suggestions</li>');
                    console.error('Error fetching suggestions:', error);
                }
            });
        }, 100);
    });
    $(document).on('click', function(event) {
        if (!$(event.target).closest(inputSelector).length) {
            $(suggestionsSelector).empty();
        }
    });
}





$(document).ready(function() {
    initAddressAutocomplete('#pickupLocation', '#pickup-suggestions');
    initAddressAutocomplete('#dropoffLocation', '#dropoff-suggestions');
});

// Automatically copy pickup location value to dropoff location when the checkbox is checked.
const pickupLocation = document.getElementById('pickupLocation');
const dropoffLocation = document.getElementById('dropoffLocation');
const sameAsPickup = document.getElementById('sameAsPickup');

sameAsPickup.addEventListener('change', function() {
    if (this.checked) {
        dropoffLocation.value = pickupLocation.value;
    } else {
        dropoffLocation.value = '';
    }
});

pickupLocation.addEventListener('input', function() {
    if (sameAsPickup.checked) {
        dropoffLocation.value = this.value;
    }
});

        
$(document).ready(function () {
    $("#bookingForm").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Show confirmation dialog first
        Swal.fire({
            title: "Confirm Booking",
            text: "Are you sure you want to submit your booking?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes, submit!",
            cancelButtonText: "Cancel",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData(this);
                $.ajax({
                    url: "van_process_booking.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log("Server response:", response); // Debug log

                        // If the response indicates a redirect (i.e., booking already made)
                        if (response.redirect) {
                            Swal.fire({
                                title: "Booking Already Made",
                                text: response.message,
                                icon: "info",
                            }).then(() => {
                                window.location.href = "index.php";
                            });
                        } else if (response.success) {
                            Swal.fire({
                                title: "Booking Successful!",
                                text: response.message,
                                icon: "success",
                            }).then(() => {
                                window.location.href = "index.php";
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error",
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", error);
                        Swal.fire({
                            title: "Submission Failed!",
                            text: "An error occurred while processing your booking. Please try again.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
});