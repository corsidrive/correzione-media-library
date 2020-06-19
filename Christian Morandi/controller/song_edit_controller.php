<?php
include_once '../autoload.php';
$titleField = new ValidationField(
    'song_title', 
    'required',
    'il campo è obbligatorio',
    ['required'=>true]
    );


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $song_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
    $songModel = new SongModel(Db::getInstance());
    // 
    $song = $songModel->readOne($song_id);

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();

    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $song_title = $titleField->getValue();
    $song_id = filter_input(INPUT_POST,'song_id',FILTER_VALIDATE_INT);
    $filename= filter_input(INPUT_POST, 'filename');
    $genre_id= filter_input(INPUT_POST, 'genre_id');
    $artist_id= filter_input(INPUT_POST, 'artist_id');

    $song = new Song();
    $song->title = $song_title;
    $song->filename = $filename;
    $song->genre_id = $genre_id;
    $song->artist_id = $artist_id;
    
    $upload = new UploadFile('filename',Config::UPLOAD_FOLDER,['audio/mpeg']);
    if($upload->isAllowed()){
        
        $song->filename =  $upload->doUpload(); 
     //    $upload->doUpload(); 
    }
    if(ValidationField::formIsValid()){
        $songModel = new SongModel(Db::getInstance());
        $songModel->update($song);
        header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');
    }    

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();
 
    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();
}

View::render('song_form_view',[
    'canzone' => $song,
    'titleField'=>$titleField,
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri'=> $elencoGeneri,
    'mode' => 'Modifica Canzone '.$song->title,
    'lead'=>'Modifica Canzone',
    'button'=>'modifica'
]);


