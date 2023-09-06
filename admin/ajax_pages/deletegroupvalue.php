<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $attributeObj=new AttributeClass();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['groupvalue_id']) && !empty($_POST['groupvalue_id']))
  {
       $deletegroupvalue = $attributeObj->deleteGroupValue($_POST);
       if($deletegroupvalue)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Group Value deleted successfully';
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