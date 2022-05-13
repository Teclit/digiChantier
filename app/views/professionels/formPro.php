<?php 
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();
?>

<form action="<?php echo URLROOT; ?><?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
    <div class="mb-3">
        <input type="text"  name="nomEnt" class="form-control" id="nom" value="<?php echo $data['nomEnt']; ?>" placeholder="Nom Enterprise" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomEntError']; ?> </span>
    </div>

    
    <div class="mb-3 d-flex">
        <input type="hidden"  name="domaine" class="form-control" id="domainTraveaux" value="<?php echo $data['domainesEnt']; ?>">
        <input type="text"  name="choixDomains" class="form-control w-100" id="domainSelected" value="<?php echo $data['choixDomain']; ?>"  placeholder="Choisissez votre domaine d'activité" required>
        <select class="bg-light flex-shrink-1" id="selectDomain">
            <?php foreach($data['choixDomains'] as $travail):?>
                <option  class="domain ms-3" data-name="<?php echo $travail->ctgnom;?>" value="<?php echo $travail->idctg;?>" label="<?php echo $travail->ctgnom;?>"></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <input type="text"  name="nom" class="form-control" id="nom" value="<?php echo $data['nomPro']; ?>" placeholder="Votre Nom" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="text"  name="prenom" class="form-control" id="prenom" value="<?php echo $data['prenomPro']; ?>" placeholder="Votre Prenom" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['prenomProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="text"  name="fonction" class="form-control" id="fonction" value="<?php echo $data['fonctionPro']; ?>" placeholder="Votre fonction" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['fonctionProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="tel"  name="tel" class="form-control" id="tel" value="<?php echo $data['telPro']; ?>" placeholder="Votre Télephone" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['telProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="email"  name="email" class="form-control" id="email" value="<?php echo $data['emailPro']; ?>" placeholder="Votre Email" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['emailProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="password"  name="password" class="form-control" id="password" value="<?php echo $data['passwordPro']; ?>" placeholder="Votre password" required>
        <ul class="ms-5 text-start">
            <li><small>Au moins un chiffre</small></li>
            <li><small>Au moins une lettre</small></li>
            <li><small>Au moins un caractère spécial :</small></li>
            <li><small>Au moins 8 caractères</small></li>
        </ul>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['passwordProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="password"  name="confirmpassword" class="form-control" id="confirmpassword" value="<?php echo $data['confirmpasswordPro']; ?>" placeholder="Confirm votre password" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['confirmpasswordProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="text"  name="adresse" class="form-control" id="adresse" value="<?php echo $data['adressePro']; ?>" placeholder="Adresse" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['adresseProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="text"  name="ville" class="form-control" id="ville" value="<?php echo $data['villePro']; ?>" placeholder="Ville" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['villeProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="text"  name="codepostal" class="form-control" id="codepostal" value="<?php echo $data['codepostalPro']; ?>" placeholder="Code Postal" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['codepostalProError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="text"  name="pays" class="form-control" id="pays" value="<?php echo $data['paysPro']; ?>" placeholder="Votre Pays" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['paysProError']; ?> </span>
    </div>
    
    <button type="submit" class="btn btn-success btn-block"><?php echo $data['submitBtn']?></button>
</form>