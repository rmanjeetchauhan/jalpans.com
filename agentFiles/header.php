<?php 

@session_start();

if($_SESSION['shop-agent']['username'] == ""){
    header('Location:'.$shopAgentRedirect);
}

// print_r($_SESSION);

$pgurl = trim($url->segment(2));


?>

<header class="main-header hidden-print">
  <a class="logo" href="<?php echo $shopAgentRedirect ?>"> Jalpans.com </a>
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu">
      <ul class="top-nav">
        <li> <div id="google_translate_element"></div> </li>&nbsp;&nbsp;
        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu">
            <!-- <li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li> -->
            <li><a href="<?php echo $shopAgentRedirect ?>logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Side-Nav-->

<?php
$pimg =  $vendorimages.'vendorimg.png';
// if($_SESSION['shop-agent']['photo'] != ''){
//   $pimg =  $domain.'assets/images/'.$_SESSION['shop-agent']['photo'];
// }
?>
<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img class="img-circle" src="<?php echo $pimg; ?>" alt="User Image"></div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['shop-agent']['name']; ?></p>
        <p class="designation">+91-<?php echo $_SESSION['shop-agent']['phone']; ?></p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">

       <li class="<?php if($pgurl == "dashboard") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect; ?>dashboard"><i class="fa fa-caret-right"></i><span>Dashboard</span></a></li> 

       <li class="<?php if($pgurl == "shopkeepers") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>shopkeepers"><i class="fa fa-caret-right"></i><span>Shopkeeper</span></a></li>


       <li class="<?php if($pgurl == "wallet-history") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>wallet-history"><i class="fa fa-caret-right"></i><span>Wallet History</span></a></li>


      <li class="<?php if($pgurl == "bank-account") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>bank-account"><i class="fa fa-caret-right"></i><span>Bank Account </span></a></li> 
      
       
       <!-- <li class="<?php if($pgurl == "add-shopkeeper") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>add-shopkeeper"><i class="fa fa-caret-right"></i><span>Add Shopkeeper</span></a></li> -->


        <!-- <li class="<?php if($pgurl == "orders") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>orders"><i class="fa fa-caret-right"></i><span>All Orders</span></a></li>
       
       <li class="<?php if($pgurl == "pending-orders") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>pending-orders"><i class="fa fa-caret-right"></i><span>Pending Orders</span></a></li>

       <li class="<?php if($pgurl == "delivered-orders") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>delivered-orders"><i class="fa fa-caret-right"></i><span>Delivered Orders</span></a></li>

        <li class="<?php if($pgurl == "add-shopkeepers") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>add-shopkeepers"><i class="fa fa-caret-right"></i><span>Delivery Boy</span></a></li>


       

      

       <li class="<?php if($pgurl == "sold-amount-history") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>sold-amount-history"><i class="fa fa-caret-right"></i><span>Sold Amount History</span></a></li>
 -->

       

<!-- 
       <li class="<?php if($pgurl == "settings") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>settings/"><i class="fa fa-caret-right"></i><span>Settings</span></a></li> 

       <li class="<?php if($pgurl == "products") { echo "active"; } ?>"><a href="<?php echo $shopAgentRedirect?>products"><i class="fa fa-caret-right"></i><span>Products</span></a></li> 
       
     
   -->

      
      <li><a href="<?php echo $shopAgentRedirect ?>logout"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
       
    </ul>
  </section>
</aside>

<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
  }
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>