<?php
 
	include 'urlstructure.php';
	include 'url.php';

	$url = new Urlstructure('/');
	$url->segment(1);

	if(!$url->segment(1))
		// include('usrview/index.php');
		include('userviewfiles/index.php');
	else{
		$page = $url->segment(1);
		switch($page){
 
			case 'search' :
				include('userviewfiles/search.php');
			break;

			case 'products' :
				include('userviewfiles/products.php');
			break;
			

			case 'checkout' :
				include('userviewfiles/checkout.php');
			break;

			case 'placeorder' :
				include('userviewfiles/placeorder.php');
			break;

			case 'product-details' :
				include('userviewfiles/product-details.php');
			break;

			case 'payment' :
				include('PaytmKit/TxnTest.php');
			break;

			case 'redirect-payment' :
				include('PaytmKit/pgRedirect.php');
			break;

			case 'payment-success' :
				include('userviewfiles/payment-success.php');
			break;
			
			case 'fail-transaction' :
				include('userviewfiles/payment-fail.php');
			break;
			
			

			case 'success-payment' :
				include('userviewfiles/success-payment.php');
			break;

			case 'order-success' :
				include('userviewfiles/order-success.php');
			break;

			case 'dashboard' :
				include('userviewfiles/user-dashboard.php');
			break;

			case 'track-order' :
				include('userviewfiles/track-order.php');
			break;

			case 'contact-us' :
				include('userviewfiles/contact-us.php');
			break;

			case 'privacy-policy' :
				include('userviewfiles/privacy-policy.php');
			break;

			case 'refund-policy' :
				include('userviewfiles/refund-policy.php');
			break;
			
			case 'terms&conditions' :
				include('userviewfiles/terms-conditions.php');
			break;
			
			case 'shopkeeper-payout' :
				include('paytmPayout/filepayout-success.php');
			break;

 
			// case 'logout' :
			// 	include('usrview/logout.php');
			// break;

			// ===== Url For Hotel Administrator ====

			case 'shopkeeper' :
				 
	        	$subpage = $url->segment(2);
	        	
	            switch($subpage){

	            	case 'dashboard':
	            		include('adminvendorfiles/dashboard.php');
	                break;

	                case 'orders':
	                   include('adminvendorfiles/user-placed-order.php');
	                break;

	                case 'pending-orders':
	                   include('adminvendorfiles/user-placed-order.php');
	                break;

	                case 'delivered-orders':
	                   include('adminvendorfiles/user-placed-order.php');
	                break; 

	                case 'delivery-boy':
	                   include('adminvendorfiles/delivery-boy.php');
	                break;

	                case 'bank-account':
	                   include('adminvendorfiles/bank-account-detail.php');
	                break;

	                case 'products':
	                   include('adminvendorfiles/products.php');
	                break;
  
	                case 'sold-amount-history':
	                   include('adminvendorfiles/sold-amount-history.php');
	                break; 

	                case 'wallet-history':
	                   include('adminvendorfiles/wallet-history.php');
	                break; 

	                case 'settings':
	                   include('adminvendorfiles/edit-shopkeeper-profile.php');
	                break;

	                case 'shop-details':
	                   include('adminvendorfiles/edit-shopkeeper-profile.php');
	                break;
	                

	                case 'retailer':
	                   include('adminvendorfiles/sub-distributors.php');
	                break;

	                case 'login':
	                   include('adminvendorfiles/login.php');
	                break;

	                case 'signup':
	                   include('adminvendorfiles/signup.php');
	                break;

	                case 'logout' :
						include('adminvendorfiles/logout.php');
					break;

	                default :
						include('adminvendorfiles/login.php');
					break;
	            }		         
	        break;

	        // ===== Url For Hotel Administrator End ====


	        // ===== Url For Hotel Administrator ====

			case 'delivery-boy' :
				 
	        	$subpage = $url->segment(2);
	        	
	            switch($subpage){

	            	case 'dashboard':
	            		include('deliveryBoyFiles/dashboard.php');
	                break;

	                // case 'orders':
	                //    include('adminvendorfiles/user-placed-order.php');
	                // break;

	                // case 'pending-orders':
	                //    include('adminvendorfiles/user-placed-order.php');
	                // break;

	                // case 'delivered-orders':
	                //    include('adminvendorfiles/user-placed-order.php');
	                // break; 

	                // case 'delivery-boy':
	                //    include('adminvendorfiles/delivery-boy.php');
	                // break;

	                // case 'bank-account':
	                //    include('adminvendorfiles/bank-account-detail.php');
	                // break;

	                // case 'products':
	                //    include('adminvendorfiles/products.php');
	                // break;
  
	                // case 'sold-amount-history':
	                //    include('adminvendorfiles/sold-amount-history.php');
	                // break; 

	                // case 'wallet-history':
	                //    include('adminvendorfiles/wallet-history.php');
	                // break; 

	                // case 'settings':
	                //    include('adminvendorfiles/edit-shopkeeper-profile.php');
	                // break;

	                // case 'shop-details':
	                //    include('adminvendorfiles/edit-shopkeeper-profile.php');
	                // break;
	                

	                // case 'retailer':
	                //    include('adminvendorfiles/sub-distributors.php');
	                // break;

	                case 'login':
	                   include('deliveryBoyFiles/login.php');
	                break;

	                // case 'signup':
	                //    include('adminvendorfiles/signup.php');
	                // break;

	                case 'logout' :
						include('deliveryBoyFiles/logout.php');
					break;

	                default :
						include('deliveryBoyFiles/login.php');
					break;
	            }		         
	        break;

	        // ===== Url For Hotel Administrator End ====





	        // ===== Url For Hotel Administrator ====

			case 'shop-agent' :
				 
	        	$subpage = $url->segment(2);
	        	
	            switch($subpage){

	            	case 'dashboard':
	            		include('agentFiles/dashboard.php');
	                break;

	                case 'shopkeepers':
	                   include('agentFiles/shopkeepers.php');
	                break;

	                case 'shopkeeper-profile':
	                   include('agentFiles/shopkeeper-profile.php');
	                break;

	                case 'add-shopkeeper':
	            		include('agentFiles/add-shopkeepers.php');
	                break;

	                case 'wallet-history':
	                   include('agentFiles/wallet-history.php');
	                break; 
	                
	                 case 'bank-account':
	                   include('agentFiles/bank-account-detail.php');
	                break;

	                case 'login':
	                   include('agentFiles/login.php');
	                break;

	                case 'signup':
	                   include('agentFiles/shop-agent-signup.php');
	                break;

	                case 'logout' :
						include('agentFiles/logout.php');
					break;

	                default :
						include('agentFiles/login.php');
					break;
	            }		         
	        break;

	        // ===== Url For Hotel Administrator End ====
 	
			// ===== Url For Admin Panel ====

			case 'admin' :
				 
	        	$subpage = $url->segment(2);
	            switch($subpage){

	            	case 'shopkeepers':
	                   include('SuperAdminManagement/shopkeepers.php');
	                break;

	                case 'profile':
	                   include('SuperAdminManagement/shopkeeper-profile.php');
	                break;

	                case 'edit-profile':
	                   include('SuperAdminManagement/edit-shopkeeper-profile.php');
	                break;

	                case 'shop-sold-amount-history':
	                   include('SuperAdminManagement/shop-sold-amount-history.php');
	                break; 

	                case 'sold-amount-history':
	                   include('SuperAdminManagement/sold-amount-history.php');
	                break; 

	                case 'bank-account-request':
	                   include('SuperAdminManagement/bank-account-request.php');
	                break; 

	                case 'agent-bank-account-request':
	                   include('SuperAdminManagement/agent-bank-account-request.php');
	                break; 


	                case 'wallet-history':
	                   include('SuperAdminManagement/wallet-history.php');
	                break;
	                
	                case 'social-media':
	                   include('SuperAdminManagement/social-media.php');
	                break;
	                
	                case 'shop-wallet-history':
	                   include('SuperAdminManagement/shop-wallet-history.php');
	                break;

	                case 'agent-wallet-history':
	                   include('SuperAdminManagement/agent-wallet-history.php');
	                break;

	                

	                case 'gst-wallet-history':
	                   include('SuperAdminManagement/gst-wallet-history.php');
	                break;


	                case 'placed-order':
	                   include('SuperAdminManagement/user-placed-order.php');
	                break;
	                
	                case 'cancelled-order':
	                   include('SuperAdminManagement/user-cancelled-order.php');
	                break;

	                case 'login':
	                   include('SuperAdminManagement/login.php');
	                break;

	                case 'users':
	                   include('SuperAdminManagement/users.php');
	                break;

	                case 'shop-agent':
	                   include('SuperAdminManagement/shop-agent.php');
	                break;

	                case 'change-password':
	                   include('SuperAdminManagement/change-password.php');
	                break;

	                case 'other-settings':
	                   include('SuperAdminManagement/other-settings.php');
	                break;

	               
	    			default :
						include('SuperAdminManagement/login.php');
					break;
	            }
		         
	        break;

			default :
				// include('SuperAdminManagement/error.php');
				echo "Not Fount";
			break;
		}
	}

	
?>