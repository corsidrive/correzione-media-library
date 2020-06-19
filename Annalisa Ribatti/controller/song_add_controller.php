<?php 
include "../autoload.php";

$titleField = new ValidationField('song_title', 'required', 'il titolo è obbligatorio', ['required'=>true]); /////////////////
$artist_idField = new ValidationField('artist_id', 'required', "l'artista è obbligatorio", ['required'=>true]); /////////////////
$genre_idField = new ValidationField('genre_id', 'required', 'il genere è obbligatorio', ['required'=>true]); /////////////////



if($_SERVER['REQUEST_METHOD']=='GET'){

    $song = new Song(); ///////////////////
    $song->title = ""; ///////////////////
    $song->genre_id = ""; ///////////////////
    $song->artist_id = ""; ///////////////////
    $song->filename =  ""; ///////////////////

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();

    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();

    // echo "title";
    // echo $song->title;
    // echo "genre_id";
    // echo $song->genre_id;
    // echo "artist_id";
    // echo $song->artist_id;
    // echo "filename";
    // echo $song->filename;

    // echo "elencoArtisti";
    // var_dump($elencoArtisti);

    // echo "elencoGeneri";
    // var_dump($elencoGeneri);
}

if($_SERVER['REQUEST_METHOD']=='POST'){

    $artistModel = new ArtistModel(Db::getInstance()); ///////////////////
    $elencoArtisti = $artistModel->readAll(); ///////////////////

    $genreModel = new GenreModel(Db::getInstance()); ///////////////////
    $elencoGeneri = $genreModel->readAll(); ///////////////////
   

   $song_title = $titleField->getValue(); ///////////////////
   $song_genre_id = $genre_idField->getValue(); ///////////////////
   $song_artist_id = $artist_idField->getValue(); ///////////////////


   $song = new Song(); ///////////////////
//    $song->title = "gggg"; ///////////////////
//    $song->genre_id = "33"; ///////////////////
//    $song->artist_id = "22"; ///////////////////

   $song->title = filter_input(INPUT_POST, 'song_title'); ///////////////////

   $song->genre_id = filter_input(INPUT_POST, 'genre_id'); ///////////////////
   $song->artist_id = filter_input(INPUT_POST, 'artist_id'); ///////////////////

   $song->title = $song_title; ///////////////////
   $song->genre_id = $song_genre_id; ///////////////////
   $song->artist_id = $song_artist_id; ///////////////////

// echo "song";
// var_dump($song);

   // $upload = new UploadFile('filename',Config::UPLOAD_FOLDER);
   $upload = new UploadFile('filename',Config::UPLOAD_FOLDER, ['audio/mpeg']);

   if($upload->isAllowed()){

    // $song->title = "aaa"; ///////////////////
    // $song->genre_id = "3"; ///////////////////
    // $song->artist_id = "2"; ///////////////////
       
       $song->filename = $_FILES['filename']['name'];
       //$song->filename =  $upload->doUpload(); 
       $upload->doUpload(); 

       echo "song";

var_dump($song); ///////////////////
   }

   if(ValidationField::formIsValid()) { ///////////////////
       $songModel = new SongModel(Db::getInstance()); ///////////////////
       $songModel->create($song); ///////////////////

    //    header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php'); ///////////////////
   }
   ///////////////////AGGIUNGERE MESS ERRORE

    // echo "title";
    // echo $song->title;
    // echo "genre_id";
    // echo $song->genre_id;
    // echo "artist_id";
    // echo $song->artist_id;
    // echo "filename";
    // echo $song->filename;

    // echo "elencoArtisti";
    // var_dump($elencoArtisti);

    // echo "elencoGeneri";
    // var_dump($elencoGeneri);

}

View::render('song_form_view',[
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri, ///////////////////

    'song' => $song, ///////////////////

    'mode'=>'Inserisci canzone', ///////////////////
    'lead' => 'Aggiungi nuova canzone', ///////////////////
    'button' => 'aggiungi', ///////////////////

    'titleField' => $titleField, ///////////////////
    'genre_idField' => $genre_idField, ///////////////////
    'artist_idField' => $artist_idField, ///////////////////
   
]);