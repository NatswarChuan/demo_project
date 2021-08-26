<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\CategoryModel;
use App\Models\CompanyModel;
use App\Models\TienIch;

class NewsController
{
    public function index($page = 1)
    {
        $perPage = 4;
        $newsModel = new NewsModel();
        $news = $newsModel->getNews($page, $perPage);
        $count = $newsModel->getCountNews();
        $pagination = TienIch::Pagination($page, $perPage, $count, BASE_URL . '/tin-tuc/trang-');

        include_once ROOT_URL . '/app/views/blog-post-list.php';
    }

    public function getNews($name)
    {
        $newsModel = new NewsModel();

        $names = explode('-', $name);
        $id = $names[count($names) - 1];

        $news = $newsModel->getNewsById($id);

        TienIch::updateViews($news);
        
        include_once ROOT_URL . '/app/views/blog-post.php';
    }
}