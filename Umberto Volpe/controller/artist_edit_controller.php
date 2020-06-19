<?php
include_once '../autoload.php';

$nameField = new ValidationField(
    'artist_name',
    'required',
    'il nome è obbligatorio',
    ['required'=>true]
);

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    // artista conosciuto
    $artist_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
    $artistModel = new ArtistModel(Db::getInstance());
    // 
    $artist = $artistModel->readOne($artist_id);


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $artist_name = $nameField->getValue();
    $artist_id = filter_input(INPUT_POST,'artist_id',FILTER_VALIDATE_INT);

    $artist = new Artist();
    $artist->name = $artist_name;
    $artist->artist_id = $artist_id;
    
    if(ValidationField::formIsValid()){

    $artistModel = new ArtistModel(Db::getInstance());
    $artistModel->update($artist);
    
    header('Location:' . Config::SITE_URL . 'controller/artist_index_controller.php');
    }
}

View::render('artist_form_view',[
    'artista' => $artist,
    'nameField' => $nameField,
    'mode' => 'Stai modificando: '.$artist->name,
    'lead'=>'Modifica artista',
    'button'=>'modifica'
]);





