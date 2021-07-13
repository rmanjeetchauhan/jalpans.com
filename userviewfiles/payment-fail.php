<?php 
@session_start();

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

.updatecart{
  font-size: 16px;
    background-image: linear-gradient(to right, #ff0b00 , #000);
    color: #fff;
    border: 1px solid transparent;
    padding: 4px 20px;
}

.showText{
				margin-top: 20px;
    text-align: center;
    font-weight: bold;
			}

			.showText2{
				    text-align: center;
    color: #e00100;
    font-weight: bold;
    font-size: 16px;
    margin-top: 5px;
			}
			.shopdetail{
				text-align: center;
    margin-bottom: 2px;
			}
</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">Payment Fail</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Payment Fail</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<div class="container">
 				<div class="col-md-offset-3 col-md-6">
 					<div class="progresscont">
 						<div class="logoredirect text-center">
 							<a href="<?php echo $domain; ?>">
 								<img style="height: 80px;" src="<?php echo $user_asset; ?>images/logo.jpg"/>
 							</a>
 						</div>
 						<hr>
						<div class="showText2">Sorry! Your order is not confirm.</div>
						<hr/>
						<div class="shopdetail"><b>Reason : </b> <?php echo $_GET['message'] ?></div>
					    <hr/>
						<div class="showText">Thank you for connecting with us.</div><br>

						 <center> <a href="<?php echo $domain; ?>" class="updatecart ">Back To Home</a></center>
						<hr>

						<div id="showmsg"> </div>
 					</div>
 				</div>
 			</div>		 
	</div>
</section>



 

<?php 
include ('footer.php');
?>