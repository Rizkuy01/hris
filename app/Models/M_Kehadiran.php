<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kehadiran extends Model
{
    protected $db, $builder;
    protected $table = 'kehadiran';
    protected $useTimeStamps = true;
    protected $allowedFields = [
        'id',
        'nama',
        'position',
        'divisi',
        'lokasi',
        'waktu',
    ];

    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kehadiran');

        $this->builder->select('kehadiran.id as idabsen, nama, position, divisi, lokasi, waktu');
        $query = $this->builder->get();
        return $query->getResult();
    }

    public function insert_absen($dataAbsen)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('kehadiran')->insert($dataAbsen);
    }
}
