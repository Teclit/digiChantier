
<?php

    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<section class="container my-4">
        <div class="container mt-5">  
            <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/professionels/createPro">Add Professionel</a>
        </div>

        <h5 class="text-center my-5">List des professionels</h5>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>

        <div class="mb-2  d-flex justify-content-between align-items-center">
			<form class="d-flex" action="<?php echo URLROOT; ?>/professionels/search" method="GET">
		        <input class="form-control me-2" type="text" name="search" placeholder="Rechercher... " aria-label="Search">
		        <button class="btn btn-dark" type="submit">Rechercher</button>
      	    </form>
		</div>
		
		<div class="table-responsive mb-5">
            <table class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr>
                    <th class="fw-bold ">N°.</th>
                    <th class="fw-bold ">Nom</th>
                    <th class="fw-bold d-none d-lg-table-cell">Telephone</th>
                    <th class="fw-bold d-none d-lg-table-cell">Email</th>
                    <th class="fw-bold d-none d-lg-table-cell">Ville</th>
                    <th class="fw-bold d-none d-lg-table-cell">Code Postale</th>
                    <th class="fw-bold d-none d-lg-table-cell">Date inscrption</th>
                    <th class="fw-bold ">Details</th>
                    <th class="fw-bold ">Modifier</th>
                    <th class="fw-bold ">Supprimer</th>
                    </tr>
                </thead>
                <tbody>


                <?php 
                    $listPros = '';
                    if(isset($data['searchPro'])){
                        $listPros = $data['searchPro'];
                    }else{
                        $listPros = $data['professionels'];
                    }

                    foreach($listPros as $index=>$professionel):
                ?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo $professionel->nom;?></td>
                        <td class=" d-none d-lg-table-cell"><?php echo $professionel->telcontact;?></td>
                        <td class=" d-none d-lg-table-cell"><?php echo $professionel->emailcontact;?></td>
                        <td class=" d-none d-lg-table-cell"><?php echo $professionel->ville;?></td>
                        <td class=" d-none d-lg-table-cell"><?php echo $professionel->codepostal;?></td>
                        <td class=" d-none d-lg-table-cell"><?php echo $professionel->dateinscription;?></td>
                        <td><a href="<?php echo URLROOT ."/professionels/detailPro/". $professionel->idpro;?>" class="btn btn-info btn-sm">Infos</a></td>
                        <td><a href="<?php echo URLROOT ."/professionels/updatePro/". $professionel->idpro;?>" class="btn btn-success btn-sm" >Modifier</a></td>
                        <td><a href="<?php echo URLROOT ."/professionels/deletePro/". $professionel->idpro;?>" class="btn btn-danger btn-sm">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
