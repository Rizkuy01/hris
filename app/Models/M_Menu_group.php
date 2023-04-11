<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Menu_group extends Model
{
    protected $table = 'groups_menu';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'menu'];

    public function get_menu()
    {
        $query = "SELECT `menu` .*, `groups_menu`.`menu`
                    FROM `menu` JOIN `menu`
                    ON `menu`.`menu_id` = `groups_menu`.`id`
                    ";
        return $this->db->query($query)->getResultArray();
    }
}
