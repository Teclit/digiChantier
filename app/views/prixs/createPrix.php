<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Definir un nouceau Prix</h4>
        <?php echo require_once 'formPrix.php';?>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
