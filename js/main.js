$(document).ready(function () {
    var owl = $('.owl-carousel-gallery');
    owl.owlCarousel({
        margin: 20,
        loop: true,
        autoplayTimeout:3000,
        navRewind: true,
        nav: true,
        autoplay: true,
        autoplayHoverPause: false,
        navText: [
            "<i class='bi bi-chevron-left'></i>",
            "<i class='bi bi-chevron-right'></i>"
        ],
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }
    })
}); 

   
   $(document).ready(function () {
            var owl = $('.owl-carousel-testimonial');
            owl.owlCarousel({
                margin: 20,
                loop: true,
                navRewind: true,
                nav: true,
                autoplay: true,
                autoplayHoverPause: false,
                navText: [
                    "<i class='bi bi-chevron-left'></i>",
                    "<i class='bi bi-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        });  
 
        $(document).ready(function () {
            var owl = $('.owl-carousel-parallax');
            owl.owlCarousel({
                margin: 20,
                loop: true,
                navRewind: true,
                nav: true,
                autoplay: true,
                autoplayHoverPause: false,
                navText: [
                    "<i class='bi bi-chevron-left'></i>",
                    "<i class='bi bi-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        });  

 // header-top-fixed Start
 
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 54) {
                $(".navbar-light").addClass("bg-white shadow");
            } else {
                $(".navbar-light").removeClass("bg-white shadow");
            }
        });
 
    // header-top-fixed End
 
        $(window).on("load", function () {
            $("#status").delay(1000).fadeOut("slow");
            $("#preloader").delay(1000).fadeOut("slow");
            $("body").delay(1000).css({
                overflow: "visible",
            });
        });  


        $(".less-all").click(function () {
            $(".less-design").hide();
            $(".see-all").show();
            $(".less-all").hide();
        });

        $(".see-all").click(function () {
            $(".less-design").show();
            $(".see-all").hide(); 
            $(".less-all").show();
        }); 


    // <!--subscribe Pop Up Script START-->
   
        

        
    $(document).ready(function() {
        if (!sessionStorage.getItem('doNotShow')) {
            sessionStorage.setItem('doNotShow', true);

            $(document).ready(function() { 
                $("#subscribe-popup").modal("show");              
                      });



        } else {
            $("body").delay(1000).css({
                overflow: "visible",
            });
            document.getElementById('subscribe-popup').style.display = "none";
        }
    });

    $(window).on("load", function() {
 
    });
 
    // <!--subscribe Pop Up Script End--> 
    
    // about us img animation start
 
    let logo = document.querySelector('.abt-img'); 
        window.addEventListener('scroll', () => { 
          let logoY = 120 - window.scrollY / 4;
          if (logoY >= -150) {
            logo.style.transform = `translateY(${-logoY}px)`; 
          }
        }); 


        let abt = document.querySelector('.abt-imgt'); 
        window.addEventListener('scroll', () => { 
          let abtY = 500 - window.scrollY / 2;
          if (abtY >= -500) {
            abt.style.transform = `translateY(${abtY}px)`; 
          }
        });

        // about us img animation end
 
        $(document).ready(function() {
    
            var counter = 0;
            var c = 0;
            var i = setInterval(function(){
                $(".loading-page .counter h5").html(c + "%"); 
    counter++;
    c++;
    
    if(counter == 101) {
        clearInterval(i);
    }
            }, 5);
        }) 