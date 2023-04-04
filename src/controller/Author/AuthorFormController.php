<?php

namespace Alura\Mvc\Controller\Author;

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Entity\Author;

class AuthorFormController implements Controller
{

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var ?Author $author */
        $author = null;
        if ($id !== false && $id !== null) {
            $author = $this->repository->find($id);
        }

        require_once __DIR__ . '/../../../views/author-form.php';
    }
}