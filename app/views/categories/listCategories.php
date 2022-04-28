<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <div class="container my-2">  
            <a class="btn bg-success " href="<?php echo URLROOT; ?>/posts/create">Create</a>
    </div>
            
    <section class="container my-4">
        <div class="row g-0">
            <p class="fs-2 fw-bold"> <span class="fs-1" >|</span>Test Category<hr></p>
        </div>
        <div class="row">
            <?php foreach($data['posts'] as $post): ?>
                    <h2><?php echo $post->categoryName."<br>";?></h2>
            <?php endforeach; ?>
        </div>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
