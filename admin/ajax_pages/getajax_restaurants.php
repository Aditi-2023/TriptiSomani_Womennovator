<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $RestaurantsObj=Restaurants::getinstance();
  $baseURL = 'getajax_restaurants.php'; 
  $limit = filter_var($_POST["limitset"], FILTER_VALIDATE_INT);
  if(isset($_POST["page"]) || isset($_POST["keywords"]) || isset($_POST["sortBy"]))
 {
    $offset = !empty($_POST["page"]) ?  filter_var($_POST["page"], FILTER_VALIDATE_INT) : 0 ;
    $wheresql="";
    $orderBy="";
    if(!empty($_POST["keywords"]))
    {
      $keyword=filter_var($_POST["keywords"], FILTER_SANITIZE_STRING);
      $wheresql="WHERE a.`view`='1' AND (a.`name` LIKE '%".$keyword."%' OR a.`pdate` LIKE '%".$keyword."%' OR a.`name_local` LIKE '%".$keyword."%' OR a.`phone` LIKE '%".$keyword."%' OR a.`mobile` LIKE '%".$keyword."%' OR a.`email` LIKE '%".$keyword."%' OR b.`user_name` LIKE '%".$keyword."%')";
    }
    else
    {
      $wheresql="WHERE a.`view`='1'";
    }
    if(!empty($_POST["sortBy"]))
    {
      $keyword=filter_var($_POST["sortBy"], FILTER_SANITIZE_STRING);
      $orderbysql="ORDER BY a.`id` ".$keyword."";
    }
    else
    {
      $orderbysql="ORDER BY a.`id` DESC";
    }
    $totalRecords=$RestaurantsObj->getTotalNumberOfRecordRestaurantsAjax($wheresql,$orderbysql);
    $allRecords=$RestaurantsObj->getAllRecordsRestaurantsAjax($limit,$wheresql,$orderbysql,$offset);
    $pagConfig = array( 
            'baseURL' => $baseURL, 
            'totalRows' => $totalRecords["rowCount"], 
            'perPage' => $limit,
            'currentPage'=>$offset,
            'contentDiv' => 'postContent', 
            'link_func' => 'searchFilter' 
        );
    $paginationObj=new Pagination($pagConfig);
?>

                <table id="restaurants_table" class="table table-bordered table-hover mb-0 text-md-nowrap">
									    <thead>
									        <tr>
									        	<th>S.No.</th>
									            <th>Name</th>
									            <th>Phone</th>
									            <th>Mobile</th>
									            <th>Email</th>
									            <th>Manager</th>
									            <th>Delivery Available</th>
									            <th>Closed</th>
									            <th>Status</th>
									            <th>Action</th>
									        </tr>
									    </thead>
									    <tbody>
									        <?php
								    		$i=1;
								    		if(isset($allRecords)):
								    		foreach ($allRecords as $RestaurantsData)
								    		{
								    	?>
									        <tr>
									        	<td class="text-center"><?= $i++; ?>.</td>
									            <td class="text-center">
									            	<?= ucwords($RestaurantsData["name"]); ?>
									            </td>
									            <td class="text-left">
									            	<?= $RestaurantsData["phone"]; ?>
									            	
									            </td>
									            <td class="text-center">
									            	<?= $RestaurantsData["mobile"]; ?>
									            </td>
									            <td>
									            	<p class="m-2"><span class="text-primary"><?= $RestaurantsData["email"]; ?></span> </p>
									            </td>
									            <td class=text-center>
									            	<?php
									            	$RestaurantsOwner=$RestaurantsObj->getUserName($RestaurantsData["owner"]);
									            	?>
									            	<?= $RestaurantsOwner[0]["user_name"]; ?>
									            </td>
									            <td class="text-center">
									            	<?php if($RestaurantsData["available_for_delivery"]=='1') { ?>
									            	<span class="badge badge-pill badge-success">Yes</span>
									            	<?php } else { ?>
									            	<span class="badge badge-pill badge-danger">No</span>
									            	<?php } ?>
									            </td>
									            <td class="text-center">
									            	<?php if($RestaurantsData["closed"]=='1') { ?>
									            	<span class="badge badge-pill badge-success">Open</span>
									            	<?php } else { ?>
									            		<span class="badge badge-pill badge-danger">Close</span>
									            	<?php } ?>
									            </td>
									            <td class="text-center">
									            	<input type="checkbox" checked class="toggle-one" onchange="Updatestatus('<?= $RestaurantsData['id'];?>');" <?= ($RestaurantsData['status'] == 1) ? 'checked' : '';?>>
									            </td>
									            <td class="text-center">
									            	<div class="d-inline-flex">
										            	<a href="<?= BASEURL;?>/create-restaurants.php?id=<?= base64_encode($RestaurantsData['id']);?>" class="btn btn-dark btn-with-icon btn-block"><i class="typcn typcn-edit"></i> Edit</a>
										            	<button class="btn btn-dark ml-2" onclick="deleteRestaurant('<?= $RestaurantsData['id'];?>');"><i class="fa fa-trash"></i></button>
									            	</div>
									            </td>
									        </tr>
									      <?php } endif; ?>
									        
									    </tbody>
				</table>
                  <!-- Display pagination links -->
                  <?php echo $paginationObj->createLinks(); } ?>

 