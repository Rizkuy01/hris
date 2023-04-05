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

function check_role_menu($menuid)
{
    $db = \Config\Database::connect();
    $builder = $db->table('auth_groups_permissions');

    $builder->select('auth_groups.name');
    $builder->where('permission_id', $menuid);
    $builder->join('auth_groups', 'auth_groups.id = auth_groups_permissions.group_id');
    $query = $builder->get();

    // $string = implode($query->getResultArray());

    $result = $query->getResult();
    $newArray = [];
    foreach ($result as $row) {
        $newArray = $row->name;
    }

    return $newArray;
}
