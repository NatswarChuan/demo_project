<?php 

$router->get('/', 'HomeController@index');

$router->get('/san-pham/trang-{page}', 'ProductController@index');
$router->get('/san-pham', 'ProductController@index');

$router->get('/san-pham/{id}', 'ProductController@getProduct');


$router->get('/mat-hang/{id}/trang-{page}', 'ProductController@getProductsCategory');
$router->get('/mat-hang/{id}', 'ProductController@getProductsCategory');

$router->get('/cong-ty/{id}/trang-{page}', 'ProductController@getProductsCompany');
$router->get('/cong-ty/{id}', 'ProductController@getProductsCompany');

$router->get('/tin-tuc', 'NewsController@index');
$router->get('/tin-tuc/trang-{page}', 'NewsController@index');

$router->get('/tin-tuc/{id}', 'NewsController@getNews');

$router->post('/tim-kiem', 'ProductController@searchProducts');
$router->post('/tim-kiem/trang-{page}', 'ProductController@searchProducts');
$router->get('/tim-kiem', 'ProductController@searchProducts');
$router->get('/tim-kiem/trang-{page}', 'ProductController@searchProducts');

$router->get('/gio-hang', 'ProductController@cartProducts');
$router->get('/add-to-cart/{id}', 'ProductController@addToCart');

$router->post('/check-out', 'ProductController@checkOut');

$router->get('/admin/', 'HomeController@admin');
$router->get('/admin', 'HomeController@admin');

$router->get('/admin/dang-nhap', 'UserController@login');

$router->post('/admin/check-user', 'UserController@checkUser');
