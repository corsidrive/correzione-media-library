<?php
include_once '../autoload.php';

$titleField = new ValidationField('song_title', 'required', 'il titolo è obbligatorio', ['required'=>true]); /////////////////
$artist_idField = new ValidationField('artist_id', 'required', "l'artista è obbligatorio", ['required'=>true]); /////////////////
$genre_idField = new ValidationField('genre_id', 'required', 'il genere è obbligatorio', ['required'=>true]); /////////////////


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $song_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

    $songModel = new SongModel(Db::getInstance());
    $song = $songModel->readOne($song_id);

    // var_dump($song);

    // $artist_id = $song->artist_id;
    
    // $artist_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();


    // $genre_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();

    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();

    $song_title = $titleField->getValue(); ///////////////////
    $song_genre_id = $genre_idField->getValue(); ///////////////////
    $song_artist_id = $artist_idField->getValue(); ///////////////////
    
    $song_id = filter_input(INPUT_POST, 'song_id', FILTER_VALIDATE_INT);

    $song = new song();

    $song->song_id = $song_id;

    $song->title = $song_title; ///////////////////
    $song->genre_id = $song_genre_id; ///////////////////
    $song->artist_id = $song_artist_id; ///////////////////
    

    // $upload = new UploadFile('filename',Config::UPLOAD_FOLDER);
    $upload = new UploadFile('filename',Config::UPLOAD_FOLDER, ['audio/mpeg']);

    
       if($upload->isAllowed()){
    
        // $song->title = "aaa"; ///////////////////
        // $song->genre_id = "3"; ///////////////////
        // $song->artist_id = "2"; ///////////////////
           
           $song->filename = $_FILES['filename']['name'];
        //    $song->filename =  $upload->doUpload(); 
           $upload->doUpload(); 
    
           echo "song";
           var_dump($song);
       }


    
    if(ValidationField::formIsValid()) {

        $songModel = new SongModel(Db::getInstance()); ///////////////////
        $songModel->update($song); /////////////////// 

        // header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');

    }

}


View::render('song_form_view',[
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri, ///////////////////

    'song' => $song, ///////////////////

    'mode'=>'Stai modificando: ' . $song->title, ///////////////////
    'lead' => 'Modifica Canzone', ///////////////////
    'button' => 'modifica', ///////////////////

    'titleField' => $titleField, ///////////////////
    'genre_idField' => $genre_idField, ///////////////////
    'artist_idField' => $artist_idField, ///////////////////

]);





