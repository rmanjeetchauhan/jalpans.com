<?php

@session_start();

include('../../url.php');


 
$old_password = $_POST['old_password'];
$password = $_POST['password'];
 
$service_url = $apiurl."verifyAdminPassword";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "old_passord" => $old_password,
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