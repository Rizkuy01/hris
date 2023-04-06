<?php

namespace App\Controllers;

use App\Models\M_User;

class Admin extends BaseController
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
        $data['title']  = 'User List';

        $user = $this->userModel->list();
        $data['users'] = $user;

        return view('admin/index', $data);
    }


    public function detail($id = 0)
    {
        $data['title']  = 'User Details';

        $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();
        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }
}
