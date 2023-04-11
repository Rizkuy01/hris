<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Menu extends Model
{
    protected $table = 'menu';
    protected $useTimestamps = true;
    protected $allowedFields = ['menu_id', 'title', 'url', 'icon'];


    public function list()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('menu');

        $this->builder->select('menu.menu_id as menuid, menu_id, title, url, icon');
        $query = $this->builder->get();

        return $query->getResult();
    }

    public function insert_menu($dataMenu)
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('menu')->insert($dataMenu);
    }

    public function deleteMenu($menuid)
    {
        $query = "DELETE FROM menu WHERE menu_id = $menuid";
        $this->db->query($query);
        redirect('menu/menu');
    }
}
