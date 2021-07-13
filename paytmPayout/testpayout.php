<?php
// /*
// * import checksum generation utility
// * You can get this utility from https://developer.paytm.com/docs/checksum/
// */
// require_once("PaytmChecksum.php");

// $paytmParams = array();

// $paytmParams["subwalletGuid"]      = "e8be4627-039d-4221-9645-436e6d6dfcd0"; 
// $paytmParams["orderId"]            = "JLPNS000055";
// $paytmParams["beneficiaryAccount"] = "918008484891";
// $paytmParams["beneficiaryIFSC"]    = "PYTM0123456";

// // $paytmParams["beneficiaryAccount"] = "0712824871";
// // $paytmParams["beneficiaryIFSC"]    = "KKBK0000180";

// $paytmParams["amount"]             = "1.00";
// $paytmParams["purpose"]            = "SALARY_DISBURSEMENT";
// $paytmParams["date"]               = "2020-07-21";

// $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

// /*
// * Generate checksum by parameters we have in body
// * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
// */
// $checksum = PaytmChecksum::generateSignature($post_data, "KnN!2v!Q!ks!Die7");

// $x_mid      = "jalpan88872958987689";
// $x_checksum = $checksum;

// /* for Staging */
// $url = "https://staging-dashboard.paytm.com/bpay/api/v1/disburse/order/bank";

// /* for Production */
// // $url = "https://dashboard.paytm.com/bpay/api/v1/disburse/order/bank";

// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "x-mid: " . $x_mid, "x-checksum: " . $x_checksum)); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
// $response = curl_exec($ch);
// print_r($response);



    require 'lib/encdec_paytm.php';

    $environment    = "PROD"; //TEST
    $paramList = array();

    $mid = "jalpan88872958987689";
    $key = "KnN!2v!Q!ks!Die7";
    $orderId = "JLPNS00100T2";
    $subwalletGuid = "e8be4627-039d-4221-9645-436e6d6dfcd0";
    $amount  = "1";
    $purpose = "BONUS";


    // $paramList["beneficiaryAccount"] = "918008484891";
    // $paramList["beneficiaryIFSC"]    = "PYTM0123456";
    
    $paramList["beneficiaryAccount"] = "0712824871";
    $paramList["beneficiaryIFSC"]    = "KKBK0000180";  
    $paramList["orderId"]            = $orderId;
    $paramList["subwalletGuid"]      = $subwalletGuid;
    $paramList["amount"]             = $amount;
    $paramList["purpose"]            = $purpose;
    $paramList["callbackUrl"]        = "https://paytm.com/test/";

    $body= json_encode($paramList, true);

    $Checksumhash = getChecksumFromString($body,$key);

    $header= array('Content-Type:application/json', 'x-mid:'.$mid, 'x-checksum:'.$Checksumhash);


    $url ='https://staging-dashboard.paytm.com/bpay/api/v1/disburse/order/bank';

    if($environment == "PROD")
        $url = 'https://dashboard.paytm.com/bpay/api/v1/disburse/order/bank';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $output = curl_exec ($ch); // execute
    $info = curl_getinfo($ch);

    $data = json_decode($output, true);

    echo "<pre/>";
    echo "URL:";
    echo "<pre/>";
    echo $url;
    echo "<pre/>";
    echo "HEADER:";
    echo "<pre/>";
    print_r($header);
    echo "<pre/>";
    echo "REQUEST:";
    echo "<pre/>";
    echo wordwrap($body,150, "\n",true);
    echo "<pre/>";
    echo "RESPONSE:";
    echo "<pre/>";
    echo $output;
    echo "<pre/>";
    print_r($data);
    echo "<pre/>";
?> 

