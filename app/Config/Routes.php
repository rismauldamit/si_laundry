<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingPageController::index');
$routes->get('/login', 'Home::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/user', 'UserController::index');

// MAHYA =======================
$routes->get('/pelanggan', 'PelangganController::index');
$routes->get('/pembelian_barang', 'PembelianBarangController::index');
$routes->get('/jenis_laundry', 'JenisLaundryController::index');


// FIROH =======================
$routes->get('/transaksi', 'TransaksiController::index');
$routes->get('/transaksi/tambah', 'TransaksiController::tambah');
$routes->get('/laporan', 'LaporanController');
