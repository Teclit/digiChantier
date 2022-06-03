<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<section class="container-fluid my-5 containerAccueil" >
    <div class="container justify-centent-center text-center py-5">
        <div class="d-flex flex-column text-light bg-dark pt-3">
            <h3>Trouvez de nouveaux chantiers en toute simplicité !</h3>
        </div>
        <form class="row form-inline g-3 my-5 " action="<?php echo URLROOT; ?>/professionels/getJob" method="GET" enctype="multipart/form-data" >
            <div class="col-md-9 form-group ">
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
            </div>
            <div class="col-md-2" >
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

<section class="container">
    <h4 class="text-center fw-bold ">Notre dernier blog</h4>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-5 px-4 mt-4">
            <?php 
                $nbPost = 3;
                foreach($data['posts'] as $key=>$post): if($key<$nbPost){?>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow rounded-3 ">
                    <img src="<?php echo URLROOT;?>/public/uploads/<?php echo $post->image;?>" class="card-img-top" alt="<?php echo substr($post->title, 0, 20); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo substr($post->title, 0, 50)." .."; ?></h5>
                        <small class="text-secondary"><?php echo $post->created_at; ?></small>
                        <p class="card-text"><?php echo  substr($post->body, 0, 200)." ..."; ?></p>
                        <a href="<?php echo URLROOT . "/pages/fullpost/".$post->idpost ?>" class="btn btn-dark">Lire la suite</a>
                    </div>
                    
                </div>
            </div>
        <?php } endforeach; ?>
    </div>

    <div class="row justify-content-center px-5 mt-5">
        <a href="<?php echo URLROOT ."/pages/blog" ?>" class=" col-md-2 btn btn-dark mb-5 d-inline">+ Posts</a>
    </div>
</section>




<?php
    require APPROOT . '/views/includes/footer.php';
?>



