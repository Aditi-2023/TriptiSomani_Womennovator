<?php
include_once('../../config/Db.php');
include_once('../components/NetworkapiClass.php');
$networkapi_obj=new NetworkapiClass();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.uws.com.ng/api/v1/networks/fetchProviders",
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
    "content-type: application/x-www-form-urlencoded"
 
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
$apiresponse=$data['NetworkProviders'];
//print_r($apiresponse);
//$response =array();

$a=array();
 foreach($apiresponse as $apiresponsearr)
 {
$networkdata_id = $apiresponsearr['id'];
array_push($a,$networkdata_id);

$network_name = $apiresponsearr['name'];
 $allneworkidvalue=$networkapi_obj->NetworkApiIdExist($networkdata_id);
 if($allneworkidvalue=='1')
 {
$networkupdate=$networkapi_obj->NeteorkapidataUpdate($networkdata_id,$network_name);
 }
 else
 {
  $networkupdate=$networkapi_obj->NeteorkapibyInsertdata($networkdata_id,$network_name);
 }
 
}
echo $networkupdate;

if($networkupdate)
{

$allnetworkid=$networkapi_obj->getPlanedaraId();


foreach ($allnetworkid as $allnw) {

if(!(in_array($allnw,$a)))
{
$networkapi_obj->Neteorkapidatadelete($allnw);
}

}
}



}
?>