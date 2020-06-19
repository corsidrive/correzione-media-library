<?php

class GenreModel {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(Genre $genre) {
        
        try {
            $sql = "INSERT INTO genre (name, code) VALUES (:name, :code);";
            
            $pdostm = $this -> pdo -> prepare($sql);
            $pdostm -> bindValue(":name", $genre -> name);
            $pdostm -> bindValue(":code", $genre -> code);
            $pdostm -> execute();

            return $this -> pdo -> lastInsertId();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
         } 
    }

    public function readOne(int $genre_id):? Genre {

        $sql = "SELECT * FROM genre WHERE genre_id = :genre_id;";

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> bindValue(':genre_id', $genre_id);

        $pdostm -> execute();

        $res = $pdostm -> fetchAll(PDO::FETCH_CLASS, 'Genre');

        return count($res) > 0 ? $res[0] : null;
    }

    public function readAll():? Array {

        $sql = "SELECT * FROM genre"; 

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> execute();

        $res = $pdostm -> fetchAll(PDO::FETCH_CLASS, 'Genre');
        
        return count($res) > 0 ? $res : null;
    }

    public function update(Genre $genre) {
        
        $sql = "UPDATE genre SET name = :name, code = :code WHERE genre_id = :genre_id;";

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> bindValue(":name", $genre -> name);
        $pdostm -> bindValue(":code", $genre -> code);
        $pdostm -> bindValue(":genre_id", $genre -> genre_id);
        $pdostm -> execute();

    }

    public function delete(int $genre_id) {

        $sql = "DELETE FROM genre WHERE genre_id = :genre_id;";

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> bindValue(":genre_id", $genre_id);
        $pdostm -> execute();
    }

}