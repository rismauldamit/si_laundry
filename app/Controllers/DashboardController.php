<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $UserModel = new UserModel();
        $total_user = count($UserModel->findAll());

        $PelangganModel = new PelangganModel();
        $total_pelanggan = count($PelangganModel->findAll());

        $TransaksiModel = new TransaksiModel();
        $total_transaksi = count($TransaksiModel->findAll());

        return view('dashboard', [
            'total_user' => $total_user,
            'total_pelanggan' => $total_pelanggan,
            'total_transaksi' => $total_transaksi
        ]);
    }
}
