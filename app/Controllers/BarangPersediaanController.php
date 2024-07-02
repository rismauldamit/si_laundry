<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangPersediaanModel;
use CodeIgniter\HTTP\ResponseInterface;

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
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        //   validasi selesai
        $data = [
            "nama" => $this->request->getPost('nama'),
            "satuan" => $this->request->getPost('satuan'),
            "harga" => $this->request->getPost('harga'),
        ];

        $BarangPersediaanModel = new BarangPersediaanModel();
        $BarangPersediaanModel->insert($data);
        return redirect()->to('/barang_persediaan')->with('success', 'Data Barang Persediaan Berhasil Ditambahkan');

        $BarangPersediaanModel = new BarangPersediaanModel();
    }
    public function hapus()
    {
        dd($this->request->getPost());
        $BarangPersediaanModel = new BarangPersediaanModel();
        $BarangPersediaanModel->delete($this->request->getPost('id_barang_persediaan'));
        return redirect()->to('/barang_persediaan')->with('success', 'Data Barang Persediaan Berhasil Dihapus');
    }
    public function edit()
    {
        if (!$this->validate([
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        //   validasi selesai
        $data = [
            "nama" => $this->request->getPost('nama'),
            "satuan" => $this->request->getPost('satuan'),
            "harga" => $this->request->getPost('harga'),
        ];

        $BarangPersediaanModel = new BarangPersediaanModel();
        $BarangPersediaanModel->update($this->request->getPost('id_barang_persediaan'), $data);
        return redirect()->to('/barang_persediaan')->with('success', 'Data Barang Persediaan Berhasil Diubah');

        $BarangPersediaanModel = new BarangPersediaanModel();
    }
}
