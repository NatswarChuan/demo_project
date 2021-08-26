<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\CompanyModel;
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
}
