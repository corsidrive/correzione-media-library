<?php View::render('head',
['title' => "song"]); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron',
[

        'lead' => "Song",
        'site_name' => "Media Library"
]
); ?>

<div class="container ">
    <a href="<?= Config::SITE_URL.'controller/song_add_controller.php' ?>">aggiungi canzone</a>
        <?php if($canzoni) {?>
    <table class="table table-light">
        <thead class="thead-light ">
            <tr >
                <th width="10%">Codice artista</th>
                <th width="10%">Titolo</th>
                <th width="1%">Riproduci</th>
                <th width="10%">Codice genere</th>
                <th width="1%" class="text-center ml-2" colspan="2">Azioni</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($canzoni as $canzone) { ?>
            <tr>
                <td><a href="<?= Config::SITE_URL.'controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->artist_id;  ?></a></td>
                <td><a href="<?= Config::SITE_URL.'controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->title;  ?></a></td>
                <td><audio controls><source src="../uploads/<?= $canzone->filename; ?>" type="audio/mpeg"></audio></td> 
                <td><a href="<?= Config::SITE_URL.'controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->genre_id;  ?></a></td>

                <td class="text-center"><a href="<?= Config::SITE_URL.'/controller/song_delete_controller.php?id='.$canzone->song_id ?>"class="text-danger pr-5">delete</a></td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
    <?php }else { ?>
                <div class="alert alert-info m-3 text-center">
                   Nessuna canzone
                </div>
            <?php } ?>
</div>

<?php View::render('footer');?>