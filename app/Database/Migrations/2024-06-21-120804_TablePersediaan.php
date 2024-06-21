<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablePersediaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_persediaan' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'jumlah' => [
                'type' => 'INT'
            ],
            'harga_satuan' => [
                'type' => 'INT'
            ],
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);
        $this->forge->addKey('id_persediaan', true);
        $this->forge->createTable('persediaan');
    }

    public function down()
    {
        $this->forge->dropTable('persediaan');
    }
}
