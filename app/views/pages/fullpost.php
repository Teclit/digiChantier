<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container text-center my-5   ">
                <div class="card border-0 shadow rounded-3 p-5">
                    <img src="<?php echo $data['post']->image; ?>" height="250" class="img-fluid" alt="...">
                    
                    <div class="card-body">
                        <h5 class="text-start"><?php echo $data['post']->title; ?></h5>
                        <small class="text-start"><?php echo $data['post']->created_at; ?></small>
                        <p class="text-start"><?php echo   $data['post']->body; ?></p>
                    </div>
                    
                </div>

    </section>
<?php
    require APPROOT . '/views/includes/footer.php';
?>
