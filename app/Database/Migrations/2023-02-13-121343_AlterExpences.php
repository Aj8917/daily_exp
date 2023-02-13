<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Schema\Builder;
use CodeIgniter\Database\Migration;

class AlterExpences extends Migration
{
    public function up()
    {
      //$table=$this->table('expences');

      $this->forge->addColumn('expences',[
                            'price'=>[
                                        'type'=>'float',
                                        'constraint'=>'10,2',
                                        ['after' => 'item_name']
                            ],
                        ]);
        $this->forge->save();
    }

    public function down()
    {
        //
    }
}
