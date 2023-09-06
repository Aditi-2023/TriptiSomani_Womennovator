<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $attributeObj=new AttributeClass();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['group_id']) && !empty($_POST['group_id']))
  {
       $changegroupstatus = $attributeObj->changeGroupStatus($_POST);
       if($changegroupstatus)
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