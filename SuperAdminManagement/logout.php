<?php
@session_start();
$_SESSION['superadmin'] = [];

 
include('url.php');
header('Location:'.$superAdminRedirect);

?>