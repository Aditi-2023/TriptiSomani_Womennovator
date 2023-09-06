<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $RestaurantsObj=Restaurants::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['restaurant_id']) && !empty($_POST['restaurant_id']))
  {
       $changerestaurantstatus = $RestaurantsObj->changeRestaurantStatus($_POST);
       if($changerestaurantstatus)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Status changed successfully';
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