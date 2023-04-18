<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'email', 'role', 'password_hash'];

    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');

        $this->builder->select('users.id as userid, username, email, name, user_image, password_hash');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        return $query->getResult();
    }

    public function insert_user($dataUser)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users')->insert($dataUser);

        $idUser = $this->db->insertID();

        $this->insert_role($idUser);
    }
    public function insert_role($idUser)
    {
        $this->db = \Config\Database::connect();
        $data = [
            'group_id' => 2,
            'user_id' => $idUser
        ];
        $this->builder = $this->db->table('auth_groups_users')->insert($data);

        $insert = $this->builder;
        return $insert;
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = $id";
        $this->db->query($query);
        redirect('admin/index');
    }
}
