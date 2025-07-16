<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class user extends BaseController
{
    public function index()
    {
        $usermodel = new \App\Models\UserModel();
        $data['userdata'] =  $usermodel->findAll();
        return view('user/index', $data);
    }

    public function add()
    {

        helper('form');
        $usermodel = new \App\Models\UserModel();
        $data = [];
        if($this->request->getMethod() === 'POST'){

        $rules = [
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'username' => 'required|max_length[30]|is_unique[tbl_user.username]',
            'password' => 'required',
            'confirmpassword' => 'matches[password]',
        ];

        if (!$this->validate($rules)){

            $data['validation'] = $this->validator;

        }else {
            $usermodel->insert($_POST);

            return redirect()->to('user');
        }
    }
        return view('user/add');
    }
}
