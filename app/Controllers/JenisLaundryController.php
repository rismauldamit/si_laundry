<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisLaundryModel;
use CodeIgniter\HTTP\ResponseInterface;

class JenisLaundryController extends BaseController
{
    public function index()
    {
        $JenisLaundryModel = new JenisLaundryModel();
        $listJenisLaundry = $JenisLaundryModel->findAll();
        return view('jenis_laundry',[
            'listJenisLaundry' => $listJenisLaundry
        ]);

    }

    public function tambah()
    {
        if (!$this->validate([
            'nama_jenis' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        //   validasi selesai
        $data = [
            "nama_jenis" => $this->request->getPost('nama_jenis'),
            "satuan" => $this->request->getPost('satuan'),
            "harga" => $this->request->getPost('harga'),
        ];

        $JenisLaundryModel = new JenisLaundryModel();
        $JenisLaundryModel->insert($data);
        return redirect()->to('/jenis_laundry')->with('success', 'Data jenis_laundry Berhasil Ditambahkan');

        $JenisLaundryModel = new JenisLaundryModel();
    }
    public function hapus()
    {
        $JenisLaundryModel = new JenisLaundryModel();
        $JenisLaundryModel->delete($this->request->getPost('id_jenis_laundry'));
        return redirect()->to('/jenis_laundry')->with('success','Data Jenis Laundry Berhasil Dihapus');
    }
}
