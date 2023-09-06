<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $foodObj=new FoodClass();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['food_id']) && !empty($_POST['food_id']))
  {
       $changefoodstatus = $foodObj->changeFoodStatus($_POST);
       if($changefoodstatus)
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