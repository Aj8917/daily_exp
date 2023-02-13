<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {

       $data['header']=view('header/header');
       $data['topbar']=view('header/topbar');
       $data['sidebar']=view('header/sidebar');
       $data['footer']=view('header/footer');
       return view('dashboard',$data);
    }
}
