<?php
    
	$amount = $_POST['transaction_amt'];
	$order_id = "JLPNS".substr(time(), -7);
	
	$service_url = $apiurl."manageOrderData";
	$curl = curl_init($service_url);
	$curl_post_data = array(
		"api_key" => $api_key,
		"order_id" => $order_id,
	    "order_type" => $_POST['order_type'],
	    "phone" => $_POST['phone']
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="display: none;">
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" id="formredirectforpaymet" action="<?php echo $domain ?>redirect-payment">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $order_id;?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_POST['phone']  ?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $amount; ?>">
					</td>
				</tr>

				<!-- <tr>
					<td>2</td>
					<td><label>ORDER TYPE ::*</label></td>
					<td> <input id="ORD_TYPE" tabindex="12" maxlength="12" size="12" name="ORD_TYPE" autocomplete="off" value="<?php echo $_POST['order_type']  ?>"> </td>
				</tr> -->
 
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>

	<script type="text/javascript">
		$(function(){
			$('#formredirectforpaymet').submit();
		})
	</script>
</body>
</html>