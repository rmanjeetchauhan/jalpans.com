<?php 
@session_start();

$order_id = $_POST['ORDERID'];
$mid = $_POST['MID'];
$txnid = $_POST['TXNID'];
$txn_amt = $_POST['TXNAMOUNT'];
$pay_mode = $_POST['PAYMENTMODE'];
$currency = $_POST['CURRENCY'];
$txn_date = $_POST['TXNDATE'];
$status = $_POST['STATUS'];
$res_code = $_POST['RESPCODE'];
$gateway = $_POST['GATEWAYNAME'];
$bnk_txn_id = $_POST['BANKTXNID'];
$bnk_name = $_POST['BANKNAME'];
$checksum = $_POST['CHECKSUMHASH'];



// echo "<pre/>";
// print_r($_POST);
// print_r($_GET);
// exit();

// $service_url = $apiurl."getOrderData";
// $curl = curl_init($service_url);
// $curl_post_data = array(
// 	"api_key" => $api_key,
//     "order_id" => $order_id
// );

// $curl_post_data_json = json_encode($curl_post_data);

// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

// $curl_response = curl_exec($curl);
// curl_close($curl);

// $response = json_decode($curl_response, true);
// $has_no_odata = $response['error'];
// $has_odata = $response['message'];

// print_r($has_odata);

if($status != "TXN_SUCCESS"){

	$ip_address = $uniqueTrackAddress;
	$response_msg = $_POST['RESPMSG'];

	$service_url = $apiurl."failPaymentHistory";
	$curl = curl_init($service_url);
	$curl_post_data = array(
		"api_key" => $api_key,
	    "ip_address" => $ip_address,
	    "order_id" => $order_id,
	    "mid" => $mid,
	    "txnid" => $txnid,
	    "txn_amt" => $txn_amt,
	    "pay_mode" => $pay_mode,
	    "currency" => $currency,
	    "txn_date" => $txn_date,
	    "status" => $status,
	    "res_code" => $res_code,
	    "res_msg" => $response_msg,
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

// 	echo "not success";
	$redirect =  $_POST['RESPMSG'];
	if(empty($redirect)){
        $redirect =  $_GET['errorMessage'];
	}
	header('Location:'.$domain.'fail-transaction/?message='.$redirect);
	exit();
	
}


 

include ('header.php');

?>

<style type="text/css">
.pageheader{
	background-image: url(<?php echo $user_asset; ?>slider/banner-7.jpg);				
    background-position: 100%;
    background-size: auto;
}

.pageoverlay{
	padding: 65px 0;
	background-color: #0006;
}

.mainmenu{
	font-size: 35px;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
}
.pagemenu {
	float: right;
	color: #fff;
	font-size: 14px;
	font-weight: bold;
}
.progresscont{
	border: 1px solid #ccc;
    padding: 20px;
}
</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">Order Place</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Order Place</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<div class="container">
			<form method="POST" id="formorder">
				<div class="col-md-offset-3 col-md-6">
					<div class="progresscont">
						<div class="logoredirect text-center">
							<a href="<?php echo $domain; ?>">
								<img style="height: 80px;" src="<?php echo $user_asset; ?>images/logo.jpg"/>
							</a>
						</div>
						<hr>
						<div class="clearfix"></div>
						<div class="progress progress-bar-danger">
					  <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"
					  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
					   Wait
					  </div>
					</div>
					<div class="showText text-center"> Processing, Please wait...</div>
					<hr>
					<div id="showmsg"> </div>
					</div>
				</div>
			</form>
		</div>		 
	</div>
</section>

<script type="text/javascript">
	$(function(){
		// $('#formorder').submit();
	})
</script>


<script type="text/javascript">
 
    $(function(){
    	
    	$('#showmsg').removeClass(' alert alert-success');
    	$('#showmsg').removeClass(' alert alert-danger');

    	$.ajax({
            url: '<?php echo $userScript; ?>place-order.php',
            type: "POST",
             data: {
             	order_id: '<?php echo $order_id; ?>',
             	mid: '<?php echo $mid; ?>',
             	txnid: '<?php echo $txnid; ?>',
             	txn_amt: '<?php echo $txn_amt; ?>',
             	pay_mode: '<?php echo $pay_mode; ?>',
             	currency: '<?php echo $currency; ?>',
             	txn_date: '<?php echo $txn_date; ?>',
             	status: '<?php echo $status; ?>',
             	res_code: '<?php echo $res_code; ?>',
             	gateway: '<?php echo $gateway; ?>',
             	bnk_txn_id: '<?php echo $bnk_txn_id; ?>',
             	bnk_name: '<?php echo $bnk_name; ?>',
             	checksum: '<?php echo $checksum; ?>'
             },
            success: function (data) { 
                
                console.log(data);
                // console.log(data);                   
                if(data.trim() != "error"){                        

                	$('#showmsg').html('Order Placed Successfully. wait...');
	        		$('#showmsg').addClass(' alert alert-success');
                    setTimeout(function() {
					    window.location.href="<?php echo $domain; ?>order-success/" + data + "/";
					},5000);
                    return true;
                }
                $('#showmsg').html('Sorry! Unable to Place Order.');
	        	$('#showmsg').addClass(' alert alert-danger');
                return false;
            }
        });
    })

</script>

<?php 
include ('footer.php');
?>