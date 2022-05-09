        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
            <div class="container d-flex justify-content-center p-0 ">
                <a class="navbar-brand"href="<?php echo URLROOT; ?>/index"><h4 class="fw-bold">DigicotekPRO</h4></a>
                <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class=" collapse navbar-collapse py-3" id="navbarSupportedContent">
                    <ul class="mx-auto navbar-nav  text-center ">
                        <li class="nav-item me-2"><a class="nav-link active" href="<?php echo URLROOT; ?>/index" target="_self">Accueil</a></li>

                        <?php if(SessionHelper::getSession("userRole")) {?>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/dashboard/" target="_self">dashboard</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/administrateurs/indexAdmin" target="_self">Administrateur</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="Professionel" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Professionels
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="Professionel">
                                <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/professionels/indexPro">Liste Professionels</a></li>
                                <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/professionels/Test">Test-file</a></li>
                            </ul>
                        </li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/leads/index" target="_self">Leads</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/categories/indexCtg" target="_self">Category</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/souscategories/indexSousctg" target="_self">Sous Category</a></li>
                        
                        <?php } else if(!SessionHelper::getSession("userRole")) {?>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/professionels/homePro">Trouver des chantier</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/personnels/indexPerso" target="_self">Espace personnel</a></li>
                        <?php } ?>
                        
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/about" target="_self">A propos </a></li>
                    </ul>
                    <ul class="navbar-nav  text-center">
                        <?php if(null !== SessionHelper::getSession("userId")) : ?>
                            <li class="nav-item">
                                <a class="nav-link  fw-bold px-3" href="<?php echo URLROOT; ?>/users/profile"><?php echo SessionHelper::getSession("userNom"). " ".SessionHelper::getSession("userPrenom"); ?></a>
                            </li>
                            <li class="nav-item bg-dark">
                                <a class="nav-link text-light fw-bold px-3" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item bg-dark">
                            <a class="nav-link text-light fw-bold px-3" href="<?php echo URLROOT; ?>/users/login">Log in</a>
                            </li>
                        <?php  endif; ?>
                    </ul>
                </div>
                <hr>
            </div>
        </nav>
        