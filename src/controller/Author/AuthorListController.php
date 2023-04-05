<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller\Author;

use Alura\Mvc\Repository\AuthorRepository;
use Alura\Mvc\Controller\Controller;


class AuthorListController implements Controller
{
    public function __construct(private AuthorRepository $authorRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $authorList = $this->authorRepository->all();

        require_once __DIR__ . '/../../../views/author-list.php';
    }
}