<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<section class="container my-4 p-5 ">

    <h1>List Administrateur</h1>

    <?php foreach($data['administrateurs'] as $administrateurs): ?>
        <h3><?php echo $administrateurs->nom;?></h3>
    <?php endforeach; ?>


    
</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
