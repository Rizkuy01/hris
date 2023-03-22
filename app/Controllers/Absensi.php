<?php

namespace App\Controllers;

class Absensi extends BaseController
{
    public function index()
    {
        $data['title'] = date('l, d F Y');
        return view('absensi/index', $data);
    }
    public function rekap()
    {
        $data['title'] = 'Rekap Absensi Bulanan';
        return view('absensi/rekap', $data);
    }

}
