// Toggle Password Eye/Slash 
document
    .getElementById("togglePassword")
    .addEventListener("click", function () {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    });

// Password Criteria
const passwordInput = document.getElementById("password");
const strengthDiv = document.getElementById("passwordStrength");

passwordInput.addEventListener("input", function () {
    const password = passwordInput.value;

    let strengthText = "";
    let strengthColor = "";

    // Check length first
    if (password.length < 12) {
        strengthText = "Password Strength: Weak";
        strengthColor = "red";
    } else {
        // Check for uppercase letter and symbol
        const hasUpper = /[A-Z]/.test(password);
        const hasSymbol = /[@#$%^&*]/.test(password);

        if (hasUpper && hasSymbol) {
            strengthText = "Password Strength:Strong";
            strengthColor = "green";
        } else {
            strengthText = "Password Strength: Medium";
            strengthColor = "orange";
        }
    }

    strengthDiv.textContent = strengthText;
    strengthDiv.style.color = strengthColor;
});


// Confirmation & Notification 

document.getElementById("registrationForm").addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent the default form submission

    // Show a confirmation modal before proceeding
    Swal.fire({
        title: "Confirm Account Creation",
        text: "Are you sure all details you provided is correct?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, create account",
        cancelButtonText: "Cancel",
        confirmButtonColor: "#3085d6"
    }).then((result) => {
        if (result.isConfirmed) {
            const form = this;
            const formData = new FormData(form);

            // Send the form data via fetch
            fetch("registration.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Registration Successful!",
                            text: "Click OK to continue.",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "login.php"; // Redirect on success after confirmation
                            }
                        });
                    } else if (data.status === "error") {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: data.message,
                            confirmButtonText: "OK"
                        });
                    } else {
                        Swal.fire({
                            icon: "info",
                            title: "Notice",
                            text: data.message,
                            confirmButtonText: "OK"
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: "error",
                        title: "Error!",
                        text: "An unexpected error occurred.",
                        confirmButtonText: "OK"
                    });
                });
        }
    });
});