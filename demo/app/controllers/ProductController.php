<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\CompanyModel;
use App\Models\OrderModel;
use App\Models\TienIch;

class ProductController
{
    public function index($page = 1)
    {
        $this->getProductsRelate($productModel, $categories, $companies, $perPage);
        $products = $productModel->getProducts($page, $perPage);
        $count = $productModel->getCountProducts();
        $pagination = TienIch::Pagination($page, $perPage, $count, BASE_URL . '/san-pham/trang-');

        include_once ROOT_URL . '/app/views/product-list.php';
    }

    public function getProduct($name)
    {
        $productModel = new ProductModel();

        $names = explode('-', $name);
        $id = $names[count($names) - 1];

        $product = $productModel->getProductById($id);

        TienIch::updateViews($product);

        $relatedProducts = $productModel->getRelatedProducts($product['company_id'], 3);
        include_once ROOT_URL . '/app/views/product-page.php';
    }

    public function getProductsCategory($name, $page = 1)
    {
        $names = explode('-', $name);
        $id = $names[count($names) - 1];
        $this->getProductsRelate($productModel, $categories, $companies, $perPage);
        $products = $productModel->getProductsByCategoryId($id, $page, $perPage);
        $count = $productModel->getCountProductsByCategoryId($id);
        $pagination = TienIch::Pagination($page, $perPage, $count, BASE_URL . "/mat-hang/$name/trang-");
        include_once ROOT_URL . '/app/views/product-list.php';
    }

    public function getProductsCompany($name, $page = 1)
    {
        $names = explode('-', $name);
        $id = $names[count($names) - 1];
        $this->getProductsRelate($productModel, $categories, $companies, $perPage);
        $products = $productModel->getProductsByCompanyId($id, $page, $perPage);
        $count = $productModel->getCountProductsByCompanyId($id);
        $pagination = TienIch::Pagination($page, $perPage, $count, BASE_URL . "/mat-hang/$name/trang-");
        include_once ROOT_URL . '/app/views/product-list.php';
    }

    private function getProductsRelate(&$productModel, &$categories, &$companies, &$perPage)
    {
        $perPage = 9;
        $categoryModel = new CategoryModel();
        $companyModel = new CompanyModel();
        $productModel = new ProductModel();

        $categories = $categoryModel->getCategories();
        $companies = $companyModel->getCompanies();
    }

    public function searchProducts($page = 1)
    {
        if (empty($_POST['search'])) {
            $search = $_COOKIE['search'];
        } else {
            $search = $_POST['search'];
            setcookie('search', $_POST['search'], time() + 3600);
        }

        $this->getProductsRelate($productModel, $categories, $companies, $perPage);
        $products = $productModel->getProductsSearch($search, $page, $perPage);
        $count = $productModel->getCountProductsSearch($search);
        $pagination = TienIch::Pagination($page, $perPage, $count, BASE_URL . "/tim-kiem/trang-");
        include_once ROOT_URL . '/app/views/product-list.php';
    }

    public function cartProducts()
    {
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $cart = $_SESSION['cart'];

        $total = TienIch::getTotalPrice($cart);

        include_once ROOT_URL . '/app/views/cart.php';
    }

    public function addToCart($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
            $orderCreate = TienIch::get_client_ip() . microtime();
            $_SESSION['cart-time'] = $orderCreate;
        }
        
        if (!TienIch::checkCart($product, $_SESSION['cart'])) {
            $_SESSION['cart'] = array_merge($_SESSION['cart'], [$product]);
        }

        header("Location: " . BASE_URL . '/san-pham/' . TienIch::vn_to_str($product['post_title']) . '-' . $product['post_id']);
    }

    public function checkOut()
    {
        $orderModel = new OrderModel();
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        var_dump($_POST);

        $cart = $_SESSION['cart'];

        $price = TienIch::getTotalPrice($cart);
        $address = $_POST['address'];
        $products = Tienich::getProductIdCart($cart);

        $orderCreate = $_SESSION['cart-time'];

        if ($orderModel->checkOrder($orderCreate)) {
            $orderModel->createOrder($price, $address, $products, $orderCreate);
        }
        $_SESSION['cart'] = null;
        $_SESSION['cart-time'] = null;
        header("Location: ".BASE_URL . '/san-pham');
    }
}
