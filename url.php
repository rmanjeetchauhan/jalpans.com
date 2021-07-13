<?php


$domain = "https://" . $_SERVER['SERVER_NAME']."/";

$apiurl = $domain."web-api/v1/index.php/";

$vendorRedirect = $domain."shopkeeper/";
$vendorimages = $domain."assets/images/";
$vendorScript = $domain."script/vendors/";
$vendorAssets = $domain."assets/others/";

 
$superAdminRedirect = $domain."admin/";
$superAdminScript = $domain."script/admin/";



$deliveryBoyRedirect = $domain."delivery-boy/";
$deliveryBoyScript = $domain."script/delivery-boy/";




$shopAgentRedirect = $domain."shop-agent/";
$shopAgentScript = $domain."script/shop-agent/";

$uniqueTrackAddress = "";
if(isset($_COOKIE['jalpans'])) {
    $uniqueTrackAddress = $_COOKIE['jalpans'];
}
/* ---- User Url Start ---- */

/* ---- User Url ---- */
$userRedirect = $domain;

/* ---- User Assets ---- */
$user_asset = $domain."assets/";

// $hotelRedirect = $domain."hotel-admin/";
$adminRedirect = $domain."admin/";

/* ---- user Script ---- */
$userScript = $domain."script/user/";

/* ---- User image ---- */
$profileimages = $domain."assets/profileimg/";

/* ---- Super Admin Url Start ---- */

/* ---- Hotel Admin Url ---- */


// /* ---- Hotel Admin Assets ---- */
// $hotelAssets = $domain."assets/hotel/";

// /* ---- Hotel image ---- */
// $hotelimages = $domain."assets/images/";

/* ---- Hotel Script ---- */



/* ---- Super Admin Url End ---- */
$api_key = 'bcb8a9a740d3d322bbed353c97087857';
?>