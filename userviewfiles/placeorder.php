<?php 

$order_type = $_POST['txtordertype'];
$phone = $_POST['txtorderphone'];
$amount = $_POST['txttotalamount'];
// $redirect = $url->segment(4);

// if($redirect != "place_order"){
// 	// header('Location:'.$domain);
// }

// print_r($_POST);
// exit();

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
			<form method="POST" id="formorder" action="<?php echo $domain ?>payment">
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
					<input type="hidden" name="order_type" value="<?php echo $order_type; ?>">
					<input type="hidden" name="phone" value="<?php echo $phone; ?>">
					<input type="hidden" name="transaction_amt" value="<?php echo $amount; ?>">
					<div id="showmsg"> </div>
					</div>
				</div>
			</form>
		</div>		 
	</div>
</section>

<script type="text/javascript">
	$(function(){
		$('#formorder').submit();
	})
</script>


<!-- <script type="text/javascript">
 
    $(function(){
    	
    	$('#showmsg').removeClass(' alert alert-success');
    	$('#showmsg').removeClass(' alert alert-danger');

    	$.ajax({
            url: '<?php echo $userScript; ?>place-order.php',
            type: "POST",
             data: {
             	order_type: '<?php echo $order_type; ?>',
             	phone: '<?php echo $phone; ?>' 
             },
            success: function (data) { 
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

</script> -->

<?php 
include ('footer.php');
?>