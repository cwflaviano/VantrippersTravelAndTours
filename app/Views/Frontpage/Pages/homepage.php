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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<?= $this->endSection() ?>
<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/front_page.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/rent_carousel.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/card_tour.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/index.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- header -->
<?= $this->section('header') ?>
    <?= view('FrontPage/Includes/header') ?>
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- section 1 - Background Image Carousel -->
<?= $this->section('section1') ?>
    <section id="home">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-aos="fade-right">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('<?= base_url('Assets/images/carousel_img3.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Your adventure begins with our
                                innovative travel solutions</p>
                            <div>
                                <a href="#" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>
                <div class="carousel-item active" style="background-image: url('<?= base_url('Assets/images/carousel_img2.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Your adventure begins with our
                                innovative travel solutions</p>
                            <div>
                                <a href="#" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>

                <div class="carousel-item active" style="background-image: url('<?= base_url('Assets/images/carousel_img1.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Your adventure begins with our
                                innovative travel solutions</p>
                            <div>
                                <a href="#" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('<?= base_url('Assets/images/carousel_img2.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Discover hidden gems and
                                breathtaking landscapes</p>
                            <div>
                                <a href="#" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('<?= base_url('Assets/images/carousel_img3.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Customized experiences for every
                                type of traveler</p>
                            <div>
                                <a href="#" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- section 2 - Travel Packages highlight -->
<?= $this->section('section2') ?>
    <section id="carousel-section" class="pt-5">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title fw-bold">Travel Packages</h2>
                <h4>Book Now</h4>
                <p>Take the wheel and explore—your journey, your way.</p>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">Our Packages</h3>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <a class="btn btn-lg btn-default border border-2 border-dark mb-3 me-1"
                        href="#carouselExampleIndicators2" role="button" data-bs-slide="prev">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-lg btn-default border border-2 border-dark mb-3"
                        href="#carouselExampleIndicators2" role="button" data-bs-slide="next">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div id="carouselExampleIndicators2" class="carousel slide" data-bs-interval="false">
                <div class="carousel-inner">
                    <?php foreach (array_chunk($packages, 4) as $index => $chunk): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <div class="row">
                                <?php foreach ($chunk as $package): ?>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                        <div class="tour-card">
                                            <img class="card-img img-fluid" src="<?= base_url('Assets/images/'.esc($package['image'])) ?>" alt="<?= esc($package['name']) ?>" />
                                            <div class="card-hover-overlay">
                                                <h4 class="hover-text mt-3"><?= esc($package['details']) ?></h4>
                                            </div>
                                            <div class="card-overlay">
                                                <h4 class="card-text mb-5 float-start fw-bold"><?= esc($package['name']) ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<br> <!-- Line Break --> 

<!-- section 3 - joiners ads -->
<?= $this->section('section3') ?>
    <section class="cta-1-section">
        <div class="container text-center">
            <h2 style="color: rgb(230, 147, 52);" class="mb-4">Are you alone and want to go adventure ?</h2>
            <p class="lead mb-4 text-white">Book now and be part of our Joiners' Travel Group.</p>
            <a style="border-radius: 10px;" href="#contact" class="btn btn-outline-info btn-md"><i
                    class="fa-solid fa-plus"></i> Book as Joiners</a>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- section 4 - Services section -->
<?= $this->section('section4') ?>
    <section id="services" class="py-5 position-relative">
        <div class="container text-center">
            <h2 class="section-title fw-bold">Our Services</h2>
            <h4>Van Rentals</h4>
            <p>Take the wheel and explore—your journey, your way.</p>
            <div class="carousel-container mt-5 position-relative">
                <!-- Previous Button -->
                <button class="carousel-nav-btn prev-btn">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <!-- Cards Container -->
                <div class="row justify-content-center" id="carouselRow" data-aos="fade-left">
                    <?php foreach ($services as $service): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card service-card border-1 shadow-sm rounded mx-auto">
                                <img src="<?= esc(str_replace('../uploads/', 'uploads/', $service['image'])); ?>" class="card-img-top p-3" alt="<?= esc($service['title']); ?>">
                                <div class="card-body text-center">
                                    <p class="price fw-bold text-success"><?= esc($service['price']); ?> / per day.</p>
                                    <h5 style="font-weight:bold;" class="card-title mb-3"><?= esc($service['title']); ?></h5>
                                    <div class="d-flex justify-content-center align-items-center gap-4">
                                        <p style="font-size:12px;" class="card-title mb-0"><i class="fas fa-cog"></i> <?= esc($service['gear']); ?></p>
                                        <p style="font-size:12px;" class="card-title mb-0"><i class="fas fa-users"></i> <?= esc($service['people']); ?></p>
                                        <p style="font-size:12px;" class="card-title mb-0"><i class="fas fa-suitcase-rolling"></i> <?= esc($service['bags']); ?></p>
                                    </div>

                                    <div class="specs mb-3">
                                        <?php
                                        // If the specs are stored as a string separated by "|" characters.
                                        $specs = explode('|', $service['specs']);
                                        foreach ($specs as $spec) {
                                            echo '<span class="me-3">' . htmlspecialchars(trim($spec)) . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <!-- Buttons displayed inline -->
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a style="border-color:#5790c1; color:#5790c1;" href="#" class="btn btn-sm rounded-pill px-4 view-details"
                                            data-bs-toggle="modal"
                                            data-bs-target="#serviceModal"
                                            data-id="<?= esc($service['id']); ?>"
                                            data-title="<?= esc($service['title']); ?>"
                                            data-price="<?= esc($service['price']); ?>"
                                            data-image="<?= esc(str_replace('../uploads/', 'uploads/', $service['image'])); ?>"
                                            data-specs="<?= esc($service['specs']); ?>"
                                            data-description="<?= esc($service['description']); ?>"
                                            data-inclusion="<?= esc($service['inclusion']); ?>"
                                            data-exclusion="<?= esc($service['exclusion']); ?>"
                                            data-status="<?= esc($service['status']); ?>">
                                            View Details
                                        </a>

                                        <?php
                                            // Generate a dynamic offset. For example, a random number between 1 and 1000.
                                            $offset = rand(1, 1000);

                                            // "Encrypt" the service ID by adding the offset.
                                            $encrypted_value = $service['id'] + $offset;

                                            // Create a payload that includes both the encrypted value and the offset, separated by a colon.
                                            $payload = $encrypted_value . ':' . $offset;

                                            // Base64-encode the payload, then URL-encode it.
                                            $encryptedParam = urlencode(base64_encode($payload));
                                            ?>
                                            <a href="<?= base_url('/book_service'.'?id='.$encryptedParam) ?>" class="btn btn-sm btn-success rounded-pill px-4">
                                                Book Now
                                            </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <!-- Next Button -->
                <button class="carousel-nav-btn next-btn">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            <!-- Pagination dots -->
            <div class="pagination-dots mt-4" id="paginationDots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <!-- Add more dots if needed -->
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- section 5 - Features section -->
<?= $this->section('section5') ?>   
    <section id="whychooseus" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" data-aos="zoom-in-up">Why Choose Us ?</h2>
                <p class="lead text-muted" data-aos="zoom-in-up">Book with confidence, Here’s some of the reasons why...</p>
            </div>
            <div class="row g-4">
                <div data-aos="flip-left"></div>
                <div class="col-md-4 text-center" data-aos="flip-left">
                    <div class="feature-icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <h3>Professionalism and Versatility</h3>
                    <p>At Vantrippers, professionalism is at the core of everything we do. Our owner, well-versed in
                        business and fluent in English,
                        ensures that we are equipped to handle any kind of business or corporate transaction with ease.
                        This professionalism extends to
                        all our interactions, whether you're a corporate client or a family planning a vacation.</p>
                </div>
                <div class="col-md-4 text-center" data-aos="flip-left">
                    <div class="feature-icon">
                        <i class="fa-solid fa-universal-access"></i>
                    </div>
                    <h3>Accessibility & Responsiveness
                    </h3>
                    <p>We understand that accessibility is crucial in the travel industry. That's why we've made it a
                        priority to be reachable through various channels,
                        including chat and phone. Our impressive 98% chat response rate and commitment to answering
                        every call reflect our dedication to providing support
                        whenever you need it. From the moment you make an inquiry to the end of your trip, we are here
                        to assist you.</p>
                </div>
                <div class="col-md-4 text-center" data-aos="flip-left">
                    <div class="feature-icon">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                    <h3>Transparency and No Hidden Charges</h3>
                    <p>At Vantrippers, we believe in complete transparency. We clearly outline all inclusions and
                        potential exclusions in our packages, ensuring that there are no surprises.
                        This approach allows our clients to make informed decisions and enjoy their travels without
                        worrying about unexpected costs.</p>
                </div>
                <div class="col-md-4 text-center" data-aos="flip-right">
                    <div class="feature-icon">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                    <h3>Dedicated and Courteous Team</h3>
                    <p>Our team comprises experienced drivers and travel coordinators who are not only skilled but also
                        passionate about providing excellent service.
                        They are dedicated to ensuring that your tour is smooth and enjoyable, allowing you to immerse
                        yourself in the beauty of the Philippines. Our staff's local knowledge
                        and commitment to hospitality make them invaluable companions on your journey.</p>
                </div>
                <div class="col-md-4 text-center" data-aos="flip-right">
                    <div class="feature-icon">
                        <i class="fa-solid fa-face-smile"></i>
                    </div>
                    <h3>Reviews and Customer Satisfaction
                    </h3>
                    <p>Customer satisfaction is a cornerstone of our business. We are proud of the positive feedback we
                        receive, with 97% of our travelers stating they would recommend
                        Vantrippers to friends and family. Our commitment to delivering high-quality service and
                        memorable experiences is consistently reflected in our excellent reviews.</p>
                </div>
                <div class="col-md-4 text-center" data-aos="flip-right">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3>Passion for Travel and Detailed Itineraries Outstanding</h3>
                    <p>Our passion for travel drives us to create meticulously planned itineraries that cater to the
                        specific desires and interests of our clients. We leverage our firsthand experience
                        and deep knowledge of the destinations we offer to ensure that every aspect of your journey is
                        thoughtfully considered and expertly executed. Our goal is to provide experiences that go beyond
                        mere sightseeing, offering rich cultural and immersive experiences that leave lasting memories.
                    </p>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- section 6 - joiners ads  -->
<?= $this->section('section6') ?>
    <section class="cta-1-section">
        <div class="container text-center">
            <h2 style="color: rgb(230, 147, 52);" class="mb-4">Are you alone and want to go adventure ?</h2>
            <p class="lead mb-4 text-white">Book now and be part of our Joiners' Travel Group.</p>
            <a style="border-radius: 10px;" href="#contact" class="btn btn-outline-info btn-md"><i
                    class="fa-solid fa-plus"></i> Book as Joiners</a>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- section 8 - Testimonials section -->
<?= $this->section('section7') ?>
    <section id="testimonials" class="py-5" data-aos="fade-up-left">
        <div class="container">
            <div class="text-center mb-5">
                <h2>What Our Travelers Say</h2>
                <p class="lead text-muted">Testimonials from satisfied adventurers</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial">
                        <p class="mb-3">"Vantrippers transformed our family vacation. The attention to detail and
                            personalized itinerary made it our best trip ever!"</p>
                        <div class="d-flex align-items-center">
                            <img style="width:50px; height:50px;" src="<?= base_url('Assets/images/user.png') ?>" alt="Traveler" class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">Jane Smith</h5>
                                <small class="text-muted">Family Adventurer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p class="mb-3">"Their attention to detail and customer-focused approach made all the
                            difference. My solo trek was perfectly planned and executed."</p>
                        <div class="d-flex align-items-center">
                            <img style="width:50px; height:50px;" src="<?= base_url('Assets/images/user.png') ?>" alt="Traveler" class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">John Doe</h5>
                                <small class="text-muted">Solo Traveler</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p class="mb-3">"Our corporate retreat organized by Vantrippers received rave reviews from the
                            entire team. Professional, seamless, and memorable."</p>
                        <div class="d-flex align-items-center">
                            <img style="width:50px; height:50px;" src="<?= base_url('Assets/images/user.png') ?>" alt="Traveler" class="rounded-circle me-3">
                            <div>
                                <h5 class="mb-0">Sarah Johnson</h5>
                                <small class="text-muted">Corporate Events Manager</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- section 9 - Call to action section -->
<?= $this->section('section8') ?>
    <section class="cta-section">
        <div class="container text-center">
            <h1 class="mb-4 text-dark">Accreditation & Affiliates</h1>

            <!-- Logo Section -->
            <div class="row mt-5" data-aos="fade-right">
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('Assets/images/dti_img.png') ?>" alt="Logo 1" class="img-fluid">
                </div>
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('Assets/images/dot_img.png') ?>" alt="Logo 2" class="img-fluid">
                </div>
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('Assets/images/sicatt_img.png') ?>" alt="Logo 3" class="img-fluid">
                </div>
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('Assets/images/icope_img.png') ?>" alt="Logo 4" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- section 10 - Contact section -->
<?= $this->section('section9') ?>
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
            <br id="send_message"><hr>
            <div class="row">
                <!-- ERROR AND SUCCESS MESSAGES AFTER SUBMITING -->
                <?php if (session()->has('successMessage')): ?>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('successMessage')) ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('errorMessage')): ?>
                    <div class="alert alert-danger">
                        <?= esc(session()->getFlashdata('errorMessage')) ?>
                    </div>
                <?php endif; ?>
                <!-- ERROR AND SUCCESS MESSAGES AFTER SUBMITING -->

                <div class="col-md-6 mb-4 mb-md-0">
                    <!-- Updated form with method POST and name attributes -->
                    <form method="post" action="<?= base_url('/send_message') ?>">
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


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- footer -->
<?= $this->section('footer') ?>
    <?=  $this->include('FrontPage/Includes/footer') ?>
<?= $this->endSection() ?>

<!-- modals -->
<?= $this->section('modals') ?>
    <?=  $this->include('Frontpage/Includes/modals/home_modals') ?>
<?= $this->endSection() ?>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- js libraries -->
<?= $this->section('js_libraries') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?= $this->endSection() ?>

<!-- js -->
<?= $this->section('js') ?>
    <script src="<?= base_url('Frontpage/js/script.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Frontpage/js/rent_carousel.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('Frontpage/js/index.js') ?>?v=<?= time() ?>"></script>
<?= $this->endSection() ?>
