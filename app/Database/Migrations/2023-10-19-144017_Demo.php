<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Demo extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'id'=>array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name'=>array(
                'type'=> 'VARCHAR',
                'constraint'=>100,
                'null'=>false
            ),
            'age'=>array(
                'type'=>'INT',
                'constraint'=>5,
                'null'=>false
            ),
            'hobby'=>array(
                'type'=>'VARCHAR',
                'constraint'=>100,
                'null'=>true
            )
        )

        );
        $this->forge->addKey('id');
        $this->forge->createTable("User");

        //
    }

    public function down()
    {
         $this->forge->dropTable('User');
    }
}
