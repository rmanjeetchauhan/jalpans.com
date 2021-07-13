<?php

require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* add parameters in Array */
$paytmParams["MID"] = "jalpan88872958987689";
$paytmParams["ORDERID"] = "JLPNS000001";

/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, 'KnN!2v!Q!ks!Die7');
$verifySignature = PaytmChecksum::verifySignature($paytmParams, 'KnN!2v!Q!ks!Die7', $paytmChecksum);
echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);


/* initialize JSON String */  
$body = "{\"mid\":\"jalpan88872958987689\",\"orderId\":\"JLPNS000001\"}";

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($body, 'KnN!2v!Q!ks!Die7');
$verifySignature = PaytmChecksum::verifySignature($body, 'KnN!2v!Q!ks!Die7', $paytmChecksum);
echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);