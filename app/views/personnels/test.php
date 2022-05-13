<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginPro();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        
            <h2 class="text-center">Test file</h2>

            <?php
            

            $key =  "panier-".SessionHelper::getSession("userId");

            $monPn = [312, 401, 15, 401, 3];
            $monPn = (array_diff( [312, 401, 15, 401, 3], [401] ));

            foreach($monPn as $key => $value) {
                echo "$key is at $value <br>";
            }

            ?>

            <hr> 
        

    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
