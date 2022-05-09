<form action="<?php echo URLROOT; ?><?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
    <div class="mb-3">
        <input type="text"  name="nomSctg" class="form-control" id="nom" value="<?php echo $data['nomSctg']; ?>" placeholder="Nom du sous category" required>
        <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomSctgError']; ?> </span>
    </div>

    <div class="mb-3">
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

    <button type="submit" class="btn btn-success btn-block"><?php echo $data['submitBtn']?></button>
</form>