<?php

namespace App\Controllers;

class Datamaster extends BaseController
{
    protected $db, $builder, $divisiModel, $posisiModel;

    public function __construct()
    {
        $this->divisiModel = new \App\Models\M_Divisi();
        $this->posisiModel = new \App\Models\M_Posisi();
    }

    public function divisi()
    {
        $data['title'] = 'Data Divisi';

        $divisi = $this->divisiModel->list();
        $data['divisi'] = $divisi;
        return view('data_master/divisi', $data);
    }

    public function position()
    {
        $data['title'] = 'Data Posisi';

        $posisi = $this->posisiModel->list();
        $data['posisi'] = $posisi;
        return view('data_master/position', $data);
    }

    public function add_position()
    {
        $data = [
            'title' => 'Add New Position',
        ];
        $divisi = $this->divisiModel->list();
        $data['divisi'] = $divisi;

        helper('form');

        if (!$this->request->is('post')) {
            return view('data_master/add_position', $data);
        }

        $post = $this->request->getPost([
            'name',
            'division'
        ]);

        if (!$this->validateData($post, [
            'name'      => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'division'  => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataPosisi = [
            'name'      => $post['name'],
            'division'  => $post['division']
        ];
        $this->posisiModel->insert_posisi($dataPosisi);
        return redirect('data_master/position')->with('success', 'Data Added Successfully');
    }
}
