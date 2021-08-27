<?php

namespace App\Models;

class OrderModel extends Db
{
    public function createOrder($price, $address, $products, $orderCreate)
    {
        $sql = parent::$conection->prepare("INSERT INTO `orders`( `order_price`, `order_address`, `order_products`, `order_create`) VALUES (?,?,?,?)");
        $sql->bind_param('dsss', $price, $address , $products, $orderCreate);
        $sql->execute();
    }

    public function checkOrder($orderCreate)
    {
        $sql = parent::$conection->prepare("SELECT * FROM `orders` WHERE `order_create` = ?");
        $sql->bind_param('s', $orderCreate);
        return (count(parent::select($sql)) == 0);
    }
}
