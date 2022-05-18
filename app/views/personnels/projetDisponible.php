<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container-fluid ">
    <h4 class="text-center text-secondary my-5">Projet Disponible:</h4>
    <div class="bg-light mx-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th  class="fw-bold">N°.</th>
                    <th  class="fw-bold d-none d-md-table-cell">Ville</th>
                    <th  class="fw-bold ">Code Postale</th>
                    <th  class="fw-bold d-none d-lg-table-cell">Projet</th>
                    <th  class="fw-bold">Voir</th>
                    <th  class="fw-bold">Prix/€</th>
                    <th  class="fw-bold">Acheter au Panier</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data['leads'] as $index=>$lead): ?>
                <tr>
                    <td scope="row"><?php echo $index+1;?></td>
                    <td class="d-none d-md-table-cell"><?php echo $lead->ville;?></td>
                    <td class=""><?php echo $lead->codepostal;?></td>
                    <td class="d-none d-lg-table-cell"><?php echo substr($lead->projet, 0, 100)."..";?></td>
                    <td><a href="<?php echo URLROOT."/personnels/leadPotentiel/".$lead->idlead ?>" class="btn btn-secondary btn-sm">Voir</a></td>
                    <td><?php echo $data['prixunite']->prix ."€";?></td>
                    <td><a href="<?php echo URLROOT."/commandes/addPanier/".$lead->idlead ?>" class="btn btn-dark btn-sm">Ajouter</a></td>
                </tr>
            <?php  endforeach; ?>  
            </tbody>
        </table>
    </div>
        
</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>