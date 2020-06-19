<?php

class GenreModel {
    private $pdo ;
    // depedency injection
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(Genre $genre)
    {
      try {
        
        $sql = "INSERT into genre (name,code) VALUES (:name,:code); ";
        $pdostm = $this->pdo->prepare($sql);
        $pdostm->bindValue(':name',$genre->name);
        $pdostm->bindValue(':code',$genre->code);
        

        $pdostm->execute();
        
        return $this->pdo->lastInsertId();

      } catch (PDOException $e) {
         echo $e->getMessage();
      } 
    }
    public function readOne(int $genre_id):?Genre
    {
      // 01 - scrivo query
        $sql = "SELECT * FROM Genre WHERE genre_id = :genre_id;";
      // 02 - prepare della query  
       $stm = $this->pdo->prepare($sql);
       $stm->bindValue(':genre_id',$genre_id);
       // 03 eseguo la query
       $stm->execute();
       
       $res = $stm->fetchAll(PDO::FETCH_CLASS,'Genre');
       
       return count($res) > 0 ?  $res[0] : null ;
    }

    public function readAll():?Array
    {
        $sql="select * from Genre"; 
        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        $res = $stm->fetchAll(PDO::FETCH_CLASS,'Genre');
        return count($res) > 0 ? $res : null;
    }

    public function update(Genre $genre)
    {
        $sql = "UPDATE genre SET name = :name, code = :code where genre_id = :genre_id;";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(":name",$genre->name);
        $stm->bindValue(":code",$genre->code);
        $stm->bindValue(":genre_id",$genre->genre_id);

        $stm->execute();
        
    } 

    public function delete(int $genre_id){

        $sql = "DELETE FROM genre where genre_id = :genre_id";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(":genre_id",$genre_id);
        $stm->execute();
      
  
      }

}