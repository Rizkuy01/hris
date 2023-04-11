<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Divisi extends Model
{
    protected $table = 'divisi';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name', 'email'];

    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('divisi');

        $this->builder->select('id, name, email');
        $query = $this->builder->get();

        return $query->getResult();
    }
}
