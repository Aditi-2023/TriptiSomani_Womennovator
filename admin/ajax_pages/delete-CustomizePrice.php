<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $RestaurantObj=new Restaurants();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['customizprice_id']) && !empty($_POST['customizprice_id']))
  {
       $customizprice_id=filter_var($_POST['customizprice_id'], FILTER_VALIDATE_INT);
       $deletecustomizevalue = $RestaurantObj->deleteCustomizePriceValue($customizprice_id);
       if($deletecustomizevalue)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Customize Value deleted successfully';
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