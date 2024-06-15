<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingPageController::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/user', 'UserController::index');

// MAHYA =======================
// --> Fitur Pelanggan
$routes->get('/pelanggan', 'PelangganController::index');
$routes->post('/pelanggan', 'PelangganController::simpan');
$routes->put('/pelanggan', 'PelangganController::update');
$routes->delete('/pelanggan', 'PelangganController::hapus');

// --> Fitur Persediaan Barang
$routes->get('/pembelian_barang', 'PembelianBarangController::index');

// --> Fitur Jenis Laundry
$routes->get('/jenis_laundry', 'JenisLaundryController::index');
$routes->post('/jenis_laundry', 'JenisLaundryController::simpan');
$routes->put('/jenis_laundry', 'JenisLaundryController::update');
$routes->delete('/jenis_laundry', 'JenisLaundryController::hapus');


// FIROH =======================

// --> Fitur Transaksi
$routes->get('/transaksi', 'TransaksiController::index');
$routes->get('/transaksi/tambah', 'TransaksiController::tambah');
$routes->post('/transaksi/tambah', 'TransaksiController::simpan');
$routes->get('/pelanggan/tambah', 'PelangganController::tambah');
$routes->get('/laporan', 'LaporanController');
