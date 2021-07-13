<?php 

$ip_address = $uniqueTrackAddress;

$service_url = $apiurl."getCartCount";
$curl = curl_init($service_url);
$curl_post_data = array(
    "api_key" => $api_key,
	"ip_address" => $ip_address
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_data_cart = $response['error'];
$has_data_cart = $response['message']; 


// print_r($has_data_cart);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Jalpans.com | Payment</title>
</head>
<body>
	
<form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
    <input type="hidden" name="appId" value="GDBENRL5M5OBEAGJ"/>
    <input type="hidden" name="orderId" value="order00001"/>
    <input type="hidden" name="orderAmount" value="100"/>
    <input type="hidden" name="orderCurrency" value="INR"/>
    <input type="hidden" name="orderNote" value="test"/>
    <input type="hidden" name="customerName" value="John Doe"/>
    <input type="hidden" name="customerEmail" value="Johndoe@test.com"/>
    <input type="hidden" name="customerPhone" value="9999999999"/>
    <input type="hidden" name="returnUrl" value="<RETURN_URL>"/>
    <input type="hidden" name="notifyUrl" value="<NOTIFY_URL>"/>
    <input type="hidden" name="signature" value="<GENERATED_SIGNATURE>"/>
    <button type="submit">Submit form</button>
</form>

</body>
</html>