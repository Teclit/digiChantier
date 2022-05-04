<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<section class="container my-4 p-5 ">
    <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/administrateurs/createAdmin">Add Admin</a>
    <h3 class="text-center mb-3">List Administrateur</h3>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="fw-bold">N°.</th>
                <th scope="col" class="fw-bold">Nom</th>
                <th scope="col" class="fw-bold">Prenom</th>
                <th scope="col" class="fw-bold">Telephone</th>
                <th scope="col" class="fw-bold">Email</th>
                <th scope="col" class="fw-bold">Ville</th>
                <th scope="col" class="fw-bold">Code Postale</th>
                <th scope="col" class="fw-bold">Details</th>
                <th scope="col" class="fw-bold">Modifier</th>
                <th scope="col" class="fw-bold">Supprimer</th>
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
                <td><a href="<?php echo URLROOT . "/administrateurs/detailAdmin/". $administrateurs->id ; ?>" class="btn btn-outline-info btn-sm">Infos</td></a></td>
                <td><a href="<?php echo URLROOT . "/administrateurs/updateAdmin/". $administrateurs->id ;?>"  class="btn btn-outline-success btn-sm" >Modifier</a></td>
                <td><a href="<?php echo URLROOT . "/administrateurs/deleteAdmin/". $administrateurs->id ;?>"  class="btn btn btn-outline-danger btn-sm">supprimer</a></td>
            </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>


    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
