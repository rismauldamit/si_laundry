<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableJenisLaundry extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_laundry' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ]
        ]);

        $this->forge->addKey('id_jenis_laundry', true);
        $this->forge->createTable('jenis_laundry');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_laundry');
    }
}
