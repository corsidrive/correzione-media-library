<?php
include '../autoload.php';

$song = new Song();
$song->title = "Ciccio4 ";
$song->filename = "Ciccio4 ";
$song->genre_id = 2;
$song->artist_id = 2;


$songModel = new SongModel(Db::getInstance());
// $songs = $songModel->create($song);

// $res = $songModel->readAll();

// foreach ($res as  $song) {
//     echo "----------------\n";
//     echo $song->filename . "\n";
//     echo $song->title . "\n";
//     echo $song->artist_id . "\n";
//     echo $song->genre_id . "\n";

// }

$songModel->update($song);


$res2 = $songModel->readAll();

echo "@@@@@@@@@@@@@@\n";

foreach ($res2 as  $canzone) {
    echo "----------------\n";
    echo $canzone->filename . "\n";
    echo $canzone->song_id. "\n";
    echo $canzone->title . "\n";
    echo $canzone->artist_id . "\n";
    echo $canzone->genre_id . "\n";

}



