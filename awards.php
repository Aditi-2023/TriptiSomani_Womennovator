<!DOCTYPE html>
<html lang="en">


   <!--Navbar start-->
    <!-- <nav class="autohide navbar navbar-expand-lg navbar-light"> -->
    <?php 
include_once('header.php');
 include_once('conf/Db.php');
 include_once('admin/components/DriverClass.php');
   $driverObj=new DriverClass();
  $awarddata=$driverObj->getalltable('tbl_awardes');
   
?>

    <!--Navbar end-->
    
   <div class="section-parallax" style="background-image: url(img/images/9.jpg);background-position: center;">
            <div class="parallax">
                <div class="container my-5 pt-md-5">
                    <div class="text-center pt-md-5 pt-4">
                        <h1 class="display-4 text-white dm-font mb-2">Awards</h1> 
                    </div>
                </div>
            </div>
        </div>
    
    <div class="section-site bg-white pt-5">
        <div class="container">
            <div class="row g-4">
			<?php foreach($awarddata as $awarddatarr){?>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                    <div class="service-box">
                        <div class="service-img w-100">
                            <img src="photos/<?=$awarddatarr['img']?>" class="img-fluid w-100">
                        </div>
                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5"><?=$awarddatarr['title']?></h4>
                            <span class="text-decoration-none text-white"><?=$awarddatarr['des']?></span>
                        </div>
                    </div>
                </div>
			<?php } ?>
 
            </div>
        </div>
    </div>
    
    <div class="section-site pt-5">
        <div class="container">
            <div class="mb-4 pb-2">
                    <h1 class="mb-2 text-tss-color dm-font"><span class="display-6">ACADEMIC PROFILE</span> </h1>
                <p class="caption">Only <b>0.2%</b> of the applicants Shri Ram College of Commerce at Delhi University were accepted and so it was a privilege that a small town girl from Bareilly, Uttar Pradesh was accepted at one of the most competitive schools in India.  After college, I interned at Grant Thornton India. Subsequently I also did my Post Graduation in Business Law from National Law School, Bangalore. Important subjects include Mathematics, Statistics, Business and Corporate Laws, Corporate Communications and Organisation Behaviour, Macro and Micro Economics, Cost Accounting and Financial Management, Accounting and Taxation (Direct and Indirect). 
</p>
                </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                    <div class="service-box">
                        <div class="service-img w-100">
                            <img src="img/Picture1.png" class="img-fluid w-100" style="object-fit: scale-down;background: #96172d;">
                        </div>
                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5">Masters of Business Law</h4>
                            <span class="text-decoration-none text-white">National Law School Bangalore, 2013</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="service-box">
                        <div class="service-img w-100">
                            <img src="img/Picture2.png" class="img-fluid w-100" style="object-fit: scale-down;background: #000066;;">
                        </div>
                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5">Chartered Accountant</h4>
                            <span class="text-decoration-none text-white">Institute of Chartered Accountants of India, 2007</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="service-box">
                        <div class="service-img w-100">
                            <img src="img/Picture3.png" class="img-fluid w-100" style="object-fit: scale-down;background: #ffffff;border: 1px solid #fae903;">
                        </div>

                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5">Bachelors of Commerce</h4>
                            <span class="text-decoration-none text-white">Shri Ram College of Commerce, University of Delhi, 2005</span>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>



    <!-- footer section start -->
 <?php include_once('footer.php')?>

</body>

</html>