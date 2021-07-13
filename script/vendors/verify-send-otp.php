<?php

@session_start();

include('../../url.php');
 
$phone = $_POST['phone'];
$token = $_POST['token'];
$otp = $_POST['otp'];
 
$service_url = $apiurl."verifySendOTP";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "phone" => $phone,
    "otp" => $otp,
    "token" => $token
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
 

$message = "error";
if($has_data['status'] == 1){
	$message = $has_data['data'];
}
else if($has_data['status'] == 2){
	$message = $has_data['data'];
}

echo $message;


?>