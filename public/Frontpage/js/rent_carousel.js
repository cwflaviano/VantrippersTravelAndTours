document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll("#carouselRow .col-md-4");
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");
  const paginationDotsContainer = document.getElementById("paginationDots");

  // Determine itemsPerPage dynamically based on window width
  let itemsPerPage = window.innerWidth < 991 ? 1 : 3;
  let currentPage = 0;
  let totalPages = Math.ceil(cards.length / itemsPerPage);

  // Function to update pagination dots
  function updatePaginationDots() {
    paginationDotsContainer.innerHTML = "";
    for (let i = 0; i < totalPages; i++) {
      const dot = document.createElement("span");
      dot.className = "dot";
      if (i === currentPage) dot.classList.add("active");
      dot.dataset.index = i;
      dot.addEventListener("click", function () {
        currentPage = parseInt(this.dataset.index);
        showPage(currentPage);
      });
      paginationDotsContainer.appendChild(dot);
    }
  }

  // Function to show the cards of the current page using Bootstrap's d-none
  function showPage(page) {
    cards.forEach((card, index) => {
      if (
        index >= page * itemsPerPage &&
        index < page * itemsPerPage + itemsPerPage
      ) {
        card.classList.remove("d-none");
      } else {
        card.classList.add("d-none");
      }
    });
    updatePaginationDots();
  }

  // Update itemsPerPage on window resize
  function updateCarouselSettings() {
    const previousItemsPerPage = itemsPerPage;
    itemsPerPage = window.innerWidth < 991 ? 1 : 3;
    totalPages = Math.ceil(cards.length / itemsPerPage);
    // If the current page is out of range, reset it
    if (currentPage >= totalPages) {
      currentPage = 0;
    }
    if (itemsPerPage !== previousItemsPerPage) {
      showPage(currentPage);
    }
  }

  // Initial display of cards
  showPage(currentPage);

  // Navigation button events
  prevBtn.addEventListener("click", function () {
    currentPage = (currentPage - 1 + totalPages) % totalPages;
    showPage(currentPage);
  });

  nextBtn.addEventListener("click", function () {
    currentPage = (currentPage + 1) % totalPages;
    showPage(currentPage);
  });

  // Listen for window resize events
  window.addEventListener("resize", updateCarouselSettings);

  // Modal functionality for "View Details" buttons
  const viewDetailsButtons = document.querySelectorAll(".view-details");
  viewDetailsButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      var myModal = new bootstrap.Modal(
        document.getElementById("serviceModal")
      );
      myModal.show();
    });
  });
});

// View modal of VAN RENTAL CAROUSEL

document.addEventListener("DOMContentLoaded", function () {
  var serviceModal = document.getElementById("serviceModal");
  serviceModal.addEventListener("show.bs.modal", function (event) {
    var button = event.relatedTarget; // Button that triggered the modal

    // Retrieve data attributes from the clicked button
    var serviceId = button.getAttribute("data-id"); // Optional
    var title = button.getAttribute("data-title");
    var price = button.getAttribute("data-price");
    var image = button.getAttribute("data-image");
    var description = button.getAttribute("data-description");
    var inclusion = button.getAttribute("data-inclusion");
    var exclusion = button.getAttribute("data-exclusion");
    var status = button.getAttribute("data-status"); // New status attribute

    // Determine badge based on status (0 = available, 1 = not available)
    var statusBadge =
      status === "0"
        ? '<span class="badge bg-success">Available</span>'
        : '<span class="badge bg-danger">Not Available</span>';

    // Update the modal's content.
    document.getElementById("modalServiceTitle").innerHTML =
      "<strong>Car Model:</strong> " + title;
    document.getElementById("modalServicePrice").innerHTML =
      "<strong>Rental Cost (Per Day): </strong> " + price;
    document.getElementById("modalServiceStatus").innerHTML =
      "<strong>Status:</strong> " + statusBadge;
    document.getElementById("modalServiceImage").src = image;
    document.getElementById("modalServiceDescription").innerHTML =
      "<strong>Description:</strong> " + description;
    document.getElementById("modalServiceInclusion").innerHTML =
      "<strong>Inclusion:</strong> " + inclusion;
    document.getElementById("modalServiceExclusion").innerHTML =
      "<strong>Exclusion:</strong> " + exclusion;
  });
});

document
  .getElementById("serviceModal")
  .addEventListener("hidden.bs.modal", function () {
    const backdrops = document.querySelectorAll(".modal-backdrop");
    backdrops.forEach((backdrop) => backdrop.remove());
  });

// Notification Disappear Script
$(document).ready(function () {
  setTimeout(function () {
    $(".alert").fadeOut("slow");
  }, 5000); // 5000ms = 5 seconds
});
