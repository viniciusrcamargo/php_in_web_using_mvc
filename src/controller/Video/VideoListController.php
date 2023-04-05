<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller\Video;

use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\Controller;

class VideoListController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();

        require_once __DIR__ . '/../../../views/Video-list.php';
    }

}