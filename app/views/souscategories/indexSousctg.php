<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

            
    <section class="container my-4">
        <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/souscategories/createSousctg">Add Sous Category</a>
        <h3 class="text-center mb-3">List de Sous Category</h3>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
        <div class="mb-2 d-flex justify-content-between align-items-center">
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
                    <th scope="col" class="fw-bold">Sous Category Nom</th>
                    <th scope="col" class="fw-bold">Category Nom</th>
                    <th scope="col" class="fw-bold">Modifier</th>
                    <th scope="col" class="fw-bold">Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($data['souscategories'] as $index=>$souscategory):?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo $souscategory->sctgnom;?></td>
                        <?php foreach($data['categories'] as $index=>$category): 
                            if($souscategory->idctg == $category->idctg){?>
                            <td><?php echo $category->ctgnom;?></td>
                        <?php } endforeach; ?>
                        <td><a href="<?php echo URLROOT . "/souscategories/updateSousctg/".$souscategory->idsctg;?>"  class="btn btn-outline-success btn-sm" >Modifier</a></td>
                        <td><a href="<?php echo URLROOT . "/souscategories/deleteSousctg/".$souscategory->idsctg;?>"  class="btn btn btn-outline-danger btn-sm">supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
