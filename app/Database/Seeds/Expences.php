<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ExpencesModel;

class Expences extends Seeder
{
    public function run()
    {
        helper('text');

        $exp=new ExpencesModel();

        for($i=1;$i<4;$i++)
        {
            $insert_data=[
                'item_id'=> $i+1 ,
                'item_name'=>random_string('alpha'),
                'price'=>rand(100,500)
            ];

            $exp->insert($insert_data);
        }


    }
}
