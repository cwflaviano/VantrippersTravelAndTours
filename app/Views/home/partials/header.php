<?php $url = service('uri')->getSegment(1); ?>

<header class="sticky-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-contact">
                    <span  title="Hotline number"><i class="fa-solid fa-phone"></i > +63 (976) 476-4187</span>
                    <span><i class="fa-solid fa-envelope"></i><a href="mailto:book@vantripperstravelandtour.com" style="text-decoration: none; color: white;" title="message us here">book@vantripperstravelandtour.com</a> </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-xl navbar-light bg-light sticky-top">
        <div class="container">
            <a href="<?= base_url('/') ?>"><img src="<?= base_url('images/main_logo.png') ?>" alt="Logo" class="logo-img"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($url == '' || $url == 'home') ? 'active' : '' ?>" href="<?= base_url('/') ?>"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($url == 'about') ? 'active' : '' ?>" href="<?= base_url('/about') ?>">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tour Packages <i class="fa-solid fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a onclick="toggleDropdown('luzon', event)" class="dropdown-item">Luzon Tours</a></li>
                            <li><a onclick="toggleDropdown('domestic', event)" class="dropdown-item">Domestic Tours</a></li>
                            <hr class="dropdown-divider">
                            <li><a onclick="toggleDropdown('combine', event)" class="dropdown-item">Combine Tours</a></li>

                            <div id="luzon" class="nested-dropdown-content dropdown-menu">
                                <!-- Dynamic Luzon destinations will be loaded here -->
                            </div>

                            <div id="domestic" class="nested-dropdown-content dropdown-menu">
                                <!-- Dynamic Domestic destinations will be loaded here -->
                            </div>

                            <div id="combine" class="nested-dropdown-content dropdown-menu">
                                <!-- Dynamic Combined packages will be loaded here -->
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Others <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item <?= ($url == 'gallery2') ? 'active' : '' ?>" href="<?= base_url('/') ?>">Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($url == 'contact') ? 'active' : '' ?>" href="<?= base_url('/contact') ?>">Contact</a>
                    </li>
                </ul>
                <!-- Login Button Added Here -->
                <a href="<?= base_url('/login') ?>" class="btn-login">
                    <i class="fa-solid fa-user"></i> Login
                </a>
            </div>
        </div>
    </nav>
</header>