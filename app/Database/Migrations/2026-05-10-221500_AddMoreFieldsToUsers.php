<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMoreFieldsToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'phone'     => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true, 'after' => 'email'],
            'job_title' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true, 'after' => 'phone'],
            'address'   => ['type' => 'TEXT', 'null' => true, 'after' => 'job_title'],
            'bio'       => ['type' => 'TEXT', 'null' => true, 'after' => 'address'],
            'avatar'    => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true, 'after' => 'bio'],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['phone', 'job_title', 'address', 'bio', 'avatar']);
    }
}
