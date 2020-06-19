<?php

class SongModel {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(Song $song) {
        
        try {
            $sql = "INSERT INTO song (filename, title) VALUES (:filename, :title);";
            
            $pdostm = $this -> pdo -> prepare($sql);
            $pdostm -> bindValue(":filename", $song -> filename);
            $pdostm -> bindValue(":title", $song -> title);
            $pdostm -> execute();

            return $this -> pdo -> lastInsertId();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
         }
    }

    public function readOne(int $song_id):? Song {

        $sql = "SELECT * FROM song WHERE song_id = :song_id;";

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> bindValue(':song_id', $song_id);

        $pdostm -> execute();

        $res = $pdostm -> fetchAll(PDO::FETCH_CLASS, 'Song');

        return count($res) > 0 ? $res[0] : null;
    }

    public function readAll():? Array {

        $sql = "SELECT * FROM song"; 

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> execute();

        $res = $pdostm -> fetchAll(PDO::FETCH_CLASS, 'Song');
        
        return count($res) > 0 ? $res : null;
    }

    public function update(Song $song) {
        
        $sql = "UPDATE song SET filename = :filename, title = :title WHERE song_id = :song_id;";

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> bindValue(":filename", $song -> filename);
        $pdostm -> bindValue(":title", $song -> title);
        $pdostm -> bindValue(":song_id", $song -> song_id);
        $pdostm -> execute();

    }

    public function delete(int $song_id) {

        $sql = "DELETE FROM song WHERE song_id = :song_id;";

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> bindValue(":song_id", $song_id);
        $pdostm -> execute();
    }

}