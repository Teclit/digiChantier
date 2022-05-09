<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-3 p-1  ">
        <h4 class="text-center my-4">Test file</h4>
        // Declare an array 
        <?php
        echo "<br><hr>";
        $arr = array("Welcome","to", "GeeksforGeeks", 
            "A", "Computer","Science","Portal");  
            
        // Converting array elements into
        // strings using implode function
        echo implode(", ",$arr);

        ?>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
