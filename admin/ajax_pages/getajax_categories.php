<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CategoryObj=Categories::getinstance();
  $baseURL = 'getajax_categories.php'; 
  $limit = filter_var($_POST["limitset"], FILTER_VALIDATE_INT);
 if(isset($_POST["page"]) || isset($_POST["keywords"]) || isset($_POST["sortBy"]))
 {
    $offset = !empty($_POST["page"]) ?  filter_var($_POST["page"], FILTER_VALIDATE_INT) : 0 ;
    $wheresql="";
    $orderBy="";
    if(!empty($_POST["keywords"]))
    {
      $keyword=filter_var($_POST["keywords"], FILTER_SANITIZE_STRING);
      $wheresql="WHERE a.`view`='1' AND (a.`name` LIKE '%".$keyword."%' OR a.`name_local` LIKE '%".$keyword."%' OR b.`name` LIKE '%".$keyword."%')";
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
    $totalRecords=$CategoryObj->getTotalNumberOfRecordCategoriesAjax($wheresql,$orderbysql);
    $allRecords=$CategoryObj->getAllRecordsCategoriesAjax($limit,$wheresql,$orderbysql,$offset);
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
                            <th class="text-center">S.No.</th>
                              <th class="text-center">Name</th>
                              <th class="text-center">Name In <?= (isset($languageSession[0]["lang"]))? $languageSession[0]["lang"] :'' ?></th>
                              <th class="text-center">Restaurant</th>
                              <th class="text-center">Updated At</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i=$offset+1;
                        if(isset($allRecords)):
                        foreach ($allRecords as $categoriesData)
                        {
                      ?>
                          <tr>
                            <td class="text-center"><?= $i++; ?>.</td>
                              <td class="text-center">
                                <?= ucwords($categoriesData["name"]); ?>
                              </td>
                              <td class="text-center">
                                <?= ucwords($categoriesData["name_local"]); ?>
                              </td>
                              <td class="text-center">
                                <?= ucwords($categoriesData["restaurant"]); ?>
                              </td>
                              <td class="text-center">
                                <?= $categoriesData["pdate"]; ?>
                              </td>
                              <td class="text-center">
                                <input type="checkbox" checked class="toggle-one" onchange="Updatestatus('');">
                              </td>
                              <td class="text-center">
                                <div class="d-inline-flex">
                                  <a href="<?= BASEURL;?>/create-categories.php?catid=<?= base64_encode($categoriesData["id"]);?>" class="btn btn-dark btn-with-icon btn-block"><i class="typcn typcn-edit"></i> Edit</a>
                                  <button class="btn btn-dark ml-2"><i class="fa fa-trash"></i></button>
                                </div>
                              </td>
                          </tr>
                        <?php } endif; ?>
                      </tbody>
                  </table>
                  <!-- Display pagination links -->
                  <?php echo $paginationObj->createLinks(); } ?>