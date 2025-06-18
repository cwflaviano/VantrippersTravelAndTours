<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
## ================================================================================================================================
## ----- ERROR CONTROLLER ----- ##

$routes->group('/', function($routes) {
    $routes->get('page_not_found', 'ErrorController::error_404');
    $routes->get('error_page', 'ErrorController::error_page');
    $routes->get('redirect_back', 'ErrorController::redirect_back');
});




## ================================================================================================================================
## ----- HOME CONTROLLER ----- ##
$routes->group('/',  ['filter' => 'session_auth'], function($routes) {
    $routes->get('', 'HomeController::home');
    $routes->get('home', 'HomeController::home');

    // about us
    $routes->get('about', 'HomeController::about');
    // contact us
    $routes->match(['get', 'post'], 'contact', 'HomeController::contact');
});

## ================================================================================================================================
## ----- LOGIN CONTROLLER ----- ##
$routes->match(['get', 'post'], '/login', 'LoginController::login', ['filter' => 'admin_auth']);
## ----- LOGOUT CONTROLLER ----- ##
$routes->get('/logout', 'LogoutController::logout');

## ================================================================================================================================
## ----- ADMIN CONTROLLERS ----- ##
$routes->group('/admin/', ['filter' => 'admin_auth'], function($routes) {
    // dashboard
    $routes->get('dashboard', 'Admin\DashboardController::dashboard');

    ## User Management
    $routes->group('user-management/', function($routes) {
        // display users in table
        $routes->get('users', 'Admin\UserManagementController::users');
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
        $routes->post('create', 'Admin\UserManagementController::create_user');
    });

    ## Accommodation Management
    $routes->group('accommodation/', function($routes) {
        // create / add accommodation
        $routes->match(['get', 'post'], 'create', 'Admin\AccommodationController::create_accommodation');
        // list of accommodation && Ajax 
        $routes->get('list', 'Admin\AccommodationController::list_accommodation');
        $routes->get('list/fetch', 'Admin\AccommodationController::fetch_data');
        $routes->get('list/delete/(:num)', 'Admin\AccommodationController::delete/$1');

        // $routes->post('delete_accommodation/(:any)', 'Admin\AccommodationController::delete_accommodation/$1');
        // $routes->get('edit', 'Admin\AccommodationController::list_accommodation');
        // $routes->get('delete', 'Admin\AccommodationController::list_accommodation');
        $routes->get('search', 'Admin\AccommodationController::search_accommodation');
    });

    ## CRM 
    $routes->group('crm/', function($routes) {
        ## sales
        $routes->group('sales/', function($routes) {
            // terms management
            $routes->match(['get', 'post'], 'terms', 'Admin\TermsController::terms_page');
            $routes->get('terms/delete/(:num)', 'Admin\TermsController::delete_terms/$1');
    
            // packages management
            $routes->get('packages', 'Admin\PackagesController::packages');
            $routes->match(['get', 'post'],'packages/fetch', 'Admin\PackagesController::fetch_data');
            $routes->post('packages/create', 'Admin\PackagesController::create_package');
            $routes->get('packages/delete/(:num)', 'Admin\PackagesController::delete_package/$1');
            $routes->match(['get', 'post'], 'packages/edit/(:num)', 'Admin\PackagesController::edit_package/$1');
        });

        ## tours management
        $routes->group('tour-management/', function($routes) {

        });
    });
});
