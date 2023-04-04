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
        $sql = 'INSERT INTO author (nome) VALUES (?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$author->nome);

        $result = $statement->execute();
        $id = $this->pdo->lastInsertId();

        $author->setId(intval($id));
        return $result;
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM author WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();

    }

    public function update(Author $author): bool
    {
        $sql = 'UPDATE videos SET nome = :nome WHERE id = :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':title', $author->title);
        $statement->bindValue(':id', $author->id, PDO::PARAM_INT);
        return $statement->execute();
    }

    /**
     * @return Author[]
     */
    public function all(): array
    {
        $authorList = $this->pdo
            ->query('SELECT * FROM author;')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function (array $authorData) {
                $video = new Video($authorData['url'], $authorData['title']);
                $video->setId($authorData['id']);
                return $video;
            },
            $authorList
        );

    }

    public function find(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM author WHERE id = ?;');
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();

        return $this->hydrateAuthor($statement->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydrateAuthor(array $authorData): Video
    {
        $author = new Video($authorData['url'], $authorData['title']);
        $author->setId($authorData['id']);

        return $author;
    }

}