<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Creer Un Nouveau Lead</h4>

        <form action="<?php echo URLROOT; ?>/leads/create" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >

            <div class="mb-3">
                <input type="text"  name="nom" class="form-control" id="nom" placeholder="Votre Nom" required>
            </div>
            <div class="mb-3">
                <input type="text"  name="prenom" class="form-control" id="prenom" placeholder="Votre Prenom" required>
            </div>
            <div class="mb-3">
                <input type="tel"  name="tel" class="form-control" id="tel" placeholder="Votre Télephone" required>
            </div>
            <div class="mb-3">
                <input type="email"  name="email" class="form-control" id="email" placeholder="Votre Email" required>
            </div>
            <div class="mb-3">
                <input type="text"  name="adresse" class="form-control" id="adresse" placeholder="Adresse" required>
            </div>
            <div class="mb-3">
                <input type="text"  name="codepostal" class="form-control" id="codepostal" placeholder="Code Postal" required>
            </div>
            <div class="mb-3">
                <input type="text"  name="ville" class="form-control" id="ville" placeholder="Ville" required>
            </div>

            <div class="mb-3">
                <select class="form-select  me-4" id="typetravaux" name="typetravaux"  required>
                    <option value="<?php echo $data['typeTravaux']->idctg;?>"><?php echo $data['typeTravaux']->ctgnom;?></option>
                    <option>Quels est le type de travaux à réaliser ?</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select  me-4" id="natureravaux" name="naturetravaux"  required>
                    <option value="<?php echo $data['natureTravaux']->idsctg;?>"><?php echo $data['natureTravaux']->sctgnom;?></option>
                    <option>Quels est la nature de ces travaux ?</option>
                    <?php foreach($data['type-natureTravaux'] as $nttravail):  ?>
                        <option value="<?php echo $nttravail->idsct;?>"><?php echo $nttravail->sctgnom;?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="projet" id="exampleFormControlTextarea1" rows="3"placeholder="Votre Projet"></textarea>
            </div>

            <button type="submit" class="btn btn-success btn-block">Creer Lead</button>

        </form>

    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
