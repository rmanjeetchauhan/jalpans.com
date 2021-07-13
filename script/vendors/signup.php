<?php

@session_start();

include('../../url.php');
 
$agent_id = $_POST['txtagentid'];
$name = $_POST['txtname'];
$shopname = $_POST['txtshopname'];
$phone = $_POST['txtphone'];
$email = $_POST['txtemail'];
$address = $_POST['txtfulladdress'];
$pincode = $_POST['txtpincode'];
$min_order = $_POST['txtminorder'];

$bank = $_POST['txtbankname'];
$ac_no = $_POST['txtaccountno'];
$ifsc = $_POST['txtifsccode'];
$branch = $_POST['txtbankbranch'];

$password = $_POST['txtconpass'];

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
  
$service_url = $apiurl."signupShopkeeper";
$curl = curl_init($service_url);
$curl_post_data = array(
    "api_key" => $api_key,
    "agent_id" => $agent_id,
    "name" => $name,
    "shopname" => $shopname,
    "address" => $address,
    "phone" => $phone,
    "email" => $email,
    "min_order" => $min_order,
    "bank" => $bank,
    "ac_no" => $ac_no,
    "ifsc" => $ifsc,
    "branch" => $branch,
    "password" => $password,
    "pincode" => $pincode,
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

$message = 'error';
if($has_data['status'] == 4){
	$message = 'phoneemail';
}
else if($has_data['status'] > 0){
	$_SESSION['vendor'] = $has_data['data'];
	$message = 'success';
}


echo $message;

?>