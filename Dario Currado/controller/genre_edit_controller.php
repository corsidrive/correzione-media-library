<?php
include_once '../autoload.php';

$nameField = new ValidationField(
    'genre_name',
    'isName',
    'il nome non è valido',
    ['required' => true]
);

$idField = new ValidationField(
    'genre_id',
    'is_integer',
    'id non valido',
    ['required' => true]
);

$codeField = new ValidationField(
    'genre_code',
    'is_integer',
    'codice non valido',
    ['required' => true]
);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $genre_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $genreModel = new GenreModel(Db::getInstance());
    $genre = $genreModel->readOne($genre_id);

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $genre_id = $idField->getValue();

    $genre_name = $nameField->getValue();
    
    $genre_code = $codeField->getValue();

    $genre = new Genre();

    $genre->name = $genre_name;

    $genre->genre_id = $genre_id;

    $genre->code = $genre_code;

    if (ValidationField::formIsValid()) {

        $genreModel = new GenreModel(Db::getInstance());

        $genreModel->update($genre);

        header('Location:' . Config::SITE_URL . 'controller/genre_index_controller.php');

    }

}

View::render('genre_form_view', [
    'genere' => $genre,
    'nameField' => $nameField,
    'codeField'=>$codeField,
    'mode' => 'Modifica genere: ' . $genre->name,
    'lead' => 'Modifica genere ',
    'button' => 'modifica',
]);