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

        $this->builder->select('group_id, permission_id, auth_groups.description as rolename, auth_permissions.description');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_permissions.group_id');
        $this->builder->join('auth_permissions', 'auth_permissions.id = auth_groups_permissions.permission_id');
        $query = $this->builder->get();

        $data['role'] = $query->getResult();

        return view('admin/role', $data);
    }
}
