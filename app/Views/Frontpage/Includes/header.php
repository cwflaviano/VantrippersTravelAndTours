<?php $current_url = uri_string() ?>

<!-- Navigation Bar -->
<header class="sticky-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-contact">
                    <span><i class="fa-solid fa-phone"></i> +63 (976) 476-4187</span>
                    <span><i class="fa-solid fa-envelope"></i> book@vantripperstravelandtour.com</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-xl navbar-light bg-light sticky-top">
        <div class="container">
            <a href="index.php"><img src="<?= base_url('Assets/images/main_logo.png') ?>" alt="Logo" class="logo-img"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <!-- home -->
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_url == '' || $current_url == 'home') ? 'active' : '' ?>" href="<?= base_url('/') ?>"><i class="fa-solid fa-house"></i> Home</a>
                    </li>

                    <!-- about -->
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_url == 'about') ? 'active' : '' ?>" href="<?= base_url('/about') ?>">About Us</a>
                    </li>

                    <!-- Dropdown tour packages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tour Packages <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('/commingsoon') ?>">Luzon Tours</a></li>

                            <li><a class="dropdown-item" href="<?= base_url('/commingsoon') ?>">Domestic Tours</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="<?= base_url('/commingsoon') ?>">Combine Tours</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown Others -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Others <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('/commingsoon') ?>">Gallery</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('/commingsoon') ?>">FAQ</a></li>
                        </ul>
                    </li>

                    <!-- Contacts -->
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_url == 'contact') ? 'active' : '' ?>" href="<?= base_url('/commingsoon')?>">Contact</a>
                    </li>

                </ul>
                <!-- Login Button Added Here -->
                <a href="<?= base_url('/signin') ?>" class="btn-login">
                    <i class="fa-solid fa-user"></i> Login
                </a>
            </div>
        </div>
    </nav>
</header>