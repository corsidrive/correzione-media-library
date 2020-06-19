<?php
include_once '../autoload.php';
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

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    // artista conosciuto
    $song_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
    $songModel = new SongModel(Db::getInstance());
    // 
    $song = $songModel->readOne($song_id);
    


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $song_filename = $filenameField->getValue();
    $song_title = $titleField->getValue();
    $song_id = filter_input(INPUT_POST,'song_id',FILTER_VALIDATE_INT);

    $song = new Song();
    $song->filename = $song_filename;
    $song->title = $song_title;
    $song->song_id = $song_id;
    
    if(ValidationField::formIsValid()){
    $songModel = new SongModel(Db::getInstance());
    $songModel->update($song);
    
    header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');
    }
}

View::render('song_form_view',[
    'canzone' => $song,
    'filenameField' => $filenameField,
    'titleField'=>$titleField,
    'mode' => 'Modifica Canzone'.$song->filename,
    'mode' => 'Modifica Canzone'.$song->title,
    'lead'=>'Modifica Canzone',
    'button'=>'modifica'
]);





