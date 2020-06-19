<?php
include '../autoload.php';

$genre = new Genre();
$genre->genre_id =19;
$genre->code = 06;
$genre->name = "Latino Americano";

$genreModel = new GenreModel(Db::getInstance());
$genreModel->create($genre);

//$res = $genreModel->readOne();
$res = $genreModel->readAll();

foreach ($res as  $genere) {
    echo "----------------\n";
    echo $genere->name . "\n";
    echo $genere->code . "\n";

} 

/* $genreModel->update($genre);

$res2 = $genreModel->readAll();

foreach ($res2 as  $genre) {
    echo "################\n";
    echo $genre->name . "\n"; 
    echo $genre->code . "\n"; 
} */

//$genreModel->delete($genre->genre_id);

