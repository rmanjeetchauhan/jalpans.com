<?php 



@session_start();



if($_SESSION['superadmin']['email'] == ""){

    header('Location:'.$superAdminRedirect);

}



$pgurl = trim($url->segment(2));

 



?>



<header class="main-header hidden-print"><a class="logo" href="#"> JALPANS.COM   </a>

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

            <li><a href="<?php echo $superAdminRedirect ?>logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>

          </ul>

        </li>

      </ul>

    </div>

  </nav>

</header>

<!-- Side-Nav-->

<aside class="main-sidebar hidden-print">

  <section class="sidebar">

    <div class="user-panel">

      <div class="pull-left image"><img class="img-circle" src="<?php echo $vendorAssets ?>images/superadmin.png" alt="User Image"></div>

      <div class="pull-left info">

        <p>SUPER ADMIN</p>

        <p class="designation">Jalpans.com</p>

      </div>

    </div>

    <!-- Sidebar Menu-->

    <ul class="sidebar-menu">



      <!-- <li class="<?php if($pgurl == "users") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>users"><i class="fa fa-users"></i><span>USERS</span></a></li> -->



      <li class="<?php if($pgurl == "shop-agent") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>shop-agent/"><i class="fa fa-caret-right"></i><span>Shop Agent</span></a></li>



      <li class="<?php if($pgurl == "shopkeepers") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>shopkeepers/"><i class="fa fa-caret-right"></i><span>Shopkeepers</span></a></li>

      <li class="<?php if($pgurl == "placed-order") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>placed-order/"><i class="fa fa-caret-right"></i><span>Placed Order</span></a></li>

    <li class="<?php if($pgurl == "cancelled-order") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>cancelled-order/"><i class="fa fa-caret-right"></i><span>Calcelled Order</span></a></li>


      <li class="<?php if($pgurl == "sold-amount-history") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>sold-amount-history/"><i class="fa fa-caret-right"></i><span>Sold Amount History</span></a></li>



      <li class="<?php if($pgurl == "bank-account-request") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>bank-account-request/"><i class="fa fa-caret-right"></i><span>Shop Bank Account Request</span></a></li>



      <li class="<?php if($pgurl == "agent-bank-account-request") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>agent-bank-account-request/"><i class="fa fa-caret-right"></i><span>Agent Bank Account Request</span></a></li>



      <li class="<?php if($pgurl == "wallet-history") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>wallet-history/"><i class="fa fa-caret-right"></i><span>Transaction Wallet History</span></a></li>
      <li class="<?php if($pgurl == "social-media") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>social-media/"><i class="fa fa-caret-right"></i><span>Social Media</span></a></li>



      <!-- <li class="<?php if($pgurl == "gst-wallet-history") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>gst-wallet-history/"><i class="fa fa-caret-right"></i><span>GST Wallet History</span></a></li> -->



       <li class="<?php if($pgurl == "other-settings") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>other-settings/"><i class="fa fa-caret-right"></i><span>Other Settings</span></a></li>



      <li class="<?php if($pgurl == "change-password") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>change-password/"><i class="fa fa-caret-right"></i><span>Change Password</span></a></li>



       

<!-- 

      <li class="<?php if($pgurl == "users") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>users"><i class="fa fa-caret-right"></i><span>USERS</span></a></li>



      <li class="<?php if($pgurl == "inquiry") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>inquiry"><i class="fa fa-caret-right"></i><span>INQUIRIES</span></a></li>



      <li class="<?php if($pgurl == "custom-package") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>custom-package"><i class="fa fa-caret-right"></i><span>CUSTOM ENQUIRE</span></a></li>



      <li class="<?php if($pgurl == "sales") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>sales"><i class="fa fa-caret-right"></i><span>SALES</span></a></li>



      <li class="<?php if($pgurl == "destination") { echo "active"; } ?>"><a href="<?php echo $superAdminRedirect?>destination"><i class="fa fa-caret-right"></i><span>DESTINATION</span></a></li> -->



      



      <li><a href="<?php echo $superAdminRedirect ?>logout"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>

       

    </ul>

  </section>

</aside>



<script type="text/javascript">

  function googleTranslateElementInit() {

    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');

  }

  </script>



  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>