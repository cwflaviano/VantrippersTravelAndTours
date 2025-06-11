
// Load destinations and packages dynamically
document.addEventListener('DOMContentLoaded', function() {
    loadLuzonDestinations();
    loadDomesticDestinations();
    loadCombinedPackages();
});

// Load Luzon destinations
function loadLuzonDestinations() {
    fetch('/vantrippers/api/get_destinations.php?category=luzon')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const luzonDropdown = document.getElementById('luzon');
                luzonDropdown.innerHTML = '';
                
                data.data.forEach(destination => {
                    const destItem = document.createElement('li');
                    destItem.innerHTML = `<a onclick="loadPackages('${destination.id}', '${destination.name}', event)" class="dropdown-item">${destination.name}</a>`;
                    luzonDropdown.appendChild(destItem);
                    
                    // Create packages dropdown for this destination
                    const packagesDiv = document.createElement('div');
                    packagesDiv.id = `packages_${destination.id}`;
                    packagesDiv.className = 'nested-dropdown-content dropdown-menu';
                    luzonDropdown.appendChild(packagesDiv);
                });
            }
        })
        .catch(error => console.error('Error loading Luzon destinations:', error));
}

// Load Domestic destinations
function loadDomesticDestinations() {
    fetch('/vantrippers/api/get_destinations.php?category=domestic')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const domesticDropdown = document.getElementById('domestic');
                domesticDropdown.innerHTML = '';
                
                data.data.forEach(destination => {
                    const destItem = document.createElement('li');
                    destItem.innerHTML = `<a onclick="loadPackages('${destination.id}', '${destination.name}', event)" class="dropdown-item">${destination.name}</a>`;
                    domesticDropdown.appendChild(destItem);
                    
                    // Create packages dropdown for this destination
                    const packagesDiv = document.createElement('div');
                    packagesDiv.id = `packages_${destination.id}`;
                    packagesDiv.className = 'nested-dropdown-content dropdown-menu';
                    domesticDropdown.appendChild(packagesDiv);
                });
            }
        })
        .catch(error => console.error('Error loading Domestic destinations:', error));
}

// Load Combined packages
function loadCombinedPackages() {
    fetch('/vantrippers/api/get_packages.php?type=combined')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const combineDropdown = document.getElementById('combine');
                combineDropdown.innerHTML = '';
                
                data.data.forEach(package => {
                    const packageItem = document.createElement('li');
                    // FIXED: Added proper path to tour package page
                    packageItem.innerHTML = `<a href="/vantrippers/pages/tour_package.php?slug=${package.slug}" class="dropdown-item">${package.title}</a>`;
                    combineDropdown.appendChild(packageItem);
                });
            }
        })
        .catch(error => console.error('Error loading Combined packages:', error));
}

// Load packages for a specific destination
function loadPackages(destinationId, destinationName, event) {
    event.preventDefault();
    event.stopPropagation();

    // Hide all other third-level dropdowns before showing the selected one
    const allThirdLevelDropdowns = document.querySelectorAll('.nested-dropdown-content[id^="packages_"]');
    allThirdLevelDropdowns.forEach(div => {
        if (div.id !== `packages_${destinationId}`) {
            div.style.display = 'none';
        }
    });

    let packagesDiv = document.getElementById(`packages_${destinationId}`);

    // Toggle visibility: if already visible, hide it
    if (packagesDiv && packagesDiv.style.display === 'block') {
        packagesDiv.style.display = 'none';
        return;
    }

    // Fetch and show the new one
    fetch(`/vantrippers/api/get_packages.php?destination=${destinationId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (!packagesDiv) {
                packagesDiv = document.createElement('div');
                packagesDiv.id = `packages_${destinationId}`;
                packagesDiv.className = 'nested-dropdown-content dropdown-menu';
                event.target.parentNode.appendChild(packagesDiv);
            }

            packagesDiv.innerHTML = '';

            if (data.success && data.data.length > 0) {
                data.data.forEach(pkg => {
                    const packageItem = document.createElement('a');
                    packageItem.className = 'dropdown-item';
                    packageItem.href = `/vantrippers/pages/tour_package.php?slug=${pkg.slug}`;
                    packageItem.innerHTML = `${pkg.title} - ₱${parseFloat(pkg.price).toLocaleString()}`;
                    packagesDiv.appendChild(packageItem);
                });
            } else {
                const noPackagesItem = document.createElement('span');
                noPackagesItem.className = 'dropdown-item text-muted';
                noPackagesItem.textContent = 'No packages available';
                packagesDiv.appendChild(noPackagesItem);
            }

            // Position and show the dropdown
            packagesDiv.style.display = 'block';
            packagesDiv.style.position = 'absolute';
            packagesDiv.style.left = '100%';
            packagesDiv.style.top = '0';
        })
        .catch(error => {
            console.error('Error loading packages:', error);
            if (!packagesDiv) {
                packagesDiv = document.createElement('div');
                packagesDiv.id = `packages_${destinationId}`;
                packagesDiv.className = 'nested-dropdown-content dropdown-menu';
                event.target.parentNode.appendChild(packagesDiv);
            }
            packagesDiv.innerHTML = '<span class="dropdown-item text-danger">Error loading packages</span>';
            packagesDiv.style.display = 'block';
        });
}


// Toggle dropdown function
function toggleDropdown(dropdownId, event) {
    event.preventDefault();
    event.stopPropagation();
    
    // Hide all other dropdowns
    const allDropdowns = document.querySelectorAll('.nested-dropdown-content');
    allDropdowns.forEach(dropdown => {
        if (dropdown.id !== dropdownId) {
            dropdown.style.display = 'none';
        }
    });
    
    // Toggle the selected dropdown
    const dropdown = document.getElementById(dropdownId);
    if (dropdown) {
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown')) {
        const allDropdowns = document.querySelectorAll('.nested-dropdown-content');
        allDropdowns.forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    }
});