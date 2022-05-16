<?php
    SessionHelper::confirmLogin();
    SessionHelper::confirmLoginAdmin();

    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>




<section class="container">
    <?php 
        echo SessionHelper::getSession("SuccessMessage");
        echo SessionHelper::getSession("ErrorMessage");
    ?>
    <h5 class=" pt-5 text-center"> Dashboad</h5>
    <div class="row justify-content-between">
        <input type="hidden" id="totalLeads" name="totalLeads" value="<?php echo count($data['totalLeads']); ?>">
        <input type="hidden" id="totalProfessionels" name="totalProfessionels" value="<?php echo count($data['totalProfessionels']); ?>">
        <input type="hidden" id="totalCommandes" name="totalCommandes" value="<?php echo count($data['totalCommandes']); ?>">
        <input type="hidden" id="totalAdmin" name="totalAdmin" value="<?php echo count($data['totalAdmin']); ?>">
        <input type="hidden" id="totalCategory" name="totalCategory" value="<?php echo count($data['totalCategory']); ?>">
        <input type="hidden" id="totalSouCategory" name="totalSouCategory" value="<?php echo count($data['totalSouCategory']); ?>">
        <input type="hidden" id="totalPosts" name="totalPosts" value="<?php echo count($data['totalPosts']); ?>">
    
        <div class="col-md-6  d-flex align-items-center">
            <canvas class="shadow-lg p-5 " id="myChart" ></canvas>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <canvas class="shadow-lg p-3" id="myChartBar" ></canvas>
        </div>
    </div>

    

    <p class="text-justify text-secondary mt-5">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet consectetur adipiscing elit pellentesque habitant morbi. Ut porttitor leo a diam sollicitudin tempor id eu. Consectetur adipiscing elit ut aliquam. Ultrices dui sapien eget mi proin sed libero enim. Scelerisque viverra mauris in aliquam sem. Amet risus nullam eget felis eget nunc. In tellus integer feugiat scelerisque. Orci a scelerisque purus semper. Amet nulla facilisi morbi tempus iaculis urna id volutpat. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Neque gravida in fermentum et. Fringilla est ullamcorper eget nulla facilisi. Velit dignissim sodales ut eu sem integer. Quisque id diam vel quam. Ullamcorper a lacus vestibulum sed.
    </p>

</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
