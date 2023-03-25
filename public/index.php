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

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepository);
} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new VideoFormController($videoRepository);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new NewVideoController($videoRepository);
    }
} elseif ($_SERVER['PATH_INFO'] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new VideoFormController($videoRepository);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new EditVideoController($videoRepository);
    }
} elseif ($_SERVER['PATH_INFO'] === '/remover-video') {
    $controller = new DeleteVideoController($videoRepository);
} else {
    $controller = new Error404Controller();
}
/** @var \Alura\Mvc\Controller $controller */
$controller->processaRequisicao();
