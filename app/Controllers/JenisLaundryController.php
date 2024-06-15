<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class JenisLaundryController extends BaseController
{
    // Properti
    protected $JenisLaundryModel;
    public function __construct()
    {
        $this->JenisLaundryModel = new \App\Models\JenisLaundryModel();
    }

    public function index()
    {
        $list_jenis_laundry = $this->JenisLaundryModel->findAll();
        return view('jenis_laundry', [
            'list_jenis_laundry' => $list_jenis_laundry,
        ]);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama_jenis' => 'required',
            'harga' => 'required|numeric',
            'satuan' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->JenisLaundryModel->insert([
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'harga' => $this->request->getPost('harga'),
            'satuan' => $this->request->getPost('satuan'),
        ]);

        return redirect()->to('/jenis_laundry');
    }

    public function update()
    {
        if (!$this->validate([
            'id_jenis_laundry' => 'required|numeric',
            'nama_jenis' => 'required',
            'harga' => 'required|numeric',
            'satuan' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->JenisLaundryModel->update($this->request->getPost('id_jenis_laundry'), [
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'harga' => $this->request->getPost('harga'),
        ]);

        return redirect()->to('/jenis_laundry');
    }

    public function hapus()
    {
        $this->JenisLaundryModel->delete($this->request->getPost('id_jenis_laundry'));
        return redirect()->to('/jenis_laundry');
    }
}
