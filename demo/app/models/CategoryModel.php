<?php
namespace App\Models;
class CategoryModel extends Db
{
    public function getCategories(){
        $sql = parent::$conection->prepare("SELECT * FROM `categories` WHERE`status` = 1");
        return parent::select($sql);
    }
}