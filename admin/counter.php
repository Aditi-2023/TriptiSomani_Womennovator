<?php  
session_start();
error_reporting(1);
   include_once('../conf/Db.php');
   include_once('components/Admin.php');
   include_once('components/DriverClass.php');
   include_once('components/Med_CommonClass.php');
   //include_once('autoload.php');
   $adminObj= new Admin();
   $driverObj=new DriverClass();
   $med_common_Obj=new Med_CommonClass();
   $GetDetailByid=$driverObj->GetDetailsByid(base64_decode($_GET['eid']),'tbl_counter');
  
   $employee_data=$driverObj->getalltable('tbl_counter');
   //echo "<pre>"; print_r($employee_data);die; 
if(isset($_GET["did"]))
{
    $result=$med_common_Obj->DeleteDataById($_GET["did"],'tbl_counter');
    if($result>0)
    {
      header("Location:counter.php?msg=ds");
    }
    else
    {
      header("Location:counter.php?msg=df");
    }
}

 if(isset($_POST["Add"]))
   {
     echo  $result=$driverObj->Addcounter($_POST);
       if($result>0)
       {
         header("Location:counter.php?msg=ins");
       }
       else
       {
         header("Location:counter.php?msg=inf");
       }
   }
 
    if(isset($_POST["update"]))
   {
       $result=$driverObj->updatecounter($_POST);
       if($result>0)
       {
         header("Location:counter.php?msg=ups");
       }
       else
       {
         header("Location:counter.php?msg=upf");
       }

   }

   
  

   ?>



  <!DOCTYPE html>

<html lang="en">

   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

   <head>

      <?php include_once('all-css.php'); ?>

   </head>

   <body class="main-body app  sidebar-mini leftmenu-dark">

      <?php include_once('sidebar.php'); ?>

      <!-- main-content -->

      <div class="main-content app-content">

         <?php include_once('header.php'); ?>

         <!-- container -->

         <div class="container-fluid">

            <!-- breadcrumb -->

            <div class="breadcrumb-header justify-content-between">

            </div>

            

            <div class="row row-sm">

               <div class="col-md-12 col-lg-12 col-xl-12">

                  <div class="card">

                    

                     <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">

                        <div class="d-flex justify-content-between">

                           <h4 class="card-title mb-0">Add New Index Counter</h4>

                          

                        </div>

                     </div>

                     <div class="card-body">
					 <?php  echo Db::showMessage($_GET['msg']); ?>

                        <div class="tab-content">

                           <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">

                              <div class="container">

                                 <div class="">

                                    <form class="row" method="POST"  enctype="multipart/form-data" >
<div class="col-md-3">
<label for="vehicle_make" class="">Title</label> 

                                             <div class="input-group">
							<input type="text" name="title" value="<?=$GetDetailByid['title']?>" class="form-control">
											  </div>

</div>

<div class="col-md-3">
<label for="vehicle_make" class="">count No</label> 

                                             <div class="input-group">
							<input type="text" name="des" value="<?=$GetDetailByid['des']?>" class="form-control">
											  </div>

</div>
                                       

                                  

                                   <div class="col-md-6">

                                            <label for="vehicle_make" class="">Gellay Image</label> 

                                             <div class="input-group">
											  <input type="hidden" name="id" value="<?php echo base64_decode($_GET['eid'])?>">

                                                <input type="file" class="form-control" name="image">

                                                  <?php 

                                                  if(!empty($GetDetailByid['img'])){

                                               echo'<input type="hidden" name="image_h" value="'.$GetDetailByid['img'].'">';
                                               }
                          if(!empty($_GET['eid']))

                                                {

                                                echo'<img src="../photos/'.$GetDetailByid['img'].'" style="width:50px;">';

                                                }

                                                ?>

                                            </div>

                                   </div>

                                    

                                   <div class="col-md-6">

                                        

                                          <?php

                                             if($_GET['eid'])

                                             {

                                             echo' <button class="btn btn-primary" type="submit" name="update"style="margin-top: 30px;">Update</button>';

                                             }

                                             else

                                             {

                                              echo' <button class="btn btn-primary" type="submit" name="Add"style="margin-top: 30px;">Add</button>';

                                             }

                                          ?>

                                                 

                                               



                                    </div>

                                    

                                    </form> 

 

                                </div>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>





 <div class="card">

              

                                

                                

                                <div class="main-card mb-3 card">

                                  

                                    <div class="card-body"><h5 class="card-title">View All Groups

                                    </h5>

                                        <!-- data table -->

                                        <table class="mb-0 table table-bordered display responsive nowrap" style="width:100%" id="example">

                                           <thead>

                                             <tr>

                                               <th>S.No</th>
										 <th>Title</th>
										 <th>Description</th>

                                               <th> Image</th>

                                               <th>Action</th>

                                             </tr>

                                           </thead>

                                           <tbody>

                                             <?php

                                             $i=1;

                                             foreach ($employee_data as  $value) 

                                            {

                                             // echo"<pre>"; 

                                             //  print_r($value);

                                             // echo'</pre>';

                                            ?>

                                              <tr>

                                                <td><?= $i++; ?></td>
                                                <td><?=$value['title'];?></td>
                                                <td><?=$value['des'];?></td>
                                               
<td>

                                                  <img src="../photos/<?=$value['img'];?>" style="width:50px;">

                                                  </td>

                                               

                                                <td>

                                                  <button class="btn btn-danger btn-sm" onClick="edit_vendor('<?php echo  base64_encode($value["id"]);?>')"> <i class="fa fa-edit"></i></button>

                                                  <button class="btn btn-danger btn-sm" onClick="delete_admin('<?= $value["id"];?>')"> X </button>

                                                   

                                                </td>

                                              </tr>

                                          <?php  } ?>

                                           </tbody>

                                        </table>



                                        <!-- end data table -->

                                    </div>

                                </div>

                            </div>







               </div>

            </div>

            <!-- /Container -->

         </div>

      </div>

      </div>

      <!-- /main-content -->

      <?php include_once('footer.php'); ?>

   </body>

  

   <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

   <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

   <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

   <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>

   <script>

      CKEDITOR.replace('desc');

      

   </script>

   <?php

      if(isset($_GET['msg']) && !empty($_GET['msg'])):

        switch ($_GET['msg']) {

          case 'ins':

             $message="Data Successfully Inserted";

            break;

          case 'inf':

             $message="Data Not Inserted";

            break;

          case 'ups':

             $message="Data Successfully Updated";

            break;

          case 'upf':

             $message="Some Error Occoured";

            break;

          

           case 'dls':

             $message="Data Successfully Deleted";

            break;

          case 'dlf':

             $message="Some Error Occoured";

            break;

          

          default:

            # code...

            break;

        }

      ?>

   <?php endif;?>

   <script type="text/javascript">

      $(document).ready(function() {

          $('#example').DataTable();

          $('.modal').modal({

                  show: false,

                  keyboard: false,

                  backdrop: 'static'

              });

      });

      

        $("#vendor_status").on('click', function()

        {

      

          if (this.checked) {

              $("#vendor_status_main").val(1);

            } else {

              $("#vendor_status_main").val(0);

            }

        });

      $("#status_up").on('click', function()

        {

      

          if (this.checked) {

              $("#status_main_up").val(1);

            } else {

              $("#status_main_up").val(0);

            }

        });

      

      

      

      /*modal edit*/

      function edit_vendor(id)

      {

        var id=id;

        window.location.href='counter.php?eid='+id

        

        

      }

      

      

     function delete_admin(id)

{

  var id=id;

  var conf=confirm("Are You Sure? You Want To Delete Groups")

  if(conf)

  {

  window.location.href='counter.php?did='+id

  }

  else

  {

  return false;

  }

}





function Active_decative(id,value)

{

  var id=id;

  var value=value;

  var conf=confirm("Are You Sure? You Want To Change Status Of This Data")

  if(conf)

  {

  window.location.href='counter.php?a_id='+window.btoa(id) + "&val=" + window.btoa(value);

  }

  else{

  return false;

  }

}

      

   </script>

   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <script>

      $( function() {

      

       $( ".datepicker" ).datepicker({

          changeMonth: true,

          changeYear: true,

          dateFormat: 'dd-mm-yy'

      

        });

        $( "#datepicker" ).datepicker({

          changeMonth: true,

          changeYear: true,

          dateFormat: 'dd-mm-yy'

      

        });

        $( "#datepicker1" ).datepicker({

          changeMonth: true,

          changeYear: true,

          dateFormat: 'dd-mm-yy'

      

        });

        $( "#datepicker2" ).datepicker({

          changeMonth: true,

          changeYear: true,

          dateFormat: 'dd-mm-yy'

      

        });

      

        $( "#datepicker3" ).datepicker({

          changeMonth: true,

          changeYear: true,

          dateFormat: 'dd-mm-yy'

      

        });

      

      

      

      } );

   </script>

</html>