<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CuisinesObj=Cuisines::getinstance();
  $baseURL = 'getajax_cuisines.php'; 
  $limit = filter_var($_POST["limitset"], FILTER_VALIDATE_INT);
 if(isset($_POST["page"]) || isset($_POST["keywords"]) || isset($_POST["sortBy"]))
 {
    $offset = !empty($_POST["page"]) ?  filter_var($_POST["page"], FILTER_VALIDATE_INT) : 0 ;
    $wheresql="";
    $orderBy="";
    if(!empty($_POST["keywords"]))
    {
      $keyword=filter_var($_POST["keywords"], FILTER_SANITIZE_STRING);
      $wheresql="WHERE `view`='1' AND (`name` LIKE '%".$keyword."%' OR `pdate` LIKE '%".$keyword."%' OR `name_local` LIKE '%".$keyword."%')";
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
    $totalRecords=$CuisinesObj->getTotalNumberOfRecordAnyTableAjax("mz_cusines",$wheresql,$orderbysql);
    $allRecords=$CuisinesObj->getAllRecordsAnyTableAjax("mz_cusines",$limit,$wheresql,$orderbysql,$offset);
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
                              <th class="text-center">Name</th>
                              <th class="text-center">Name In <?= $_SESSION['country']['lng'];?></th>
                              <th class="text-center">Image</th>
                              <th class="text-center">Country</th>
                              <th class="text-center">Updated At</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i=$offset+1;
                        if(isset($allRecords)):
                        foreach ($allRecords as $cuisinesData)
                        {
                      ?>
                          <tr>
                            <td class="text-center">
                              <?= $i++;?>.
                            </td>
                              <td class="text-center">
                                <?= $cuisinesData["name"]; ?>
                              </td>
                               <td class="text-center">
                                <?= $cuisinesData["name_local"]; ?>
                              </td>
                              <td class="text-center">
                                <?php if(!empty($cuisinesData["image"])){ ?>
                                <img class="img img-responsive img-thumbnail" style="width:80px" src="<?= BASEURL;?>/assets/img/cuisines/<?= $cuisinesData["image"];?>" alt="<?= $cuisinesData["name"];?>">
                                <?php } else {?>
                                <img class="img img-responsive img-thumbnail" style="width:80px" src="<?= BASEURL;?>/assets/img/image_default.png" alt="image_default">

                              <?php } ?>
                              </td>
                               <td class="text-center">
                                <?php
                                $cuisinescountry=$CuisinesObj->getCountryName($cuisinesData["country_id"]);
                                ?>
                                <?= $cuisinescountry[0]["name"]; ?>
                              </td>
                              <td class="text-center">
                                <?= $cuisinesData["pdate"]; ?>
                              </td>
                              <td class="text-center">
                                <input type="checkbox" class="toggle-one" onchange="Updatestatus('<?= $cuisinesData["id"];?>');" <?= ($cuisinesData["status"] == 1) ? 'checked' : '';?>>
                              </td>
                              <td class="text-center">
                                <div class="d-inline-flex">
                                  <a href="<?= BASEURL;?>/create-cuisines.php?id=<?= base64_encode($cuisinesData['id']);?>" class="btn btn-dark btn-with-icon btn-block"><i class="typcn typcn-edit"></i> Edit</a>
                                  <button class="btn btn-dark ml-2" onclick="deleteCuisine('<?= $cuisinesData["id"];?>');"><i class="fa fa-trash"></i></button>
                                </div>
                              </td>
                          </tr>
                        <?php } endif; ?>
                      </tbody>
                  </table>
                  <!-- Display pagination links -->
                  <?php echo $paginationObj->createLinks(); } ?>