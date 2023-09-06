<?php
class User extends Db
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

	public function user_validate($post)
	{
		$errorMessage=array();
		$username = filter_var($post["cubeadmin_email"], FILTER_SANITIZE_STRING);
    	$password = filter_var($post["cubeadmin_password"], FILTER_SANITIZE_STRING);
    	$valid=true;
		if(empty($username) || empty($password))
    		{
    			$errorMessage[] = "Some fields are required!";
	        	$valid = false;
    		}
    		if($valid)
    		{
    			/*if(!filter_var($username, FILTER_VALIDATE_EMAIL))
    			{
    				$errorMessage[] = "Please Enter valid Email.";
	        		$valid = false;
    			}*/
    		}
    		if ($valid == false) {
	            return $errorMessage;
	        }
	        return $errorMessage;
	}

	public function login($post)
	{
		$username = filter_var($post["cubeadmin_email"], FILTER_SANITIZE_STRING);
    	$password = filter_var($post["cubeadmin_password"], FILTER_SANITIZE_STRING);
    	$userid=$username;
		$status="1";
		$view="1";
    	$sql="SELECT * FROM `cube_admin` WHERE (`user_email`='$username' OR `mobile`='$username') AND `status`='$status' AND `view`='$view'";
		$result = $this->conn->query($sql);
			  if($result->num_rows>0)
			  {
			  		while ($row=$result->fetch_assoc()) {
			  			$data=$row;			  			
			  		}
				  		if(password_verify($password,$data['user_password']))
				  		{
				  		$set_user_data = [
	                          'userid'=> $data['id'],
	                          'username'=>$data['user_name'],
	                          'useremail'=>$data['user_email'],
	                          'userpic'=>$data['profile_pic'],
	                          'userroleid'=>$data['role_id'],
							  'usertype'=>$data['usertype'],
							  'countryid'=>$data['country_id'],
	                        ];
	                        $_SESSION['cubeadmin_sess'] = $set_user_data;
	                        session_regenerate_id();
	                        return true;
				  		}
		  				else
		  				{
		  					return false;
		  				}
			  }
			  else
			  {
			  	return false;
			  }
	}

	/****************************************************
		Insert User form code
	****************************************************/
	public function validate_user($post)
	{
		$errorMessage=array();
		$addusers_name=filter_var($post["addusers_name"], FILTER_SANITIZE_STRING);
		$addusers_email=filter_var($post["addusers_email"], FILTER_SANITIZE_EMAIL);
		$addusers_mobile=filter_var($post["addusers_mobile"], FILTER_SANITIZE_NUMBER_INT);
	  if(!isset($post['update_user']) && empty($post['update_user'])):
		$addusers_password=filter_var($post["addusers_password"], FILTER_SANITIZE_STRING);
      endif;
		$addusers_role=filter_var($post["addusers_role"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_state=filter_var($post["addusers_state"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_country=filter_var($post["conid"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_city=filter_var($post["addusers_city"], FILTER_SANITIZE_STRING);
		$addusers_address=filter_var($post["addusers_address"], FILTER_SANITIZE_STRING);
    	$valid=true;
    	if(!isset($post['update_user']) && empty($post['update_user'])):
    		 if(empty($addusers_password))
    		 {
    		 	$errorMessage[] = "*Some fields are not blank!";
	        	$valid = false;
    		 }
    	endif;
		if(empty($addusers_name) || empty($addusers_mobile) || empty($addusers_role) || empty($addusers_state) || empty($addusers_city) || empty($addusers_address) || empty($addusers_country))
    		{
    			$errorMessage[] = "*Some fields are not blank!";
	        	$valid = false;
    		}
    		if($valid)
    		{
    			if(!empty($_FILES['addusers_image']['name']))
    			{
    				$filearray=['jpg','png','JPG','PNG','jpeg','JPEG','tiff'];
    				$ext = pathinfo($_FILES['addusers_image']['name'],PATHINFO_EXTENSION);
					if (!in_array($ext, $filearray))
					{
						$errorMessage[]= "Please select only jpg,png files.";
	        			$valid = false;
					}
    				
    			}
    			if(!empty($addusers_email) && !filter_var($addusers_email, FILTER_VALIDATE_EMAIL))
    			{
    				$errorMessage[]= "Please Enter Valid Email Address.";
	        		$valid = false;
    			}
    			if(!filter_var($addusers_mobile, FILTER_VALIDATE_INT))
    			{
    				$errorMessage[]= "Please Enter Valid Mobile Number.";
	        		$valid = false;
    			}
    		}
    		if ($valid == false) {
	            return $errorMessage;
	        }
	        return $errorMessage;
	}

	public function UserEmailExistsOrNot($email=NULL,$mobile=NULL)
	{
		$data=array();
		$errorMessage=array();
		$addusers_email=filter_var($email, FILTER_SANITIZE_EMAIL);
		if(!empty($addusers_email))
		{
			$sql="SELECT COUNT(`id`) AS rowCOUNT FROM `cube_admin` WHERE (`user_email`='$email' OR `mobile`='$mobile') AND `view`='1'";
		}
		else
		{
			$sql="SELECT COUNT(`id`) AS rowCOUNT FROM `cube_admin` WHERE `mobile`='$mobile' AND `view`='1'";
		}
		$result=$this->conn->query($sql);
		$data=$result->fetch_assoc();
		if($data["rowCOUNT"]>0)
		{
			$errorMessage[]="User Already Exists!.";
			return $errorMessage;
		}
		else
		{
			return $errorMessage;
		}

	}
	public function UserEmailExistsOrNotById($email=NULL,$mobile=NULL,$id)
	{
		$data=array();
		$errorMessage=array();
		$addusers_email=filter_var($email, FILTER_SANITIZE_EMAIL);
		$sql="SELECT COUNT(`id`) AS rowCOUNT FROM `cube_admin` WHERE (`user_email`='$email' OR `mobile`='$mobile') AND `id`!='$id' AND `view`='1'";
		$result=$this->conn->query($sql);
		$data=$result->fetch_assoc();
		if($data["rowCOUNT"]>0)
		{
			$errorMessage[]="User Already Exists!.";
			return $errorMessage;
		}
		else
		{
			return $errorMessage;
		}

	}
	public function insertUserDetails($post)
	{
		$userid = (!empty($_SESSION['user_sess'])) ? $_SESSION['user_sess']['userid'] : '';
		$addusers_name=filter_var($post["addusers_name"], FILTER_SANITIZE_STRING);
		$addusers_email=filter_var($post["addusers_email"], FILTER_SANITIZE_EMAIL);
		$addusers_mobile=filter_var($post["addusers_mobile"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_password=filter_var($post["addusers_password"], FILTER_SANITIZE_STRING);
		$addusers_role=filter_var($post["addusers_role"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_state=filter_var($post["addusers_state"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_country=filter_var($post["conid"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_city=filter_var($post["addusers_city"], FILTER_SANITIZE_STRING);
		$addusers_address=filter_var($post["addusers_address"], FILTER_SANITIZE_STRING);
		$pdate=date('Y-m-d');
		$ptime=date('h:i A');
		$user_password=password_hash($addusers_password, PASSWORD_DEFAULT);
		$imagepath="";
		if(!empty($_FILES['addusers_image']['name']))
		{
			$filearray=['jpg','png','JPG','PNG','jpeg','JPEG','tiff'];
    		$ext = pathinfo($_FILES['addusers_image']['name'],PATHINFO_EXTENSION);
			if (in_array($ext, $filearray))
					{
						$folder = 'assets/img/userprofile/';
						$imagename = str_replace(" ","_",$addusers_name).substr(rand(0,time()),0,4)."_".date('Ymd').'.'.$ext;
						if(move_uploaded_file($_FILES['addusers_image']['tmp_name'], $folder.$imagename))
						{
							$imagepath=$imagename;
						}
						else
						{
							$imagepath="";
						}
					}
					else
					{
						$imagepath="";
					}
		}
		$sql="INSERT INTO `cube_admin`(`user_name`, `user_email`, `user_password`, `profile_pic`, `created_date`, `created_at`,  `ip_address`, `role_id`, `usertype`, `mobile`, `country_id`,`state`, `city`, `address`, `created_by`) VALUES ('$addusers_name','$addusers_email','$user_password','$imagepath','$pdate','$ptime','".$_SERVER["REMOTE_ADDR"]."','0','$addusers_role','$addusers_mobile','$addusers_country','$addusers_state','$addusers_city','$addusers_address','$userid')";
		$result=$this->conn->query($sql);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	/********************************************
	  Update User
	***********************************************/
    public function updateUserDetails($post)
	{
		$userid = filter_var($post["user_id"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_name=filter_var($post["addusers_name"], FILTER_SANITIZE_STRING);
		$addusers_email=filter_var($post["addusers_email"], FILTER_SANITIZE_EMAIL);
		$addusers_mobile=filter_var($post["addusers_mobile"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_password=filter_var($post["addusers_password"], FILTER_SANITIZE_STRING);
		$addusers_role=filter_var($post["addusers_role"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_state=filter_var($post["addusers_state"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_country=filter_var($post["conid"], FILTER_SANITIZE_NUMBER_INT);
		$addusers_city=filter_var($post["addusers_city"], FILTER_SANITIZE_STRING);
		$addusers_address=filter_var($post["addusers_address"], FILTER_SANITIZE_STRING);
		$pdate=date('Y-m-d');
		$ptime=date('h:i A');
		$imagepath="";
		if(!empty($_FILES['addusers_image']['name']))
		{
			$filearray=['jpg','png','JPG','PNG','jpeg','JPEG','tiff'];
    		$ext = pathinfo($_FILES['addusers_image']['name'],PATHINFO_EXTENSION);
			if (in_array($ext, $filearray))
					{
						$folder = 'assets/img/userprofile/';
						$imagename = str_replace(" ","_",$addusers_name).substr(rand(0,time()),0,4)."_".date('Ymd').'.'.$ext;
						if(move_uploaded_file($_FILES['addusers_image']['tmp_name'], $folder.$imagename))
						{
							$imagepath= ", `profile_pic` = '".$imagename."'";
						}
						else
						{
							$imagepath="";
						}
					}
					else
					{
						$imagepath="";
					}
		}
		$sql="UPDATE `cube_admin` SET `user_name` = '".$addusers_name."', `user_email` = '".$addusers_email."', `updated_date` = '".$pdate."', `updated_at` = '".$ptime."',  `ip_address` = '".$_SERVER["REMOTE_ADDR"]."', `role_id` = '0', `usertype` = '".$addusers_role."', `mobile` = '".$addusers_mobile."', `country_id` = '".$addusers_country."',`state` = '".$addusers_state."', `city` = '".$addusers_city."', `address` = '".$addusers_address."' $imagepath WHERE `id` = '".$userid."'";
		$result=$this->conn->query($sql);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**********************************************
	  Update User
	***********************************************/

	/*************************************
	Get Records user for ajax pagination
	*************************************/

	public function getTotalNumberOfRecordUserAjax($where,$orderby)
	{
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$wherecon=' AND a.`country_id`='.$countryid;
		$data=array();
		$sql="SELECT COUNT(a.`id`) AS rowCount FROM `cube_admin` a JOIN `mz_user_type` b ON a.`usertype`=b.`id` JOIN `mz_country` c ON a.`country_id`=c.`id` $where $wherecon $orderby";
		$result=$this->conn->query($sql);
		$data=$result->fetch_assoc();
		return $data;

	}

	public function getAllRecordsUserAjax($limit,$where,$orderby,$offset)
	{
		$countryid=(!empty($_SESSION['country'])) ? $_SESSION['country']['countryid'] : '1';
		$wherecon=' AND a.`country_id`='.$countryid;
		$data=array();
		$sql="SELECT a.`id`,a.`user_name`,a.`user_email`,a.`mobile`,a.`usertype`,a.`created_date`,a.`status`,a.`country_id`,c.`name`AS COUNTRYNAME FROM `cube_admin` a JOIN `mz_user_type` b ON a.`usertype`=b.`id` JOIN `mz_country` c ON a.`country_id`=c.`id` $where $wherecon $orderby LIMIT $offset,$limit";
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



	/******************************************
	  Get User Detail By Id
	*******************************************/
	  public function getUserDetailById($user_id = NULL)
	  {
	  	 if(isset($user_id) && !empty($user_id))
	  	 {
	  	 	 $userid = $user_id;
	  	 }
	  	 else
	  	 {
	  	 	$userid = $_SESSION['user_sess']['userid'];
	  	 }

	  	 $select = $this->conn->query("SELECT * FROM `cube_admin` WHERE `id` = '".$userid."' AND `status` = 1 AND `view` = 1");
	  	 if($select->num_rows == 1)
	  	 {
	  	 	return $select->fetch_assoc();
	  	 }
	  	 else
	  	 {
	  	 	return false;
	  	 }
	  }

	 /**********************************************
	   Get UserDetail By Id
	 ************************************************/

	 /*******************************************
	   Change User Status
	 ********************************************/
       public function changeUserStatus($post)
       {
       	  $update = $this->conn->query("UPDATE `cube_admin` SET `status` = (CASE WHEN `status` = 1 THEN 0 WHEN `status` = 0 THEN 1 END) WHERE `id` = '".$post['user_id']."'");
       	  if($update)
       	  {
       	  	 return true;
       	  }
       	  else
       	  {
       	  	 return false;
       	  }
       }
	 /**********************************************
	   Change User Status
	 ***********************************************/


	 /*******************************************
	   Delete User 
	 ********************************************/
       public function deleteUser($post)
       {
       	  $delete = $this->conn->query("UPDATE `cube_admin` SET `status` = 0 , `view` = 0 WHERE `id` = '".$post['user_id']."'");
       	  if($delete)
       	  {
       	  	 return true;
       	  }
       	  else
       	  {
       	  	 return false;
       	  }
       }
	 /**********************************************
	   Delete User 
	 ***********************************************/
}



?>