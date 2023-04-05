<?php

namespace Alura\Mvc\Controller\Author;

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Repository\AuthorRepository;
use Alura\Mvc\Entity\Author;

class NewAuthorController implements Controller
{
    public function __construct(private AuthorRepository $authorRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $nome = filter_input(INPUT_POST, 'nome');
        if ($nome === false) {
            header('Location: /?sucesso=0');
            return;
        }
        var_dump($nome);
        $success = $this->authorRepository->add(new Author($nome));
        if ($success === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}