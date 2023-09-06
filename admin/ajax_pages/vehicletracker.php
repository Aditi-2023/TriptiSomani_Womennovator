<?php
ob_start();
session_start();
//ini_set('display_errors','1');
header('Content-Type: application/json');
include_once('../../config/Db.php');
include_once('../autoload.php');
$admin_obj=new Admin();
$driverid=$_SESSION['user_sess_id'];
$prevdate=$_POST['prevdate'];
$curdate=$_POST['curdate'];
$driver=$_POST['driver'];
$vehicle=$_POST['vehicle'];
$loading=$_POST['loading'];
$results=$admin_obj->getAllTripsindays($curdate,$prevdate,$driver,$vehicle,$loading);


$final=array("data"=>$results);


echo json_encode($final);
?>