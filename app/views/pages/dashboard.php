<?php
    SessionHelper::confirmLoginAdmin();

    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>




<section class="container my-4">

    <h3 class="my-4 text-center"> Dashboad  Page</h3>
    
    <div class="row justify-content-between">
        <div class="col-md-6 ">
            <canvas id="myChart" ></canvas>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <canvas id="myChartBar" ></canvas>
        </div>
    </div>

    

    <p class="text-justify text-secondary mt-5">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet consectetur adipiscing elit pellentesque habitant morbi. Ut porttitor leo a diam sollicitudin tempor id eu. Consectetur adipiscing elit ut aliquam. Ultrices dui sapien eget mi proin sed libero enim. Scelerisque viverra mauris in aliquam sem. Amet risus nullam eget felis eget nunc. In tellus integer feugiat scelerisque. Orci a scelerisque purus semper. Amet nulla facilisi morbi tempus iaculis urna id volutpat. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Neque gravida in fermentum et. Fringilla est ullamcorper eget nulla facilisi. Velit dignissim sodales ut eu sem integer. Quisque id diam vel quam. Ullamcorper a lacus vestibulum sed.
    </p>

</section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
