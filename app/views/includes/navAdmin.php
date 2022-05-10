    <ul class="mx-auto navbar-nav  text-center ">                       
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/dashboard/" target="_self">Dashboard</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/prixs/indexPrix" target="_self">Modalité Prix</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/administrateurs/indexAdmin" target="_self">Administrateur</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/professionels/indexPro">Professionels</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/leads/index" target="_self">Leads</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/categories/indexCtg" target="_self">Category</a></li>
        <li class="nav-item me-2"><a class="nav-link" href="<?php echo URLROOT; ?>/souscategories/indexSousctg" target="_self">Sous Category</a></li>
    </ul>
    <ul class="navbar-nav  text-center">
        <li class="nav-item"><a class="nav-link  fw-bold px-3" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>"><?php echo SessionHelper::getSession("userNom"); ?></a></li>
        <li class="nav-item bg-dark"><a class="nav-link text-light fw-bold px-3" href="<?php echo URLROOT; ?>/users/logout">Log out</a></li>
    </ul>