<?php
    SessionHelper::confirmLoginAdmin();
?>
<div class="mb-3 d-flex justify-content-center">
    <a class="btn btn-success btn-dark px-5 mt-3" href="<?php echo URLROOT; ?>/Prixs/indexPrix" target="_self">Retour</a>
</div>
<form action="<?php echo URLROOT; ?>/Prixs/<?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
    <div class="mb-3">
        <label for="nbleads" class="form-label fw-bold">Quantité de Leads:</label>
        <input type="number"  name="nbleads" class="form-control" id="nbleads" value="<?php echo $data['nbleads']; ?>" placeholder="Entrer le Quantité de leads" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nbleadsError']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label fw-bold">Definir le prix/lead(s):</label>
        <input type="number" step="any"  name="prix" class="form-control" id="prix" value="<?php echo $data['prix']; ?>" placeholder="Definir un prix" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['prixError']; ?> </span>
    </div>
    <div class="mb-3">
        <label for="codepack" class="form-label fw-bold">Code pack:</label>
        <input type="text"  name="codepack" class="form-control" id="codepack" value="<?php echo $data['codepack']; ?>" placeholder="Saisir le  code de pack" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['codepackError']; ?> </span>
        <small class="mt-3">
            <b>Choisir de ci-desous:</b>
            <ul>
                <li>PKUNITE</li>
                <li>PKDEPARTMENT</li>
                <li>PKREGION</li>
                <li>PKPAYS</li>

            </ul>
        </small>
    </div>
    
    <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-success btn-sucess px-5 mt-3"><?php echo $data['submitBtn']?></button>
    </div>
</form>