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
                <h5 class="card-title fw-bold"><?php echo $data['professionel']->nom ?></h5>
                <p class="card-title"><?php echo $data['professionel']->nomcontact . " ". $data['professionel']->prenomcontact ; ?></p>
                <p class="card-text"><span class="fw-bold">Téléphone:</span> <?php echo $data['professionel']->telcontact; ?></p>
                <p class="card-text"><span class="fw-bold">Email:</span> <?php echo $data['professionel']->emailcontact; ?></p>
                <p class="card-text"><span class="fw-bold">Adresse:</span> <?php echo $data['professionel']->adresse; ?></p>
                <p class="card-text"><span class="fw-bold">Ville:</span> <?php echo $data['professionel']->ville; ?></p>
                <p class="card-text"><span class="fw-bold">Code Postal:</span> <?php echo $data['professionel']->codepostal; ?></p>
                <p class="card-text"><span class="fw-bold">Updated:</span> le <small class="text-muted"><?php echo $data['professionel']->date_edition; ?></small></p>
                <hr>
                <a href="<?php echo URLROOT . "/professionels/indexPro" ?>" class="btn btn-secondary btn-sm">Retour</a>
                <a href="<?php echo URLROOT . "/professionels/updatePro/". $data['professionel']->idpro ;?>"  class="btn btn-success btn-sm">Modifier</a>
                <a href="<?php echo URLROOT . "/professionels/deletePro/". $data['professionel']->idpro ;?>"  class="btn btn btn-danger btn-sm">supprimer</a>

            </div>
        </div>
    </div>

</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>