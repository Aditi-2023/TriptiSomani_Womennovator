<?php

$base=$_SERVER['DOCUMENT_ROOT'].'/';

require_once $base.'conf/conn.php';

class Db 
{
	private $host=HOST;
	private $user=USER;
	private $pass=PASS;
	private $db=DB;
	protected $conn=null;

	function __construct()
	{
		return $this->connection();
		  echo "done";
	}
	
	

	private function connection()
	{
// 	echo "ok";
// 	die;
	$this->conn= new Mysqli($this->host,$this->user,$this->pass,$this->db);
		
		
		
		if ($this->conn) {
			//echo "make a connection";
			return $this->conn;
		}
		else
		{
			echo "Not connected";
		}
	}

	public function Close()
	{  
            mysql_close();  
		
    }	
	
	 public static function showMessage($msg){

        switch ($msg) {

            case 'ins':

                return '<div class="alert alert-success alert-dismissible fade show"><strong>Success!</strong> Data has been inserted successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

            case 'inf':

                return '<div class="alert alert-warning alert-dismissible fade show"><strong>Warning!</strong> Data not inserted successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

                

                  case 'ds':

                return '<div class="alert alert-success alert-dismissible fade show"><strong>Success!</strong> Data has been deleted successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

            case 'df':

                return '<div class="alert alert-danger alert-dismissible fade show"><strong>Warning!</strong> Data not deleted successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;
         case 'mail':

                return '<div class="alert alert-success alert-dismissible fade show"><strong>Success! </strong>Mail Send Successfully<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;
                

            case 'ups':

                return '<div class="alert alert-success alert-dismissible fade show"><strong>Success!</strong> Data  update successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;



            case 'upf':

                return '<div class="alert alert-warning alert-dismissible fade show"><strong>Warning!</strong> Data not updated.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

            case 'pwf':

                return '<div class="alert alert-warning alert-dismissible fade show"><strong>Warning!</strong> Enter wrong credentials.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

            case 'exists':

                return '<div class="alert alert-warning alert-dismissible fade show"><strong>Warning!</strong> This Group Moderator Already Exists.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

                

                  case 'mds':

                return '<div class="alert alert-success alert-dismissible fade show"><strong>Success!</strong> Mode Of Delivery has been updated successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

                

                  case 'gws':

                return '<div class="alert alert-success alert-dismissible fade show"><strong>Success!</strong> Gross Weight has been updated successfully.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;



                case 'vae':

                    return '<div class="alert alert-danger alert-dismissible fade show"><strong>Warning!</strong> This Vehicle Number Already Exists.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

                

            case 'blank':

                return '<div class="alert alert-warning alert-dismissible fade show"><strong>Warning!</strong> Something went wrong.<button type="button" class="close" data-dismiss="alert">&times;</button></div>';

                break;

        }

    }
	
	
}

?>