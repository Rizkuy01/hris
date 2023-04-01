<?php

namespace App\Controllers;

class Role extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('auth_groups_permissions');
    }

    public function index()
    {

        $data['title'] = 'Role Access';

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('auth_groups');

        $this->builder->select('description, name, id');
        $query = $this->builder->get();

        $data['role'] = $query->getResult();

        return view('admin/role', $data);
    }
    public function access($id)
    {
        $data['title'] = 'Access Menu';

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('auth_groups_permissions');

        $this->builder->select('group_id, permission_id, auth_permissions.description');
        $this->builder->join('auth_permissions', 'auth_permissions.id = auth_groups_permissions.permission_id');
        $this->builder->where('group_id', $id);
        $query = $this->builder->get();

        $data['role'] = $query->getResult();

        return view('admin/access', $data);
    }
}
