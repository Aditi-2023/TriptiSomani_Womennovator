<?php
header('Content-Type: application/json');
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $OrderObj=Order::getinstance();
  if(isset($_POST["driverid"]) && !empty($_POST["driverid"]))
  {
  	  $json=array();
  	  $DriverId=filter_var($_POST["driverid"], FILTER_VALIDATE_INT);
      $restaurantid=filter_var($_POST["restaurantid"], FILTER_VALIDATE_INT);
      $orderId=filter_var($_POST["orderId"], FILTER_VALIDATE_INT);
      $checkDriver=$OrderObj->checkDriverAttachOrNotById($DriverId);
      if($checkDriver)
      {
        $json["message"]=$OrderObj->DriverAttachedOnOrderByDriverId($DriverId,$restaurantid,$orderId);
        $json["status"]=true;
        echo json_encode($json);
      }
      else
      {
        $json["message"]=false;
        echo json_encode($json);
      }
  	  

  }
  ?>