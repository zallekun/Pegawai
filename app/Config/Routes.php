<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route login/logout tetap di luar group
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::prosesLogin');
$routes->get('/logout', 'AuthController::logout');

// Semua route yang wajib login masukkan ke group ini
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/pegawai', 'PegawaiController::index');
    $routes->get('/jabatan', 'JabatanController::index');
    $routes->get('/tentang', 'TentangController::index');

    // CRUD jabatan
    $routes->get('/jabatan/show/(:num)', 'JabatanController::show/$1');
    $routes->get('/jabatan/create', 'JabatanController::create');
    $routes->post('/jabatan/store', 'JabatanController::store');
    $routes->get('/jabatan/edit/(:num)', 'JabatanController::edit/$1');
    $routes->post('/jabatan/update/(:num)', 'JabatanController::update/$1');
    $routes->post('/jabatan/delete/(:num)', 'JabatanController::delete/$1');

    // CRUD pegawai
    $routes->get('/pegawai/show/(:num)', 'PegawaiController::show/$1');
    $routes->get('/pegawai/create', 'PegawaiController::create');
    $routes->post('/pegawai/store', 'PegawaiController::store');
    $routes->get('/pegawai/edit/(:num)', 'PegawaiController::edit/$1');
    $routes->post('/pegawai/update/(:num)', 'PegawaiController::update/$1');
    $routes->post('/pegawai/delete/(:num)', 'PegawaiController::delete/$1');
    $routes->get('/pegawai/export/pdf', 'PegawaiController::exportPdf');

    // Tentang
    $routes->get('/tentang', 'TentangController::index');

    // Profile
    $routes->get('/profile/password', 'AuthController::changePassword');
    $routes->post('/profile/password', 'AuthController::updatePassword');
});

