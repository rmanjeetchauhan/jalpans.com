<?php

@session_start();

include('../../url.php');

 
$order_id = $_POST['txtorderid'];
$otp = $_POST['txtplaceotp'];
$action_by = $_POST['txtactionbty'];
  
$service_url = $apiurl."updateOrderStatus";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "order_id" => $order_id,
    "action_by" => $action_by,
    "otp" => $otp 
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