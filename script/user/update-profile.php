<?php

@session_start();

include('../../url.php');

$userid = $id = $_SESSION['user_data']['id'];
$name = $_POST['txtname'];
$phone = $_POST['txtphone'];

$image = '';
if($_FILES['txtphoto']['name'] != ""){
	$ext = end(explode(".", $_FILES['txtphoto']['name']));
	$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$string_shuffled = str_shuffle($string);
	$dynamic_text = substr($string_shuffled, 1, 10);

	$image = time().$dynamic_text.".".$ext;
	$tmp_name = $_FILES['txtphoto']['tmp_name'];
	$upload_path = "../../assets/profileimg/".$image;

	move_uploaded_file($tmp_name, $upload_path);
}

$address = $_POST['txtaddress'];

$service_url = $apiurl."updateUserProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "id" => $userid,
    "name" => $name,
    "phone" => $phone,
    "image" => $image,
    "address" => $address
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

if($has_data == "success"){
	$_SESSION['user_data']['name'] = $name;
	$_SESSION['user_data']['phone'] = $phone;
}

echo $has_data;
 
?>