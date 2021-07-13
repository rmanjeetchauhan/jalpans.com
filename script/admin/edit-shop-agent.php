<?php

@session_start();

include('../../url.php');
 
$id = $_POST['etxtid'];
$name = $_POST['etxtdelboyname'];
$phone = $_POST['etxtphone1'];
$phone2 = $_POST['etxtphone2'];
$address = $_POST['etxtaddress'];
  
$service_url = $apiurl."editShopAgent";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "id" => $id,
    "name" => $name,
    "phone" => $phone,
    "phone2" => $phone2,
    "address" => $address,
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