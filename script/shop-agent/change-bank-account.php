<?php

@session_start();

include('../../url.php');
 
$id = $_POST['txtuserid'];
$bank = $_POST['txtbankname'];
$ac_no = $_POST['txtaccountno'];
$ifsc = $_POST['txtifsccode'];
$branch = $_POST['txtbankbranch'];
  
$service_url = $apiurl."addAgentAccount";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "id" => $id,
    "bank" => $bank,
    "ac_no" => $ac_no,
    "ifsc" => $ifsc,
    "branch" => $branch
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