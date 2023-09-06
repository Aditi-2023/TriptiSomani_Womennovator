<?php
header('Content-Type: application/json');
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $OrderObj=Order::getinstance();
  if(isset($_POST["accept_status"]) && !empty($_POST["accept_status"]))
  {
  	  $json=array();
  	  $orderId=filter_var($_POST["accept_status"], FILTER_VALIDATE_INT);
  	  $json["message"]=$OrderObj->updateOrderStatusById($orderId,'2');
  	  $json["status"]=true;
  	  echo json_encode($json);

  }
  if(isset($_POST["reject_status"]) && !empty($_POST["reject_status"]))
  {
  	  $json=array();
  	  $orderId=filter_var($_POST["reject_status"], FILTER_VALIDATE_INT);
  	  $json["message"]=$OrderObj->updateOrderStatusById($orderId,'3');
  	  $json["status"]=true;
  	  echo json_encode($json);

  }
  ?>