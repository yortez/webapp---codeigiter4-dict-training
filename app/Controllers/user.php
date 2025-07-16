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
        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'lastname' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'username' => 'required|max_length[30]|is_unique[tbl_user.username]',
                'password' => 'required',
                'confirmpassword' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {

                $data['validation'] = $this->validator;
            } else {

                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_POST['password'] = $password;


                $result =  $usermodel->insert($_POST);
                if ($result) {
                    session()->setFlashdata('success', 'User added successfully.');
                } else {
                    session()->setFlashdata('error', 'Failed to add user.');
                }
                return redirect()->to('user');
            }
        }
        return view('user/add');
    }

    public function edit()
    {

        helper('form');
        $usermodel = new \App\Models\UserModel();
        $data = [];

        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'user_id' => 'required',
                'lastname' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                'username' => 'required|max_length[30]|is_unique[tbl_user.username, user_id, {user_id}]',
                'password' => 'required',
                'confirmpassword' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {

                $data['validation'] = $this->validator;
            } else {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $updatedData['password'] = $password;
                $updatedData['lastname'] = $_POST['lastname'];
                $updatedData['firstname'] = $_POST['firstname'];
                $updatedData['middlename'] = $_POST['middlename'];
                $updatedData['username'] = $_POST['username'];
                $updatedData['password'] = $_POST['password'];
                $updatedData['confirmpassword'] = $_POST['confirmpassword'];

                $result =  $usermodel->update($_POST['user_id'], $updatedData);
                if ($result) {
                    session()->setFlashdata('success', 'User updated successfully.');
                } else {
                    session()->setFlashdata('error', 'Failed to update user.');
                }
                return redirect()->to('user');
            }
        }
        $userDetails = $usermodel
            ->where('MD5(CONCAT(user_id, "edit"))', $_GET)
            ->first();

        $_POST['user_id'] = $userDetails->user_id;
        $_POST['lastname'] = $userDetails->lastname;
        $_POST['firstname'] = $userDetails->firstname;
        $_POST['middlename'] = $userDetails->middlename;
        $_POST['username'] = $userDetails->username;

        return view('user/edit');
    }

    public function delete()
    {
        helper('form');
        $usermodel = new \App\Models\UserModel();

        if ($this->request->getMethod() === 'POST') {
            $result =  $usermodel->delete($_POST['user_id']);
            if ($result) {
                session()->setFlashdata('success', 'User deleted successfully.');
            } else {
                session()->setFlashdata('error', 'Failed to delete user.');
            }
            return redirect()->to('user');
        }


        $userDetails = $usermodel
            ->where('MD5(CONCAT(user_id, "delete"))', $_GET['id'])
            ->first();

        $_POST['user_id'] = $userDetails->user_id;
        $_POST['lastname'] = $userDetails->lastname;
        $_POST['firstname'] = $userDetails->firstname;
        $_POST['middlename'] = $userDetails->middlename;

        return view('user/delete');
    }
    public function login()
    {
        unset($_POST['error']);

        helper('form');
        $usermodel = new \App\Models\UserModel();
        $data = [];
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $usermodel = new \App\Models\UserModel();
                $result = $usermodel
                    ->where('username', $_POST['username'])
                    ->first();

                if ($result) {
                    if (password_verify($_POST['password'], $result->password)) {
                        session()->set('userdata', $result->firstname . ' ' . $result->lastname);
                        session()->set('islogin', true);
                        return redirect()->to('/');
                    } else {
                        session()->setFlashdata('error', 'Invalid password');
                    }
                } else {
                    session()->setFlashdata('error', 'Invalid Credentials');
                }
            }
        }

        return view('user/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
