<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h4 class="card-title text-center mb-5 fw-light fs-5"> Se Connecter </h4>
                        <form action="<?php echo URLROOT; ?>/users/login" method ="POST">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="userEmail" id="email" placeholder="Email">
                                <label for="email">Email :</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="userPassword" id="password" placeholder="Password">
                                <label for="password">Password :</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-dark btn-login text-uppercase fw-bold" type="submit">Submit</button>
                            </div>
                            <hr class="my-4">
                            <p class="options"> Vous avez ouvlié votre mot de passe?<a class="text-primary" href="<?php echo URLROOT; ?>/users/forgetpd"> Cliquer ici!</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        


<?php
    require APPROOT . '/views/includes/footer.php';
?>
