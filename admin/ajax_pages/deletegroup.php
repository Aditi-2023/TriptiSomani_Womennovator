<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $attributeObj=new AttributeClass();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['group_id']) && !empty($_POST['group_id']))
  {
       $deletegroup = $attributeObj->deleteGroup($_POST);
       if($deletegroup)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Group deleted successfully';
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