<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganController extends BaseController
{
    // Properti
    protected $PelangganModel;
    public function __construct()
    {
        $this->PelangganModel = new \App\Models\PelangganModel();
    }
    public function index()
    {
        $list_pelanggan = $this->PelangganModel->findAll();
        return view('pelanggan', [
            'list_pelanggan' => $list_pelanggan,
        ]);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->PelangganModel->insert([
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telp' => $this->request->getPost('telp'),
        ]);

        return redirect()->to('/pelanggan');
    }

    public function update()
    {
        if (!$this->validate([
            'id_pelanggan' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->PelangganModel->update($this->request->getPost('id_pelanggan'), [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telp' => $this->request->getPost('telp'),
        ]);

        return redirect()->to('/pelanggan');
    }

    public function hapus()
    {
        $this->PelangganModel->delete($this->request->getPost('id_pelanggan'));
        return redirect()->to('/pelanggan');
    }
}
