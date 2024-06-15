<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'total_harga' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['baru', 'proses', 'selesai'],
                'default' => 'baru',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_transaksi', true);
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
