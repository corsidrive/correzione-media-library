<?php View::render('head',
['title' => "artist"]); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => "elenco degli artisti", 'site_name' => "Supercal"]); ?>

<?php // print_r($artisti) 
?>

<div class="container">

    <a href="<?= Config::SITE_URL.'/controller/artist_add_controller.php' ?>" >aggiungi artista</a>

    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th width="1%">Codice</th>
                <th width="100%">Artist</th>
                <th width="1%" class="text-center" colspan="2">Azioni</th>
            </tr>
        </thead>
        <tbody>
    <?php if($artisti) {?>

            <?php foreach ($artisti as  $artista) { ?>

                <tr>
                    <td><?php echo $artista->artist_id ?> </td>
                   
                    <td><a href="<?= Config::SITE_URL.'/controller/artist_edit_controller.php?id='.$artista->artist_id ?>"><?php echo $artista->name;  ?></a></td>
                   
                   
                   
                    <td class="text-center"><a href="<?= Config::SITE_URL.'/controller/artist_delete_controller.php?id='.$artista->artist_id ?>" class="text-danger">delete</a></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
            <?php }else { ?>
                <div class="text-center"><h3>
                    Non ci sono artisti, aggiungine uno!
                </h3></div>
            <?php } ?>
</div>


<?php View::render('footer');
