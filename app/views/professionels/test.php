<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Test file</h4>
        // Declare an array 
        <?php
            $hash = '$2y$10$zq5WZ88qsOoSiAB6s9VqaeIzUJ.n/ZE.pg4yh5U/0OCK.ivh';
            $psw  = 'Solomon2022&&';

            echo $hash;
            echo "<hr>";
            print_r(password_verify($psw, $hash));

        ?>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
