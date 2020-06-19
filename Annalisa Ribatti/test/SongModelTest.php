<!-- mio -->
<?php
include '../autoload.php';

$song = new Song();
$song->filename = "file";
$song->title = "titolo";
$song->genre_id = 3;
$song->artist_id = 2;

// update
// $song->filename = "FILE";
// $song->title = "TITOLO";
// $song->genre_id = 5;
// $song->artist_id = 4;
// $song->song_id = 1;

$songModel = new SongModel(Db::getInstance());

$ultimo = $songModel->create($song);
echo "create " . $ultimo;

$resO = $songModel->readOne(3);
echo "readOne\n";
print_r($resO);

$res = $songModel->readAll();
echo "readAll\n";
echo "Come oggetti\n";
print_r($res);
echo "Singoli valori contenuti\n";
foreach ($res as $song) {
    echo "\n-----------\n";

    echo $song->filename . "\n";
    echo $song->title . "\n";
    echo $song->genre_id . "\n";
    echo $song->artist_id . "\n";

}

$songModel->update($song);
$res2 = $songModel->readAll();
echo "update\n";
echo "Singoli valori contenuti\n";
echo "@@@@@@@@@\n";
foreach ($res2 as $song) {
    echo "-----------\n";

    echo $song->filename . "\n";
    echo $song->title . "\n";
    echo $song->genre_id . "\n";
    echo $song->artist_id . "\n";
}

$res2 = $songModel->delete(1);
$res3 = $songModel->readAll();
echo "delete\n";
echo "Come oggetti\n";
print_r($res3);