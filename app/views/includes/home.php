

<section class="container-fluid my-5 containerAccueil" >
    <div class="container justify-centent-center text-center py-5">
        <div class="d-flex flex-column text-light bg-dark pt-3">
            <h3> UN PROFESSIONNEL DE CONFIANCE POUR VOS TRAVAUX </h3>
            <p > Depuis des années, tous nos professionnels sont évalués par leurs clients</p>
        </div>
        <form class="row form-inline g-3 my-5 " action="<?php echo URLROOT; ?>/leads/addlead" method="GET" enctype="multipart/form-data" >
            <div class="col-md-9 form-group">
                <select class="form-select" id="sel1" name="travaux">
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
    <h4 class="text-center fw-bold mb-4">Notre dernier blog</h4>
    <div class="row row-cols-1 row-cols-md-3 g-5 px-4">
            <?php 
                $nbPost = 6;
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


