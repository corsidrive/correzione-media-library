<?php

include '../autoload.php';

$artist = new Artist();
$artist -> name = "Linkin Park";

$artistModel = new ArtistModel(Db::getInstance());
$ultimo = $artistModel -> create($artist);

// echo $ultimo;

// $res = $artistModel -> readOne(4);

$res = $artistModel -> readAll();

foreach ($res as  $artista) {
    echo "----------------\n";
    echo $artista -> name ."\n";

}

$artistModel -> update($artist);

$res2 = $artistModel -> readAll();

echo "@@@@@@@@@@@@@@\n";

foreach ($res2 as  $artista) {
    echo "----------------\n";
    echo $artista -> name ."\n";

}