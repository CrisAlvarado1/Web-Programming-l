<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CareerModel;
use App\Models\StudentModel;
use CodeIgniter\Model;

class Student extends BaseController
{
    // show students list
    public function index()
    {
        $data['pageTitle'] = 'Students Page';
        $studentModel = model(StudentModel::class);
        $data['students'] = $studentModel->getStudentsWithCareers();

        $content = view('students/index', $data);
        return parent::renderTemplate($content, $data);
    }
    // add student form
    public function create()
    {
        $careerModel = Model(CareerModel::class);

        $data['pageTitle'] = 'Students Page';
        $data['actionTitle'] = 'Create Student';
        $data['careers']     = $careerModel->findAll();;

        $content = view('students/form', $data);
        return parent::renderTemplate($content, $data);
    }

    public function edit($id)
    {
        $studentModel = model(StudentModel::class);
        $careerModel  = Model(CareerModel::class);

        $data['student']     = $studentModel->where('id', $id)->first();
        $data['pageTitle']   = 'Students Page';
        $data['actionTitle'] = 'Edit Student';
        $data['careers']     = $careerModel->findAll();

        $content = view('students/form', $data);
        return parent::renderTemplate($content, $data);
    }

    // insert/update data
    public function save()
    {
        $studentModel = model(StudentModel::class);
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'last_name'  => $this->request->getVar('last_name'),
            'address'  => $this->request->getVar('address'),
            'career_id'  => $this->request->getVar('career')
        ];
        if ($id) {
            $studentModel->update($id, $data);
        } else {
            $studentModel->insert($data);
        }
        return $this->response->redirect(site_url('/students'));
    }

    // // delete student
    public function delete($id = null)
    {
        $studentModel = model(StudentModel::class);
        $studentModel->where('id', $id)->delete();

        return $this->response->redirect(site_url('/students'));
    }
}
