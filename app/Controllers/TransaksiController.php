<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisLaundryModel;
use App\Models\TransaksiModel;
use CodeIgniter\HTTP\ResponseInterface;

class TransaksiController extends BaseController
{
    public function index()
    {
        return view('transaksi');
    }

    public function tambah_transaksi()
    {
        $JensiModel = new  JenisLaundryModel();

        $list_jenis_barang = $JensiModel->findAll();

       return view('tambah_transaksi', [
        "list_jenis_barang" => $list_jenis_barang
       ]);
    }
}
