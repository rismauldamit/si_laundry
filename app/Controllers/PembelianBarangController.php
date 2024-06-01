<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PembelianBarangController extends BaseController
{
    public function index()
    {
        return view('pembelian_barang');
    }
}
