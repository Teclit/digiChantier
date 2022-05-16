<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<section class="container-fluid my-5 containerAccueil" >
    <div class="container justify-centent-center text-center  p-5">
        <h3 class="text-light"> <span class="bg-dark p-3 mb-5"> Trouvez de nouveaux chantiers en toute simplicité ! </span></h3>
        <form class="form-inline my-5 m" action="<?php echo URLROOT; ?>/professionels/getJob" method="GET" enctype="multipart/form-data" >
            <div class="form-group d-flex">
                <select class="form-select  me-4" id="sel1" name="travaux">
                    <option>Quels travaux souhaitez-vous réaliser ?</option>
                    <?php foreach($data['travaux'] as $travail):?>
                        <optgroup class="mx-2" label="<?php echo $travail->ctgnom;?>">
                            <?php foreach($data['stravaux'] as $stravail): if($travail->idctg == $stravail->idctg ){?>
                                <option value="<?php echo $travail->idctg.'/'. $stravail->idsctg?>"><?php echo $stravail->sctgnom;?></option>
                            <?php } endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-dark px-5">Recherche</button>
            </div>
        </form>
    </div>
</section>


<section class="container">
    <?php 
        echo SessionHelper::getSession("SuccessMessage");
        echo SessionHelper::getSession("ErrorMessage");
    ?>
    
    <div class="row row-cols-1 row-cols-md-3 g-3 my-5">
        <?php if(!empty($data['jobs'])){ ?>
            <?php foreach($data['jobs'] as $job):?>
                <div class="col-3 ">
                    <div class="card border-0 shadow rounded-3 text-center ">
                        <?php foreach($data['travaux'] as $travail):if($job->idctg == $travail->idctg ){ ?>
                        <h5 class="card-header "><?php echo $travail->ctgnom; ?> </h5>
                        <?php } endforeach; ?>
                        <div class="card-body ">
                            <?php foreach($data['stravaux'] as $stravail):if($job->idsctg == $stravail->idsctg ){ ?>
                                <h5 class="card-title fw-bold"><?php echo $stravail->sctgnom; ?></h5>
                            <?php } endforeach; ?>
                            <h5 class="card-title"><?php echo $job->ville; ?></h5>
                            <h5 class="card-title"><?php echo $job->codepostal; ?></h5>
                            <p class="card-text"><?php echo substr($job->projet, 0, 250)." ..."; ?></p>
                            <a href="<?php echo URLROOT."/personnels/leadPotentiel/".$job->idlead ?>"class="btn btn-dark px-4">Voir</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        <?php } ?>
            
    </div>
</section>



<?php
    require APPROOT . '/views/includes/footer.php';
?>



