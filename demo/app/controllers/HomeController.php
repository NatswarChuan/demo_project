<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        include_once ROOT_URL.'/app/views/index.php';
    }

    public function admin()
    {
        include_once ROOT_URL.'/app/views/admin/table.php';
    }

    public function login()
    {
        include_once ROOT_URL.'/app/views/admin/login.php';
    }
}