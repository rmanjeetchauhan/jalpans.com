<?php
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/


    include('../url.php');
    
    // $account_id = $_POST['txtaccountid'];
    
    // $service_url = $apiurl."getShopkeeperAccountDetails";
    // $curl = curl_init($service_url);
    // $curl_post_data = array(
    //   "api_key" => $api_key,
    //   "account_id" => $account_id
    // );
    // $curl_post_data_json = json_encode($curl_post_data);
    
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($curl, CURLOPT_POST, true);
    // curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);
    
    // $curl_response = curl_exec($curl);
    // // print_r($curl_response);
    // curl_close($curl);
    
    // $response = json_decode($curl_response, true);
    // $has_no_data = $response['error'];
    // $has_data = $response['message'];
    
    // if($has_data == "error"){
    //     echo "error";
    //     exit();
    // }

    // print_r($has_data);
    require 'lib/encdec_paytm.php';

    $environment    =  "PROD"; //"TEST";"
    $paramList = array();

    $mid = "jalpan98982103950355";
    $key = "sGuXe_HzAh4sDMtj";
    $orderId = "JLPNSSPAY".substr(time(), -6);
    // $subwalletGuid = "e8be4627-039d-4221-9645-436e6d6dfcd0";
    $subwalletGuid = "3c1e42aa-c5ca-11ea-a9dd-fa163e429e83";
    $bankAccountNumber  = "0712824871";
    $IFSCCode  = "KKBK0000180";
    // $bankAccountNumber  = $has_data['account_no'];
    // $IFSCCode  = $has_data['ifsc_code'];
    $amount  = 1; //$_POST['txtpayAmount'];
    $purpose = "SALARY_DISBURSEMENT";

    $paramList["beneficiaryAccount"] = $bankAccountNumber;
    $paramList["beneficiaryIFSC"]    = $IFSCCode;
    $paramList["orderId"]            = $orderId;
    $paramList["subwalletGuid"]      = $subwalletGuid;
    $paramList["amount"]             = $amount;
    $paramList["purpose"]            = $purpose;
    $paramList["callbackUrl"]        = "https://jalpans.com/shopkeeper-payout/";
    $paramList["date"]               = date('Y-m-d');

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

    $res_data = json_decode($output, true);
    
    
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
    
    
    
    // $message = "error";
    // if($res_data[status] == "SUCCESS" || $res_data[status] == "ACCEPTED"){
        
    //     $service_url = $apiurl."paytmShopkeeperPayOut";
    //     $curl = curl_init($service_url);
    //     $curl_post_data = array(
    //       "api_key" => $api_key,
    //       "order_id" => $orderId,
    //       "id" => $has_data['user_id'],
    //       "account_id" => $has_data['id'],
    //       "account_number" => $bankAccountNumber,
    //       "ifsc_code" => $IFSCCode,
    //       "amount" => $amount,
    //       "response_status" => $res_data[status],
    //       "checksum" => $Checksumhash
    //     );
    //     $curl_post_data_json = json_encode($curl_post_data);
        
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl, CURLOPT_POST, true);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);
        
    //     $curl_response = curl_exec($curl);
    //     // print_r($curl_response);
    //     curl_close($curl);
        
    //     $response = json_decode($curl_response, true);
    //     $has_no_data = $response['error'];
    //     $has_data = $response['message'];
        
    //     $message = $has_data;
    
    // }
    
    // $data['data'] = $body;
    // $data['response'] = $res_data;
    // echo $message;
?> 

