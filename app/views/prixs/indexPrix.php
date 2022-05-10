<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    
<section class="container ">
    <div class="container mt-5">  
        <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/prixs/createPrix">Ajouter Nouveau Prix</a>
    </div>

    <h1 class="text-center">Modalité prix</h1>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="fw-bold">N°.</th>
                <th scope="col" class="fw-bold">Code Pack</th>
                <th scope="col" class="fw-bold">N°. Leads</th>
                <th scope="col" class="fw-bold">Prix/€</th>
                <th scope="col" class="fw-bold">Modifier</th>
                <th scope="col" class="fw-bold">Supprimer</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($data['prixs'] as $index=>$prix): ?>
            <tr>
                <td scope="row"><?php echo $index+1;?></td>
                <td><?php echo $prix->codepack;?></td>
                <td><?php echo $prix->nbleads;?></td>
                <td ><?php echo$prix->prix;?></td>    
                <td><a href="<?php echo URLROOT."/prixs/updatePrix/".$prix->idprix ?>" class="btn btn-outline-success btn-sm" >Modifier</a></td>
                <td><a href="<?php echo URLROOT."/prixs/deletePrix/".$prix->idprix ?>" class="btn btn btn-outline-danger btn-sm">supprimer</a></td>
            </tr>
        <?php endforeach; ?>
            
        </tbody>
    </table>

    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
