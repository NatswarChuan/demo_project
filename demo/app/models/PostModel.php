<?php

namespace App\Models;

class PostModel extends Db
{
    public function updateViews($id, $view, $last_update)
    {
        $update = ($last_update + 1);
        $sql = parent::$conection->prepare("UPDATE `posts` SET `post_view`= ?,`last_update`= ? WHERE `post_id` = ? AND `last_update` = ?");
        $sql->bind_param('iiii', $view, $update , $id, $last_update);
        $sql->execute();
    }
}
