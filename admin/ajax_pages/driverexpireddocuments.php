<?php
ob_start();
session_start();
//ini_set('display_errors','1');
header('Content-Type: application/json');
include_once('../../config/Db.php');
include_once('../autoload.php');
$admin_obj=new Admin();
$driverid=$_SESSION['user_sess_id'];

$driver=$_POST['driver'];

$results=$admin_obj->getAllDriverExpiredDocuments($driver);


$final=array("data"=>$results);


echo json_encode($final);
?>