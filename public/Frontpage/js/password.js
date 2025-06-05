    // Default password
    const correctPassword = "Vantrippers2025"
        
    // Get elements
    const websiteLink = document.getElementById('website-link');
    const passwordModal = document.getElementById('password-modal');
    const passwordInput = document.getElementById('password-input');
    const submitPassword = document.getElementById('submit-password');
    
    // Show modal when globe icon is clicked
    websiteLink.addEventListener('click', function(e) {
        e.preventDefault();
        passwordModal.style.display = 'flex';
        passwordInput.focus();
    });
    
    // Handle password submission
    submitPassword.addEventListener('click', checkPassword);
    passwordInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            checkPassword();
        }
    });
    
    function checkPassword() {
        const enteredPassword = passwordInput.value;
        
        if (enteredPassword === correctPassword) {
            // Password correct - redirect to your actual website or development site
            window.location.href = "main.html"; // Replace with your URL
        } else {
            // Password incorrect
            alert("Incorrect password. Please try again.");
            passwordInput.value = "";
            passwordInput.focus();
        }
    }
    
    // Close modal if user clicks outside of it
    window.addEventListener('click', function(e) {
        if (e.target === passwordModal) {
            passwordModal.style.display = 'none';
            passwordInput.value = "";
        }
    });
    
    document.addEventListener("contextmenu", (e) => e.preventDefault());
    document.addEventListener("keydown", (e) => {
    if (e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
        e.preventDefault();
    }
    });

