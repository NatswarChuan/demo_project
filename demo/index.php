<?php
define("ROOT_URL", __DIR__);
define("BASE_URL", "http://127.0.0.1/demo_project/demo");

include_once ROOT_URL.'/app/config/config.php';

spl_autoload_register(function($className) {
    include_once ROOT_URL. '/' . $className . '.php';
});

$router = new Core\Http\Route();

include_once ROOT_URL . '/app/routes.php';

$request_url = !empty($_GET['url']) ? '/' . $_GET['url'] : '/';

$method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
$router->map($request_url, $method_url);