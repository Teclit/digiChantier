<?php
    SessionHelper::confirmLogin();    
    SessionHelper::confirmLoginAdmin();

    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

            
    <section class="container my-4">
        <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/categories/createCtg">Add Category</a>
        <h5 class="text-center my-5">List des categories</h5>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
        <div class="mb-2  d-flex justify-content-between align-items-center">
			<form class="d-flex" action="<?php echo URLROOT; ?>/categories/search" method="GET">
		        <input class="form-control me-2" type="text" name="search" placeholder="Rechercher... " aria-label="Search">
		        <button class="btn btn-dark" type="submit">Rechercher</button>
      	    </form>
		</div>
		
		<div class="table-responsive mb-5">
            <table class="table table-responsive table-hover table-bordered">
                <thead>
                    <tr>
                    <th class="fw-bold" >N°.</th>
                    <th class="fw-bold">Category Nom</th>
                    <th class="fw-bold">Modifier</th>
                    <th class="fw-bold">Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                <?php 

                    $listCtgs = '';
                    if(isset($data['searchCtg'])) {
                        $listCtgs = $data['searchCtg'];
                    }else{
                        $listCtgs = $data['categories'];
                    }

                    // foreach($listCtgs as $index=>$lead):
                    foreach( $listCtgs as $index=>$category):
                ?>
                        <tr>
                            <td scope="row"><?php echo $index+1;?></td>
                            <td><?php echo $category->ctgnom;?></td>
                            <td><a href="<?php echo URLROOT . "/categories/updateCtg/".$category->idctg;?>"  class="btn btn-outline-success btn-sm" >Modifier</a></td>
                            <td><a href="<?php echo URLROOT . "/categories/deleteCtg/".$category->idctg;?>"  class="btn btn btn-outline-danger btn-sm">supprimer</a></td>
                        </tr>
                <?php endforeach; ?>
                    
                </tbody>
        </table>
        </div>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
