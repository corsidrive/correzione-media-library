<?php
include '../autoload.php';

// ---------- CREATE - FUNZIONA!!!

// $genre1 = new Genre();
// $genre1 -> name = "Skate Punk";
// $genre1 -> code = "152";
// $genre1 -> genre_id = 2;

// $genre2 = new Genre();
// $genre2 -> name = "Alternative Rock";
// $genre2 -> code = "023";
// $genre2 -> genre_id = 2;

// $genreModel = new GenreModel(Db::getInstance());
// $genreModel -> create($genre1);
// $genreModel -> create($genre2);


// ----------- READ ONE - NON FUNZIONA

$genreModel = new GenreModel(Db::getInstance());
$one = $genreModel -> readOne(1);

echo $one;


// --------- READ ALL - FUNZIONA!!!

// $genreModel = new GenreModel(Db::getInstance());
// $res = $genreModel -> readAll();

// foreach ($res as  $genere) {
//     echo "----------------\n";
//     echo "id: ". $genere -> genre_id ." - ";
//     echo "cod: ". $genere -> code ." - ";
//     echo $genere -> name ."\n";
// }
    
    
// --------- UPDATE - FUNZIONA!!!

// $genre = new Genre();
// $genre -> name = "Heavy Metal";
// $genre -> code = "084";
// $genre -> genre_id = 2;

// $genreModel = new GenreModel(Db::getInstance());
// $res1 = $genreModel -> readAll();

// foreach ($res1 as  $genere) {
//     echo "----------------\n";
//     echo "id: ". $genere -> genre_id ." - ";
//     echo "cod: ". $genere -> code ." - ";
//     echo $genere -> name ."\n";

// }

// $genreModel -> update($genre);

// echo "@@@@@@@@@@@@@@\n";

// $res2 = $genreModel -> readAll();

// foreach ($res2 as  $genere) {
//     echo "----------------\n";
//     echo "id: ". $genere -> genre_id ." - ";
//     echo "cod: ". $genere -> code ." - ";
//     echo $genere -> name ."\n";
// }


// --------- DELETE - FUNZIONA!!!

// $genre = new Genre();
// $genre -> genre_id = 2;

// $genreModel = new GenreModel(Db::getInstance());

// $result = $genreModel -> readAll();

// foreach ($result as  $genere) {
//     echo "----------------\n";
//     echo "id: ". $genere -> genre_id ." - ";
//     echo "cod: ". $genere -> code ." - ";
//     echo $genere -> name ."\n";
// }

// echo "@@@@@@@@@@@@@@\n";

// $genreModel -> delete(4);

// $resultWithDelete = $genreModel -> readAll();

// foreach ($resultWithDelete as  $genere) {
//     echo "----------------\n";
//     echo "id: ". $genere -> genre_id ." - ";
//     echo "cod: ". $genere -> code ." - ";
//     echo $genere -> name ."\n";
// }

?>