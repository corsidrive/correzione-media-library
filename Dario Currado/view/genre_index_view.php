<?php View::render('head');?>
<?php View::render('nav')?>
<?php View::render('jumbotron', ['lead' => "elenco degli artisti", 'sitename' => "Sito"]);?>

<?php //print_r($artisti)?>
<div class="container ">

    <a href="<?=Config::SITE_URL . 'controller/genre_add_controller.php'?>" >aggiungi genere</a>

<table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th width="1%">#</th>
                    <th width="100%">Genre</th>
                    <th width="1%" class="text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($generi as $genere) {?>
                <tr>
                    <td><?php echo $genere->genre_id; ?></td>
                    <td><a href="<?=Config::SITE_URL . 'controller/genre_edit_controller.php?id=' . $genere->genre_id?>"><?php echo $genere->name; ?></a></td>
                    <td><a href="<?=Config::SITE_URL . 'controller/genre_edit_controller.php?id=' . $genere->genre_id?>"><?php echo $genere->code; ?></a></td>
                    <td class="text-center"><a href="<?=Config::SITE_URL . 'controller/genre_delete_controller.php?id='.$genere->genre_id?>" class="text-danger">delete</a></td>
                </tr>


            <?php }?>
            </tbody>
</table>

</div>

<?php View::render('footer');?>