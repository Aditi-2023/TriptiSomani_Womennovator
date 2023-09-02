<!DOCTYPE html>
<html lang="en">
<?php 

 include_once('conf/Db.php');
 include_once('header.php');
  include_once('admin/components/DriverClass.php');
   $driverObj=new DriverClass();
   $counter=$driverObj->getalltable('tbl_counter');
   $gellarydata=$driverObj->getalltable('tbl_gallery');
   //$orderlimit=$driverObj->orderbylimit('tbl_gallery',0,6);
   //print_r($orderlimit);
?>

<body>


    <!--Navbar end-->


    
    <!--Slider Section Start-->

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay"></div>
                <img class="img-fluid main-slider-img" src="img/bnr/1.jpg">
                <div class="carousel-caption container-fluid text-start">
                    <div class="col-md-5 ps-4">
                        <h2 class="slider-text text-white p-0 mb-4 text-uppercase">
                            MIT GLOBAL STARTUP WORKSHOP
                        </h2>
                        <!--<p class="caption">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>-->
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <img class="img-fluid main-slider-img" src="img/bnr/2.jpg">
                <div class="carousel-caption container-fluid text-start">
                    <div class="col-md-5 ps-4">
                        <h2 class="slider-text text-white p-0 mb-4 text-uppercase">
                            AWARD CEREMONY
                        </h2>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <img class="img-fluid main-slider-img" src="img/bnr/2-2.jpg">
                <div class="carousel-caption container-fluid text-start">
                    <div class="col-md-5 ps-4">
                        <h2 class="slider-text text-white p-0 mb-4 text-uppercase">
                            womennovator global summit
                        </h2>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <img class="img-fluid main-slider-img" src="img/bnr/3.jpg">
                <div class="carousel-caption container-fluid text-start">
                    <div class="col-md-5 ps-4">
                        <h2 class="slider-text text-white p-0 mb-4 text-uppercase">
                            RASOI QUEEN
                        </h2>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <img class="img-fluid main-slider-img" src="img/bnr/4.jpg">
                <div class="carousel-caption container-fluid text-start">
                    <div class="col-md-5 ps-4">
                        <h2 class="slider-text text-white p-0 mb-4 text-uppercase">
                            WASTE MANAGEMENT-GVRIKSH
                        </h2>
                    </div>
                </div>
            </div>
            <!--<div class="carousel-item">
                <div class="overlay"></div>
                <img class="img-fluid main-slider-img" src="img/bnr/5.jpg">
                <div class="carousel-caption container-fluid text-start">
                    <div class="col-md-5 ps-4">
                        <h2 class="slider-text text-white p-0 mb-4 text-uppercase">
                            MIT GLOBAL STARTUP WORKSHOP
                        </h2>
                    </div>
                </div>
            </div>-->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--Slider Section End-->

    <!-- about section start-->
    <div class="section-site bg-white pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="img/potrait2.jpeg" class="img-fluid" data-aos="fade-down" data-aos-duration="1500" style="box-shadow: 10px 10px 0px #fff, 20px 20px 0px #5f01be;">
                </div>
                <div class="col-md-6 offset-md-1">
                    <div class="mt-md-0 mt-5">
                        <h1 class="mb-4 h6"><span class="h4 dm-font">Hi,I’m </span><br> <span class="display-5 dm-font"> Tripti Shinghal Somani</span> <br> ENTERPRENEUR | STRATEGIST | MENTOR | PROBLEM SOLVER | SPEAKER </h1>
                    </div>
                    <p class="caption mb-2">I am a professional Chartered Accountant with 15 years of experience but I am a social entrepreneur at heart. I started Womennovator in 2015, a social impact incubator & platform to foster women entrepreneurship.</p>

                    <p class="caption mb-2"><i class="fw-bold">“You gave wings to those who were meant to crawl.”</i> said Priya Prithviraj Salve when presented with the Womennovator award. This brought tears to my eyes. When they succeed, so do I.  Priya makes Poultry products like Chicken Feeder etc . We helped her grabbed grant of 1 lac from NSIC assisting in her transformation from a hapless to a financially independent woman. Such stories are endless.  Womennovator, through mentorships and connections, is providing a platform to these women to help them become successful. </p>
                    <span class="less-design" style="display: none;"> 
                    <p class="caption mb-2">
                        Today, Womennovator reaches out to over 10,000 women across 90 cities in India & a few cities abroad with focus on 90 sectors . In India, women tend to be the primary caregivers for children, so entrepreneurship allows them to not only work from home but also have flexible hours. The goal is to foster job creators instead of job seekers. 
                        </p>
                    
                    </span>
 
                    <a href="#!" class="btn btn-tss my-4 see-all">Read More <i class="bi bi-chevron-right"></i></a>
                    <a href="#!" class="btn btn-tss my-4 less-all" style="display: none;">Less More <i class="bi bi-chevron-up"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- about section End-->



    <!-- service section start -->

    <div class="section-site bg-white pt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-right" data-aos-duration="1500">
                    <a href="about.php#enterpreneur" class="service-box">
                        <div class="service-img w-100">
                            <img src="img/images/9.jpg" class="img-fluid w-100">
                        </div>
                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5">ENTERPRENEUR</h4>
                            <p class="caption">Everyone knows me by the myriad of roles I play- a Daughter, Wife, Mother, CEO and so on..</p> 
                            <span class="btn btn-sm btn-tss py-2 px-3 font-12">Read More <i class="bi bi-chevron-right"></i></span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                    <a href="about.php#strategist" class="service-box">
                        <div class="service-img w-100">
                            <img src="img/images/4.jpg" class="img-fluid w-100">
                        </div>
                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5">STRATEGIST</h4>
                            <p class="caption">25% of all Government sourcing had to be done from small businesses.</p>
                            <span class="btn btn-sm btn-tss py-2 px-3 font-12">Read More <i class="bi bi-chevron-right"></i></span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
                    <a href="about.php#mentor" class="service-box">
                        <div class="service-img w-100">
                            <img src="img/images/13.jpg" class="img-fluid w-100">
                        </div>

                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5">MENTOR</h4>
                            <p class="caption">A natural Networker, I believe- ‘Success knows no shortcuts’ and I am passionate about coaching the young Entrepreneurs on their journey.</p>
                            <span class="btn btn-sm btn-tss py-2 px-3 font-12">Read More <i class="bi bi-chevron-right"></i></span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                    <a href="about.php#policy-changemaker" class="service-box">
                        <div class="service-img w-100">
                            <img src="img/images/5.jpg" class="img-fluid w-100">
                        </div>
                        <div class="service-content">
                            <h4 class="mb-2 fw-bold h5">POLICY CHANGEMAKER</h4>
                            <p class="caption">The Ministry of Micro, Small & Medium Enterprise had been tasked to work out the details & they invited me to advise on the policy paper.</p>
                            <span class="btn btn-sm btn-tss py-2 px-3 font-12">Read More <i class="bi bi-chevron-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- service section end -->

    <div class="row g-0">
        <div class="col-md-6" style="position: sticky;top: 0;height: 100vh;">
            <img src="img/images/12.jpg" class="img-fluid h-100 w-100" style="object-fit: cover;">
        </div>
        <div class="col-md-6">
            <div class="px-md-5 px-4 py-4" style="background: #e5ebf8;">
                <div class="mb-4 pb-2">
                    <h1 class="mb-2 text-tss-color dm-font"><span class="display-6">IMPORTANT POSITION HELD</span> </h1>
                </div>
                <div class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/1.jpg" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">CEO</h5>
                            <p class="caption mb-2">KGS ADVISORS LLP</p>
                        </div>
                    </div>
                    
                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/6.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">FOUNDER</h5>
                            <p class="caption mb-2">WOMENNOVATOR</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/10.jpg" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">FOUNDER</h5>
                            <p class="caption mb-2">INCUPEDIA</p>
                        </div> 
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/12.jpg" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">FOUNDER</h5>
                            <p class="caption mb-2">BECONOMY</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/2.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">FOUNDER</h5>
                            <p class="caption mb-2">GVRIKSH</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/11.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">CO-FOUNDER</h5>
                            <p class="caption mb-2">QUEEN Xl CRICKET LEAGUE</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/9.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">ORGANIZER</h5>
                            <p class="caption mb-2">MIT GLOBAL STARTUP WORKSHOP</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/8.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">TEDx</h5>
                            <p class="caption mb-2">SPEAKERS</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/14.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">CO-ORGANIZER</h5>
                            <p class="caption mb-2">SEASIDE STARTUP SUMMIT-GOA</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/3.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">FOUNDING PRESIDENT</h5>
                            <p class="caption mb-2">CONFEDERATION OF WOMEN ENTREPRENEURS</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/5.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">CHAIRPERSON, NOS COMMITTEE</h5>
                            <p class="caption mb-2">MEPSC SKILL COUNCIL, MINISTRY OF SKILL DEVELOPMENT AND ENTREPRENEURSHIP</p>
                        </div>
                    </div> 

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/7.jpg" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">FOUNDER</h5>
                            <p class="caption mb-2">STEM ED KIDS</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/13.png" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">MEMBER OF ADVISORY BOARD</h5>
                            <p class="caption mb-2">DELHI CORPORATE CUP</p>
                        </div>
                    </div>

                    <div class="mb-4 pb-4 border-bottom d-flex">
                        <img src="img/experience/4.jpg" class="experience-img">
                        <div class="mb-0 align-self-center">
                            <h5 class="mb-0">FOUNDER</h5>
                            <p class="caption mb-2">RASOI QUEEN</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="section-site">
        <div class="container" style="zoom: 0.9;">
            <div class="row animate__animated animate__fadeInUp" id="counter">
			<?php if(!empty($counter)){
foreach($counter as $counterarr)
{	
//print_R($counterarr);			
			
			?>
                <div class="col-md-3">
                    <a href="javascript:void(0);" class="grid gallery mb-md-0 mb-4">
                        <div class="">
                            <img src="photos/<?=$counterarr['img']?>" class="service-icon2">
                            <div class="py-2">
                                <div class="text-black font-14"><?=$counterarr['title']?></div>
                            </div>
                            <h5 class="card-title mb-0">
                                <span class="font-3rem fw-bold text-tss-color counter-value" data-count=""><?=$counterarr['des']?></span><span class="font-3rem text-theme-color">+</span>
                            </h5>
                        </div>
                    </a>
                </div>
			<?php } } ?>
              
                
                
            </div>
        </div>
    </div>


    <!--parallax section start-->
    <div class="section-parallax">
        <div class="parallax">
            <div class="container">
                <div class="mb-4 pb-2 text-center">
                    <h1 class="mb-2 dm-font"><span class="display-6">MOTIVATIONAL SPREAKER</span> </h1>
                </div>
                <div class="my-5" style="background: #ffffff36;backdrop-filter: blur(9px);border-radius: 12px;overflow: hidden;">
                    <div class="row m-0 g-0">
                        <div class="col-md-5 align-self-center">
                            <iframe width="100%" height="350" src="https://www.youtube.com/embed/QIP3RN55slY" style="display: block;">
                            </iframe>
                        </div>
                        <div class="col-md-6 align-self-center px-md-5 px-4">
                            <div class="mt-md-0 mt-5">
                                <h1 class="mb-3 text-white h4">Mental Strength over Mental Block connect program</h1>
                            </div>
                            <p class="text-white caption mb-2"> Youtube Video on Mental Strength over Mental Block connect program by | Tripti Shinghal Somani | TEDxYouth@DPSRKPuram
                            </p>
                        </div>
                    </div>
                </div>
                <div class="my-5" style="background: #ffffff36;backdrop-filter: blur(9px);border-radius: 12px;overflow: hidden;">
                    <div class="row m-0 g-0">
                        <div class="col-md-6 order-md-1 order-2 align-self-center px-md-5 px-4">
                            <div class="mt-md-0 mt-5">
                                <h1 class="mb-3 text-white h4">Don't Be A Wifi, Be A Hostspot
                                </h1>
                            </div>
                            <p class="text-white caption mb-2"> Tripti Somani | TEDxTajNagri</p>
                        </div>
                        <div class="col-md-5 order-md-2 order-1 offset-md-1 align-self-center">
                            <!--<img src="img/new.png" class="img-fluid w-100">-->
                            <iframe width="100%" height="350" src="https://www.youtube.com/embed/HL5sHUzqFzA" title="Don't Be A Wifi, Be A Hostspot  | Tripti Somani | TEDxTajNagri" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen  style="border:none;overflow:hidden;display: block;object-fit: contain"></iframe> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--parallax section end-->

    <!-- testimonial start -->
    <div class="section-site bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-4">
                        <!-- <p class="mb-0 text-dark">Our Clients</p> -->
                        <h1 class="mb-4 text-tss-color text-center dm-font"><span class="display-6">From Ministers and Officials</span> </h1>
                    </div>
                    <div class="mt-0">
                        <div class="owl-carousel owl-carousel-testimonial owl-theme owl-loaded owl-drag">
                            <div class="item testimonial-bg" onClick="">
                                <div class="row">
                                    <div class="col-md-5 offset-md-1 align-self-center testimonial-caption">
                                        <p>MIT Global Startup Workshop</p>
                                        <figcaption class="blockquote-footer mt-0">
                                            <span class="fw-bold text-tss-color fst-italic"> Mr. Jayesh Ranjan - Telangana IT Secretary </span>
                                        </figcaption>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FKGSadvisors%2Fvideos%2F1596062303818269%2F&show_text=0&width=350" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="item testimonial-bg" onClick="">
                                <div class="row">
                                    <div class="col-md-5 offset-md-1 align-self-center testimonial-caption">
                                        <p>Seaside Startup Summit Goa </p>

                                        <figcaption class="blockquote-footer mt-0">
                                            <span class="fw-bold text-tss-color fst-italic"> Hon'ble Minister Shri Suresh Prabhu - Ministry of Commerce and Industry, Government of India, Government of India </span>
                                        </figcaption>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FKGSadvisors%2Fvideos%2F1596062303818269%2F&show_text=0&width=350" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="item testimonial-bg" onClick="">
                                <div class="row">
                                    <div class="col-md-5 offset-md-1 align-self-center testimonial-caption">
                                        <p>Scope Corporate communication event</p>

                                        <figcaption class="blockquote-footer mt-0">
                                            <span class="fw-bold text-tss-color fst-italic"> Honourable Minister Shri Suresh Prabhu - Minister of Ministry of Commerce and Industry, Government of India </span>
                                        </figcaption>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FKGSadvisors%2Fvideos%2F1596062303818269%2F&show_text=0&width=350" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial end-->
    
    
  
    <!-- section start -->
    <div class="section-site" style="background: #ccccfc;">
        <div class="container">
        <div class="row">
            <div class="col-md-4 align-self-center">
                <div class="mb-4 p-2">
                    <h1 class="mb-0 text-tss-color dm-font h2">Being Social Through <br><span class="display-6"> Social Media</span> </h1>
                </div>
            </div> 
            
            <div class="col-md-8">
            <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="https://www.instagram.com/reel/CN4hDmyFg1q/?igshid=131rt0y7gq368" target="_blank" class="instagram-box">
                <img src="img/instagram/1.jpg" class="w-100">
                    <i class="fab fa-instagram"></i>
                    </a>
                </div> 
            <div class="col-md-3">
                <a href="https://www.instagram.com/reel/CNt_tzWl4rH/?igshid=jg9fgqw75y3t" target="_blank" class="instagram-box">
                <img src="img/instagram/2.jpg" class="w-100">
                    <i class="fab fa-instagram"></i>
                    </a>
                </div> 
            <div class="col-md-3">
                <a href="https://www.instagram.com/reel/CN2EAmDluOh/?igshid=1e4oy9nfhvktu" target="_blank" class="instagram-box">
                <img src="img/instagram/3.jpg" class="w-100">
                    <i class="fab fa-instagram"></i>
                    </a>
                </div> 
            <div class="col-md-3">
                <a href="https://www.instagram.com/reel/CNcahvcF3ux/?igshid=1g6xha7ybanb" target="_blank" class="instagram-box">
                <img src="img/instagram/4.jpg" class="w-100">
                    <i class="fab fa-instagram"></i>
                    </a>
                </div> 
            </div>
            </div>
            <!--<div class="col-md-12">
                <div class="mt-4">
                    <ul class="p-0 owl-carousel owl-carousel-gallery owl-theme owl-loaded owl-drag">
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as1.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as2.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as3.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as4.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as5.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as7.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as8.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as9.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as10.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as11.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as12.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as13.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as14.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as15.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as16.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as18.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as19.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as21.jpg">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as22.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as23.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as24.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as25.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as26.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as27.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as28.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as29.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as30.png">
                                </figure>
                            </a>
                        </li>
                        <li class="list-unstyled item">
                            <a href="#!" class="grid">
                                <figure class="effect-marley">
                                    <img class="img-fluid" src="img/associations/as31.png">
                                </figure>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>-->
        </div>
        </div>
    </div>
    <!-- section end -->

        <!-- section start -->
    <div class="section-site py-4 mb-0 border-bottom" style="background: #f6f6fa;">
        <div class="container">
            <div class="col-md-12 align-self-center">
                <div class="mb-4 text-center p-2">
                    <h1 class="mb-0 text-tss-color dm-font"><span class="display-6"> Gallery </span> </h1>
                </div>
            </div>  
            
            <div class="col-md-12">
                <div class="mt-4">  
                    <ul class="p-0 owl-carousel owl-carousel-gallery owl-theme owl-loaded owl-drag">
					<?php foreach($gellarydata as $gellarydatarr){?>
                        <li class="list-unstyled item">
                            <a href="img/gallery/1.jpg" data-lightbox="gallery" class="grid">
                                <figure class="effect-marley"  data-src="img/gallery/1.jpg">
                                    <img class="img-fluid" src="photos/<?=$gellarydatarr['img']?>">
                                    <figcaption>
                                        <p> <span class="font-weight-bold text-capitalize text-white"><i class="fas fa-search-plus font-2rem"></i></span></p>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
					<?php } ?>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- section end -->



    <!-- footer section start -->
    <?php include_once('footer.php')?>
    <!--on-scroll-count-number-end-->


</body>

</html>