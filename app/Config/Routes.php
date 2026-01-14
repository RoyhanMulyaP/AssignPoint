<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('about', 'AboutController::index');

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
    $routes->get('inventaris', 'InventarisController::index');
    $routes->get('inventaris/(:num)', 'InventarisController::show/$1');
});

$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'User\DashboardController::index');
    $routes->get('inventaris', 'InventarisController::index');
    $routes->get('inventaris/(:num)', 'InventarisController::show/$1');
});

$routes->get('test-route', function () {
    return 'ROUTE OK';
});

