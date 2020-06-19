<?php
include_once '../autoload.php';

$songModel = new SongModel(Db::getInstance());
$songlist = $songModel->readAll();


View::render('song_index_view', ['canzoni' => $songlist ]);

View::render('footer');?>