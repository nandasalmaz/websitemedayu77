<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Publik
$routes->get('/', 'LandingController::landing');
$routes->get('umkm', 'LandingController::umkm');
$routes->get('umkm/detail/(:num)', 'LandingController::detail_umkm/$1');


// Autentikasi
$routes->get('login', 'AuthController::showLogin');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
     $routes->get('dashboard', 'AdminController::dashboard'); // ✅ Tambahkan baris ini
    $routes->get('umkm', 'UmkmController::index');
    $routes->get('umkm/tambah', 'UmkmController::form');         // form tambah
    $routes->get('umkm/edit/(:num)', 'UmkmController::form/$1'); // form edit
    $routes->post('umkm/save', 'UmkmController::tambah');
    $routes->post('umkm/update/(:num)', 'UmkmController::update/$1');
    $routes->post('umkm/hapus/(:num)', 'UmkmController::hapus/$1');
});
