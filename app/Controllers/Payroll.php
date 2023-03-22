<?php

namespace App\Controllers;

class Payroll extends BaseController
{
    public function index()
    {
        $data['title'] = 'Payroll';
        return view('payroll/index', $data);
    }

}
