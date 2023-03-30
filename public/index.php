<?php

declare(strict_types=1);

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Controller\Video\VideoListController;
use Alura\Mvc\Controller\Video\DeleteVideoController;
use Alura\Mvc\Controller\Video\EditVideoController;
use Alura\Mvc\Controller\Error404Controller;
use Alura\Mvc\Controller\Video\NewVideoController;
use Alura\Mvc\Controller\Video\VideoFormController;
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];
//var_dump($httpMethod);
$key = "$httpMethod|$pathInfo";

//var_dump(array_key_exists($key, $routes));

if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllerClass($videoRepository);
} else {
    $controller = new Error404Controller();
}
/** @var Controller $controller */
$controller->processaRequisicao();
