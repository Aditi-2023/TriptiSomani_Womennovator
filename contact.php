<!DOCTYPE html>
<html lang="en">

  <!-- <nav class="autohide navbar navbar-expand-lg navbar-light"> -->
    <?php 
include_once('header.php');
 include_once('conf/Db.php');
   
?>

<body>

    <!--Navbar start-->
    <!-- <nav class="autohide navbar navbar-expand-lg navbar-light"> -->
   

    <!--Navbar end-->
    
   <div class="section-parallax" style="background-image: url(img/images/5.jpg);background-position: bottom;">
            <div class="parallax">
                <div class="container my-5 pt-md-5">
                    <div class="text-center pt-md-5 pt-4">
                        <h1 class="display-4 text-white dm-font mb-2">Contact Us</h1> 
                    </div>
                </div>
                 <div class="container mt-4"> 
        <div class="row"> 
            <div class="col-md-10 align-self-center offset-md-1">
                <div class="contact-box mt-0 p-4 shadow">
                    <div class="row">
                        <div class="col-md-5 align-self-center mb-4">
                            <img src="img/potrait.jpeg" class="w-100">
                            
                            <div class="p-2">
                                <p class="mb-2">
                                <a href="mailto:Info@TriptiShinghalSomani.com" class="c-a"><i class="fas fa-envelope text-ms-color2 me-2"></i> Info@TriptiShinghalSomani.com</a>
                            </p> 
                             <p class="mb-0"><a href="tel:+919871196636" class="c-a"><i class="fas fa-phone-alt text-ms-color2 me-2"></i> +91 98711 96636</a></p>
                         </div>
                         </div>
                         <div class="col-md-1 text-center">
                             <div class="vr" style="height: 100%;"></div>
                         </div>
                        <div class="col-md-6">
                            <h1 class="mt-4 text-dark fw-bold mb-4 h4"> Get in Touch </h1>
                            <form class="mt-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Name">
                                <label for="floatingInput" class="text-dark">Full Name</label>
                              </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput" class="text-dark">Email address</label>
                              </div>
                              <div class="form-floating mb-3">
                                  <input type="number" class="form-control" id="floatingInput" placeholder="Mobile No.">
                                  <label for="floatingInput" class="text-dark">Mobile Number</label>
                                </div>
                              <div class="form-floating">
                                <textarea type="text" class="form-control" id="floatingPassword" placeholder="message" style="height: 100px;"></textarea>
                                <label for="floatingPassword" class="text-dark">Message</label>
                              </div>
                              <div class="mt-4">
                                <a class="btn btn-tss w-100">Send</a>
                              </div>
                            </form>
                        </div>  
                    </div>
                </div> 
            </div>
        </div>
    </div>
            </div>
        </div>
     


    


    <!-- footer section start -->
 <?php include_once('footer.php')?>
    <!-- footer section end -->

    <!-- Modal -->



    <!-- script start -->
    <!-- script start -->
    <!-- script start -->
    <!-- script start -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/lightbox.min.js"></script>
 
    <!--Animation SCRIPT start-->
    <script src="js/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!--Animation SCRIPT END-->
    <script src="js/main.js"></script>
 


</body>

</html>