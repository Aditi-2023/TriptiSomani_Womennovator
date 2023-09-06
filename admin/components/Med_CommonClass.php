<?php
class Med_CommonClass extends Db
{
	public $conn;
	public $name;
	public $status; 
	
	public function __construct() 
	{
		
		$this->conn = parent::__construct();
	}

// delivery mode******************************



 public function getalltable($table)
{
		$sql="SELECT * from `$table` WHERE  `view`='1' order by id DESC";
		//echo $sql;
	   $result=$this->conn->query($sql);
	   $fetchAll = $result->fetch_All(MYSQLI_ASSOC);
	   return $fetchAll;
	   
}


public function filterapplicantbypost($job_id)
{
		$sql="SELECT * from `med_job_applied` WHERE  `job_id`='$job_id' order by `id` DESC";
		// echo $sql;
	   $result=$this->conn->query($sql);
	   $fetchAll = $result->fetch_All(MYSQLI_ASSOC);
	   return $fetchAll;
	   
}




	public function GetDataById($table,$id)
	{
		 	$sql ="select * from `$table` where `id` = '$id'";
			$results=$this->conn->query($sql);
		    $fetch=$results->fetch_assoc();
			 return $fetch;
	}



// setting function*******



public function DeleteDataById($id,$table)
{
		$sql="UPDATE `$table` set `view`='0' WHERE `id`='$id'";
		// echo $sql;
		// die();
	   $result=$this->conn->query($sql);
	   if($result)
	   {
		   return true;
	   }
}

public function ActiveDeactiveDataById($id,$val,$table)
{
	if($val=='0')
	{
		$finalval='1';

	}
	else
	{
		$finalval='0';
	}
	$sql="UPDATE `$table` SET `status`='$finalval' WHERE `id`='$id'";
	   $result=$this->conn->query($sql);
	   if($result)
	   {
		   return true;
	   }
}


}
?>