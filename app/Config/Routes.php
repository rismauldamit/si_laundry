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
$routes->delete('/user', 'UserController::hapus');
$routes->get('/persediaan', 'PersediaanController::index');
$routes->post('/persediaan', 'PersediaanController::tambah');
$routes->delete('/persediaan', 'PersediaanController::hapus');

// MAHYA =======================
$routes->get('/pembelian_barang', 'PembelianBarangController::index');
$routes->get('/transaksi', 'TransaksiController::index');
$routes->get('/transaksi/tambah', 'TransaksiController::tambah');


// FIROH =======================
$routes->get('/jenis_laundry', 'JenisLaundryController::index');
$routes->post('/jenis_laundry', 'JenisLaundryController::tambah');
$routes->get('/pelanggan', 'PelangganController::index');
$routes->post('/pelanggan', 'PelangganController::tambah');


// comingsoon
$routes->get('/pelanggan/tambah', 'PelangganController::tambah');
$routes->get('/laporan', 'LaporanController');
