<?php
namespace App\Controllers;

class UserController
{
    public function login()
    {
        include_once ROOT_URL.'/app/views/admin/login.php';
    }

    public function checkUser()
    {
        var_dump($_POST);
        //include_once ROOT_URL.'/app/views/admin/login.php';
    }
    
}