<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CouponObj=Cuisines::getinstance();
  $baseURL = 'getajax_coupons.php'; 
  $limit = filter_var($_POST["limitset"], FILTER_VALIDATE_INT);
 if(isset($_POST["page"]) || isset($_POST["keywords"]) || isset($_POST["sortBy"]))
 {
    $offset = !empty($_POST["page"]) ?  filter_var($_POST["page"], FILTER_VALIDATE_INT) : 0 ;
    $wheresql="";
    $orderBy="";
    if(!empty($_POST["keywords"]))
    {
      $keyword=filter_var($_POST["keywords"], FILTER_SANITIZE_STRING);
      $wheresql="WHERE `view`='1' AND (`code` LIKE '%".$keyword."%' OR `startdate` LIKE '%".$keyword."%' OR `enddate` LIKE '%".$keyword."%')";
    }
    else
    {
      $wheresql="WHERE `view`='1'";
    }
    if(!empty($_POST["sortBy"]))
    {
      $keyword=filter_var($_POST["sortBy"], FILTER_SANITIZE_STRING);
      $orderbysql="ORDER BY `id` ".$keyword."";
    }
    else
    {
      $orderbysql="ORDER BY `id` DESC";
    }
    $totalRecords=$CouponObj->getTotalNumberOfRecordAnyTableAjax("mz_coupons",$wheresql,$orderbysql);
    $allRecords=$CouponObj->getAllRecordsAnyTableAjax("mz_coupons",$limit,$wheresql,$orderbysql,$offset);
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
                            <th class="text-center"></th>
                                      <th class="text-center">Coupon Code</th>
                                      <th class="text-center">Coupon Discount</th>
                                      <th class="text-center">Minimum Order Price</th>
                                      <th class="text-center">Valid At</th>
                                      <th class="text-center">Created On</th>
                                      <th class="text-center">Country</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i=$offset+1;
                        if(isset($allRecords)):
                        foreach ($allRecords as $couponsdata)
                        {
                      ?>
                          <tr>
                            <td class="text-center"><?= $i++; ?>.</td>
                              <td class="text-center">
                                <?= strtoupper($couponsdata["code"]); ?>
                              </td>
                              <td class="text-center">
                                <?= $couponsdata["discount"]; ?>
                              </td>
                              <td class="text-center">
                                <?= $couponsdata["minorder"]; ?>
                              </td>
                              <td class="text-center">
                                <?= $couponsdata["enddate"]; ?>
                              </td>
                              <td class="text-center">
                                <?= $couponsdata["startdate"]; ?>
                              </td>
                              <td class="text-center">
                                <?php
                                $cuisinescountry=$CouponObj->getCountryName($couponsdata["country_id"]);
                                ?>
                                <?= $cuisinescountry[0]["name"]; ?>
                              </td>
                              </td>
                              <td class="text-center">
                                <?php
                                $curdate=strtotime(date('Y-m-d'));
                          $mydate=strtotime($couponsdata["enddate"]);
                                if($couponsdata["status"]=="1" && $curdate<$mydate)
                                  {
                                ?>
                              <span class="badge badge-success">Active</span>
                              <?php } else { ?>
                              <span class="badge badge-danger">Inactive</span>
                              <?php } ?>
                              </td>
                              <td class="text-center">
                                <div class="d-inline-flex">
                                  <a href="<?= BASEURL;?>/create-cuisines.php?id=<?= base64_encode($couponsdata['id']);?>" class="btn btn-dark btn-with-icon btn-block"><i class="typcn typcn-edit"></i> Edit</a>
                                  <button class="btn btn-dark ml-2" onclick="deleteCuisine('<?= $couponsdata["id"];?>');"><i class="fa fa-trash"></i></button>
                                </div>
                              </td>
                          </tr>
                        <?php } endif; ?>
                      </tbody>
                  </table>
                  <!-- Display pagination links -->
                  <?php echo $paginationObj->createLinks(); } ?>