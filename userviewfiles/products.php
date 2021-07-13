 <?php 
 

$username = $url->segment(2);
$pincode = $_GET['pincode'];
$ip_address = $uniqueTrackAddress;

$service_url = $apiurl."getUserProducts";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
	"username" => $username,
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
    height: 145px;
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
.myselectqty{
	margin: 5px 0;
    padding: 4px 15px;
    font-weight: bold;
    text-transform: uppercase;
}

</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">Products</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Products</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<div class="header-title"> Products </div>
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<div class="search-shop">
					 <!-- <form> -->
					<div class="search-box">
						<input type="text" class="form-control input-lg" name="shop" id="shopSearch"  placeholder="Search Products">
							<!-- <button class="shopbtn "><i class="fa fa-search"></i> Search</button> -->
					</div>
					<!-- </form> -->
				</div>
			</div>

			<?php 
				if($has_data != "error"){
					for ($i=0; $i < count($has_data); $i++) { 
					    
					    if(empty($has_data[$i]['products'])){
			 			    continue;
			 			}
							 			
						$image = $vendorimages."shopkeeper.jpg";
	                    if($has_data[$i]['products'][0]['image'] != ""){  
	                          $image = $vendorimages.$has_data[$i]['products'][0]['image'];
	                    }
	                    $redirectUrl = $domain.'product-details/'.str_replace(" ", "-", strtolower($has_data[$i]['name'])).'/'.$has_data[$i]['unique_product'];

	                    $select = 'select'.$i;
	                    $amount = 'amount'.$i;
	                    $discount = 'discount'.$i;
	                    $productattr = 'productattr'.$i;
	                    $qtybox = 'qtybox'.$i;


			?>
			<div class="col-md-6 shopinfo">
				<div class="single-shop ">
					<div class="row">								
						<div class="col-md-5">
							<div class="shop-img no-border">
						 		<img src="<?php echo $image; ?>" alt="" class="product-image">
							</div>
						</div>
						<div class="col-md-7">
							<div class="shop-details">
						 		<div class="shopname">
						 			<?php echo $has_data[$i]['name']; ?>
							 	</div>
							 	<select class="myselectqty" id="<?php echo $select; ?>" data-select="<?php echo $i; ?>">
							 		<?php 
							 		$added_attr = $has_data[$i]['products'][0]['id'];;
							 		$added_qty = 0;
							 		$aprice = $has_data[$i]['products'][0]['amount'];
							 		$adiscount = $has_data[$i]['products'][0]['discount'];
							 		$arate = $has_data[$i]['products'][0]['rate'];

							 		for ($j=0; $j < count($has_data[$i]['products']); $j++) { 
							 			$product = $has_data[$i]['products'][$j];
							 			
							            //	print_r($product);
							 			if($product['status'] == 2){
							 			    continue;
							 			}
							 			echo $product['status'];
							 			$selected = "";
							 			if($product['added_quantity']  > 0){
							 				$selected = "selected";
							 				$added_qty = $product['added_quantity'];
							 				$aprice = $product['amount'];
							 				$adiscount = $product['discount'];
							 				$added_attr = $product['id'];
							 				$arate = $product['rate'];
							 			}
							 		?>
							 			<option <?php echo $selected; ?>
							 		    data-status="<?php echo $product['status'] ?>"
							 			data-id="<?php echo $product['id'] ?>"
							 			data-price="<?php echo $product['amount'] ?>"
							 			data-discount="<?php echo $product['discount'] ?>"
							 			data-rate="<?php echo $product['rate'] ?>"
							 			data-gst="<?php echo $product['gst'] ?>"
							 			data-quantity="<?php echo $product['added_quantity'] ?>"
							 			><?php echo $product['quantity']." ". $product['measure'] ?></option>
							 		<?php
							 		}
							 		?>
							 	</select>

						 		<div class="shopaddress">
						 			<span >
						 				<b id="<?php echo $amount; ?>" style="color: #ff0b00; font-size: 15px;" >₹ <?php echo $aprice; ?>
						 				</b>
						 				&nbsp;&nbsp; <strike id="<?php echo $discount; ?>"><?php if($adiscount > 0){ ?> ₹<?php echo $arate; ?> <?php } ?> </strike> </span>
						 		</div>
						 		<div class="shopaddress">
						 			<i class="fa fa-commenting-o"></i>
						 			<span>&nbsp;<?php  echo substr($has_data[$i]['description'], 0, 60);  ?></span>
						 		</div>
						 		<input  type="hidden" value="<?php echo $added_attr; ?>" name="productattr" id="<?php echo $productattr; ?>" /> 
						 		<div class="product-cont">
									<button  class="minusbtn">-</button> 
									<input id="<?php echo $qtybox; ?>" readonly class="add-product" type="text" value="<?php echo $added_qty; ?>" name=""/>
									<button class="plusbtn">+</button>
									
									<button class="updatecart" data-order="<?php echo $i; ?>"
									product-id="<?php echo $has_data[$i]['id']; ?>"
									product-name="<?php echo $has_data[$i]['name']; ?>"
									product-image="<?php echo $image; ?>"
									shop-id="<?php echo $has_data[$i]['shopkeeper_id']; ?>"
									> <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;ADD TO CART</button>
									<div class="clearfix"></div>
								</div>

						 		<div class="shop-viewbtn">
						 			<a href="<?php echo $redirectUrl; ?>"><button class="roundbtn ">View Detail</button></a>
						 		</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
				} 
			}
			else{
			?>
			<div class="clearfix"></div>
			<div class="alert alert-danger" > No products available</div>
			<?php
			}
			?>	

		</div>
		<!-- <div class="text-center mt-20">
			<button class="custombtn roundbtn colorprimary ">View all shop</button>
		</div> -->
	</div>
</section>

<div id="updatecartmsg"></div>

<script type="text/javascript">

	$('.myselectqty').change(function(){
		var selectattr = $(this).attr('data-select');
		var selectitem = 'select'+$(this).attr('data-select');
		var attr_id = $('#'+selectitem + ' option:selected').attr('data-id');
		var price = $('#'+selectitem + ' option:selected').attr('data-price');
		var discount = $('#'+selectitem + ' option:selected').attr('data-discount');
		var rate = $('#'+selectitem + ' option:selected').attr('data-rate');
		var gst = $('#'+selectitem + ' option:selected').attr('data-gst');
		var quantity = $('#'+selectitem + ' option:selected').attr('data-quantity');
 

		$('#productattr'+selectattr).val(attr_id);
		$('#amount'+selectattr).html('₹ ' + price);
		$('#discount'+selectattr).html('');
		$('#qtybox'+selectattr).val(quantity)

		if(discount > 0){
			$('#discount'+selectattr).html('₹ ' + rate);
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
 
		var order = $(this).attr('data-order');
  		var attrdata = 'select'+order;

		var productid = $(this).attr('product-id'); 
		var attributeid = $('#'+attrdata + ' option:selected').attr('data-id'); 
		var cart_products = $(this).parent().find('input[type="text"]').val();
		var productrate = $('#'+attrdata + ' option:selected').attr('data-price');
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
	        		// setTimeout(function() { 
					    location.reload();
					// },5000);
	        	}
	        	if(response == "update"){
	        		$('#updatecartmsg').html('Cart product updated successfully');
                    $('#updatecartmsg').show().delay(5000).slideUp();
                    $('#updatecartmsg').addClass(' alert alert-success');
	        		// setTimeout(function() {
					    location.reload();
					// },5000);
	        	}
	        }
	    });
	})
</script>

<?php 
include ('footer.php');
?>