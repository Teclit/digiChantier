<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

            
    <section class="container my-4">
    <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/categories/createCtg">Add Category</a>
    <h3 class="text-center mb-3">List Administrateur</h3>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">N°.</th>
                <th scope="col">Category Nom</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($data['categories'] as $index=>$category):?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo $category->ctgnom;?></td>
                        <td><a href="<?php echo URLROOT . "/categories/updateCtg/".$category->idctg;?>"  class="btn btn-outline-success btn-sm" >Modifier</a></td>
                        <td><a href="<?php echo URLROOT . "/categories/deleteCtg/".$category->idctg;?>"  class="btn btn btn-outline-danger btn-sm">supprimer</a></td>
                    </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
