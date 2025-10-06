<?php
namespace Config;

$routes = Services::routes();


$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');

// Admin routes
$routes->group('', ['filter' => 'admin'], function($routes) {
    $routes->get('users', 'Admin\\UserController::index');
    $routes->get('users/create', 'Admin\\UserController::create');
    $routes->post('users/store', 'Admin\\UserController::store');
    $routes->get('users/edit/(:num)', 'Admin\\UserController::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\\UserController::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\\UserController::delete/$1');

    $routes->get('events', 'Admin\EventController::index');
    $routes->get('events/create', 'Admin\EventController::create');
    $routes->post('events/store', 'Admin\EventController::store');
});

// Dashboard routes (harus login)
$routes->get('/', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);