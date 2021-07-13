<?php
// echo "<pre>";

// echo "==============postdata================";
// print_r($_POST);
// echo "==============postdata================";

/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
include('../url.php');

require_once("PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* body parameters */
$paytmParams["body"] = array(
    /* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
    "mid" => "tPWyFC22266459414087",
    /* Enter your order id which needs to be check status for */
    "orderId" => $_POST['refundorderid'],
);

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "x8tR9lvP3RIVs@jG");

/* head parameters */
$paytmParams["head"] = array(
    /* put generated checksum value here */
    "signature"	=> $checksum
);

/* prepare JSON string for request */
$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
// $url = "https://securegw.paytm.in/v3/order/status";

/* for Production */
$url = "https://securegw.paytm.in/v3/order/status";


// echo 'Checking order status request data <br/>';
// echo "================================== <br/>";
// $mydata['url'] = $url;
// $mydata['data'] = $paytmParams;
// echo '<br/>';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
$response = curl_exec($ch);

// echo 'Response of order status <br/>';
// echo "========================= <br/>";
$response_array = json_decode($response);
// print_r($response_array);

if(empty($response_array)){
    echo 'Sorry to complete request no response received form paytm side, retry';
    exit();
}

// echo "Refund Execute Api <br/>";
// echo "================== <br/>";

if(!empty($response_array)){
    
    $txn_status = $response_array->body->resultInfo->resultStatus;
    $txn_code = $response_array->body->resultInfo->resultCode;
    $rslt_msg = $response_array->body->resultInfo->resultMsg;

    $refund_amount = $_POST['refund_amount'];

    if($txn_status == 'TXN_FAILURE'){
        echo "Sorry to complete request, [".$txn_code."]-".$rslt_msg;
        exit();
    }

    if($txn_status == "TXN_SUCCESS" && $txn_code == "01"){
       
        $paytmParams = array();
        
       
        $order_id = $response_array->body->orderId;
        $txnId = $response_array->body->txnId;
        $refund_id = $order_id."_".substr(time(), -5)."_REFUND";
        
        $paytmParams["body"] = array(
            "mid"          => "tPWyFC22266459414087",
            "txnType"      => "REFUND",
            "orderId"      => $order_id,
            "txnId"        => $txnId,
            "refId"        => $refund_id,
            "refundAmount" => $refund_amount,
        );
        
        /*
        * Generate checksum by parameters we have in body
        * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
        */
        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "x8tR9lvP3RIVs@jG");
        
        $paytmParams["head"] = array(
            "signature"	  => $checksum
        );
        
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
        
        /* for Staging */
        // $url = "https://securegw.paytm.in/refund/apply";
        
        /* for Production */
        $url = "https://securegw.paytm.in/refund/apply";
        
        $r_data['url'] = $url;
        $r_data['data'] = $paytmParams;
        
        // echo "Refud Request Data <br/>";
        // echo "================== <br/>";
        // print_r($r_data);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
        $response = curl_exec($ch);
        // print_r($response);
        // echo '<pre>';
        $res_array = json_decode($response);

        if($res_array->body->resultInfo->resultStatus == "TXN_FAILURE"){
            echo "Sorry to complete refund request, [".$res_array->body->resultInfo->resultCode."]-".$res_array->body->resultInfo->resultMsg;
            exit();
        }

        // TXN_FAILURE
        if($res_array->body->resultInfo->resultStatus == "PENDING"){
            $refund_array = array(
                "api_key" => $api_key,
                'signature' => $res_array->head->signature,
                'response_timestamp' => $res_array->head->responseTimestamp,
                'order_id' => $order_id,
                'refund_order_id' => $refund_id,
                'ref_id' => $res_array->body->refId,
                'txn_timestamp' => $res_array->body->txnTimestamp,
                'order_txn_id' => $txnId,
                'refund_txn_id' => $res_array->body->txnId,
                'refund_amount' => $res_array->body->refundAmount,
                'refund_status' => $res_array->body->resultInfo->resultStatus,
                'refund_code' => $res_array->body->resultInfo->resultCode,
                'refund_message' => $res_array->body->resultInfo->resultMsg,
                'refund_id' => $res_array->body->refundId,
            );

            $service_url = $apiurl."refundOrder";
            $curl = curl_init($service_url);

            $curl_post_data_json = json_encode($refund_array);            

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
        }           

   }
    
}

?>