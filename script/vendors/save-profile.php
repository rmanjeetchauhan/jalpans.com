<?php

@session_start();

include('../../url.php');

// print_r($_POST);
 
$id = $_POST['txtshopkeeperid'];
$name = $_POST['txtname'];
$phone = $_POST['txtphone'];
$email = $_POST['txtemail'];

$shopname = $_POST['txtshopname'];
$address = $_POST['txtfulladdress'];
$pincode = $_POST['txtpincode'];
$min_order = $_POST['txtminorder'];

$open_time = $_POST['txtopentime'];
$close_time = $_POST['txtclosetime'];

$image = '';
if($_FILES['fileimg']['name'] != ""){
    $extAray = explode(".", $_FILES['fileimg']['name']);
	$ext = end($extAray);
	$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string_shuffled = str_shuffle($string);
	$dynamic_text = substr($string_shuffled, 1, 10);

	$image = time().$dynamic_text.".".$ext;
	$tmp_name = $_FILES['fileimg']['tmp_name'];
	$upload_path = "../../assets/images/".$image;

	move_uploaded_file($tmp_name, $upload_path);
}


$profile_image = '';
if($_FILES['profileimg']['name'] != ""){
    $extAray = explode(".", $_FILES['profileimg']['name']);
    $ext = end($extAray);
    $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string_shuffled = str_shuffle($string);
    $dynamic_text = substr($string_shuffled, 1, 10);

    $profile_image = time().$dynamic_text.".".$ext;
    $tmp_name = $_FILES['profileimg']['tmp_name'];
    $upload_path = "../../assets/images/".$profile_image;

    move_uploaded_file($tmp_name, $upload_path);

    $_SESSION['vendor']['photo'] = $profile_image;
}

$_SESSION['vendor']['name'] = $name;
$_SESSION['vendor']['phone'] = $phone;

$service_url = $apiurl."saveShopkeeperProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
    "api_key" => $api_key,
    "id" => $id,
    "name" => $name,
    "shopname" => $shopname,
    "address" => $address,
    "phone" => $phone,
    "email" => $email,
    "min_order" => $min_order,
    "pincode" => $pincode,
    "profileimg" => $profile_image,
    "open_time" => $open_time,
    "close_time" => $close_time,
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

// $message = 'error';
// if($has_data['status'] == 4){
// 	$message = 'phoneemail';
// }
// else if($has_data['status'] > 0){
// 	$_SESSION['vendor'] = $has_data['data'];
// 	$message = 'success';
// }


echo $has_data;

?>