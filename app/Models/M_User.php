<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;


    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        return $query->getResult();
    }
}
