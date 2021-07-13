<?php

include('../../url.php');

$ip_address = $uniqueTrackAddress;
$cart_products = $_POST['cart_products'];
$product_id = $_POST['productid'];
$attribute_id = $_POST['attributeid'];
$rate = $_POST['productrate'];
$shop_id = $_POST['shopid'];
$total = $cart_products * $rate;
 
$service_url = $apiurl."addUpdateCart";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "ip_address" => $ip_address,
    "cart_products" => $cart_products,
    "product_id" => $product_id,
    "attribute_id" => $attribute_id,
    "rate" => $rate,
    "total" => $total,
    "shop_id" => $shop_id
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