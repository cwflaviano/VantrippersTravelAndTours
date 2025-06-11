// Combined filtering function
function filterCards() {
    var query = $('#searchBar').val().toLowerCase();

    // Collect all selected star ratings
    var selectedRatings = [];
    $('.star-rating-checkbox:checked').each(function() {
        selectedRatings.push($(this).val());
    });

    // Iterate over each card
    $('.package-card').each(function() {
        var cardText = $(this).text().toLowerCase();
        
        // Check if it matches the search query
        var matchesSearch = cardText.indexOf(query) !== -1;

        // Check if it matches the selected star ratings
        // If no checkboxes are selected, that means "show all"
        var matchesStar = (selectedRatings.length === 0);
        if (!matchesStar) {
            // We look for the star rating value in the card text
            // For example, if the card says "Star Rating: 3"
            // and we have selectedRatings = ["3"], that should match
            // But simpler is to just check for each rating in the card text
            $.each(selectedRatings, function(index, rating) {
                // e.g. rating = "3"
                // If the text says "star rating: 3", then it matches
                if (cardText.indexOf("star rating: " + rating) !== -1) {
                    matchesStar = true;
                    return false; // break out of the loop
                }
            });
        }

        // Show the card if it matches both search and star rating filters
        $(this).toggle(matchesSearch && matchesStar);
    });
}

$(document).ready(function() {
    // On keyup in search bar, filter
    $('#searchBar').on('keyup', function() {
        filterCards();
    });

    // On change in star rating checkboxes, filter
    $('.star-rating-checkbox').on('change', function() {
        filterCards();
    });

    // Reset button
    $('#resetFiltersBtn').on('click', function() {
        $('#searchBar').val('');
        $('.star-rating-checkbox').prop('checked', false);
        filterCards();
    });
});
