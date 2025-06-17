<!-- GET THE SECOND SEGMENT OF THE BASE URL = ex. https://localhost/project_name/public/segment1/segment2/segment3/ -->
<?php $seg1 = service('uri')->getSegment(1); ?> 
<?php $seg2 = service('uri')->getSegment(2); ?> 
<?php $seg3 = service('uri')->getSegment(3); ?> 

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
                    <a href="<?= base_url('/admin/dashboard') ?>" class="nav-link <?= $seg2 == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p id="sidebar-text">
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- USERS LINKS -->
                <li class="nav-header">User's</li>
                <li class="nav-item <?= ($seg2 == 'user-management' ||  $seg2 == 'view_users.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg2 == 'user-management' || $seg2 == 'view_users.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p id="sidebar-text">
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/user-management') ?>" class="nav-link <?= ($seg2 == 'user-management' ||  $seg2 === 'view_users.php') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>   
                    </ul>
                </li>

                <!-- HOTEL MANAGEMENT LINKS -->
                <li class="nav-header">Hotel Management</li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/accommodation/create') ?>" class="nav-link <?= $seg3 == 'create' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>Accommodation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/accommodation/list') ?>" class="nav-link <?= ($seg3 == 'list') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>List of Accommodation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/accommodation/search') ?>" class="nav-link <?= ($seg3 == 'search') ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-search"></i>
                        <p>Search Accommodation</p>
                    </a>
                </li>

                <!-- CRM LINKS -->
                <li class="nav-header">CRM</li>
                <li class="nav-item <?= ($seg3 == 'crm' || $seg3 == 'terms' || $seg3 == 'customer_list.php' || $seg3 == 'terms.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg3 == 'terms' || $seg3 == 'invoice_package.php' || $seg3 == 'customer_list.php' || $seg3 == 'terms.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p id="sidebar-text">
                                Sales
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/crm/terms') ?>" class="nav-link <?= $seg3 == 'terms' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Terms
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="invoice_package.php" class="nav-link <?= $seg3 == 'invoice_package.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Packages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="create_invoice.php" class="nav-link <?= $seg3 == 'create_invoice.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Invoices
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?= $seg3 == '#' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Receipts
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="customer_list.php" class="nav-link <?= $seg3 == 'customer_list.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Customers
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="iteneraries.php" class="nav-link <?= $seg3 == 'iteneraries.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Iteneraries
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $seg2 ? 'crm' : '' ?>">
                    <a href="#" class="nav-link <?= $seg2 ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-route"></i>
                        <p id="sidebar-text">
                            Tours Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="luzon_joiners.php" class="nav-link <?= $seg3 == 'luzon_joiners.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Joiners Luzon Tours</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="luzon_exclusive.php" class="nav-link <?= $seg3 == 'luzon_exclusive.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exclusive Luzon Tours</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="domestic_tours.php" class="nav-link <?= $seg3 == 'domestic_tours.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Domestic Tours</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="completed_tours.php" class="nav-link <?= $seg3 == 'completed_tours.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Completed Tours</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="cancelled_tours.php" class="nav-link <?= $seg3 == 'cancelled_tours.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancelled | Rescheduled Tours</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg3 == 'van_management.php' || $seg3 == 'van_bookings.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg3 == 'van_management.php' || $seg3 == 'van_bookings.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-shuttle-van"></i>
                        <p id="sidebar-text">
                            Van Rentals
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="van_management.php" class="nav-link <?= $seg3 == 'van_management.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Add New Van
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="van_bookings.php" class="nav-link <?= $seg3 == 'van_bookings.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Van Rental Bookings
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($seg2 == 'gallery-admin.php' || $seg2 == 'faq_admin.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg2 == 'gallery-admin.php' || $seg2 == 'faq_admin.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-images"></i>
                        <p id="sidebar-text">
                            Gallery Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="gallery-admin.php" class="nav-link <?= $seg2 == 'gallery-admin.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="faq_admin.php" class="nav-link <?= $seg2 == 'faq_admin.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($seg2 == 'packages_admin.php' || $seg2 == 'van_bookings.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg2 == 'packages_admin.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-globe"></i>
                        <p id="sidebar-text">
                            Travel Packages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="packages_admin.php" class="nav-link <?= $seg2 == 'packages_admin.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Packages
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?= ($seg2 == 'van_management.php' || $seg2 == 'van_bookings.php') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg2 == 'van_management.php' || $seg2 == 'van_bookings.php') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-truck"></i>
                        <p id="sidebar-text">
                            Van Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="van_management.php" class="nav-link <?= $seg2 == 'van_management.php' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>

                                <p id="sidebar-text">
                                    Van Information
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="van_bookings.php" class="nav-link <?= $seg2 == 'van_bookings.php' ? 'active' : '' ?>">
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
                <li class="nav-item <?= ($seg2 == '') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg2 == '') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p id="sidebar-text">
                            Template
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($seg2 == '') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($seg2 == '') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item 2</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- HR LINKS -->
                <li class="nav-header">HR</li>
                <li class="nav-item <?= ($seg2 == '') ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= ($seg2 == '') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p id="sidebar-text">
                            Employees
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($seg2 == '') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($seg2 == '') ? 'active' : '' ?>">
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
           
            <a style="color:gray;" href="<!-- No link here -->" class="power-icon text-decoration-none" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-power-off text-secondary"></i>
            </a>
        </div>
    </div>
</aside>