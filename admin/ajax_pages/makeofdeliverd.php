<?php 
include_once('../../config/Db.php');
//include_once('autoload.php');
include_once('../components/DeliverymodeClass.php');

if(isset($_POST['id']))
{
	$id=$_POST['id'];
	$driversclass=new DeliverymodeClass();
	$results=$driversclass->deletedatamake($id);
	//echo results;
}

?>