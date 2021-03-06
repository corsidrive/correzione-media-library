<?php View::render('head'); ?>
<?php View::render('nav')  ?>

<?php View::render('jumbotron', 
                                [ 'lead' => "Elenco dei generi", 'site_name' => "Supercal" ]  ); ?>

<?php //print_r($genere) ?>  

    <div class="container">

    <a href="<?= Config::SITE_URL.'controller/genre_add_controller.php' ?>" >aggiungi genere</a>

    <?php  if($generi){ ?>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th width="1%">#</th>
                    <th width="95%">Genere</th>
                    <th width="5%">ID3</th>
                    <th width="1%" class="text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>

            

          

           
                <?php foreach ($generi as $genere) { ?>
                                   
                    <tr>
                        <td><?= $genere->genre_id ?></td>

                        <td><a href="<?= Config::SITE_URL.'/controller/genre_edit_controller.php?id='.$genere->genre_id ?>"><?php echo $genere->name;  ?></a></td>
                        <td><a href="<?= Config::SITE_URL.'/controller/genre_edit_controller.php?id='.$genere->genre_id ?>"><?php echo $genere->code;  ?></a></td>

                        <td class="text-center"><a href="<?= Config::SITE_URL.'controller/genre_delete_controller.php?id='.$genere->genre_id ?>" class="text-danger">delete</a></td>

                    </tr>

                <?php } ?>

            </tbody>
        </table>

            <?php } else { ?>
                <div class="alert alert-info m-3">non ci sono genri </div>;
            <?php } ?>     
    </div>    

<?php View::render('footer');