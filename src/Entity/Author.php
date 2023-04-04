<?php

namespace Alura\Mvc\Entity;

class Author
{
    public readonly int $id;
    public readonly string $nome;

    public function __construct(string $nome)
    {

    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}