<?php

namespace App\Controllers;

class Employee extends BaseController
{

    protected $db, $builder, $employeeModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('employee');
        $this->employeeModel = new \App\Models\M_Employee();
    }
    public function index()
    {
        $data['title']  = 'Employee List';


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

    public function add_employee()
    {
        $data = [
            'title' => 'Add Employee',
        ];

        helper('form');

        if (!$this->request->is('post')) {
            return view('admin/add_employee', $data);
        }

        $post = $this->request->getPost(['id_employee', 'name', 'email', 'birth_place', 'birth_date', 'no_tlp', 'address', 'gender', 'religion', 'degree', 'position']);

        if (!$this->validateData($post, [
            'id employee'   => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'name'          => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'email'         => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'birth place'   => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'birth date'    => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'phone number'  => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'address'       => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'gender'        => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'religion'      => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'degree'        => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'position'      => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
        }

        $dataEmployee = [
            'id_employee'   => $post['id_employee'],
            'name'          => $post['name'],
            'email'         => $post['email'],
            'birth_place'   => $post['birth_place'],
            'birth_date'    => $post['birth_date'],
            'no_tlp'        => $post['no_tlp'],
            'address'       => $post['address'],
            'gender'        => $post['gender'],
            'religion'      => $post['religion'],
            'degree'        => $post['degree'],
            'position'      => $post['position'],
        ];
        $this->employeeModel->insert_employee($dataEmployee);
        return redirect('admin/employee')->with('success', 'Data Added Successfully');
    }
}
