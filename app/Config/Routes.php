<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
## ERROR CONTROLLER
$routes->group('/', function($routes) {
    $routes->get('commingsoon', 'ErrorController::underConstruction');
});


#--------------------------------------------------------------------
# HOME CONTROLLER
#--------------------------------------------------------------------
$routes->group('/', function($routes) {
    $routes->get('', 'HomeController::homepage');
    $routes->get('home', 'HomeController::homepage');
    $routes->get('about', 'HomeController::about');

    ## send message route 
    $routes->post('/send_message', 'HomeController::SendMessage');
    ## book van services
    $routes->match(['get', 'post'], '/book_service', 'HomeController::BookVanService');
});

#--------------------------------------------------------------------
# LOGIN CONTROLLER
#--------------------------------------------------------------------
$routes->group('/', function($routes) {
    ## LOGIN CONTROLLER
    $routes->match(['get', 'post'], 'signin', 'LoginController::signin');
    ## REGISTRATION CONTROLELR
    $routes->match(['get', 'post'], 'signup', 'RegistrationController::signup');
    ## LOGOUT CONTROLLER
    $routes->get('logout', 'LogoutController::logout');
});

#--------------------------------------------------------------------
# LOGOUT CONTROLLER
$routes->get('/logout', 'LogoutController::logout');

#--------------------------------------------------------------------
# TIME TRACKER CONTROLLER
#--------------------------------------------------------------------
$routes->group('/timetracker/', ['filter' => 'timetrackersession'], function($routes) {
    $routes->match(['get', 'post'], 'login', 'TimeTrackerControllers\LoginController::login');

    ## admin
    $routes->get('admin/reports', 'TimeTrackerControllers\ReportsController::reports');
    $routes->match(['get', 'post'], 'admin/dashboard', 'TimeTrackerControllers\AdminController::dashboard');
    $routes->match(['get', 'post'], 'admin/export', 'TimeTrackerControllers\ExportController::export');
    $routes->match(['get', 'post'], 'admin/calculate_overtime', 'TimeTrackerControllers\OvertimeController::calculate_overtime');

    ## ojt
    $routes->match(['get', 'post'], 'ojt/first-time-login', 'TimeTrackerControllers\FirstTimeLoginController::first_time_login');
    $routes->match(['get', 'post'], 'ojt/dashboard', 'TimeTrackerControllers\OJTController::dashboard');
});


#--------------------------------------------------------------------
# TIME TRACKER CONTROLLER
#--------------------------------------------------------------------
$routes->group('/admin/', function($routes) {
    ## admin dashboard
    $routes->get('', 'AdminControllers\DashboardController::dashboard');
    $routes->get('dashboard', 'AdminControllers\DashboardController::dashboard');

    ## admin user management
    $routes->match(['get', 'post'], 'users_management', 'AdminControllers\UsersController::usersManagement');
    // view user (readonly)
    $routes->get('view_user/(:any)', 'AdminControllers\UsersController::viewUser/$1');
    // if retore, and archived successfull
    $routes->get('message_page', 'AdminControllers\UsersController::messagePage');
});