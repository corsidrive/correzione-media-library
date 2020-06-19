<?php 
include "../autoload.php";

$filenameField = new ValidationField(
    'song_filename', 
    'required',
    'il nome è obbligatorio',
    ['required'=>true]
    );

$titleField = new ValidationField(
    'song_title', 
    'required',
    'il codice è obbligatorio',
    ['required'=>true]
    );

if($_SERVER['REQUEST_METHOD']=='GET'){

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();


    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();

}


if($_SERVER['REQUEST_METHOD']=='POST'){ 

   $upload = new UploadFile('filename',Config::UPLOAD_FOLDER,['audio/mpeg']);

   if(ValidationField::formIsValid()){
        $songModel = new SongModel(Db::getInstance());


        $songModel->create($song);
        if($upload->isAllowed()){
       
        // $song->filename =  $upload->doUpload(); 
            $upload->doUpload(); 
        }
    }
   // $songModel->create($song);

}

View::render('song_form_view',[
    'canzone' => $song,
    'filenameField'=>$filenameField,
    'titleField'=>$titleField,
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri]);