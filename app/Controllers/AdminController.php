<?php

namespace App\Controllers;
Use App\Models\UsersModel;

class AdminController extends BaseController
{
    public function index()
    {
        echo view('templates/admin/header');
        echo view('templates/admin/nav');
        echo view('templates/admin/topnav');
        echo view('pages/admin/dashboard');
        echo view('templates/admin/part_footer');
        echo view('templates/admin/footer');
    }

}