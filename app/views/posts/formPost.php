<?php
    SessionHelper::confirmLogin();    
    SessionHelper::confirmLoginAdmin();
?>

<div class="container text-center my-3 p-5  border-0 shadow rounded ">
    <form action="<?php echo URLROOT."/".$data['actionForm']; ?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
        <div class="mb-2">
            <label for="title" class="form-label fw-bold">Title Post</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            <span class="invalidFeedback"><?php echo $data['titleError']; ?> </span>
        </div>
        
        <div class="mb-2">
            <label for="image" class="form-label fw-bold">Image Post</label>
            <input type="file" name="image" class="form-control" id="image" placeholder="image">
            <span class="invalidFeedback"><?php echo $data['imageError']; ?></span>

        </div>

        <div class="mb-5">
            <label for="body" class="form-label fw-bold">Body Post</label>
            <textarea class="form-control" name="body" id="body" placeholder="Text ..." rows="10"></textarea>
            <span class="invalidFeedback"><?php echo $data['bodyError']; ?></span>

        </div>
        
        <button class=" btn btn-success px-5" name="submit" type="submit"><?php echo $data['submitBtn']; ?></button>

    </form>
</div>
