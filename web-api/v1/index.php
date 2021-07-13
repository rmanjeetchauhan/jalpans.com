<?php

require_once 'DbHandler.php';

require '.././libs/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

 





function echoRespnse($status_code, $response) {



    $app = \Slim\Slim::getInstance();

    $app->config('debug', true);

    // Http response code

    $app->status($status_code);

    // setting response content type to json

    $app->contentType('application/json;charset=utf-8');

    echo json_encode($response);

}

 



$app->get('/', function() use($app) {

    $app->response->setStatus(200);

    echo "Welcome to Adventure Booking API";

});



 

$app->post('/superAdminLogin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->superAdminLogin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



 



$app->post('/signupShopkeeper', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->signupShopkeeper($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/addShopkeeperAccount', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addShopkeeperAccount($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getShopkeeperAccountDetail', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeeperAccountDetail($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getShopkeeperBankAccount', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeeperBankAccount($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/shopkeeperLogin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopkeeperLogin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getShopkeepers', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeepers($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getShopkeeperProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeeperProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/shopkeeperProfileAction', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopkeeperProfileAction($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getAdminCommission', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAdminCommission($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getUnit', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getUnit($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/addProduct', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addProduct($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/addProductAttribute', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addProductAttribute($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getProductsList', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getProductsList($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getHomeShopkeeper', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getHomeShopkeeper($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/searchShopkeeper', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->searchShopkeeper($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/VerifyPhoneAndSendOTP', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->VerifyPhoneAndSendOTP($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/resendMobileOTP', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->resendMobileOTP($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/verifySendOTP', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->verifySendOTP($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



 

$app->post('/getOrderHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getOrderHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getOrderProducts', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getOrderProducts($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/cancelOrder', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->cancelOrder($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getTrackOrder', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getTrackOrder($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



















































































































$app->post('/createDistributors', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->createDistributors($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getDistributors', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getDistributors($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});











$app->post('/signupDistributors', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->signupDistributors($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getDistributorsProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getDistributorsProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/updateDistributorProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->updateDistributorProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});























































 

//  Login a hotel Owner using Email id and Password.



$app->post('/vendorLogin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->vendorLogin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/vendorRegister', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->vendorRegister($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/vendorProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->vendorProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/updateVendorProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->updateVendorProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/createPackage', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->createPackage($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getVendorPackage', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getVendorPackage($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getVendorPackageName', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getVendorPackageName($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/editVendorPackage', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->editVendorPackage($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/deletePackageImage', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->deletePackageImage($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getBookings', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getBookings($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







 







// -======================== SUPER ADMIN ===============







$app->post('/getVendors', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getVendors($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





 $app->post('/getVendorWithPackage', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getVendorWithPackage($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});













// =================== USER ===================



 $app->post('/userLogin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->userLogin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/userRegister', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->userRegister($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/searchUserPackage', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->searchUserPackage($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getPackageDetails', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getPackageDetails($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/bookPackage', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->bookPackage($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/bookingHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->bookingHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/addCity', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addCity($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getCity', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getCity($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/editCity', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->editCity($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/addInquiry', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addInquiry($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getInquiry', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getInquiry($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/changeInquiryStatus', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->changeInquiryStatus($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getUsers', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getUsers($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getBookingSales', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getBookingSales($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/addCustomEnquireNow', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addCustomEnquireNow($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getCustomPackageEnquire', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getCustomPackageEnquire($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/changeCustomEnquirStatus', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->changeCustomEnquirStatus($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getProductDetails', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getProductDetails($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/editProductAttribute', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->editProductAttribute($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/deleteProduct', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->deleteProduct($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/productAttributeEnabledDisabled', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->productAttributeEnabledDisabled($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/deleteProductAttribute', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->deleteProductAttribute($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



 

$app->post('/shopEnabledDisabled', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopEnabledDisabled($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/homeDeliveryEnabledDisabled', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->homeDeliveryEnabledDisabled($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getUserProducts', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getUserProducts($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/addUpdateCart', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addUpdateCart($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getCartCount', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getCartCount($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getCartProducts', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getCartProducts($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/sendOtpForProceedPayment', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->sendOtpForProceedPayment($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/VerifyProceedPaymentOTP', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->VerifyProceedPaymentOTP($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});











$app->post('/placeOrder', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->placeOrder($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getPlaceOrderByAdmin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getPlaceOrderByAdmin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getCancelledOrderByAdmin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getCancelledOrderByAdmin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/removeItemFromCart', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->removeItemFromCart($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getPlaceOrderByShopkeeper', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getPlaceOrderByShopkeeper($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/updateOrderStatus', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->updateOrderStatus($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/submitUserComment', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->submitUserComment($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getUserComment', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getUserComment($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/saveShopkeeperProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->saveShopkeeperProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getSoldAmountHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getSoldAmountHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getShopkeeperProfileByShopCode', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeeperProfileByShopCode($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/shopkeeperBankAccountAction', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopkeeperBankAccountAction($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/addDeliveryBoy', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addDeliveryBoy($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getDeliveryBoyList', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getDeliveryBoyList($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/editDeliveryBoy', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->editDeliveryBoy($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/deleteDeliveryBoy', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->deleteDeliveryBoy($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/statusDeliveryBoy', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->statusDeliveryBoy($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/sendOtpToChangeMobileNo', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->sendOtpToChangeMobileNo($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/VerifyOTPChangeMobileNo', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->VerifyOTPChangeMobileNo($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/getAllSoldAmountHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAllSoldAmountHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getBankAccountRequest', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getBankAccountRequest($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/manageWallet', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->manageWallet($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getShopkeeperWalletHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeeperWalletHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/assignDeliveryBoy', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->assignDeliveryBoy($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/deliveryBoyLogin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->deliveryBoyLogin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/deliveryBoyProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->deliveryBoyProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getDeliveryBoyOrders', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getDeliveryBoyOrders($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/failPaymentHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->failPaymentHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/sendOtpVerifyShopkeeper', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->sendOtpVerifyShopkeeper($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/resetShopkeeperPassword', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->resetShopkeeperPassword($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/sendOtpVerifyDeliveryBoy', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->sendOtpVerifyDeliveryBoy($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/resetDeliveryBoyPassword', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->resetDeliveryBoyPassword($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getAdminWalletHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAdminWalletHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getGstWalletHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getGstWalletHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





// --------------------- AGENT -----------------------





$app->post('/VerifyShopAgentPhoneAndSendOTP', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->VerifyShopAgentPhoneAndSendOTP($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/verifyShopAgentSendOTP', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->verifyShopAgentSendOTP($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/addShopAgent', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addShopAgent($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getShopAgentList', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopAgentList($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/editShopAgent', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->editShopAgent($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/deleteShopAgent', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->deleteShopAgent($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/statusShopAgent', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->statusShopAgent($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/shopAgentLogin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopAgentLogin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/shopAgentProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopAgentProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getDeliveryBoyOrders', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getDeliveryBoyOrders($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/getAgentShopkeepers', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAgentShopkeepers($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/sendOtpVerifyShopAgent', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->sendOtpVerifyShopAgent($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/resetShopAgentPassword', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->resetShopAgentPassword($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getShopAgentWalletHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopAgentWalletHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/getAgentTodaySoldAmountHistory', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAgentTodaySoldAmountHistory($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





// -------------------------------------------------------------







$app->post('/verifyAdminPassword', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->verifyAdminPassword($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/changeAdminPassword', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->changeAdminPassword($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getAdminProfile', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAdminProfile($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/saveOtherSettings', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->saveOtherSettings($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getShopkeeperProfileDetails', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeeperProfileDetails($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getShopkeeperAccountDetails', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getShopkeeperAccountDetails($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/paytmShopkeeperPayOut', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->paytmShopkeeperPayOut($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->get('/_croneJob', function() use ($app) {



    // $details = $app->request()->getBody();

    // $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->_croneJob();



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->get('/paytmShopkeeperPayOutTransactionStatus', function() use ($app) {



    // $details = $app->request()->getBody();

    // $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->paytmShopkeeperPayOutTransactionStatus();    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->get('/autoCancelledOrder', function() use ($app) {



    // $details = $app->request()->getBody();

    // $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->autoCancelledOrder();    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->get('/_croneJob', function() use ($app) {



    // $details = $app->request()->getBody();

    // $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->_croneJob();

    // $output = paytmShopkeeperPayOutTransaction('JLPNSSPAY966340');



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});






$app->get('/autoCancelledOrder', function() use ($app) {



    // $details = $app->request()->getBody();

    // $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->autoCancelledOrder();    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->get('/refundStatus', function() use ($app) {

    $response = array();
    $db = new DbHandler();
    $output = $db->refundStatus();

    if ($output !== NULL) {
        $response["error"] = false;
        $response["message"] = $output;

    }else {

        $response['error'] = true;
        $response['message'] = 'error';
    }

    echoRespnse(200, $response);
});


$app->post('/shopAgentProfileWalletByAdmin', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopAgentProfileWalletByAdmin($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/shopAgentProfileForPay', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->shopAgentProfileForPay($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getAgentAccountDetails', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAgentAccountDetails($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/paytmAgentPayOut', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->paytmAgentPayOut($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/getAgentBankAccount', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAgentBankAccount($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});







$app->post('/addAgentAccount', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addAgentAccount($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/getAgentBankAccountRequest', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getAgentBankAccountRequest($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});









$app->post('/agentBankAccountAction', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->agentBankAccountAction($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/manageOrderData', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->manageOrderData($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/getOrderData', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getOrderData($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/addWebsiteVisitors', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addWebsiteVisitors($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getWebsiteVisitors', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getWebsiteVisitors($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/addSocialMedia', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->addSocialMedia($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/getSocialMedia', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->getSocialMedia($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});





$app->post('/paytmShopkeeperPayOutTransactionOrderTest', function() use ($app) {



    $details = $app->request()->getBody();

    $obj = json_decode($details);



    $response = array();

    $db = new DbHandler();

    $output = $db->paytmShopkeeperPayOutTransactionOrderTest($obj);    



    if ($output !== NULL) {

        $response["error"] = false;

        $response["message"] = $output;

    } else {

        $response['error'] = true;

        $response['message'] = 'error';

    }

    echoRespnse(200, $response);

});



$app->post('/refundOrder', function() use ($app) {

    $details = $app->request()->getBody();
    $obj = json_decode($details);

    $response = array();
    $db = new DbHandler();
    $output = $db->refundOrder($obj);    

    if ($output !== NULL) {
        $response["error"] = false;
        $response["message"] = $output;

    } else {
        $response['error'] = true;
        $response['message'] = 'error';
    }
    echoRespnse(200, $response);
});










$app->run();







?>