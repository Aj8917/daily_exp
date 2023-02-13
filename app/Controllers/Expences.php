<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExpencesModel;
class Expences extends BaseController
{
    public function index()
    {
        $expence=new ExpencesModel();

        $data['result']=$expence->find();//tofind all record pass it without argumane
       
    //  //  echo $result['item_name'];
    //    foreach($result as $row)
    //     {
    //         echo $row['item_name'];
    //     }  die();
        
        
       
        $data['header']=view('header/header');
        $data['topbar']=view('header/topbar');
        $data['sidebar']=view('header/sidebar');
        $data['footer']=view('header/footer');

        return view('daily_expences',$data);
    }//index 
    public function delete()
    {
       $id = $this->request->getPost('item_id');
    
       if ($id) 
       {
        $db = \Config\Database::connect();
        $builder = $db->table('expences');
        $builder->where('item_id', $id);
        $deleted = $builder->delete();
         echo "success";
       }
    }

}//class
