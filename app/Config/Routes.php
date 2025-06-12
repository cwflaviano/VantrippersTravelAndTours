<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
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
    ## dashboard
    $routes->get('dashboard', 'Admin\Dashboard\DashboardController::dashboard');

    ## user-management
    $routes->group('user-management/', function($routes) {
        // display users in table
        $routes->get('', 'Admin\UserManagement\UserManagementController::users');
        $routes->get('view/(:any)', 'Admin\UserManagement\UserManagementController::view_user/$1');
        $routes->match(['get', 'post'], 'edit/(:any)', 'Admin\UserManagement\UserManagementController::edit_user/$1');

        // create user
        $routes->post('create', 'Admin\UserManagement\UserManagementController::create_user');
    });
});
