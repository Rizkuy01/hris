<?php

namespace App\Controllers;

use App\Models\M_User;

class User extends BaseController
{
    protected $db, $builder, $userModel, $divisiModel, $posisiModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new M_User();
        $this->divisiModel = new \App\Models\M_Divisi();
        $this->posisiModel = new \App\Models\M_Posisi();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        return view('user/index', $data);
    }

    public function data_user()
    {
        $data['title'] = 'Add Data';
        return view('user/edit', $data);
    }


    public function add_user()
    {
        $data = [
            'title' => 'Add User',
        ];
        $divisi = $this->divisiModel->list();
        $data['divisi'] = $divisi;

        $posisi = $this->posisiModel->list();
        $data['posisi'] = $posisi;
        // $data['title']  = 'User List';

        helper('form');

        if (!$this->request->is('post')) {
            return view('admin/add_user', $data);
        }

        $post = $this->request->getPost(['fullname', 'username', 'email', 'divisi', 'position', 'password_hash']);

        if (!$this->validateData($post, [
            'fullname'          => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'username'          => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'email'             => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'divisi'            => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'position'          => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'password_hash'     => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
            // session()->setFlashdata('success', 'Post Berhasil Disimpan');
        }

        $dataUser = [
            'fullname'          => $post['fullname'],
            'username'          => $post['username'],
            'email'             => $post['email'],
            'divisi'            => $post['divisi'],
            'position'          => $post['position'],
            'password_hash'     => $post['password_hash'],
        ];
        $this->userModel->insert_user($dataUser);
        return redirect('admin/index')->with('success', 'Data Added Successfully');

        // return view('admin/add_user', $data);
    }

    public function delete($id)
    {
        $this->userModel->deleteUser($id);
        return redirect('admin/index');
    }
}
