<?php

@session_start();

include('../../url.php');
 
$id = $_POST['txtuserid'];
$name = $_POST['txtname'];
$quantity = $_POST['txtquantity'];
$unit = $_POST['txtselectunit'];
$rate = $_POST['txtrate'];
$discount = $_POST['txtdiscount'];
$gst = $_POST['txtgst'];
$amount = $_POST['txtamount'];
$description = $_POST['txtdescription'];
 
$image = '';
if($_FILES['txtimage']['name'] != ""){
    $imgArray = explode(".", $_FILES['txtimage']['name']);
	$ext = end($imgArray);
	$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string_shuffled = str_shuffle($string);
	$dynamic_text = substr($string_shuffled, 1, 10);

	$image = time().$dynamic_text.".".$ext;
	$tmp_name = $_FILES['txtimage']['tmp_name'];
	$upload_path = "../../assets/images/".$image;

	move_uploaded_file($tmp_name, $upload_path);
}
  
$service_url = $apiurl."addProduct";
$curl = curl_init($service_url);
$curl_post_data = array(
    "api_key" => $api_key,
    "id" => $id,
    "name" => $name,
    "quantity" => $quantity,
    "unit" => $unit,
    "rate" => $rate,
    "discount" => $discount,
    "gst" => $gst,
    "amount" => $amount,
    "description" => $description,
    "image" => $image
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