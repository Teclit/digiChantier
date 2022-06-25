<?php
    SessionHelper::confirmLogin();    
    SessionHelper::confirmLoginAdmin();
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <section class="container mb-5">
        <div class="d-flex flex-row my-5 ">
            <a href="<?php echo URLROOT . "/posts/createPost" ?>" class="btn btn-success d-inline me-5 px-5 fw-bold">create posts </a>
            <p class=" ms-5 fs-4 text-center "> List de  Notre Blog</p>
        </div>
        

        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="fw-bold">N°.</th>
                    <th class="fw-bold">Titre</th>
                    <th class="fw-bold ">Auteur</th>
                    <th class="fw-bold d-none d-lg-table-cell">Image</th>
                    <th class="fw-bold d-none d-sm-table-cell">Date Created</th>
                    <th class="fw-bold d-none d-lg-table-cell">Content</th>
                    <th class="fw-bold">Preview</th>
                    <th class="fw-bold">Modifier</th>
                    <th class="fw-bold">Supprimer</th>
                    
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($data['posts'] as $index=>$post): ?>
                    <tr>
                        <td scope="row"><?php echo $index+1;?></td>
                        <td><?php echo substr($post->title, 0, 20)." .."; ?></td>
                        <td class=""><?php echo $post->prenom;?></td>
                        <td class="d-none d-lg-table-cell"><img src="<?php echo URLROOT;?>/public/uploads/<?php echo $post->image; ?>" width="180px;" height="70px" alt="<?php echo substr($post->title, 0, 10); ?>"></td>
                        <td class="d-none d-sm-table-cell"><?php echo $post->created_at;?></td>
                        <td class="d-none d-lg-table-cell"><?php echo substr($post->body, 0, 150)." ...";?></td>
                        <td> <small><a href="<?php echo URLROOT . "/pages/fullpost/".$post->idpost    ?>" class="btn btn-dark btn-sm">Preview</a></small></td>
                        <td> <small><a href="<?php echo URLROOT . "/posts/updatePost/".$post->idpost  ?>" class="btn btn-primary btn-sm">Modifier</a></small></td>
                        <td> <small><a href="<?php echo URLROOT . "/posts/deletePost/".$post->idpost  ?>" class="btn btn-danger btn-sm">Supprimer</a></small></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </section>



<?php
    require APPROOT . '/views/includes/footer.php';
?>