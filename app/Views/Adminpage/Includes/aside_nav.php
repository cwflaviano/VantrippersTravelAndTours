<?php $page1 = service('uri')->getSegment(1); ?> <!-- eg. Dashboard -->
<?php $page2 = service('uri')->getSegment(2); ?> <!-- eh. Dashboard/Users -->

<aside class="main-sidebar sidebar-light-light elevation-4">
    <div class="sidebar">
        <!-- SIDEBAR HEADERS -->
        <div class="text-center mt-3">
            <img src="<?= base_url('Assets/images/main_logo.png') ?>" alt="Logo" class="logo-circle"> <!-- Logo Sidebar panel opened -->
            <img src="<?= base_url('Assets/images/main_logo.png') ?>" alt="New Logo" class="logo-responsive rounded-circle mt-2"> <!-- Logo Sidebar panel minimized -->
            <h4 class="logo-title mt-2">Administrator</h4>
        </div>

        <!-- ASSIDE NAVITATIONS -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- MAIN SECTION -->
                <li class="nav-header">Main</li>
                    <li class="nav-item">
                        <a href="<?= base_url('/admin/dashboard') ?>" class="nav-link <?= $page2 == 'dashboard' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p id="sidebar-text">
                                Dashboard
                            </p>
                        </a>
                    </li>

                <!-- USERS SECTION -->
                <li class="nav-header">User's</li>
                    <li class="nav-item <?= ($page2 == 'users_management' ||  $page2 == 'view_users.php') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page2 == 'users_management' || $page2 == 'view_user') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p id="sidebar-text">
                                System User's
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('/admin/users_management') ?>" class="nav-link <?= ($page2 == 'users_management' ||  $page2 === 'view_users.php') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                <!-- HOTEM MANAGEMENT SECTION -->
                <li class="nav-header">Hotel Management</li>
                    <!-- ACCOMODATION -->
                    <li class="nav-item">
                        <a href="create_accommodation.php" class="nav-link <?= $page1 == 'create_accommodation.php' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-hotel"></i>
                            <p>Accommodation</p>
                        </a>
                    </li>
                    <!-- LIST OF ACCOMODATION -->
                    <li class="nav-item">
                        <a href="accommodation_list.php" class="nav-link <?= ($page1 == 'accommodation_list.php') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>List of Accommodation</p>
                        </a>
                    </li>
                    <!-- SEARCH ACCOMODATION -->
                    <li class="nav-item">
                        <a href="search_accommodation.php" class="nav-link <?= ($page1 == 'search_accommodation.php') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-search"></i>
                            <p>Search Accommodation</p>
                        </a>
                    </li>

                <!-- CRM SECTION -->
                <li class="nav-header">CRM</li>
                    <li class="nav-item <?= ($page1 == 'create_invoice.php' || $page1 == 'invoice_package.php' || $page1 == 'customer_list.php' || $page1 == 'terms.php') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page1 == 'create_invoice.php' || $page1 == 'invoice_package.php' || $page1 == 'customer_list.php' || $page1 == 'terms.php') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p id="sidebar-text">
                                Sales
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="terms.php" class="nav-link <?= $page1 == 'terms.php' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p id="sidebar-text">
                                        Terms
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="invoice_package.php" class="nav-link <?= $page1 == 'invoice_package.php' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p id="sidebar-text">
                                        Packages
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="create_invoice.php" class="nav-link <?= $page1 == 'create_invoice.php' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p id="sidebar-text">
                                        Invoices
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link <?= $page1 == '#' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p id="sidebar-text">
                                        Receipts
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="customer_list.php" class="nav-link <?= $page1 == 'customer_list.php' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p id="sidebar-text">
                                        Customers
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- VAN RENTALS SECTION -->
                    <li class="nav-item <?= ($page1 == 'van_management.php' || $page1 == 'van_bookings.php') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page1 == 'van_management.php' || $page1 == 'van_bookings.php') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-shuttle-van"></i>
                            <p id="sidebar-text">
                                Van Rentals
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="van_management.php" class="nav-link <?= $page1 == 'van_management.php' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p id="sidebar-text">
                                        Add New Van
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="van_bookings.php" class="nav-link <?= $page1 == 'van_bookings.php' ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p id="sidebar-text">
                                        Van Rental Bookings
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>


                <!-- MARKETING SECITONS -->
                <li class="nav-header">Marketing</li>
                    <li class="nav-item <?= ($page1 == '') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page1 == '') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p id="sidebar-text">
                                Template
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link <?= ($page1 == '') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Item 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link <?= ($page1 == '') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Item 2</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                <!-- HR SECTION -->
                <li class="nav-header">HR</li>
                    <li class="nav-item <?= ($page1 == '') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page1 == '') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p id="sidebar-text">
                                Employees
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link <?= ($page1 == '') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Item 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link <?= ($page1 == '') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Item 2</p>
                                </a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </nav>
    </div>

    <!-- ASIDE FOOTER -->
    <div class="footer">
        <div class="sidebar-icons d-flex justify-content-around p-2 border-top">
            <!-- Notification icon -->
            <a style="color:gray;" href="#notifications" class="notification-icon position-relative text-decoration-none">
                <i class="fas fa-bell"></i>
                <span class="badge badge-warning badge-pill position-absolute top-0 start-100 translate-middle small-badge">5</span>
            </a>

            <!-- Messages Icon -->
            <a style="color:gray;" href="#messages" class="message-icon position-relative text-decoration-none">
                <i class="fas fa-envelope"></i>
                <span class="badge badge-success badge-pill position-absolute top-0 start-100 translate-middle small-badge">7</span>
            </a>

            <!-- Setting Icon -->
            <a href="#settings" class="settings-icon text-decoration-none">
                <i class="fas fa-cog text-secondary"></i>
            </a>

            <!-- Logout icon -->
            <a style="color:gray;" href="<?= base_url('/logout') ?>" class="power-icon text-decoration-none">
                <i class="fas fa-power-off text-secondary"></i>
            </a>
        </div>
    </div>
</aside>