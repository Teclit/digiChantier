<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();

    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    
<section class="container ">
    <div class="container mt-5">  
        <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/leads/addlead">Add Lead</a>
    </div>

    <h5 class="text-center m-3">List des Chantiers</h5>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="fw-bold">N°.</th>
                <th class="fw-bold">Nom</th>
                <th class="fw-bold d-none d-lg-table-cell">Prenom</th>
                <th class="fw-bold d-none d-lg-table-cell">Telephone</th>
                <th class="fw-bold d-none d-lg-table-cell">Email</th>
                <th class="fw-bold d-none d-lg-table-cell">Ville</th>
                <th class="fw-bold d-none d-lg-table-cell">Code Postale</th>
                <th class="fw-bold d-none d-lg-table-cell">Date inscrption</th>
                <th class="fw-bold">Details</th>
                <th class="fw-bold">Modifier</th>
                <th class="fw-bold">Supprimer</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($data['leads'] as $index=>$lead): ?>
            <tr>
                <td scope="row"><?php echo $index+1;?></td>
                <td ><?php echo $lead->nom;?></td>
                <td class="d-none d-lg-table-cell"><?php echo $lead->prenom;?></td>
                <td class="d-none d-lg-table-cell"><?php echo$lead->tel;?></td>
                <td class="d-none d-lg-table-cell"><?php echo $lead->email;?></td>
                <td class="d-none d-lg-table-cell"><?php echo $lead->ville;?></td>
                <td class="d-none d-lg-table-cell"><?php echo $lead->codepostal;?></td>
                <td class="d-none d-lg-table-cell"><?php echo $lead->date_inscrption;?></td>
                <td><small><a href="<?php echo URLROOT."/leads/linfo/".$lead->idlead ?>" class="btn btn-info btn-sm">Infos</a></small></td>
                <td><small><a href="<?php echo URLROOT."/leads/update/".$lead->idlead ?>" class="btn btn-success btn-sm" >Modifier</a></small></td>
                <td><small><a href="<?php echo URLROOT."/leads/delete/".$lead->idlead ?>" class="btn btn btn-danger btn-sm">supprimer</a></small></td>
            </tr>
        <?php endforeach; ?>
            
        </tbody>
    </table>

    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
