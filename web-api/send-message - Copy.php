<?php

    function sendMobileMessage($phone, $message){

        $message = urlencode($message);
        $url = 'http://websms.textidea.com/app/smsapi/index.php?key=55EC6826091731&campaign=8061&routeid=3&type=text&contacts='.$phone.'&senderid=JALPNS&msg='.$message;
        
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


?>