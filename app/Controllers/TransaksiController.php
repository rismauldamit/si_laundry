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
        $TransaksiModel = new TransaksiModel();
        $BarangLaundyModel = new BarangLaundryModel();

        $list_transaksi = $TransaksiModel->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan')->findAll();

        foreach ($list_transaksi as $key => $item) {
            $list_transaksi[$key]['barang'] = $BarangLaundyModel->where('id_transaksi', $item['id_transaksi'])
                ->join('jenis_laundry', 'barang_laundry.id_jenis_laundry = jenis_laundry.id_jenis_laundry')
                ->findAll();
        }

        return view('transaksi', [
            'list_transaksi' => $list_transaksi
        ]);
    }

    public function tambah_transaksi()
    {
        $JensiModel = new  JenisLaundryModel();
        $PelangganModel = new PelangganModel();


        $list_jenis_barang = $JensiModel->findAll();
        $list_pelanggan = $PelangganModel->findAll();

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
        $TransaksiModel->insert([
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
            $BarangLaundyModel->insert([
                'id_jenis_laundry' => $item['id_jenis_laundry'],
                'id_transaksi' => $id_transaksi,
                'harga_barang' => $harga_barang,
                'jumlah' => $item['jumlah']
            ]);

            // Menampung Total Harga
            $total_harga += $harga_barang;
        }

        // Memperbarui total harga
        $TransaksiModel->update($id_transaksi, [
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
        $TransaksiModel->delete($this->request->getPost('id_transaksi'));
        return redirect()->to('/transaksi')->with('success', 'Data User Berhasil Dihapus');
    }
}
