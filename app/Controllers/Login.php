<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Login extends BaseController
{
  //  private $usermodel;
  public function __construct()
  {
    $model = new UsersModel();

  }

  public function index()
  {
    return view('login_page');
  }
  public function auth()
  {

    $session = session();

    //         $data = $this->request->getPost();

    //         // Print the POST data
//         print_r($data);
// die();    
    //to declare the variable 
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('passsword');


    //to check the validation 
    $rules = [
      'email' => 'required|valid_email',
      'password' => 'required',

    ];

    //if true use credential to find record else redirect with error message 
    if ($this->validate($rules)) {

      $model = new UsersModel();
      $record = $model->where('user_name', $email)->first();

      // echo $record['user_id'];
      // print_r($record);
      // exit();
      //if user find put in to session and redirect to dashboard
      if ($record) {
        $data = [
          'id' => $record['user_id'],
          'username' => $record['user_name'],
          'isLoggedIn'=>TRUE
        ];
        $session->set($data);
        return redirect()->to('/dashboard');


      } else {
        $session->setFlashdata('Error', 'No entry found !.');
        return redirect()->to('/');
      }
    } else {
      //  print_r($this->validator);
      $session->setFlashdata('Error', 'Error !.');
      $session->set('validation', $this->validator);

      return redirect()->to('/');
    }
  } //auth

  public function logout()
  {

    session()->destroy();
    session()->setFlashdata('Error', 'Logout successfully');
    return redirect()->to('/');
  }
} //login
