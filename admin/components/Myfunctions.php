<?php

class Myfunctions extends Db 

{

	public $conn;



	public function __construct() 

	{

		

		$this->conn = parent::__construct();

		return $this->conn;

	}



    public static function cleanname( $name ){

		$newstr = preg_replace('/[^a-zA-Z0-9]/', '_', $name);

		return $newstr;

		

	}

	

	 public static function cleanUrl( $name ){

		$newstr = preg_replace('/[^a-zA-Z0-9]/', '-', strtolower($name));

		return $newstr;

		

	}

	
	public function getContactDetail($id){
	
	$sql="select * from `sh_contactus`  where `id`='$id' ";

	

		$results=$this->conn->query($sql);


		$fetch=$results->fetch_assoc();

		

		return $fetch;	

	}

	

	public function getCouriers(){

	$orders=array();

		$sql="select * from `sh_couriers`  where `view`='1' ";

	

		$results=$this->conn->query($sql);

		if($results->num_rows>0){

			

			$orders=$results->fetch_All(MYSQLI_ASSOC);

			

		}

		

		return $orders;	

	}

	

	

	public function getCourierNameById($cid){

	$orders=array();

		$sql="select `name` from `sh_couriers`  where `id`='$cid' ";

	

		$results=$this->conn->query($sql);

		if($results->num_rows>0){

			

			$orders=$results->fetch_assoc();

			

		}

		

		return $orders['name'];	

	}



 

   public function getOrderDetailsById($oid){

		$sql="select * from `sh_orders_details`  where `id`='$oid' ";

		$results=$this->conn->query($sql);

		$orders=$results->fetch_assoc();

		return $orders;	

	}

 

	/*Order_Details print by id*/



	public function getOrderidDetailsById($id)

	{

		$data=array();

		$sqlorder="SELECT * FROM `sh_orders_details` WHERE `id`=? ORDER BY `id` DESC";



		$sqlinject=$this->conn->prepare($sqlorder);

		$sqlinject->bind_param("i",$order_id);

		$order_id=trim($id);

		$sqlinject->execute();

		if(!$sqlinject->errno)

		{

			$result = $sqlinject->get_result();



			while ($row=$result->fetch_assoc()) {

				$data=$row;

			}



			return $data;

			$sqlinject->close();

		}

		else

		{

			return false;

		}



	}



	/*End Order_Details print by id*/



	/* Start get details OrderRetrunReplace*/



	public function getOrderRetrunReplaceDetails()

	{



		$data=array();

		$sqlorder="SELECT * FROM `sh_return_replace_requests` where `returnreplacetype`='1' ORDER BY `id` DESC";

		$sqlinject=$this->conn->prepare($sqlorder);

		$sqlinject->execute();

		if(!$sqlinject->errno)

		{

			$result = $sqlinject->get_result();



			while ($row=$result->fetch_assoc()) {

				$data[]=$row;

			}



			return $data;

			$sqlinject->close();

		}

		else

		{

			return false;

		}





	}





public function getOrderReplaceDetails()

	{



		$data=array();

		$sqlorder="SELECT * FROM `sh_return_replace_requests` where `returnreplacetype`='2' ORDER BY `id` DESC";

		$sqlinject=$this->conn->prepare($sqlorder);

		$sqlinject->execute();

		if(!$sqlinject->errno)

		{

			$result = $sqlinject->get_result();



			while ($row=$result->fetch_assoc()) {

				$data[]=$row;

			}



			return $data;

			$sqlinject->close();

		}

		else

		{

			return false;

		}





	}



	/* End get details OrderRetrunReplace */



	/* Start get details by orderid*/



	public function getOrderDetailsByOrId($orid)

	{

		$data=array();

		$sqlorder="SELECT * FROM `sh_orders` WHERE `id`=? ORDER BY `id` DESC";

		$sqlinject=$this->conn->prepare($sqlorder);

		$sqlinject->bind_param("i",$order_id);

		$order_id=filter_var($orid, FILTER_SANITIZE_STRING);

		$sqlinject->execute();

		if(!$sqlinject->errno)

		{

			$result = $sqlinject->get_result();



			while ($row=$result->fetch_assoc()) {

				$data=$row;

			}



			return $data;

			$sqlinject->close();

		}

		else

		{

			return false;

		}





	}



	/* End get details by orderid */



	/* Start get details OrderRetrunReplace*/



	public function getOrderRetrunReplaceDetailsByid($id)

	{



		$data=array();

		$sqlorder="SELECT * FROM `sh_return_replace_requests` WHERE `id`=? ORDER BY `id` DESC";

		$sqlinject=$this->conn->prepare($sqlorder);

		$sqlinject->bind_param("i",$order_id);

		$order_id=filter_var($id, FILTER_SANITIZE_STRING);

		$sqlinject->execute();

		if(!$sqlinject->errno)

		{

			$result = $sqlinject->get_result();



			while ($row=$result->fetch_assoc()) {

				$data=$row;

			}



			return $data;

			$sqlinject->close();

		}

		else

		{

			return false;

		}





	}



	/* End get details OrderRetrunReplace */





	/* Start get details OrderRetrunReplace For Mail*/



	public function getOrderReturnReplaceDetailsByOrderDetailsid($id)

	{



		$data=array();

		$sqlorder="SELECT * FROM `sh_return_replace_requests` WHERE `product_order_detail_id`=? ORDER BY `id` DESC";

		$sqlinject=$this->conn->prepare($sqlorder);

		$sqlinject->bind_param("i",$order_id);

		$order_id=filter_var($id, FILTER_SANITIZE_STRING);

		$sqlinject->execute();

		if(!$sqlinject->errno)

		{

			$result = $sqlinject->get_result();



			while ($row=$result->fetch_assoc()) {

				$data=$row;

			}



			return $data;

			$sqlinject->close();

		}

		else

		{

			return false;

		}





	}



	/* End get details OrderRetrunReplace for Mail*/

  



  /*========================= Submit Refund Details By Admin===========*/

  public function validate_refundapproval($post)

  {

      $ref_approval = filter_var($post["ref_approval"], FILTER_SANITIZE_NUMBER_INT);

      $ref_refundprice = filter_var($post["ref_refundprice"], FILTER_SANITIZE_NUMBER_FLOAT);

      $ref_remarks = filter_var($post["ref_remarks"], FILTER_SANITIZE_STRING);

      /* code validation check*/

          $valid = true;

          $errorMessage = array();

          if(empty($ref_approval) || $ref_refundprice="")

          {

            $valid = false;

          }

          

          if($valid) 

          {

        

              // address type Validation



               if (!isset($error_message)) {

                  if (! filter_var($ref_approval, FILTER_VALIDATE_INT)) {

                      $errorMessage['ref_approval'] = "* Invalid Type.";

                      $valid = false;

                  }

              }

              /*if (!isset($error_message)) {

                  if (! filter_var($ref_refundprice, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION)) {

                      $errorMessage['ref_refundprice'] = "* Invalid Price.";

                      $valid = false;

                  }

              }*/



          }

          else 

          {

              $errorMessage['all_error'] = "* Some Fields Are Required.";

          }

          

          if ($valid == false) {

              return $errorMessage;

          }

          return $errorMessage;



      /*end code validation check*/



  }



  public function refundapproval_update($post)

  {     

        $ref_approval = filter_var($post["ref_approval"], FILTER_SANITIZE_NUMBER_INT);

		$ref_refundprice = $post["ref_refundprice"];

		$ref_remarks = filter_var($post["ref_remarks"], FILTER_SANITIZE_STRING);

		$approvedate=date('Y-m-d');

		$approvetime=date('h:i A');

		$ref_refundid=filter_var($post["ref_refundid"], FILTER_SANITIZE_NUMBER_INT);

		

		$sqlinsertup="UPDATE `sh_return_replace_requests` SET `status`=?,`approvedate`=?,`approvetime`=?,`refundamt`=?,`refund_message`=?  WHERE `id`=?";

		$stmt = $this->conn->prepare($sqlinsertup);

		$stmt->bind_param('issdsi',$ref_approval,$approvedate,$approvetime,$ref_refundprice,$ref_remarks,$ref_refundid);

		



      $result=$stmt->execute();

        if(!$result->error)

        {

          $sqlupdate="UPDATE `sh_orders_details` SET  `refundreturnapproval`=? WHERE `id`=?";

          $stmt2 = $this->conn->prepare($sqlupdate);

          $stmt2->bind_param('ii',$ref_approval,$ref_refund_details_id);

          $ref_approval = filter_var($post["ref_approval"], FILTER_SANITIZE_NUMBER_INT);

          $ref_refund_details_id=filter_var($post["ref_refund_details_id"],FILTER_SANITIZE_NUMBER_INT);

           $result2=$stmt2->execute();

           if(!$result2->error )

           {

			   self::updateExchangeProductNew($ref_refundid,$ref_approval);

			   

           		return true;

           		$stmt2->close();

           }

           else

           {

           	return true;

           }

        }

        else

        {

          return false;

        }

  }





  public function refundapproval_updateNew($post)

  {     

        $ref_approval = filter_var($post["ref_approval"], FILTER_SANITIZE_NUMBER_INT);

		$ref_refundprice = $post["ref_refundprice"];

		$ref_remarks = filter_var($post["ref_remarks"], FILTER_SANITIZE_STRING);

		$approvedate=date('Y-m-d');

		$approvetime=date('h:i A');

		$ref_refundid=filter_var($post["ref_refundid"], FILTER_SANITIZE_NUMBER_INT);

		

		$sqlinsertup="UPDATE `sh_return_replace_requests` SET `status`=?,`approvedate`=?,`approvetime`=?,`refundamt`=?,`refund_message`=?  WHERE `id`=?";

		$stmt = $this->conn->prepare($sqlinsertup);

		$stmt->bind_param('issdsi',$ref_approval,$approvedate,$approvetime,$ref_refundprice,$ref_remarks,$ref_refundid);

		



      $result=$stmt->execute();

        if(!$result->error)

        {

          $sqlupdate="UPDATE `sh_orders_details` SET  `refundreturnapproval`=? WHERE `id`=?";

          $stmt2 = $this->conn->prepare($sqlupdate);

          $stmt2->bind_param('ss',$ref_approval,$ref_refund_details_id);

          $ref_approval = filter_var($post["ref_approval"], FILTER_SANITIZE_NUMBER_INT);

          $ref_refund_details_id=filter_var($post["ref_refund_details_id"],FILTER_SANITIZE_NUMBER_INT);

           $result2=$stmt2->execute();

           if(!$result2->error )

           {

			   

			   if($ref_approval==1){

			   		self::updateRefundProduct($ref_refundid);

			   }

			   

           		return true;

           		$stmt2->close();

           }

           else

           {

           	return true;

           }

        }

        else

        {

          return false;

        }

  }







 public function refund_update($post)

  {

	    $walletreturn=$this->conn->real_escape_string($post['walletreturn']);

		$otherreturn=$this->conn->real_escape_string($post['otherreturn']);

		$did=$post['wallet_refundid'];

		

		$refundmessage=$this->conn->real_escape_string($post['refundmessage']);

		$sql1 = "SELECT * FROM `sh_return_replace_requests` WHERE `id`='$did' ";

		$result1 = $this->conn->query($sql1);

		$fetch=$result1->fetch_assoc();

		

		$userid=$fetch['userid'];

		$orderid=$fetch['order_id'];

		$orderdetailid=$fetch['product_order_detail_id'];

		$pdate=date("Y-m-d");

		$ptime=date("h:i a");

		

		$sql = "UPDATE `sh_return_replace_requests` SET `walletreturn`= '$walletreturn' ,`otherreturn`='$otherreturn'  ,`refund_message`='$refundmessage'  WHERE `id`='$did'";

		$result=$this->conn->query($sql);

		if($result){

		

		

		

	   $this->conn->query("UPDATE `sh_orders_details` SET `refunddone`= '1'   WHERE `id`='$orderdetailid'");

			

			

		$this->conn->query("INSERT INTO `sh_wallethistory` (`id`, `walletmsg`, `debit`, `credit`, `pdate`, `ptime`, `user_id`, `wallettype`, `orderid`, `to_userid`) VALUES (NULL, 'Product Refund', '0', '$walletreturn', '$pdate', '$ptime', '$userid', '4', '$orderid', '0');  ");

			

			

		 	return true;

		}else{

			return false;

	    }

  }





   

  public function getContactUsDetails(){

		$sql = "SELECT * FROM `sh_contactus` WHERE `view`='1' ORDER BY `id` DESC";

		$result = $this->conn->query($sql);

		

		$contactDetails=array();

		if($result->num_rows>0){

			while($fetch=$result->fetch_assoc()){

				$contactDetails[]=$fetch;

			}//while close

			return $contactDetails;

		}//if

	}//function getAllSubscriberDetails close



	public function getUserDetails(){

		$sql = "SELECT * FROM `sh_users` WHERE `view`='1' AND `status`='1' ORDER BY `id` DESC";

		$result = $this->conn->query($sql);

		

		$userDetails=array();

		if($result->num_rows>0){

			while($fetch=$result->fetch_assoc()){

				$userDetails[]=$fetch;

			}//while close

			return $userDetails;

		}//if

	}//function getUserDetails close

// Download User in Excel
	public function downloaduser(){
$sql = "SELECT * FROM `sh_users` WHERE `view`='1' AND `status`='1' ORDER BY `id` DESC";
$result=$this->conn->query($sql);
$fetchAll = $result->fetch_All();
        return $fetchAll;
	}


	public function getSuspendUserDetails(){

		$sql = "SELECT * FROM `sh_users` WHERE `view`='1' AND `status`='0' OR `statusforadmin`='0' ORDER BY `id` DESC";

		$result = $this->conn->query($sql);

		

		$userDetails=array();

		if($result->num_rows>0){

			while($fetch=$result->fetch_assoc()){

				$userDetails[]=$fetch;

			}//while close

			return $userDetails;

		}//if

	}//function getUserDetails close



	public function deleteUser($did){

		$sql = "UPDATE `sh_users` SET `view`= '0' WHERE `id`='$did'";

		

		$result=$this->conn->query($sql);

		if($result){

		 return true;

		}else{

		return false;

	    }

	}//function deleteUser close



	public function getBonusDetailsByUserId($userid){

		$sql = "SELECT * FROM `sh_wallethistory` WHERE `user_id`='$userid'";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			while($row = $result->fetch_assoc()){

				$bonusDetails[] = $row;

			}//while close

			return $bonusDetails;

		}//if close

	}//getbonusdetails function close



    public function getBonusDetailsCreditedAndBalanceByUserId($userid){

		$bonusDetails=array();

		$sql = "SELECT * FROM `sh_wallethistory` WHERE `user_id`='$userid'";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			while($row = $result->fetch_assoc()){

				$walletType=$row['wallettype'];

				if($walletType==1){

					$signupcredit[] =$row['credit'];

					$signupdebit[] = $row['debit'];

				}

				if($walletType==2){

					$referralcredit[] =$row['credit'];

					$referraldebit[] = $row['debit'];

				}

				if($walletType==3){

					$earlycredit[] =$row['credit'];

					$earlydebit[] = $row['debit'];

				}

				

				if($walletType==4){

					$refundcredit[] =$row['credit'];

					$refunddebit[] = $row['debit'];

				}

				

				

				

				

			}//while close

		

		}//if close

		

		$bonusDetails['signupcredited']=array_sum($signupcredit);

		$bonusDetails['signupdebited']=array_sum($signupdebit);

		

		$bonusDetails['earlybirdcredited']=array_sum($earlycredit);

		$bonusDetails['earlybirddebited']=array_sum($earlydebit);

		

		$bonusDetails['referralcredited']=array_sum($referralcredit);

		$bonusDetails['referraldebited']=array_sum($referraldebit);

		

		$bonusDetails['refundcredited']=array_sum($refundcredit);

		$bonusDetails['refunddebited']=array_sum($refunddebit);

		

		

			return $bonusDetails;

	}





		public function deleteContact($did){

		$sql = "UPDATE `sh_contactus` SET `view`= '0' WHERE `id`='$did'";

		

		$result=$this->conn->query($sql);

		if($result){

		 return true;

		}else{

		return false;

	    }

	}//function deleteContact close





	public function getUserAddressDetailsByUserId($userid)

    {

      $data=array();

      $sqlgetaddress="SELECT * FROM `sh_user_addresses` WHERE `status`='1' AND `view`='1' AND `userid`='$userid'";



      $result=$this->conn->query($sqlgetaddress);

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

    }//function close



    public function getNotifyMeDetails(){

    	$data= array();

    	$sql = "SELECT * FROM `sh_notifyme` ORDER BY `messagedone`,`notify_date` DESC";

    	$result = $this->conn->query($sql);

    	if($result->num_rows>0){

    		while($row = $result->fetch_assoc()){

    			$data[]=$row;

    		}//while close

    		return $data;

    	}//if close

    }//getNotifyMeDetails



    public function getUserDetailsByUserId($userid){

    	$sql = "SELECT * FROM sh_users WHERE id='$userid'";

    	$result = $this->conn->query($sql);

    	if($result->num_rows>0){

    		$row = $result->fetch_assoc();

    		return $row;

    	}

    }//function close



    public function getBankRefundDetails($userid)

    {

      $select = $this->conn->query("SELECT * FROM `sh_bank_refund_details` WHERE `user_id`='$userid'");

     if($select->num_rows == 1)

     {

        return $select->fetch_assoc();

     }

     else

     {

       return false;

     }

  }//bank details close



  public function getBankNameUsingBankId($bankid)

    {

      $select = $this->conn->query("SELECT * FROM `sh_bank_master` WHERE `bank_id`='$bankid'");

     if($select->num_rows == 1)

     {

        return $select->fetch_assoc();

     }

     else

     {

       return false;

     }

  }//bank name close



   public function de_crypt($accno)

      {

         

          $parts = explode(':', $accno);

          $decrypted = openssl_decrypt($parts[0], AES_256_CBC, ENCRYPTION_KEY, 0, base64_decode($parts[1]));

          return $decrypted;

      }





public function getReasonNameById($id){

		$sql = "SELECT `reason` FROM `sh_return_reasons` where `id` ='$id'";

		$results=$this->conn->query($sql);

		

			$fetch =$results->fetch_assoc();

			return $fetch['reason'];

		

		

	}

	

	

	public function getProductNameDetailsById($id){

		$sql="select `name` from `sh_products`  where `id`='$id' and `view`='1'  ";

		$result=$this->conn->query($sql);

		$results= $result->fetch_assoc();

		return $results['name'];

	}

	

	public function getUserNameById($id){

		$sql = "SELECT `first_name` as name FROM `sh_users` where `id` ='$id'";

		$results=$this->conn->query($sql);

		

			$fetch =$results->fetch_assoc();

			return $fetch['name'];

		

		

	}

	

	public function getColoursDetailById($id){

		$sql = "SELECT * FROM `sh_color_attributes` where `id` ='$id'";

		$results=$this->conn->query($sql);

		$fetch =$results->fetch_assoc();

		return $fetch;

	}

	

  /*========================= End Submit Refund Details By Admin updateRefundProduct   */

  

  

  public function updateExchangeProduct($refid){

	  

	   

		$sql1 = "SELECT * FROM `sh_return_replace_requests` WHERE `id`='$refid' ";

		$result1 = $this->conn->query($sql1);

		$fetch=$result1->fetch_assoc();

		

		$userid=$fetch['userid'];

		$orderid=$fetch['order_id'];

		$orderdetailId=$fetch['product_order_detail_id'];

		

		$pid=$fetch['exchangepid'];

		$cid=$fetch['exchangecolorid'];

		$sid=$fetch['exchangesizeid'];

		$cattr=$fetch['exchangecolorattr'];

		$sattr=$fetch['exchangesizeattr'];

		$qty=$fetch['exchangeqty'];

		

		$orderDetailArr=self:: getOrderDetailsById($orderdetailId);

		$price=$orderDetailArr['price'];

		$gst=$orderDetailArr['gst'];

		

		$this->conn->query("INSERT INTO `sh_orders_details` (`id`, `pid`, `colorid`, `sizeid`, `colorattr`, `sizeattr`, `qty`, `price`, `gst`, `sh_orders_id`, `replacerefundtype`, `refundreturnapproval`, `dispatched`, `docketid`, `delivered`, `refundprice`, `exchanged_order_detail_id`) VALUES (NULL, '$pid', '$cid', '$sid', '$cattr', '$sattr', '$qty', '$price', '$gst', '$orderid', '0', '0', '0', '0', '0', '0', '$orderdetailId');");

		

		self::updateStockonExchange($pid,$cid,$sid,$orderdetailId);

	  

	  

	  

  }

  

  

  

  public function updateExchangeProductNew($refid,$type){

	  

	   

		$sql1 = "SELECT * FROM `sh_return_replace_requests` WHERE `id`='$refid' ";

		$result1 = $this->conn->query($sql1);

		$fetch=$result1->fetch_assoc();

		

		$userid=$fetch['userid'];

		$orderid=$fetch['order_id'];

		$orderdetailId=$fetch['product_order_detail_id'];

		

		$pid=$fetch['exchangepid'];

		$cid=$fetch['exchangecolorid'];

		$sid=$fetch['exchangesizeid'];

		$cattr=$fetch['exchangecolorattr'];

		$sattr=$fetch['exchangesizeattr'];

		$qty=$fetch['exchangeqty'];

		

		$orderDetailArr=self:: getOrderDetailsById($orderdetailId);

		$price=$orderDetailArr['price'];

		$gst=$orderDetailArr['gst'];

		

		if($type==1){

		

		$this->conn->query("INSERT INTO `sh_orders_details` (`id`, `pid`, `colorid`, `sizeid`, `colorattr`, `sizeattr`, `qty`, `price`, `gst`, `sh_orders_id`, `replacerefundtype`, `refundreturnapproval`, `dispatched`, `docketid`, `delivered`, `refundprice`, `exchanged_order_detail_id`) VALUES (NULL, '$pid', '$cid', '$sid', '$cattr', '$sattr', '$qty', '$price', '$gst', '$orderid', '0', '0', '0', '0', '0', '0', '$orderdetailId');");

		

		$this->conn->query("UPDATE `sh_orders` set `orderstatus` ='6' where `id` ='$orderid'");

		

		self::updateStockonExchange($pid,$cid,$sid,$orderdetailId);

	  

		}

	  

  }

  

  

  

  function updateRefundProduct($refid){

	  

	  

	    $sql1 = "SELECT * FROM `sh_return_replace_requests` WHERE `id`='$refid' ";

		$result1 = $this->conn->query($sql1);

		$fetch=$result1->fetch_assoc();

		$userid=$fetch['userid'];

		$orderid=$fetch['order_id'];

		$orderdetailId=$fetch['product_order_detail_id'];

		$stock=$fetch['exchangeqty'];

		

	    $sql1 = "SELECT * FROM `sh_orders_details` WHERE `id`='$orderdetailId' ";

		$result1 = $this->conn->query($sql1);

		$fetch=$result1->fetch_assoc();

		$opid=$fetch['pid'];

		$colorid=$fetch['colorid'];

		$sizeid=$fetch['sizeid'];

		

		

	  	 //echo "update  `sh_product_inventory` set `stock`=`stock` +$stock  WHERE `pid`='$opid' and `colorid`='$colorid' and `sizeid`='$sizeid' ";die;

		 $this->conn->query("update  `sh_product_inventory` set `stock`=`stock` +$stock  WHERE `pid`='$opid' and `colorid`='$colorid' and `sizeid`='$sizeid' ");

	  

  }

  

  

  

  function updateStockonExchange($pid,$cid,$sid,$orderdetailId){

	  

	    $sql1 = "SELECT * FROM `sh_orders_details` WHERE `id`='$orderdetailId' ";

		$result1 = $this->conn->query($sql1);

		$fetch=$result1->fetch_assoc();

		$opid=$fetch['pid'];

		$colorid=$fetch['colorid'];

		$sizeid=$fetch['sizeid'];

		// stock to plus

		 $this->conn->query("update  `sh_product_inventory` set `stock`=`stock` +1  WHERE `pid`='$opid' and `colorid`='$colorid' and `sizeid`='$sizeid' ");

		// stock to minus

		 $this->conn->query("update  `sh_product_inventory` set `stock`=`stock` -1  WHERE `pid`='$pid' and `colorid`='$cid' and `sizeid`='$sid' ");

		

	  

	  

  }

  

  public function getDetailsReplacementProductByOrderDetailsId($oderdetailsid)

		{



			$sql="SELECT * FROM `sh_return_replace_requests` WHERE `product_order_detail_id`='$oderdetailsid'";

			$result=$this->conn->query($sql);

			if($result->num_rows>0)

			{

				$data=$result->fetch_assoc();

				return $data;

			}

			else

			{

				return false;

			}

		}

  

  public static function createThumbNail($oldname,$width,$height){



	  if ($oldname == '') {

	$oldname = 'noimage.jpg';

    }

    if (!file_exists( "../../photos/" . $oldname)) {

	$oldname = 'noimage.jpg';

    }

    $imgName = $width . "_" . $height . "_" . $oldname;



	$newname = "../../thumb/". $imgName;  



 if(!file_exists($newname)){



		$imgpath=$width."_".$height."_".$oldname;



	



		$size = getImageSize("../../photos/".$oldname);



		$w = $size[0];



		$h = $size[1];



		$img_type=$size[2];



		//die($img_type);



	switch($img_type) {



          case '1':



          $resimage = imagecreatefromgif("../../photos/".$oldname);



          break;



          case '2':



          $resimage = imagecreatefromjpeg("../../photos/".$oldname);



          break;



          case '3':



          $resimage = imagecreatefrompng("../../photos/".$oldname);



          break;



      }



	 $thumb = self::thumbnail_boxs($resimage, $width, $height);



	 imagedestroy($resimage);



	if(is_null($thumb)) {



		/* image creation or copying failed */



		header('HTTP/1.1 500 Internal Server Error');



		exit();



	}



	 imagejpeg($thumb,$newname,100);



	 	return  $imgName;	  







	}else{



		return  $imgName;	  







	}



}



public function thumbnail_boxs($img, $box_w, $box_h) {



    //create the image, of the required size



	//$img="photos/".$img;



    $new = imagecreatetruecolor($box_w, $box_h);



    if($new === false) {



        return null;



    }











 



    $fill = imagecolorallocate($new, 255, 255, 255);



    imagefill($new, 0, 0, $fill);







   



    $hratio = $box_h / imagesy($img);



    $wratio = $box_w / imagesx($img);



    $ratio = min($hratio, $wratio);







    //if the source is smaller than the thumbnail size, 



    //don't resize -- add a margin instead



    //(that is, dont magnify images)



    if($ratio > 1.0)



        $ratio = 1.0;







    //compute sizes



    $sy = floor(imagesy($img) * $ratio);



    $sx = floor(imagesx($img) * $ratio);







    //compute margins



    //Using these margins centers the image in the thumbnail.



    //If you always want the image to the top left, 



    //set both of these to 0



    $m_y = floor(($box_h - $sy) / 2);



    $m_x = floor(($box_w - $sx) / 2);







    //Copy the image data, and resample



    //



    //If you want a fast and ugly thumbnail,



    //replace imagecopyresampled with imagecopyresized



    if(!imagecopyresampled($new, $img,



        $m_x, $m_y, //dest x, y (margins)



        0, 0, //src x, y (0,0 means top left)



        $sx, $sy,//dest w, h (resample to this size (computed above)



        imagesx($img), imagesy($img)) //src w, h (the full size of the original)



    ) {



        //copy failed



        imagedestroy($new);



        return null;



    }



    return $new;



}

 public static function createThumbNailAdmin($oldname,$width,$height){



	  if ($oldname == '') {

	$oldname = 'noimage.jpg';

    }

    if (!file_exists( "../photos/" . $oldname)) {

	$oldname = 'noimage.jpg';

    }

    $imgName = $width . "_" . $height . "_" . $oldname;



	$newname = "../thumb/". $imgName;  



 if(!file_exists($newname)){



		$imgpath=$width."_".$height."_".$oldname;



	



		$size = getImageSize("../photos/".$oldname);



		$w = $size[0];



		$h = $size[1];



		$img_type=$size[2];



		//die($img_type);



	switch($img_type) {



          case '1':



          $resimage = imagecreatefromgif("../photos/".$oldname);



          break;



          case '2':



          $resimage = imagecreatefromjpeg("../photos/".$oldname);



          break;



          case '3':



          $resimage = imagecreatefrompng("../photos/".$oldname);



          break;



      }



	 $thumb = self::thumbnail_boxs($resimage, $width, $height);



	 imagedestroy($resimage);



	if(is_null($thumb)) {



		/* image creation or copying failed */



		header('HTTP/1.1 500 Internal Server Error');



		exit();



	}



	 imagejpeg($thumb,$newname,100);



	 	return  $imgName;	  







	}else{



		return  $imgName;	  







	}



}



public function checkurlexists($url,$id){

	    if($id==0){

	  	 $sql="select * from `sh_products`  where  `view`='1' and `url`='$url'  ";

		}else{

		$sql="select * from `sh_products`  where  `view`='1' and `url`='$url' and `id`!='$id'  ";

		}

		

		$result=$this->conn->query($sql);

		if($result->num_rows>0){

			return true;

		

		}else{

			return false; 

		}

	

	

	}



public function checkbrandurlexists($url,$id){

	    if($id==0){

	  	 $sql="select * from `sh_brand_attributes`  where  `view`='1' and `url`='$url'  ";

		}else{

		$sql="select * from `sh_brand_attributes`  where  `view`='1' and `url`='$url' and `id`!='$id'  ";

		}

		

		$result=$this->conn->query($sql);

		if($result->num_rows>0){

			return true;

		

		}else{

			return false; 

		}

	

	

	}

	

	public function getAllConstructions(){

	$orders=array();

		$sql="select * from `sh_constructions`  where `view`='1'  ";

	

		$results=$this->conn->query($sql);

		if($results->num_rows>0){

    		while($row = $results->fetch_assoc()){

			    $id=$row['id'];

				$name=$row['name'];

    			$orders[$id]=$name;

    		}

    		

    	}

		

		return $orders;	

	}

    
    public function getAllColors(){

	$orders=array();

		$sql="select * from `sh_color_attributes`  where `view`='1'  ";

	

		$results=$this->conn->query($sql);

		if($results->num_rows>0){

    		while($row = $results->fetch_assoc()){

			    $id=$row['id'];

				$name=$row['name'];

    			$orders[$id]=$name;

    		}

    	}

		return $orders;	

	}
    
    public function getAllSizes(){

	$orders=array();

		$sql="select * from `sh_size_attributes_values`  where `view`='1'  ";

	

		$results=$this->conn->query($sql);

		if($results->num_rows>0){

    		while($row = $results->fetch_assoc()){

			    $id=$row['id'];

				$name=$row['name'];

    			$orders[$id]=$name;

    		}

    	}

		return $orders;	

	}
	
	public function getAllStates($country='101'){

		$orders=array();
	
			$sql="select * from `mz_state`  where `view`='1' and `country_id`='$country'  ";
	
		
	
			$results=$this->conn->query($sql);
	
			if($results->num_rows>0){
	
				while($row = $results->fetch_assoc()){
	
					$id=$row['id'];
	
					$name=$row['name'];
	
					$orders[$id]=$name;
	
				}
	
				
	
			}
	
			
	
			return $orders;	
	
		}
    
    
    public function sortnewtrendingproducts($type){
        
        if($type==1){
          return   $this->getNewProducts(30);
        }
        if($type==2){
           return $this->getTrendingProducts(30);  
        }
        
    }
    
   
	

}

?>