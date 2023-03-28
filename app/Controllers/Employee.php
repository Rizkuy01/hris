<?php

namespace App\Controllers;

class Employee extends BaseController
{

    protected $db, $builder;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('employee');
    }
    public function index()
    {
        $data['title']  = 'Employee List';

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findall();


        $this->builder->select('employee.id as employeeid, id_employee, img, email, name, position, degree, address, no_tlp, birth_date, birth_place, gender, religion');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        return view('admin/employee', $data);
    }

    public function detail($id = 0)
    {
        $data['title']  = 'Employee Details';

        $this->builder->select('employee.id as employeeid, id_employee, img, email, name, position, degree, address, no_tlp, birth_date, birth_place, gender, religion');
        $this->builder->where('employee.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();
        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail_employee', $data);
    }
}
