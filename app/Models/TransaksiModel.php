<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pelanggan', 'id_user', 'total_harga', 'created_at', 'updated_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
 
    public function getAllData($date = null)
    {
        $BarangLaundyModel = new BarangLaundryModel();

        if ($date != null) {
            $bulan = date('m', strtotime($date));
            $tahun = date('Y', strtotime($date));
            $list_transaksi = $this->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan')
                ->where('MONTH(transaksi.created_at)', $bulan)
                ->where('YEAR(transaksi.created_at)', $tahun)
                ->findAll();
        } else {
            $list_transaksi = $this->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan')->findAll();
        }

        foreach ($list_transaksi as $key => $item) {
            $list_transaksi[$key]['barang'] = $BarangLaundyModel->where('id_transaksi', $item['id_transaksi'])
                ->join('jenis_laundry', 'barang_laundry.id_jenis_laundry = jenis_laundry.id_jenis_laundry')
                ->findAll();
        }
        return $list_transaksi;
    }

    public function SaveData($data)
    {
        return $this->insert($data);
    }

    public function UpdateData($id, $data)
    {
        return $this->update($id, $data);
    }

    public function DeleteData($id)
    {
        return $this->delete($id);
    }

    public function getDataForPrint($date = null)
    {
        $BarangLaundyModel = new BarangLaundryModel();

        if ($date != null) {
            $bulan = date('m', strtotime($date));
            $tahun = date('Y', strtotime($date));
            $list_transaksi = $this->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan')
                ->where('MONTH(transaksi.created_at)', $bulan)
                ->where('YEAR(transaksi.created_at)', $tahun)
                ->findAll();
        } else {
            $list_transaksi = $this->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan')->findAll();
        }

        $total_pendapatan = 0;

        foreach ($list_transaksi as $key => $item) {
            $list_transaksi[$key]['barang'] = $BarangLaundyModel->where('id_transaksi', $item['id_transaksi'])
                ->join('jenis_laundry', 'barang_laundry.id_jenis_laundry = jenis_laundry.id_jenis_laundry')
                ->findAll();

            $total_pendapatan += $item['total_harga'];
        }

        return [
            'list_transaksi' => $list_transaksi,
            'total_pendapatan' => $total_pendapatan
        ];
    }

}