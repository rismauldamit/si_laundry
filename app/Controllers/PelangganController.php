<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganController extends BaseController
{
    public function index()
    {
            $PelangganModel = new PelangganModel();
            $listpelanggan = $PelangganModel->findAll();
            return view('pelanggan',[
                'listpelanggan' => $listpelanggan
            ]);
    
    }

    public function tambah()
    { {
            if (!$this->validate([
                'nama' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
            ])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            //   validasi selesai
            $data = [
                "nama" => $this->request->getPost('nama'),
                "telp" => $this->request->getPost('telp'),
                "alamat" => $this->request->getPost('alamat'),
            ];

            // memanggil model PelangganModel
            $PelangganModel = new PelangganModel();
            $PelangganModel->insert($data);
            return redirect()->to('/pelanggan')->with('success', 'Data pelanggan Berhasil Ditambahkan');

        }
    }
    public function hapus()
    {
        $PelangganModel = new PelangganModel();
        $PelangganModel->delete($this->request->getPost('id_pelanggan'));
        return redirect()->to('/pelanggan')->with('success','Data Pelanggan Berhasil Dihapus');
    }
}
