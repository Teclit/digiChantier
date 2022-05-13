<?php
    SessionHelper::confirmLogin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-4 p-5 ">

    <h3 class="text-center mb-3">Mon profile </h3>

    <div class="row justify-content-center"> 
        <div class="card col-md-4">
            <div class="card-body">

                <?php if(SessionHelper::getSession("userRoleAdmin")){   ?>


                    <h5 class="card-title fw-bold"><?php echo SessionHelper::getSession("userNom") . " ". SessionHelper::getSession("userPrenom"); ; ?></h5>
                    <p class="card-text"><span class="fw-bold">Téléphone:</span> <?php echo SessionHelper::getSession("userTel"); ?></p>
                    <p class="card-text"><span class="fw-bold">Email:</span> <?php echo  SessionHelper::getSession("userEmail"); ?></p>
                    <p class="card-text"><span class="fw-bold">Adresse:</span> <?php echo SessionHelper::getSession("UserAdresse"); ?></p>
                    <p class="card-text"><span class="fw-bold">Ville:</span> <?php echo SessionHelper::getSession("UserVille"); ?></p>
                    <p class="card-text"><span class="fw-bold">Code Postal:</span> <?php echo SessionHelper::getSession("UserCodepostal"); ?></p>
                    <p class="card-text"><span class="fw-bold">Updated:</span> le <small class="text-muted"><?php echo SessionHelper::getSession("userdateUpdated"); ?></small></p>
                    <hr>
                    <a href="<?php echo URLROOT . "/administrateurs/updateAdmin/". SessionHelper::getSession("userId");?>"  class="btn btn-success btn-sm">Modifier</a>

                <?php } else {  ?>
                    <h5 class="card-title fw-bold"><?php echo SessionHelper::getSession("userNom"); ?></h5>
                    <p class="card-title"><span class="fw-bold">Nom du contact:</span> <?php echo SessionHelper::getSession("userNomContact") . " ". SessionHelper::getSession("userPrenomContact") ; ?></p>
                    <p class="card-text"><span class="fw-bold">Fonction:</span> <?php echo SessionHelper::getSession("userFonctionContact"); ?></p>
                    <p class="card-text"><span class="fw-bold">Téléphone:</span> <?php echo SessionHelper::getSession("userTelContact"); ?></p>
                    <p class="card-text"><span class="fw-bold">Email:</span> <?php echo SessionHelper::getSession("userEmailContact"); ?></p>
                    <p class="card-text"><span class="fw-bold">Adresse:</span> <?php echo SessionHelper::getSession("UserAdresse"); ?></p>
                    <p class="card-text"><span class="fw-bold">Ville:</span> <?php echo SessionHelper::getSession("UserVille"); ?></p>
                    <p class="card-text"><span class="fw-bold">Code Postal:</span> <?php echo   SessionHelper::getSession("UserCodepostal"); ?></p>
                    <p class="card-text"><span class="fw-bold">Pays:</span> <?php echo SessionHelper::getSession("UserPays"); ?></p>
                    <p class="card-text"><span class="fw-bold">Updated:</span> le <small class="text-muted"><?php echo  SessionHelper::getSession("userdateUpdated"); ?></small></p>
                    <hr>
                    <a  class="btn btn-success btn-sm d-flex justify-content-center"href="<?php echo URLROOT . "/professionels/updatePro/".  SessionHelper::getSession("userId");?>" >Modifier</a>
                <?php } ?>
            </div>
        </div>
    </div>

</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>