<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    
<section class="container ">
        <div class="container mt-5">  
            <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/prixs/createPrix">Ajouter Nouveau Prix</a>
        </div>

        <h5 class="text-center my-4">Modalité prix</h5>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>

        <div class="mb-2  d-flex justify-content-between align-items-center">
			<form class="d-flex" action="ListAdmin.jsp" method="post">
		        <input class="form-control me-2" type="text" name="search" placeholder="Rechercher... " aria-label="Search">
		        <button class="btn btn-dark" type="submit">Rechercher</button>
      	    </form>
		</div>
		
		<div class="table-responsive mb-5">
            <table class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="fw-bold">N°.</th>
                        <th scope="col" class="fw-bold d-none d-sm-table-cell">Code Pack</th>
                        <th scope="col" class="fw-bold">N°. Leads</th>
                        <th scope="col" class="fw-bold">Prix/€</th>
                        <th scope="col" class="fw-bold">Modifier</th>
                        <th scope="col" class="fw-bold">Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($data['prixs'] as $index=>$prix): ?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td class=" d-none d-sm-table-cell"><?php echo $prix->codepack;?></td>
                        <td><?php echo $prix->nbleads;?></td>
                        <td ><?php echo$prix->prix;?></td>    
                        <td><a href="<?php echo URLROOT."/prixs/updatePrix/".$prix->idprix ?>" class="btn btn-outline-success btn-sm" >Modifier</a></td>
                        <td><a href="<?php echo URLROOT."/prixs/deletePrix/".$prix->idprix ?>" class="btn btn btn-outline-danger btn-sm">supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>

    <small>* pk = pack example: PKUNITE est un code de pack un lead</small>

    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
