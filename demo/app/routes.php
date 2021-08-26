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
