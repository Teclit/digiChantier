<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-5 p-1  ">

            <h3 class="text-center my-5">Votre commande: <?php echo sizeof($data['commandes']); ?> </h3>
            <?php 
                echo SessionHelper::getSession("SuccessMessage");
                echo SessionHelper::getSession("ErrorMessage");
            ?>
                <table class="table  table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="fw-bold">N°.</th>
                                <th class="fw-bold d-none d-md-table-cell">Commande date</th>
                                <th class="fw-bold d-none d-sm-table-cell">payment date</th>
                                <th class="fw-bold d-none d-sm-table-cell">Totalprix</th>
                                <th class="fw-bold ">Total Leads</th>
                                <th class="fw-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php 
                        foreach($data['commandes'] as $index=>$commande): ?>
                            <tr>
                                <td scope="row"><?php echo $index+1;?></td>
                                <td class="d-none d-md-table-cell"><?php echo $commande->cmddate; ?></td>
                                <td class="d-none d-sm-table-cell"><?php  echo boolval($commande->pymdate) ?  $commande->pymdate :   'Non Payé';?></td>
                                <td class="d-none d-sm-table-cell"><?php echo $commande->totalprix;?></td>
                                <td ><a  class="text-dark fs-3"href="<?php echo URLROOT."/personnels/commandelines/".$commande->idcmd;?>"><?php echo $commande->totalcml;?></a></td>
                                
                                <td>
                                    <?php  if(!boolval($commande->paid)){ ?>
                                        <a href="<?php echo URLROOT."/personnels/leadDetail/".$commande->idcmd;?>" class="btn btn-success btn-sm my-2">Payé</a>
                                    <?php  }?>
                                    <a href="<?php echo URLROOT."/personnels/deleteUserCommande/".$commande->idcmd;?>" class="btn btn-danger btn-sm ">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                            
                        </tbody>
                </table>
            
            <div class="d-flext justify-content-center my-4">
                    <a class="btn btn-dark text-light fw-bold my-3 px-5" href="<?php echo URLROOT."/personnels/indexPerso/".SessionHelper::getSession("userId") ; ?>">Retour</a>
            </div>
    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
