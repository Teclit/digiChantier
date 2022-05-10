<form action="<?php echo URLROOT; ?>/Prixs/<?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
    <div class="mb-3">
        <input type="number"  name="nbleads" class="form-control" id="nom" value="<?php echo $data['nbleads']; ?>" placeholder="Entrer le nombre de leads" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nbleadsError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="number" step="any"  name="prix" class="form-control" id="prenom" value="<?php echo $data['prix']; ?>" placeholder="Definir un prix" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['prixError']; ?> </span>
    </div>
    <div class="mb-3">
        <input type="text"  name="codepack" class="form-control" id="tel" value="<?php echo $data['codepack']; ?>" placeholder="Votre code de pack" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['codepackError']; ?> </span>
    </div>
    
    <button type="submit" class="btn btn-success btn-block"><?php echo $data['submitBtn']?></button>
</form>