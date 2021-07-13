<?php

    function sendMobileMessage($phone, $message){

        $message = urlencode($message);
        // $url = 'http://websms.textidea.com/app/smsapi/index.php?key=55EC6826091731&campaign=8061&routeid=3&type=text&contacts='.$phone.'&senderid=JALPNS&msg='.$message;
        // $url = 'http://api.jiosms.in/pushsms.php?lg=jalpans2020&pw=Demo3$&id=JLPANS&msg='.$message.'&to='.$phone.'&type=2';
        $url = 'https://api.textlocal.in/send/?apiKey=9Nt5BwTTx4A-m3tLMrhVv3ZksONoMwBS7Yca9oUrl9&sender=JLPANS&numbers='.$phone.'&message='.$message;
        
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ]);
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        return $resp;
    }


    
    // $phone = "9711136319";
    // $otp = "660180";
    // $mode = 'Self';
    // $order_id = 'JLPANSTEST02';
    // $txn_amt = '12000.50';
    // $shopkeeper['phone'] = '9711136319';
    // $array['otp1'] = '223355';
    // $message = 'Welcome Shopkeeper: '.$phone.'.Your Sign up OTP is: '.$otp.'.';
    // $message = 'Your payment proceed OTP is : '.$otp;
    // $message = 'Order Placed Successfully.Delvry Mode:'.$mode.'.Order Id:'.$order_id.'&Receiving OTP is:'.$otp.'.Amt:Rs.'.$txn_amt.'.Shop Mob No:'.$shopkeeper['phone'].'.Order Track at www.jalpans.com';
    // $message = 'Order Received, Order Id:'.$order_id.'. For Delvry address contact on Customer Mob No.'.$phone.'.Delvry Mode: '.$mode.'.For details login your shop at www.jalpans.com';
    // $message = 'Your Mobile Number change OTP is : '.$otp;
    // $message = 'Your Forgot Pasword OTP at www.jalpans.com is : '.$otp;
    // $message = 'Welcome Agent: '.$phone.'.Your Sign Up OTP is: '.$otp;
    // $message = 'Hello Admin password change OTP is : '.$array['otp1'];
    
    // $msg = sendMobileMessage($phone, $message);
    // echo $msg;
    

?>