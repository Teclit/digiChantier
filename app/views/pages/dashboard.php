<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();

    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>




<section class="container mb-5 mt-4  ">
    <?php 
        echo SessionHelper::getSession("SuccessMessage");
        echo SessionHelper::getSession("ErrorMessage");
    ?>
    <h5 class="mb-1 text-center"> Dashboad</h5>
    <div class="row justify-content-between  g-5">
        <input type="hidden" id="totalLeads" name="totalLeads" value="<?php echo count($data['totalLeads']); ?>">
        <input type="hidden" id="totalProfessionels" name="totalProfessionels" value="<?php echo count($data['totalProfessionels']); ?>">
        <input type="hidden" id="totalCommandes" name="totalCommandes" value="<?php echo count($data['totalCommandes']); ?>">
        <input type="hidden" id="totalAdmin" name="totalAdmin" value="<?php echo count($data['totalAdmin']); ?>">
        <input type="hidden" id="totalCategory" name="totalCategory" value="<?php echo count($data['totalCategory']); ?>">
        <input type="hidden" id="totalSouCategory" name="totalSouCategory" value="<?php echo count($data['totalSouCategory']); ?>">
        <input type="hidden" id="totalPosts" name="totalPosts" value="<?php echo count($data['totalPosts']); ?>">
        
        <div class="col-lg-6  d-flex flex-column justify-content-center">
            <p class="text-dark fs-5  text-center">Leads et Professionels et rapport leur commandes</p>
            <canvas class="shadow-lg p-5 " id="myChart" ></canvas>
        </div>

        
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <p class="text-dark fs-5  text-center">Total nombres de Administrateur, Category, Sous Category, et Posts</p>
            <canvas class="shadow-lg p-3" id="myChartBar" ></canvas>
        </div>
    </div>


</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
