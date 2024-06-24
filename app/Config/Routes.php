<?php

use CodeIgniter\Router\RouteCollection;

//SHERLY =======================
/**
 * @var RouteCollection $routes
 */
$routes->get('/landingpage', 'LandingPageController::index');

// MAHYA
$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::process_login');


$routes->group('', ['filter' => 'islogin'], static function ($routes) {
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
    $routes->delete('/transaksi', 'TransaksiController::hapus');
    $routes->get('/', 'AuthController::index');
    $routes->get('/logout', 'AuthController::logout');

    // FIROH =======================
    $routes->get('/jenis_laundry', 'JenisLaundryController::index');
    $routes->post('/jenis_laundry', 'JenisLaundryController::tambah');
    $routes->delete('/jenis_laundry', 'JenisLaundryController::hapus');
    $routes->get('/pelanggan', 'PelangganController::index');
    $routes->post('/pelanggan', 'PelangganController::tambah');
    $routes->delete('/pelanggan', 'PelangganController::hapus');

    // comingsoon
    $routes->get('/laporan', 'LaporanController::index');
    $routes->get('/laporan-print', 'LaporanController::print');
});
