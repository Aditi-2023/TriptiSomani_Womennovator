<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CategoriesObj=Categories::getinstance();
  $json = array();
  header('Content-Type: application/json');
  if(isset($_POST['id_status']) && !empty($_POST['id_status']))
  {
       $id_status=filter_var($_POST['id_status'], FILTER_VALIDATE_INT);
       $statusChanged =  $CategoriesObj->updateCategoryStatusById($id_status);
       if($statusChanged)
       {
       	 $json['status'] = true;
       }
       else
       {
       	 $json['status'] = false;
       }

       echo json_encode($json);
  }