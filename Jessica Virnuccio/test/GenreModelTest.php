<?php
include '../autoload.php';

$genre = new Genre();
$genre->name = "pop";
$genre->genre_id = 2;

$genre->code = 974374;

$genreModel = new GenreModel(Db::getInstance());


$rock = $genreModel->create($genre);

 $res = $genreModel->readOne(2);

$res = $genreModel->readAll();

foreach ($res as  $genre) {
    echo "----------------\n";
    echo $genre->name . "\n";

}

$genreModel->update($genre);

$res2 = $genreModel->readAll();

echo "@@@@@@@@@@@@@@\n";

foreach ($res2 as  $genre) {
    echo "----------------\n";
    echo $genre->name . "\n";

}

$res3 = $genreModel->delete(2);