<?php

include('../../url.php');

$name = $_POST['txtname'];
$phone = $_POST['txtphone'];
$email = $_POST['txtemail'];
$referred_by = $_POST['txtreferralcode'];
$address = $_POST['txtaddress'];
$password = $_POST['txtconpassword'];
 
$service_url = $apiurl."userRegister";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "name" => $name,
    "phone" => $phone,
    "email" => $email,
    "referred_by" => $referred_by,
    "address" => $address,
    "password" => $password
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

 
echo $has_data;

?>