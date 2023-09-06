<?php
class DriverClass extends Db
{
  public $conn;
  public $name;
  public $status; 
  
  public function __construct() 
  {
    
    $this->conn = parent::__construct();
  }

// delivery mode******************************


public function Deletenetwork($id)
{
    $sql="UPDATE `pro_data` SET `view`='0' WHERE `id`='$id'";
    //echo $sql; 
     $result=$this->conn->query($sql);
     if($result)
     {
       return true;
     }
}

public function featured_data($id,$val)
{
  if($val=='0')
  {
    $finalval='1';

  }
  else
  {
    $finalval='0';
  }
 $sql="UPDATE `registered_users` SET `status`='$finalval' WHERE `id`='$id'";

     $result=$this->conn->query($sql);
     if($result)
     {
       return true;
     }
}



public function getalltable($table)
{
    $sql="SELECT * from `$table` WHERE  `view`='1'";
    //echo $sql;
     $result=$this->conn->query($sql);
     $fetchAll = $result->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
     
}

public function getalltable1($table,$type)
{
    $sql="SELECT * from `$table` WHERE  `view`='1' and `type`='$type'";
    //echo $sql;
     $result=$this->conn->query($sql);
     $fetchAll = $result->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
     
}


public function orderbylimit($table,$data,$data1)
{
    $sql="SELECT * from `$table` WHERE  `view`='1' order by id desc limit $data,$data1";
    //echo $sql;
     $result=$this->conn->query($sql);
     $fetchAll = $result->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
     
}

public function getallOftableWithWhere($table,$page_bg)
{
    $sql="SELECT * from `$table` WHERE  `view`='1' and `page_bg`='$page_bg' order by id desc";
    
     $result=$this->conn->query($sql);
     $fetchAll = $result->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
     
}

public function getallOftableWithWhere1($table,$page_bg)
{
    $sql="SELECT * from `$table` WHERE  `view`='1' and `page_bg`='$page_bg' order by `vedio_position` ASC";
    
     $result=$this->conn->query($sql);
     $fetchAll = $result->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
     
}


public function GetIdByName($table,$colname,$id)
  {
    $sql ="select * from `$table` where `id` = '$id'";
      $results=$this->conn->query($sql);
        $fetch=$results->fetch_assoc();
      $name=$fetch[$colname];
      return $name;
  }


// featured data *****************

public function GetDetailsByid($id,$table){
 $sql="select * from `$table` where `id`='$id'";
  $query=$this->conn->query($sql);
  $row=$query->fetch_assoc();
  return $row;  
}



public function GetGroupDetailsByid($id,$table){
  $sql="select * from `$table` where `id`='$id'";
   $query=$this->conn->query($sql);
   $row=$query->fetch_assoc();
   return $row;  
 }



  









public function sendBasicMail($to,$from,$fromname,$subject,$msg)
  {


    try{
           $post = array('from' => $from,
                         'fromName' => $fromname,
                         'subject' => $subject,
                         'bodyHtml' => $msg,
                         'isTransactional' => true,
                         'to'=>$to,
                        );
            
           $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://oceac.dkddev.com/reg/EmailService/send2.php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $post
    ));

    $response = curl_exec($curl);
   // print_r($response);
   // die;
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      //echo "cURL Error #:" . $err;
    } else {
      //echo $response;
    }
           
         
    }
    catch(Exception $ex){
       //echo $ex->getMessage();
    }
  }


public function getMailTemplate($username)
  {

  $html='<span>Cher/Chère '.$username.'</span>,<br>
    <p>Merci d&#39;avoir terminé votre inscription auprès de l&#39;Oceac.
Cet e-mail sert de confirmation que votre compte est activé et que vous faites officiellement</p>';
      return $html; 
  }

public function getMailTemplate1($username)
  {

  $html='<span>Hi '.$username.'</span>,<br>
    <p>Thanks for signing up to oceac.dkddev.com ! and Deactivate your Account</p>';
      return $html; 
  }

  public function Commenmailer($sms,$url)
  {

  $html='<span>'.$sms.'</span>,<br>
    <p>'.$url.'</p>';
      return $html; 
  }


  public function AddGroup($post)
{
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
  $allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;
	if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
       $image=$nationalpermitPath_m;
      }
     }
	
   }
$sql="INSERT INTO `tbl_gallery`(`img`,`date`, `time`)  VALUES ('$image','$date','$time')";
 $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}


public function updatecounter($post)
{
  
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
 $id=$this->conn->real_escape_string($_POST['id']);
 $title=$this->conn->real_escape_string($_POST['title']);
  $des=$this->conn->real_escape_string($_POST['des']);
 //$heading=$this->conn->real_escape_string($_POST['group_name']);
$allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
 

    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;

    if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
          $image=$nationalpermitPath_m;
      }
     }
   }
   else
    {
       $image=$_POST['image_h'];
    }

$sql="UPDATE `tbl_counter` SET `title`='$title',`des`='$des',`img`='$image' WHERE id='$id'";



  $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}







public function Updateaward($post)
{
  
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
 $id=$this->conn->real_escape_string($_POST['id']);
 $title=$this->conn->real_escape_string($_POST['title']);
  $des=$this->conn->real_escape_string($_POST['des']);
 //$heading=$this->conn->real_escape_string($_POST['group_name']);
$allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
 

    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;

    if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
          $image=$nationalpermitPath_m;
      }
     }
   }
   else
    {
       $image=$_POST['image_h'];
    }

$sql="UPDATE `tbl_awardes` SET `title`='$title',`des`='$des',`img`='$image' WHERE id='$id'";



  $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}

public function UpdateGroup($post)
{
  
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
 $id=$this->conn->real_escape_string($_POST['id']);

 //$heading=$this->conn->real_escape_string($_POST['group_name']);
$allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
 

    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;

    if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
          $image=$nationalpermitPath_m;
      }
     }
   }
   else
    {
       $image=$_POST['image_h'];
    }

$sql="UPDATE `tbl_gallery` SET `img`='$image' WHERE id='$id'";


  $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}


 public function AddawardGroup($post)
{
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
  $title=$this->conn->real_escape_string($_POST['title']);
  $des=$this->conn->real_escape_string($_POST['des']);
  
  $allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;
	if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
       $image=$nationalpermitPath_m;
      }
     }
	
   }
$sql="INSERT INTO `tbl_awardes`(`title`,`des`,`img`,`date`)  VALUES ('$title','$des','$image','$date')";
 $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}


public function Addcounter($post)
{
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
  $title=$this->conn->real_escape_string($_POST['title']);
  $des=$this->conn->real_escape_string($_POST['des']);
  
  $allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;
	if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
       $image=$nationalpermitPath_m;
      }
     }
	
   }
$sql="INSERT INTO `tbl_counter`(`title`,`des`,`img`,`date`)  VALUES ('$title','$des','$image','$date')";
 $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}



public function GetDetailsByiduser($id,$table){
    $sql="select * from `$table` where `program`='$id' and `view`='1'";

  $query=$this->conn->query($sql);
   $fetchAll = $query->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
  //$row=$query->fetch_assoc();
  //return $row;  
}


public function GetIdBydatalike($id,$table){
  $sql="SELECT * FROM `registered_users` WHERE `program` LIKE '%$id%' ORDER BY `first_name` ASC";

  $query=$this->conn->query($sql);
   $fetchAll = $query->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
  //$row=$query->fetch_assoc();
  //return $row;  
}

public function GetDetailsByiduser1($id,$table){
  if(!empty($id))
  {
        $sql="select * from `$table` where `program`='$id' and `view`='1'";
  }
  else{
    $sql="select * from `$table` where `view`='1'";
     }

  $query=$this->conn->query($sql);
   $fetchAll = $query->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
  //$row=$query->fetch_assoc();
  //return $row;  
}


public function checkValueExist($program_id)
  {
    
     $sqlgetemal="SELECT * FROM `oceac_moderator` where `program_id` ='$program_id'";
    
     $result=$this->conn->query($sqlgetemal);
        
   $numrow=$result->num_rows;
       // print_r($numrow);
   
    if(empty($numrow))
     {
      return '0';
     }
    else 
    {
      return '1';
    }
   
     }


  public function Addmodertor($post)
{
  
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
 $groupName=$this->conn->real_escape_string($_POST['groupName']);
 $user_id=$this->conn->real_escape_string($_POST['program']);
 $check=$this->checkValueExist($groupName);
 if($check==0)
 {
 
$sql="INSERT INTO `oceac_moderator`(`program_id`, `user_id`, `p_date`) VALUES ('$groupName','$user_id','$date')";
 $query=$this->conn->query($sql);
          if($query==true)
          {
          return true;
          }
          else
          {
            return false;
          }
        }
        else{
          return false;
        }
  
}

  public function Updatemodertor($post)
{
  
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
 $groupName=$this->conn->real_escape_string($_POST['groupName']);
 $user_id=$this->conn->real_escape_string($_POST['program']);
 $e_id=$this->conn->real_escape_string($_POST['e_id']);
 $check=$this->checkValueExist($groupName);
 if($check==0)
 {
  $sql="UPDATE `oceac_moderator` SET `program_id`='$groupName',`user_id`='$user_id' WHERE `id`='$e_id'";

 $query=$this->conn->query($sql);
          if($query==true)
          {
          return true;
          }
          else
          {
            return false;
          }
        }
        else{
           return false;
        }
  
}

public function GetuserIdByMentor($id){
    $sql="select `user_id` from `oceac_moderator` where `program_id`='$id' and `view`='1'";

  $query=$this->conn->query($sql);
   $fetchAll = $query->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
  //$row=$query->fetch_assoc();
  //return $row;  
}

public function GetUserdetailswhereIn($id,$table){
 $sql="select * from `registered_users` WHERE `id` IN ($id)";
  $query=$this->conn->query($sql);
$fetchAll = $query->fetch_All(MYSQLI_ASSOC);
     return $fetchAll;
}

  public function Addnewroom($post)
{
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
 $title=$this->conn->real_escape_string($_POST['title']);
 $url=$this->conn->real_escape_string($_POST['url']);
  $newroom=$this->conn->real_escape_string($_POST['newroom']);
  $allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;
	if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
       $image=$nationalpermitPath_m;
      }
     }
	
   }
$sql="INSERT INTO `tbl_newroom`(`img`,`title`,`link`,`type`,`date`,`time`)  VALUES ('$image','$title','$url','$newroom','$date','$time')";
 $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}

public function upnewsroom($post)
{
  
 $date=date('d-m-Y'); 
 $time=date('H:i:s');
 $id=$this->conn->real_escape_string($_POST['id']);
 $title=$this->conn->real_escape_string($_POST['title']);
  $url=$this->conn->real_escape_string($_POST['url']);
  $des=$this->conn->real_escape_string($_POST['des']);
 //$heading=$this->conn->real_escape_string($_POST['group_name']);
$allowedExtentions=array("JPG","JPEG","GIF","PNG","PDF","WEBP");
 

    $nationalpermitPath_m='';  
    $path_m= basename($_FILES['image']['name']); 
    if($path_m!='')
    {
    $ext_m = pathinfo($path_m, PATHINFO_EXTENSION);
    $rand_m=rand(1000,1000000);
    $hms_m=date('his');
    $nationalpermitPath_m=$rand_m."".$hms_m.".".$ext_m;

    if( in_array( strtoupper($ext_m) ,$allowedExtentions ))
    {
      $newsimagenamesrc_m=$_FILES['image']['tmp_name'];
      $moveimg_m=move_uploaded_file($newsimagenamesrc_m,'../photos/'.$nationalpermitPath_m);

    if($moveimg_m)
      {
          $image=$nationalpermitPath_m;
      }
     }
   }
   else
    {
       $image=$_POST['image_h'];
    }

$sql="UPDATE `tbl_newroom` SET `title`='$title',`img`='$image',`link`='$url' WHERE id='$id'";

  $query=$this->conn->query($sql);
  if($query==true)
  {
  return true;
  }
  else
  {
    return false;
  }
  
}





}
?>