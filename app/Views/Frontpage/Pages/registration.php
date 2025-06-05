<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Imports -->
<?= $this->section('css_libraries') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chela+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<?= $this->endSection() ?>

<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/registration.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>




<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Section 1 -->
<?= $this->section('section1') ?>
    <div class="container-fluid p-0">
        <div class="row g-0 signup-container">
            <!-- Form Column -->
            <div class="col-md-6 form-section">
                <a class="text-dark" href="<?= base_url('/') ?>">Back to Home</a>
                <div class="form-container mt-5">

                    <h3 class="mb-4">Create An Account</h3>

                    <form id="registrationForm" action="<?= base_url('/signup') ?>" method="post">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-5">
                                    <label class="form-label">First name</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required autocomplete="">
                                </div>
                                <div class="col-3">
                                    <label class="form-label">Middle name</label>
                                    <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Middle Name" autocomplete="">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Last name</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required autocomplete="">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="businessName" class="form-label d-flex align-items-center">
                                Address
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle ms-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Unit No/Block/Lot/Phase/Subdivsion,Village/Barangay/Municipality,City/Province" required autocomplete="">
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <!-- Gender -->
                                <div class="col-md-4">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" name="gender" required>
                                        <option value="">Select option</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                        <option>Prefer not to say</option>
                                    </select>
                                </div>
                                <!-- Birthday -->
                                <div class="col-md-4">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="birth_date" required autocomplete="">
                                </div>

                                <!-- Age -->
                                <div class="col-md-4">
                                    <label class="form-label">Age</label>
                                    <input type="number" class="form-control" name="age" maxlength="3" placeholder="Enter age" oninput="this.value = this.value.slice(0, 3)" required autocomplete=""> 
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="mb-3">
                            <label class="form-label">Mobile number</label>
                            <div class="input-group">
                                <span class="input-group-text">+63</span>
                                <input type="number" class="form-control" name="mobileNumber" placeholder="917XXXXXXXX" maxlength="10" oninput="this.value = this.value.slice(0, 10)" required autocomplete="">
                            </div>
                            <div class="form-text">e.g. +63917XXXXXXX</div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="example@email.com" required autocomplete="">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="••••••••" required autocomplete="">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fa-solid fa-eye-slash" id="eyeIcon"></i>
                                </button>
                            </div>
                            <div class="form-text">
                                Password should have at least 12 characters with one number, one special character (e.g., #$%^&*) and one letter in uppercase.
                            </div>
                            <!-- Strength indicator -->
                            <div id="passwordStrength" style="margin-top:5px; font-weight: bold;"></div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck" name="termsCheck">
                                <label class="form-check-label" for="termsCheck">
                                    I have read and agree to the
                                    <a href="#" class="text-primary" style="text-decoration: none; color:rgb(69, 143, 228)!important;" data-bs-toggle="modal" data-bs-target="#privacyModal">Data Privacy Policy</a>
                                    and
                                    <a href="#" class="text-primary" style="text-decoration: none; color:rgb(69, 143, 228)!important;" data-bs-toggle="modal" data-bs-target="#termsModal">Terms & Conditions</a>.
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-md">Create Account</button>
                            <br>
                            <a class="text-center" style="text-decoration: none; color:rgb(69, 143, 228);" href="<?= base_url('/signin') ?>">Already have an Account?</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Brand Column -->
            <div class="col-md-6 brand-section text-center">
                <h2 style="font-family: 'Chela One', system-ui;">Vantrippers <span class="text-highlight">Travel and Tour</span></h2>

                <div class="platform-demo mb-5">
                    <img src="<?= base_url('Assets/images/reg_img.png') ?>" alt="Travel Image" class="img-fluid">
                </div>

                <h4 class="mb-3">Your Trusted Travel Partner for <span class="text-highlight">Every Destination!</span></h4>
                <p>Explore, Experience, Enjoy</p>

                <div class="platform-icons"></div>

                <div class="copyright">
                    © Copyright 2025 Vantrippers Travel and Tour, All rights reserved.
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

    
<!-- MODALS -->
<!-- Section 2 - Data Privacy Policy Modal -->
<?= $this->section('section2') ?>
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">Data Privacy Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5><strong>DATA PRIVACY POLICY</strong></h5>
                    <h6>1. Introduction</h6>
                    <p>Welcome to VanTrippers Travel and Tours ("Company," "we," "us," or "our"). We value your privacy and are committed to protecting your personal data. This policy outlines how we collect, use, store, and protect your information when you register for an account on our Travel and Tours platform.</p>

                    <h6>2. Information We Collect</h6>
                    <p>By registering for an account, we may collect the following personal information:</p>
                    <ul>
                        <li>Full Name</li>
                        <li>Date of Birth</li>
                        <li>Gender</li>
                        <li>Nationality</li>
                        <li>Email Address</li>
                        <li>Mobile Number</li>
                        <li>Residential Address</li>
                        <li>Passport or Government ID (if required)</li>
                        <li>Travel Preferences</li>
                        <li>Payment Information (if applicable)</li>
                    </ul>

                    <h6>3. How We Use Your Information</h6>
                    <p>Your information will be used for the following purposes:</p>
                    <ul>
                        <li>Account registration and verification</li>
                        <li>Processing bookings and travel reservations</li>
                        <li>Communication regarding travel updates and promotions</li>
                        <li>Compliance with legal and regulatory requirements</li>
                        <li>Enhancing user experience and service improvement</li>
                    </ul>

                    <h6>4. Data Protection and Security</h6>
                    <p>We implement strict security measures to protect your personal data from unauthorized access, alteration, or disclosure. However, while we strive to protect your data, no system is 100% secure, and we encourage you to take necessary precautions.</p>

                    <h6>5. Data Sharing and Disclosure</h6>
                    <p>We do not sell or rent your personal data. However, we may share your information with:</p>
                    <ul>
                        <li>Travel partners (airlines, hotels, tour operators) to process bookings</li>
                        <li>Legal authorities if required by law</li>
                        <li>Third-party service providers who help us operate our platform</li>
                    </ul>

                    <h6>6. Cookies and Tracking Technologies</h6>
                    <p>Our website may use cookies to enhance user experience. You have the option to disable cookies in your browser settings.</p>

                    <h6>7. User Rights</h6>
                    <p>You have the right to:</p>
                    <ul>
                        <li>Access, update, or delete your personal data</li>
                        <li>Withdraw consent for marketing communications</li>
                        <li>Request a copy of your stored data</li>
                        <li>File a complaint if you believe your data is misused</li>
                    </ul>

                    <h6>8. Changes to This Policy</h6>
                    <p>We may update this policy from time to time. Any changes will be posted on our website, and we encourage you to review this policy periodically.</p>

                    <h6>9. Contact Us</h6>
                    <p>If you have any questions regarding this policy, you may contact us at:</p>
                    <p><strong>VanTrippers Travel and Tours</strong><br>
                        [Company Address] <br>
                        [Email Address] <br>
                        [Phone Number]
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<!-- Section 3 - Terms & Conditions Modal -->
<?= $this->section('section3') ?>
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms & Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>By using our services, you agree to the following terms:</p>
                    <ul>
                        <li>You must provide accurate and truthful information.</li>
                        <li>Booking cancellations and refunds follow our company policies.</li>
                        <li>VanTrippers is not responsible for third-party service failures (hotels, airlines, etc.).</li>
                        <li>Users are responsible for keeping their login credentials secure.</li>
                    </ul>
                    <p>For more details, please contact us at [Company Email].</p>
                    <p>Extra content to demonstrate scrolling...</p>
                    <p>More details about our terms...</p>
                    <p>(Add more terms as needed...)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- js libraries -->
<?= $this->section('js_libraries') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>

<!-- js -->
<?= $this->section('js') ?>
    <script> 
        const registration_URL = "<?= base_url('/signin') ?>" // redirect to login page 
        const signupUrl = "<?= base_url('/signup') ?>"; // where to fetch the json data from php
    </script>
    <script src="<?= base_url('Frontpage/js/registration.js') ?>?v=<?= time() ?>"></script>
<?= $this->endSection() ?>