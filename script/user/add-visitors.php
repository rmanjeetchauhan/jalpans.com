<?php

include('../../url.php');

 
$visitor = $_POST['visitor'];
$visitor_user = $_POST['visitor_user'];

$service_url = $apiurl."addWebsiteVisitors";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
	"visitor_user" => $visitor_user,
    "visitor" => $visitor
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