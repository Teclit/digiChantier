<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

            
    <section class="container my-4">

        <h1 class="text-center">Leads Chantier</h1>

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
                        <td> <a href="<?php echo URLROOT; ?>/leads/updateLead" class="btn btn-outline-success btn-sm" >Modifier</a></td>
                        <td><a href="<?php echo URLROOT; ?>/leads/deleteLead" class="btn btn btn-outline-danger btn-sm">supprimer</a></td>
                    </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
