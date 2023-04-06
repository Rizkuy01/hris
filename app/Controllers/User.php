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
        $user = $this->userModel->findAll();
        $data = [
            'title' => 'Add User',
            'user' => $user
        ];

        return view('admin/add_user', $data);
    }

    public function save()
    {
        $this->userModel->save([
            'username' => $this->userModel->getVar('username'),
            'email' => $this->userModel->getVar('email'),
            'role' => $this->userModel->getVar('name')
        ]);
    }
}
