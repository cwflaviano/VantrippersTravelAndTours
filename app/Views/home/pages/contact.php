<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/home_layout') ?>

<!-- css -->
<?= $this->section('css') ?>
    <!-- Css file here -->
<?= $this->endSection() ?>




<!-- js -->
<?= $this->section('main_content') ?>
    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Get In Touch</h2>
                <p class="lead text-muted">Get in touch with us for more information or to discuss your tour needs.</p>
                <div class="map-container mt-4">
                    <iframe
                        src="https://www.google.com/maps/embed/v1/place?q=Vantrippers+travel+and+tours,+HMC+Building,+unit+5+Arnaldo+Hwy,+General+Trias,+Cavite&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
            <div class="row">
                <?php if (session()->has('successMessage')): ?>
                    <br><br><br>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('successMessage')) ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('errorMessage')): ?>
                    <br><br><br>
                    <div class="alert alert-danger">
                        <?= esc(session()->getFlashdata('errorMessage')) ?>
                    </div>
                <?php endif; ?>
                <div class="col-md-6 mb-4 mb-md-0">
                    <!-- Updated form with method POST and name attributes -->
                    <form method="POST" action="<?= base_url('/contact') ?>">
                        <div class="mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Your Name"
                                >
                        </div>
                        <div class="mb-3">
                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="Your Email"
                                >
                        </div>
                        <div class="mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="subject"
                                placeholder="Subject">
                        </div>
                        <div class="mb-3">
                            <textarea
                                class="form-control"
                                rows="5"
                                name="message"
                                placeholder="Tell us about your dream trip"
                                ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="bg-light p-4 rounded h-100">
                        <h4>Contact Information</h4>
                        <p><i class="fas fa-map-marker-alt me-2"></i> HMC Building Unit 5 Arnaldo Highway, General Trias, Philippines</p>
                        <p><i class="fas fa-phone me-2"></i> +(63) 976 476 4187</p>
                        <p><i class="fas fa-envelope me-2"></i> book@vantripperstravelandtour.com</p>
                        <p><i class="fas fa-clock me-2"></i> Monday-Friday: 9am-5pm</p>
                        <div class="mt-4">
                            <h5>Follow Us</h5>
                            <div class="mt-3">
                                <a href="https://www.facebook.com/Vantrippers.ph" class="text-decoration-none"><i
                                        class="fab fa-facebook social-icon"></i></a>
                                <a href="https://www.tiktok.com/@vantripperstravelsph" class="text-decoration-none"><i
                                        class="fab fa-tiktok social-icon"></i></a>
                                <a href="https://www.instagram.com/vantripperstravels/" class="text-decoration-none"><i
                                        class="fab fa-instagram social-icon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>




<!-- js -->
<?= $this->section('js') ?>
    <!-- Css file here -->
<?= $this->endSection() ?>