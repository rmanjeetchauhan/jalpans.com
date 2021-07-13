<?php

@session_start();

include('../../url.php');
 
$id = $_POST['txtuserid'];
$name = $_POST['txtdelboyname'];
$phone = $_POST['txtphone1'];
$phone2 = $_POST['txtphone2'];
$address = $_POST['txtaddress'];
$password = $_POST['txtpassword'];
  
$service_url = $apiurl."addDeliveryBoy";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "id" => $id,
    "name" => $name,
    "phone" => $phone,
    "phone2" => $phone2,
    "address" => $address,
    "password" => $password
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