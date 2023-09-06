<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $UserObj=User::getinstance();
  $baseURL = 'getajax_user.php';
  $limit = filter_var($_POST["limitset"], FILTER_VALIDATE_INT);
 if(isset($_POST["page"]) || isset($_POST["keywords"]) || isset($_POST["sortBy"]))
 {
    $offset = !empty($_POST["page"]) ?  filter_var($_POST["page"], FILTER_VALIDATE_INT) : 0 ;
    $wheresql="";
    $orderBy="";
    if(!empty($_POST["keywords"]))
    {
      $keyword=filter_var($_POST["keywords"], FILTER_SANITIZE_STRING);
      $wheresql="WHERE a.`view`='1' AND (a.`user_name` LIKE '%".$keyword."%' OR a.`user_email` LIKE '%".$keyword."%' OR a.`created_date` LIKE '%".$keyword."%' OR a.`mobile` LIKE '%".$keyword."%' OR b.`name` LIKE '%".$keyword."%' OR c.`name` LIKE '%".$keyword."%')";
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
    $totalRecords=$UserObj->getTotalNumberOfRecordUserAjax($wheresql,$orderbysql);
    $allRecords=$UserObj->getAllRecordsUserAjax($limit,$wheresql,$orderbysql,$offset);
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

              <table id="RecordsTable" class="table table-bordered table-hover mb-0">
                                    <thead>
                                        <tr>
                                          <th class="text-center">S.No.</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Mobile</th>
                                            <th class="text-center">Country</th>
                                            <th class="text-center">User Type</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i=$offset+1;
                                    if(isset($allRecords)):
                                      foreach ($allRecords as $userData)
                                      {
                                    ?>
                                        <tr>
                                            <td class="text-center">
                                              <?= $i++; ?>
                                            </td>
                                            <td class="text-center">
                                              <?= $userData["user_name"]; ?>
                                            </td>
                                            <td class="text-center">
                                              <?= $userData["user_email"]; ?>
                                            </td>
                                            <td class="text-center">
                                              <?= $userData["mobile"]; ?>
                                            </td>
                                            <td>
                                            <?php
                                            $usercountry=$UserObj->getCountryName($userData["country_id"]);
                                            ?>
                                            <?= $usercountry[0]["name"]; ?>
                                            </td>
                                            <td>
                                              <?php
                                              $usertype=$UserObj->getUserType($userData["usertype"]);
                                              ?>
                                              <?= $usertype[0]["name"]; ?>
                                            </td>
                                            <td class="text-center">
                                              <input type="checkbox" class="toggle-one" onchange="Updatestatus('<?= $userData['id'];?>');" <?= ($userData['status'] == 1) ? 'checked' : '';?>>
                                            </td>
                                            <td class="text-center">
                                              <div class="d-inline-flex">
                                                <a href="create-user.php?id=<?= base64_encode($userData['id']);?>" class="btn btn-dark btn-with-icon btn-block"><i class="typcn typcn-edit"></i> Edit</a>
                                                <button class="btn btn-dark ml-2" onclick="deleteUser('<?= $userData['id'];?>');"><i class="fa fa-trash"></i></button>
                                              </div>
                                            </td>
                                        </tr>

                                    <?php } endif; ?>
                                    </tbody>
              </table>
                  <!-- Display pagination links -->
                  <?php echo $paginationObj->createLinks(); } ?>