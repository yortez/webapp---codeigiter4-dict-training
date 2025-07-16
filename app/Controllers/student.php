<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

// class student extends BaseController
// {
//     public function index()
//     {
//         return view('student/page2');
//     }
// }
class student extends BaseController
{
    public function index()
    {
        $studentmodel = new \App\Models\StudentModel();
        $data['studentdata'] =  $studentmodel->findAll();
        return view('student/index', $data);
    }

    // public function add()
    // {
    //     return view('student/add');
    // }

    public function add()
    {

        helper('form');
        $studentmodel = new \App\Models\StudentModel();
        $data = [];
        if($this->request->getMethod() === 'POST'){

        $rules = [
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
        ];

        if (!$this->validate($rules)){
            $data['validation'] = $this->validator;
        }else {
            $studentmodel->insert($_POST);

            return redirect()->to('student');
        }
    }
        return view('student/add');
    }
}


