<?php View::render(
    'head',
    ['title' => "song"]
); ?>
<?php View::render('nav');  ?>

<?php View::render(
    'jumbotron',
    [

        'lead' => "Cerca la tua canzone preferita",
        'site_name' => "Song"
    ]
); ?>

<div class="container">
<a href="<?= Config::SITE_URL . 'controller/song_add_controller.php' ?>">Aggiungi canzone</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th width="1%">#</th>
                <th>title</th>
                <th>Audio</th>
                <th>genere</th>
                <th>artista</th>
                <th width="1%" class="text-center" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td width="1%">

                    <a href="#"> Bohemian Rhapsody </a>
                </td>
                <td>
                    <audio controls>
                        <source src="horse.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
                <td>Rock</td>
                <td>Queen</td>

                <td class="text-center"><a href="#" class="text-danger">Delete</a></td>

            </tr>


        </tbody>
    </table>
</div>

<?php View::render('footer'); ?>