<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CareerModel;

class Career extends BaseController
{
    public function index()
    {
        $careerModel = Model(CareerModel::class);
        $data['pageTitle'] = 'Careers Page';

        $data['careers'] = $careerModel->findAll();
        $content = view('/careers/index', $data);
        return parent::renderTemplate($content, $data);
    }

    public function create()
    {
        $data['pageTitle'] = 'Careers Page';
        $data['actionTitle'] = 'Create Careers';
        $content = view('careers/form', $data);
        return parent::renderTemplate($content, $data);
    }

    public function edit($id)
    {
        $careerModel = Model(CareerModel::class);
        $data['career'] = $careerModel->where('id', $id)->first();
        $data['pageTitle'] = 'Careers Page';
        $data['actionTitle'] = 'Edit Student';
        $content = view('careers/form', $data);
        return parent::renderTemplate($content, $data);
    }

    public function save()
    {
        $careerModel = Model(CareerModel::class);
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name')
        ];
        if ($id) {
            $careerModel->update($id, $data);
        } else {
            $careerModel->insert($data);
        }
        return $this->response->redirect(site_url('/careers/index'));
    }

    public function delete($id = null){
        $careerModel = Model(CareerModel::class);
        $careerModel->where('id', $id)->delete();

        return $this->response->redirect(site_url('/careers/index'));
    }
}
