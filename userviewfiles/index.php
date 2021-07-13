<?php 

// print_r($_SERVER['REMOTE_ADDR']);
$service_url = $apiurl."getHomeShopkeeper";
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
$has_no_shopkeeper = $response['error'];
$has_shopkeeper = $response['message']; 

// print_r($has_shopkeeper);


include ('header.php');
?>

<style>
    .certificate img{
        max-width: 100%;
        padding:2px;
        border: 1px solid #e1e1e1;
    }
    .sideadout-img img {
        width: 100%;
        max-height: 355px;
    }
    .shop-details .shopname {
        font-size: 15px;
    text-transform: none;
    font-weight: 600;
    letter-spacing: 0.3px;
}
.Downloadcont{
     background-image: linear-gradient(to right, red , #ffcf00, #f9f9f9, #fbfbfb);
    font-size: 30px;
    color: #fff;
    font-weight: bold;
}
.btndownlod{
    text-align:right;
}



    
    
    @media only screen and (max-width: 600px) {
        .Downloadcont{
             background-image: linear-gradient(to bottom, red , #ffcf00, #f9f9f9, #fbfbfb);
            font-size: 20px;
            color: blue;
            font-weight: bold;
        }
        .btndownlod{
    text-align:center;
}
    }
</style>
<div class="banner">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $user_asset; ?>slider/banner-1.jpeg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="<?php echo $user_asset; ?>slider/banner-2.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="<?php echo $user_asset; ?>slider/banner-5.jpg" alt="Los Angeles">
    </div>
     <div class="item">
      <img src="<?php echo $user_asset; ?>slider/banner-6.jpg" alt="Los Angeles">
    </div>
     <div class="item">
      <img src="<?php echo $user_asset; ?>slider/banner-7.jpg" alt="Los Angeles">
    </div>
  </div>

  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
</div> 


<section class="about">
	<div class="container">
		<div class="header-title"> Welcome to jalpans.com </div>
		<div class="row">
			<div class="col-md-4">
				<div class="sideadout-img mb-10">
			 		<img src="<?php echo $domain; ?>assets/52743612.webp">
				</div>
			</div>
			<div class="col-md-8">
				<p class="about-text text-justify">
					Welcome to "JALPANS.COM", Dear users, we are glad to inform you that the crisis for your local taste has been ended now because of jalpans.com. jalpans.com is a number one source for Fast Food, Sweets, Milk & Milk products, Meal & beverages (Non-alcoholic),Fruit & Fruit products, Snacks and all other related items as above mentioned. jalpans.com prominently provides a platform for three users. 
				</p>
				<p class="about-text text-justify">
					1) shopkeeper-All shops that sell above mentioned products can also open their same shop at jalpans.com by sign up in shopkeeper option will be free of cost. Once you successfully sign up, you will use your shop just like your physical shop and you can easy to sell your products by online. 

				</p> 
				<p class="about-text text-justify">
					2) Agent-One can easy to work with us as an agent. Agent can register him/herself by sign up in Agent option will be free of cost. After successfully sign up, agent has to add/open/join to above mentioned sellers/shops at jalpans.com from their panel and earns money as a commission on every sell of their shops, up to life time. 
				</p>
				<p class="about-text text-justify">
					3) Buyer/Customer-Buyer can easily purchase above mentioned products by their area pin code & buy products from that local shop which you know better. Therefore no chance to fraudulence with buyer at all w.r.t price, quality & home/on shop delivery. We’re dedicated to providing you the very best of above mentioned products from your locality as well as famous fast food stores and quick service
restaurant (QSR). 
				</p>
				<p class="about-text text-justify">
				We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions, comments and queries, please don't hesitate to contact us.
				</p>
				<p class="about-text text-justify">
					Sincerely,<br/>
					
					
www.jalpans.com<br/>
(Founded on 02/02/2020) 
				</p>
				<div class="row">
				    <div class="col-md-4">
				       <div class="certificate"> <img src="<?php $domain?>assets/logo-msme.jpg"/></div>
				    </div>
				     <div class="col-md-4">
				       <div class="certificate"> <img src="<?php $domain?>assets/fssai-central.jpg"/> </div>
				    </div>
				     <div class="col-md-4">
				        <div class="certificate"> <img src="<?php $domain?>assets/gst-logo.png"/> </div>
				    </div>
				</div>
			</div>
		</div>
		<div class="row mt-20">
			<div class="col-md-4"></div>
			<div class="col-md-2">
				<button class="custombtn roundbtn colorprimary btnmax-width">Read more</button>
			</div>
			<div class="col-md-2">
				<a href="<?php echo $domain; ?>contact-us"> <button class="custombtn roundbtn btnmax-width">Contact us</button></a>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</section> 

<section class="Downloadcont">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="">Download Jalpans.com APP for mobile </div> 
            </div>
            <div class="col-md-4 "> 
                <div class="btndownlod"><a download href="<?php echo $domain ?>/assets/jalpansdotcom.apk"> <img style="height: 50px;" src="<?php echo $domain ?>/assets/download_apk_img.jpg"/></a></div>
            </div>
        </div>
    </div>
</section>


<section class="listedShop bg-light-dark">
	<div class="container">
		<div class="header-title"> Listed Shop  </div>
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<div class="search-shop">
					 <form action="<?php echo $domain ?>search/">
						<div class="search-box">
 							<input type="text" class="form-control input-lg" name="search" id="shopSearch"  placeholder="Shop Name/Pincode">
 							<button class="shopbtn "><i class="fa fa-search"></i> Search</button>
 						</div>
					</form>
				</div>
			</div>

			<?php 
			if($has_shopkeeper != "error"){
			    
			    $break = 0;
				for ($i=0; $i < count($has_shopkeeper) ; $i++) { 
                  
                  $image = $vendorimages."shopkeeper.jpg";
                  if($has_shopkeeper[$i]['image'] != ""){  
                      $image = $vendorimages.$has_shopkeeper[$i]['image'];
                  }
                  $redirectUrl = $domain."products/".strtolower($has_shopkeeper[$i]['username'])."/".$has_shopkeeper[$i]['shopcode']."/?pincode=".$has_shopkeeper[$i]['pincode'];
			?>
			<div class="col-md-3 shopinfo">
				<div class="single-shop">
					<div class="row">								
						<div class="col-md-12">
							<div class="shop-img ">
						 		<img src="<?php echo $image; ?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="shop-details">
						 		<div class="shopname"><?php echo ucwords(strtolower($has_shopkeeper[$i]['shopname'])); ?></div>
						 		<div class="shopaddress">
						 			<i class="fa fa-home"></i>
						 			<span title="<?php echo $has_shopkeeper[$i]['address']; ?>"><?php echo substr($has_shopkeeper[$i]['address'], 0, 22); ?></span>
						 		</div>
						 		<div class="shopaddress">
						 			<i class="fa fa-map-marker"></i>
						 			<span>&nbsp;<?php echo $has_shopkeeper[$i]['pincode']; ?></span>
						 		</div>
						 		<div class="shopaddress">
						 			<i class="fa fa-clock-o"></i>
						 			<?php 
						 			if($has_shopkeeper[$i]['open_time'] != ""){
						 			?>
						 			<span>&nbsp;<?php echo date('h:i A', strtotime($has_shopkeeper[$i]['open_time'])); ?>  -  <?php echo date('h:i A', strtotime($has_shopkeeper[$i]['close_time'])) ?></span>
						 			<?php } ?>
						 		</div>
 
						 		<div class="shop-viewbtn">
						 			<a href="<?php echo $redirectUrl; ?>"><button class="roundbtn  ">View Products</button></a>
						 		</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			        if(++$break % 4 == 0){
			            $break = 0;
			            echo '<div class="clearfix"></div>';
			        }
				} 
			}
			?>	

		</div>
		<!-- <div class="text-center mt-20">
			<button class="custombtn roundbtn colorprimary ">View all shop</button>
		</div> -->
	</div>
</section>

<?php 
	$t_image = $user_asset.'slider/user.png';
?>

<!--- <section class="testimonials">
	<div class="container">
		<div class="header-title"> testimonials </div>
 		<div class="banner">
 			<div id="testimonials" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#testimonials" data-slide-to="0" class="active"></li>
			    <li data-target="#testimonials" data-slide-to="1"></li>
			    <li data-target="#testimonials" data-slide-to="2"></li>
			    <li data-target="#testimonials" data-slide-to="3"></li>
			    <li data-target="#testimonials" data-slide-to="4"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="item active">					    	
			       <div class="testimonials">
				       <div class="profile-img">
				    		<center>
				    			<img src="<?php echo $t_image; ?>">
				    			<div class="profilename">
				    				Manjeet Kumar
				    			</div>
				    			<div class="profilepos">
				    				Web Developer
				    			</div>
				    		</center>
				    	</div>
			       		<div class="quote">
			       			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       		</div>
			       </div>
			    </div>

			    
			    <div class="item">
			      <div class="testimonials">
				       	<div class="profile-img">
				    		<center>
				    			<img src="<?php echo $t_image; ?>">
				    			<div class="profilename">
				    				Manjeet Kumar
				    			</div>
				    			<div class="profilepos">
				    				Web Developer
				    			</div>
				    		</center>
				    	</div>
			       		<div class="quote">
			       			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       		</div>
			       </div>
			    </div>

			    <div class="item">
			      <div class="testimonials">
				       <div class="profile-img">
				    		<center>
				    			<img src="<?php echo $t_image; ?>">
				    			<div class="profilename">
				    				Manjeet Kumar
				    			</div>
				    			<div class="profilepos">
				    				Web Developer
				    			</div>
				    		</center>
				    	</div>
			       		<div class="quote">
			       			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       		</div>
			       </div>
			    </div>
			     <div class="item">
			      <div class="testimonials">
				       	<div class="profile-img">
				    		<center>
				    			<img src="<?php echo $t_image; ?>">
				    			<div class="profilename">
				    				Manjeet Kumar
				    			</div>
				    			<div class="profilepos">
				    				Web Developer
				    			</div>
				    		</center>
				    	</div>
			       		<div class="quote">
			       			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       		</div>
			       </div>
			    </div>
			     <div class="item">
			      <div class="testimonials">
				       <div class="profile-img">
				    		<center>
				    			<img src="<?php echo $t_image; ?>">
				    			<div class="profilename">
				    				Manjeet Kumar
				    			</div>
				    			<div class="profilepos">
				    				Web Developer
				    			</div>
				    		</center>
				    	</div>
			       		<div class="quote">
			       			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			       		</div>
			       </div>
			    </div>
			  </div> 
			</div>
 		</div>
	</div>
</section> -->


<script>
function setCookie() {
    var cname = 'jalpansvisitors';
    var cvalue = new Date();
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    
    var userdata = getCookie2();
    
    $.ajax({
        url: '<?php echo $userScript; ?>add-visitors.php',
        type: "POST",
         data: {
         	visitor_user: userdata,
         	visitor: cvalue,
         },
        success: function (data) {
            // console.log(data);
            // console.log(data);
            // console.log(data);
        }
    });
}

function getCookie2() {
  var name = 'jalpans=';
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
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

function getCookie() {
  var name = 'jalpansvisitors=';
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
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
  var visitors = getCookie();
  if (visitors != "") {
    // alert("Welcome again " + visitors);
  } 
  else {
    setCookie();
  }
}

checkCookie();
</script>

<script type="text/javascript">

	// listedShop
// shopinfo
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
  })
</script>

<?php 
include ('footer.php');
?>