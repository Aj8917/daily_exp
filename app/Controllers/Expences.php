<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExpencesModel;

class Expences extends BaseController
{
    public function index()
    {
        $expence = new ExpencesModel();

        $data['result'] = $expence->find(); //tofind all record pass it without argumane

        //  //  echo $result['item_name'];
        //    foreach($result as $row)
        //     {
        //         echo $row['item_name'];
        //     }  die();



        $data['header'] = view('header/header');
        $data['topbar'] = view('header/topbar');
        $data['sidebar'] = view('header/sidebar');
        $data['footer'] = view('header/footer');

        return view('daily_expences', $data);
    } //index 

    public function add_expences()
    {
        $data['header'] = view('header/header');
        $data['topbar'] = view('header/topbar');
        $data['sidebar'] = view('header/sidebar');
        $data['footer'] = view('header/footer');

        return view('add_expences', $data);
    } //add_expences

    public function save()
    {

        //  session()->remove('validation');
        $data = $this->request->getPost();
        $rules = [
            'item_name' => 'required',
            'price' => 'required|numeric',
            // 'csrf_token'  =>'verify_csrf'

        ];


        if ($this->validate($rules)) {
            $expences = new ExpencesModel();

            $expences->save($data);

            SESSION()->setflashdata('success', 'item Saved!');
            return redirect()->to('/add_expence');
        } else {
            //die('inside'); 
            SESSION()->setFlashdata('validation', $this->validator->listErrors());
            return redirect()->to('/add_expence');

        }
        return redirect()->to('/add_expence');
        //print_r($this->request->getPost());
    }
    public function delete()
    {
        $id = $this->request->getPost('id');

        if ($id) {
            $db = \Config\Database::connect();
            $builder = $db->table('expences');
            $builder->where('item_id', $id);
            $deleted = $builder->delete();
            echo "Item Removed";
        } else {
            echo "No id Found";
        }
    }

    public function load_report_view()
    {
        $data['header'] = view('header/header');
        $data['topbar'] = view('header/topbar');
        $data['sidebar'] = view('header/sidebar');
        $data['footer'] = view('header/footer');

        return view('report_view', $data);
    } //load_report_view

    public function search_items()
    {
        $data = $this->request->getPost();

        $rule = [
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ];
        // print_r($data['start_date']);die();

        if ($this->validate($rule)) {
            $expence_model = new ExpencesModel();
            $records = $expence_model->load_master_data($data['start_date'], $data['end_date']);


            //print_r($records);die();
            $data['header'] = view('header/header');
            $data['topbar'] = view('header/topbar');
            $data['sidebar'] = view('header/sidebar');
            $data['footer'] = view('header/footer');
            $data['records'] = $records; // Pass the fetched records to the view
            if(empty($records))
            {
                session()->setFlashdata('error','No Data Found FOr selected range.');
                return redirect()->to('/expences-report');

            }else{
                return view('expence_report', $data);
            }
           
        } else {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/expences-report');
        }
    } //search_items


} //class
