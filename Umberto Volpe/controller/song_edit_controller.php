<?php 
    include '../autoload.php';

    $titleField = new ValidationField('song_title', 'required', 'Titolo obbligatorio', ['required'=>true]);

    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $songModel = new SongModel(Db::getInstance());
        $song_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $song = $songModel->readOne($song_id);
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $song_title = $titleField->getValue();
        $song = new Song();
        $song->title = $song_title;
        $song->song_id = filter_input(INPUT_POST, 'song_id', FILTER_VALIDATE_INT);
        $song->genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);
        $song->artist_id = filter_input(INPUT_POST, 'artist_id', FILTER_VALIDATE_INT);
        $song->filename = filter_input(INPUT_POST, 'filename', FILTER_VALIDATE_INT);
        
        if (ValidationField::formIsValid()) 
        {
            $songModel = new SongModel(Db::getInstance());

            $songModel->create($song);

            header('Location:' . Config::SITE_URL . 'controller/song_index_controller.php');
        }
    }

    View::render('song_form_view', ['canzone' => $song, 'mode' => 'Stai modificando: ', 'lead' => 'Modifica canzone', 'button' => 'Modifica', 'titleField' => $titleField]);
?> 





