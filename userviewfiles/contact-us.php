 <?php 
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

			 .contact li{
			 	list-style: none;
			 	margin-bottom: 10px;
			 }
			  .contact li i{
			 	margin-right:  8px;
			 }
		 
		 section.listedShop {
    padding: 0px 0;
}
section.footer {
    margin-top: 0px;
}
		</style>
 <div class="pageheader">
 	<div class="pageoverlay">
 		<div class="container">
	 		<div class="col-md-9"><div class="mainmenu">CONTACT US</div> </div>
	 		<div class="col-md-3">
	 			<ul class="pagemenu">
	 				<li><a href="">Home</a> | <span>Contact us</span></li>
	 			</ul>
	 		</div>
	 	</div>
 	</div>
 </div>

<section class="listedShop">
	<div class="container">
		<div class="header-title"> CONTACT US </div>
		<div class="row">
			<div class="col-md-4">
				<ul class="contact">
					<li><i class="fa fa-home"></i>Heera House, Behind Utsav Aangan Apartment, Vill-Barheta, P.O- Laheria Saarai, Dist : Darbhanga</li>
					<li><i class="fa fa-phone"></i> +(91)-9682124122, 9571828691, 7665308240</li>
					<li><i class="fa fa-envelope-o"></i>jalpans2020@gmail.com</li>
					<li><i class="fa fa-globe"></i>https://www.jalpans.com</li>
				</ul>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-7">
				
                <div class="form-container">
                    <form id="formcontactus" name="formcontactus">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Your Name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Contact Number:</label>
                                    <input type="text" class="form-control" id="contact_no" name="contact_no">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Subject:</label>
                                    <input type="text" class="form-control" id="subject" name="subject">
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Message:</label>
                                    <textarea class="form-control" id="message" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                         
                        <button type="submit" class="btn btn-warning btn-block">Submit Request</button>
                    </form>
                </div>
			</div>
		</div>		
	</div>
	<div class="text-center mt-20">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19277.01174325537!2d85.8745911154415!3d26.10996987586088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39edb91be1eaa4bb%3A0xae413bf1012bd888!2sBarheta%2C%20Bihar!5e0!3m2!1sen!2sin!4v1595185894556!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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