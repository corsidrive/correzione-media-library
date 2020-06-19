<?php
include_once '../autoload.php';

$nameField = new ValidationField(
    'genre_name', 
    'required',
    'il nome è obbligatorio',
    ['required'=>true]
    );

$codeField = new ValidationField(
    'genre_code', 
    'required',
    'il codice è obbligatorio',
    ['required'=>true]
    );
    

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $genre = new Genre();
    $genre->name = ''; 
    $genre->code = ''; 
    }

     
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $genre_name=$nameField->getValue();
    $genre_code=$codeField->getValue();

    $genre = new Genre();
    $genre->name = $genre_name;
    $genre->code = $genre_code;
    
    if(ValidationField::formIsValid()){
        $genreModel = new GenreModel(Db::getInstance());
    
        
        $genreModel->create($genre);
       // header('Location:' . Config::SITE_URL . 'controller/artist_index_controller.php');
    }
    
}

View::render('genre_form_view',
    [
        'genere' => $genre,
        'nameField'=>$nameField,
        'codeField'=>$codeField,
        'mode'=>'Inserisci genere',
        'mode2'=>'Inserisci codice genere',
        'lead'=>'Aggiungi nuovo genere',
        'button'=>'aggiungi'
    ]);