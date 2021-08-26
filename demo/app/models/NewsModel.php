<?php

namespace App\Models;

class NewsModel extends Db
{
    public function getNews($page, $perPage)
    {
        $start = $perPage * ($page - 1);
        $sql = parent::$conection->prepare("SELECT * FROM `posts` JOIN `news` ON `news`.`post_id` = `posts`.`post_id` WHERE`status` = 1 ORDER BY `posts`.`post_date` DESC LIMIT ?,?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    public function getCountNews()
    {
        $sql = parent::$conection->prepare("SELECT COUNT(`posts`.`post_id`) FROM `posts` JOIN `news` ON `news`.`post_id` = `posts`.`post_id` WHERE`status` = 1 ORDER BY `posts`.`post_date`");
        return parent::select($sql)[0]['COUNT(`posts`.`post_id`)'];
    }

    public function getNewsById($id){
        $sql = parent::$conection->prepare("SELECT * FROM `posts` JOIN `news` ON `news`.`post_id` = `posts`.`post_id` WHERE `posts`.`post_id` = ? AND `status` = 1");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
}