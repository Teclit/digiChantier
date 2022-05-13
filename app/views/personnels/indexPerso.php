<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-3 ">

    <h3 class="text-center mb-4">Espace Personel</h3>

    <div class="row justify-content-center gy-5"> 
        <div class="col-lg-2 ">
            <div class="card border-2 border-primary mb-4">
                <div class="card-body px-4 text-center">
                    <h4 class="card-title text-secondary">Commandes</h4>
                    <h2 class="card-text text-primary"><?php echo $data['commandes']->totalcmd; ?></h2>
                </div>
            </div>
            <div class="card border-2 border-success mb-4">
                <div class="card-body px-4 text-center">
                    <h4 class="card-title text-secondary">Prospects Livrés</h4>
                    <h2 class="card-text text-success"><?php echo Count($data['commandeLines']); ?></h2>
                </div>
            </div>

            <div class="card border-2 border-danger mb-4">
                <div class="card-body px-4 text-center">
                    <h4 class="text-secondary">Prospects achetés</h4>
                    <h2 class="card-text text-danger ">0</h2>
                </div>
            </div>

            <div class="card border-2 border-warning mb-4">
                <div class="card-body px-4 text-center">
                    <h4 class="text-secondary">Rendez-vous</h4>
                    <h2 class="card-text text-warning ">0</h2>
                </div>
            </div>
        </div>

        <div class="col-lg-10 px-4">
            <h3 class="text-start text-secondary">Mes Projet accepté:</h3>
            <div class="bg-light">
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
                            <th scope="col" class="fw-bold">Date inscrption</th>
                            <th scope="col" class="fw-bold">Projet</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['commandeLines'] as $index=>$lead): ?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo $lead->nom;?></td>
                        <td><?php echo $lead->prenom;?></td>
                        <td><?php echo$lead->tel;?></td>
                        <td><?php echo $lead->email;?></td>
                        <td><?php echo $lead->ville;?></td>
                        <td><?php echo $lead->codepostal;?></td>
                        <td><?php echo $lead->date_inscrption;?></td>
                        <td><a href="<?php echo URLROOT."/personnels/leadDetail/".$lead->idlead ?>" class="btn btn-success btn-sm">Infos</a></td>
                    </tr>
                    <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
            <div >
                <h4 class="text-start text-secondary my-4">Projet Disponible:</h4>
                <div class="bg-light">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="fw-bold">N°.</th>
                            <th scope="col" class="fw-bold">Ville</th>
                            <th scope="col" class="fw-bold">Code Postale</th>
                            <th scope="col" class="fw-bold">Projet</th>
                            <th scope="col" class="fw-bold">Voir</th>
                            <th scope="col" class="fw-bold">Prix/€</th>
                            <th scope="col" class="fw-bold">Acheter</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data['leads'] as $index=>$lead): ?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo $lead->ville;?></td>
                        <td><?php echo $lead->codepostal;?></td>
                        <td><?php echo substr($lead->projet, 0, 70)."..";?></td>
                        <td><a href="<?php echo URLROOT."/personnels/leadPotentiel/".$lead->idlead ?>" class="btn btn-secondary btn-sm">Infos</a></td>
                        <td><?php echo $data['prixunite']->prix ."€";?></td>
                        <td><a href="<?php echo URLROOT."/personnels/ajouterPanier/".$lead->idlead ?>" class="btn btn-dark btn-sm">Ajouter au Panier</a></td>
                    </tr>
                    <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
            </div>
        
        </div>
    </div>

</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>