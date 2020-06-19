<?php
include "../autoload.php";

// $nameField = new ValidationField(
//     'genre_name', 
//     'required',
//     'il nome è obbligatorio',
//     ['required'=>true]
//     );

//     $codeField = new ValidationField(
//         'genre_code', 
//         'required',
//         'il codice è obbligatorio',
//         ['required'=>true]
//         );

if($_SERVER['REQUEST_METHOD']=='GET') {

    $artistModel = new ArtistModel(Db::getInstance());
    $elencoArtisti = $artistModel->readAll();

    $genreModel = new GenreModel(Db::getInstance());
    $elencoGeneri = $genreModel->readAll();

    $song = new Song();
    $song->filename = '';
    $song->title = '';
    $song->genre_id = '';
    $song->artist_id = '';

}


if($_SERVER['REQUEST_METHOD']=='POST') {

    $song = new Song();
    $song->filename = $song_filename;
    $song->title = $song_title;
    $song->genre_id = $song_genre_id;
    $song->artist_id = $song_artist_id;
    
    $upload = new UploadFile('filename', Config::UPLOAD_FOLDER, ['audio/mpeg']);
    //validazione
    if($upload->isAllowed()) {
        $upload->doUpload();
    }

    $songModel = new SongModel(Db::getInstance());

    $songModel->create($song);
}




View::render('song_form_view',[
    'elencoArtisti' => $elencoArtisti,
    'elencoGeneri' => $elencoGeneri,
] );