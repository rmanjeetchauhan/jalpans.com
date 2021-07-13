<?php

@session_start();

include('../../url.php');
 

$password = $_POST['txtchangepassword'];
$otp1 = $_POST['txtotp1'];
$otp2 = $_POST['txtotp2'];
$otp3 = $_POST['txtotp3'];

$service_url = $apiurl."changeAdminPassword";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "password" => $password,
    "otp1" => $otp1,
    "otp2" => $otp2,
    "otp3" => $otp3
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