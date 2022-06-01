<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
            <div class="p-4">
                <div class="card border-dark mb-3" >
                    <h5 class="card-header p-3 fw-bold"> <?php echo $data['typeTravaux']->ctgnom;?> </h5>
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
                        <h6 class="card-title"> <?php echo $data['natureTravaux']->sctgnom;?> </h6>
                        <hr>
                        <p class="card-text mb-3"><?php echo $data['lead']->projet ?></p>
                    <hr>
                    <a class="btn btn-dark text-light fw-bold my-3 px-5" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Retour</a>
                    <a class="btn btn-danger text-light fw-bold my-3 px-5" href="<?php echo URLROOT."/personnels/deleteClient/".$data['lead']->idlead ; ?>">Supprimer</a>
                    </div>
                </div>
            </div>
    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
