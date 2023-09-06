<?php
include_once('../../config/Db.php');
include_once('../components/NetworkapiClass.php');
$networkapi_obj=new NetworkapiClass();


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.uws.com.ng/api/v1/data/fetchPlans",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLnV3cy5jb20ubmdcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MjkzMTA5NzQsImV4cCI6MTY2MDg0Njk3NCwibmJmIjoxNjI5MzEwOTc0LCJqdGkiOiJ1M0c1OGRiT0p3U2s4ZFpsIiwic3ViIjo1NSwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.NQaH-XFWyvNRDpmGht4YmhkhKO_aaNLUOgOxCEJy_Rw",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: e528d80e-20ed-5636-ebd6-0e783cf9199e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
$data=json_decode($response,true);
//print_r($data);
 foreach($data as $dataplarr)
 {
  $network_id=$dataplarr['network_id'];

  $dataplans=$dataplarr['dataPlans'];

$arraydata=array();
foreach($dataplans as $dplans)
{

$networkid=array_push($arraydata,$network_id);
//$networkplane=array_push($arraydata,$dplans['plan_id']);
  $datanet_id=$dplans['plan_id'];
  $datanet_value=$dplans['value'];
  $dealer_price=$dplans['dealer_price'];
  $super_dealer_price=$dplans['super_dealer_price'];
  $allneworkidvalue=$networkapi_obj->NetworkPlanApiIdExist($network_id,$datanet_id);
          if($allneworkidvalue=='1')
           {
          $networkupdate=$networkapi_obj->NeteworkdataplaneUpdate($network_id,$datanet_id,$datanet_value,$dealer_price,$super_dealer_price);
           }
           else
           {
            $networkupdate=$networkapi_obj->NeteorkdataplaneapibyInsertdata($network_id,$datanet_id,$datanet_value,$dealer_price,$super_dealer_price);
           }
           
}

}
echo $networkupdate;
 if($networkupdate)
{

$allnetworkid=$networkapi_obj->getdataplane();


foreach ($allnetworkid as $allnw) {
  $planeid=$allnw['plane_id'];
if(!(in_array($planeid,$arraydata)))
{
$networkapi_obj->DeletedataPlanapi($planeid);
}

}
}






 }
?>