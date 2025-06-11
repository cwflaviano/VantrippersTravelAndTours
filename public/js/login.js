
// Toggle View Password
function togglePassword() {
    const passwordInput = document.getElementById('floatingPassword');
    const toggleIcon = document.getElementById('toggleIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
    }
}
// Ensure sessionData is defined
if (typeof sessionData !== "undefined") {
    // Display account notice if info exists
    if (sessionData.info) {
      console.log("Displaying account notice:", sessionData.info);
      Swal.fire({
        icon: 'warning',
        title: 'Account Notice',
        text: sessionData.info,
      });
    }
  
    // Display error message if error exists
    if (sessionData.error) {
      console.log("Displaying error message:", sessionData.error);
      Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: sessionData.error,
      });
    }
  
    // If login was successful, display welcome message then redirect modal
    if (sessionData.success) {
      console.log("Displaying success message and welcome toast.");
      // Welcome Toast without countdown
      Swal.fire({
        icon: 'success',
        title: `Welcome, ${sessionData.firstName} ${sessionData.lastName}!`,
        text: 'Login successful.',
        showConfirmButton: false,
        timer: 1500
      }).then(() => {
        // Redirect modal with loading interval
        let timerInterval;
        Swal.fire({
          icon: 'info',
          title: 'Redirecting...',
          html: "Redirecting in <b></b> seconds...",
          timer: 2000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector("b");
            timerInterval = setInterval(() => {
              b.textContent = Math.ceil(Swal.getTimerLeft() / 1000);
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          }
        }).then(() => {
          window.location.href = login_url;
        });
      });
    }
  } else {
    console.error("sessionData is not defined. Make sure your PHP file sets it correctly.");
  }
  