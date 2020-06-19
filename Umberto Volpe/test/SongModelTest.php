<?php
include '../autoload.php';

$song = new Song();
$song->title = "Ciccio ";
$song->filename = "Ciccio ";
$song->genre_id = 1;
$song->artist_id = 1;

$songModel = new SongModel(Db::getInstance());
$songs = $songModel->create($song);

$res = $songModel->readAll();

foreach ($res as  $song) {
    echo "----------------\n";
    echo $song->filename . "\n";
    echo $song->title . "\n";
    echo $song->artist_id . "\n";
    echo $song->genre_id . "\n";

}

// $artistModel->update($artist);

// $res2 = $artistModel->readAll();

// echo "@@@@@@@@@@@@@@\n";

// foreach ($res2 as  $artista) {
//     echo "----------------\n";
//     echo $artista->name . "\n";

// }



