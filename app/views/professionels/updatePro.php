<?php
    SessionHelper::confirmLogin();
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section   section class="container text-start my-3 p-1 ">
        <h4 class="text-center fw-bold my-4">Modifier le Professionel</h4>
        <?php echo require_once 'formPro.php';?>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
