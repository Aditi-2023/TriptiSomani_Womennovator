<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $UserObj=User::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['user_id']) && !empty($_POST['user_id']))
  {
       $changeuserstatus = $UserObj->changeUserStatus($_POST);
       if($changeuserstatus)
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