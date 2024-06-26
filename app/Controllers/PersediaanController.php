<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PersediaanModel;
use CodeIgniter\HTTP\ResponseInterface;

class PersediaanController extends BaseController
{
    public function index()
    {
        $PersediaanModel = new PersediaanModel();
        $listpersediaan = $PersediaanModel->findAll();
        return view('persediaan', [
            'listpersediaan' => $listpersediaan
        ]);
    }
    public function tambah()
    {

        if (!$this->validate([ //validasi dari form post
            'tanggal' => 'required|',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'nama_barang' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // validasi Selesai
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
            'nama_barang' => $this->request->getPost('nama_barang'),
        ];
        // memanggil model PersediaanModel
        $PersediaanModel = new PersediaanModel();
        // insert data ke tabel persediaan
        $PersediaanModel->insert($data);
        return redirect()->to('/persediaan')->with('success', 'Data Persediaan Berhasil Ditambahkan');
    }
    public function hapus()
    {
        $PersediaanModel = new PersediaanModel();
        $PersediaanModel->delete($this->request->getPost('id_persediaan'));
        return redirect()->to('/persediaan')->with('success', 'Data Persediaan Berhasil Dihapus');
    }
    public function edit()
    { {
            if (!$this->validate([
                'tanggal' => 'required|',
                'jumlah' => 'required|numeric',
                'harga_satuan' => 'required|numeric',
                'nama_barang' => 'required',
            ])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            //   validasi selesai
            $data = [
                'tanggal' => $this->request->getPost('tanggal'),
                'jumlah' => $this->request->getPost('jumlah'),
                'harga_satuan' => $this->request->getPost('harga_satuan'),
                'nama_barang' => $this->request->getPost('nama_barang'),
            ];

            // memanggil model  PersediaanModel
            $PersediaanModel = new PersediaanModel();
            $PersediaanModel->update($this->request->getPost('id_persediaan'), $data);
            return redirect()->to('/persediaan')->with('success', 'Data persediaan Berhasil Diubah');
        }
    }
}
