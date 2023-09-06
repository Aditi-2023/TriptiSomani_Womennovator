<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $attributeObj=new AttributeClass();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['customizevalue_id']) && !empty($_POST['customizevalue_id']))
  {
       $deletecustomizevalue = $attributeObj->deleteCustomizeValue($_POST);
       if($deletecustomizevalue)
       {
       	 $json['status'] = true;
       	 $json['success'] = 'Customize Value deleted successfully';
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