<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => "Elenco delle Canzoni", 'site_name' => "Song"]); ?>

<div class="container">

    <a href="<?= Config::SITE_URL.'controller/song_add_controller.php' ?>" >Aggiungi una Canzone</a>
    <hr>

<?php  if($canzoni){ ?>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th width="1%">FileAudio</th>
            <th width="10%">Titolo</th>
            <th width="10%">Artista</th>
            <th width="10%">Genere</th>
            <th width="1%" class="text-center" colspan="2">Actions</th>
        </tr>
    </thead>

    <tbody>

            <?php foreach ($canzoni as $canzone) { ?>
                
                <tr>
  
                    <td><audio controls><source src="../uploads/<?= $canzone->filename?>" type="audio/mpeg"></audio></td>
                    <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->title; ?></a></td>
                    <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->artist_id; ?></a></td>
                    <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->genre_id; ?></a></td>
                   
                    <td class="text-center"><a href="<?= Config::SITE_URL.'controller/song_delete_controller.php?id='.$canzone->song_id ?>" class="text-danger">Delete</a></td>
                </tr>

                <?php } ?>

</tbody>
</table>

<?php } else { ?>
        <div class="alert alert-info m-3"> non ci sono canzoni </div>
<?php } ?>  

</div>


<?php View::render('footer');