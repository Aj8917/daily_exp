<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use  App\Models\UsersModel;
class Users extends Seeder
{
    public function run()
    {
        helper('text');

        $user=new UsersModel();

        $user_data=[
                    'user_id'=> 1 ,
                    'user_name'=>'test@test.com',
                    'password'=>'123'
        ];
        $user->insert($user_data);



        for($i=1;$i<4;$i++)
        {
            $insert_data=[
                'user_id'=> $i+1 ,
                'user_name'=>random_string('alpha').'@test.in',
                'password'=>rand(100,500)
            ];

            $user->insert($insert_data);
        }

    }
}
