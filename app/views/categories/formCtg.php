
<?php
    SessionHelper::confirmLogin();    
    SessionHelper::confirmLoginAdmin();
?>
<div class="mb-3 d-flex justify-content-center">
    <a class="btn btn-success btn-dark px-5 mt-3" href="<?php echo URLROOT; ?>/categories/indexCtg" target="_self">Retour</a>
</div>
<form action="<?php echo URLROOT; ?><?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 my-5" >
    <div class="mb-3">
        <label for="nomCtg" class="form-label fw-bold">Ajouter un Category:</label>
        <input type="text"  name="nomCtg" class="form-control" id="nomCtg" value="<?php echo $data['nomCtg']; ?>" placeholder="Nom du Category" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomCtgError']; ?> </span>
    </div>

    <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-success btn-block px-5"><?php echo $data['submitBtn']; ?></button> 
    </div>
</form>