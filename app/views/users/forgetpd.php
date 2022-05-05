<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <p class="card-title text-center fw-light fs-5"> Saisir votre adresse mail pour  changer votre mot de passe. </p>
                        <form action="<?php echo URLROOT; ?>/views/users/login" method ="POST">

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="userEmail" id="email" placeholder="Email">
                                <label for="email">Email :</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-dark btn-login text-uppercase fw-bold" type="submit">Envoyer</button>
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
