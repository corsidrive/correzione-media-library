<?php View::render('head',
['title' => "song-form"]); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => "Supercal"]); ?>

<div class="container">

<div class="main card">
    <div class="card-header">
        <h1 class="h5 text-normal m-1"><?= $mode ?> </h1>
    </div>
    <div class="form card-body">
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

        <div class="form-group">
            <input type="hidden" name="song_id" value="<?= $canzone->song_id?>">  
            <label for="title">Titolo</label>
            
            <input id="title" value="<?= $canzone->title?>" class="form-control" type="text" name="song_title">
            
            <?php if($titleField->getIsValid() === false) { ?>
               <div class="text-danger"><?= $titleField->getErrorMessage() ?></div>
               <?php } ?>
        </div>
        <div class="form-group">
            <label for="artist">Artista</label>
            <select id="artist" name="artist_id" class="form-control">
                <option selected>sconosciuto</option>

                <?php foreach($elencoArtisti as $artista){ ?>
                <option value="<?= $artista->artist_id ?>"><?= $artista->name ?></option>
                
                <?php } ?>
               
            </select>
            
        </div>
        <div class="form-group">
            <label for="artist">Genere</label>
            <select id="genre" name="genre_id" class="form-control">
                <option selected>sconosciuto</option>

                <?php foreach($elencoGeneri as $genre){ ?>
                <option value="<?= $genre->genre_id ?>"><?= $genre->name ?></option>
                <?php } ?>
                
            </select>
            
        </div>
        <div class="form-group">
            <label for="filename">File</label>
            <input type="file" class="form-control" name="filename" id="filename">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?= $button ?></button>
        </div>
        <input type="hidden" name="song_id" value="<?= $canzone->song_id ?>" > 
    </form>

</div>
</div>

<?php View::render('footer'); ?>