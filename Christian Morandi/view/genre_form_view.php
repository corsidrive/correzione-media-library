<?php View::render('head',
['title' => "genre form"]); ?>
<?php View::render('nav');  ?>

<?php View::render('jumbotron', ['lead' => $lead, 'site_name' => "Supercal"]); ?>


<main class="main container">

<div class="main card">
    <div class="card-header">
        <h1 class="h5 text-normal m-1"><?= $mode ?> </h1>
    </div>
    <div class="form card-body">
       
       <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
           <div class="form-group">
               <input type="hidden" name="genre_id" value="<?= $genere->genre_id?>">
               <label for="name">Nome del genere</label>
               <input id="name" value="<?= $genere->name ?>" class="form-control" type="text" name="genre_name">

               <?php if($nameField->getIsValid() === false) { ?>
               <div class="text-danger"><?= $nameField->getErrorMessage() ?></div>
               <?php } ?>

               <label for="name">Codice del genere</label>
               <input type="hidden" name="genre_id" value="<?= $genere->genre_id?>">
               <input id="name" value="<?= $genere->code ?>" class="form-control" type="text" name="genre_code">
               <?php if($codeField->getIsValid() === false) { ?>
               <div class="text-danger"><?= $codeField->getErrorMessage() ?></div>
               <?php } ?>


           </div>
           <div class="form-group">
              <button type="submit" class="btn btn-primary"><?= $button ?></button>
              
           </div>
           <input type="hidden" name="genre_id" value="<?= $genere->genre_id ?>" > 
       </form>
    </div>
</div>

</main>


<?php View::render('footer');