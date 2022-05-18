<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-5 ">
    <?php if(count($data['panier']) > 0){?>
        <h4 class="text-center text-secondary mt-5">Total Prospects :<?php echo count($data['panier'])?>  </h4>
        <div class=" mx-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="fw-bold">N°.</th>
                        <th scope="col" class="fw-bold">Ville</th>
                        <th scope="col" class="fw-bold">Code Postale</th>
                        <th scope="col" class="fw-bold">Projet</th>
                        <th scope="col" class="fw-bold">Prix/€</th>
                        <th scope="col" class="fw-bold">Voir</th>
                        <th scope="col" class="fw-bold">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['panier'] as $index=>$lead): ?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo $lead->ville;?></td>
                        <td><?php echo $lead->codepostal;?></td>
                        <td><?php echo substr($lead->projet, 0, 100)."..";?></td>
                        <td><?php echo $data['prixunite']->prix ."€";?></td>
                        <td><a href="<?php echo URLROOT."/personnels/leadPotentiel/".$lead->idlead ?>" class="btn btn-success btn-sm">Infos</a></td>
                        <td><a href="<?php echo URLROOT."/commandes/deletePanier/".$lead->idlead ?>" class="btn btn-danger btn-sm">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <span class="payment-errors"></span>
            <div class="accordion" id="accordionExample">
                <h5 class="me-5">Total Prix: <?php echo count($data['panier'])*$data['prixunite']->prix ?> €</h5>
                <div class="accordion-item bg-light shadow">
                    <h2 class="accordion-header " id="headingOne">
                    <button class="accordion-button bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Paiement par carte bancaire
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form class="row g-3 justify-content-start border border-2">
                            <div class= " offset-md-5 col-md-5 offset-md-0">
                                <label for="cardNb" class="form-label">Card Number</label>
                                <input type="text"  name="cardNb" id="cardNb" size="20" autocomplete="off" class="form-control" >
                            </div>
                            <div class="col-md-2 offset-md-5">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="password" name="cvc" id="cvc" size="4" autocomplete="off" class="form-control">
                            </div>
                            <div class="col-3 offset-md-5">
                                <label for="date_exp" class="form-label">Expiration (MM/YYYY)</label>
                                <div class="input-group" id="date_ex ">
                                    <input type="text" aria-label="First name" size="2" class="form-control">
                                    <input type="text" aria-label="Last name" size="4" class="form-control">
                                </div>
                            </div>
                    
                            <div class="col-12 offset-md-5">
                                <button type="submit" class="btn btn-success px-5">Payer</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="accordion-item bg-light shadow">
                    <h2 class="accordion-header bg-light text-dark" id="headingTwo">
                    <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Paiement par paypal
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                            <button type="submit" id="payBtn" class="btn btn-success px-5">Payer</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else {?>
        <h4 class="text-center text-secondary mt-5">Panier viide </h4>
    <?php }?>
</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>