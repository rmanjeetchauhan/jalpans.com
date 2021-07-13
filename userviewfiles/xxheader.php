<?php 

$ip_address = $_SERVER['REMOTE_ADDR'];

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
$has_no_data_cart = $response['error'];
$has_data_cart = $response['message']; 

// print_r($has_data_cart);

$cartitems = 0;
if($has_data_cart != "error"){
    $cartitems = (int)count($has_data_cart);
}


$search = '';
if(!empty($_GET['search'])){
	$search = $_GET['search'];
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Jalpans.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo $domain; ?>assets/images/logo.jpg">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo $user_asset; ?>css/style.css">
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style type="text/css">
	#myloader {
    position: fixed;
    z-index: 99999;
    background-color: #c6373733;
    /* background-color: #000; */
    height: 100%;
    width: 100%;
    text-align: center;
    padding-top: 25%;
    font-weight: bold;
}
#myloader img{
    height: 65px;
}
</style>

<script type="text/javascript">
    $('form').submit(function(){
        $('#myloader').show();        
    });

    $(function(){
        $('#myloader').hide();
    })

    $(document)
    .ajaxStart(function () {
        $('#myloader').show();
    })
    .ajaxStop(function () {
        $('#myloader').hide();
    });
</script>
</head>
<body>
<div class="myloader"  id="myloader">    
    <img src="<?php echo $domain ?>assets/images/loader.gif">     
</div>
<div class="main">
		<header>
			<div class="top-header">
				<div class="container">
					<div class="row">
 					<div class="col-md-2">
 						<ul class="top-socialicon clearfix">
 							<li class="facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
 							<li class="twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
 							<li class="linkedin"><a href=""><i class="fa fa-linkedin"></i></a></li>
 							<li class="instagram"><a href=""><i class="fa fa-instagram"></i></a></li>
 						</ul>
 					</div>
 					<div class="col-md-6">
 						<ul class="top-contactinfo">
 							<li class=""><a href=""><i class="fa fa-envelope-o"></i> info@jalpans.com</a></li>
 							<li class=""><a href=""><i class="fa fa-phone"></i> (+91)- 898 989 8989</a></li>
 						</ul>
 					</div>
 					<div class="col-md-2">
 						<div class="custom-dropdown">
 							<a href="javascript:void(0)">Shopkeeper 
 								<span class="clearfix"><i class="fa fa-caret-down"></i></span> 
 							</a>
 							<ul class="custom-submenu">
 								<li><a href="<?php echo $domain; ?>shopkeeper"><i class="fa fa-sign-in"></i> Login</a></li>
 								<li><a href="<?php echo $domain; ?>shopkeeper/signup"><i class="fa fa-user"></i> Signup</a></li>

                                <li style="border-bottom: 2px solid #000;"> </li>

                                <li style="border-bottom: 2px solid #000;"><a href="<?php echo $domain; ?>delivery-boy/login"><i class="fa fa-sign-in"></i> Delivery Boy Login</a></li>
 							</ul>
 						</div>
 					</div>
 					<div class="col-md-2">
 						 <div id="google_translate_element"></div>
 					</div>
 				</div>
				</div>
			</div>
			<div class="clearfix"></div>

			<div class="header-item">
				<div class="container">
					<div class="row">
 					<div class="col-md-2">
 						<div class="logo">
 							<a href="<?php echo $domain; ?>">
 								<img  src="<?php echo $user_asset; ?>images/logo.jpg"/>
 							</a>
 						</div>
 					</div>
 					<div class="col-md-3"></div>
 					<div class="col-md-4">
 						<form action="<?php echo $domain; ?>search/">
 							<div class="search-box">
	 							<input type="text" class="form-control input-lg" name="search" id="search" placeholder="Pincode to search shop" value="<?php echo $search; ?>">
	 							<button><i class="fa fa-search"></i> Search</button>
	 						</div>
 						</form>
 					</div>

 					<div class="col-md-2">
 						<div class="dashboard">
 							<a data-toggle="modal" data-target="#modaltrakOrder" href="">TRACK ORDER</a>
 						</div>
 					</div>
 					<div class="col-md-1">
 						<div class="cart-box">
 							<center>
 								<a href="<?php echo $domain ?>checkout/">
 									<i class="fa fa-briefcase"></i> 
 									<span class="balloonitems"><?php echo $cartitems; ?></span>
 								</a>
 							</center>
 						</div>
 					</div>
 					 
 				</div>
				</div>
			</div>
		</header>


<div id="modaltrakOrder" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Trak Your Order</h4>
      </div>
      <div class="modal-body">
        <p>Enter Mobile No or Order id to track your order</p>
        <form action="<?php echo $domain; ?>track-order/">
            <div class="search-box">
                <input type="text" class="form-control input-lg" name="track_order" id="track_order" placeholder="Mobile No. or Order Id" value="">
                <button><i class="fa fa-search"></i> GET</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 		