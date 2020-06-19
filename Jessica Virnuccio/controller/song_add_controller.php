<?php
include "../autoload.php";

$titleField = new ValidationField(
    'song_title',
    'required',
    'il titolo è obbligatorio',
    ['required'=>true]
);


if($_SERVER['REQUEST_METHOD']=='GET'){

    $song = new Song();
    $song->title = '';
    $song->filename = '';
    $song->artist_id = '';
    $song->genre_id = '';


    $genreModel = new GenreModel(Db::getInstance());
    $elencoGeneri = $genreModel->readAll();
   
    $artistModel = new ArtistModel(Db::getInstance());
    $elencoArtisti = $artistModel->readAll();
   


}



if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $song_title = $titleField->getValue();

    $filename = filter_input(INPUT_POST,'filename');
    $genre_id = filter_input(INPUT_POST,'genre_id');
    $artist_id = filter_input(INPUT_POST,'artist_id');


    $song = new Song();
    $song->filename = $filename;
    $song->title = $song_title;
    $song->artist_id = $artist_id;
    $song->genre_id = $genre_id;


    $genreModel = new GenreModel(Db::getInstance());
    $elencoGeneri = $genreModel->readAll();
   
    $artistModel = new ArtistModel(Db::getInstance());
    $elencoArtisti = $artistModel->readAll();
  


    $upload = new UploadFile('filename',Config::UPLOAD_FOLDER,['audio/mpeg']);

    if($upload->isAllowed()){
        
        $song->filename =  $upload->doUpload();
    }


 
    if(ValidationField::formIsValid()){

        $songModel = new SongModel(Db::getInstance());
        $songModel->create($song);
        header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');
    }
 
 }



View::render('song_form_view', [

    'canzone' => $song,
    'titleField' => $titleField,
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri,
    'mode'=>'Inserisci Canzone',
    'lead' => 'Aggiungi una nuova Canzone',
    'button'=> 'aggiungi'
    ]);