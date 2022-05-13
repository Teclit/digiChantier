
<?php
    SessionHelper::confirmLogin();    
    SessionHelper::confirmLoginAdmin();
?>

<form action="<?php echo URLROOT; ?><?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
    <div class="mb-3">
        <input type="text"  name="nomCtg" class="form-control" id="nom" value="<?php echo $data['nomCtg']; ?>" placeholder="Nom du Category" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomCtgError']; ?> </span>
    </div>

    <button type="submit" class="btn btn-success btn-block"><?php echo $data['submitBtn']?></button>
</form>