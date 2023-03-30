<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller\Video;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\Controller;

class VideoFormController implements Controller
{
    public function __construct(private VideoRepository $repository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var ?Video $video */
        $video = null;
        if ($id !== false && $id !== null) {
            $video = $this->repository->find($id);
        }

        require_once __DIR__ . '/../../../views/Video-form.php';
    }
}