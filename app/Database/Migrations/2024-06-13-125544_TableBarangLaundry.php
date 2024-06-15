<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableBarangLaundry extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang_laundry' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_jenis_laundry' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_transaksi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'harga_barang' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('id_barang_laundry', true);
        $this->forge->addForeignKey('id_jenis_laundry', 'jenis_laundry', 'id_jenis_laundry', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id_transaksi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('barang_laundry');
    }

    public function down()
    {
        $this->forge->dropTable('barang_laundry');
    }
}
