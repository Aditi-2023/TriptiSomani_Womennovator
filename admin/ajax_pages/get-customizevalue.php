<?php
  include_once('../config/Db.php');
  include_once('../autoload.php');
  Auth::handleLogin();
  $CommonObj=new CommonFunction();
  if(isset($_POST['cusmasterid']) && !empty($_POST['cusmasterid']))
  {
       $custmId=filter_var($_POST['cusmasterid'], FILTER_VALIDATE_INT);
       $custmIdArr = $CommonObj->getCustomizeValueByMasterId($custmId);
       
       if(!empty($custmIdArr))
       {
         foreach ($custmIdArr as $custmIdVal) {
?>
<option value="<?= $custmIdVal["id"];?>"><?= $custmIdVal["name"];?> ( <?= $custmIdVal["name_local"];?> )</option>
<?php
           
         }
       }
  }
?>