<?php

namespace Alura\Mvc\Repository;
use Alura\Mvc\Entity\Author;
use PDO;

class AuthorRepository
{
    public function __construct(private PDO $pdo)
    {

    }

    public function add(Author $author): bool
    {
        $sql = 'INSERT INTO authors (nome) VALUES (?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$author->nome);

        $result = $statement->execute();
        $id = $this->pdo->lastInsertId();

        $author->setId(intval($id));
        return $result;
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM authors WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();

    }

    public function update(Author $author): bool
    {
        $sql = 'UPDATE authors SET nome = :nome WHERE id = :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':nome', $author->nome);
        $statement->bindValue(':id', $author->id, PDO::PARAM_INT);
        return $statement->execute();
    }

    /**
     * @return Author[]
     */
    public function all(): array
    {
        $authorList = $this->pdo
            ->query('SELECT * FROM authors;')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function (array $authorData) {
                $author = new Author($authorData['nome']);
                $author->setId($authorData['id']);
                return $author;
            },
            $authorList
        );

    }

    public function find(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM authors WHERE id = ?;');
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();

        return $this->hydrateAuthor($statement->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydrateAuthor(array $authorData): Author
    {
        $author = new Author($authorData['nome']);
        $author->setId($authorData['id']);

        return $author;
    }

}