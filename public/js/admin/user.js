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
        }, 100); // Delay to sync with sidebar animation
    });
});


function togglePassword() {
    var passwordField = document.getElementById("passwordField");
    var toggleBtn = document.getElementById("toggleBtn").querySelector("i");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleBtn.classList.remove("fa-eye");
        toggleBtn.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        toggleBtn.classList.remove("fa-eye-slash");
        toggleBtn.classList.add("fa-eye");
    }
}


document.getElementById('createUserForm').addEventListener('submit', function(e) {
    e.preventDefault(); // stop default submission

    Swal.fire({
        title: 'Confirm Submission',
        text: 'Are you sure you want to create this user?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, create user',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            e.target.submit(); // submit the form if confirmed
        } else {
            Swal.fire('Cancelled', 'User creation was cancelled.', 'info');
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const status = params.get('status');
    const message = params.get('message');

    if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'User created successfully.',
            timer: 2500,
            showConfirmButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    } else if (status === 'error') {
        if (message === 'Email address already exists.') {
            Swal.fire({
                icon: 'warning',
                title: 'Duplicate Email',
                text: 'The email you entered already exists. Please use a different email address.',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(() => {
                window.history.replaceState({}, document.title, window.location.pathname);
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: decodeURIComponent(message),
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(() => {
                window.history.replaceState({}, document.title, window.location.pathname);
            });
        }
    }
});



document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.delete-user').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // prevent immediate navigation

            const deleteUrl = this.href;

            Swal.fire({
                title: 'Confirm Deletion',
                text: 'Are you sure you want to delete this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl; // proceed to delete
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Cancelled',
                        text: 'User deletion was cancelled.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        });
    });
});



// deleting user
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const status = params.get('status');
    const message = params.get('message');

    if (status === 'delete_successful') {
        Swal.fire({
            icon: 'success',
            title: 'Deleted!',
            text: 'User was deleted successfully.',
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    } else if (status === 'delete_error') {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: decodeURIComponent(message),
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
});


// archived or restoring user
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const status = params.get('status');
    const message = params.get('message');
    var title = (status === 'archived_successful') ? 'Archived' : 'Restored';
    if(status === 'archived_successful' || status === 'restore_successful') {
        Swal.fire({
            icon: 'success',
            title: title,
            text: decodeURIComponent(message),
            timer: 2000,
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
    else if(status === 'archived_error' || status === 'restore_error') {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: decodeURIComponent(message),
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
});
