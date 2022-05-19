
<?php

    SessionHelper::confirmLogin();
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

    <table class="table table-hover px-5">
        <thead>
            <tr>
            <th class="fw-bold ">N°.</th>
            <th class="fw-bold ">Nom</th>
            <th class="fw-bold d-none d-lg-table-cell">Telephone</th>
            <th class="fw-bold d-none d-lg-table-cell">Email</th>
            <th class="fw-bold d-none d-lg-table-cell">Ville</th>
            <th class="fw-bold d-none d-lg-table-cell">Code Postale</th>
            <th class="fw-bold d-none d-lg-table-cell">Date inscrption</th>
            <th class="fw-bold ">Details</th>
            <th class="fw-bold ">Modifier</th>
            <th class="fw-bold ">Supprimer</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($data['professionels'] as $index=>$professionel): ?>
            <tr>
                <td scope="row"><?php echo $index+1;?></td>
                <td><?php echo $professionel->nom;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $professionel->telcontact;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $professionel->emailcontact;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $professionel->ville;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $professionel->codepostal;?></td>
                <td class=" d-none d-lg-table-cell"><?php echo $professionel->dateinscription;?></td>
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
