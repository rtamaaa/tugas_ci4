<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dosen' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nama_dosen' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_dosen' => [
                'type' => 'CHAR',
                'constraint' => 1,
            ],
        ]);
        $this->forge->addPrimaryKey('id_dosen');
        $this->forge->createTable('dosen');

    }

    public function down()
    {
        $this->forge->dropTable('dosen');

    }
}
