<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Expences extends Migration
{
    public function up()
    {
       $this->forge->addField(
        [
            'item_id'=>[
                            'type'=>'INT',
                            'constraint'=>5,
                            'unsigned'=>true,
                            'auto_increment'=>true,
            ],
            'item_name'=>[
                            'type'=>'VARCHAR',
                            'constraint'=>'100',

            ],
            'InsertDate'=>[
                            'type'=>'timestamp',
                            'on update' => 'NOW()',

            ],
        ]);
       $this->forge->addKey('item_id',true);
      
     
       //$this->forge->timestamp('created_at')->useCurrent()->dateFormat('Y-m-d H:i:s');
       $this->forge->createTable('expences');
    }

    public function down()
    {
        $this->forge->dropTable('expences');
    }
}
