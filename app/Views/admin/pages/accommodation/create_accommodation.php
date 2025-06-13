<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/admin/create_accommodation.css') ?>?v=<? time() ?>">
<?= $this->endSection() ?>





<?= $this->section('main_content') ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Accommodation</h1>
                        <small class="text-muted" style="font-size:16px;">
                            <i class="fas fa-info"></i> Note:Enter accommodation details below. If information is not available for any field, "Leave it Blank". 
                        </small>
                    </div>
                    
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Accommodation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="progress-indicator">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <form class="confirm-create" action="create_accommodation.php?action=create" method="post">
                    <div id="accommodationContainer">
                    <!-- Single Entry Template -->
                    <div class="accommodation-entry card">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0">Accommodation <span class="badge badge-light page-number">1</span></h5>
                            <button type="button" class="remove-entry btn btn-outline-light btn-sm">
                                <i class="fas fa-trash-alt"></i> Remove
                            </button>
                        </div>

                        <div class="card-body">
                            <small class="text-muted" style="font-size:16px;"><i class="fas fa-info"></i> Note:Enter accommodation details below. If information is not available for any field, "Leave it Blank". </small>
                            <!-- Basic Information Section -->
                            <div class="section-header">
                                <h6><i class="fas fa-info-circle"></i> Basic Information</h6>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="place" class="required-field">Location</label>
                                    <input type="text" id="place" name="place[]" class="form-control" placeholder="e.g., LA UNION" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hotel_name" class="required-field">Hotel Name</label>
                                    <input type="text" id="hotel_name" name="hotel_name[]" class="form-control" placeholder="Enter Hotel Name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fb" class="required-field">Website / Social Media</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                                        </div>
                                        <input type="text" id="fb" name="fb[]" class="form-control" placeholder="Enter URL">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="area" class="required-field">Area</label>
                                    <input type="text" id="area" name="area[]" class="form-control" placeholder="Enter Area" required>
                                </div>
                            </div>

                            <hr>

                            <!-- Room Details Section -->
                            <div class="section-header">
                                <h6><i class="fas fa-bed"></i> Room Details</h6>
                            </div>

                            <div class="form-row">
                                <!-- Fields to be re-entered (clearDefault) -->
                                <div class="form-group col-md-3">
                                    <label for="room_type" class="required-field">Room Type</label>
                                    <input type="text" id="room_type" name="room_type[]" class="form-control clearDefault" placeholder="Enter Room Type" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="capacity" class="required-field">Capacity</label>
                                    <div class="input-group">
                                        <input type="number" id="capacity" name="capacity[]" class="form-control clearDefault" placeholder="Enter Capacity" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="total_rate" class="required-field">Total Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₱</span>
                                        </div>
                                        <input type="number" id="total_rate" name="total_rate[]" class="form-control clearDefault" step="1" placeholder="e.g., 1000" onkeydown="if(['.',','].indexOf(event.key) !== -1){ event.preventDefault(); }" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="per_head" class="required-field">Per Head</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₱</span>
                                        </div>
                                        <input type="number" id="per_head" name="per_head[]" class="form-control clearDefault" step="1" placeholder="e.g., 150.00" onkeydown="if(['.',','].indexOf(event.key) !== -1){ event.preventDefault(); }" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="can_accommodate" class="required-field">Can Accommodate (w/o Extra Bed)</label>
                                    <input type="text" id="can_accommodate" name="can_accommodate[]" class="form-control" placeholder="Enter capacity for accommodation">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="star_rating" class="required-field">Star Rating</label>
                                    <div class="input-group">
                                        <input type="number" id="star_rating" name="star_rating[]" class="form-control" placeholder="e.g., 5" min="0" max="5">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-star text-warning"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <!-- Amenities Section -->
                            <div class="section-header">
                                <h6><i class="fas fa-concierge-bell"></i> Amenities</h6>
                            </div>

                            <div class="form-row">
                                <!-- Select fields: We want these to retain their selection, so we do not clear them -->
                                <div class="form-group col-md-2">
                                    <label for="breakfast" class="required-field">Breakfast</label>
                                    <select id="breakfast" name="breakfast[]" class="form-control" required>
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                        <option value="no info">No Info</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pool" class="required-field">Swimming Pool</label>
                                    <select id="pool" name="pool[]" class="form-control" required>
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                        <option value="no info">No Info</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="elevator" class="required-field">Elevator</label>
                                    <select id="elevator" name="elevator[]" class="form-control" required>
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                        <option value="no info">No Info</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="beachfront" class="required-field">Beachfront</label>
                                    <select id="beachfront" name="beachfront[]" class="form-control" required>
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                        <option value="no info">No Info</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pet_friendly" class="required-field">Pet Friendly</label>
                                    <select id="pet_friendly" name="pet_friendly[]" class="form-control petFriendly" required>
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="yes_free">Yes - Free</option>
                                        <option value="yes_with_fee">Yes - With Fee</option>
                                        <option value="no">No</option>
                                        <option value="no info">No Info</option>
                                    </select>
                                    <input type="hidden" name="pet_fee_desc[]" class="petFeeDesc">
                                    <div class="petFeeDisplay display-text" style="display:none;"></div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="function_hall" class="required-field">Function Hall</label>
                                    <select id="function_hall" name="function_hall[]" class="form-control functionHall" required>
                                        <option value="" disabled selected>Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <input type="hidden" name="function_hall_qty[]" class="functionHallQty">
                                    <div class="functionHallDisplay display-text" style="display:none;"></div>
                                </div>
                            </div>

                            <hr>
                            <!-- Location Section -->
                            <div class="section-header">
                                <h6><i class="fas fa-map-marker-alt"></i> Location Details</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="distance_from" class="required-field">Distance</label>
                                <div class="input-group">
                                    <input type="text" id="distance_from" name="distance_from[]" class="form-control" placeholder="e.g., 5km">
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="distance_location" class="required-field">Near at</label>
                                <input type="text" id="distance_location" name="distance_location[]" class="form-control" placeholder="Enter nearby landmark">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="pin_location" class="required-field">Pin Location</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                    </div>
                                    <input type="text" id="pin_location" name="pin_location[]" class="form-control" placeholder="Coordinates">
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- Contact Information Section -->
                        <div class="section-header">
                            <h6><i class="fas fa-envelope"></i> Contact Information</h6>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="required-field">Email Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                    <input type="text" id="email" name="email[]" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>
                            <!-- Bagong Contact Number Field -->
                            <div class="form-group col-md-6">
                                <label for="contact" class="required-field">Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" id="contact" name="contact[]" class="form-control" placeholder="Enter Contact Number" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="created_by">Created By</label>
                                <input type="text" id="created_by" name="created_by[]" class="form-control bg-light" value="<?php echo htmlspecialchars($user_name) ?>" readonly>
                            </div>
                        </div>


                        <hr>

                        <!-- Season Details Section -->
                        <div class="section-header">
                            <h6><i class="fas fa-calendar-alt"></i> Season Details</h6>
                        </div>
                        <div class="form-row">
                            <!-- These season fields will be cleared (clearDefault) -->
                            <div class="form-group col-md-4">
                                <label for="season_type">Season Type (optional)</label>
                                <input type="text" id="season_type" name="season_type[]" class="form-control" placeholder="Enter Season Type">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="season_start_date">Season Start Date(Optional)</label>
                                <input type="text" id="season_start_date" name="season_start_date[]" class="form-control" placeholder="MM-DD">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="season_end_date">Season End Date(Optional)</label>
                                <input type="text" id="season_end_date" name="season_end_date[]" class="form-control" placeholder="MM-DD">
                            </div>
                        </div>


                        <hr>
                        <!-- Additional Notes Section -->
                        <div class="section-header">
                            <h6><i class="fas fa-sticky-note"></i> Additional Notes</h6>
                        </div>
                        <div class="form-row">
                            <!-- Additional notes fields will be cleared (clearDefault) -->
                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea id="description" name="description[]" class="form-control" rows="3" placeholder="Enter detailed description..."></textarea>
                                <small class="form-text text-muted">Optional</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="remarks">Remarks</label>
                                <textarea id="remarks" name="remarks[]" class="form-control" rows="3" placeholder="Enter additional remarks..."></textarea>
                                <small class="form-text text-muted">Optional</small>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- End of Single Entry Template -->
                    </div>

                    <!-- Form Controls -->
                    <div class="form-actions d-flex justify-content-between align-items-center">
                    <button type="button" id="addEntry" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Add Another Accommodation
                    </button>
                    <div>
                        <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save All
                        </button>
                    </div>
                    </div>
                </form>
            <!-- End of Form -->
            </div>
        </section>
    </div>
<?= $this->endSection() ?>