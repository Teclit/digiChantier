<?php
    SessionHelper::confirmLogin();    
    SessionHelper::confirmLoginAdmin();

    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

            
    <section class="container my-4">
    <a class="btn bg-success text-light" href="<?php echo URLROOT; ?>/categories/createCtg">Add Category</a>
    <h5 class="text-center mb-2">List des categories</h5>
        <?php 
            echo SessionHelper::getSession("SuccessMessage");
            echo SessionHelper::getSession("ErrorMessage");
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                <th class="fw-bold" >N°.</th>
                <th class="fw-bold">Category Nom</th>
                <th class="fw-bold">Modifier</th>
                <th class="fw-bold">Supprimer</th>
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
