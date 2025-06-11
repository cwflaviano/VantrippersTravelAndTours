<!-- GET THE SECOND SEGMENT OF THE BASE URL = ex. https://localhost/project_name/public/segment1/segment2/segment3/ -->
<?php $page = service('uri')->getSegment(2); ?> 

<!-- NAVIGATION SIDE BAR -->
<aside class="main-sidebar sidebar-light-light elevation-4">
    <div class="sidebar">
        <div class="text-center mt-3">
            <img src="<?= base_url('images/main_logo.png') ?>" alt="Logo" class="logo-circle">
            <img src="<?= base_url('images/main_logo.png') ?>" alt="New Logo" class="logo-responsive rounded-circle mt-2">
            <h4 class="logo-title mt-2">Administrator</h4>
        </div>

        <!-- SIDE NAVIGATION -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Main </li>
                <!-- DASHBOARD LINK -->
                <li class="nav-item">
                    <a href="<?= base_url('/admin/dashboard') ?>" class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p id="sidebar-text">
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- USERS LINKS -->
                <li class="nav-header">User's</li>
                <li class="nav-item <?= ($page == 'user-management' ||  $page == 'view_users.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($page == 'add_user.php' || $page == 'view_users.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p id="sidebar-text">
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_user.php" class="nav-link <?= ($page == 'add_user.php' ||  $page === 'view_users.php') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>   
                    </ul>
                </li>

                <!-- HOTEL MANAGEMENT LINKS -->
                <li class="nav-header">Hotel Management</li>
                <li class="nav-item">
                    <a href="create_accommodation.php" class="nav-link <?= $page == 'create_accommodation.php' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>Accommodation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="accommodation_list.php" class="nav-link <?= ($page == 'accommodation_list.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>List of Accommodation</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="search_accommodation.php" class="nav-link <?= ($page == 'search_accommodation.php') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-search"></i>
                        <p>Search Accommodation</p>
                    </a>
                </li>

                <!-- CRM LINKS -->
                <li class="nav-header">CRM</li>
                <li class="nav-item <?= ($page == 'gallery-admin.php' || $page == 'faq_admin.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($page == 'gallery-admin.php' || $page == 'faq_admin.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-images"></i>
                        <p id="sidebar-text">
                            Gallery Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="gallery-admin.php" class="nav-link <?= $page == 'gallery-admin.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="faq_admin.php" class="nav-link <?= $page == 'faq_admin.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($page == 'packages_admin.php' || $page == 'van_bookings.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($page == 'packages_admin.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-globe"></i>
                        <p id="sidebar-text">
                            Travel Packages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="packages_admin.php" class="nav-link <?= $page == 'packages_admin.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Packages
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?= ($page == 'van_management.php' || $page == 'van_bookings.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($page == 'van_management.php' || $page == 'van_bookings.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-truck"></i>
                        <p id="sidebar-text">
                            Van Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="van_management.php" class="nav-link <?= $page == 'van_management.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Van Information
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="van_bookings.php" class="nav-link <?= $page == 'van_bookings.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Van Rental Bookings
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- MARKETING LINKS  -->
                <li class="nav-header">Marketing</li>
                <li class="nav-item <?= ($page == '') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($page == '') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p id="sidebar-text">
                            Template
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($page == '') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($page == '') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item 2</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- HR LINKS -->
                <li class="nav-header">HR</li>
                <li class="nav-item <?= ($page == '') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($page == '') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p id="sidebar-text">
                            Employees
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($page == '') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($page == '') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <!-- SIDE NAV FOOTER -->
    <div class="footer">
        <div class="sidebar-icons d-flex justify-content-end p-4 border-top">
           
            <a style="color:gray;" href="<?= base_url('/logout') ?>" class="power-icon text-decoration-none">
                <i class="fas fa-power-off text-secondary"></i>
            </a>
        </div>
    </div>
</aside>