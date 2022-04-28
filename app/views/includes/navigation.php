        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
            <div class="container d-flex justify-content-center p-0 ">
                <a class="navbar-brand" href="#"><img src="<?php echo URLROOT;?>/public/img/brand.png" id="imgLogo" class="img-thumbnail" alt="Logo"></a>
                <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class=" collapse navbar-collapse py-3" id="navbarSupportedContent">
                    <ul class="mx-auto navbar-nav  text-center ">
                        <li class="nav-item me-2"><a class="nav-link active" href="<?php echo URLROOT; ?>/index" target="_self">Home</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/dashboard/" target="_self">dashboard</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/leads/leadlist" target="_self">Leads</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/categories/listCategories" target="_self">Category</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/administrateurs/listAdministrateur" target="_self">Administrateur</a></li>
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/professionels/listprofessionel" target="_self">Professionels</a></li>
                        
                        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/about" target="_self">about us</a></li>

                    </ul>
                    <ul class="navbar-nav bg-dark text-center">
                        <li class="nav-item">
                                <a class="nav-link text-light" href="<?php echo URLROOT; ?>/users/login">Log in</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link text-light" href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                        </li>
                    </ul>
                </div>
                <hr>
            </div>
        </nav>
        