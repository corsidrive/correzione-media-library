<?php View::render('head'); ?>
<?php View::render('nav');  ?>


<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => "canzone"]); ?>

<div class="container">


<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" 
enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Titolo</label>
                <input id="title" value=""  class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="artist">Artista</label>
                <select id="artist" name="artist_id" class="form-control">
                    <option selected >sconosciuto</option>
                
                    <?php foreach($elencoArtisti as $artista){ ?>
                            <option value="<?= $artista->artist_id ?>" ><?= $artista->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="artist">Genere</label>
                <select id="genre" class="form-control">
                    <option selected >sconosciuto</option>
                    <?php foreach($elencoGeneri as $genere){ ?>
                            <option value="<?= $genere->genre_id ?>" ><?= $genere->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="filename">File</label>
                <input type="file" class="form-control" name="filename" id="filename">
            </div>
         
            <div class="form-group">
                <button type="submit" class="btn btn-primary">aggiungi</button>
             </div>
        </form>

        </div>


        <?php View::render('footer'); ?>