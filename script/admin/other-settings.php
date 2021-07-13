<?php

@session_start();

include('../../url.php');
 
$commission = $_POST['txtcommission'];
$agent_commission = $_POST['txtagentcommission'];
$notice = $_POST['txtnotice'];
$shop_notice = $_POST['txtshopnotice'];
$agent_notice = $_POST['txtagentnotice'];
$max_delivery_hour = $_POST['txtmaxdeliveryhour'];
  
$service_url = $apiurl."saveOtherSettings";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "commission" => $commission,
    "agent_commission" => $agent_commission,
    "notice" => $notice,
    "shop_notice" => $shop_notice,
    "agent_notice" => $agent_notice,
    "max_delivery_hour" => $max_delivery_hour
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_data = $response['error'];
$has_data = $response['message'];
 

echo $has_data;

?>