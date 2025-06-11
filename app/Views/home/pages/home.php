<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/home_layout') ?>

<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/rent_carousel.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('css/card_tour.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>




<!-- main content -->
<?= $this->section('main_content') ?>
    <!-- Background Carousel -->
    <section id="home">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-aos="fade-right">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('<?= base_url('images/carousel_img3.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Your adventure begins with our
                                innovative travel solutions</p>
                            <div>
                                <a href="/vantrippers/pages/contact.php" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>
                <div class="carousel-item active" style="background-image: url(' <?= base_url('images/carousel_img2.jpg                                                                                                                 ') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Your adventure begins with our
                                innovative travel solutions</p>
                            <div>
                                <a href="/vantrippers/pages/contact.php" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>

                <div class="carousel-item active" style="background-image: url(' <?= base_url('images/carousel_img1.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Your adventure begins with our
                                innovative travel solutions</p>
                            <div>
                                <a href="/vantrippers/pages/contact.php" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url(' <?= base_url('images/carousel_img2.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Discover hidden gems and
                                breathtaking landscapes</p>
                            <div>
                                <a href="/vantrippers/pages/contact.php" class="btn btn-outline-info btn-lg me-3 btn-custom">
                                    <i class="fa-solid fa-calendar"></i> Book Now
                                </a>
                            </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url(' <?= base_url('images/carousel_img3.jpg') ?>')">
                    <div class="carousel-overlay"></div>
                    <div class="carousel-caption d-md-block text-center">
                        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                            class="mb-4">Vantrippers Travel and Tours Agency</h2>
                            <p style="font-size:20px; color:aqua;" class="lead mb-5">Customized experiences for every
                                type of traveler</p>
                            <div>
                                <a href="/vantrippers/pages/contact.php" class="btn btn-outline-info btn-lg me-3 btn-custom">
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

    <!-- Travel Packages -->
    <section class="travel-package" id="carousel-section" class="pt-5">
        <div class="text-center">
            <h2 class="section-title fw-bold">Travel Packages</h2>
            <h4>Book Now</h4
            <p>Take the wheel and explore—your journey, your way.</p>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">Weekly Joiners Tour</h3>
                </div>
            </div>

            <div class="card-container">
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">Exclusive Tour Packages</h3>
                </div>
            </div>

            <div class="card-container">
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">Combined Tour Package</h3>
                </div>
            </div>

            <div class="card-container">
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">Domestic Tour Package</h3>
                </div>
            </div>

            <div class="card-container">
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">Van Rental Tour Package</h3>
                </div>
            </div>

            <div class="card-container">
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('images/bolinao_img.jpg') ?>" alt="">

                    <div class="text-block show">
                        <p class="city">City Name</p>
                    </div>
                    <div class="text-block hidden">
                        <p class="package-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est veritatis eius quas sapiente totam, repellat eaque suscipit aliquid sint officia esse ipsum, omnis modi. Consectetur ipsa dolores voluptatibus quas!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><br>

    <!-- Add ?? -->
    <section class="cta-1-section">
        <div class="container text-center">
            <h2 style="color: rgb(230, 147, 52);" class="mb-4">Are you alone and want to go adventure ?</h2>
            <p class="lead mb-4 text-white">Book now and be part of our Joiners' Travel Group.</p>
            <a style="border-radius: 10px;" href="<?= base_url('/contact') ?>" class="btn btn-outline-info btn-md"><i
                    class="fa-solid fa-plus"></i> Book as Joiners</a>
        </div>
    </section>

    <!-- Van Rentals  -->
    <section id="services" class="py-5 position-relative">
        <div class="container text-center">
            <h2 class="section-title fw-bold">Van Rentals</h2>
            <p>Take the wheel and explore—your journey, your way.</p>
            <div class="carousel-container mt-5 position-relative">
                <!-- Previous Button -->
                <button class="carousel-nav-btn prev-btn">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <div class="row justify-content-center" id="carouselRow" data-aos="fade-left">
                <?php if($services) : ?>
                    <?php foreach($services as $service) :?>
                        <div class="col-md-4 mb-4">
                            <div class="card service-card border-1 shadow-sm rounded mx-auto">
                                <img src="<?= base_url('images/van1.png') ?>" alt="">
                                <div class="card-body text-center">
                                    <p class="price fw-bold text-success">P4,500 / per day</p>
                                    <p><span class="card-title mb-3">Type of Van:</span> <span>Toyota Grandia</span></p>
                                    <div class="d-flex justify-content-center align-items-center gap-4">
                                        <p style="font-size:12px;" class="card-title mb-0"><i class="fas fa-cog"></i> Manual </p>
                                        <p style="font-size:12px;" class="card-title mb-0"><i class="fas fa-users"></i> 12</p>
                                    </div>

                                    <div class="specs mb-3">
                                        <?php
                                        $specs = explode('|', $service['specs']);
                                        foreach ($specs as $spec) {
                                            echo '<span class="me-3">' . htmlspecialchars(trim($spec)) . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a style="border-color:#5790c1; color:#5790c1;" href="#" class="btn btn-sm rounded-pill px-4 view-details"
                                            data-bs-toggle="modal"
                                            data-bs-target="#serviceModal"
                                            data-id="1"
                                            data-title="Toyota Grandia"
                                            data-price="P4,500 / per day <br> Minimum of 2 days rent"
                                            data-image="./images/van1.png"
                                            data-specs="1"
                                            data-description="Manual Transmission and has a seating capacity of 12 passenger"
                                            data-inclusion="<br>
                                            - Professional driver that knowledgeable on tour itinerary <br>
                                            - Driver's fee<br>
                                            - The Van it self and maintenance<br>"
                                            data-exclusion="<br>
                                            - Diesel consumption<br>
                                            - All applicable Toll Gates<br>
                                            - Driver's meals<br>
                                            - Driver's quarter / room<br>
                                            - Parking Fees
                                            "
                                            data-status="">
                                            View Details
                                        </a>

                                        <a href="van_book.php?id=<?php echo htmlspecialchars($service['id']); ?>" class="btn btn-sm btn-success rounded-pill px-4">
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else :?>
                    <div class="col-md-4 mb-4">
                        <p style="color: gray; opacity: .3;">No Van Rentals.</p>
                    </div>
                <?php endif; ?>
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

    <!-- Features -->
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

    <!-- Add ?? -->
    <section class="cta-1-section">
        <div class="container text-center">
            <h2 style="color: rgb(230, 147, 52);" class="mb-4">Are you alone and want to go adventure ?</h2>
            <p class="lead mb-4 text-white">Book now and be part of our Joiners' Travel Group.</p>
            <a style="border-radius: 10px;" href="<?= base_url('/contact') ?>" class="btn btn-outline-info btn-md"><i
                    class="fa-solid fa-plus"></i> Book as Joiners</a>
        </div>
    </section>

    <!-- Testimonials Section -->
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
                            <img style="width:50px; height:50px;" src="images/bolinao_img.jpg" alt="Traveler" class="rounded-circle me-3">
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
                            <img style="width:50px; height:50px;" src="images/bolinao_img.jpg" alt="Traveler" class="rounded-circle me-3">
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
                            <img style="width:50px; height:50px;" src="images/bolinao_img.jpg" alt="Traveler" class="rounded-circle me-3">
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

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container text-center">
            <h1 class="mb-4 text-dark">Accreditation & Affiliates</h1>

            <!-- Logo Section -->
            <div class="row mt-5" data-aos="fade-right">
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('images/dti_img.png') ?>" alt="Logo 1" class="img-fluid">
                </div>
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('images/dot_img.png') ?>" alt="Logo 2" class="img-fluid">
                </div>
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('images/sicatt_img.png') ?>" alt="Logo 3" class="img-fluid">
                </div>
                <div class="col-6 col-md-3">
                    <img style="width:150px; height:150px;" src="<?= base_url('images/icope_img.png') ?>" alt="Logo 4" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>


<!-- modal -->
<?= $this->section('modals') ?>
    <?= $this->include('home/partials/home_modal') ?>
<?= $this->endSection() ?>




<!-- css -->
<?= $this->section('js') ?>
    <script src="<?= base_url('js/rent_carousel.js') ?>?v=<?= time() ?>"></script>
    <script src="<?= base_url('js/index.js') ?>?v=<?= time() ?>"></script>
<?= $this->endSection() ?>
