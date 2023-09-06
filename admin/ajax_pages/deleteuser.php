<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $UserObj=User::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['user_id']) && !empty($_POST['user_id']))
  {
       $deleteuser = $UserObj->deleteUser($_POST);
       if($deleteuser)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'User deleted successfully';
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