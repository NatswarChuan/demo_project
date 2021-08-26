<?php
namespace App\Models;
class CompanyModel extends Db
{
    public function getCompanies(){
        $sql = parent::$conection->prepare("SELECT * FROM `companies`");
        return parent::select($sql);
    }
}