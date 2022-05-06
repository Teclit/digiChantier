<?php
    SessionHelper::confirmLoginAdmin();
    
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
    <p>Cards
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet consectetur adipiscing elit pellentesque habitant morbi. Ut porttitor leo a diam sollicitudin tempor id eu. Consectetur adipiscing elit ut aliquam. Ultrices dui sapien eget mi proin sed libero enim. Scelerisque viverra mauris in aliquam sem. Amet risus nullam eget felis eget nunc. In tellus integer feugiat scelerisque. Orci a scelerisque purus semper. Amet nulla facilisi morbi tempus iaculis urna id volutpat. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Neque gravida in fermentum et. Fringilla est ullamcorper eget nulla facilisi. Velit dignissim sodales ut eu sem integer. Quisque id diam vel quam. Ullamcorper a lacus vestibulum sed.
    </p>
</section>



<?php
    require APPROOT . '/views/includes/footer.php';
?>



