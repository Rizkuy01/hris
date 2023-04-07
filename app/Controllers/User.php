<?php

namespace App\Controllers;

use App\Models\M_User;

class User extends BaseController
{
    protected $db, $builder, $userModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->userModel = new M_User();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        return view('user/index', $data);
    }


    public function add_user()
    {
        $data = [
            'title' => 'Add User',
        ];

        helper('form');

        if (!$this->request->is('post')) {
            return view('admin/add_user', $data);
        }

        $post = $this->request->getPost(['fullname', 'username', 'email']);

        if (!$this->validateData($post, [
            'fullname'  => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'username'  => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'email'     => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $dataUser = [
            'fullname' => $post['fullname'],
            'username' => $post['username'],
            'email' => $post['email'],
        ];
        $this->userModel->insert_user($dataUser);

        $data['title']  = 'User List';
        return view('admin/add_user', $data);
    }
}
