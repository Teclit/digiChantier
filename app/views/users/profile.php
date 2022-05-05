<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-4 p-5 ">

    <h3 class="text-center mb-3">Détail du Adminidtrateur </h3>

    <div class="row justify-content-center"> 
        <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title fw-bold"><?php echo $data['user']->nom . " ". $data['user']->prenom ; ?></h5>
                <p class="card-text"><span class="fw-bold">Téléphone:</span> <?php echo $data['user']->tel; ?></p>
                <p class="card-text"><span class="fw-bold">Email:</span> <?php echo $data['user']->email; ?></p>
                <p class="card-text"><span class="fw-bold">Adresse:</span> <?php echo $data['user']->adresse; ?></p>
                <p class="card-text"><span class="fw-bold">Ville:</span> <?php echo $data['user']->ville; ?></p>
                <p class="card-text"><span class="fw-bold">Code Postal:</span> <?php echo $data['user']->codepostal; ?></p>
                <p class="card-text"><span class="fw-bold">Updated:</span> le <small class="text-muted"><?php echo $data['user']->date_edition; ?></small></p>
                <hr>
                <a href="<?php echo URLROOT . "/administrateurs/updateAdmin/". $data['user']->id ;?>"  class="btn btn-success btn-sm">Modifier</a>

            </div>
        </div>
    </div>

</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>