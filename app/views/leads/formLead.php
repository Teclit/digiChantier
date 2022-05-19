
        <form action="<?php echo URLROOT; ?><?php echo $data['actionForm'];?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
            <div class="mb-3">
                <label for="nom" class="form-label fw-bold">Nom:</label>
                <input type="text"  name="nom" class="form-control" id="nom" value="<?php echo $data['nomLead'] ?>" placeholder="Votre Nom" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['nomLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label fw-bold">Prenom:</label>
                <input type="text"  name="prenom" class="form-control" id="prenom" value="<?php echo $data['prenomLead']?>"  placeholder="Votre Prenom" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['prenomLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label fw-bold">Télephone:</label>
                <input type="tel"  name="tel" class="form-control" id="tel" value="<?php echo $data['telLead'] ?>"  placeholder="Votre Télephone" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['telLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email:</label>
                <input type="email"  name="email" class="form-control" id="email" value="<?php echo $data['emailLead'] ?>"  placeholder="Votre Email" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['emailLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label fw-bold">Adresse:</label>
                <input type="text"  name="adresse" class="form-control" id="adresse" value="<?php echo $data['adresseLead'] ?>"  placeholder="Adresse" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['adresseLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <label for="codepostal" class="form-label fw-bold">Code Postal:</label>
                <input type="text"  name="codepostal" class="form-control" id="codepostal"  value="<?php echo $data['codepostalLead'] ?>" placeholder="Code Postal" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['codepostalLeadError']; ?> </span>
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label fw-bold">Ville:</label>
                <input type="text"  name="ville" class="form-control" id="ville" value="<?php echo $data['villeLead'] ?>" placeholder="Votre Ville" required>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['villeLeadError']; ?> </span>
            </div>

            <div class="mb-3">
                <label for="typetravaux" class="form-label fw-bold">Type de Travaux:</label>
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
                <label for="naturetravaux" class="form-label fw-bold">Nature Travaux:</label>
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
                <label for="projet" class="form-label fw-bold">Ville:</label>
                <textarea class="form-control text-start" name="projet" id="projet"  rows="3" placeholder="Votre Projet">
                    <?php echo $data['projetLead'] ?>
                </textarea>
                <span class="invalidFeedback text-start  text-danger fw-bold"> <?php echo $data['projetLeadError']; ?> </span>
            </div>

            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-dark px-5"><?php echo $data['submitBtn']?></button>
            </div>
        </form>

