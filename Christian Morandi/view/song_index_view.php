<?php View::render('head',
['title' => "song"]); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron',
[

        'lead' => "trova la tua canzone preferita!",
        'site_name' => "Song"
]
); ?>

<div class="container ">
    <a href="<?= Config::SITE_URL.'controller/song_add_controller.php' ?>">aggiungi canzone</a>
    <table class="table table-light text-center">
        <thead class="thead-light ">
            <tr>
                <th width="1%">Titolo</th>
                <th width="1%">Riproduzione</th>
                <th width="1%">Codice dell'artista</th>
                <th width="1%">Codice del genere</th>
                <th width="1%" class="text-center ml-2" colspan="2">Azioni</th>
            </tr>
        </thead>
        <tbody>

            <?php if($canzoni) {?>
            <?php foreach ($canzoni as $key => $canzone) { ?>
            <tr>
                <td><a href="<?= Config::SITE_URL.'/controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->title;  ?></a></td>
                <td><audio controls><source src="../uploads/<?= $canzone->filename?>" type="audio/mpeg"></audio></td>
                <td><?php echo $canzone->artist_id ?></td>
                <td><?php echo $canzone->genre_id ?></td>
                <td><a
                        href="<?= Config::SITE_URL.'controller/song_edit_controller.php?id='.$canzone->song_id ?>"><?php echo $canzone->name;  ?></a>
                </td>

                <td class="text-center"><a
                        href="<?= Config::SITE_URL.'/controller/song_delete_controller.php?id='.$canzone->song_id ?>"
                        class="text-danger pr-5">delete</a></td>
            </tr>
            <?php } ?>

        </tbody>
    </table>
    <?php }else { ?>
    <div class="text-center">
        <h3>
            Non ci sono canzoni, aggiungine una!
        </h3>
    </div>
    <?php } ?>
</div>

<?php View::render('footer');?>