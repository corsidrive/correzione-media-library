<?php

class SongModel {
    private $pdo ;   

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    public function create(Song $song) {
        try {
            $sql = "INSERT INTO Song (filename, title, genre_id, artist_id) VALUES (:filename, :title, :genre_id, :artist_id);";

            $pdostm = $this->pdo->prepare($sql);

            $pdostm->bindValue(':filename',$song->filename);
            $pdostm->bindValue(':title',$song->title);
            $pdostm->bindValue(':genre_id',$song->genre_id);
            $pdostm->bindValue(':artist_id',$song->artist_id);
            

            $pdostm->execute();

            return $this->pdo->lastInsertId();   

        } catch (PDOException $e) {
            echo $e->getMessage();
        }   
    }

    public function readOne(int $song_id) :?Song {
        $sql = "SELECT * FROM Song WHERE song_id = :song_id;";
        /* $sql = "SELECT song_id, filename, title, ge.name 
        AS nameGenre, ar.name AS nameArtist 
        FROM song AS so LEFT JOIN Genre 
        AS ge ON so.genre_id=ge.genre_id 
        LEFT JOIN Artist AS ar 
        ON so.artist_id= ar.artist_id;"; */

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':song_id', $song_id);

        $stm->execute();

        $res = $stm->fetchAll(PDO::FETCH_CLASS, 'Song');

        return count($res) > 0 ? $res[0] : null;
    }

    public function readAll() :?Array {
        $sql = "SELECT * FROM Song;";
       /*  $sql = "SELECT song_id, filename, title, ge.name 
        AS nameGenre, ar.name AS nameArtist 
        FROM song AS so LEFT JOIN Genre 
        AS ge ON so.genre_id=ge.genre_id 
        LEFT JOIN Artist AS ar 
        ON so.artist_id= ar.artist_id;"; */

        $stm = $this->pdo->prepare($sql);

        // non devo associare valori a query

        $stm->execute();

        $res =  $stm->fetchAll(PDO::FETCH_CLASS, 'Song');

        return count($res) > 0 ? $res : null;
    }

    public function update(Song $song) {
        $sql = "UPDATE Song SET filename  = :filename, title  = :title, genre_id  = :genre_id, artist_id  = :artist_id  WHERE song_id = :song_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':filename',$song->filename);
        $stm->bindValue(':title',$song->title);
        $stm->bindValue(':genre_id',$song->genre_id); 
        $stm->bindValue(':artist_id',$song->artist_id);
            
        $stm->bindValue(':song_id', $song->song_id);
        
        $stm->execute();
    }

    public function delete(int $song_id)
    {
        $sql = "DELETE  FROM Song WHERE song_id = :song_id";

        $stm = $this->pdo->prepare($sql);

        $stm->bindValue(':song_id', $song_id);

        $stm->execute();
    }
}