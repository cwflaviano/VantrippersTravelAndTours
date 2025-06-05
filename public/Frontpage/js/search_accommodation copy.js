$(document).ready(function() {
    $('.nav-link[data-widget="pushmenu"]').on('click', function() {
        setTimeout(() => {
            if ($('body').hasClass('sidebar-collapse')) {
                $('.logo-circle').hide();
                $('.logo-responsive').show();
            } else {
                $('.logo-circle').show();
                $('.logo-responsive').hide();
            }
        }, 100);
    });
});

$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.hotel-card').each(function() {
            $(this).closest('.col-12.col-md-6').toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

$(document).ready(function() {
    // Load saved filter state from localStorage for inputs and checkboxes
    function loadFilterState() {
        $('#searchInput').val(localStorage.getItem('searchValue') || '');
        $('#minPrice, #minRange').val(localStorage.getItem('minPrice') || 1000);
        $('#maxPrice, #maxRange').val(localStorage.getItem('maxPrice') || 200000);
       $('input[name="sort"][value="' + (localStorage.getItem('sort') || 'low-high') + '"]').prop('checked', true);

    
        // For star rating checkboxes
        ['5stars', '4stars', '3stars', '2stars', '1stars'].forEach(function(id) {
            $('#' + id).prop('checked', localStorage.getItem(id) === 'true');
        });
    
        // For dynamic place category checkboxes using the class "placeFilter"
        $('input[type=checkbox].placeFilter').each(function() {
            $(this).prop('checked', localStorage.getItem($(this).attr('id')) === 'true');
        });
    
        // For dynamic pax checkboxes using the class "paxFilter"
        $('input[type=checkbox].paxFilter').each(function() {
            $(this).prop('checked', localStorage.getItem($(this).attr('id')) === 'true');
        });
    
        // For other filters, including the pet friendly filter
        ['elevatorFilter', 'breakfastFilter', 'poolFilter', 'functionHallFilter', 'petFilter'].forEach(function(id) {
            $('#' + id).prop('checked', localStorage.getItem(id) === 'true');
        });
    }
    
    // Save current filter state to localStorage for inputs and checkboxes
    function saveFilterState() {
        localStorage.setItem('searchValue', $('#searchInput').val());
        localStorage.setItem('minPrice', $('#minPrice').val());
        localStorage.setItem('maxPrice', $('#maxPrice').val());
        localStorage.setItem('sortPrice', $('input[name="sortPrice"]:checked').val());
    
        ['5stars', '4stars', '3stars', '2stars', '1stars'].forEach(function(id) {
            localStorage.setItem(id, $('#' + id).is(':checked'));
        });
    
        $('input[type=checkbox].placeFilter').each(function() {
            localStorage.setItem($(this).attr('id'), $(this).is(':checked'));
        });
    
        $('input[type=checkbox].paxFilter').each(function() {
            localStorage.setItem($(this).attr('id'), $(this).is(':checked'));
        });
    
        // Include petFilter along with other filters
        ['elevatorFilter', 'breakfastFilter', 'poolFilter', 'functionHallFilter', 'petFilter'].forEach(function(id) {
            localStorage.setItem(id, $('#' + id).is(':checked'));
        });
        
        // Add state saving for the favorites filter
        localStorage.setItem('favoritesFilter', $('#favoritesFilterButton').hasClass('active'));
    }
    
    
    // Function that applies filters on hotel cards
    function applyFilters() {
        var searchValue = $('#searchInput').val().toLowerCase();
        var minPrice = parseFloat($('#minPrice').val());
        var maxPrice = parseFloat($('#maxPrice').val());
    
        $('.hotel-card').closest('.col-12.col-md-6').each(function() {
            var cardText = $(this).text().toLowerCase();
            var show = true;
    
            // Search text filter
            if (cardText.indexOf(searchValue) === -1) {
                show = false;
            }
    
            // Price filter – expects text pattern "Total Price: PHP <number>"
            var priceMatch = cardText.match(/total price:\s*php\s*([\d,]+)/);
            if (priceMatch) {
                var price = parseFloat(priceMatch[1].replace(/,/g, ''));
                if (price < minPrice || price > maxPrice) {
                    show = false;
                }
            }
    
            // Star Rating filter
            var starFilters = [];
            if ($('#5stars').is(':checked')) starFilters.push(5);
            if ($('#4stars').is(':checked')) starFilters.push(4);
            if ($('#3stars').is(':checked')) starFilters.push(3);
            if ($('#2stars').is(':checked')) starFilters.push(2);
            if ($('#1stars').is(':checked')) starFilters.push(1);
            if (starFilters.length > 0) {
                var starsCount = $(this).find('.stars').text().trim().length;
                if ($.inArray(starsCount, starFilters) === -1) {
                    show = false;
                }
            }
    
            // Place Category filter: dynamically select checked place category values
            var placeFilters = [];
            $('input[type=checkbox].placeFilter').each(function() {
                if ($(this).is(':checked')) {
                    placeFilters.push($(this).val().toLowerCase());
                }
            });
            $('.placeFilter').on('change', function() {
                // Collect all selected place filters
                const selectedPlaces = [];
                $('.placeFilter:checked').each(function() {
                    selectedPlaces.push($(this).val());
                });
    
                // Update the URL with the new filters and reset to page 1
                const url = new URL(window.location.href);
                url.searchParams.delete('placeCategories[]');
                selectedPlaces.forEach(place => {
                    url.searchParams.append('placeCategories[]', place);
                });
                url.searchParams.set('page', '1'); // Always reset to first page when filters change
    
                window.location.href = url.toString();
            });
    
            // Updated code in applyFilters()
            var placeFilters = [];
            $('input[type=checkbox].placeFilter').each(function() {
                if ($(this).is(':checked')) {
                    placeFilters.push($(this).val().toLowerCase());
                }
            });
            if (placeFilters.length > 0) {
                // Get the specific text from the element showing the place (assumes it's in the first h3 with class 'card-title')
                var cardPlace = $(this).find('h3.card-title').first().text().toLowerCase();
                var placeFound = placeFilters.some(function(filter) {
                    return cardPlace.indexOf(filter) > -1;
                });
                if (!placeFound) {
                    show = false;
                }
            }
    
            var capacityFilters = [];
            $('input[type=checkbox].paxFilter:checked').each(function() {
                capacityFilters.push($(this).val().toString());
            });
            if (capacityFilters.length > 0) {
                var cardCapacity = $(this).find('.hotel-card').data('capacity');
                if ($.inArray(cardCapacity.toString(), capacityFilters) === -1) {
                    show = false;
                }
            }
    
            // Pet Friendly Filter
            if ($('#petFilter').is(':checked') && cardText.indexOf("pet friendly") === -1) {
                show = false;
            }
    
            // With Elevator Filter
            if ($('#elevatorFilter').is(':checked') && cardText.indexOf("w/ elevator") === -1) {
                show = false;
            }
            // With Breakfast Filter
            if ($('#breakfastFilter').is(':checked') && cardText.indexOf("w/ breakfast") === -1) {
                show = false;
            }
            // With Pool Filter
            if ($('#poolFilter').is(':checked') && cardText.indexOf("w/ pool") === -1) {
                show = false;
            }
            // With Function Hall Filter
            if ($('#functionHallFilter').is(':checked') && cardText.indexOf("w/ function hall") === -1) {
                show = false;
            }
    
            $(this).toggle(show);
        });
    }
    
    $('#searchInput').on('keyup', function() {
        saveFilterState();
        applyFilters();
    });
    $('.sidebar-card input[type=checkbox]').on('change', function() {
        saveFilterState();
        applyFilters();
    });
    $('#minPrice, #maxPrice, #minRange, #maxRange').on('input', function() {
        saveFilterState();
        applyFilters();
    });
    $('input[name="sortPrice"]').on('change', function() {
        saveFilterState();
        applyFilters();
    });
    
    loadFilterState();
    applyFilters();
    
    $('#resetFilters').on('click', function(e) {
        e.preventDefault();
        localStorage.clear();
        // Create a URL object based on the current URL.
        var url = new URL(window.location.href);
        // Remove the favorites filter parameter.
        url.searchParams.delete('favorites');
        // Optionally clear other parameters you want to reset:
        url.searchParams.delete('search');
        url.searchParams.delete('minPrice');
        url.searchParams.delete('maxPrice');
        url.searchParams.delete('starRatings[]');
        url.searchParams.delete('placeCategories[]');
        url.searchParams.delete('page');
        // Set the sort parameter back to default low-to-high.
        url.searchParams.set('sort', 'low-high');
        // Reload the page with the updated URL.
        window.location.href = url.toString();
    });
    
});

document.querySelectorAll('input[name="sortPrice"]').forEach(function(el) {
    el.addEventListener('change', function() {
        const selectedSort = this.value;
        const currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('sort', selectedSort);
        currentUrl.searchParams.set('page', 1); // Reset to page 1 when sorting changes
        window.location.href = currentUrl.toString();
    });
});

window.addEventListener('load', function() {
    // Detect if the page is being reloaded
    const navEntries = performance.getEntriesByType("navigation");
    if (navEntries.length > 0 && navEntries[0].type === 'reload') {
        const urlParams = new URLSearchParams(window.location.search);
        // If the current page is not 1, reset it
        if (urlParams.get('page') !== '1') {
            urlParams.set('page', '1');
            const newUrl = window.location.pathname + '?' + urlParams.toString();
            // Replace the current history entry without reloading the page again
            window.history.replaceState({}, '', newUrl);
        }
    }
});


document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-to-fav').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const hotelId = this.dataset.hotelId;

            Swal.fire({
                title: 'Add to Favorites?',
                text: "Do you want to add this hotel to your favorites?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#f0ad4e',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('update_favorite.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'id=' + encodeURIComponent(hotelId),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Added!',
                                    text: 'Hotel has been added to your favorites.',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                console.log('Server responded:', data);
                                Swal.fire('Error!', data.message || 'Failed to update favorite.', 'error');
                            }
                        })
                        .catch(err => {
                            console.error('Fetch error:', err);
                            Swal.fire('Error!', 'Something went wrong with the request.', 'error');
                        });
                }
            });
        });
    });
});

$(document).ready(function(){

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-to-fav').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const hotelId = this.dataset.hotelId;
    
                Swal.fire({
                    title: 'Add to Favorites?',
                    text: "Do you want to add this hotel to your favorites?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#f0ad4e',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, add it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('update_favorite.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'id=' + encodeURIComponent(hotelId),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Added!',
                                    text: 'Hotel has been added to your favorites.',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                console.log('Server responded:', data);
                                Swal.fire('Error!', data.message || 'Failed to update favorite.', 'error');
                            }
                        })
                        .catch(err => {
                            console.error('Fetch error:', err);
                            Swal.fire('Error!', 'Something went wrong with the request.', 'error');
                        });
                    }
                });
            });
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