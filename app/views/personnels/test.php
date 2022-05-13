<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
            <h2 class="text-center">Test file</h2>
            <hr>

            <?php
                var_dump(SessionHelper::getSession(SessionHelper::getSession("userId")));
            ?>

    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
