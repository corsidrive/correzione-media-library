<!-- mio -->
<?php View::render('head'); ?>
<?php View::render('nav')  ?>

<?php View::render('jumbotron', 
                                [ 'lead' => "Elenco delle canzoni", 'site_name' => "Supercal" ]  ); ?>

<?php //print_r($song) ?>  

    <div class="container">

    <div class="border p-2 mb-2">
        <a href="<?= Config::SITE_URL.'controller/song_add_controller.php' ?>" >aggiungi canzoni</a>
    </div>

    <?php  if($song){ ?>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th width="1%">#</th>
                    <th >Titolo</th>
                    <th >Audio</th>
                    <th >Genere</th>
                    <th >Artista</th>
                    <th  class="text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
           
                <?php foreach ($song as $songA) { ?>
                                   
                    <tr>
                        <td><?= $songA->song_id ?></td>

                        <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$songA->song_id ?>"><?php echo $songA->title;  ?></a></td>
                        
                        <td><audio controls><source src="<?= Config::SITE_URL.'/uploads'.$song->filename ?>" type="audio/mpeg"></td>
                        
                        <!-- <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$songA->song_id ?>"><?php echo $songA->filename;  ?></a></td> -->
                        
                        <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$songA->song_id ?>"><?php echo $songA->name;  ?></a></td>
                        <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$songA->song_id ?>"><?php echo $songA->name;  ?></a></td>

                        <td class="text-center"><a href="<?= Config::SITE_URL.'controller/song_delete_controller.php?id='.$songA->song_id ?>" class="text-danger">delete</a></td>

                    </tr>

                <?php } ?>

            </tbody>
        </table>

            <?php } else { ?>
                <div class="alert alert-info m-3">non ci sono canzoni </div>
            <?php } ?>     
    </div>    

<?php View::render('footer');