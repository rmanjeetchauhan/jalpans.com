 <?php 


$search = '';
if(!empty($_GET['search'])){
	$search = $_GET['search'];
}

$service_url = $apiurl."searchShopkeeper";
$curl = curl_init($service_url);
$curl_post_data = array(
	"api_key" => $api_key,
	"search" => $search
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

		 
		</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">NEAR BY SHOP</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Shop</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<div class="header-title"> Near By Shop </div>
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
				for ($i=0; $i < count($has_shopkeeper) ; $i++) { 
                  
                  $image = $vendorimages."shopkeeper.jpg";
                  if($has_shopkeeper[$i]['image'] != ""){  
                      $image = $vendorimages.$has_shopkeeper[$i]['image'];
                  }
                  $redirectUrl = $domain."products/".$has_shopkeeper[$i]['username']."/?pincode=".$has_shopkeeper[$i]['pincode'];
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
						 		<div class="shopname"><?php echo $has_shopkeeper[$i]['shopname']; ?></div>
						 		<div class="shopaddress">
						 			<i class="fa fa-home"></i>
						 			<span title="<?php echo $has_shopkeeper[$i]['address']; ?>"><?php echo substr($has_shopkeeper[$i]['address'], 0, 30); ?></span>
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
						 			<a href="<?php echo $redirectUrl; ?>"><button class="roundbtn ">View Products</button></a>
						 		</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
				} 
			}
			?>	

		</div>
		<!-- <div class="text-center mt-20">
			<button class="custombtn roundbtn colorprimary ">View all shop</button>
		</div> -->
	</div>
</section>


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