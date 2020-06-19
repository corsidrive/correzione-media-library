<?php 
include "../autoload.php";

$titleField = new ValidationField(
    'song_title', 
    'required',
    'il campo è obbligatorio',
    ['required'=>true]
    );

if($_SERVER['REQUEST_METHOD']=='GET'){
        $song = new Song();
        $song->title ='' ;  
        $song->filename ='' ;  
        $song->genre_id ='' ;  
        $song->artist_id ='' ;  

    $artistModel = new ArtistModel(Db::getInstance()); 
    $elencoArtisti = $artistModel->readAll();

    $genreModel = new GenreModel(Db::getInstance()); 
    $elencoGeneri = $genreModel->readAll();

}

if($_SERVER['REQUEST_METHOD']=='POST'){
   $song_title=$titleField->getValue();
   $filename= filter_input(INPUT_POST, 'filename');
   $genre_id= filter_input(INPUT_POST, 'genre_id');
   $artist_id= filter_input(INPUT_POST, 'artist_id');

   $song = new Song();
   $song->title = $song_title;
   $song->filename = $filename;
   $song->genre_id = $genre_id;
   $song->artist_id = $artist_id;
   var_dump($song);

   $upload = new UploadFile('filename',Config::UPLOAD_FOLDER,['audio/mpeg']);
   if($upload->isAllowed()){
       
       $song->filename =  $upload->doUpload(); 
    //    $upload->doUpload(); 
   }

   if(ValidationField::formIsValid()){
    $songModel = new SongModel(Db::getInstance());
    $songModel->create($song);
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
    'lead'=>'Aggiungi una nuova canzone',
   
]);