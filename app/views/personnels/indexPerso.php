<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-4 p-5 ">

    <h3 class="text-center mb-3">Espace Personel</h3>

    <div class="row justify-content-center"> 
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><?php echo $data['professionel']->nom ?></h5>
                    <p class="card-title"><?php echo $data['professionel']->nomcontact . " ". $data['professionel']->prenomcontact ; ?></p>
                    <p class="card-text"><span class="fw-bold">Téléphone:</span> <?php echo $data['professionel']->telcontact; ?></p>
                    <p class="card-text"><span class="fw-bold">Email:</span> <?php echo $data['professionel']->emailcontact; ?></p>
                    <p class="card-text"><span class="fw-bold">Adresse:</span> <?php echo $data['professionel']->adresse; ?></p>
                    <p class="card-text"><span class="fw-bold">Ville:</span> <?php echo $data['professionel']->ville; ?></p>
                    <p class="card-text"><span class="fw-bold">Code Postal:</span> <?php echo $data['professionel']->codepostal; ?></p>
                    <p class="card-text"><span class="fw-bold">Updated:</span> le <small class="text-muted"><?php echo $data['professionel']->date_edition; ?></small></p>
                    <hr>
                    <a href="<?php echo URLROOT . "/professionels/updatePro/". $data['professionel']->idpro ;?>"  class="btn btn-success btn-sm">Modifier</a>
                </div>
            </div>
        </div>

        <div class="col-9">

            <div class="bg-light p-5"">
                <h3 class="text-start ">Votre Commande</h3>
                <p class="text-justify" style="text-align:justify;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                In nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Molestie a iaculis at erat. Nec nam aliquam sem et tortor. 
                Vitae tortor condimentum lacinia quis. Vulputate enim nulla aliquet porttitor. Porttitor leo a diam sollicitudin tempor.
                Fringilla ut morbi tincidunt augue. Leo a diam sollicitudin tempor. Sollicitudin nibh sit amet commodo nulla facilisi nullam.
                Vitae congue mauris rhoncus aenean vel. Vitae tempus quam pellentesque nec. Luctus accumsan tortor posuere ac ut consequat semper viverra.
                Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Sapien faucibus et molestie ac feugiat sed lectus. 
                Non tellus orci ac auctor augue. Elit sed vulputate mi sit amet mauris commodo.

                Arcu non sodales neque sodales ut etiam sit amet nisl. At erat pellentesque adipiscing commodo elit. 
                Nisl rhoncus mattis rhoncus urna neque viverra justo nec. Diam vulputate ut pharetra sit. 
                Egestas pretium aenean pharetra magna ac placerat vestibulum lectus. Ut consequat semper viverra nam libero. 
                Integer vitae justo eget magna fermentum. Massa id neque aliquam vestibulum morbi blandit cursus risus at. 
                Aliquet risus feugiat in ante. Ipsum a arcu cursus vitae congue mauris rhoncus. Volutpat blandit aliquam etiam erat. 
                Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque. Ac tortor dignissim convallis aenean et tortor at risus viverra. 
                Mauris in aliquam sem fringilla ut morbi tincidunt.

                Mauris in aliquam sem fringilla. Purus sit amet luctus venenatis lectus magna fringilla. At auctor urna nunc id cursus. 
                Nulla facilisi etiam dignissim diam quis enim lobortis scelerisque. Nulla facilisi cras fermentum odio eu. 
                A scelerisque purus semper eget duis at tellus. Tempor orci dapibus ultrices in. Tincidunt dui ut ornare lectus sit amet est placerat in. 
                Gravida in fermentum et sollicitudin. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus. Ac turpis egestas sed 
                tempus urna et pharetra pharetra massa. Id eu nisl nunc mi ipsum faucibus vitae aliquet nec. Aliquam etiam erat velit scelerisque in dictum. 
                Id ornare arcu odio ut. Facilisis leo vel fringilla est ullamcorper. Vel facilisis volutpat est velit.
                </p>
            </div>


            <div class="bg-light p-5">
                <h3 class="text-start ">Votre Potentiel Prospect:</h3>
                <p>
                Curabitur gravida arcu ac tortor dignissim convallis. Nibh nisl condimentum id venenatis a condimentum vitae sapien. 
                Pharetra sit amet aliquam id diam maecenas ultricies mi eget. Viverra orci sagittis eu volutpat. Eget sit amet tellus cras adipiscing enim. 
                Phasellus vestibulum lorem sed risus ultricies tristique nulla aliquet. Erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. 
                Faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Arcu dui vivamus arcu felis. Ultrices in iaculis nunc sed. 
                Ut sem viverra aliquet eget. Sit amet aliquam id diam. Cras ornare arcu dui vivamus arcu felis bibendum ut. 
                Vitae justo eget magna fermentum iaculis eu non diam phasellus. Dui vivamus arcu felis bibendum ut tristique et. 
                Quis viverra nibh cras pulvinar. Condimentum lacinia quis vel eros donec ac. Tellus mauris a diam maecenas sed enim.

                Bibendum ut tristique et egestas quis. Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. 
                Cursus metus aliquam eleifend mi in nulla. Fusce ut placerat orci nulla pellentesque dignissim enim. 
                Mattis enim ut tellus elementum sagittis vitae et leo duis. Orci porta non pulvinar neque laoreet.
                Suspendisse ultrices gravida dictum fusce ut placerat orci nulla. Venenatis a condimentum vitae sapien pellentesque. 
                Varius morbi enim nunc faucibus a. Duis ut diam quam nulla porttitor massa. Aliquet nec ullamcorper sit amet risus nullam. 
                Tristique senectus et netus et malesuada fames ac turpis. Sed turpis tincidunt id aliquet risus feugiat in ante. 
                Mi proin sed libero enim sed faucibus turpis. Fringilla phasellus faucibus scelerisque eleifend. Lectus arcu bibendum at varius. 
                Porttitor rhoncus dolor purus non enim. Felis eget nunc lobortis mattis aliquam faucibus purus in. Mattis enim ut tellus elementum sagittis vitae et.
                </p>
            </div>
        
        </div>
    </div>

</section>

<?php
    require APPROOT . '/views/includes/footer.php';
?>