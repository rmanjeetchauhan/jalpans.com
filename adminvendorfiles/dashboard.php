<?php

@session_start();

 

include('url.php');
$service_url = $apiurl."getShopkeeperProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $_SESSION['vendor']['id']
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_data = $response['error'];
$has_data = $response['message'];

// print_r($has_data);

$service_url = $apiurl."getShopkeeperAccountDetail";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $_SESSION['vendor']['id']
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_account = $response['error'];
$has_account = $response['message'];

// print_r($has_account);

$bank_name = '-';
$account_no = '-';
$ifsc_code = '-';
$branch = '-';

if(!empty($has_account)){
  $bank_name = $has_account['bank_name'];
  $account_no = $has_account['account_no'];
  $ifsc_code = $has_account['ifsc_code'];
  $branch = $has_account['branch'];
}


$agent_id = $has_data['agent_id'];


$service_url = $apiurl."shopAgentProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $agent_id
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_agent = $response['error'];
$has_agent = $response['message'];




$service_url = $apiurl."getAdminProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $agent_id
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_notice = $response['error'];
$has_notice = $response['message'];


// print_r($has_notice);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $vendorimages ?>logo.png" type="image/x-icon">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main.css">
    <title>Jalpans.com | Profile</title>

    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.main-title {
    background-color: #000;
    color: #fff;
    padding: 4px 10px;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
}
</style>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      
      <?php include ('header.php'); ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div >
            <h1> DASHBOARD
              <!-- <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addRetailers">Add <?php echo $mainText; ?></button> -->
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                  <?php
                    if(count($has_notice) > 0){
                      if(!empty($has_notice['shop_notice'])){
                  ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger"><?php echo $has_notice['shop_notice']; ?></div>
                    </div>
                  <?php
                    }
                    }
                  
                  ?>
                    
                 <div class="col-md-3">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th colspan="2" style="text-align: center;">SHOP IMAGE</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                  <?php 
                                    $image = $vendorimages."shopkeeper.jpg";
                                    if($has_data != 'error'){
                                      if($has_data['image'] != ""){  
                                          $image = $vendorimages.$has_data['image'];
                                      }
                                    }
                                  ?>
                                  <div class="img-cont" > <!-- data-toggle="modal" data-target="#modalViewShopImage" -->
                                      <img style="width: 100%"  src="<?php  echo $image; ?>">
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">
                                  <label class="switch">
                                    <input type="checkbox" id="storeOnOff" name="storeOnOff" value="1" <?php  if($has_data['enabled'] == 1){ echo "checked"; } ?>>
                                    <span class="slider round"></span>
                                  </label>
                                  <div class="shopstatus" id="shopstatus">
                                     <?php  
                                      if($has_data['enabled'] == 1){ 
                                        echo "Shop Open"; 
                                      }
                                      else{
                                        echo "Shop Closed"; 
                                      } 
                                    ?>
                                  </div>
                                </th>
                                <th class="text-center">
                                  <label class="switch">
                                    <input type="checkbox" id="homeDeloveryOnOff" name="homeDeloveryOnOff" value="1" <?php  if($has_data['home_delivery'] == 1){ echo "checked"; } ?>>
                                    <span class="slider round"></span>
                                  </label>
                                  <div class="homeDeloverystatus" id="homeDeloverystatus">
                                     <?php  
                                      if($has_data['home_delivery'] == 1){ 
                                        echo "Home Delivery Open"; 
                                      }
                                      else{
                                        echo "Home Delivery Closed"; 
                                      } 
                                    ?>
                                  </div>
                                </th>
                            </tr>
                        </table>
                    </div>
                 </div>
                 <div class="col-md-9">
                    <div class="table-responsive">
                      <table class="table table-hover table-striped">
                          
                              <tr>
                                  <!-- <th>#</th> -->
                                  <th>NAME</th>
                                  <th>CONTACT</th>
                                  <th>EMAIL</th>
                                  <!-- <th>ADDRESS</th> -->
                                  <th>PINCODE</th>
                                  <th>MIN. AMT FOR HOME DELIVERY</th>
                                  <th>JOIN DATE</th>
                                  <th>STATUS</th>
                                  <!-- <th>ACTION</th> -->
                              </tr>
                           
                              <?php

                              if($has_data != 'error'){
                                   $backcolor = "danger";
                                    $textshow = "Deactive";
                                    if($has_data['status']  == 1){
                                      $backcolor = "success";
                                      $textshow = "Active";
                                    }

                              ?>

                              <tr class="<?php echo $backcolor; ?>">
                                  <!-- <th><?php echo ++$count; ?></th> -->
                                  <td> <?php echo $has_data['name']; ?> </td>
                                  <td> <?php echo $has_data['phone']; ?> </td>
                                  <td> <?php echo $has_data['email']; ?> </td>
                                  <!-- <td><?php echo $has_data['address']; ?></td> -->
                                  <td><?php echo $has_data['pincode']; ?></td>
                                  <td>₹ <?php echo $has_data['min_order_amount']; ?></td>
                                  <td><?php echo $has_data['creation_date']; ?></td>
                                  <td><b><?php echo $textshow ?></b></td>
                              </tr>
                              <tr>
                                <th colspan="2">Shop Name</th>
                                <th colspan="5">Shop Address</th>
                              </tr>
                              <tr>
                                <td colspan="2"> <?php echo $has_data['shopname']; ?></td>
                                <td colspan="5"> <?php echo $has_data['address']; ?></td>
                              </tr>

                                <tr  >
                                  <th colspan="3">BANK NAME</th>
                                  <th colspan="2"> ACCOUNT NUMBER</th>
                                  <th colspan="2"> IFSC CODE</th>
                              </tr>
                             
                              <tr  >
                                  <td colspan="3"> <?php echo $bank_name; ?> </td>
                                  <td colspan="2"> <?php echo $account_no; ?> </td>
                                  <td colspan="2"> <?php echo $ifsc_code; ?> </td>
                              </tr>
                               <tr >
                                  <th colspan="2"> BRANCH : </th>
                                  <td colspan="5"> <?php echo $branch; ?> </td>
                              </tr>
                              <tr >
                                  <th colspan="2"> SHOP OPEN TIME : </th>
                                  <td colspan="5"> <?php 
                                  if(!empty($has_data['open_time'])){
                                    echo date('h:i:A', strtotime($has_data['open_time']))." - ".date('h:i:A', strtotime($has_data['close_time']));
                                  } 
                                  ?> </td>
                              </tr>



                              <?php if($has_data['status']  != 1){ ?>

                                   <tr>
                                      <th colspan="7"><marquee behavior="alternate"><b style="color: #b02222;">Your Account is not active now, Please contact to Admin</b></marquee></th>
                                  </tr>
                              <?php } ?>


                              <?php 
                              }
                              ?>
                           
                      </table>
                    </div>
                 </div>                 
              </div>

              <?php 
              if(count($has_agent) > 0){
               ?>
             
              <div class="main-title">AGENT PROFILE </div>
                <div class="table-responsive">
                      <table class="table table-hover table-striped">
                          
                              <tr>
                                  <!-- <th>#</th> -->
                                  <th>NAME</th>
                                  <th>CONTACT</th>
                                  <th>CONTACT 2</th>
                                  <!-- <th>EMAIL</th> -->
                                  <th>ADDRESS</th>
                                  <!-- <th>PINCODE</th> -->
                                  <!-- <th>MIN. ORDER</th> -->
                                  <th>JOIN DATE</th>
                                  <th>STATUS</th>
                                  <!-- <th>ACTION</th> -->
                              </tr>
                           
                              <?php

                              if($has_agent != 'error'){
                                   $backcolor = "danger";
                                    $textshow = "Deactive";
                                    if($has_agent['status']  == 1){
                                      $backcolor = "success";
                                      $textshow = "Active";
                                    }

                              ?>

                              <tr class="<?php echo $backcolor; ?>">
                                  <!-- <th><?php echo ++$count; ?></th> -->
                                  <td> <?php echo $has_agent['name']; ?> </td>
                                  <td> <?php echo $has_agent['phone']; ?> </td>
                                  <td> <?php echo $has_agent['phone2']; ?> </td>
                                  <!-- <td> <?php echo $has_agent['email']; ?> </td> -->
                                  <td><?php echo $has_agent['address']; ?></td>
                                  <!-- <td><?php echo $has_agent['pincode']; ?></td> -->
                                  <!-- <td>₹ <?php echo $has_agent['min_order_amount']; ?></td> -->
                                  <td><?php echo $has_agent['creation_date']; ?></td>
                                  <td><b><?php echo $textshow ?></b></td>
                              </tr>

                              <?php if($has_agent['status']  != 1){ ?>

                                   <tr>
                                      <th colspan="7"><marquee behavior="alternate"><b style="color: #b02222;">Your Account is not active now, Please contact to Admin</b></marquee></th>
                                  </tr>
                              <?php } ?>


                              <?php 
                              }
                              ?>
                           
                      </table>
                </div> 
              <?php } ?>
              <hr>
              <style type="text/css">

                .transaction-title{
                 text-align: center;
    font-size: 30px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eeeeee;
    margin-bottom: 20px;
                }
                .single-record{
                      text-align: center;
    border: 2px solid #2196f3;
    border-radius: 10px;
 

                }
                .single-record .record-name{
                  font-size: 22px;
    
                }
                .single-record .total-count{
                  font-size: 35px;
                  font-weight: bold;
                }
              </style>
              <div class="row">
                <!--<div class="col-md-12">-->
                <!--  <div class="transaction-title ">Today Order History</div>-->
                <!--</div>-->
                <!--<div class="clearfix"></div>-->
                <!-- <div class="col-md-3">-->
                <!--    <div class="single-record">-->
                <!--      <div class="total-count"> 1000 </div>-->
                <!--      <div class="record-name"> Today Order</div>-->
                <!--    </div>-->
                <!-- </div>-->
                <!--  <div class="col-md-3">-->
                <!--    <div class="single-record">-->
                <!--      <div class="total-count"> 800 </div>-->
                <!--      <div class="record-name"> Pending Order</div>-->
                <!--    </div>-->
                <!-- </div>-->
                 <!--  <div class="col-md-3">
                    <div class="single-record">
                      <div class="total-count"> </div>
                      <div class="record-name"> Today Order</div>
                    </div>
                 </div> -->
              </div>             
            </div>
          </div>          
        </div>        
      </div>
      
      <div id="modalViewShopImage" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
               <img src="<?php echo $image; ?>" style="width: 100%; max-height: 500px;"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>

       
    </div>
    <!-- Javascripts-->
    <script src="<?php echo $vendorAssets; ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/plugins/pace.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/main.js"></script>

      <script type="text/javascript">

        $('#storeOnOff').change(function(){
          // alert('helllo');
            var chechData  = 0; 
            $('#shopstatus').html('Shop Closed');
            if($(this).prop("checked") == true){
              chechData  = 1; 
              $('#shopstatus').html('Shop Open');
              // return true;
            }
            // alert(chechData);

            $.ajax({
                type: 'post',
                url: "<?php echo $vendorScript; ?>change-shop-action.php",
                data: {
                  action : chechData,
                  id : '<?php echo $has_data['id'] ?>'
                },
                success: function (response) {

                  // console.log(response);
                  // if(response == "success"){
                  //   $("#messgeOtp").html(' Otp match success, Login successful, wait ...');
                  //   $("#messgeOtp").show();
                  //   $("#messgeOtp").addClass(' alert alert-success');
                  // }
                  // else if(response == "error"){
                  //   $("#spanMessage").html("Enter a valid Sponsor ID and Password ...");
                  //   $("#divMessage1").show();
                  // }
                }
            });
        });
        
        
        $('#homeDeloveryOnOff').change(function(){
          // alert('helllo');
            var chechData  = 0; 
            $('#homeDeloverystatus').html('Home Delivery Closed');
            if($(this).prop("checked") == true){
              chechData  = 1; 
              $('#homeDeloverystatus').html('Home Delivery Open');
              // return true;
            }
            // alert(chechData);

            $.ajax({
                type: 'post',
                url: "<?php echo $vendorScript; ?>change-home-delivery-action.php",
                data: {
                  action : chechData,
                  id : '<?php echo $has_data['id'] ?>'
                },
                success: function (response) {

                  // console.log(response);
                  // if(response == "success"){
                  //   $("#messgeOtp").html(' Otp match success, Login successful, wait ...');
                  //   $("#messgeOtp").show();
                  //   $("#messgeOtp").addClass(' alert alert-success');
                  // }
                  // else if(response == "error"){
                  //   $("#spanMessage").html("Enter a valid Sponsor ID and Password ...");
                  //   $("#divMessage1").show();
                  // }
                }
            });
        });



        
      </script>
  </body>
</html>