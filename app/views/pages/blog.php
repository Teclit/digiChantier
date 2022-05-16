<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container">
        <h4 class="text-center fw-bold">Notre Blog</h4>
        <div class="row row-cols-1 row-cols-md-3 g-4 my-5">
            <?php  foreach($data['posts'] as $key=>$post): ?>
                <div class="col ">
                    <div class="card border-0 shadow rounded-3 ">
                        <img src="<?php echo URLROOT;?>/public/uploads/<?php echo $post->image; ?>" class="card-img-top" alt="<?php echo substr($post->title, 0, 20); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo substr($post->title, 0, 200)." .."; ?></h5>
                            <small class="text-secondary"><?php echo $post->created_at; ?></small>
                            <p class="card-text"><?php echo  substr($post->body, 0, 250)." ..."; ?></p>
                            <a href="<?php echo URLROOT . "/pages/fullpost/".$post->idpost    ?>" class="btn btn-dark">Lire la suite</a>
                        </div>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row justify-content-center ">
            <a href="<?php echo URLROOT ."/pages/blog" ?>" class=" col-2 btn btn-dark mb-5 d-inline">+ Posts</a>
        </div>
    </section>



<?php
    require APPROOT . '/views/includes/footer.php';
?>


