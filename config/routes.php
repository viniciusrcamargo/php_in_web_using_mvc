<?php

declare(strict_types=1);

return [
    'GET|/' => \Alura\Mvc\Controller\Video\VideoListController::class,
    'GET|/novo-video' => \Alura\Mvc\Controller\Video\VideoFormController::class,
    'POST|/novo-video' => \Alura\Mvc\Controller\Video\NewVideoController::class,
    'GET|/editar-video' => \Alura\Mvc\Controller\Video\VideoFormController::class,
    'POST|/editar-video' => \Alura\Mvc\Controller\Video\EditVideoController::class,
    'GET|/remover-video' => \Alura\Mvc\Controller\Video\DeletarVideoController::class,
    'POST|/novo-autor' => \Alura\Mvc\Controller\Author\NewAuthorController::class,
    'GET|/novo-autor' => \Alura\Mvc\Controller\Author\AuthorFormController::class,
    'GET|/listar-autor' => \Alura\Mvc\Controller\Author\AuthorListController::class,
];