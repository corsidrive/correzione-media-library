<?php
include_once '../autoload.php';

$nameField = new ValidationField(
    'artist_name', 
    'isName', 
    'il nome non è valido',
    ['required' => true]
);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $artist = new Artist();
    $artist->name = '';

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $artist_name = $nameField->getValue();

    $artist = new Artist();
    $artist->name = $artist_name;

    if (ValidationField::formIsValid()) {

        $artistModel = new ArtistModel(Db::getInstance());
        $artistModel->create($artist);
        header('Location:' . Config::SITE_URL . 'controller/artist_index_controller.php');
    } 



}

View::render('artist_form_view',
    [
        'artista' => $artist,
        'nameField'=> $nameField,
        'mode' => 'Inserisci artista',
        'lead' => 'Aggiungi nuovo artista',
        'button' => 'aggiungi',
    ]);
