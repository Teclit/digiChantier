<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-auto p-1  ">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-7 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h6 class="card-title text-center  fs-5"> Saisir votre adresse mail pour  changer votre mot de passe. </h6>
                        <form action="<?php echo URLROOT; ?>/users/forgetpd" method ="POST">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="userEmail" id="email" placeholder="Email">
                                <label for="email">Email :</label>
                                <span class="invalidFeedback text-danger fw-bold "><small> <?php echo $data['userEmailError']; ?> </small></span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark  text-uppercase fw-bold" type="submit">Envoyer</button>
                            </div>
                            <hr class="my-4">
                            <p class="options"> Se connecter?<a class="text-primary" href="<?php echo URLROOT; ?>/users/login"> Cliquer ici!</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
