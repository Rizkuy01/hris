<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Employee extends Model
{
    protected $table = 'employee';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_employee', 'name', 'email', 'birth_place', 'birth_date', 'no_tlp', 'address', 'gender', 'religion', 'degree', 'position'];

    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('employee');

        $this->builder->select('employee.id as employeeid, id_employee, img, email, name, position, degree, address, no_tlp, birth_date, birth_place, gender, religion');
        $query = $this->builder->get();

        return $query->getResult();
    }

    public function insert_employee($dataEmployee)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('employee')->insert($dataEmployee);
    }
}
