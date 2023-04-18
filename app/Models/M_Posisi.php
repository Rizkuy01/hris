<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Posisi extends Model
{
    protected $table = 'position';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name', 'division'];

    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('position');

        $this->builder->select(
            'position.name as title,
            position.division as div,
            divisi.name as posisi'
        );
        $this->builder->join('divisi', 'divisi.id = position.division');
        $query = $this->builder->get();

        return $query->getResult();
    }

    public function insert_posisi($dataPosisi)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('position')->insert($dataPosisi);
    }
}
