<?php

namespace App\Controllers;

$request = \Config\Services::request();

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
        $this->builder = $this->db->table('auth_permissions');

        $this->builder->select('description, id');
        $query = $this->builder->get();

        $data['permission'] = $query->getResult();
        $data['group_id'] = $id;

        return view('admin/access', $data);
    }

    public function changeaccess()
    {
        $group_id       = $this->request->getpost('groupId');
        $permission_id  = $this->request->getpost('permissionId');

        $data = [
            'group_id'      => $group_id,
            'permission_id' => $permission_id
        ];

        $this->builder->select('*');
        $this->builder->where($data);
        $query = $this->builder->get();

        if ($query->getNumRows() < 1) {
            $this->builder->insert($data);
        } else {
            $this->builder->delete($data);
        }

        echo json_encode($query->getNumRows());
    }
}
