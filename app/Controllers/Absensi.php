<?php

namespace App\Controllers;

class Absensi extends BaseController
{
    protected $db, $builder, $employeeModel, $divisiModel, $posisiModel, $kehadiranModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kehadiran');
        $this->employeeModel = new \App\Models\M_Employee();
        $this->divisiModel  = new \App\Models\M_Divisi();
        $this->posisiModel = new \App\Models\M_Posisi();
        $this->kehadiranModel = new \App\Models\M_Kehadiran();
    }
    public function add_absensi()
    {
        $data = [
            // 'post'      => $this->employeeModel->getEmployee($id),
            // 'divisi'    => $this->divisiModel->list(),
            // 'posisi'    => $this->posisiModel->list(),
            'title'     => 'Form Absensi'
        ];

        $divisi = $this->divisiModel->list();
        $data['divisi'] = $divisi;

        $posisi = $this->posisiModel->list();
        $data['posisi'] = $posisi;

        helper('form');
        if (!$this->request->is('post')) {
            return view('absensi/index', $data);;
        }
        $post = $this->request->getPost(['nama', 'position', 'divisi', 'lokasi', 'waktu']);

        if (!$this->validateData($post, [
            'nama'      => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'position'  => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'divisi'    => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'lokasi'    => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
            // session()->setFlashdata('success', 'Post Berhasil Disimpan');
        }

        $dataAbsen = [
            'nama'      => $post['nama'],
            'position'  => $post['position'],
            'divisi'    => $post['divisi'],
            'lokasi'    => $post['lokasi'],
        ];
        $this->kehadiranModel->insert_absen($dataAbsen);
        return redirect('absensi/index')->with('success', 'Data Added Successfully');
    }
    public function rekap()
    {
        $data['title'] = 'Rekap Absensi';
        return view('absensi/rekap', $data);
    }
}
