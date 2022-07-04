<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container-fluid ">
    <h4 class="text-center text-secondary my-5">Projet Disponible:</h4>
    <?php 
        echo SessionHelper::getSession("SuccessMessage");
        echo SessionHelper::getSession("ErrorMessage");
    ?>
    <div class="bg-light mx-5">
        <div class="mb-2  d-flex justify-content-between align-items-center">
            <form class="d-flex" action="<?php echo URLROOT; ?>/personnels/search" method="GET">
                <input class="form-control me-2" type="text" name="search" placeholder="Rechercher... " aria-label="Search">
                <button class="btn btn-dark" type="submit">Rechercher</button>
            </form>
            
        </div>
        <table class="table table-responsive table-hover table-bordered">
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
            <?php
                $listLeads = '';
                if(isset($data['searchLead'])){
                    $listLeads = $data['searchLead'];
                }else{
                    $listLeads = $data['leads'];
                } 
                foreach($listLeads as $index=>$lead):
            ?>
                <tr>
                    <td scope="row"><?php echo $index+1;?></td>
                    <td class="d-none d-md-table-cell"><?php echo $lead->ville;?></td>
                    <td class=""><?php echo $lead->codepostal;?></td>
                    <td class="d-none d-lg-table-cell"><?php echo substr($lead->projet, 0, 100)."..";?></td>
                    <td><a href="<?php echo URLROOT."/personnels/leadPotentiel/".$lead->idlead ?>" class="btn btn-secondary btn-sm">Voir</a></td>
                    <td><?php echo $lead->prix ."€";?></td>
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