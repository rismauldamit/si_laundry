<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TransaksiController extends BaseController
{
    // Properti
    protected $TransaksiModel;
    protected $JenisLaundryModel;
    protected $BarangLaundryModel;
    protected $PelangganModel;

    public function __construct()
    {
        $this->TransaksiModel = new \App\Models\TransaksiModel();
        $this->JenisLaundryModel = new \App\Models\JenisLaundryModel();
        $this->BarangLaundryModel = new \App\Models\BarangLaundryModel();
        $this->PelangganModel = new \App\Models\PelangganModel();
    }

    public function index()
    {
        $list_transaksi = $this->TransaksiModel->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan')->findAll();
        foreach ($list_transaksi as $key => $item) {
            $list_transaksi[$key]['barang'] = $this->BarangLaundryModel->where('id_transaksi', $item['id_transaksi'])->join('jenis_laundry', 'barang_laundry.id_jenis_laundry = jenis_laundry.id_jenis_laundry')->findAll();
        }

        return view('transaksi', [
            'list_transaksi' => $list_transaksi,
        ]);
    }

    public function tambah()
    {
        // Ambil data jenis laundry
        $list_jenis_laundry = $this->JenisLaundryModel->findAll();
        // Ambil data pelanggan
        $list_pelanggan = $this->PelangganModel->findAll();

        return view('tambah_transaksi', [
            'list_jenis_laundry' => $list_jenis_laundry,
            'list_pelanggan' => $list_pelanggan,
        ]);
    }

    public function simpan()
    {
        if (!$this->validate([
            'id_pelanggan' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->transStart();

        // Simpan data transaksi
        $this->TransaksiModel->insert([
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
        ]);

        // Get ID Transaksi
        $id_transaksi = $this->TransaksiModel->insertID();
        $total_harga = 0;

        // Simpan data barang laundry
        $barang_laundry = $this->request->getPost('barang');
        foreach ($barang_laundry as $key => $barang) {
            $harga_jenis = $this->JenisLaundryModel->find($barang['id_jenis'])['harga'];
            $harga_barang = $barang['jumlah'] * $harga_jenis;
            $total_harga += $harga_barang;

            $result = $this->BarangLaundryModel->insert([
                'id_jenis_laundry' => $barang['id_jenis'],
                'id_transaksi' => $id_transaksi,
                'jumlah' => $barang['jumlah'],
                'harga_barang' => $harga_barang,
            ]);

            if (!$result) {
                $db->transRollback();
                return redirect()->back()->withInput()->with('errors', $this->BarangLaundryModel->errors());
            } else {
            }
        }

        // Update total harga
        $result = $this->TransaksiModel->update($id_transaksi, [
            'total_harga' => $total_harga,
        ]);

        if (!$result) {
            $db->transRollback();
            return redirect()->back()->withInput()->with('errors', $this->TransaksiModel->errors());
        }

        $db->transComplete();
        return redirect()->to('/transaksi')->with('success', 'Data Transaksi Berhasil Ditambahkan');
    }
}
