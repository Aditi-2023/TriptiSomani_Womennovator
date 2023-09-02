<!DOCTYPE html>
<html lang="en">

    <?php 
include_once('header.php');
 include_once('conf/Db.php');
 include_once('admin/components/DriverClass.php');
   $driverObj=new DriverClass();
 $event_data=$driverObj->getalltable1('tbl_newroom','2');
   
?>

    <!--Navbar end-->
    
   <div class="section-parallax" style="background-image: url(img/images/7.jpg);background-position: center;">
            <div class="parallax">
                <div class="container my-5 pt-md-5">
                    <div class="text-center pt-md-5 pt-4">
                        <h1 class="display-4 text-white dm-font mb-2">Events</h1> 
                    </div>
                </div>
            </div>
        </div>
    
    <div class="section-site bg-white pt-0">
        <div class="container">
            <div class="row g-4">
			<?php foreach($event_data as $newsroomarr){?>
                <div class="col-md-3" data-aos="fade-up" data-aos-duration="1500">
                    <a href="<?=$$newsroomarr['url']?>" target="_blank" class="service-box">
                        <div class="service-img w-100">
                            <img src="photos/<?=$newsroomarr['img']?>" class="img-fluid w-100">
                        </div>
                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5"><?=$newsroomarr['title']?></h4>
                        </div>
                    </a>
                </div>
			<?php } ?>

                

    
            </div>
        </div>
    </div>



    <!-- footer section start -->
 <?php include_once('footer.php')?>

</body>

</html>