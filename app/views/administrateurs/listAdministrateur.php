<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<section class="container my-4 p-5 ">

    <h3 class="text-center mb-3">List Administrateur</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">N°.</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col-2">Telephone</th>
                <th scope="col">Email</th>
                <th scope="col">Ville</th>
                <th scope="col">Code Postale</th>
                <th scope="col">Details</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($data['administrateurs'] as $index=>$administrateurs):?>
            <tr>
                <td scope="row"><?php echo $index+1;?></td>
                <td><?php echo $administrateurs->nom;?></td>
                <td><?php echo $administrateurs->prenom;?></td>
                <td ><?php echo$administrateurs->tel;?></td>
                <td><?php echo $administrateurs->email;?></td>
                <td><?php echo $administrateurs->ville;?></td>
                <td><?php echo $administrateurs->codepostal;?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/leads/leadInfos" class="btn btn-outline-info btn-sm">Infos</a>
                </td>
                <td>
                    <a href="<?php echo URLROOT; ?>/leads/updateLead" class="btn btn-outline-success btn-sm" >Modifier</a>
                </td>
                <td>
                    <a href="<?php echo URLROOT; ?>/leads/deleteLead" class="btn btn btn-outline-danger btn-sm">supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>


    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
