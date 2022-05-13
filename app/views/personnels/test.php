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
            
             $panierExistant = json_decode(SessionHelper::getSession($key));
             print_r($panierExistant);
             echo "<br>";
             echo count($panierExistant);
             echo "<hr>";
            $panierExistant = array_unique($panierExistant);
            print_r($panierExistant);
            echo "<br>";
            echo count($panierExistant);
            echo "<hr>";
            foreach ($panierExistant as $item) {
                echo($item);
                echo "<br>";
            }


            ?>

            <hr> 
        

    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
