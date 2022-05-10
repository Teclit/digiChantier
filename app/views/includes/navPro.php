    <ul class="mx-auto navbar-nav  text-center ">
        <li class="nav-item me-2"><a class="nav-link  fw-bold px-3" target="_self" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Accueil</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mon Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mon Panier
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>

        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Mes Projet Accepté</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Projet Disponible</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Service</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">RGE</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">AIDE</a></li>

    </ul>
    <ul class="navbar-nav  text-center">
        <li class="nav-item"><a class="nav-link  fw-bold px-3" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>"><?php echo SessionHelper::getSession("userNom"); ?></a></li>
        <li class="nav-item bg-dark"><a class="nav-link text-light fw-bold px-3" href="<?php echo URLROOT; ?>/users/logout">Log out</a></li>
    </ul>