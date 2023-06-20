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

    public function add_expences()
    {
        $data['header']=view('header/header');
        $data['topbar']=view('header/topbar');
        $data['sidebar']=view('header/sidebar');
        $data['footer']=view('header/footer');

        return view('add_expences',$data);   
    }//add_expences

    public function save()
    {

      //  session()->remove('validation');
        $data=$this->request->getPost();
        $rules=[
                    'item_name'=>'required',
                    'price' =>'required|numeric',
                   // 'csrf_token'  =>'verify_csrf'

        ];

        
        if($this->validate($rules))
        { 
            $expences=new ExpencesModel();
            
            $expences->save($data);
           
            SESSION()->setflashdata('success','item Saved!');
            return redirect()->to('/add_expence');
        }else{
            //die('inside'); 
            SESSION()->setFlashdata('validation',$this->validator->listErrors());
            return  redirect()->to('/add_expence');

        }
      return  redirect()->to('/add_expence');
        //print_r($this->request->getPost());
    }
    public function delete()
    {
        
       
       
       $id = $this->request->getPost('id');
    //   echo $id;
       if($id) 
       {
        $db = \Config\Database::connect();
        $builder = $db->table('expences');
        $builder->where('item_id', $id);
        $deleted = $builder->delete();
         echo "Item Removed";
       }else{
        echo "No id Found";
       }
    }

    public function delete_tst()
    {
        echo "in";
        // $data=$this->request->getPost();
        // print_r($data);
    //    $id = $this->request->getPost('id');
    //   echo $id;
    //    if($id) 
    //    {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('expences');
    //     $builder->where('item_id', $id);
    //     $deleted = $builder->delete();
    //      echo "success";
    //    }else{
    //     echo "No id Found";
    //    }
    }

}//class
