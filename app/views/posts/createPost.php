<?php
    SessionHelper::confirmLogin();    
    SessionHelper::confirmLoginAdmin();

    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
    <h5 class="text-center my-4">Creer Un Nouveau Post</h5>
        <?php echo require_once 'formPost.php';?>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
