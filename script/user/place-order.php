<?php
@session_start();

include('../../url.php');

$ip_address = $uniqueTrackAddress;
$order_type = $_POST['order_type'];
$phone = $_POST['phone'];

$order_id = $_POST['order_id'];
$mid = $_POST['mid'];
$txnid = $_POST['txnid'];
$txn_amt = $_POST['txn_amt'];
$pay_mode = $_POST['pay_mode'];
$currency = $_POST['currency'];
$txn_date = $_POST['txn_date'];
$status = $_POST['status'];
$res_code = $_POST['res_code'];
$gateway = $_POST['gateway'];
$bnk_txn_id = $_POST['bnk_txn_id'];
$bnk_name = $_POST['bnk_name'];
$checksum = $_POST['checksum'];
 
$service_url = $apiurl."placeOrder";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
    "ip_address" => $ip_address,
    "phone" => $phone,
    "order_type" => $order_type,
    "order_id" => $order_id,
    "mid" => $mid,
    "txnid" => $txnid,
    "txn_amt" => $txn_amt,
    "pay_mode" => $pay_mode,
    "currency" => $currency,
    "txn_date" => $txn_date,
    "status" => $status,
    "res_code" => $res_code,
    "gateway" => $gateway,
    "bnk_txn_id" => $bnk_txn_id,
    "bnk_name" => $bnk_name,
    "checksum" => $checksum
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

$message = "error";
if($has_data['status'] =="success"){
	$message = $has_data['order_id'];
}
echo $message;



?>