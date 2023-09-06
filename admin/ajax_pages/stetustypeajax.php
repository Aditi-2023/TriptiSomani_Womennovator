<?php 
include_once('../../config/Db.php');
//include_once('autoload.php');
include_once('../components/DeliverymodeClass.php');

if(isset($_POST['id']))
	{
	$id=$_POST['id'];
	$value=$_POST['value'];
	//echo $value;
	$table=$_POST['table'];
	//echo $table;
//die;
	$driversclass=new DeliverymodeClass();
	$currentstatus=$driversclass->GetstateByName($table,'status',$id);
	if($currentstatus=='1')
	{
		$newstatus='0';
	}
	else
	{
		$newstatus='1';
	}
	$results=$driversclass->updatatypestetus($id,$newstatus,$table);
	echo $results;
}

?>