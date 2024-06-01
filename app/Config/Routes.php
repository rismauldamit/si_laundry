<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/user', 'UserController::index');

// MAHYA =======================
$routes->get('/pelanggan', 'PelangganController::index');




// FIROH =======================
$routes->get('/barang_laundry', 'BarangLaundryController');
$routes->get('/laporan', 'LaporanController');
