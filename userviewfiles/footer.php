<?php

$service_url = $apiurl."getWebsiteVisitors";

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
$has_no_visitors = $response['error'];
$has_visitors = $response['message']; 

// print_r($has_visitors);

?>

		<section class="footer">
			<div class="container">
				<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="footer-heading"><h3>Company Info</h3></div>
							<p>Welcome to "JALPANS.COM", your number one source for fast food, sweets, milk product,food & bevrages (Non-alcohlic). We're dedicated to providing you the very best of fast foods & bevrages ....<a href="">Read more</a></p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="footer-heading"><h3>Contact us</h3></div>
							<ul class="list-default">
								<li><i class="fa fa-home"></i>Heera House, Behind Utsav Aangan Apartment, Vill-Barheta, P.O- Laheria Saarai, Dist : Darbhanga</li>
								<li><i class="fa fa-phone"></i> +(91)-9682124122, 9571828691, 7665308240</li>
								<li><i class="fa fa-envelope-o"></i>jalpans2020@gmail.com</li>
								<li><i class="fa fa-globe"></i>https://www.jalpans.com</li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-2">
							<div class="footer-heading"><h3>Quick Link</h3></div>
							<ul class="list-default">
								<li><a href="#"><i class="fa fa-angle-right"></i>About</a></li>
								<li><a href="<?php echo $domain ?>privacy-policy"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
								<li><a href="<?php echo $domain ?>refund-policy"><i class="fa fa-angle-right"></i>Refund Policy</a></li>
								<li><a href="<?php echo $domain ?>terms&conditions"><i class="fa fa-angle-right"></i>Terms &amp; Conditions</a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="footer-heading"><h3>Follow Us</h3></div>
							<ul class="social_link">
								<li class="facebook"><a target="_blank" href="<?php echo $has_media['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
								<li class="instagram"><a target="_blank" href="<?php echo $has_media['instagram']; ?>"><i class="fa fa-instagram"></i></a></li>
								<li class="twitter"><a target="_blank" href="<?php echo $has_media['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
								<li class="linkedin"><a target="_blank" href="<?php echo $has_media['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li>
								<li class="youtube"><a target="_blank" href="<?php echo $has_media['youtube']; ?>"><i class="fa fa-youtube"></i></a></li>
							</ul>
							<div class="clearfix"></div>
							<div class="col">
                                <div class="counter">
                                  <!--<i class="fa fa-lightbulb-o fa-2x"></i>-->
                                  <h2 class="timer count-title count-number" data-to="<?php echo $has_visitors['website_visitors']; ?>" data-speed="1500"></h2>
                                  <p class="count-text ">Website Visitors</p>
                                </div>
                            </div>
						</div>
				</div>
			</div>			
		</section>
		<div id="WAButton" ></div>
		<div class="copy-right">
			<i class="fa fa-copyright"></i> 2020 <a href="">JALPANS.COM</a>. ALL RIGHTS RESERVED
		</div>
	</div>
<style>
    .counter {
    /*background-color:#f5f5f5;*/
    /*padding: 20px 0;*/
    border-radius: 5px;
}

.count-title {
    font-size: 50px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 15px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}
</style>

 
<link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
<!--Floating WhatsApp javascript-->
<script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>


<script>
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});

$(function() {
  $('#WAButton').floatingWhatsApp({
    phone: '+91 <?php echo $has_media['whatsapp']; ?>', //WhatsApp Business phone number International format-
    //Get it with Toky at https://toky.co/en/features/whatsapp.
    headerTitle: 'Chat with us on WhatsApp!', //Popup Title
    // popupMessage: 'Hello, how can we help you?', //Popup Message
    // showPopup: true, //Enables popup display
    buttonImage: '<img src="https://jalpans.com/assets/whatsapp.svg" />', //Button Image
    //headerColor: 'crimson', //Custom header color
    //backgroundColor: 'crimson', //Custom background button color
    position: "right"    
  });
});
</script>


</body> 	
</html>