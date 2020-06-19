<?php View::render('head',
['title' => "genre"]); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron',
[

        'lead' => "Trova il tuo genere musicale preferito!",
        'site_name' => "Generi"
]
); ?>

<div class="container">
<a href="<?= Config::SITE_URL.'controller/genre_add_controller.php' ?>" >Aggiungi genere</a>
    <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th width="1%">Code </th>
                        <th width="1%">Id</th>
                        <th width="100%">Genre</th>
                        <th width="1%" class="text-center" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
    
                <?php foreach ($generi as $key => $genere) { ?>
                    <tr>
                        <td><?php echo $genere->code ?></td>
                        <td><?php echo $genere->genre_id ?></td>
                        <td><a href="<?= Config::SITE_URL.'controller/genre_edit_controller.php?id='.$genere->genre_id ?>"><?php echo $genere->name;  ?></a></td>
                        <td class="text-center"><a href="<?= Config::SITE_URL.'controller/genre_delete_controller.php?id='.$genere->genre_id ?>" class="text-danger">Delete</a></td>
                    </tr>
                    <?php } ?>
    
                </tbody>
            </table>
            
</div>
<?php View::render('footer');?>