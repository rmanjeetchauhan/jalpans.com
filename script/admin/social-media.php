<?php

@session_start();

include('../../url.php');
 
$whatsapp = $_POST['txtwhatsapp'];
$facebook = $_POST['txtfacebook'];
$twitter = $_POST['txttwitter'];
$linkedin = $_POST['txtlinkedin'];
$instagram = $_POST['txtinstagram'];
$youtube = $_POST['txtyoutube'];

$service_url = $apiurl."addSocialMedia";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "whatsapp" => $whatsapp,
    "facebook" => $facebook,
    "twitter" => $twitter,
    "linkedin" => $linkedin,
    "instagram" => $instagram,
    "youtube" => $youtube
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