<?php

namespace App\Controllers;

class Employee extends BaseController
{
    public function index()
    {
        $data['title'] = 'Employees List';
        return view('admin/employee', $data);
    }

}