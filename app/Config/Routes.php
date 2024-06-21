<?php

use CodeIgniter\Router\RouteCollection;

//SHERLY =======================
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingPageController::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/user', 'UserController::index');
$routes->post('/user', 'UserController::tambah');
$routes->post('/persediaan', 'PersediaanController::index');

// MAHYA =======================
$routes->get('/pelanggan', 'PelangganController::index');
$routes->get('/pembelian_barang', 'PembelianBarangController::index');
$routes->get('/jenis_laundry', 'JenisLaundryController::index');


// FIROH =======================
$routes->get('/transaksi', 'TransaksiController::index');
$routes->get('/transaksi/tambah', 'TransaksiController::tambah');
$routes->get('/pelanggan/tambah', 'PelangganController::tambah');
$routes->get('/laporan', 'LaporanController');
