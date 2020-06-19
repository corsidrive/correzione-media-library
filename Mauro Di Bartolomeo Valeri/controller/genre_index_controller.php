<?php include '../autoload.php';
 
$genreModel = new GenreModel(Db::getInstance());
$genreList = $genreModel->readAll();

View::render('genre_index_view', [
    'generi'=>$genreList
]);

View::render('footer');?>