

<section class="container-fluid my-5 containerAccueil" >

<div class="container justify-centent-center text-center  p-5">
    <h3 class="text-light"> <span class="bg-dark p-3 mb-5"> UN PROFESSIONNEL DE CONFIANCE POUR VOS TRAVAUX </span></h3>
    <p class="text-light">  <span class="bg-dark p-3 my-5">Depuis des années, tous nos professionnels sont évalués par leurs clients</span></p>
    <form class="form-inline my-5 m" action="<?php echo URLROOT; ?>/leads/addlead" method="GET" enctype="multipart/form-data" >
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
    <h4 class="text-center fw-bold">Notre Blog</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4 my-5">
            <div class="col ">
                <div class="card border-0 shadow rounded-3 ">
                    <img src="https://picsum.photos/500/300?random=1" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-dark">Read more</a>
                    </div>
                    
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow rounded-3">
                    <img src="https://picsum.photos/500/300?random=2" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-dark">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow rounded-3">
                    <img src="https://picsum.photos/500/300?random=3" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-dark">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow rounded-3">
                    <img src="https://picsum.photos/500/300?random=4" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-dark">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow rounded-3">
                    <img src="https://picsum.photos/500/300?random=5" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-dark">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow rounded-3">
                    <img src="https://picsum.photos/500/300?random=6" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a href="#" class="btn btn-dark">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


