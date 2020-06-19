<?php

class ArtistModel {

    private $pdo ;
    // depedency injection
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(Artist $artist)
    {
      try {
        
        $sql = "INSERT into Artist (name) values (:name)";
        $pdostm = $this->pdo->prepare($sql);
        $pdostm->bindValue(':name',$artist->name);
        

        $pdostm->execute();
        
        return $this->pdo->lastInsertId();

      } catch (PDOException $e) {
         echo $e->getMessage();
      } 
    }

    public function readOne(int $artist_id):?Artist
    {
      // 01 - scrivo query
        $sql = "SELECT * FROM Artist WHERE artist_id = :artist_id;";
      // 02 - prepare della query  
       $stm = $this->pdo->prepare($sql);
       $stm->bindValue(':artist_id',$artist_id);
       // 03 eseguo la query
       $stm->execute();
       
       $res = $stm->fetchAll(PDO::FETCH_CLASS,'Artist');
       
       return count($res) > 0 ?  $res[0] : null ;
    }

    public function readAll():?Array
    {
        $sql="SELECT * FROM Artist"; 
        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        $res = $stm->fetchAll(PDO::FETCH_CLASS,'Artist');
        return count($res) > 0 ? $res : null;
    }

    public function update(Artist $artist)
    {
        $sql = "UPDATE Artist SET name = :name where artist_id = :artist_id";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(":name",$artist->name);
        $stm->bindValue(":artist_id",$artist->artist_id);
        $stm->execute();
        
    } 

    public function delete(int $artist_id)
    {
      $sql = "DELETE from Artist where artist_id=:artist_id";
      $stm = $this->pdo->prepare($sql);
      $stm->bindValue(":artist_id",$artist_id);
      $stm->execute();
      
    }

}