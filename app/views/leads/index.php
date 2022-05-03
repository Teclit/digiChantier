<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <div class="container mt-2">  
        <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/leads/addlead">Add Lead</a>
    </div>
<section class="container ">

    <h1 class="text-center">Leads Chantier</h1>
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
                <th scope="col">Date inscrption</th>
                <th scope="col">Details</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
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
