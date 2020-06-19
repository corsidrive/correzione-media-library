<?php
include '../autoload.php';

$genre = new Genre();
// $genre->name = "rock";
// $genre->code = "17";

$genre->name = "bluse";
$genre->code = "00";
$genre->genre_id = 1;

$genreModel = new GenreModel(Db::getInstance());

$ultimo = $genreModel->create($genre);
echo "create " . $ultimo;

$resO = $genreModel->readOne(3);
echo "readOne\n";
print_r($resO);

$res = $genreModel->readAll();
echo "readAll\n";
echo "Come oggetti\n";
print_r($res);
echo "Singoli valori contenuti\n";
foreach ($res as $genere) {
    echo "\n-----------\n";

    echo $genere->name . "\n";
    echo $genere->code . "\n";
}

$genreModel->update($genre);
$res2 = $genreModel->readAll();
echo "update\n";
echo "Singoli valori contenuti\n";
echo "@@@@@@@@@\n";
foreach ($res2 as $genere) {
    echo "-----------\n";

    echo $genere->name . "\n";
    echo $genere->code . "\n";
}

$res2 = $genreModel->delete(1);
$res3 = $genreModel->readAll();
echo "delete\n";
echo "Come oggetti\n";
print_r($res3);