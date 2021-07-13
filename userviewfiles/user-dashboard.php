 <?php 
 
@session_start();

$mobile = '';

if(!empty($_GET['mobile'])){
	$mobile = $_GET['mobile'];
}

$service_url = $apiurl."getOrderHistory";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
	"mobile" => $mobile
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
.search-box button {
    width: 125px;
}
</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">Order History</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Order History</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<!-- <div class="header-title"> Product Detail </div> -->
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<div class="search-shop">
					 <form action="<?php echo $domain ?>dashboard/">
						<div class="search-box">
							<div style="color: #ff0b00; margin-bottom: 5px;"><small>Enter your mobile number to get order history</small></div>
 							<input type="text" class="form-control input-lg" name="mobile" id="shopSearch"  placeholder="Mobile No" value="<?php echo $mobile; ?>">
 							<button class="shopbtn "> GET ORDER</button>
 						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row"> 			 
			<div class="col-md-12 shopinfo">
				<div class="single-shops">
					<?php 
					if(count($has_data) > 0) {
					?>
					<div class="cartmsg" id="cartmsg"> </div>

					<div class="table-responsive">
						<table class="table table-striped">
							<thead> 
								<tr class="">
									<th>SL</th>
									<th>ORDER ID</th>
									<th>DELIVERY</th>
									<th>SHOPKEEPER DETAIL</th>
									<th>TOTAL AMOUNT </th>
									<th>DATE</th>
									<th>STATUS</th>
									<th>VIEW ORDER</th>
									<!-- <th class="text-right">CANCEL</th> -->
								</tr>
							</thead>
							<tbody>
								<?php 							 
									$count = 0;
									for ($i=0; $i < count($has_data) ; $i++) { 
										 
										$delivery = "Self";
										if($has_data[$i]['order_type'] == 2){
											$delivery = "Delivery Boy";
										}
										$color = '';
										$statusText = "Pending";
										if($has_data[$i]['order_status'] == 1){
											$statusText = "Delivered";
											$color = '#147a08';
										}
										if($has_data[$i]['order_status'] == 2){
											$statusText = "<b>Cancelled</b>";
											$color = '#e60a00';
										}
								?>
								<tr>
									<td><?php echo ++$count; ?></td>
									<td> <?php echo $has_data[$i]['order_id']; ?>  </td>
									<td> <?php echo $delivery; ?>  </td>
									<td class="prosuctname" title="<?php echo ucwords(strtolower(($has_data[$i]['address']))); ?>">
										<div><a href="#" class=""><b><?php echo strtoupper(($has_data[$i]['shopname'])); ?></b></a></div>
										<div ><i class="fa fa-home"></i> <?php echo substr(ucwords(strtolower(($has_data[$i]['address']))),0 , 25); ?>...</div>
										<div><i class="fa fa-map-marker"></i>&nbsp; <?php echo $has_data[$i]['pincode'] ; ?></div>

									</td>
									<td data-title="Price"> <b> ₹ <?php echo $has_data[$i]['transaction_amount'] ?> </b></td>
									<td data-title="Price"> <?php echo date('d M, Y', strtotime($has_data[$i]['creation_date'])); ?> </td>
									<td class="text-uppercase" style="color: <?php echo $color; ?>"> <?php echo $statusText; ?>  </td>
									<td class=""> 
										<button class="btnpaynow" data-toggle="modal" data-target="#modalOrderDetail" onclick="orderDetails('<?php echo $has_data[$i]['order_id'] ?>', '<?php echo $has_data[$i]['transaction_amount'] ?>', '<?php echo $has_data[$i]['total_amount'] ?>', '<?php echo $has_data[$i]['commission'] ?>' )"> <i class="fa fa-eye" aria-hidden="true"></i> VIEW </button>
									</td>
									<!-- <td class="text-right"> 
										<?php
										if($has_data[$i]['order_status'] != 4 AND $has_data[$i]['order_status'] != 3) {
										?>
										<button class="btndeletecart"
										order-id="<?php echo $has_data[$i]['order_id']; ?>" data-toggle="modal" data-target="#modalCancelOrder" onclick="$('#cancelOrderid').val($(this).attr('order-id'))"> <i class="fa fa-close" aria-hidden="true"></i> CANCEL </button>
										<?php 
										}
										else{
										 echo '<div class="text-center">-</div>';
										}
										?>
									</td> -->
								</tr> 
							<?php 
								} 							
							?>
						</tbody>
					</table>
					</div>
					<?php 
						} 
						else if(empty($mobile)){
					?>
						<div class="alert alert-warning"> Enter your mobile number to get order history.</div>
					<?php
						}
						else{
					?>
						<div class="alert alert-danger"> No Orders for this mobile number.</div>
					<?php
						}
					?> 
				</div>
			</div>			 
		</div>		 
	</div>
</section>

<div id="updatecartmsg"></div>


<div id="modalOrderDetail" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #000;"> ORDER DETAIL</h4>
      </div> -->
      	<div class="modal-body">
      		<div id="viewOrder"> </div>
      	</div>
      	<div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
      </div>
    </div>
  </div>
</div>	


<div id="modalCancelOrder" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #000;">CANCEL ORDER</h4>
      </div>
      	<div class="modal-body">
      		<div id="cancelOrdMsg"> </div>
          	<form name="formCancelOrder" id="formCancelOrder">
          	  <input id="cancelOrderid" name="cancelOrderid" type="hidden" class="form-control input-sm">
          	  <h4 style="color: #c9302c; text-align: center;">Are you sure, you want to cancel this order?</h4><br>
              <div class="col-md-12">
                <div class="form-group text-center">
                    <button type="submit" class="updatecart" >CANCEL ORDER</button>
                </div>
              </div>
          	</form>
          	<div class="clearfix"></div> 
      	</div>
    </div>
  </div>
</div>


<script type="text/javascript">
 
	function orderDetails(order_id, total_amount, amount, commission){


      	$.ajax({
            url: '<?php echo $userScript; ?>order-history-products.php',
            type: "POST",
             data: {
                order_id: order_id
            },
            success: function (data) { 
               	var products = JSON.parse(data);
               	if(products.length > 0){
               		var str = '<table class="table  table-striped"><tr><th colspan="6" style="background-color: #000; color: #fff;">ORDER PRODUCTS</th></tr><tr><th>Sl No.</th><th></th><th>Name</th><th class="text-right">Quantity</th><th class="text-right">Rate</th><th class="text-right">Sub Total</th></tr>';
	               	for (var i = 0; i < products.length; i++) {
	               		var img = '<img style="height: 45px; width: 55px;" src="<?php echo $domain; ?>assets/images/'+products[i].image+'" />';
	                	str +='<tr><td><b>'+(i+1)+'</b></td><td>'+img+'</td><td class="text-uppercase">'+products[i].name+'<div><small>'+products[i].pquantity+' '+products[i].unit +'</small></div></td><td class="text-right">'+products[i].quantity+'</td><td class="text-right">₹'+products[i].rate+'</td><td class="text-right">₹'+products[i].total_price+'</td></tr>';
	               	}
	               	str += '<tr><td class="text-right" colspan="5">Convenience Charge (+'+ commission +'%)</td><td class="text-right">₹'+(total_amount-amount).toFixed(2)+'</td></tr>';
	               	str += '<tr  ><th class="text-right" colspan="5">TOTAL AMOUNT</th><th class="text-right">₹'+total_amount+'</th></tr></table>';
	               	$('#viewOrder').html(str);
	           	}
                
            }
        });
    }

   
	$('#formCancelOrder').submit(function(e){

		e.preventDefault();

		$('#cancelOrdMsg').removeClass(' alert alert-info');
        $('#cancelOrdMsg').removeClass(' alert alert-success');
        $('#cancelOrdMsg').removeClass(' alert alert-danger');


		$('#cancelOrdMsg').html('Please wait...');
        $('#cancelOrdMsg').show().delay(5000).fadeOut();
        $('#cancelOrdMsg').addClass(' alert alert-info');

      	$.ajax({
            url: '<?php echo $userScript; ?>cancel-order.php',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            async: true,
            success: function (data) { 
                // console.log(data);                   
                if(data == "success"){                        

                    $('#cancelOrdMsg').html('Order successfully cancelled .');
               
                    $('#cancelOrdMsg').show().delay(5000).fadeOut();
                    $('#cancelOrdMsg').removeClass(' alert alert-info');
                    $('#cancelOrdMsg').removeClass(' alert alert-danger');
                    $('#cancelOrdMsg').addClass(' alert alert-success');

                    location.reload();

                    return true;
                }

                $('#cancelOrdMsg').removeClass(' alert alert-info');
                $('#cancelOrdMsg').removeClass(' alert alert-success');

                $('#cancelOrdMsg').html('Error to cancel order, retry.');
                $('#cancelOrdMsg').show().delay(5000).fadeOut();
                $('#cancelOrdMsg').addClass(' alert alert-danger');
                // $('#myloader').hide();
                return false;
            }
        });
	})

</script>

<?php 
include ('footer.php');
?>