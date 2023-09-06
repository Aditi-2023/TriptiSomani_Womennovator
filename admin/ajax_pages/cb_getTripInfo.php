<?php
ob_start();
session_start();
header('Content-Type: application/json');
include_once('../../config/Db.php');
include_once('../../autoload.php');

$common_obj = new Cb_DriverAndVehicleInfo();
$driversArr=new Cb_Drivers();

$vehicleArr=$driversArr->getAllDataFromTable('pcl_vehicles','vehicle_name');
$driverArr=$driversArr->getAllDataFromTable('pcl_drivers','driver_name');
$loadingArr =$driversArr->getAllDataFromTable('sh_loading_vendor','company_name');
$destinationArr=$driversArr->getAllDataFromTable('sh_vendor','company_name');


	$vid=$_POST['vehicleid'];
	//$sessId=$_SESSION['user_sess_id'];
			$outArr=$common_obj->getVehicleTripDetailsById($vid);
			$from=$outArr['loading_point'];
			$to=$outArr['loading_point_in'];
			$driver=$outArr['driver'];
			$destinationsArr=$common_obj->getDestinationsByTripId($vid);
			$destinations=implode(",",$destinationsArr);
			$vehicleno=$outArr['vehicle_no'];
	
	        $data=array("outdate"=>$outArr['trip_date'],"indate"=>$outArr['trip_date_in'],"from"=>$loadingArr[$from],"to"=>$loadingArr[$to],"meterout"=>$outArr['meterout'],"meterin"=>$outArr['meterin'],"wout"=>$outArr['wayment'],"win"=>$outArr['watyment_in'],"destinations"=>$destinations,"kmpass"=>$outArr['kmpass'],"tolltax"=>$outArr['tolltax'],"driver"=>$driverArr[$driver],"vehicleno"=>$vehicleArr[$vehicleno]);
	
	
	
	$result=array("status"=>true,"message"=>"","data"=>$data );





echo json_encode($result);
?>