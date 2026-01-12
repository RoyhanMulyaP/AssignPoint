<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'uuid' => [
                'type'           => 'CHAR',
                'constraint'     => 36,
                'null'           => false,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('uuid', true); // primary key
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
