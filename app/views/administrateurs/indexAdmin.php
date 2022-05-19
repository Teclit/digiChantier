<?php
    SessionHelper::confirmLogin();    SessionHelper::confirmLoginAdmin();

    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<section class="container my-4 p-3 ">
    <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/administrateurs/createAdmin">Add Admin</a>
    <h5 class="text-center my-3">List des  Administrateur</h5>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th  class="fw-bold">N°.</th>
                <th  class="fw-bold">Nom</th>
                <th  class="fw-bold d-none d-lg-table-cell">Prenom</th>
                <th  class="fw-bold d-none d-lg-table-cell">Telephone</th>
                <th  class="fw-bold d-none d-lg-table-cell">Email</th>
                <th  class="fw-bold d-none d-lg-table-cell">Ville</th>
                <th  class="fw-bold d-none d-lg-table-cell">Code Postale</th>
                <th  class="fw-bold">Details</th>
                <th  class="fw-bold">Modifier</th>
                <th  class="fw-bold">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($data['administrateurs'] as $index=>$administrateurs):?>
            <tr>
                <td scope="row"><?php echo $index+1;?></td>
                <td><?php echo $administrateurs->nom;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $administrateurs->prenom;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo$administrateurs->tel;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $administrateurs->email;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $administrateurs->ville;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $administrateurs->codepostal;?></td>
                <td><small><a href="<?php echo URLROOT . "/administrateurs/detailAdmin/". $administrateurs->id ; ?>" class="btn btn-info btn-sm ">Infos</a></small></td>
                <td><small><a href="<?php echo URLROOT . "/administrateurs/updateAdmin/". $administrateurs->id ;?>"  class="btn btn-success btn-sm" >Modifier</a></small></td>
                <td><small><a href="<?php echo URLROOT . "/administrateurs/deleteAdmin/". $administrateurs->id ;?>"  class="btn btn-danger btn-sm">supprimer</a></small></td>
            </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>


    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
