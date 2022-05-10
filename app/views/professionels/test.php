<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Test file</h4>
        <?php
            $hash = '$2y$10$R//YYBFXpNvt6PamaadHO.9xAS26S10kiXQQNS7/Z125G6SZ';
            $psw  = 'Test1&&DK';
            echo "<hr>";
            echo $hash;
            echo "<hr> Password_verify-----";
            print_r(password_verify($psw, $hash));

        ?>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
