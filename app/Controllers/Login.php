<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use  App\Models\UsersModel;
class Login extends BaseController
{
  //  private $usermodel;
   public function __construct()
   {
        $model=new UsersModel();
       
   }
   
    public function index()
    {
        return view('login_page');
    }
    public function auth()
    {
        $session= session();
        //to declare the variable 
        $email=$this->request->getPost('email');
        $password=$this->request->getPost('passsword');


        //to check the validation 
        $rules=[
                'email'=>'required|valid_email',
                'password'=>'required'
        ];

        //if true use credential to find record else redirect with error message 
        if($this->validate($rules))
        {
            
            $model=new UsersModel();
            $record=$model->where('user_name',$email)->first();
            print_r($record);
              //if user find put in to session and redirect to dashboard
            if($record)
            {
                echo "record foound ";
            }else{
                echo "redirection to login";
            }
        }else{
          //  print_r($this->validator);
            session()->setFlashdata('Error', 'Error !.');
       //   $data[$error]=$this->validator;
         // return redirect()->to('/');
        }
    }//auth
}//login
