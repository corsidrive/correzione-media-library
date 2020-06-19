<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron',['lead' => "Elenco dei Generi Musicali",'site_name' => "Genere"]); ?>


<div class="container">

    <a href="<?= Config::SITE_URL.'controller/genre_add_controller.php' ?>" >Aggiungi Genere</a>
    <hr>

    <?php  if($generi){ ?>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th width="1%">#</th>
                <th width="100%">Generi</th>
                <th width="100%">Code</th>
                <th width="1%" class="text-center" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($generi as  $genere) { ?>

                <tr>
                    <td><?php echo $genere->genre_id ?> </td>
                   
                    <td><a href="<?= Config::SITE_URL.'/controller/genre_edit_controller.php?id='.$genere->genre_id ?>"><?php echo $genere->name;  ?></a></td>
                    <td><a href="<?= Config::SITE_URL.'/controller/genre_edit_controller.php?id='.$genere->genre_id ?>"><?php echo $genere->code ?> </td>
                   
                   
                   
                   
                    <td class="text-center"><a href="<?= Config::SITE_URL.'controller/genre_delete_controller.php?id='.$genere->genre_id ?>" class="text-danger">Delete</a></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <?php } else { ?>
                <div class="alert alert-info m-3">non ci sono generi </div>;
    <?php } ?>  

</div>


<?php View::render('footer');
