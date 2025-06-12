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
    $routes->match(['get','post'], 'user-management', 'Admin\UserManagement\UserManagementController::users');
});
