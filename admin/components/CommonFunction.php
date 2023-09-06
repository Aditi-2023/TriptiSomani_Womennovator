<?php

class CommonFunction extends Db
{
	public $conn;
	public static $instance;
	public function __construct()
	{
		$this->conn=parent::__construct();
		return $this->conn;
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
	public function random_strings($length_of_string) 
	{ 
	    $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; 
	    return substr(str_shuffle($str_result), 0, $length_of_string); 
	}
	/********************************************
		Get State name
	***********************************************/

	public function getStateName($id=NULL)
	{
		$where="";
		$data=array();
		if(!empty($id))
		{
			$where="AND `id`=".$id;
		}
		$sql="SELECT * FROM `mz_state` WHERE `view`='1' $where";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}

	/********************************************
		Get User Type
	***********************************************/

	public function getUserType($id=NULL)
	{
		$where="";
		$data=array();
		if(!empty($id))
		{
			$where="AND `id`=".$id;
		}
		$sql="SELECT * FROM `mz_user_type` WHERE `view`='1' AND `id` !='4' $where";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}

	/********************************************
		Get User name
	***********************************************/

	public function getUserName($id=NULL)
	{
		$where="";
		$data=array();
		if(!empty($id))
		{
			$where="AND `id`=".$id;
		}
		$sql="SELECT * FROM `mz_admin` WHERE `view`='1' $where";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}
	public function getUserNameByCountryId($countryid=NULL,$type=NULL,$ownerId=NULL)
	{
		$wherecount="";
		$wheretype="";
		$wheretype2="";
		$data=array();
		if(!empty($countryid))
		{
			$wherecount="AND `country_id`=".$countryid;
		}
		if(!empty($type))
		{
			$wheretype="AND `usertype`=".$type;
		}
		if(!empty($ownerId))
		{
			$wheretype2="AND `owner`!=".$ownerId;
		}
		$sql="SELECT * FROM `mz_admin` WHERE `view`='1' $wherecount $wheretype AND `id` NOT IN(SELECT `owner` FROM `mz_restaurants` WHERE `country_id`='$countryid' AND `status`='1' AND `view`='1' $wheretype2) ORDER BY `user_name` DESC";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}

	/********************************************
		Get Cusinesname
	***********************************************/

	public function getCusinesName($id=NULL)
	{
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$where="";
		$data=array();
		if(!empty($id))
		{
			$where="AND `id`=".$id;
		}
		$sql="SELECT * FROM `mz_cusines` WHERE `view`='1' AND `country_id`='$countryid' $where ORDER BY `name` ASC";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}

	/***********************************************
	 Get Table Records For Pagination
	************************************************/

	public function getTotalNumberOfRecordAnyTable($table)
	{
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$where=' AND `country_id`='.$countryid;
		$data=array();
		$sql="SELECT COUNT(*) AS rowCount FROM $table WHERE `view`='1' $where";
		$result=$this->conn->query($sql);
		$data=$result->fetch_assoc();
		return $data;

	}

	public function getAllRecordsAnyTable($table,$limit)
	{
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$where=' AND `country_id`='.$countryid;
		$data=array();
		$sql="SELECT * FROM $table WHERE `view`='1' $where ORDER BY `id` DESC LIMIT $limit";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}

			return $data;
		}
		else
		{
			return false;
		}
	}

	public function getTotalNumberOfRecordAnyTableAjax($table,$where,$orderby)
	{
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$whereto=' AND `country_id`='.$countryid;
		$data=array();
		$sql="SELECT COUNT(*) AS rowCount FROM $table $where $whereto $orderby";
		$result=$this->conn->query($sql);
		$data=$result->fetch_assoc();
		return $data;

	}

	public function getAllRecordsAnyTableAjax($table,$limit=NULL,$where,$orderby,$offset)
	{
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$whereto=' AND `country_id`='.$countryid;
		$data=array();
		$sql="SELECT * FROM $table $where $whereto $orderby LIMIT $offset,$limit";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}

			return $data;
		}
		else
		{
			return false;
		}

	}

	/*************************************************
	Get Restaturants Details By usertype
	**************************************************/
	public function getRestaurantsDetails()
	{
		$data=array();
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$whereto=' AND `country_id`='.$countryid;
		$usertype=(!empty($_SESSION['user_sess'])) ? $_SESSION['user_sess']['usertype'] : '';
		$userid=(!empty($_SESSION['user_sess'])) ? $_SESSION['user_sess']['userid'] : '';
		if($usertype==='1')
		{
			$sql="SELECT * FROM `mz_restaurants` WHERE `view`='1' $whereto";
		}
		else
		{
			$sql="SELECT * FROM `mz_restaurants` WHERE `view`='1' AND `owner`='$userid'";
		}

		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;
	}

	public function getRestaurantsDetailsByid($id)
	{
		$data=array();
		$sql="SELECT * FROM `mz_restaurants` WHERE `view`='1' AND `id`='$id'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			$data=$row;
		}
		return $data;
	}

	/********************************************
		Get country name
	***********************************************/

	public function getCountryName($id=NULL)
	{
		$where="";
		$data=array();
		if(!empty($id))
		{
			$where="AND `id`=".$id;
		}
		$sql="SELECT * FROM `mz_country` WHERE `status`='1' AND `view`='1' $where ORDER BY `id` DESC";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}

	/********************************************
		Get State name By country id
	***********************************************/

	public function getStateNameByCountryId($id=NULL)
	{
		$where="";
		$data=array();
		if(!empty($id))
		{
			$where="AND `country_id`=".$id;
		}
		$sql="SELECT * FROM `mz_state` WHERE `view`='1' $where ORDER BY `name` ASC";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}

	/***********************************************
	 Check Restaurant Exist In Country Or Not
	*************************************************/
     public function checkRestaurantExistInCountryOrNot($rest_id)
     {
     	 $country_id = (isset($_SESSION['country']['countryid']) && !empty($_SESSION['country']['countryid'])) ? $_SESSION['country']['countryid'] : '1';
     	 $select = $this->conn->query("SELECT * FROM `mz_restaurants` WHERE `id` = '".$rest_id."' AND `country_id` = '".$country_id."' AND `status` = 1 AND `view` = 1");
     	 if($select->num_rows > 0)
     	 {
     	 	 return true;
     	 }
     	 else
     	 {
     	 	return false;
     	 }
     }

	/***************************************************
	  Check Restaurant Exist In Country Or Not
	*****************************************************/
	public function getFoodsDetailsByFoodId($foodid)
	{
		$data=array();
		$sql="SELECT * FROM `mz_food` WHERE `status`='1' AND `view`='1' AND `id`='$foodid'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			$data=$row;
		}
		return $data;
	}
	/***********************************************
	 Get Customize master value By restaurant id
	*************************************************/
     public function getCustomizemastervalueByrestaurantid($rest_id)
     {
     	 $data=array();
     	 $country_id = (isset($_SESSION['country']['countryid']) && !empty($_SESSION['country']['countryid'])) ? $_SESSION['country']['countryid'] : '1';
     	 $sql="SELECT * FROM `mz_customize` WHERE `status`='1' AND `view`='1' AND `restaurent_id`='$rest_id' AND `country_id`='$country_id'";
     	 $select = $this->conn->query($sql);
     	 if($select->num_rows > 0)
     	 {
     	 	 while ($row=$select->fetch_assoc()) {
     	 	 	$data[]=$row;
     	 	 }
     	 	 return $data;
     	 }
     	 else
     	 {
     	 	return false;
     	 }
     }
     public function getCustomizemasterById($id)
     {
     	 $data=array();
     	 $country_id = (isset($_SESSION['country']['countryid']) && !empty($_SESSION['country']['countryid'])) ? $_SESSION['country']['countryid'] : '1';
     	 $sql="SELECT * FROM `mz_customize` WHERE `status`='1' AND `view`='1' AND `id`='$id' AND `country_id`='$country_id'";
     	 $select = $this->conn->query($sql);
     	 if($select->num_rows > 0)
     	 {
     	 	 $row=$select->fetch_assoc();
     	 	 $data=$row;
     	 	 return $data;
     	 }
     	 else
     	 {
     	 	return false;
     	 }
     }

     public function getCustomizeValueByMasterId($custmId)
     {
     	$data=array();
		$sql="SELECT * FROM `mz_customize_values` WHERE `customize_id`='$custmId' AND `status`='1' AND `view`='1'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
			
		}
		return $data;
     }
     public function getCustomizeValueById($id)
     {
     	$data=array();
		$sql="SELECT * FROM `mz_customize_values` WHERE `id`='$id' AND `status`='1' AND `view`='1'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			$data=$row;
		}
		return $data;
     }
     public function getCustomizepriceDetailsById($customizepriceid)
     {
     	$data=array();
		$sql="SELECT * FROM `mz_food_customizeprice` WHERE `id`='$customizepriceid' AND `view`='1' AND `status`='1'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			$row=$result->fetch_assoc();
			return $row;
		}
     }
     public function getAllCustomizePriceByFoodid($foodid)
     {
     	$data=array();
		$sql="SELECT * FROM `mz_food_customizeprice` WHERE `food_id`='$foodid' AND `view`='1'";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}
     }
     public function getExtraFooddetailsByFoodId($orderid,$foodid)
     {
     	$data=array();
     	$sql="SELECT * FROM `mz_order_extragroup_details` WHERE `food_id`='$foodid' AND `order_id`='$orderid'";
     	$result=$this->conn->query($sql);
     	if($result->num_rows>0)
     	{
     		while ($row=$result->fetch_assoc()) {
     			$data[]=$row;
     		}
     		return $data;
     	}
     	else
     	{
     		return false;
     	}
     }
	/***************************************************
	  Get Customize master value By restaurant id
	*****************************************************/


	/***************************************************************** 
	  Driver Module Start
	******************************************************************/
       
        /*******************************************************
          Get Nearest Drivers By Restaurant Lat/Lng/Sublocality
        ********************************************************/
            public function getDriversByRestaurantLatLng($reslat,$reslng,$resadministrativearea)
			{
				$data=array();
				
				$sql="SELECT `driver_id`, SQRT( POW(69.1 * (`latitude` - '".$reslat."'), 2) + POW(69.1 * ('".$reslng."' - `longitude`) * COS(`latitude` / 57.3), 2)) AS distance FROM `mz_driver_position` WHERE `service_status` = 1 AND `available` = 1 AND `status` = 1 AND `view` = 1 HAVING distance < 100 ORDER BY distance ASC";
				$result=$this->conn->query($sql);
				if($result->num_rows>0)
				{
					while ($row=$result->fetch_assoc()) {
						$data[] = $row;
					}
					return $data;
				}
			}

	     /*******************************************************
          Get Nearest Drivers By Restaurant Lat/Lng/Sublocality
        ********************************************************/

       //Insert First Nearest Driver in temp_driver_order
	   public function insertFirstDriverInTempTable($orderid,$restaurantdetailbyid,$driver_id)
	   {
          $pdate = date('Y-m-d');
          $ptime = date('h:i:s A');
          if($this->checkOrderIdInTempTable($orderid))
          {
          	$insert_first_driver = "INSERT INTO `temp_driver_order`(`driver_id`, `order_id`, `res_id`, `res_lat`, `res_lng`, `pdate`, `ptime`) VALUES ('".$driver_id."' , '".$orderid."', '".$restaurantdetailbyid['id']."', '".$restaurantdetailbyid['latitude']."', '".$restaurantdetailbyid['longitude']."', '".$pdate."', '".$ptime."')";
          }
          else
          {
          	$insert_first_driver = "UPDATE `temp_driver_order` SET `driver_id`='$driver_id',`order_id`='$orderid',`res_id`='".$restaurantdetailbyid['id']."',`res_lat`='".$restaurantdetailbyid['latitude']."', `res_lng`='".$restaurantdetailbyid['longitude']."', `pdate`='".$pdate."', `ptime`='".$ptime."' WHERE `order_id`='$orderid'";
          }
          
          $insert = $this->conn->query($insert_first_driver);
          return true;
	   }


	   //Check Whether is driver is already in temp_driver_order
	   public function checkDriverInTempTable($driver_id)
	   {
	   	 $select = $this->conn->query("SELECT `driver_id` FROM `temp_driver_order` WHERE `driver_id` = '".$driver_id."' AND `order_accepted` = 1 AND `view` =1");
	   	 if($select->num_rows > 0)
	   	 {
	   	 	return false;
	   	 }
	   	 else
	   	 {
	   	 	return true;
	   	 }
	   }
	   public function checkOrderIdInTempTable($Orderid)
	   {
	   	 $sql="SELECT `order_id` FROM `temp_driver_order` WHERE `order_id` = '".$Orderid."' AND `order_accepted`!='1' AND `view` ='1'";
	   	 $select = $this->conn->query($sql);
	   	 if($select->num_rows > 0)
	   	 {
	   	 	return false;
	   	 }
	   	 else
	   	 {
	   	 	return true;
	   	 }
	   }
	/******************************************************************
	 Driver Module End
	********************************************************************/



 public function getAllDrivers()
	   {
	   	 $sql="SELECT concat(`first_name`,' ',`last_name` ) as name ,`email`,`contact_no` ,`id`FROM `cube_drivers` WHERE `view` ='1'";
	   	 $select = $this->conn->query($sql);
	   	 if($select->num_rows > 0)
	   	 {
	   	 	return $select->fetch_all(MYSQLI_ASSOC);
	   	 }
	   	 else
	   	 {
	   	 	return true;
	   	 }
	   }

	   public function getAllStatesByCid($cid){
	
 	
		$sql = "SELECT `name` as name,`id` FROM `pcl_states` where `view`='1' and `status`='1' and `country_id`='$cid' ";
		$results=$this->conn->query($sql);
		if($results->num_rows>0){
			return $results->fetch_ALL(MYSQLI_ASSOC);
		}

	
}

public function getAllMakes(){
	
 	
	$sql = "SELECT `name` as name,`id` FROM `pcl_make` where `view`='1' and `status`='1'  ";
	$results=$this->conn->query($sql);
	if($results->num_rows>0){
		return $results->fetch_ALL(MYSQLI_ASSOC);
	}


}

public  function changeDate( $date ){
	$dateArr=explode("-",$date);
    $newDate=$dateArr[2]."-".$dateArr[1]."-".$dateArr[0];
	return $newDate;
	
}

 public function getAllStates($custmId)
     {
     	$data=array();
		$sql = "SELECT `name` as name,`id` FROM `pcl_states` where `view`='1' and `status`='1' and `country_id`='$custmId' ";
		$results=$this->conn->query($sql);
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			while ($row=$result->fetch_assoc()) {
			$id=$row['id'];
			$name=$row['name'];
				$data[$id]=$name;
			}
			
		}
		return $data;
     }

}/*end classs*/

?>