<?php View::render('head'); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron',
        ['lead' => "La Vera Musica è qui!!",'site_name' => "Home"]); ?>

<main role="main" class="cover-container d-flex h-100 p-2  flex-column align-items-center justify-content-start">
        <h1 class="display-4">Media Library</h1>
        <hr>
        <img src="./img/music.jpg" alt="music" style="width: 100%;">
</main>





<?php View::render('footer'); ?>
