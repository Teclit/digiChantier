<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container mt-5 ">
    <?php 
        echo SessionHelper::getSession("SuccessMessage");
        echo SessionHelper::getSession("ErrorMessage");
    ?>
    <h5 class="text-center mb-4">Espace Personel</h5>
    <div class="row justify-content-center gy-5"> 
        <div class="col-lg-2 ">
            <div class="card border-4 shadow   mb-4">
                <div class="card-body px-4 text-center border-dark">
                    <h4 class="card-title text-secondary">Commandes</h4>
                    <h2 class="card-text text-primary"><?php echo $data['commandes']->totalcmd; ?></h2>
                </div>
            </div>
            <div class="card  border-4 shadow  mb-4">
                <div class="card-body px-4 text-center">
                    <h4 class="card-title text-secondary">Prospects Livrés</h4>
                    <h2 class="card-text text-success"><?php echo Count($data['commandeLines']); ?></h2>
                </div>
            </div>

            <div class="card  border-4 shadow  mb-4">
                <div class="card-body px-4 text-center">
                    <h4 class="text-secondary">Prospects achetés</h4>
                    <h2 class="card-text text-danger ">0</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-10 px-4">
            <h4 class="text-start text-secondary">Mes Projet accepté:</h4>
            <div class="bg-light p-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="fw-bold">N°.</th>
                            <th class="fw-bold ">Nom</th>
                            <th class="fw-bold d-none d-lg-table-cell">Prenom</th>
                            <th class="fw-bold ">Telephone</th>
                            <th class="fw-bold d-none d-lg-table-cell">Email</th>
                            <th class="fw-bold d-none d-md-table-cell">Ville</th>
                            <th class="fw-bold d-none d-lg-table-cell">Code Postale</th>
                            <th class="fw-bold d-none d-lg-table-cell">Date inscrption</th>
                            <th class="fw-bold">Projet</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['commandeLines'] as $index=>$lead): ?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo $lead->nom;?></td>
                        <td class="d-none d-lg-table-cell"><?php echo $lead->prenom;?></td>
                        <td class=""><?php echo$lead->tel;?></td>
                        <td class="d-none d-lg-table-cell"><?php echo $lead->email;?></td>
                        <td class="d-none d-md-table-cell"><?php echo $lead->ville;?></td>
                        <td class="d-none d-lg-table-cell"><?php echo $lead->codepostal;?></td>
                        <td class="d-none d-lg-table-cell"><?php echo $lead->date_inscrption;?></td>
                        <td ><a href="<?php echo URLROOT."/personnels/leadDetail/".$lead->idlead ?>" class="btn btn-success btn-sm">Infos</a></td>
                    </tr>
                    <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>