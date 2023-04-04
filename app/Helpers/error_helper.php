<?php

use CodeIgniter\Database\BaseBuilder;

function check_access($group, $permission)
{
    $db = \Config\Database::connect();
    $builder = $db->table('auth_groups_permissions');


    $builder->where('group_id', $group);
    $builder->where('permission_id', $permission);
    $query = $builder->get();

    if ($query->getNumRows() > 0) {
        return "checked = 'checked'";
    }
}
