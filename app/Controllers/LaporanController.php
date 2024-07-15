<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangLaundryModel;
use App\Models\PersediaanModel;
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

        $date = ($this->request->getGet('tanggal')) ? $this->request->getGet('tanggal') : date('Y-m-d');

        $TransaksiModel = new TransaksiModel();

        $data = $TransaksiModel->getDataForPrint($date);


        $dompdf = new Dompdf();
        $Laporan = view('print-laporan', $data);

        $dompdf->loadHtml($Laporan);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Laporan-Mama-Laundry.pdf', ['Attachment' => 0]);
    }

    public function print_persediaan()
    {
        $PersediaanModel = new PersediaanModel();
        $list_persediaan = $PersediaanModel->getAllData('masuk');
        $dompdf = new Dompdf();
        $Laporan = view('print_laporan_persediaan', [
            'list_persediaan' => $list_persediaan
        ]);

        $dompdf->loadHtml($Laporan);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Laporan-Pengeluaran-Mama-Laundry.pdf', ['Attachment' => 0]);
    }
}
