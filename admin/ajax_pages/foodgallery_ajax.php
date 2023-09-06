<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $GalleryObj=new GalleryClass();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['food_id']) && !empty($_POST['food_id']))
  {
       $changerestaurantstatus = $GalleryObj->deleteGalarryById($_POST["food_id"]);
       if($changerestaurantstatus)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Delete Successfully';
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