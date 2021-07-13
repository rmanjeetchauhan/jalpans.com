<?php
@session_start();
$_SESSION['vendor'] = [];

 
include('url.php');
header('Location:'.$vendorRedirect);

?>