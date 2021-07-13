 <?php 
 
 @session_start();
 // print_r($_SESSION);

// $pincode = $_GET['pincode'];
$ip_address = $uniqueTrackAddress;

$unique_product = $url->segment(3);

$service_url = $apiurl."getProductDetails";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
	"unique_product" => $unique_product,
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
$has_no_data = $response['error'];
$has_data = $response['message']; 

// print_r($has_data);


$service_url = $apiurl."getUserComment";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
	"product_id" => $unique_product
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_comment = $response['error'];
$has_data_comment = $response['message']; 

// print_r($has_data);

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
    padding: 2px 15px;
    color: #fff;
    font-weight: bold;
}
.product-cont button.minusbtn{
	background-color: #de0401;
}
.product-cont button.plusbtn{
	background-color: #0c9669;
}

.add-product{
	height: 26px !important; 
	text-align: center !important; 
	width: 50px !important; 
	border: 1px solid #de0401 !important;
}

.product-cont{
	margin-top: 5px;
}

.updatecart{
  font-size: 16px;
    background-image: linear-gradient(to right, #ff0b00 , #000);
    color: #fff;
    border: 1px solid transparent;
}
.shop-img img {
    /*height: 145px;*/
    width: 100%;
    height: auto;
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

.shop-details .shopname {
    font-size: 25px;
}


.commentDescdata .color_dark{
	text-transform: uppercase;
    border-bottom: 1px solid #ccc;
    margin-bottom: 20px;
    padding-bottom: 5px;
}
.singlecomment{
	margin-bottom: 15px;
	border-bottom: 1px solid #f3f3f3;
	padding-bottom: 6px;
}

.singlecomment img{
	height: 60px;
    width: 60px;
    border: 1px solid #e1e1e1;
    border-radius: 50%;
    padding: 2px;
    float: left;
    margin-right: 20px;
    margin-top: -5px;
}
.myselectqty{
	margin: 5px 0;
    padding: 4px 15px;
    font-weight: bold;
    text-transform: uppercase;
}
.shop-img {
     border-bottom: none; 
     padding-bottom: 0px; 
     margin-bottom: 0px; 
}

</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">Products Detail</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Products Detail</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<!-- <div class="header-title"> Product Detail </div> -->
		<div class="row">

			<?php 
				if(!empty($has_data)){					 
					$image = $vendorimages."shopkeeper.jpg";
                    if($has_data['products'][0]['image'] != ""){  
                        $image = $vendorimages.$has_data['products'][0]['image'];
                    }
                    $redirectUrl = $domain.'product-details/'.$has_data['unique_product'];
			?>
			<div class="col-md-12 shopinfo">
				<div class="single-shop">
					<div class="row">								
						<div class="col-md-5">
							<div class="shop-img ">
						 		<img src="<?php echo $image; ?>" alt="" class="product-image">
							</div>
						</div>
						<div class="col-md-7">
							<div class="shop-details">
						 		<div class="shopname"><?php  echo $has_data['name']; ?></div>
						 		<select class="myselectqty" id="myselectqty">
							 		<?php 
							 		$added_attr = $has_data['products'][0]['id'];;
							 		$added_qty = 0;
							 		$aprice = $has_data['products'][0]['amount'];
							 		$adiscount = $has_data['products'][0]['discount'];

							 		for ($j=0; $j < count($has_data['products']); $j++) { 
							 			$product = $has_data['products'][$j];
							 			$selected = "";
							 			if($product['added_quantity']  > 0){
							 				$selected = "selected";
							 				$added_qty = $product['added_quantity'];
							 				$aprice = $product['amount'];
							 				$adiscount = $product['discount'];
							 				$added_attr = $product['id'];
							 			}
							 		?>
							 			<option <?php echo $selected; ?>
							 			data-id="<?php echo $product['id'] ?>"
							 			data-price="<?php echo $product['amount'] ?>"
							 			data-discount="<?php echo $product['discount'] ?>"
							 			data-gst="<?php echo $product['gst'] ?>"
							 			data-quantity="<?php echo $product['added_quantity'] ?>"
							 			><?php echo $product['quantity']." ". $product['measure'] ?></option>
							 		<?php
							 		}
							 		?>
							 	</select>
						 		<div class="shopaddress">
						 			<span >
						 				<b id="amount" style="color: #ff0b00; font-size: 15px;" > ₹ <?php echo $aprice; ?>
						 				</b>						 				
						 				<strike id="discount">
						 				<?php if($adiscount > 0){ ?> &nbsp;&nbsp;₹<?php echo $adiscount; ?> <?php } ?> </strike> </span>
						 		</div>
 			
						 		<div class="product-cont">
									<button class="minusbtn">-</button> 
									<input readonly id="cartitems" class="add-product" type="text" value="<?php echo $added_qty; ?>" name=""/> 
									<button class="plusbtn">+</button>
									
									<div style="margin-top: 20px;">
									<button class="updatecart"
									product-id="<?php echo $has_data['id']; ?>"
									product-name="<?php echo $has_data['name']; ?>"
									product-image="<?php echo $image; ?>"
									product-rate="<?php echo $has_data['amount']; ?>"
									shop-id="<?php echo $has_data['shopkeeper_id']; ?>"
									> <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;UPDATE CART</button>
									</div>
									<div class="clearfix"></div>
								</div> 
								<hr>
								<div class="shopaddress">
						 			<i class="fa fa-commenting-o"></i>
						 			<span>&nbsp;<?php  echo substr($has_data['description'], 0, 60);  ?></span>
						 		</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			}
			?>	


			<div class="col-md-12">
				<div class="commentDescdata"> 
				 <h4 class="m_bottom_3 color_dark"> <b> <?php echo number_format(count($has_data_comment)); ?> &nbsp; Comments</b>  </h4>
				 <form id="formsaveform" name="formsaveform">
				 	<div>
				 		
				 		<div id="msgcomment"></div>
				 		<label>Post Comment </label>
				 		<div class="form-group">
				 			<input class="form-control" type="text"  pattern="[6789][0-9]{9}" id="txtcontectno" name="txtcontectno" placeholder="Mobile Number">
				 			<input class="form-control" type="hidden"   id="txtproductid" name="txtproductid"  value="<?php echo $has_data['unique_product']; ?>">
				 		</div>

				 		<div class="form-group">
				 			<textarea class="form-control" name="usrcomment" id="usrcomment" required placeholder="Comment Text"></textarea>
				 		</div>
				 	</div>
				 	
				 	<div class="clearfix" style="margin-top: 10px;"><button class="btn btn-info pull-right">Save Comment</button></div>
				 </form>
			</div>
			<hr>

			<?php 
			date_default_timezone_set("Asia/Calcutta");
			for ($i=0; $i < count($has_data_comment); $i++) { 
			?>
				 
			<div class="singlecomment"> 
				<img src="<?php echo $domain.'assets/images/user.png' ?>">
				<div class="commentcontect"> <b> <?php echo $has_data_comment[$i]['contact_number']; ?></b>  </div>
				<div> <?php echo $has_data_comment[$i]['comment']; ?> </div>
				<div class="pull-right text-uppercase"> <small><b><?php echo date("d M, Y", strtotime($has_data_comment[$i]['creation_date'])); ?></b></small> </div>
				<div class="clearfix"></div>
			</div>
			<?php 
			}
			?>
			</div>


		</div>
		<!-- <div class="text-center mt-20">
			<button class="custombtn roundbtn colorprimary ">View all shop</button>
		</div> -->
	</div>
</section>

<div id="updatecartmsg"></div>

<script type="text/javascript">

	$('#myselectqty').change(function(){
		 
		var attr_id = $('#myselectqty option:selected').attr('data-id');
		var price = $('#myselectqty option:selected').attr('data-price');
		var discount = $('#myselectqty option:selected').attr('data-discount');
		var gst = $('#myselectqty option:selected').attr('data-gst');
		var quantity = $('#myselectqty option:selected').attr('data-quantity');
 

		$('#productattr').val(attr_id);
		$('#amount').html('₹ ' + price);
		$('#discount').html('');
		$('#cartitems').val(quantity)

		if(discount > 0){
			$('#discount').html('₹ ' + discount);
		}

		// alert( attr_id + ", " + price + ", " + discount + ", " + gst);
	})

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
  $(function(){
    $('#shopSearch').keyup(function(){
        var searchText = $(this).val();
        if(searchText == ''){
          $('.shopinfo').css('display', 'block');
        }
        else if(searchText != ""){
          searchText = searchText.trim().toLowerCase();
          $('.shopinfo').css('display', 'none');
          $('.shopinfo').each(function(){
              var searctShop = $(this).find('.shopname').html();
              searctShop = searctShop.trim().toLowerCase();
              if (searctShop.indexOf(searchText) > -1) {
                $(this).css('display', 'block');
              }
          });
        }
    })
  });



  $('.updatecart').click(function(){
		var cart_products = $('#cartitems').val();
		var productid = $(this).attr('product-id');
		var attributeid = $('#myselectqty option:selected').attr('data-id');    //$('#productattr').val();
		var productrate = $('#myselectqty option:selected').attr('data-price'); //$(this).attr('product-rate');
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
	            attributeid: attributeid,
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
	        		setTimeout(function() { 
					    location.reload();
					},5000);
	        	}
	        	if(response == "update"){
	        		$('#updatecartmsg').html('Cart product updated successfully');
                    $('#updatecartmsg').show().delay(5000).slideUp();
                    $('#updatecartmsg').addClass(' alert alert-success');
	        		setTimeout(function() {
					    location.reload();
					},5000);
	        	}
	        }
	    });
	});



	$('#formsaveform').submit(function(e){
		
		e.preventDefault();

		var usrcomment = $('#usrcomment').val().trim();
		if(usrcomment == ""){
			$('#msgcomment').html('Please write some text ...');
	    	$('#msgcomment').addClass(' alert alert-danger');
	    	$('#msgcomment').show().delay(3000).slideUp(2000);
	    	return false;
		}

		$('#msgcomment').html('Please wait...');
	    $('#msgcomment').addClass(' alert alert-info');

		$.ajax({
	        url: '<?php echo $userScript ?>add-user-comment.php',
	        type: "POST",
          	data: new FormData(this),
          	contentType: false,
          	cache: false,
          	processData: false,
          	async: true,
	        success: function (response) {  			         
	        	if(response == "success"){
	        		$('#msgcomment').removeClass(' alert alert-danger');
	        		$('#msgcomment').removeClass(' alert alert-info');
        			$('#msgcomment').html('your comment posted successfully');
        			$('#msgcomment').addClass(' alert alert-success');

	        		setTimeout(function() {			        			
					    location.reload();
					},5000);

					return true;
	        	}
	        	if(response == "ph"){
	        		$('#msgcomment').removeClass(' alert alert-danger');
	        		$('#msgcomment').removeClass(' alert alert-info');
        			$('#msgcomment').html("We dono't find your order with this product.");
        			$('#msgcomment').addClass(' alert alert-success');

	        		setTimeout(function() {			        			
					    location.reload();
					},5000);

					return true;
	        	}
	        	
        		$('#msgcomment').removeClass(' alert alert-info');
    			$('#msgcomment').html('Error to submit comment');
    			$('#msgcomment').addClass(' alert alert-danger');
    			$('#msgcomment').show().delay(3000).slideUp(2000);
	        }
	    });
	})
</script>

<?php 
include ('footer.php');
?>