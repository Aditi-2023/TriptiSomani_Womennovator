<?php

class Dashboard extends db
{
	public $conn;
	public static $instance;
	public function __construct()
	{
		$this->conn=parent::__construct();
		self::$instance=$this;
	}

	public static function getinstance()
	{
		if(self::$instance===NULL)
		{
			self::$instance=new self();
		}
		return self::$instance;
	}

/******************************************************************************
	todays orders by country
******************************************************************************/
public function getTodaysOrder($restaurantId=NULL,$countryId=NULL)
{
	$data=array();
	if(!empty($restaurantId))
	{
		$WHERERES=" AND `restaurent_id`=".$restaurantId;
	}
	if(!empty($countryId))
	{
		$WHERECONTRY=" AND `country_id`=".$countryId;
	}
	$sql="SELECT count(`id`) AS COUNTORDER FROM `mz_orders` WHERE `order_date`=CURRENT_DATE() $WHERERES $WHERECONTRY";
	$result=$this->conn->query($sql);
	if($result->num_rows>0)
	{
		$row=$result->fetch_assoc();
		return $row;
	}
	else
	{
		return false;
	}
}
public function getMonthlyOrder($restaurantId=NULL,$countryId=NULL)
{
	$data=array();
	if(!empty($restaurantId))
	{
		$WHERERES=" AND `restaurent_id`=".$restaurantId;
	}
	if(!empty($countryId))
	{
		$WHERECONTRY=" AND `country_id`=".$countryId;
	}
	$sql="SELECT count(`id`) AS COUNTORDER FROM `mz_orders` WHERE MONTH(`order_date`) = MONTH(CURRENT_DATE()) $WHERERES $WHERECONTRY";
	$result=$this->conn->query($sql);
	if($result->num_rows>0)
	{
		$row=$result->fetch_assoc();
		return $row;
	}
	else
	{
		return false;
	}
}
public function getTotalOrder($restaurantId=NULL,$countryId=NULL)
{
	$data=array();
	$countryId=(empty($countryId)) ? '1':$countryId;
	if(!empty($restaurantId))
	{
		$WHERERES=" AND `restaurent_id`=".$restaurantId;
	}
	if(!empty($countryId))
	{
		$WHERECONTRY="`country_id`=".$countryId;
	}
	$sql="SELECT count(`id`) AS COUNTORDER FROM `mz_orders` WHERE $WHERECONTRY $WHERERES";
	$result=$this->conn->query($sql);
	if($result->num_rows>0)
	{
		$row=$result->fetch_assoc();
		return $row;
	}
	else
	{
		return false;
	}
}
public function getOrderStatusByOrderStatusId($restaurantId=NULL,$countryId=NULL,$orderStatus=NULL)
{
	$data=array();
	$countryId=(empty($countryId)) ? '1':$countryId;
	if(!empty($restaurantId))
	{
		$WHERERES=" AND `restaurent_id`=".$restaurantId;
	}
	if(!empty($countryId))
	{
		$WHERECONTRY="`country_id`=".$countryId;
	}
	if(!empty($orderStatus))
	{
		$WHERESTATUS=" AND `order_status_id`=".$orderStatus;
	}
	$sql="SELECT count(`id`) AS COUNTORDER FROM `mz_orders` WHERE $WHERECONTRY $WHERERES $WHERESTATUS";
	$result=$this->conn->query($sql);
	if($result->num_rows>0)
	{
		$row=$result->fetch_assoc();
		return $row;
	}
	else
	{
		return false;
	}
}






}/*end class*/
?>