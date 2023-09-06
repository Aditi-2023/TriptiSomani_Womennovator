<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $RestaurantsObj=Restaurants::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['restaurant_id']) && !empty($_POST['restaurant_id']))
  {
       $deleterestaurant = $RestaurantsObj->deleteRestaurant($_POST);
       if($deleterestaurant)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Restaurant deleted successfully';
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