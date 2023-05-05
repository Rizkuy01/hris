<?php

namespace App\Controllers;

class Payroll extends BaseController
{
    public function index()
    {
        $data['title'] = 'Loren Ipsum';
        return view('templates/404', $data);
    }
}
