    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
        <div class="container d-flex justify-content-center p-0 ">
            <a class="navbar-brand"href="<?php echo URLROOT; ?>/index"><h4 class="fw-bold">DigicotekPRO</h4></a>
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class=" collapse navbar-collapse py-3" id="navbarSupportedContent">
                
                <?php if( !SessionHelper::getSession("userRoleAdmin") && !SessionHelper::getSession("userRolepro") ){ ?> 
                    <?php echo require_once 'navDefaut.php';?>
                <?php } elseif(SessionHelper::getSession("userRoleAdmin")) { ?>
                    <?php echo require_once 'navAdmin.php';?>
                <?php } elseif(SessionHelper::getSession("userRolepro")) {?>
                    <?php echo require_once 'navPro.php';?>
                <?php } ?>
            </div>
            <hr>
        </div>
    </nav>