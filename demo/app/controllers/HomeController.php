<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        include_once ROOT_URL.'/app/views/index.php';
    }
}