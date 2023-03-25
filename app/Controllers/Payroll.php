<?php

namespace App\Controllers;

class Payroll extends BaseController
{
    public function index()
    {
        $data['title'] = 'Payroll';
        return view('templates/404', $data);
    }

}
