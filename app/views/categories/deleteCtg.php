<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Supprimer le Category</h4>
        <?php echo require_once 'formCtg.php';?>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
