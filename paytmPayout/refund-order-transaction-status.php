<?php
echo "<pre>";
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("PaytmChecksum.php");

$paytmParams = array();

$paytmParams["body"] = array(
    "mid"         => "tPWyFC22266459414087",
    "orderId"     => "JLPNS2815812",
    "refId"       => "JLPNS2815812_REFUND",
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
// $url = "https://securegw-stage.paytm.in/v2/refund/status";

/* for Production */
$url = "https://securegw.paytm.in/v2/refund/status";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
print_r($response);  

$res_array = json_decode($response);
echo "Refud Response Result Data <br/>";
echo "========================== <br/>";           
print_r($res_array);

?>