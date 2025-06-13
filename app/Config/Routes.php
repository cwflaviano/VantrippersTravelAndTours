<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
## ================================================================================================================================
## ----- ERROR CONTROLLER ----- ##

$routes->group('/', function($routes) {
    $routes->get('page_not_found', 'ErrorController::error_404');
    $routes->get('redirect_back', 'ErrorController::redirect_back');
});




## ================================================================================================================================
## ----- HOME CONTROLLER ----- ##
$routes->group('/', ['filter' => 'admin_auth'], function($routes) {
    $routes->get('', 'HomeController::home');
    $routes->get('home', 'HomeController::home');

    // about us
    $routes->get('about', 'HomeController::about');
    // contact us
    $routes->match(['get', 'post'], 'contact', 'HomeController::contact');
});

## ================================================================================================================================
## ----- LOGIN CONTROLLER ----- ##
$routes->match(['get', 'post'], '/login', 'LoginController::login');
## ----- LOGOUT CONTROLLER ----- ##
$routes->get('/logout', 'LogoutController::logout');

## ================================================================================================================================
## ----- ADMIN CONTROLLERS ----- ##
$routes->group('/admin/', function($routes) {
    // dashboard
    $routes->get('dashboard', 'Admin\DashboardController::dashboard');

    ## user-management
    $routes->group('user-management/', function($routes) {
        // display users in table
        $routes->get('', 'Admin\UserManagementController::users');
        // view user
        $routes->get('view/(:any)', 'Admin\UserManagementController::view_user/$1');
        // archived user
        $routes->get('archived/(:any)', 'Admin\UserManagementController::archived_user/$1');
        // restore archived user
        $routes->get('restore/(:any)', 'Admin\UserManagementController::restore_user/$1');
        // delete user
        $routes->get('delete/(:any)', 'Admin\UserManagementController::delete_user/$1');
        // edit user
        $routes->match(['get', 'post'], 'edit/(:any)', 'Admin\UserManagementController::edit_user/$1');

        // create user
        $routes->post('create', 'Admin\UserManagement::create_user');
    });

    ## accommodation
    $routes->match(['get', 'post'], 'create-accommodation', 'Admin\AccommodationController::create_accommodation');
});
