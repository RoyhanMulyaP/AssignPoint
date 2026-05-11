<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBorrowerNameToLoans extends Migration
{
    public function up()
    {
        $this->forge->addColumn('loans', [
            'borrower_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'user_uuid'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('loans', 'borrower_name');
    }
}
