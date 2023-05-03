<?php

namespace App\Controllers;

class Absensi extends BaseController
{
    protected $db, $builder, $employeeModel, $divisiModel, $posisiModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kehadiran');
    }
    public function index()
    {
        $data = [
            'title' => 'Form Absensi',
        ];
        return view('absensi/index', $data);
    }
    public function rekap()
    {
        $data['title'] = 'Rekap Absensi Bulanan';
        return view('absensi/rekap', $data);
    }
}
