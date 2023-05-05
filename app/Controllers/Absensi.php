<?php

namespace App\Controllers;

class Absensi extends BaseController
{
    protected $db, $builder, $employeeModel, $divisiModel, $posisiModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kehadiran');
        $this->employeeModel = new \App\Models\M_Employee();
        $this->divisiModel  = new \App\Models\M_Divisi();
        $this->posisiModel = new \App\Models\M_Posisi();
    }
    public function index()
    {
        $data = [
            // 'post'      => $this->employeeModel->getEmployee($id),
            // 'divisi'    => $this->divisiModel->list(),
            // 'posisi'    => $this->posisiModel->list(),
            'title'     => 'Form Absensi'
        ];
        return view('absensi/index', $data);
    }
    public function rekap()
    {
        $data['title'] = 'Rekap Absensi';
        return view('absensi/rekap', $data);
    }
}
