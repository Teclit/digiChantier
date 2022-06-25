<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-5 p-1  ">

            <h3 class="text-center my-5"> Total Leads : <?php echo sizeof($data['commandeLines']); ?> </h3>
            <?php 
                echo SessionHelper::getSession("SuccessMessage");
                echo SessionHelper::getSession("ErrorMessage");
            ?>
                <table class="table  table-responsive table-hover table-bordered">
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
                        </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
                        foreach($data['commandeLines'] as $index=>$lead): ?>
                            <tr>
                                <td scope="row"><?php echo $index+1;?></td>
                                <td ><?php echo $lead->nom;?></td>
                                <td class="d-none d-lg-table-cell"><?php echo $lead->prenom;?></td>
                                <td class="d-none d-lg-table-cell"><?php echo$lead->tel;?></td>
                                <td class="d-none d-lg-table-cell"><?php echo $lead->email;?></td>
                                <td class="d-none d-lg-table-cell"><?php echo $lead->ville;?></td>
                                <td class="d-none d-lg-table-cell"><?php echo $lead->codepostal;?></td>
                                <td class="d-none d-lg-table-cell"><?php echo $lead->date_inscrption;?></td>
                                <td><small><a href="<?php echo URLROOT."/personnels/leadDetail/".$lead->idlead ?>" class="btn btn-info btn-sm">Infos</a></small></td>
                            
                            </tr>
                        <?php endforeach; ?>
                            
                        </tbody>
                </table>
            <div class="d-flext justify-content-center my-4">
                    <a class="btn btn-dark text-light fw-bold my-3 px-5" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Retour</a>
            </div>
    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
