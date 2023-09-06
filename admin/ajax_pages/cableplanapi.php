<?php
include_once('../../config/Db.php');
include_once('../components/NetworkapiClass.php');
$networkapi_obj=new CableApiClass();


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.uws.com.ng/api/v1/cable/fetchPlans",
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
// print_r($data);
 foreach($data as $id=> $dataplarr)
 {
// print_r($dataplarr);
   $network_id=$id;

$arraydata=array();
foreach($dataplarr as $dplans)
{
	
// echo $dplans['id'];
//print_r($dplans);

$networkid=array_push($arraydata,$network_id);
//$networkplane=array_push($arraydata,$dplans['plan_id']);
 

 $datanet_id=$dplans['id'];
  $datanet_value=$dplans['plan'];
  $dealer_price=$dplans['amount'];
 
 $allneworkidvalue=$networkapi_obj->CablePlanApiIdExist($network_id,$datanet_id);
          if($allneworkidvalue=='1')
           {
            $networkupdate=$networkapi_obj->CablePlandataplaneUpdate($network_id,$datanet_id,$datanet_value,$dealer_price);
           }
           else
           {
            $networkupdate=$networkapi_obj->CablePlandataplaneapibyInsertdata($network_id,$datanet_id,$datanet_value,$dealer_price);
           }
           
}

}
echo $networkupdate;
if($networkupdate)
{
 $allnetworkid=$networkapi_obj->getcabletimeplane();
 foreach ($allnetworkid as $allnw) {
    //print_r($allnw);
  $planeid=$allnw['plan_id'];
   $network_id=$allnw['provider_id'];
if(!(in_array($planeid,$arraydata)))
{
$networkapi_obj->DeletecabletimeApi($planeidd);
}
}

}


 }
?>