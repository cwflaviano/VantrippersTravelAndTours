<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="center-span" style="background-color: #ffcfa8; height:80px; font-size:18px;">
                    <span style="color:aliceblue;" class="Text-light ml-3">Messages</span>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>

        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="center-span" style="background-color: #ffcfa8; height: 80px; font-size: 18px;">
                    <span style="color:aliceblue;" class="Text-light ml-3 mt-5">Notification</span>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user icon"></i> <!-- Regular user icon -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <div class="center d-flex justify-content-center align-items-center" style="background-color: #ffcfa8; height: 100px;">
                    <i class="fas fa-user-circle fa-4x text-white"></i> <!-- Large user icon instead of image -->
                </div>
                <div class="dropdown-divider"></div>
                <span style="pointer-events: none;" class="dropdown-item text-bold">USER OPTIONS</span>

                <a href="#" class="dropdown-item">
                    <span>Settings</span><i class="fas fa-gear mr-2 float-right"></i>
                </a>

                <div class="dropdown-divider ml-2 mr-2"></div>
                <span style="pointer-events: none;" class="dropdown-item text-bold">ACTIONS</span>
                <a href="<?= base_url('/logout') ?>" class="dropdown-item">
                    <span class="ml-1">Logout</span><i class="fas fa-right-from-bracket mr-2 float-right"></i>
                </a>
            </div>
        </li>

    </ul>
</nav>