<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container p-5">
        <h1>test</h1>

        <?php 
            $text ="Tékliàù";
            echo iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $text);

        ?>
        
    </section>



<?php
    require APPROOT . '/views/includes/footer.php';
?>


