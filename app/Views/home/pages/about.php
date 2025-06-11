<?php /** @var CodeIgniter\View\View $this */?>

<?= $this->extend('layouts/home_layout') ?>

<!-- css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('css/about_us.css') ?>?v=<?= time() ?>">
<?= $this->endSection() ?>




<!-- main content -->
<?= $this->section('main_content') ?>
    <!-- Hero Section -->
    <section class="hero-section" style="background-image: url('<?= base_url('images/IMG_5772.PNG') ?>'); ">
        <div class="container text-center">
            <h1 class="hero-title">ABOUT US</h1>
        </div>
    </section>

    <!-- Travel With Us Section -->
    <section class="travel-with-us py-5 container">
        <img src="<?= base_url('images/about_img3.jpg') ?>" alt="VanTripper Travel Group" class="rounded shadow-sm">
        <h2 class="section-title">Travel With Us</h2>
        <p>
            Vantrippers Travel and Tours was founded in March 2016 to address the growing demand for van rental services across Luzon. Our journey began with offering reliable van rentals, catering to travelers who needed convenient and comfortable transportation. Recognizing the potential to enhance our services, we expanded in July 2016 by offering tour packages to various destinations within Luzon, starting with popular spots like Baguio. This expansion was driven by our commitment to providing comprehensive travel solutions to our customers, making their journey not just a trip but a memorable experience.
            <br><br>
            As our customer base grew, so did our offerings. We formed a dedicated team of professionals in Luzon, including courteous drivers and knowledgeable travel coordinators. This team was essential in providing personalized and seamless travel experiences, ensuring that our guests could enjoy their trips without any hassle.
            <br><br>
            By 2021, we observed a rising interest in combined region tours, such as Ilocos-Baguio and Sagada-Baguio-Ilocos. In response, we developed these combinations into flagship tour packages, offering travelers a richer and more diverse experience. These tours have been particularly well-received, showcasing the beauty and cultural richness of the Philippines.
            <br><br>
            Our commitment to growth and service excellence continues as we expand our offerings to include other domestic and international destinations. In 2024, we established our main office in General Trias, Cavite, and we are currently in the process of obtaining official recognition from the Department of Tourism (DOT) as a regular travel and tours operator. This milestone reflects our dedication to adhering to industry standards and delivering high-quality services.
        </p>
    </section>

    <!-- Mission and Vision Section -->
    <section class="mission-vision py-5 bg-light">
        <div class="container">
            <h2 class="section-title1 text-center">VANTRIPPER MISSION AND VISION</h2>
            <div class="row">
                <div class="col-md-6 mb-4 box">
                    <div class="mission-box p-2 h-100 bg-white">
                        <div class="icon-title d-flex align-items-center mb-2">
                            <img src="<?= base_url('images/mission-statement.png') ?>" alt="Mission Icon" class="me-3" width="40">
                            <h3>Mission</h3>
                        </div>
                        <p>To provide exceptional travel and tours experiences that prioritize convenience, transparency, and customer satisfaction. We aim to connect travelers to the beauty and culture of the Philippines through reliable transportation, expertly crafted itineraries, and a commitment to professionalism.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 box">
                    <div class="vision-box p-2 h-100 bg-white">
                        <div class="icon-title d-flex align-items-center mb-3">
                            <img src="<?= base_url('images/vision.png') ?>" alt="Vision Icon" class="me-3" width="40">
                            <h3>Vision</h3>
                        </div>
                        <p>To become a trusted leader in the travel and tours industry, known for professionalism, accessibility, and innovation. We envision expanding our reach to include domestic and international destinations while continually enhancing our services to deliver transformative travel experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Travel Tours Section -->
    <section class="travel-tours py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-titleh2 mb-2">Explore More</h2>
                <h3 class="section-titleh3">Our Travel Tours</h3>
            </div>
            <div class="tour-grid">
                <img src="<?= base_url('images/travel_tour/1.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/2.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/3.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/4.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/5.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/6.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/7.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/8.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/9.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/10.png') ?>" alt="">
                <img src="<?= base_url('images/travel_tour/11.png') ?>" alt="">
                    
                    <!-- <img src="../uploads/bicol/watermarked/2.2.JPG" alt="Tour 1">
                    <img src="../uploads/caramoan/raw/IMG_2078.JPG" alt="Tour 2">
                    <img src="../uploads/bolinao/raw/IMG_5740.JPG" alt="Tour 7 (Tall)" class="tall">
                    

                    
                    <img src="../uploads/bicol/raw/15.jpg" alt="Tour 4">
                    <img src="../uploads/calaguas/raw/0B3C5530-F037-443C-BF88-C4B72C8711F9.JPG" alt="Tour 5">
                    <img src="../uploads/calaguas/raw/0F067789-8BB2-4A35-A322-59E2F2AC34FB.JPG" alt="Tour 6">

                    
                    <img src="../uploads/sagada/raw/0ww4e120006poeu9xEB2D.jpg" alt="Tour 3">
                    <img src="../uploads/bicol/watermarked/2.2.JPG" alt="Tour 8">

                    
                    <img src="../uploads/bicol/watermarked/2.2.JPG" alt="Tour 9">
                    <img src="../uploads/bicol/watermarked/2.2.JPG" alt="Tour 10">
                    <img src="../uploads/bicol/watermarked/2.2.JPG" alt="Tour 11"> -->
            </div>
        </div>
    </section>
<?= $this->endSection() ?>




<!-- js -->
<?= $this->section('js') ?>
    <!-- JS Script here -->
<?= $this->endSection() ?>