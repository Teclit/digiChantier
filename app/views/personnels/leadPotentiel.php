<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
            <div class="mb-3">
                <div class="card border-dark mb-3" >
                    <div class="card-header bg-transparent border-dark">Potentiel Prospect</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title"> <?php echo $data['typeTravaux']->ctgnom;?> </h5>
                        <h6 class="card-title"> <?php echo $data['natureTravaux']->sctgnom;?> </h6>
                        <p class="card-text "><?php echo $data['lead']->adresse ?> </p>
                        <p class="card-text fw-bold"> <?php echo $data['lead']->codepostal ?></p> 
                        <p class="card-text fw-bold"><?php echo $data['lead']->ville ?></p> 
                        <div class="bg-transparent border-dark">
                            <p class="card-text mb-3"><?php echo $data['lead']->projet ?></p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-dark">
                        <p><a  id="ajouterpanier" href="<?php echo URLROOT."/commandes/addPanier/".$data['lead']->idlead ;?>" class="btn btn-dark px-5">Ajouter au Panier</a></tp>
                    </div>
                </div>
            </div>
    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
