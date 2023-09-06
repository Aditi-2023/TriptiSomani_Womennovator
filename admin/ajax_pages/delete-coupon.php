<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CouponObj=Coupon::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['coupon_id']) && !empty($_POST['coupon_id']))
  {
       $deletecuisine = $CouponObj->deleteCoupon($_POST['coupon_id']);
       if($deletecuisine)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Coupon deleted successfully';
       }
       else
       {
       	 $json['status'] = false;
  	     $json['error'] = 'Some problem occurred. Plese try again!';
       }

       echo json_encode($json);
  }
  else
  {
  	 $json['status'] = false;
  	 $json['error'] = 'Plese try again!';
  	 echo json_encode($json);
  }
?>