<?php

use CodeIgniter\Router\RouteCollection;

//SHERLY =======================
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingPageController::index');
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
$routes->get('/transaksi/tambah_transaksi', 'TransaksiController::tambah_transaksi');
$routes->post('/transaksi/tambah_transaksi', 'TransaksiController::simpan');
$routes->post('/transaksi', 'TransaksiController::hapus');
$routes->get('/login', 'LoginController::index');

// FIROH =======================
$routes->get('/jenis_laundry', 'JenisLaundryController::index');
$routes->post('/jenis_laundry', 'JenisLaundryController::tambah');
$routes->delete('/jenis_laundry', 'JenisLaundryController::hapus');
$routes->get('/pelanggan', 'PelangganController::index');
$routes->post('/pelanggan', 'PelangganController::tambah');
$routes->delete('/pelanggan', 'PelangganController::hapus');


// comingsoon
$routes->get('/pelanggan/tambah', 'PelangganController::tambah');
$routes->get('/laporan', 'LaporanController');
