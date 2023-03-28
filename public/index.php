<?php

declare(strict_types=1);

use Alura\Mvc\{Controller,
    Controller\DeleteVideoController,
    Controller\EditVideoController,
    Controller\Error404Controller,
    Controller\NewVideoController,
    Controller\VideoFormController,
    Controller\VideoListController,
    Repository\VideoRepository};

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller-> new $controllerClass($videoRepository);
} else {
         $controller = new Error404Controller();
}
/** @var Controller $controller */
$controller->processaRequisicao();
