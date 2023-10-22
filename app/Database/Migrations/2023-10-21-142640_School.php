<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class School extends Migration
{
    public function up()
    {
        
        $this->forge->addField(array(
            'sid'=>array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'sname'=>array(
                'type'=> 'VARCHAR',
                'constraint'=>100,
                'null'=>false
            )
        )

        );
        $this->forge->addKey('sid');
        $this->forge->createTable("School");
        $this->forge->hasMany("id",['className'=>'id']);

        //
    
    }

    public function down()
    {
        $this->forge->dropTable('School');
    }
}
