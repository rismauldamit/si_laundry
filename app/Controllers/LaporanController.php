<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangLaundryModel;
use App\Models\TransaksiModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

class LaporanController extends BaseController
{
    public function index()
    {
        return view('laporan');
    }

    public function print()
    {

        $TransaksiModel = new TransaksiModel();
        $BarangLaundyModel = new BarangLaundryModel();

        $list_transaksi = $TransaksiModel->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan')->findAll();
        $total_pendapatan = 0;

        foreach ($list_transaksi as $key => $item) {
            $list_transaksi[$key]['barang'] = $BarangLaundyModel->where('id_transaksi', $item['id_transaksi'])
                ->join('jenis_laundry', 'barang_laundry.id_jenis_laundry = jenis_laundry.id_jenis_laundry')
                ->findAll();

            $total_pendapatan += $item['total_harga'];
        }


        $dompdf = new Dompdf();
        $Laporan = view('print-laporan', [
            'list_transaksi' => $list_transaksi,
            'total_pendapatan' => $total_pendapatan
        ]);

        $dompdf->loadHtml($Laporan);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Laporan-Mama-Laundry.pdf', ['Attachment' => 0]);
    }
}
