<?php

include('../../url.php');


$phone = $_POST['phone'];
$otp = $_POST['otp'];
$password = $_POST['password'];
$con_password = $_POST['con_password'];
 
$service_url = $apiurl."resetShopAgentPassword";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "otp" => $otp,
    "phone" => $phone,
    "password" => $password,
    "con_password" => $con_password,
);

$curl_post_data_json = json_encode($curl_post_data);
 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_data = $response['error'];
$has_data = $response['message'];

$message = "error";

if($has_data['status'] > 0){
	$message = "success";
}
 
echo $message;



?>