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

    // artista conosciuto
    $genre_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
    $genreModel = new GenreModel(Db::getInstance());
    // 
    $genre = $genreModel->readOne($genre_id);
    


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $genre_name = $nameField->getValue();
    $genre_code = $codeField->getValue();
    $genre_id = filter_input(INPUT_POST,'genre_id',FILTER_VALIDATE_INT);

    $genre = new Genre();
    $genre->name = $genre_name;
    $genre->code = $genre_code;
    $genre->genre_id = $genre_id;
    
    if(ValidationField::formIsValid()){
    $genreModel = new GenreModel(Db::getInstance());
    $genreModel->update($genre);
    
    header('Location:' . Config::SITE_URL . 'controller/genre_index_controller.php');
    }
}

View::render('genre_form_view',[
    'genere' => $genre,
    'nameField' => $nameField,
    'codeField'=>$codeField,
    'mode' => 'Stai modificando: '.$genre->name,
    'lead'=>'Modifica Genere',
    'button'=>'modifica'
]);





