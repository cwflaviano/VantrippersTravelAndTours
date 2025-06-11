document.addEventListener("DOMContentLoaded", function () {
    let navbarToggler = document.querySelector(".navbar-toggler");
    let navbarCollapse = document.querySelector(".collapse.navbar-collapse");
    let navLinks = document.querySelectorAll(".nav-link");
    let dropdownToggles = document.querySelectorAll(".dropdown-toggle");

    // Define desktop breakpoint (xl in Bootstrap is 1200px)
    const desktopBreakpoint = 1200;

    // Create and add close button to mobile menu
    const closeButton = document.createElement("button");
    closeButton.className = "btn-close mobile-menu-close";
    closeButton.setAttribute("aria-label", "Close menu");
    closeButton.style.position = "absolute";
    closeButton.style.top = "15px";
    closeButton.style.right = "15px";
    closeButton.style.display = "none";

    // Add close button to navbar collapse
    navbarCollapse.appendChild(closeButton);

    // Show/hide close button based on window size
    function toggleCloseButtonVisibility() {
        if (window.innerWidth < desktopBreakpoint) {
            closeButton.style.display = navbarCollapse.classList.contains("show")
                ? "block"
                : "none";
        } else {
            closeButton.style.display = "none";
        }
    }

    // Toggle mobile menu
    navbarToggler.addEventListener("click", function () {
        navbarCollapse.classList.toggle("show");
        toggleCloseButtonVisibility();
    });

    // Close button functionality
    closeButton.addEventListener("click", function () {
        navbarCollapse.classList.remove("show");
        toggleCloseButtonVisibility();
    });

    // Handle nav link clicks
    navLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            // Don't close dropdown if clicking a link inside the dropdown menu
            if (this.closest(".dropdown-menu")) {
                e.stopPropagation(); // Prevent event from bubbling up
                return; // Exit the function early
            }

            // Apply active state only in desktop view
            if (window.innerWidth >= desktopBreakpoint) {
                // Remove active class from all links
                navLinks.forEach((item) => {
                    item.classList.remove("active");
                });

                // Add active class to clicked link
                this.classList.add("active");
            }
        });
    });

    // Prevent dropdown menu links from closing the dropdown
    document.querySelectorAll(".dropdown-menu a").forEach((link) => {
        link.addEventListener("click", function (e) {
            e.stopPropagation(); // Stop the click from bubbling up
        });
    });

    // Mobile dropdown toggle
    dropdownToggles.forEach((toggle) => {
        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            let dropdownMenu = this.nextElementSibling;
            let icon = this.querySelector(".fa-angle-down");

            // Close other open dropdowns
            document.querySelectorAll(".dropdown-menu").forEach((menu) => {
                if (menu !== dropdownMenu) menu.style.display = "none";
            });

            document.querySelectorAll(".dropdown-toggle").forEach((item) => {
                if (item !== this) item.classList.remove("show");
            });

            // Toggle current dropdown
            if (dropdownMenu.style.display === "block") {
                dropdownMenu.style.display = "none";
                this.classList.remove("show");
                icon.style.transform = "rotate(0)";
            } else {
                dropdownMenu.style.display = "block";
                this.classList.add("show");
                icon.style.transform = "rotate(180deg)";
            }
        });
    });

    // Close dropdowns when clicking outside navbar entirely
    document.addEventListener("click", function (e) {
        // Only close dropdowns if clicking outside the navbar
        if (!e.target.closest(".navbar")) {
            document.querySelectorAll(".dropdown-menu").forEach((menu) => {
                menu.style.display = "none";
            });

            document.querySelectorAll(".dropdown-toggle").forEach((toggle) => {
                toggle.classList.remove("show");
                let icon = toggle.querySelector(".fa-angle-down");
                if (icon) icon.style.transform = "rotate(0)";
            });
        }
    });

    // Handle window resize
    window.addEventListener("resize", toggleCloseButtonVisibility);

    // Initial setup
    toggleCloseButtonVisibility();
});


function toggleDropdown(id, event) {
    if (event) event.stopPropagation();

    const el = document.getElementById(id);
    if (!el) return;

    const isVisible = el.style.display === 'block';

    // Hide all other dropdowns at the same level
    const allDropdowns = document.querySelectorAll('.dropdown-content, .nested-dropdown-content, .packages, .packages');
    allDropdowns.forEach(d => {
        // Don't hide the current one or its ancestors
        if (d !== el && !d.contains(el) && !el.contains(d)) {
        d.style.display = 'none';
        }
    });

    // Toggle current
    el.style.display = isVisible ? 'none' : 'block';
}

function selectOption(event) {
    event.stopPropagation();

    // Highlight clicked option briefly
    const btn = event.target;
    btn.classList.add('highlight');

    // Close all dropdowns
    document.querySelectorAll('.dropdown-content, .nested-dropdown-content, .packages').forEach(d => {
    d.style.display = 'none';
    });

    // Remove highlight after 500ms
    setTimeout(() => btn.classList.remove('highlight'), 500);

    // Here you can add your logic for when an option is selected
    console.log('Selected option:', btn.textContent);
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown')) {
    document.querySelectorAll('.dropdown-content, .nested-dropdown-content, .packages').forEach(d => {
        d.style.display = 'none';
    });
    }
});