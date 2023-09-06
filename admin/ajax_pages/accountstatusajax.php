<?php 
include_once('../../config/Db.php');
//include_once('autoload.php');
include_once('../components/DeliverymodeClass.php');

if(isset($_POST['id']))
	{
	$id=$_POST['id'];
	$value=$_POST['value'];
	$table=$_POST['table'];
	 $col=$_POST['col'];


	$driversclass=new DeliverymodeClass();

	 $currentstatus=$driversclass->GetstateByName($table,$col,$id);
	
	if($currentstatus=='1')
	{
		$newstatus='0';
	}
	else
	{
		$newstatus='1';
	}
	$results=$driversclass->updatatypestetus1($id,$newstatus,$col,$table);
	echo $results;
}

?>