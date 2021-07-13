<?php 

$ip_address = $uniqueTrackAddress;

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




$service_url = $apiurl."getAdminProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
    "api_key" => $api_key,
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_settings = $response['error'];
$has_settings = $response['message']; 



$service_url = $apiurl."getSocialMedia";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_media = $response['error'];
$has_media = $response['message'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Jalpans.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo $domain; ?>assets/images/logo.jpg">

<script src="<?php echo $vendorAssets; ?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $vendorAssets; ?>js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo $user_asset; ?>css/style.css">
<link rel="stylesheet" href="<?php echo $user_asset; ?>css/bootstrap.min.css">
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
.custom-dropdown a {
    
    text-decoration: none !important;
}

.mobileres {
    margin-left: 0;
}

.notice-board{
background-image: linear-gradient(to right, red , #ffcf00, #000, blue);
color: #fff;
padding: 8px 15px;
font-size: 16px;
font-weight: bold;
}

@media (max-width: 480px){

    .dashboard a{
        padding: 6px;
    }
    .no-padding{
        padding-right: 5px; 
        padding-left: 5px;
    }
    ul.custom-submenu {
    width: 122px;
    }
    .mobileres {
    margin-left: 25%;
}
    
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
 					<div class="col-md-4 col-xs-12">
 						<ul class="top-socialicon clearfix">
 							<li class="facebook"><a target="_blank" href="<?php echo $has_media['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
 							<li class="twitter"><a target="_blank" href="<?php echo $has_media['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
 							<li class="linkedin"><a target="_blank" href="<?php echo $has_media['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li>
 							<li class="instagram"><a target="_blank" href="<?php echo $has_media['instagram']; ?>"><i class="fa fa-instagram"></i></a></li>
 							<li class="youtube"><a target="_blank" href="<?php echo $has_media['youtube']; ?>"><i class="fa fa-youtube"></i></a></li>
 						</ul>
 					</div>
 					<div class="col-md-2 col-xs-4  no-padding">
                        <div class="custom-dropdown">
                            <a href="javascript:void(0)">Shopkeeper 
                                <span class="clearfix"><i class="fa fa-caret-down"></i></span> 
                            </a>
                            <ul class="custom-submenu">
                                <li><a href="<?php echo $domain; ?>shopkeeper"><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href="<?php echo $domain; ?>shopkeeper/signup"><i class="fa fa-user"></i> Signup</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-4  no-padding">
                        <div class="custom-dropdown">
                            <a href="javascript:void(0)">Shop Agent 
                                <span class="clearfix"><i class="fa fa-caret-down"></i></span> 
                            </a>
                            <ul class="custom-submenu">
                                <li><a href="<?php echo $domain; ?>shop-agent"><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href="<?php echo $domain; ?>shop-agent/signup"><i class="fa fa-user"></i> Signup</a></li>
                            </ul>
                        </div>
                    </div>
 					<div class="col-md-2 col-xs-4 no-padding">
 						<div class="custom-dropdown">
 							<a href="javascript:void(0)"> Delivery Boy 
 								<span class="clearfix"><i class="fa fa-caret-down"></i></span> 
 							</a>
 							<ul class="custom-submenu">
                                <li style="border-bottom: 2px solid #000;"><a href="<?php echo $domain; ?>delivery-boy/login"><i class="fa fa-sign-in"></i> Login</a></li>
                               
                               <!-- <li><a href="<?php echo $domain; ?>shopkeeper/signup"><i class="fa fa-user"></i> Signup</a></li> -->
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
 					<div class="col-md-2 col-xs-3">
 						<div class="logo">
 							<a href="<?php echo $domain; ?>">
 								<img  src="<?php echo $user_asset; ?>images/logo.jpg"/>
 							</a>
 						</div>
 					</div>
 					
 					<div class="col-md-offset-3 col-md-4 no-padding">
 						<form action="<?php echo $domain; ?>search/">
 							<div class="search-box">
	 							<input type="text" class="form-control input-lg" name="search" id="search" placeholder="Pincode to search shop" value="<?php echo $search; ?>">
	 							<button><i class="fa fa-search"></i> Search</button>
	 						</div>
 						</form>
 					</div>

 					<div class="col-md-2 mobileres col-xs-6">
 						<div class="dashboard">
 							<a data-toggle="modal" data-target="#modaltrakOrder" href="">TRACK ORDER</a>
 						</div>
 					</div>
 					<div class="col-md-1 col-xs-3">
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

        <?php 
            if($has_settings != "error"){
                if(trim($has_settings['notice']) != ""){
        ?>

            <div class="notice-board">
              <marquee><?php echo $has_settings['notice']; ?></marquee>
            </div>

        <?php
                }
            }
        ?>


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
<script>
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires="+d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    function checkCookie() {
        var jalpansdata = getCookie("jalpans");
        if (jalpansdata == "") {
            var cname ="jalpans";
            var cvalue = "<?php echo md5('Jalpans'.time()); ?>";
            setCookie(cname, cvalue, 30);
        } 
    }
    checkCookie();
</script>
 		