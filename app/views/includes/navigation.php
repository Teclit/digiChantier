    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark p-0" >
        <div class="container d-flex justify-content-center p-0 ">
            <a class="navbar-brand"href="<?php echo URLROOT; ?>/index"><h4 class="fw-bold">DigicotekPRO</h4></a>
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class=" collapse navbar-collapse py-3" id="navbarSupportedContent">
                <?php 
                    if(SessionHelper::getSession("userRolePro")) {
                        echo require 'navPro.php';
                    } elseif(SessionHelper::getSession("userRoleAdmin")) { 
                        echo require 'navAdmin.php';
                    } else{  
                        echo require 'navDefaut.php';
                    } 
                ?>
            </div>
            <hr>
        </div>
    </nav>