<?php 
 
@session_start();

$ip_address = $uniqueTrackAddress;;

$service_url = $apiurl."getCartProducts";
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
$has_no_cart_items = $response['error'];
$has_cart_items = $response['message']; 

// print_r($has_cart_items);


$service_url = $apiurl."getAdminCommission";
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
$has_no_commission = $response['error'];
$has_commission = $response['message']; 

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

.product-cont button.minusbtn, .product-cont button.plusbtn{
	border: 1px solid transparent;
    padding: 2px 17px;
    color: #fff;
    font-weight: bold;
}
.product-cont button.minusbtn{
	background-color: #de0401;
}
.product-cont button.plusbtn{
	background-color: #0c9669;
}

.updatecart{
  font-size: 16px;
    background-image: linear-gradient(to right, #ff0b00 , #000);
    color: #fff;
    border: 1px solid transparent;
}
.add-product{
	height: 26px !important; 
	text-align: center !important; 
	width: 50px !important; 
	border: 1px solid #de0401 !important;
}
.prosuctname a{
	font-size: 16px;
    color: #ff0b00;
}
#updatecartmsg{
	position: fixed;
    top: 20%;
    right: 0;
    /*background-color: #000;
    color: #fff;
    padding: 5px 10px;*/
    z-index: 999;
    /*display: none;*/
}
.btndeletecart{
	    background-color: #000;
    color: #fff;
    border: 1px solid #000;
    padding: 4px 10px;
}
.btndeletecart:hover{
	    background-color:transparent;
    color: #000;
}

.btnpaynow{ 
	background-image: linear-gradient(to right, #ff0b00 , #000, green, blue, #fff);
    color: #fff;
    border: 1px solid #000;
    padding: 4px 25px;
    text-transform: uppercase;
    /*font-weight: bold;*/
}
.btnpaynow:hover{
	 background-image: linear-gradient(to right, #fff, blue, green, #000, #ff0b00);
    color: #fff;
}
</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">Cart</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Cart</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<!-- <div class="header-title"> Product Detail </div> -->
		<div class="row"> 
			<div class="col-md-1"></div>
			<div class="col-md-10 shopinfo">
				<div class="single-shops">
					<?php 
					if($has_cart_items != "error" ) {
					    $redirect_url = $domain."products/".$has_cart_items[0]['username']."/".$has_cart_items[0]['shopcode']."/?pincode=".$has_cart_items[0]['pincode'];
					?>
					<div style="margin-bottom:10px;"><a href="<?php echo $redirect_url; ?>" class="btn btn-sm btn-danger"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> BACK</a></div>
					<div class="cartmsg" id="cartmsg"> </div>

					<div class="table-responsive">
						<table class="table table-striped">
							<thead> 
								<tr class="">
									<th>SL</th>
									<th>IMAGE</th>
									<th>NAME</th>
									<th>RATE</th>
									<th>QUANTITY</th>
									<th>SUBTOTAL</th>
									<th class="text-right">DELETE</th>
								</tr>
							</thead>
							<tbody>
								<?php 							 
									$total_pay_amount = 0;
									$count = 0;
									for ($i=0; $i < count($has_cart_items) ; $i++) { 
										$image = $vendorimages.$has_cart_items[$i]['image'];
										$total_pay_amount = $total_pay_amount   + $has_cart_items[$i]['total_price']
								?>
								<tr>
									<td><?php echo ++$count; ?></td>
									<td> <img src="<?php echo $image; ?>" alt="" style="height: 60px; width: 75px;"> </td>
									<td class="prosuctname">
										<a href="#" class=""><?php echo ucwords(strtolower($has_cart_items[$i]['name'])) ?></a>
										<div><small>QTY :  <?php echo $has_cart_items[$i]['pquantity']." ".$has_cart_items[$i]['measure'] ?></small></div>
									</td>
									<td data-title="Price">
										<p class="">
											₹ <?php echo $has_cart_items[$i]['amount'] ?>
										</p>
									</td>
								 
									<td data-title="Quantity">
										<div class="Shop-Details">											
											<div class="product-cont">
												<button  class="minusbtn">-</button> 
												<input readonly class="add-product" type="text" value="<?php echo $has_cart_items[$i]['quantity'] ?>" name=""/> 
												<button class="plusbtn">+</button>
												<div style="margin-top: 6px;">
													<button class="updatecart" product-id="<?php echo $has_cart_items[$i]['product_id']; ?>" attribute-id="<?php echo $has_cart_items[$i]['attribute_id']; ?>"product-rate="<?php echo $has_cart_items[$i]['amount']; ?>" shop-id="<?php echo $has_cart_items[$i]['shopkeeper_id']; ?>"> <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;UPDATE CART</button>
												</div>
											</div>
										</div>
									</td>

									<td data-title="Subtotal">
										<p class="">₹ <?php echo $has_cart_items[$i]['total_price'] ?></p>
									</td>

								<td class="text-right"> <button class="btndeletecart"
									remove-id="<?php echo $has_cart_items[$i]['cartid']; ?>" data-toggle="modal" data-target="#modalCartRemove" onclick="$('#removeitemid').val($(this).attr('remove-id'))"> <i class="fa fa-trash" aria-hidden="true"></i> Remove</button></td>
							</tr>

							<?php 
								}

								$commission = $has_commission['comission'];

								$con_charge =  ($total_pay_amount * $commission)/100;							
								$total_pay_amount = $total_pay_amount + $con_charge;
							?>

							<tr>
								<td colspan="5" class="text-right">
									<p class="">Convenience Charge (+<?php echo $commission ?>%)</p>
								</td>
								<td class=" "> 
									₹ <?php echo $con_charge ?>
								</td>
								<td colspan="3" class="text-right"> 
									
								</td>
							</tr>

							<tr class="">
								<td colspan="4" class=""></td>
								<th colspan="3" class="text-right"> 
									<!-- <select class="form-control input-sm" name="txtshipmenttype" id="txtshipmenttype" style="max-width: 200px;">
										<option value="1"> Self Shipping </option>
										<option value="2" <?php if($total_pay_amount < $has_cart_items[0]['min_order_amount']){ echo "disabled"; } ?>> Delivery Boy </option>
									</select> -->

									<div>
										<!-- <div class=""><b>Shipping Type :</b></div> -->
										<small style="color: #b60505;"> Free Home delivery available on min order amount of ₹ <?php echo $has_cart_items[0]['min_order_amount'] ?>/-</small>
									</div>
									<div class="shippingtype" >
										<div><label><input checked value="1" type="radio" name="txtshipmenttype"> Self Shipping </label></div>
										<?php
										    $home_delivery = "";
										    if($total_pay_amount < $has_cart_items[0]['min_order_amount']){ 
										        $home_delivery = "disabled"; 
										    }
										    
										    $msg = '';
										    if($has_cart_items[0]['home_delivery'] != 1){
										        $home_delivery = "disabled"; 
										        $msg = 'Home Delivery not available right now';
										    }
										?>
										
										<div><label><input value="2" type="radio" name="txtshipmenttype" <?php echo $home_delivery ?>> Home Delivery </label></div>
										<div><small style="color: #f50000;"><?php echo $msg; ?></small></div>
									</div>
								</th>
							</tr> 
							 
							<tr> 
								<td colspan="5" class="">
									<p class="pull-right">Total : </p>
								</td>
								<td colspan="1" class="">
									<p class="">₹ <?php echo number_format($total_pay_amount, 2); ?></p>
								</td>
								<td colspan="" class="text-right">
									<button class="proceedtopay btnpaynow" data-toggle="modal" data-target="#modalProceedToPay">Pay Now</button>
								</td>
							</tr>
						</tbody>
					</table>
					</div>
					<?php 
						} else{
					?>
						<div class="alert alert-danger"> No Items added into cart.</div>
					<?php
						}
					?> 
				</div>
			</div>			 
		</div>		 
	</div>
</section>

<div id="updatecartmsg"></div>


<div id="modalProceedToPay" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #000;"> MOBILE NO VERIFICATION</h4>
      </div>
      	<div class="modal-body">

      		<div id="modalmsg"> </div>

          	<form name="sendOtpToMobile" id="sendOtpToMobile">
          	 <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">MOBILE NO</label>
                  <input id="txtmobilenoforotp" name="txtmobilenoforotp" type="text" class="form-control" required placeholder="Enter Mobile No">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <div class="form-group text-center">
                    <button type="button" class="updatecart" id="validateotp" onclick="verifyMobileNo();">SEND OTP</button>
                    <!-- <button type="button" class="btn btn-sm btn-danger pull-right" onclick="resendOtp();">RESEND</button> -->
                </div>
              </div>
          	</form>

           	<form name="validatesentOtp" id="validatesentOtp">
          	 <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">ENTER OTP</label>
                  <input id="txtvalidateotp" name="txtvalidateotp" type="text" class="form-control" required placeholder="Enter OTP">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <div class="form-group text-center">
                    <button type="button" class="btnpaynow" id="validateotp2" onclick="verifyEnteredOtp();">VALIDATE</button>
                    <button type="button" class="btndeletecart pull-right" onclick="verifyMobileNo();">RESEND</button>
                </div>  
              </div>
          	</form>
          	<div class="clearfix"></div>
      	</div>
    </div>
  </div>
</div>	


<div id="modalCartRemove" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #000;">REMOVE ITEM</h4>
      </div>
      	<div class="modal-body">

      		<div id="cartmodalmsg"> </div>

          	<form name="formRemoveItem" id="formRemoveItem">
          	  <input id="removeitemid" name="removeitemid" type="hidden" class="form-control input-sm">

          	  <h4 style="color: #c9302c; text-align: center;">Are you sure, you want to remove item from cart?</h4>
              <div class="col-md-12">
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-sm btn-danger" >REMOVE ITEM</button>
                    
                </div>
              </div>
          	</form>
          	<div class="clearfix"></div> 
      	</div>
    </div>
  </div>
</div>

<form id="mysecuredata" method="post" action="<?php echo $domain; ?>placeorder">
	<input type="hidden" name="txtordertype" id="txtordertype" />
	<input type="hidden" name="txtorderphone" id="txtorderphone" />
	<input type="hidden" name="txttotalamount" id="txttotalamount" />
</form>


<script type="text/javascript"> 

		$('#validatesentOtp').hide();

			function verifyMobileNo(){

				$('#modalmsg').removeClass(' alert alert-info');
		        $('#modalmsg').removeClass(' alert alert-success');
		        $('#modalmsg').removeClass(' alert alert-danger');


				$('#modalmsg').html('Please wait...');
	            $('#modalmsg').show().delay(5000).fadeOut();
	            $('#modalmsg').addClass(' alert alert-info');

	          	var phone = $('#txtmobilenoforotp').val();
	           	var mob = /^[6789][0-9]{9}$/;
	              
	          	if (mob.test(phone) == false) {
	            	$('#modalmsg').html('Enter valid mobile number');
	            	$('#modalmsg').show().delay(3000).slideUp(1000);
	            	$('#modalmsg').addClass(' alert alert-danger');
	            	return false;
	          	}


	          	$.ajax({
	                url: '<?php echo $userScript; ?>proceed-order-mobile-send-otp.php',
	                type: "POST",
	                 data: {
	                    phone: phone
	                },
	                success: function (data) { 
	                    // console.log(data);                   
	                    if(data == "success"){                        

	                        $('#modalmsg').html('Otp Send on your mobile no.');
	                   
		                    $('#modalmsg').show().delay(5000).fadeOut();
		                    $('#modalmsg').removeClass(' alert alert-info');
		                    $('#modalmsg').removeClass(' alert alert-danger');
		                    $('#modalmsg').addClass(' alert alert-success');
		                    
		                    $('#validatesentOtp').show();
		                    $('#sendOtpToMobile').hide();

		                    return true;
	                    }

	                    $('#modalmsg').removeClass(' alert alert-info');
		                $('#modalmsg').removeClass(' alert alert-success');

	                    $('#modalmsg').html('Error to send OTP on your mobile Number, retry.');
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').addClass(' alert alert-danger');
                        // $('#myloader').hide();
                        return false;
	                }
	            });
	        }


	    function verifyEnteredOtp(){

	    	$('#modalmsg').removeClass(' alert alert-info');
		    $('#modalmsg').removeClass(' alert alert-success');
		    $('#modalmsg').removeClass(' alert alert-danger');


          	var phone = $('#txtmobilenoforotp').val();
          	var otp = $('#txtvalidateotp').val();

          	$('#modalmsg').html('Please wait...');
            $('#modalmsg').show().delay(5000).fadeOut();
            $('#modalmsg').addClass(' alert alert-info');

          	if(otp ==""){

          		$('#modalmsg').removeClass(' alert alert-info');

          		$('#modalmsg').html('Please enter a valid OTP...');
            	$('#modalmsg').show().delay(5000).fadeOut();
            	$('#modalmsg').addClass(' alert alert-danger');
 				return false;

          	}

          	$.ajax({
                url: '<?php echo $userScript; ?>verify-proceed-order-otp.php',
                type: "POST",
                data: {
                    phone: phone,
                    otp: otp
                },
                success: function (data) { 
                    // console.log(data);                   
                     
                    if(data == "success"){                        
                        $('#modalmsg').html('OTP successfully verified, retry.');
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').addClass(' alert alert-success');

                        var ordertype = $('input[name="txtshipmenttype"]:checked').val();
						//$('#txtshipmenttype').val();
                        var phone = $('#txtmobilenoforotp').val();
                        var payable_amt = '<?php echo round($total_pay_amount, 2); ?>';

                           
                         $('#txtordertype').val(ordertype);
                         $('#txtorderphone').val(phone);
                         $('#txttotalamount').val(payable_amt);

                         $('#mysecuredata').submit();
                        // window.location.href = "<?php echo $domain ?>placeorder/"+ordertype+"/"+phone+"/place_order/";
                        // $('#myloader').hide();
                        // location.reload();

                        return true;
                    }

                    $('#modalmsg').html('Error to verify otp, retry.');
                    $('#modalmsg').show().delay(5000).fadeOut();
                    $('#modalmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        }




		$('.product-cont button').click(function(){
			var clickbtn = $(this).attr('class');
			// alert(clickbtn);
			var cart_product = $(this).parent().find('input[type="text"]').val();
			cart_product = parseInt(cart_product);
			// alert(cart_product);
			if(clickbtn == "minusbtn"){
				if(cart_product == 0){
					return false;
				}
				cart_product = cart_product - 1;
				$(this).parent().find('input[type="text"]').val(cart_product)
			}
			if(clickbtn == "plusbtn"){
				// if(cart_product == 0){
				// 	return false;
				// }
				cart_product = cart_product + 1;
				$(this).parent().find('input[type="text"]').val(cart_product)
			}
			// minusbtn plusbtn
		});

			 
		$('.updatecart').click(function(){
			var cart_products = $(this).parent().parent().find('input[type="text"]').val();
			var productid = $(this).attr('product-id');
			var productid = $(this).attr('product-id');
			var attributeid =  $(this).attr('attribute-id');
			var productrate = $(this).attr('product-rate');
			var shopid = $(this).attr('shop-id');

			$('#updatecartmsg').removeClass(' alert alert-info');
	        $('#updatecartmsg').removeClass(' alert alert-success');
	        $('#updatecartmsg').removeClass(' alert alert-danger');

			if(cart_products == 0){

				$('#updatecartmsg').html('Please add atlease one product...');
	          	$('#updatecartmsg').show().delay(5000).slideUp(1000);
	          	$('#updatecartmsg').addClass(' alert alert-danger');
		    	return false;
			}

			$('#updatecartmsg').html('Please wait');
	        $('#updatecartmsg').show().delay(5000).slideUp();
	        $('#updatecartmsg').addClass(' alert alert-info');

			$.ajax({
		        type: 'post',
		        url: '<?php echo $userScript ?>add-update-cart.php',
		        data: {
		            cart_products: cart_products,
		            productid: productid,
		            attributeid:attributeid,
		            productrate: productrate,
		            shopid: shopid,
		        },
		        success: function (response) { 

		        	// console.log(response);
		        	$('#updatecartmsg').removeClass(' alert alert-info');
		        	if(response == "shop"){
		        		$('#updatecartmsg').html('You can order form only one vendor at a time.');
			          	$('#updatecartmsg').show().delay(5000).slideUp(1000);
			          	$('#updatecartmsg').addClass(' alert alert-danger');
				    	return false;
		        	}
		        	if(response == "success"){
		        		$('#updatecartmsg').html('Added into cart successfully');
	                    $('#updatecartmsg').show().delay(5000).slideUp();
	                    $('#updatecartmsg').addClass(' alert alert-success');
	                    location.reload();
		    //     		setTimeout(function() { 
						//     location.reload();
						// },5000);
		        	}
		        	if(response == "update"){
		        		$('#updatecartmsg').html('Cart product updated successfully');
	                    $('#updatecartmsg').show().delay(5000).slideUp();
	                    $('#updatecartmsg').addClass(' alert alert-success');
	                    location.reload();
		    //     		setTimeout(function() {
						//     location.reload();
						// },5000);
		        	}
		        }
		    });
		})

		$('#formRemoveItem').submit(function(e){

			e.preventDefault();

			$('#cartmodalmsg').removeClass(' alert alert-info');
	        $('#cartmodalmsg').removeClass(' alert alert-success');
	        $('#cartmodalmsg').removeClass(' alert alert-danger');


			$('#cartmodalmsg').html('Please wait...');
            $('#cartmodalmsg').show().delay(5000).fadeOut();
            $('#cartmodalmsg').addClass(' alert alert-info');

          	$.ajax({
                url: '<?php echo $userScript; ?>remove-cart-item.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 
                    // console.log(data);                   
                    if(data == "success"){                        

                        $('#cartmodalmsg').html('Item Removed from cart.');
                   
	                    $('#cartmodalmsg').show().delay(5000).fadeOut();
	                    $('#cartmodalmsg').removeClass(' alert alert-info');
	                    $('#cartmodalmsg').removeClass(' alert alert-danger');
	                    $('#cartmodalmsg').addClass(' alert alert-success');

	                    location.reload();

	                    return true;
                    }

                    $('#cartmodalmsg').removeClass(' alert alert-info');
	                $('#cartmodalmsg').removeClass(' alert alert-success');

                    $('#cartmodalmsg').html('Error to remove, retry.');
                    $('#cartmodalmsg').show().delay(5000).fadeOut();
                    $('#cartmodalmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
		})

</script>

<?php 
include ('footer.php');
?>