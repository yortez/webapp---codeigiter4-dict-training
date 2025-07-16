<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class student extends BaseController
{
    public function index()
    {
        $studentmodel = new \App\Models\StudentModel();
        $data['studentdata'] =  $studentmodel->findAll();
        return view('student/index', $data);
    }

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
           $result =  $studentmodel->insert($_POST);

        if($result){
            session()->setFlashdata('success', 'Student added successfully.');
           }else{
            session()->setFlashdata('error', 'Failed to add student.');
           }

            return redirect()->to('student');
        }
    }
        return view('student/add');
    }

        public function edit()
    {
        helper('form');
        $studentmodel = new \App\Models\StudentModel();
        $data = [];

 if ($this->request->getMethod() === 'POST') {
            $rules = [
                'student_id' => 'required',
                'lastname' => 'required',
                'firstname' => 'required',
                'middlename' => 'required',
                
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $updatedData['lastname'] = $_POST['lastname'];
                $updatedData['firstname'] = $_POST['firstname'];
                $updatedData['middlename'] = $_POST['middlename'];
            
                $result =  $studentmodel->update($_POST['student_id'], $updatedData);
                if ($result) {
                    session()->setFlashdata('success', 'Student updated successfully.');
                } else {
                    session()->setFlashdata('error', 'Failed to update student.');
                }
                return redirect()->to('student');
            }
        }

       $studentDetails = $studentmodel
    ->where('MD5(CONCAT(student_id, "edit"))', $_GET)
       ->first();

        $_POST['student_id'] = $studentDetails->student_id;
        $_POST['lastname'] = $studentDetails->lastname;
        $_POST['firstname'] = $studentDetails->firstname;
        $_POST['middlename'] = $studentDetails->middlename;

        return view('student/edit');
    }

    public function delete()
    {
        helper('form');
         $studentmodel = new \App\Models\StudentModel();

   if ($this->request->getMethod() === 'POST') {
   $result =  $studentmodel->delete($_POST['student_id']);
                if ($result) {
                    session()->setFlashdata('success', 'Student deleted successfully.');
                } else {
                    session()->setFlashdata('error', 'Failed to delete student.');
                }
                return redirect()->to('student');
}

       
   
    $studentDetails = $studentmodel
    ->where('MD5(CONCAT(student_id, "delete"))', $_GET['id'])
    ->first();

    $_POST['student_id'] = $studentDetails->student_id;
    $_POST['lastname'] = $studentDetails->lastname;
    $_POST['firstname'] = $studentDetails->firstname;
    $_POST['middlename'] = $studentDetails->middlename;

        return view('student/delete');
    }
}


