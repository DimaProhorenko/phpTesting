<?php

use app\App;
use app\Container;
use app\Core\Router;

const BASE_PATH = __DIR__;
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/app/helpers/utils.php';


$app = new App();

$router = new Router();
require __DIR__ . '/routes.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
