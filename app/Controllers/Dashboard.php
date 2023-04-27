<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $db, $builder, $employeeModel, $divisiModel, $posisiModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        // $this->builder = $this->db->table(['employee', 'divisi']);
        $this->employeeModel    = new \App\Models\M_Employee();
        $this->divisiModel      = new \App\Models\M_Divisi();
        $this->posisiModel      = new \App\Models\M_Posisi();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard/index', $data);
    }
}
