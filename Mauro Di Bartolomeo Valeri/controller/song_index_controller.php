<?php include '../autoload.php';

$songModel = new SongModel(Db::getInstance());
$songList = $songModel->readAll();
 
View::render('song_index_view', [
    
]);

View::render('footer');?>

