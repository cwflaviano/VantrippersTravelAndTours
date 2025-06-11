$(document).ready(function(){
    // Handle Create Form submission gamit ang AJAX with confirmation
    $("#createForm").on("submit", function(e){
        e.preventDefault();
        var form = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to create this record?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, create it!',
            cancelButtonText: 'Cancel'
        }).then(function(result){
            if(result.isConfirmed){
                var formData = form.serialize() + "&action=create";
                $.ajax({
                    url: "create_accommodation.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response){
                        if(response.success){
                            Swal.fire({
                                title: 'Success!',
                                text: 'Accommodation created successfully.',
                                icon: 'success'
                            }).then(function(){
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while creating accommodation.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
    
    // Handle View Button click for read-only modal
    $(document).on("click", ".viewBtn", function(){
        var btn = $(this);
        $.each(btn.data(), function(key, value) {
            if(key !== "id" && $("#view_" + key).length) {
                $("#view_" + key).val(value);
            }
        });
    });

    // Delegated event binding para sa Edit button click gamit ang dynamic iteration
    $(document).on("click", ".editBtn", function(){
        var btn = $(this);
        $("#edit_id").val(btn.data("id"));
        $.each(btn.data(), function(key, value) {
            if(key !== "id" && $("#edit_" + key).length) {
                $("#edit_" + key).val(value);
            }
        });
    });
    
    // Handle Edit Form submission gamit ang AJAX with confirmation
    $("#editForm").on("submit", function(e){
        e.preventDefault();
        var form = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update this record?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
        }).then(function(result){
            if(result.isConfirmed){
                var formData = form.serialize() + "&action=edit";
                $.ajax({
                    url: "create_accommodation.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response){
                        if(response.success){
                            Swal.fire({
                                title: 'Success!',
                                text: 'Accommodation updated successfully.',
                                icon: 'success'
                            }).then(function(){
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while updating accommodation.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
    
    // Handle Delete Row button click gamit ang AJAX
    $(document).on("click", ".deleteRowBtn", function(){
        var id = $(this).data("id");
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete the row permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result){
            if(result.isConfirmed){
                $.ajax({
                    url: "create_accommodation.php",
                    type: "POST",
                    data: { id: id, action: "delete_row" },
                    dataType: "json",
                    success: function(response){
                        if(response.success){
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Row has been deleted.',
                                icon: 'success'
                            }).then(function(){
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while deleting row.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
    
    // Handle Add Column Form submission gamit ang AJAX with confirmation
    $("#addColumnForm").on("submit", function(e){
        e.preventDefault();
        var form = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to add this column?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'Cancel'
        }).then(function(result){
            if(result.isConfirmed){
                var formData = form.serialize() + "&action=add_column";
                $.ajax({
                    url: "create_accommodation.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response){
                        if(response.success){
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success'
                            }).then(function(){
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while adding column.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
    
    // Handle Delete Column button click gamit ang AJAX
    $(document).on("click", ".deleteColumnBtn", function(){
        var column = $(this).data("column");
        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently drop the column '" + column + "'.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result){
            if(result.isConfirmed){
                $.ajax({
                    url: "create_accommodation.php",
                    type: "POST",
                    data: { column: column, action: "delete_column" },
                    dataType: "json",
                    success: function(response){
                        if(response.success){
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success'
                            }).then(function(){
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while deleting column.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
    
    // Handle Edit Column button click gamit ang SweetAlert2 prompt
    $(document).on("click", ".editColumnBtn", function(){
        var oldColumn = $(this).data("column");
        Swal.fire({
            title: 'Rename Column',
            input: 'text',
            inputLabel: 'New column name for "' + oldColumn + '"',
            inputPlaceholder: 'Enter new column name',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Please enter a valid column name!';
                }
            }
        }).then(function(result){
            if(result.isConfirmed){
                $.ajax({
                    url: "create_accommodation.php",
                    type: "POST",
                    data: { old_column: oldColumn, new_column: result.value, action: "edit_column" },
                    dataType: "json",
                    success: function(response){
                        if(response.success){
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success'
                            }).then(function(){
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(){
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while editing column.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
});
