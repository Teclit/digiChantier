<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container-fluid ">
    <h4 class="text-center text-secondary mt-5">Projet Disponible:</h4>
    <div class="bg-light mx-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="fw-bold">N°.</th>
                    <th scope="col" class="fw-bold">Ville</th>
                    <th scope="col" class="fw-bold">Code Postale</th>
                    <th scope="col" class="fw-bold">Projet</th>
                    <th scope="col" class="fw-bold">Voir</th>
                    <th scope="col" class="fw-bold">Prix/€</th>
                    <th scope="col" class="fw-bold">Acheter au Panier</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data['leads'] as $index=>$lead): ?>
                <tr>
                    <td scope="row"><?php echo $index+1;?></td>
                    <td><?php echo $lead->ville;?></td>
                    <td><?php echo $lead->codepostal;?></td>
                    <td><?php echo substr($lead->projet, 0, 100)."..";?></td>
                    <td><a href="<?php echo URLROOT."/personnels/leadPotentiel/".$lead->idlead ?>" class="btn btn-secondary btn-sm">Infos</a></td>
                    <td><?php echo $data['prixunite']->prix ."€";?></td>
                    <td><a href="<?php echo URLROOT."/commandes/addPanier/".$lead->idlead ?>" class="btn btn-dark btn-sm">Ajouter</a></td>
                </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
        
</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>