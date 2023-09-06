<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CuisinesObj=Cuisines::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['cuisine_id']) && !empty($_POST['cuisine_id']))
  {
       $deletecuisine = $CuisinesObj->deleteCuisine($_POST['cuisine_id']);
       if($deletecuisine)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Cuisine deleted successfully';
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