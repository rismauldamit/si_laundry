<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablePelanggan extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'telp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
        ]);

        $this->forge->addKey('id_pelanggan', true);
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
