<?php

class GenreModel
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Genre $genre)
    {

        try {

            $sql = "insert into Genre(name, code) values(:name, :code);";

            $pdostm = $this->pdo->prepare($sql);

            $pdostm->bindValue(':name', $genre->name);
            $pdostm->bindValue(':code', $genre->code);

            $pdostm->execute();

            return $this->pdo->lastInsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function readOne(int $genre_id): ?Genre
    {

        $sql = "select * from Genre where genre_id = :genre_id;";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':genre_id', $genre_id);

        $stm->execute();

        $res = $stm->fetchAll(PDO::FETCH_CLASS, 'Genre');

        return count($res) > 0 ? $res[0] : null;

    }

    public function readAll(): ?array
    {

        $sql = "select * from Genre;";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $res = $stm->fetchAll(PDO::FETCH_CLASS, 'Genre');

        return count($res) > 0 ? $res : null;

    }

    public function update(Genre $genre)
    {

        $sql = "update Genre set name = :name, code = :code where genre_id = :genre_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(":name", $genre->name);
        $stm->bindValue(":code", $genre->code);
        $stm->bindValue(":genre_id", $genre->genre_id);
        $stm->execute();

    }

    public function delete(int $genre_id)
    {

        $sql = "delete from Genre where genre_id = :genre_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(":genre_id", $genre_id);
        $stm->execute();

    }

}
