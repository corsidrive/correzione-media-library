<?php
include_once '../autoload.php';

$genreModel = new GenreModel(Db::getInstance());
$genrelist = $genreModel->readAll();


View::render('genre_index_view', ['generi' => $genrelist ]);

View::render('footer');?>