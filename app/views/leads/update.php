<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Modifier le  Lead</h4>

        <form action="<?php echo URLROOT; ?>/leads/update/<?php echo $data['lead']->idlead ?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
            <input type="hidden"  name="idlead" value="<?php echo $data['lead']->idlead ?>">

            <div class="mb-3">
                <input type="text"  name="nom" class="form-control" id="nom" value="<?php echo $data['lead']->nom ?>" placeholder="Votre Nom" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="prenom" class="form-control" id="prenom" value="<?php echo $data['lead']->prenom ?>"  placeholder="Votre Prenom" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['prenomLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="tel"  name="tel" class="form-control" id="tel" value="<?php echo $data['lead']->tel ?>"  placeholder="Votre Télephone" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['telLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="email"  name="email" class="form-control" id="email" value="<?php echo $data['lead']->email ?>"  placeholder="Votre Email" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['emailLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="adresse" class="form-control" id="adresse" value="<?php echo $data['lead']->adresse ?>"  placeholder="Adresse" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['adresseLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="codepostal" class="form-control" id="codepostal"  value="<?php echo $data['lead']->codepostal ?>" placeholder="Code Postal" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['codepostalLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <input type="text"  name="ville" class="form-control" id="ville" value="<?php echo $data['lead']->ville ?>" placeholder="Ville" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['villeLeadError']; ?> </span>
            </div>

            <div class="mb-3">
                <select class="form-select  me-4" id="typetravaux" name="typetravaux"  required>
                    <option value="<?php echo $data['typeTravaux']->idctg;?>"><?php echo $data['typeTravaux']->ctgnom;?></option>
                    <option>Quels est le type de travaux à réaliser ?</option>
                    <?php foreach($data['travaux'] as $typtravail):  ?>
                        <option value="<?php echo $typtravail->idctg;?>"><?php echo $typtravail->ctgnom;?></option>
                    <?php endforeach; ?>
                </select>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['typeTravauxLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <select class="form-select  me-4" id="natureravaux" name="naturetravaux"  required>
                    <option value="<?php echo $data['natureTravaux']->idsctg;?>"><?php echo $data['natureTravaux']->sctgnom;?></option>
                    <option>Quels est la nature de ces travaux ?</option>
                    <?php foreach($data['travaux'] as $travail):?>
                        <optgroup class="mx-2" label="<?php echo $travail->ctgnom;?>">
                            <?php foreach($data['stravaux'] as $stravail): if($travail->idctg == $stravail->idctg ){?>
                                <option value="<?php echo $travail->idctg.'/'. $stravail->idsctg?>"><?php echo $stravail->sctgnom;?></option>
                            <?php } endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                </select>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['natureProjetLeadError']; ?> </span>
            </div>

            <div class="mb-3">
                <textarea class="form-control text-start" name="projet" id="exampleFormControlTextarea1"  rows="3"placeholder="Votre Projet">
                    <?php echo $data['lead']->projet ?>
                </textarea>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['projetLeadError']; ?> </span>
            </div>

            <button type="submit" class="btn btn-success btn-block">ModifierLead</button>

        </form>

    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
