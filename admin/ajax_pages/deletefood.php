<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $foodObj=new FoodClass();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['food_id']) && !empty($_POST['food_id']))
  {
       $deletefood = $foodObj->deleteFood($_POST);
       if($deletefood)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Food deleted successfully';
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