<?php
@session_start();
$_SESSION['delivery-boy'] = [];

 
include('url.php');
header('Location:'.$deliveryBoyRedirect);

?>