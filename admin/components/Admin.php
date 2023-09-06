<?php
class Admin extends Db
{
	public $conn;
	public $username;
	public $password;
	public $tablename='admin';
	
	public function __construct()
	{
		
		$this->conn = parent::__construct();
	}

	
	public function checkCredentials($username,$password){
	
		$this->username=$this->conn->real_escape_string($username);
		$this->password=$this->conn->real_escape_string(md5($password));
		$sql="SELECT * FROM `cube_admin`  WHERE `username`='".$this->username."' and `password`='".$this->password."' and `status`='1' and `view`='1' ";
		
		
		$result=$this->conn->query($sql);
		if($result->num_rows == 1){
			 $fetch = $result->fetch_assoc();
             $_SESSION['adminid']= $fetch['id'];
			 $_SESSION['type']= $fetch['type'];
			 session_regenerate_id();
			 return true;
			 
				
		}else{
			return false;
			
		}
	
		
	}
	
	
	public function getAdminNameById($sessid){
	
		 $sql="select `user_name` from `cube_admin`  where `id`='$sessid'  ";
		$result=$this->conn->query($sql);
		$fetch = $result->fetch_assoc();
		return $fetch['user_name'];
	}
	
	

	
	public function getAdminDetailsById($sessid){
	
		 $sql="select * from `cube_admin`  where `id`='$sessid'  ";
		$result=$this->conn->query($sql);
		$fetch = $result->fetch_assoc();
		return $fetch;
	}

	public function checkEmailCredentials($emailid){
		$sql = "SELECT * FROM `cube_admin` WHERE `email`='$emailid' ";
		$result = $this->conn->query($sql);
		if($result->num_rows==1){
		   $row = $result->fetch_assoc();
		   return $row['id'];
		}else{
			return false;
		}
	}//checkEmailCredentials close
	
	
	public function getAllSubadmins(){
		$sql = "SELECT * FROM `cube_admin` WHERE `usertype`='0' and `view`='1' ";
		$result = $this->conn->query($sql);
		if($result->num_rows>0){
		   $row = $result->FETCH_ALL(MYSQLI_ASSOC);
		   return $row;
		}else{
			return false;
		}
	}

	public function resetPassword($password,$uid){
		$password = md5($this->conn->real_escape_string($password));
		$sql = "UPDATE `cube_admin` SET `password`='$password' WHERE `id`='$uid'";
		$result = $this->conn->query($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	
	
	public function updatepassword($post){
		$uid=$_SESSION['adminid'];
		//$oldpostpassword=md5($this->conn->real_escape_string($post['oldpassword']));
	//	$password = md5($this->conn->real_escape_string($post['newpassword']));
	
	    $oldpostpassword=password_hash($post['oldpassword'], PASSWORD_DEFAULT);
		$password=password_hash($post['newpassword'], PASSWORD_DEFAULT);
		$sql = "SELECT * FROM `cube_admin` WHERE `id`='$uid' ";
		$result = $this->conn->query($sql);
		if($result->num_rows==1){
		   $row = $result->fetch_assoc();
		   $oldpassword=$row['password'];
		  if($oldpassword==$oldpostpassword) {
		  
					$sql = "UPDATE `cube_admin` SET `password`='$password' WHERE `id`='$uid'";
					$result1 = $this->conn->query($sql);
					if($result1){
						return true;
					}else{
						return false;
					}
		  
		  
		  
		  }else{
		  return false;
		  }
		   
		}else{
			return false;
		}
		
		
		
		
		
	}
	
	
	
	 public function AddSubAdminDetails($POST)
 {
		$official_personname  =  $this->conn->real_escape_string($POST["official_personname"]);
		$number   =   $this->conn->real_escape_string($POST["number"]);
		$official_email   =   $this->conn->real_escape_string($POST["official_email"]); 
		$username   =     $this->conn->real_escape_string($POST["username"]); 
	//	$password = $this->conn->real_escape_string(md5($POST['password']));
			$password = password_hash($POST['password'], PASSWORD_DEFAULT);
		
		$vendor_status_main  =   $this->conn->real_escape_string($POST["vendor_status_main"]); 
		
		$sql1 = "SELECT * FROM `cube_admin` WHERE `user_email`='$official_email'  and `view`='1' ";
		$result1 = $this->conn->query($sql1);
		if($result1->num_rows>0){
			header("location:subadmins.php?msg=uae");
			exit;
		}
		
		
		
		$posted_date=date('Y-m-d');
    	  $sql="INSERT INTO `cube_admin`( `user_name`,  `mobile`,  `user_email`,  `user_password`, `created_date`,`status`,`view`,`usertype`) VALUES ('$official_personname','$number','$official_email','$password','$posted_date','$vendor_status_main','1','0')";
		//die;
 		$result=$this->conn->query($sql);
	 	if($result)
	 	{
	 	   
		   return true;

	 	}
	 	else {
	 		return false;
	 	}
 }
	
	
 public function UpdateSubAdminDetails($POST)
 {
		$eid=$this->conn->real_escape_string($POST["eid"]);
		$official_personname  =  $this->conn->real_escape_string($POST["official_personname"]);
		$number   =   $this->conn->real_escape_string($POST["number"]);
		$official_email   =   $this->conn->real_escape_string($POST["official_email"]); 
		$username   =     $this->conn->real_escape_string($POST["username"]); 
	//	$password  =   $this->conn->real_escape_string($POST["password"]);
		
			$password = password_hash($POST['password'], PASSWORD_DEFAULT);
		
		$vendor_status_main  =   $this->conn->real_escape_string($POST["vendor_status_main"]); 
		
		
		$sql1 = "SELECT * FROM `cube_admin` WHERE `user_email`='$official_email'  and `view`='1'  and `id`!='$eid' ";
		$result1 = $this->conn->query($sql1);
		if($result1->num_rows>0){
			header("location:subadmins.php?msg=uae");
			exit;
		}
		
		
    	$sql="UPDATE `cube_admin` SET `user_name`='$official_personname',`mobile`='$number',`user_email`='$official_email',`status`='$vendor_status_main' WHERE `id`='$eid'";
 		$result=$this->conn->query($sql);
		if($result)
	 	{
	 	   
		   return true;

	 	}
	 	else {
	 		return false;
	 	}
 }
 
 
  public function DeleteAdmin($id)
 {
 	    $sql="UPDATE `cube_admin` SET `view`='0' WHERE `id`='$id'";
    	$result=$this->conn->query($sql);
    	if($result)
    	{
    		return true;
    	}
 }



 
  
 


	
	
}
?>