<?php 
//error_reporting(1);
include_once('conf/Db.php');
include_once('admin/component/AdminClass.php');
$admindata=new AdminClass();

//echo $data;

if(isset($_POST['adminsubmit']))
{
	//echo 'done';
	echo $email=$_POST['username'];
	$pass=$_POST['password'];
	$result=$admindata->checkCredentials($email,$pass);
	if($result){
        header("location:dashboard.php");
    }
    else{
        header("location:index.php?msg=inf");
    }
	
	
}


if(isset($_GET['msg']) && !empty($_GET['msg'])):
  switch ($_GET['msg']) {
    case 'ins':
       $message="Successfully Insert";
       $class="success";
      break;
    case 'inf':
       $message="not inserted data";
        $class="danger";
      break;
    default:
      # code...
      break;
  }

endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>hgrh</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <link rel="stylesheet" href="admin/assets/font/iconsmind-s/css/iconsminds.css">
    <link rel="stylesheet" href="admin/assets/font/simple-line-icons/css/simple-line-icons.css">

    <link rel="stylesheet" href="admin/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/vendor/bootstrap-float-label.min.css">
    <link rel="stylesheet" href="admin/assets/css/main.css">
</head>
<style>
    .card {
        flex-direction: unset;
     }

     .theme-colors
     {
    display:none
   }
  .error
  {
	  color:red!important;
  }

    </style>

<body class="background show-spinner">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side">

                            <p class="text-white h2"></p>

                            <p class="white mb-0">
                              
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="javascript:void(0);">
                         <span class="logo-single"><img src="assets/img/logo.svg" style="width:150%"></span>
                                <?php if(isset($_GET['msg']) && !empty($_GET['msg'])){?>
                                          <div class="col-sm-12">

                              <div class="alert alert-<?=$class;?>" id="mess"><?=$message;?>  </div>
                      </div>  <?php }?> 
                                                </a>
                            <h6 class="mb-4">Login</h6>
                            <form method="post" id="adminloginform" name="adminloginform">
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="email" name="username">
                                    <span>E-mail</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" placeholder="" name="password">
                                    <span>Password</span>
                                </label>
                              <!--   <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">Forget password?</a> -->
									<div class="g-recaptcha" data-sitekey="6LdnK8QaAAAAAO9l4I6g5oSYfqDp7xpY0GiVdEYm"></div>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit" name="adminsubmit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="admin/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="admin/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/js/dore.script.js"></script>
    <script src="admin/assets/js/scripts.js"></script>
     <script src="admin/assets/js/jquery.validate.js"></script>
	 <script src="https://www.google.com/recaptcha/api.js"></script>
      <script>
// Wait for the DOM to be ready
$(function() {
  
  $("form[name='adminloginform']").validate({
   
    rules: {
      
      username: "required",
      
      password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
      username: "Please enter your email",
    
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
     
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
    </script>
</body>

</html>