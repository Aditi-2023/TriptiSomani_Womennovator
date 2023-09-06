<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CuisinesObj=Cuisines::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['cuisine_id']) && !empty($_POST['cuisine_id']))
  {
       $changecuisinestatus = $CuisinesObj->changeCuisineStatus($_POST);
       if($changecuisinestatus)
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