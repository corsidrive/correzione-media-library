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



