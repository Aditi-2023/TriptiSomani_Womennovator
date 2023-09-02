<footer class="footer-section">
        <div class="footer-main pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <a href="index.html"><img src="img/tss-logo.png" style="width: 160px;"></a>
                        <ul class="list-unstyled mt-4  text-dark" style="">
                            <li class="mb-2">
                                <p>ENTERPRENEUR | STRATEGIST | MENTOR | PROBLEM SOLVER | SPEAKER</p>
                            </li>
                        </ul>
                        <ul class="social-list mb-0 p-0">
                            <li>
                                <a class="" href="https://www.facebook.com/triptissomani/" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="https://twitter.com/triptishinghal" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="https://linkedin.com/in/triptishinghalsomani" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="https://www.instagram.com/triptisomani/" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="https://www.womennovator.co.in/" target="_blank">
                                    <img src="img/experience/6.png" style="width: 20px;">
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3 offset-md-1 footer-widget">
                        <h5 class="mb-4">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="index.php" class="footer-link">Home</a></li>
                            <li class="mb-2"><a href="about.php" class="footer-link">About Us</a></li>
                            <li class="mb-2"><a href="awards.php" class="footer-link">Awards</a></li>
                            <li class="mb-2"><a href="events.php" class="footer-link">Events</a></li>
                            <li class="mb-2"><a href="newsroom.php" class="footer-link">Newsroom</a></li>
                            <li class="mb-2"><a href="contact.php" class="footer-link">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 mb-4">
                        <h5 class="mb-4">Contact Us</h5>
                        <p class="mt-4 mb-0"><a href="mailto:Info@TriptiShinghalSomani.com" class="c-a"><i class="fas fa-envelope text-tss-color2 me-2"></i> Info@TriptiShinghalSomani.com</a></p>
                        <p class="my-4"><a href="tel:+919871196636" class="c-a"><i class="fas fa-phone-alt text-tss-color2 me-2"></i>
                                +91 98711 96636</a></p>
                        <!--<p class="mb-0"><a href="#!" target="_blank" class="c-a"><i class="fas fa-map-marker-alt text-tss-color2 me-2"></i>Lajpat Nagar, New Delhi, India</a>
                        </p>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright-text">
                            <p class="mb-0">©2021, <a href="javascript:void(0);">Tripti Shinghal Somani</a>. All Rights Reserved</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </footer>

    <div class="icon-bar d-none d-md-block">
        <a href="https://www.facebook.com/triptissomani/" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/triptishinghal" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://linkedin.com/in/triptishinghalsomani" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
        <a href="https://www.instagram.com/triptisomani/" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
        <!--<a href="#" class="youtube"><i class="fab fa-youtube"></i></a>  -->
    </div>

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

    <!--important for bootstrap 4 carasoul slider-->
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <script src="js/owl.carousel.js"></script>
    <!--Animation SCRIPT start-->
    <script src="js/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!--Animation SCRIPT END-->
    <script src="js/main.js"></script>


    <!--on-scroll-count-number-start-->
    <script>
        var a = 0;
        $(window).scroll(function() {

            var oTop = $('#counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter-value').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },

                        {

                            duration: 2000,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                                //alert('finished');
                            }

                        });
                });
                a = 1;
            }

        });
    </script>