<?php

include_once '../autoload.php';

$nameField = new ValidationField(
    'genre_name', 
    'isName', 
    'il nome non è valido',
    ['required' => true]
);

$codeField = new ValidationField(
    'genre_code',
    'is_integer',
    'codice non valido',
    ['required' => true]
);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $genre = new Genre();
    $genre->name = '';
    $genre->code = null;

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   
    $genre_name = $nameField->getValue();
    $genre_code = $codeField->getValue();

    $genre = new Genre();
    $genre->name = $genre_name;
    $genre->code = $genre_code;

    
    if (ValidationField::formIsValid()) {
        
        
        $genreModel = new GenreModel(Db::getInstance());
        
        $genreModel->create($genre);
        
        echo 'sono qui';

        header('Location:' . Config::SITE_URL . 'controller/genre_index_controller.php');
    } 



}

View::render('genre_form_view',
    [
        'genere' => $genre,
        'nameField'=> $nameField,
        'codeField'=>$codeField,
        'mode' => 'Inserisci genere',
        'lead' => 'Aggiungi nuovo genere',
        'button' => 'aggiungi',
    ]);

