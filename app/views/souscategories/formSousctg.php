<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();
?>

<div class="mb-3 d-flex justify-content-center">
    <a class="btn btn-success btn-dark px-5 mt-3" href="<?php echo URLROOT; ?>/souscategories/indexSousctg" target="_self">Retour</a>
</div>
<form action="<?php echo URLROOT; ?><?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
    <div class="mb-3">
        <label for="sctgnom" class="form-label fw-bold">Ajoter un Sous Category:</label>
        <input type="text"  name="nomSctg" class="form-control" id="sctgnom" value="<?php echo $data['nomSctg']; ?>" placeholder="Nom du sous category" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomSctgError']; ?> </span>
    </div>

    <div class="mb-3">
        <label for="sel1" class="form-label fw-bold">Select un category:</label>
        <select class="form-select  me-4" id="sel1" name="idCtg">
            <?php if(!empty($data['idCtg'])){ ?>
                <option value="<?php echo $data['idCtg']; ?>"><?php echo $data['nomCtg']; ?></option>  
            <?php } ?>
            <option>Choisissez un category ?</option>
            <?php foreach($data['categories'] as $category): ?>
                <option value="<?php echo $category->idctg; ?>"><?php echo $category->ctgnom;?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-success btn-success px-5 mt-3"><?php echo $data['submitBtn']?></button>
    </div>
</form>