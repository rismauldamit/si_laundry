<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangLaundryModel;
use App\Models\JenisLaundryModel;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;
use CodeIgniter\HTTP\ResponseInterface;

class TransaksiController extends BaseController
{
    public function index()
    {
        // Pengecekan apakah param url ada tanggal
        if (!$this->request->getGet('tanggal')) {
            return redirect()->to(current_url() . '?tanggal=' . date('Y-m-d'));
        } else {
            $date = ($this->request->getGet('tanggal')) ? $this->request->getget('tanggal') : date('Y-m-d');
        }

        $TransaksiModel = new TransaksiModel();
        $list_transaksi = $TransaksiModel->getAllData($date);
        return view('transaksi', [
            'list_transaksi' => $list_transaksi
        ]);
    }

    public function tambah_transaksi()
    {
        $JensiModel = new  JenisLaundryModel();
        $PelangganModel = new PelangganModel();


        $list_jenis_barang = $JensiModel->getAllData();
        $list_pelanggan = $PelangganModel->getAllData();

        return view('tambah_transaksi', [
            "list_jenis_barang" => $list_jenis_barang,
            "list_pelanggan" => $list_pelanggan
        ]);
    }


    public function simpan()
    {

        // memanggil semua Model yang diperlukan
        $TransaksiModel = new TransaksiModel();
        $BarangLaundyModel = new BarangLaundryModel();
        $JenisLaundryModel = new JenisLaundryModel();

        // Memulai Transaksi
        $db = \Config\Database::connect();
        $db->transStart();

        // Insert Data  Transaksi
        $TransaksiModel->SaveData([
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_user' => session('id_user'),
        ]);

        // Mengambil id Transaksi dari data yang baru diinsert
        $id_transaksi = $TransaksiModel->insertID();
        $total_harga = 0;

        // Proses Insert Data Barang laundry
        foreach ($this->request->getPost('barang') as $item) {

            // Mengambil Jenis Laundry
            $dataJenis = $JenisLaundryModel->find($item['id_jenis_laundry']);

            // Mengakumulasikan harga barang
            $harga_barang = $item['jumlah'] * $dataJenis['harga'];

            // Insert Barang
            $BarangLaundyModel->SaveData([
                'id_jenis_laundry' => $item['id_jenis_laundry'],
                'id_transaksi' => $id_transaksi,
                'harga_barang' => $harga_barang,
                'jumlah' => $item['jumlah']
            ]);

            // Menampung Total Harga
            $total_harga += $harga_barang;
        }

        // Memperbarui total harga
        $TransaksiModel->UpdateData($id_transaksi, [
            'total_harga' => $total_harga,
        ]);


        // Mencek Status Transaksi
        if ($db->transStatus()) {
            $db->transCommit();
            return redirect()->to('/transaksi')->with('success', 'Berhasil Menambahkan Data Transaksi');
        }

        $db->transRollback();
        return redirect()->to('/transaksi')->with('errors', ['Gagal Menambahkan Data Transaksi']);
    }
    public function hapus()
    {
        $TransaksiModel = new TransaksiModel();
        $TransaksiModel->DeleteData($this->request->getPost('id_transaksi'));
        return redirect()->to('/transaksi')->with('success', 'Data User Berhasil Dihapus');
    }
}
