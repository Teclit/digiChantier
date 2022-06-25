<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
            <div class="mb-3">
                <div class="card border-dark mb-3" >
                    <h3 class="card-header bg-transparent border-dark">Mon Prospect</h3>
                    <div class="card-body text-dark">
                        <p class="fw-bold"><?php echo $data['lead']->nom .' '. $data['lead']->prenom ;?></p> 
                        <p class="fw-bold "><?php echo $data['lead']->tel ?> </p> 
                        <p class="fw-bold "><?php echo $data['lead']->email ?> </p> 
                        <p class="fw-bold "><?php echo $data['lead']->adresse ?> </p>
                        <p class="fw-bold "><?php echo $data['lead']->codepostal. ', '. $data['lead']->ville ?></p> 
                        <div class="bg-transparent border-dark">
                            
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-dark">
                    <h5 class="card-title"> <?php echo $data['lead']->ctgnom;?> </h5>
                        <h6 class="card-title"> <?php echo $data['lead']->sctgnom;?> </h6>
                        <hr>
                        <p class="card-text mb-3 text-wrap"><?php echo $data['lead']->projet ?></p>
                        <hr>
                        <a href="<?php echo URLROOT . "/leads/index"?>"  class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
