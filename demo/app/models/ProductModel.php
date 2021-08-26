<?php

namespace App\Models;

class ProductModel extends Db
{
    public function getProducts($page, $perPage)
    {
        $start = $perPage * ($page - 1);
        $sql = parent::$conection->prepare("SELECT * FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` WHERE`status` = 1 ORDER BY `posts`.`post_date` DESC LIMIT ?,?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    public function getCountProducts()
    {
        $sql = parent::$conection->prepare("SELECT COUNT(`posts`.`post_id`) FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` WHERE`status` = 1 ORDER BY `posts`.`post_date`");
        return parent::select($sql)[0]['COUNT(`posts`.`post_id`)'];
    }

    public function getProductById($id)
    {
        $sql = parent::$conection->prepare("SELECT * FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` WHERE `posts`.`post_id` = ? AND `status` = 1");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    public function getRelatedProducts($id, $count)
    {
        $sql = parent::$conection->prepare("SELECT * FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` WHERE `products`.`company_id` = ? AND `status` = 1 ORDER BY `posts`.`post_date` DESC LIMIT ?");
        $sql->bind_param('ii', $id, $count);
        return parent::select($sql);
    }

    public function getProductsByCategoryId($id, $page, $perPage)
    {
        $start = $perPage * ($page - 1);
        $sql = parent::$conection->prepare("SELECT * FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` JOIN `categories_products` ON `categories_products`.`product_id` = `products`.`product_id` WHERE `categories_products`.`category_id` = ? AND `status` = 1 ORDER BY `posts`.`post_date` DESC LIMIT ?,?");
        $sql->bind_param('iii', $id, $start, $perPage);
        return parent::select($sql);
    }

    public function getCountProductsByCategoryId($id)
    {
        $sql = parent::$conection->prepare("SELECT COUNT(`posts`.`post_id`) FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` JOIN `categories_products` ON `categories_products`.`product_id` = `products`.`product_id` WHERE `categories_products`.`category_id` = ? AND `status` = 1 ORDER BY `posts`.`post_date`");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0]['COUNT(`posts`.`post_id`)'];
    }

    public function getProductsByCompanyId($id, $page, $perPage)
    {
        $start = $perPage * ($page - 1);
        $sql = parent::$conection->prepare("SELECT * FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` JOIN `companies` on `companies`.`company_id` = `products`.`company_id` WHERE `companies`.`company_id` = ? AND `status` = 1 ORDER BY `posts`.`post_date` DESC LIMIT ?,?");
        $sql->bind_param('iii', $id, $start, $perPage);
        return parent::select($sql);
    }

    public function getCountProductsByCompanyId($id)
    {
        $sql = parent::$conection->prepare("SELECT COUNT(`posts`.`post_id`) FROM `products` JOIN `posts` on `posts`.`post_id` = `products`.`post_id` JOIN `companies` on `companies`.`company_id` = `products`.`company_id` WHERE `companies`.`company_id` = ? AND `status` = 1 ORDER BY `posts`.`post_date`");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0]['COUNT(`posts`.`post_id`)'];
    }
}
