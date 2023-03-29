<?php

declare(strict_types=1);

return [
    'GET|/' => \Alura\Mvc\Controller\video\VideoListController::class,
    'GET|/novo-video' => \Alura\Mvc\Controller\video\VideoFormController::class,
    'POST|/novo-video' => \Alura\Mvc\Controller\video\NewVideoController::class,
    'GET|/editar-video' => \Alura\Mvc\Controller\video\VideoFormController::class,
    'POST|/editar-video' => \Alura\Mvc\Controller\video\EditVideoController::class,
    'GET|/remover-video' => \Alura\Mvc\Controller\video\DeleteVideoController::class,
];