<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangPersediaanModel;
use App\Models\PersediaanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class PersediaanController extends BaseController
{

    public function index()
    {
        $PersediaanModel = new PersediaanModel();
        $listpersediaan = $PersediaanModel->getAllData(); //mengambil persediaan dan juga barang persediaan yg berelasi
        $BarangPersediaanModel = new BarangPersediaanModel();
        $listbarangpersediaan = $BarangPersediaanModel->findAll();
        return view('persediaan', [
            'listpersediaan' => $listpersediaan,
            'listbarangpersediaan' => $listbarangpersediaan,
        ]);
    }



    public function tambah()
    {

        if (!$this->validate([ //validasi dari form post
            'id_barang_persediaan' => 'required|',
            'status' => 'required|',
            'jumlah' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // validasi Selesai
        $data = [
            'id_barang_persediaan' => $this->request->getPost('id_barang_persediaan'),
            'status' => $this->request->getPost('status'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        $db = \Config\Database::connect();
        $db->transStart();

        // memanggil model PersediaanModel
        $PersediaanModel = new PersediaanModel();
        // insert data ke tabel persediaan
        $status_insert_persediaan = $PersediaanModel->SaveData($data);

        // Kondisi Jika insert berhasil update juga Stok di Barang_persediaan
        if ($status_insert_persediaan) {
            // Memanggil Model BarangPersediaanModel
            $BarangPersediaanModel = new BarangPersediaanModel;

            // mengambil Jumlah Stok yang seblumnya
            $stok_history = $BarangPersediaanModel->getByID($data['id_barang_persediaan'])['stok'];

            // Mencek apakah status barang masuk atau keluar
            if ($data['status'] == 'masuk') {
                // Jika Barang Masuk maka barang bertambah
                $jumlah_barang_total = $stok_history + $data['jumlah'];
            } else {

                // Jika jumlah barang keluar lebih besar dari stok barang yang ada
                if ($stok_history < $data['jumlah']) {
                    $db->transRollback();
                    return redirect()->back()->with('errors', ['error' => 'Stok Barang Tidak Mencukupi']);
                }

                // Jika Barang keluar maka berkurang
                $jumlah_barang_total = $stok_history - $data['jumlah'];
            }

            // Mengupdate stok
            $status_update_barangpersediaan = $BarangPersediaanModel->UpdateData($data['id_barang_persediaan'], [
                'stok' => $jumlah_barang_total
            ]);
        }

        // Mengkonfirmasi Query yang sdh di eksekusi
        $db->transCommit();
        return redirect()->to('/persediaan')->with('success', 'Data Persediaan Berhasil Ditambahkan');
    }

    public function hapus()
    {
        $PersediaanModel = new PersediaanModel();
        $PersediaanModel->DeleteData($this->request->getPost('id_persediaan'));
        return redirect()->to('/persediaan')->with('success', 'Data Persediaan Berhasil Dihapus');
    }
}
