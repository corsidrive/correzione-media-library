<?php

class ArtistModel {

    private $pdo ;

    public function __construct(PDO $pdo) {
      $this->pdo = $pdo;
    }

    public function create(Artist $artist) {
      
      try {
        
        $sql = "INSERT into Artist (name) values (:name);";
        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm->bindValue(':name',$artist->name);
        
        $pdostm->execute();
        
        return $this->pdo->lastInsertId();

      } catch (PDOException $e) {
         echo $e->getMessage();
      } 
    }

    public function readOne(int $artist_id):?Artist {
      
      $sql = "SELECT * FROM artist WHERE artist_id = :artist_id;";
        
      $pdostm = $this -> pdo -> prepare($sql);
      $pdostm -> bindValue(':artist_id',$artist_id);
  
      $pdostm -> execute();
       
      $res = $pdostm -> fetchAll(PDO::FETCH_CLASS, 'Artist');
       
      return count($res) > 0 ? $res[0] : null ;
    }

    public function readAll():?Array
    {
        $sql = "SELECT * FROM artist"; 

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> execute();

        $res = $pdostm -> fetchAll(PDO::FETCH_CLASS, 'Artist');

        return count($res) > 0 ? $res : null;
    }

    public function update(Artist $artist)
    {
        $sql = "UPDATE artist SET name = :name WHERE artist_id = :artist_id";

        $pdostm = $this -> pdo -> prepare($sql);
        $pdostm -> bindValue(":name", $artist -> name);
        $pdostm -> bindValue(":artist_id", $artist -> artist_id);
        $pdostm -> execute();
        
    } 

    public function delete(int $artist_id) {

      $sql = "DELETE FROM artist WHERE artist_id = :artist_id;";

      $pdostm = $this -> pdo -> prepare($sql);
      $pdostm -> bindValue(":artist_id", $artist_id);
      $pdostm -> execute();
  }

}