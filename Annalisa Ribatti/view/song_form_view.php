<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => "Supercal"]); ?>

<div class="container">

<!--  -->
<div class="card"> 
    <div class="card-header">
        <h1 class="h5 text-normal m-1"><?= $mode ?> </h1>
    </div>
    <div class="card-body">
        <!--  -->

        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

            <input type="hidden" name="song_id" value="<?= $song->song_id ?>">

            <div class="form-group">
                <label for="title">Titolo</label>
                <input id="title" value="<?= $song->title ?>"  class="form-control" type="text" name="song_title">
            
                <?php if($titleField->getIsValid()===false) { ?>
                    <div class="text-danger"><?= $titleField->getErrorMessage() ?></div>
                <?php } ?>
            
            </div>

            <div class="form-group">
                <label for="artist">Artista</label>
                <select id="artist" name="artist_id" class="form-control">
                    <option selected >sconosciuto</option>
                
                    <?php foreach($elencoArtisti as $artista){ ?>
                            <option value="<?= $artista->artist_id ?>"><?= $artista->name ?></option>
                    <?php } ?>
                </select>
         
                <!-- non funziona -->
                <?php if($artist_idField->getIsValid()===false) { ?>
                    <div class="text-danger"><?= $artist_idField->getErrorMessage() ?></div>
                <?php } ?>
            
            </div>

            <div class="form-group">
                <label for="artist">Genere</label>
                <select id="genre" name="genre_id" class="form-control">
                    <option selected >sconosciuto</option>

                   <?php foreach($elencoGeneri as $genere){ ?>
                            <option value="<?= $genere->genre_id ?>" ><?= $genere->name ?></option>
                    <?php } ?>
                </select>
                
                <!-- non funziona -->
                <?php if($genre_idField->getIsValid()===false) { ?>
                    <div class="text-danger"><?= $genre_idField->getErrorMessage() ?></div>
                <?php } ?>
            
            </div>


            <div class="row pb-3">
              <div class="col-md-6">
                <label class="d-block"> attuale: <b><?= $song->filename ?></b></label> 
              
                <audio controls class="d-block">
                    <!-- <source src="uploads/<?= $song->filename ?>" type="audio/ogg"> -->
                    <!-- <source src="uploads/<?= $song->filename ?>" type="audio/mpeg"> -->
                    <source src="./tss2020php-crud-media-player/uploads/<?= $song->filename ?>" type="audio/mpeg">

                    <!-- Your browser does not support the audio element. -->
                </audio>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="filename" class="d-block">Cambia file audio</label>
                  <input type="file" class="form-control" name="filename" id="filename">
                </div>
              </div>
            </div>
<!-- 
            <div class="form-group">
                <label for="filename">File</label>
                <input type="file" class="form-control" name="filename" id="filename">
            </div> -->
         
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><?= $button ?></button>
                <!-- $button /////////////////// -->
             </div>
        </form>

        <!--  -->
        </div>
</div>
<!--  -->

        </div> 
        <!-- container -->

        <?php View::render('footer'); ?>