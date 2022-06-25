
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
                        <h6 class="card-title"> <?php echo $data['natureTravaux']->sctgnom;?> </h6>
                        <p class="card-text fw-bold"> <?php echo $data['lead']->codepostal ?></p> 
                        <p class="card-text fw-bold"><?php echo $data['lead']->ville ?></p> 
                        <div class="bg-transparent border-dark">
                            <p class="card-text mb-3"><?php echo $data['lead']->projet ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-dark">
                            <a  id="ajouterpanier" href="<?php echo URLROOT."/commandes/addPanier/".$data['lead']->idlead ;?>" class="btn btn-dark  mt-3 px-5">Ajouter au Panier</a>
                        </div> 
                    </div>
                </div>
                    <a class="btn btn-dark px-5 fw-bold" href="<?php echo URLROOT."/personnels/projetDisponible/".SessionHelper::getSession("userId") ; ?>">Retour </a>
            </div>
    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
