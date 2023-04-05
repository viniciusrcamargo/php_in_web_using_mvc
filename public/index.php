<?php

declare(strict_types=1);

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Controller\Video\VideoListController;
use Alura\Mvc\Controller\Video\DeleteVideoController;
use Alura\Mvc\Controller\Video\EditVideoController;
use Alura\Mvc\Controller\Error404Controller;
use Alura\Mvc\Controller\Video\NewVideoController;
use Alura\Mvc\Controller\Video\VideoFormController;
use Alura\Mvc\Controller\Author\AuthorListController;
use Alura\Mvc\Controller\Author\NewAuthorController;
use Alura\Mvc\Controller\Author\AuthorFormController;
use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Repository\AuthorRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');
$videoRepository = new VideoRepository($pdo);
$authorRepository = new AuthorRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];
$key = "$httpMethod|$pathInfo";

/*var_dump(str_contains($pathInfo, 'listar-autor'));
exit();*/

if (array_key_exists($key, $routes)) {
   $controllerClass = $routes["$httpMethod|$pathInfo"];
   if(str_contains($pathInfo, "/")){
       $controller = new $controllerClass($videoRepository);
   }else if(str_contains($pathInfo, 'listar-autor')){
       echo 'entrei aqui';
       exit();
       $controller = new $controllerClass($authorRepository);
   }
}else {
    $controller = new Error404Controller();
}
/** @var Controller $controller */
$controller->processaRequisicao();
