<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Employee extends Model
{
    protected $db, $builder;
    protected $table = 'employee';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_employee',
        'name',
        'email',
        'start_working',
        'birth_place',
        'birth_date',
        'no_tlp',
        'address',
        'gender',
        'religion',
        'degree',
        'divisi',
        'position',
        'mirage',
        'tanggungan',
    ];

    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('employee');

        $this->builder->select(
            'employee.id as employeeid, 
        id_employee, 
        img, 
        name, 
        email, 
        start_working,
        birth_place, 
        birth_date, 
        no_tlp, 
        address, 
        gender, 
        religion, 
        degree, 
        divisi, 
        position,
        mirage,
        tanggungan'
        );
        $query = $this->builder->get();

        return $query->getResult();
    }

    public function getEmployee($id)
    {
        return $this->db
            ->table('employee')
            ->where(["id" => $id])
            ->get()
            ->getRow();
    }

    public function insert_employee($dataEmployee)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('employee')->insert($dataEmployee);
    }

    public function deleteEmployee($id)
    {
        $query = "DELETE FROM employee WHERE id = $id";
        $this->db->query($query);
        redirect('admin/employee');
    }

    public function updateEmployee($id, $data)
    {
        return $this->db
            ->table('employee')
            ->where(["id" => $id])
            ->set($data)
            ->update();
    }

    public function editEmployee($id)
    {
        $data = [
            'id_employee'   => $this->request->getPost(['id_employee']),
            'name'          => $this->request->getPost(['name']),
            'email'         => $this->request->getPost(['email']),
            'start_working'  => $this->request->getPost(['start_working']),
            'birth_place'   => $this->request->getPost(['birth_place']),
            'birth_date'    => $this->request->getPost(['birth_date']),
            'no_tlp'        => $this->request->getPost(['no_tlp']),
            'address'       => $this->request->getPost(['address']),
            'gender'        => $this->request->getPost(['gender']),
            'religion'      => $this->request->getPost(['religion']),
            'degree'        => $this->request->getPost(['degree']),
            'divisi'        => $this->request->getPost(['divisi']),
            'position'      => $this->request->getPost(['position']),
            'mirage'        => $this->request->getPost(['mirage']),
            'tanggungan'    => $this->request->getPost(['tanggungan']),
        ];
        $this->builder->where('id', $this->request->getPost('id', $id));
        $this->builder->update(['employee', $data]);
        return redirect()->to(base_url('admin/detail_employee'));
    }
}
