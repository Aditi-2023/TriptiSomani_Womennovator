<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $foodClass = new FoodClass();
  $restaurantObj = new Restaurants();
  $baseURL = 'getajax_foodsrestaurant.php'; 
  $limit = filter_var($_POST["limitset"], FILTER_VALIDATE_INT);
 if(isset($_POST["page"]) || isset($_POST["keywords"]) || isset($_POST["sortBy"]))
 {
    $offset = !empty($_POST["page"]) ?  filter_var($_POST["page"], FILTER_VALIDATE_INT) : 0 ;
    $restid=filter_var($_POST["restid"], FILTER_VALIDATE_INT);
    $countid=filter_var($_POST["countid"], FILTER_VALIDATE_INT);
    $wheresql="";
    $orderBy="";
    if(!empty($_POST["keywords"]))
    {
      $keyword=filter_var($_POST["keywords"], FILTER_SANITIZE_STRING);
      $wheresql="WHERE `mf`.`view`='1' AND `mf`.`restaurant_id` ='".$restid."' AND `mf`.`country_id` = '".$countid."' AND (`mf`.`name` LIKE '%".$keyword."%' OR `mf`.`price` LIKE '%".$keyword."%' OR `mf`.`name_local` LIKE '%".$keyword."%' OR `mm`.`name` LIKE '%".$keyword."%')";
    }
    else
    {
      $wheresql="WHERE `mf`.`view`='1' AND `mf`.`restaurant_id` ='".$restid."' AND `mf`.`country_id` = '".$countid."'";
    }
    if(!empty($_POST["sortBy"]))
    {
      $keyword=filter_var($_POST["sortBy"], FILTER_SANITIZE_STRING);
      $orderbysql="ORDER BY `mf`.`id` ".$keyword."";
    }
    else
    {
      $orderbysql="ORDER BY `mf`.`id` DESC";
    }
    $totalRecords=$foodClass->getAjaxTotalNumberOfRecordFoodsTableByRestaurantId($wheresql,$orderbysql);
    $allRecords=$foodClass->getAjaxAllRecordsFoodsTableByRestaurantId($limit,$wheresql,$orderbysql,$offset);
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

                <table id="" class="table table-bordered table-hover mb-0">
                      <thead>
                          <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Name Local</th>
                            <th>Price</th>
                            <th>Restaurant</th>
                            <th>Featured</th>
                            <th>Menu</th>
                            <th>Customized</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    <?php if($allRecords) {
                      $i=$offset+1;
                    foreach ($allRecords as $foodArr){
                    $imgPath=$foodArr['imagepath'];
                    if($imgPath==''){
                    $imgPath='no-image.png';
                    }
                    
                    ?>
                                        
                          <tr>
                              <td class="text-center">
                                <?php echo $i; ?>
                              </td>
                                               
                              <td class="text-center">
                                <img class="img img-responsive img-thumbnail" style="width:100px" src="<?= BASEURL;?>/assets/img/foodpics/<?php echo $imgPath; ?>" alt="image_default">
                              </td>
                               <td class="text-center">
                                <?php echo  $foodArr['name'];  ?>
                              </td>
                              <td class="text-center">
                                <?php echo  $foodArr['name_local'];  ?>
                              </td>
                              <td class="text-center">
                                <?php echo  $foodArr['price'];  ?>
                              </td>
                              <td class="text-center">
                                <?php
                                  $restaurantname = $restaurantObj->getRestaurantDetailById($foodArr['restaurant_id']);
                                  echo  $restaurantname['name'];  
                                ?>
                              </td>
                              <td class="text-center">
                                <?php  if($foodArr['featured']==1){ echo 'Yes';}else{ echo "No"; }  ?>
                              </td>
                              <td class="text-center">
                                <?php echo  $foodArr['catName'];  ?>
                              </td>
                              <td class="text-center">
                                <?php
                                  if($foodArr['customizeprice'] == 1):
                                ?>
                                <a href="addcustomizedprice.php?foodid=<?= base64_encode($foodArr['id']);?>&resid=<?= base64_encode($foodArr['restaurant_id']);?>" class="btn btn-primary"> Customize</a>
                                 <?php
                                   else: echo '<p>N/A</p>';
                                   endif;
                                  ?>
                              </td>
                              <td class="text-center">
                                <input type="checkbox" class="toggle-one" onchange="Updatestatus('<?= $foodArr["id"];?>');" <?= ($foodArr["status"] == 1) ? 'checked' : '';?>>
                              </td>
                             
                              <td class="text-center">
                                <div class="d-inline-flex">
                                  <a class="btn btn-dark btn-with-icon btn-block" href="create-foods.php?id=<?= base64_encode($foodArr['id']);?>&rid=<?= $rid;?>"><i class="typcn typcn-edit"></i> Edit</a>
                                  <button class="btn btn-dark ml-2" onclick="deleteFood('<?php echo $foodArr['id']  ?>')"><i class="fa fa-trash"></i></button>
                                </div>
                              </td>
                          </tr>
                          
                       <?php $i++;}}?>   
                      </tbody>
                  </table>
                  <!-- Display pagination links -->
                  <?php echo $paginationObj->createLinks(); } ?>