<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- USERS PAGE --> <?php /** @var CodeIgniter\View\View $this */?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<?= $this->extend('Layouts/main_layout') ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Imports -->
<?= $this->section('css_libraries') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
<?= $this->endSection() ?>
<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/about_us.css') ?>?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= base_url('Frontpage/css/front_page.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- MAIN CONTENT -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- header -->
<?= $this->section('header') ?>
    <?= $this->include('FrontPage/Includes/header') ?>
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Section 1 - Hero Section -->
<?= $this->section('section1') ?>
    <section class="hero-section" style="background-image: url('<?= base_url('Assets/images/about_img4.jpg') ?>'); ">
        <div class="container text-center">
            <h1 class="hero-title">ABOUT US</h1>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- Section 2 - Travel With Us Section -->
<?= $this->section('section2') ?>
    <section class="travel-with-us py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="<?= base_url('Assets/images/about_img2.jpg') ?>" alt="VanTripper Travel Group" class="img-fluid rounded shadow-sm mb-3">
                    <div class="partners d-flex flex-wrap justify-content-start gap-3">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">Travel With Us</h2>
                    <p>VANTRIPPER'S TRAVEL AND TOURS WAS FOUNDED IN MARCH 2016 TO MEET THE GROWING DEMAND FOR VAN RENTAL SERVICES ACROSS LUZON. WE STARTED BY PROVIDING RELIABLE VAN RENTALS, ENSURING TRAVELERS HAD CONVENIENT AND COMFORTABLE TRANSPORTATION.</p>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- Section 3 - Mission and Vision Section -->
<?= $this->section('section3') ?>
    <section class="mission-vision py-5 bg-light">
        <div class="container">
            <h2 class="section-title1 text-center">VANTRIPPER MISSION AND VISION</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="mission-box p-2 h-100 bg-white">
                        <div class="icon-title d-flex align-items-center mb-2">
                            <img src="<?= base_url('Assets/images/about_img5.jpg') ?>" alt="Mission Icon" class="me-3" width="40">
                            <h3>Mission</h3>
                        </div>
                        <p>To provide exceptional travel and tours experiences that prioritize convenience, transparency, and customer satisfaction. We aim to connect travelers to the beauty and culture of the Philippines through reliable transportation, expertly crafted itineraries, and a commitment to professionalism.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="vision-box p-2 h-100 bg-white">
                        <div class="icon-title d-flex align-items-center mb-3">
                            <img src="<?= base_url('Assets/images/about_img5.jpg') ?>" alt="Vision Icon" class="me-3" width="40">
                            <h3>Vision</h3>
                        </div>
                        <p>To become a trusted leader in the travel and tours industry, known for professionalism, accessibility, and innovation. We envision expanding our reach to include domestic and international destinations while continually enhancing our services to deliver transformative travel experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<!-- Section 4 - Our Travel Tours Section -->
<?= $this->section('section4') ?>
    <section class="travel-tours py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-titleh2 mb-2">Explore More</h2>
                <h3 class="section-titleh3">Our Travel Tours</h3>
            </div>
            <div class="tour-grid">
                
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 1">
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 2">
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 7 (Tall)" class="tall">
                
                
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 4">
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 5">
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 6">

                
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 3">
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 8">

                
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 9">
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 10">
                <img src="<?= base_url('Assets/images/about_img4.jpg') ?>" alt="Tour 11">
            </div>
        </div>
    </section>
<?= $this->endSection() ?>



<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- footer -->
<?= $this->section('footer') ?>
    <?=  $this->include('FrontPage/Includes/footer') ?>
<?= $this->endSection() ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- js libraries -->
<?= $this->section('js_libraries') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>