<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('about', 'AboutController::index');
$routes->post('testimonials/submit', 'TestimonialController::submit');
$routes->get('dbfix', 'DbFix::index');

$routes->get('admin/inventaris/lastKode', 'InventarisController::getLastKodeBarang');
$routes->post('admin/inventaris/save', 'InventarisController::save');
$routes->post('admin/inventaris/update', 'InventarisController::update');
$routes->post('admin/inventaris/delete/(:num)', 'InventarisController::delete/$1');
$routes->post('admin/inventaris/bulkDelete', 'InventarisController::bulkDelete');

$routes->group('auth', function($routes){
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::loginProcess');
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::registerProcess');
    $routes->get('logout', 'AuthController::logout');
});

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
    
    // Inventaris
    $routes->get('inventaris', 'InventarisController::index');
    $routes->get('inventaris/getStats', 'InventarisController::getStats');
    $routes->get('inventaris/getLatest', 'InventarisController::getLatestInventory');
    $routes->get('inventaris/(:num)', 'InventarisController::show/$1');
    
    // Loans
    $routes->get('loans', 'Admin\LoanController::index');
    $routes->post('loans/approve/(:num)', 'Admin\LoanController::approve/$1');
    $routes->post('loans/reject/(:num)', 'Admin\LoanController::reject/$1');
    $routes->post('loans/return/(:num)', 'Admin\LoanController::return/$1');
    $routes->get('loans/getLatestLoans', 'Admin\LoanController::getLatestLoans');
    
    // Users
    $routes->get('users', 'Admin\UserController::index');
    $routes->post('users/delete/(:any)', 'Admin\UserController::delete/$1');
    $routes->post('users/updateRole/(:any)', 'Admin\UserController::updateRole/$1');
    $routes->get('users/getLatestUsers', 'Admin\UserController::getLatestUsers');
    
    // Categories
    $routes->get('categories', 'Admin\CategoryController::index');
    $routes->post('categories/save', 'Admin\CategoryController::save');
    $routes->post('categories/delete/(:num)', 'Admin\CategoryController::delete/$1');
    
    // Locations
    $routes->get('locations', 'Admin\LocationController::index');
    $routes->post('locations/save', 'Admin\LocationController::save');
    $routes->post('locations/delete/(:num)', 'Admin\LocationController::delete/$1');
    
    // Maintenance
    $routes->get('maintenance', 'Admin\MaintenanceController::index');
    $routes->post('maintenance/save', 'Admin\MaintenanceController::save');
    $routes->post('maintenance/updateStatus/(:num)', 'Admin\MaintenanceController::updateStatus/$1');
    
    // Audit Logs
    $routes->get('audit', 'Admin\AuditController::index');

    // Misc
    $routes->get('reports', 'Admin\MiscController::reports');
    $routes->get('settings', 'Admin\MiscController::settings');
    $routes->get('backup', 'Admin\MiscController::backup');
    $routes->get('api', 'Admin\MiscController::api');
});

$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'User\DashboardController::index');
    $routes->get('dashboard/getStats', 'User\DashboardController::getStats');
    $routes->get('inventaris', 'InventarisController::index');
    $routes->get('inventaris/getStats', 'InventarisController::getStats');
    $routes->get('inventaris/getLatest', 'InventarisController::getLatestInventory');
    $routes->get('inventaris/(:num)', 'InventarisController::show/$1');
    $routes->get('profile', 'User\DashboardController::profile');
    $routes->get('settings', 'User\DashboardController::settings');
    $routes->post('profile/update', 'User\DashboardController::updateProfile');
    $routes->post('settings/updatePassword', 'User\DashboardController::updatePassword');
    $routes->post('loans/request', 'User\LoanController::request');
    $routes->post('loans/return/(:num)', 'User\LoanController::return/$1');
    $routes->get('loans/getStatus', 'User\LoanController::getStatus');
});

$routes->get('test-route', function () {
    return 'ROUTE OK';
});

