<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Imports -->
<?= $this->section('css_libraries') ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<?= $this->endSection() ?>

<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/front_page.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/rent_carousel.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/van_book.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- header -->
<?= $this->section('header') ?>
    <?= $this->include('FrontPage/Includes/header') ?>
<?= $this->endSection() ?>




<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!--  -->
<?= $this->section('section1') ?>
    <section id="book" class="py-5">
        <div class="container">
            <!-- Van Details Display Section -->
            <div class="row mb-5">
                <!-- Left Column: Van Image -->
                <div style="border:1px solid #e3e3e3;" class="col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
                    <img src="<?= esc(str_replace('../uploads/', 'uploads/', $service->image)); ?>" alt="Van Image" class="img-fluid">
                </div>
                <!-- Right Column: Van Details -->
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-start text-start">
                    <h2>Car Model: <?= esc($service->title); ?></h2>
                    <p class="text-success fw-bold">
                        <strong>Rental Cost (Per Day):</strong> <?= esc($service->price); ?>
                    </p>
                    <?php
                    $status = $service->status;
                    $statusBadge = ($status === '0')
                        ? '<span class="badge bg-success">Available</span>'
                        : '<span class="badge bg-danger">Not Available</span>';
                    echo '<p><strong>Status:</strong> ' . $statusBadge . '</p>';
                    ?>
                    <p><strong>Description:</strong> <?= esc($service->description); ?></p>
                    <p><strong>Inclusion:</strong> <?= esc($service->inclusion); ?></p>
                    <p><strong>Exclusion:</strong> <?= esc($service->exclusion); ?></p>
                </div>
            </div>

            <!-- // ! BOOKING FORM NOT YET MIGRATED  -->
                <!-- // TODO: BACKEND LOGIC NOT YET MIGRATED  
                    // TODO: SMTP EMAIL NOT YET IMPLEMENTED
                -->
            <!-- Booking Form Section -->
            <div class="booking-calendar mt-4">
                <h5 style="font-weight: bold;">Book Your Service</h5>
                <hr>

                <!-- Wizard Progress Bar -->
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <!-- Wizard Steps -->
                <form id="bookingForm" method="post" action="van_process_booking.php" enctype="multipart/form-data" novalidate>
                    <!-- Hidden field for service id -->
                    <input type="hidden" name="service_id" value="<?= esc($service->id); ?>">

                    <!-- Step 1: Pickup and Dropoff Locations -->
                    <div class="wizard-step active" data-step="1">
                        <h5 style="font-weight: bold;">Choose Your Pickup &amp; Dropoff Location</h5>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="bookingStart" class="form-label">Start Date &amp; Time</label>
                                    <input type="datetime-local" class="form-control" id="bookingStart" name="bookingStart"
                                        min="<?= date('Y-m-d\TH:i'); ?>" required>
                                    <div class="invalid-feedback">Please select a valid start date and time.</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">
                                        <i class="fa-solid fa-location-dot"></i> Pick Up Location <small class="text-muted">(Note: This is autocomplete address)</small>
                                    </label>
                                    <input type="text" class="form-control" id="pickupLocation" name="pickupLocation" placeholder="Enter Pick-Up Location" required>
                                    <ul id="pickup-suggestions" class="suggestions-list list-unstyled"></ul>
                                    <div class="invalid-feedback">Please enter a pickup location.</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="bookingEnd" class="form-label">End Date &amp; Time</label>
                                    <input type="datetime-local" class="form-control" id="bookingEnd" name="bookingEnd"
                                        min="<?php echo date('Y-m-d\TH:i'); ?>" required>
                                    <div class="invalid-feedback">Please select a valid end date and time.</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Checkbox to copy pickup location -->
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="sameAsPickup" name="sameAsPickup">
                                    <label class="form-check-label" for="sameAsPickup">Same as Pick Up Location</label>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">
                                        <i class="fa-solid fa-location-dot"></i> Drop Off Location <small class="text-muted">(Note: This is autocomplete address)</small>
                                    </label>
                                    <input type="text" class="form-control" id="dropoffLocation" name="dropoffLocation" placeholder="Enter Drop-Off Location" required>
                                    <ul id="dropoff-suggestions" class="suggestions-list list-unstyled"></ul>
                                    <div class="invalid-feedback">Please enter a dropoff location.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Personal Information -->
                    <div class="wizard-step" data-step="2">
                        <h5 style="font-weight: bold;">Personal Information</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                                    <div class="invalid-feedback">Please enter your full name.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contactNumber" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter your contact number" required>
                                    <div class="invalid-feedback">Please enter your contact number.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                            </div>

                            <!-- New Field: Van Rental Purpose -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rentalPurpose" class="form-label">Rental Purpose</label>
                                    <select class="form-select" id="rentalPurpose" name="rentalPurpose" required>
                                        <option value="" disabled selected>Select a purpose</option>
                                        <option value="Airport Transfers">Airport Transfers</option>
                                        <option value="City & Out of Town Tours">City & Out of Town Tours</option>
                                        <option value="Group, Family & Corporate Trips">Group, Family & Corporate Trips</option>
                                        <option value="Weddings, Birthday">Weddings & Birthday</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a rental purpose.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-dark" id="prevBtn" disabled><i class="fa-solid fa-arrow-left"></i> Previous</button>
                        <button type="button" class="btn btn-primary" id="nextBtn">Next <i class="fa-solid fa-arrow-right"></i></button>
                        <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>




<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- footer -->
<?= $this->section('footer') ?>
    <?= $this->include('FrontPage/Includes/footer') ?>
<?= $this->endSection() ?>




<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- js libraries -->
<?= $this->section('js_libraries') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?= $this->endSection() ?>

<!-- js -->
<?= $this->section('js') ?>
    <script src="<?= base_url('Frontpage/js/script.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Frontpage/js/rent_carousel.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Frontpage/js/van_book.js') ?>?v=<?= time() ?>"></script>
<?= $this->endSection() ?>
