<?php

namespace App\Controllers;

class Menu extends BaseController
{
    protected $db, $builder, $menuModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('menu');
        $this->menuModel = new \App\Models\M_Menu();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';

        $menu = $this->menuModel->list();
        $data['menu'] = $menu;

        return view('menu/menu', $data);
    }

    public function add_menu()
    {
        $data = [
            'title' => 'Add new Menu',
        ];

        helper('form');

        if (!$this->request->is('post')) {
            return view('menu/addmenu', $data);
        }

        $post = $this->request->getPost(['menu_id', 'title', 'url', 'icon']);

        if (!$this->validateData($post, [
            'title'     => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'url'       => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'icon'      => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataMenu = [
            'title' => $post['title'],
            'url'   => $post['url'],
            'icon'  => $post['icon'],
        ];
        $this->menuModel->insert_menu($dataMenu);
        return redirect('menu/menu')->with('success', 'Menu Added Successfully');
    }

    public function delete($menuid)
    {
        $this->menuModel->deleteMenu($menuid);
        return redirect('menu/menu');
    }
}
