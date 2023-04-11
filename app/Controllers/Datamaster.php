<?php

namespace App\Controllers;

class Datamaster extends BaseController
{
    protected $db, $builder, $divisiModel, $posisiModel;

    public function __construct()
    {
        $this->divisiModel = new \App\Models\M_Divisi();
        // $this->posisiModel = new \App\Models\M_Posisi();
    }

    public function divisi()
    {
        $data['title'] = 'Data Divisi';

        $divisi = $this->divisiModel->list();
        $data['divisi'] = $divisi;
        return view('data_master/divisi', $data);
    }
}
