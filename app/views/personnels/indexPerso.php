<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-3 ">

    <h3 class="text-center mb-4">Espace Personel</h3>

    <div class="row justify-content-center gy-5"> 
        <div class="col-lg-3 ">
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

        <div class="col-lg-9">

            <div class="d-flex justify-content-between mb-3">
                <!-- <h3 class="text-start ">Votre Commande</h3> -->
                <div class="card border border-primary">
                    <div class="card-body px-4">
                        <h4 class="card-title text-secondary">Commandes</h4>
                        <h2 class="card-text text-primary text-center"><?php echo $data['commandes']->totalcmd; ?></h2>
                    </div>
                </div>

                

                <div class="card border border-success">
                    <div class="card-body px-4">
                        <h4 class="card-title text-secondary">Prospects Livrés</h4>
                        <h2 class="card-text text-success text-center">165</h2>
                    </div>
                </div>

                <div class="card border border-danger">
                    <div class="card-body px-4">
                        <h4 class="text-secondary">Prospects achetés</h4>
                        <h2 class="card-text text-danger text-center">5</h2>
                    </div>
                </div>

            </div>


            <div class="bg-light my-4">
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