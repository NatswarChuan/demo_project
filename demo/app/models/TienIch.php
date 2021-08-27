<?php

namespace App\Models;

class TienIch
{
    static function Pagination($page, $perPage, $count, $linkPage)
    {
        $result = '<ul class="pagination">';
        $previous = '<li class="page-item"><a class="page-link" href="' . $linkPage . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
        $next = '<li class="page-item"><a class="page-link" href="' . $linkPage . ($page + 1) . '" aria-label="Next"><span aria-hidden="true">»</span></a></li>';

        if ($page == 1) {
            $previous = '<li class="page-item disabled"><a class="page-link" href="' . $linkPage . '" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
        }
        if ((($page * $perPage) - $count) >= 0) {
            $next = '<li class="page-item disabled"><a class="page-link" href="' . $linkPage . '" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
        }

        $result .= $previous;
        for ($i = 1; $i <= (int)(($count / $perPage) + 1); $i++) {
            if ($i == $page) {
                $result .= '<li class="page-item active"><a class="page-link" href="' . $linkPage . $i . '">' . $i . '</a></li>';
                continue;
            }
            $result .= '<li class="page-item"><a class="page-link" href="' . $linkPage . $i . '">' . $i . '</a></li>';
        }

        $result .= $next;
        $result .= '</ul>';

        return $result;
    }

    static function vn_to_str($str)
    {

        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', '-', $str);

        return $str;
    }

    static function updateViews($post)
    {
        if (empty($_SESSION['view-' . $post['post_id']])) {
            $postModel = new PostModel();
            $_SESSION['view-' . $post['post_id']] = 1;
            $postModel->updateViews($post['post_id'], ($post['post_view'] + 1), $post['last_update']);
        }
    }

    static function checkCart($product, $cart)
    {
        $result = false;
        foreach ($cart as $item) {
            if ($product['post_id'] == $item['post_id']) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    static function getTotalPrice($cart)
    {
        $result = 0;
        foreach ($cart as $item) {
            $result += $item['product_price'];
        }
        return $result;
    }

    static function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
            $ipaddress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {

            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }

    static function getProductIdCart($cart){
        $result = '';
        $products = [];
        foreach ($cart as $item) {
            $products = array_merge($products,[$_POST["quantityPrice".$item['post_id']]]);  
        }
        $result = implode(',', $products);
        return $result;
    }
}
