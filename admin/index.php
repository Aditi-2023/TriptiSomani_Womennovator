<?php

ob_start();

session_start();


include_once('../conf/Db.php');

include_once('components/User.php');
$login = new User();

if(isset($_POST['login_submit'])):


    $errorMessage = $login->user_validate($_POST);

    if(empty($errorMessage))

    {
        $dologin = $login->login($_POST);

        if($dologin)

        {

            header("Location:dashboard.php");

        }

        else

        {

            header("Location:index.php?msg=pwf");

        }



    }

endif;

//include_once 'autoload.php';


?>



<!DOCTYPE html>

<html lang="en">

	

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

<meta charset="UTF-8">

<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">

<meta name="Author" content="Spruko Technologies Private Limited">

<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->

<title>Tripti somani | Admin</title>

<!-- Favicon -->

<link rel="icon" href="../img/logo1.png" type="image/x-icon"/>

<!-- Icons css -->

<link href="assets/css/icons.css" rel="stylesheet">

<!--  Custom Scroll bar-->

<link href="assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

<!--  Right-sidemenu css -->

<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

<!-- Sidemenu css -->

<link rel="stylesheet" href="assets/css/sidemenu.css">

<!-- Sidemenu-respoansive-tabs css -->

<link href="assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css" rel="stylesheet">

<!-- Maps css -->

<link href="assets/plugins/jqvmap/jqvmap.min.css" rel="stylesheet">

<!-- style css -->

<link href="assets/css/style.css" rel="stylesheet">

<link href="assets/css/style-dark.css" rel="stylesheet">

<!---Skinmodes css-->

<link href="assets/css/skin-modes.css" rel="stylesheet" />



<!---Switcher css-->

<link href="assets/switcher/css/switcher.css" rel="stylesheet">

<link href="assets/switcher/demo.css" rel="stylesheet">	

<style type="text/css">

	.error

	{

		color:red;

	}

</style>

</head>

	

	<body class="main-body bg-primary-transparent">

		<!-- Loader -->

		<div id="global-loader">

			<img src="../img/tss-logo.png" class="loader-img" alt="Loader" style="width: 210px;">

		</div>

		<!-- /Loader -->

				<div class="container-fluid">

			<div class="row no-gutter">

				<!-- The image half -->

				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">

					<div class="row wd-100p mx-auto text-center">

						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">

							<img src="../img/tss-logo.png" class="my-auto ht-80 mx-auto" alt="logo">

						</div>

					</div>

				</div>

				<!-- The content half -->

				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">

					<div class="login d-flex align-items-center py-2">

						<!-- Demo content-->

						<div class="container p-0">

							<div class="row">

								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">

									<div class="card-sigin">

										<div class="mb-5 d-flex"> <center><img src="../img/tss-logo.png" class="sign-favicon ht-80" alt="logo"></center></div>

										<div class="card-sigin">

											<?php

												if (! empty($errorMessage) && is_array($errorMessage)) 

												{

												?>  

													<div class="alert alert-warning alert-dismissible fade show">

													<strong>Warning!</strong>

													<?php 

													foreach($errorMessage as $message) {

													echo"<p>".$message."</p>";

													}

													?>

													<button type="button" class="close" data-dismiss="alert">&times;</button>

													</div>

													<?php

												}

												else

												{

													if(isset($_GET["msg"]))

													{

														echo $message_show=Db::showMessage($_GET["msg"]);

													}

												}

											?>

											<div class="main-signup-header">

												<!--<h2>Welcome back!</h2>-->

												<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>

												<form name="cubeadmin_login" id="cubeadmin_login" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

													<div class="form-group">

														<label>Mobile/Email</label>

														<input class="form-control" placeholder="Enter your mobile or email" type="text" name="cubeadmin_email" id="cubeadmin_email" required>

													</div>

													<div class="form-group">

														<label>Password</label> 

														<input class="form-control" placeholder="Enter your password" type="password" name="cubeadmin_password" id="cubeadmin_password" required>

													</div>

													<button class="btn btn-main-primary btn-block" type="submit" name="login_submit" id="login_submit">Sign In</button>

												</form>

												<div class="main-signin-footer mt-3">

													<!--<p><a href="#">Forgot password?</a></p>-->

												</div>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div><!-- End -->

					</div>

				</div><!-- End -->

			</div>

		</div>

		

		<!-- Back-to-top -->

<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!-- JQuery min js -->

<script src="assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Bundle js -->

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Ionicons js -->

<script src="assets/plugins/ionicons/ionicons.js"></script>

<!-- Moment js -->

<script src="assets/plugins/moment/moment.js"></script>



<!-- Rating js-->

<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

<script src="assets/plugins/rating/jquery.barrating.js"></script>



<!--Internal  Perfect-scrollbar js -->

<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!--Internal Sparkline js -->

<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Custom Scroll bar Js-->

<script src="assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- right-sidebar js -->

<script src="assets/plugins/sidebar/sidebar.js"></script>

<script src="assets/plugins/sidebar/sidebar-custom.js"></script>

<!-- Eva-icons js -->

<script src="assets/js/eva-icons.min.js"></script>

<!-- Sticky js -->

<script src="assets/js/sticky.js"></script>

<!-- custom js -->

<script src="assets/js/custom.js"></script><!-- Left-menu js-->

<script src="assets/plugins/side-menu/sidemenu.js"></script>



 <!-- Switcher js -->

<script src="assets/switcher/js/switcher.js"></script>

<!-- validate js -->

<script src="assets/js/cube-validate.min.js"></script>

<script src="assets/js/cube-addmethos-validate.min.js"></script>

<script type="text/javascript">

  	var base_url = window.location.origin;





/*********************************************

  Admin Login Form Validation

**********************************************/



  $("#cubeadmin_login").validate({

     errorClass:'error',

     errorElement:'span',

     rules:{

     	cubeadmin_email:{

     		required:true

     	},

     	cubeadmin_password:{

     		required:true

     	}

     },

     messages:{

     	cubeadmin_email:{

     		required:"* Mobile or Email is required.",

     	},

     	cubeadmin_password:{

     		required:"* Password is required."

     	}

     }

  });

  </script>	

<!-- end validate js -->

	</body>



</html>