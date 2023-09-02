<!DOCTYPE html>
<html lang="en">

<?php 
include_once('header.php');
 include_once('conf/Db.php');
  include_once('admin/components/DriverClass.php');
   $driverObj=new DriverClass();
   $gellarydata=$driverObj->getalltable('tbl_gallery');
   //$orderlimit=$driverObj->orderbylimit('tbl_gallery',0,6);
   //print_r($orderlimit);
?>

<body>

    <!--Navbar start-->
    <!-- <nav class="autohide navbar navbar-expand-lg navbar-light"> -->
    

    <!--Navbar end-->
    
   <div class="section-parallax" style="background-image: url(img/gallery/gallery.jpg);background-position: bottom;">
            <div class="parallax">
                <div class="container my-5 pt-md-5">
                    <div class="text-center pt-md-5 pt-4">
                        <h1 class="display-4 text-white dm-font mb-2">Gallery</h1> 
                    </div>
                </div>
            </div>
        </div>
    
    <div class="py-md-5 my-4">  
    <div class="container">
	<?php if($gellarydata){?>
        <ul class="row ps-0">
		<?php foreach($gellarydata as $gellarydatarr){?>
                        <li class="list-unstyled col-md-3">
                            <a href="photos/<?=$gellarydatarr['img']?>" data-lightbox="gallery" class="grid">
                                <figure class="effect-marley"  data-src="photos/<?=$gellarydatarr['img']?>">
                                    <img class="img-fluid" src="photos/<?=$gellarydatarr['img']?>">
                                    <figcaption>
                                        <p> <span class="font-weight-bold text-capitalize text-white"><i class="fas fa-search-plus font-2rem"></i></span></p>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
		<?php } ?>
                        
                    </ul>
	<?php } ?>
        </div>
</div>


   

    <!-- footer section start -->
    <?php include_once('footer.php')?>
 


</body>

</html>