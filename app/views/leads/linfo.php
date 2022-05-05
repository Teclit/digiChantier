<?php
    SessionHelper::confirmLoginAdmin();
    
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <div class="container my-2">  
            <a class="btn bg-success " href="<?php echo URLROOT; ?>/posts/create">Create</a>
    </div>
            
    <section class="container my-4">
        <h2>Lead Infos</h2>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
