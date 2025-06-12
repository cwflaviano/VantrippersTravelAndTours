$(document).ready(function() {
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault(); // Prevent form submission
        var form = this;
        Swal.fire({
            title: 'Are you sure you want to save changes?',
            icon: 'warning',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'Cancel',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});


// Listen for changes on the file input to update the profile picture in real time
document.getElementById('imageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        // Create a temporary URL for the selected image file and update the <img> element
        document.getElementById('profilePicture').src = URL.createObjectURL(file);
    }
});