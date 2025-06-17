document.addEventListener("DOMContentLoaded", function () {
    var gridViewBtn = document.getElementById("grid-view");
    var listViewBtn = document.getElementById("list-view");
    var hotelCols = document.querySelectorAll("#hotel-container .hotel-col");

    // Helper functions to apply view styles
    function applyGridView() {
        gridViewBtn.classList.add("active");
        listViewBtn.classList.remove("active");
        hotelCols.forEach(function (col) {
            col.classList.remove("col-12");
            col.classList.add("col-sm-6", "col-md-4");
        });
    }

    function applyListView() {
        listViewBtn.classList.add("active");
        gridViewBtn.classList.remove("active");
        hotelCols.forEach(function (col) {
            col.classList.remove("col-sm-6", "col-md-4");
            col.classList.add("col-12");
        });
    }

    // Set the view and save the state permanently
    function setGridView() {
        applyGridView();
        localStorage.setItem("viewMode", "grid");
    }

    function setListView() {
        applyListView();
        localStorage.setItem("viewMode", "list");
    }

    // Attach event listeners to view toggle buttons
    gridViewBtn.addEventListener("click", setGridView);
    listViewBtn.addEventListener("click", setListView);

    // Check saved view on page load and apply it;
    // if no saved value, default to grid view.
    var savedView = localStorage.getItem("viewMode");
    if (savedView === "list") {
        applyListView();
    } else {
        applyGridView();
        // Optionally, you could call setGridView() here to save the default choice if desired.
    }

    // Reset Filters Button
    document
        .getElementById("reset-filters")
        .addEventListener("click", function () {
            // Reset only the filter form fields:
            document.getElementById("filtersForm").reset();

            // If you are making an AJAX request after reset or reloading content,
            // reapply the saved view state after filtering re-renders the content.
            var currentView = localStorage.getItem("viewMode");
            if (currentView === "list") {
                applyListView();
            } else {
                applyGridView();
            }
        });
});
