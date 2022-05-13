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

            <div class="bg-seconsary d-flex justify-content-end">
                <h3 class="me-5">Total Prix: <?php echo count($data['panier'])*$data['prixunite']->prix ?> €</h3>
                <a href="<?php echo URLROOT."/commandes/ajouterPanier/".$lead->idlead ?>" class="btn btn-success px-5">Payer</a>
            </div>
        </div>
    <?php } else {?>
        <h4 class="text-center text-secondary mt-5">Panier viide </h4>
    <?php }?>
</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>