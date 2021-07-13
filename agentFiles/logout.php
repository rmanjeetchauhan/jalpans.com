<?php
@session_start();
$_SESSION['shop-agent'] = [];

 
include('url.php');
header('Location:'.$shopAgentRedirect);

?>