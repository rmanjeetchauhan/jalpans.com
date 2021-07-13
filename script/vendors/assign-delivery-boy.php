<?php

@session_start();

include('../../url.php');
 
$id = $_POST['txtdeliveryboy'];
$order_id = $_POST['txtorderid'];
  
$service_url = $apiurl."assignDeliveryBoy";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "id" => $id,
    "order_id" => $order_id
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