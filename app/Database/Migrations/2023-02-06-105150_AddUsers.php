<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
                     'user_id' =>[
                            'type'=>'INT',
                            'constraint'=>5,
                            'unsinged'=> true,
                            'auto_increament' =>true,
                     ],

                     'user_name'=>[
                                    'type'=>'VARCHAR',
                                    'constraint'=>'100',
                     ],
                     'password'=>[
                                'type'=>'VARCHAR',
                                'constraint'=>'500'
                     ],
        ]);

        $this->forge->addKey('user_id',true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
