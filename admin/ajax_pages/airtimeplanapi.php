<?php
include_once('../../config/Db.php');
include_once('../components/NetworkapiClass.php');
$networkapi_obj=new NetworkapiClass();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.uws.com.ng/api/v1/sme_data/fetchPlans",
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
$arraydata=array();
foreach($data as $dataplarr)
 {
  $network_id=$dataplarr['network_id'];
   $dataplans=$dataplarr['dataPlans'];

  foreach($dataplans as $dplans)
			{
				$networkid=array_push($arraydata,$network_id);
			
			// //$networkplane=array_push($arraydata,$dplans['plan_id']);
			 	 $datanet_id=$dplans['plan_id'];
				$datanet_value=$dplans['value'];
				$amount_charged=$dplans['amount_charged'];
			
			$allneworkidvalue=$networkapi_obj->AirtimeApiplanExist($network_id,$datanet_id);
			if($allneworkidvalue=='1')
			       {
			          $airtimekupdate=$networkapi_obj->airtimedataplaneUpdate($network_id,$datanet_id,$datanet_value,$amount_charged);
			           }
			           else
			           {
			            $airtimekupdate=$networkapi_obj->AirtimeapibyInsertdata($network_id,$datanet_id,$datanet_value,$amount_charged);
			           }
			           
			}
}
echo $airtimekupdate;
 if($airtimekupdate)
{
	$allnetworkid=$networkapi_obj->getairtimeplane();
	foreach ($allnetworkid as $allnw) {
		//print_r($allnw);
  $planeid=$allnw['plane_id'];
   $network_id=$allnw['network_id'];
if(!(in_array($planeid,$arraydata)))
{
$networkapi_obj->DeleteAirtimeApi($planeid);
}

}
}

}

?>