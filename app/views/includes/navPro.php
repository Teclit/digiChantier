    <ul class="mx-auto navbar-nav  text-center ">
        <li class="nav-item me-2"><a class="nav-link active" href="<?php echo URLROOT; ?>/index" target="_self">Accueil</a></li>
        <li class="nav-item me-2"><a class="nav-link  text-light fw-bold px-3" target="_self" href="<?php echo URLROOT."/professionels/homePro"?>">Accueil</a></li>
        <li class="nav-item me-2"><a class="nav-link  text-light fw-bold" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Mes Projet Accepté</a></li>
        <li class="nav-item me-2"><a class="nav-link text-light fw-bold" href="<?php echo URLROOT."/personnels/projetDisponible/".SessionHelper::getSession("userId") ; ?>">Projet Disponible</a></li>
        <li class="nav-item me-2"><a class="nav-link text-light fw-bold" href="<?php echo URLROOT."/personnels/test/".SessionHelper::getSession("userId") ; ?>">Test file</a></li>    
        <li class="nav-item bg-dark"><a class="nav-link text-light fw-bold px-3" href="<?php echo URLROOT."/commandes/panier"; ?>"> Mon Panier</a></li>
        <li class="nav-item bg-dark"><a class="nav-link text-light fw-bold px-3" href="<?php echo URLROOT."/commandes/payPanier"; ?>"> Payment</a></li>
        

    </ul>
    <ul class="navbar-nav  text-center">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light fw-bold" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Mon Profile </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li><a class="dropdown-item" href="<?php echo URLROOT."/users/profile" ; ?>"><?php echo SessionHelper::getSession("userNom"); ?></a></li>
                <li><a class="dropdown-item" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Espace Personnel</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item"href="<?php echo URLROOT; ?>/users/logout">Se econnecter</a></li>
            </ul>
        </li>
        <li class="nav-item bg-dark"><a class="nav-link text-light fw-bold px-3" href="<?php echo URLROOT; ?>/users/logout">Se déconnecter</a></li>
    </ul>