<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-start  my-auto p-1  ">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-7 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <?php 
                            echo SessionHelper::getSession("SuccessMessage");
                            echo SessionHelper::getSession("ErrorMessage");
                        ?>
                        <h6 class="card-title text-start text-center fs-5"> Modifier votre mot de passe. </h6>
                        <form action="<?php echo URLROOT; ?>/users/editpassword/<?php echo $data['userId']; ?>" method ="POST">
                            <div class=" mb-3">
                                <label for="email" class="form-label fw-bold">Email :</label>
                                <input type="email" class="form-control" name="userEmail" id="email" placeholder="Votre Email" >
                                
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="userPassword" id="password" placeholder="password">
                                <label for="password">Password :</label>
                                <span class="invalidFeedback text-danger fw-bold "><small> <?php echo $data['userPasswordError']; ?> </small></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="userConfirmpassword" id="confirmpassword" placeholder="confirm password">
                                <label for="confirmpassword">Confirm Password :</label>
                                <span class="invalidFeedback text-danger fw-bold "><small> <?php echo $data['userConfirmpasswordError']; ?> </small></span>
                                <ul class="ms-5 text-start">
                                    <li><small>Au moins un chiffre</small></li>
                                    <li><small>Au moins une lettre</small></li>
                                    <li><small>Au moins un caractère spécial :</small></li>
                                    <li><small>Au moins 8 caractères</small></li>
                                </ul>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark  text-uppercase fw-bold" type="submit">Modifier</button>
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
