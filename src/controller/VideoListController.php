<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;
use PDO;

class VideoListController
{
    private VideoRepository $videoRepository;
    public function __construct()
    {
        $pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');
        $repository = new Alura\Mvc\Repository\VideoRepository($pdo);
        $this->videoRepository = new VideoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();

    }

}