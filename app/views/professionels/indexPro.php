
<?php

    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-4">
    <div class="container mt-5">  
        <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/professionels/createPro">Add Professionel</a>
    </div>

    <h1 class="text-center">List des professionels</h1>
    <?php 
        echo SessionHelper::getSession("SuccessMessage");
        echo SessionHelper::getSession("ErrorMessage");
    ?>

<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">N°.</th>
            <th scope="col">Nom</th>
            <th scope="col">Telephone</th>
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

        <?php foreach($data['professionels'] as $index=>$professionel): ?>
            <tr>
                <td scope="row"><?php echo $index+1;?></td>
                <td><?php echo $professionel->nom;?></td>
                <td><?php echo $professionel->telcontact;?></td>
                <td><?php echo $professionel->emailcontact;?></td>
                <td><?php echo $professionel->ville;?></td>
                <td><?php echo $professionel->codepostal;?></td>
                <td><?php echo $professionel->dateinscription;?></td>
                <td><a href="<?php echo URLROOT ."/professionels/detailPro/". $professionel->idpro;?>" class="btn btn-outline-info btn-sm">Infos</a></td>
                <td><a href="<?php echo URLROOT ."/professionels/updatePro/". $professionel->idpro;?>" class="btn btn-outline-success btn-sm" >Modifier</a></td>
                <td><a href="<?php echo URLROOT ."/professionels/deletePro/". $professionel->idpro;?>" class="btn btn btn-outline-danger btn-sm">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
