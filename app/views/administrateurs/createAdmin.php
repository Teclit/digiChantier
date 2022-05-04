<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Creer Un Nouveau Administrateur</h4>

        <form action="<?php echo URLROOT; ?>/Administrateurs/createAdmin" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >

            <div class="mb-3">
                <input type="text"  name="nom" class="form-control" id="nom" value="<?php echo $data['nomAdmin']; ?>" placeholder="Votre Nom" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="prenom" class="form-control" id="prenom" value="<?php echo $data['prenomAdmin']; ?>" placeholder="Votre Prenom" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['prenomAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="tel"  name="tel" class="form-control" id="tel" value="<?php echo $data['telAdmin']; ?>" placeholder="Votre Télephone" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['telAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="email"  name="email" class="form-control" id="email" value="<?php echo $data['emailAdmin']; ?>" placeholder="Votre Email" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['emailAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="password"  name="password" class="form-control" id="password" value="<?php echo $data['passwordAdmin']; ?>" placeholder="Votre password" required>
                <ul class="ms-5 text-start">
                    <li><small>Au moins un chiffre</small></li>
                    <li><small>Au moins une lettre</small></li>
                    <li><small>Au moins un caractère spécial :</small></li>
                    <li><small>Doit contenir au moins 8 caractères</small></li>
                </ul>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['passwordAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="password"  name="confirmpassword" class="form-control" id="confirmpassword" value="<?php echo $data['confirmpasswordAdmin']; ?>" placeholder=" confirm votre password" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['confirmpasswordAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="adresse" class="form-control" id="adresse" value="<?php echo $data['adresseAdmin']; ?>" placeholder="Adresse" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['adresseAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="ville" class="form-control" id="ville" value="<?php echo $data['villeAdmin']; ?>" placeholder="Ville" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['villeAdminError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="codepostal" class="form-control" id="codepostal" value="<?php echo $data['codepostalAdmin']; ?>" placeholder="Code Postal" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['codepostalAdminError']; ?> </span>
            </div>
            
            

            <button type="submit" class="btn btn-success btn-block">Creer Lead</button>

        </form>

    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
