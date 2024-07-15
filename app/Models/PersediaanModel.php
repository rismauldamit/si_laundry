<?php

namespace App\Models;

use CodeIgniter\Model;

class PersediaanModel extends Model
{
    protected $table            = 'persediaan';
    protected $primaryKey       = 'id_persediaan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_barang_persediaan', 'status', 'jumlah',];

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

    public function getAllData($status = null)
    {
        if ($status) {
            return $this->join("barang_persediaan", "persediaan.id_barang_persediaan=barang_persediaan.id_barang_persediaan")->where('status', 'masuk')->findAll();
        }
        return $this->join("barang_persediaan", "persediaan.id_barang_persediaan=barang_persediaan.id_barang_persediaan")->findAll();
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
}
