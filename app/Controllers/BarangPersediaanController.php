<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangPersediaanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class BarangPersediaanController extends BaseController
{
    public function index()
    {
        $BarangPersediaanModel = new BarangPersediaanModel();
        $listBarangPersediaan = $BarangPersediaanModel->findAll();
        return view('barang_persediaan', [
            'listBarangPersediaan' => $listBarangPersediaan
        ]);
    }

    public function tambah()
    {
        if (!$this->validate([
            'stok' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        //   validasi selesai
        $data = [
            "stok" => $this->request->getPost('stok'),
            "nama_barang" => $this->request->getPost('nama_barang'),
            "harga_barang" => $this->request->getPost('harga_barang'),
        ];

        $BarangPersediaanModel = new BarangPersediaanModel();
        $BarangPersediaanModel->SaveData($data);
        return redirect()->to('/barang_persediaan')->with('success', 'Data Barang Persediaan Berhasil Ditambahkan');

        $BarangPersediaanModel = new BarangPersediaanModel();
    }
    public function hapus()
    {
        $BarangPersediaanModel = new BarangPersediaanModel();

        // Pengecekan apakah Barang Digunakan diPersediaan 
        $PersediaanModel = new \App\Models\PersediaanModel(); // memanggil model

        // Mengambil data persediaan dimana id_barang_persediaan
        $check_hasil_persediaan = $PersediaanModel->where('id_barang_persediaan', $this->request->getPost('id_barang_persediaan'))->findAll();

        // Bila barang ada di Tabel Persediaan kembalikan dengan error
        if ($check_hasil_persediaan != null) {
            return redirect()->back()->with('errors', ['error' => 'Barang Masih Digunakan di Persediaan']);
        }

        $BarangPersediaanModel->DeleteData($this->request->getPost('id_barang_persediaan'));
        return redirect()->to('/barang_persediaan')->with('success', 'Data Barang Persediaan Berhasil Dihapus');
    }
    public function edit()
    {
        if (!$this->validate([
            'stok' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        //   validasi selesai
        $data = [
            "stok" => $this->request->getPost('stok'),
            "nama_barang" => $this->request->getPost('nama_barang'),
            "harga_barang" => $this->request->getPost('harga_barang'),
        ];

        $BarangPersediaanModel = new BarangPersediaanModel();
        $BarangPersediaanModel->UpdateData($this->request->getPost('id_barang_persediaan'), $data);
        return redirect()->to('/barang_persediaan')->with('success', 'Data Barang Persediaan Berhasil Diubah');

        $BarangPersediaanModel = new BarangPersediaanModel();
    }
}
