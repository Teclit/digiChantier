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

    <h5 class="text-center mb-3">List des Chantiers</h5>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="fw-bold">N°.</th>
                <th class="fw-bold">Nom</th>
                <th class="fw-bold">Prenom</th>
                <th class="fw-bold">Telephone</th>
                <th class="fw-bold">Email</th>
                <th class="fw-bold">Ville</th>
                <th class="fw-bold">Code Postale</th>
                <th class="fw-bold">Date inscrption</th>
                <th class="fw-bold">Details</th>
                <th class="fw-bold">Modifier</th>
                <th class="fw-bold">Supprimer</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($data['leads'] as $index=>$lead): ?>
            <tr>
                <td scope="row"><?php echo $index+1;?></td>
                <td><?php echo $lead->nom;?></td>
                <td><?php echo $lead->prenom;?></td>
                <td ><?php echo$lead->tel;?></td>
                <td><?php echo $lead->email;?></td>
                <td><?php echo $lead->ville;?></td>
                <td><?php echo $lead->codepostal;?></td>
                <td><?php echo $lead->date_inscrption;?></td>
                <td>
                    <a href="<?php echo URLROOT."/leads/linfo/".$lead->idlead ?>" class="btn btn-outline-info btn-sm">Infos</a>
                </td>
                <td>
                    <a href="<?php echo URLROOT."/leads/update/".$lead->idlead ?>" class="btn btn-outline-success btn-sm" >Modifier</a>
                </td>
                <td>
                    <a href="<?php echo URLROOT."/leads/delete/".$lead->idlead ?>" class="btn btn btn-outline-danger btn-sm">supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
            
        </tbody>
    </table>

    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
