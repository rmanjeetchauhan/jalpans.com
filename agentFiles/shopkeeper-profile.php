<?php

@session_start();

 

$shopcode = $url->segment(4);

include('url.php');
$service_url = $apiurl."getShopkeeperProfileByShopCode";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "shopcode" => $shopcode
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
  "id" => $has_data ['id']
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


$service_url = $apiurl."getShopkeeperBankAccount";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $has_data ['id']
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_account_req = $response['error'];
$has_account_req = $response['message'];


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $vendorimages ?>logo.png" type="image/x-icon">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main4.css">
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

.shopstatus{

}

.main-title{
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
                 <div class="col-md-3">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th style="text-align: center;">SHOP IMAGE</th>
                            </tr>
                            <tr>
                                <td>
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
                            <!-- <tr>
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
                            </tr> -->
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
                                  <th>MIN. ORDER</th>
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
                                  <td><?php echo $has_data['min_order_amount']; ?></td>
                                  <td><?php echo $has_data['creation_date']; ?></td>
                                  <td><b><?php echo $textshow ?></b></td>
                              </tr>
                              <tr>
                                <th colspan="3">Shop Name</th>
                                <th colspan="4">Shop Address</th>
                              </tr>
                              <tr>
                                <td colspan="3"> <?php echo $has_data['shopname']; ?></td>
                                <td colspan="4"> <?php echo $has_data['address']; ?></td>
                              </tr>

                              <!--   <tr  >
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
                                  <th> BRANCH : </th>
                                  <td colspan="6"> <?php echo $branch; ?> </td>
                              </tr> -->

                              <?php 
                              }
                              ?>
                           
                      </table>
                    </div>
                 </div>                 
              </div>
             <!--  <hr/>
              <div class="main-title">REQUEST TO CHANGE BANK ACCOUNT </div>
              <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>BANK NAME</th>
                        <th>ACCOUNT NUMBER</th>
                        <th>IFSC CODE</th>
                        <th>BRANCH ADDRESS</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                      if(count($has_account_req) > 0){
                        for ($i=0; $i < count($has_account_req); $i++) { 
                          $class = 'warning';
                          $sText = 'Pending';
                          if($has_account_req[$i]['status'] == 1){
                            $class = 'info';
                            $sText = 'Active';
                          }
                          if($has_account_req[$i]['status'] == 2){
                            $class = 'danger';
                            $sText = 'Rejected';
                          }
                      ?>
                        <tr class="<?php echo $class; ?>">
                          <td><?php echo $has_account_req[$i]['bank_name'] ?></td>
                          <td><?php echo $has_account_req[$i]['account_no'] ?></td>
                          <td><?php echo $has_account_req[$i]['ifsc_code'] ?></td>
                          <td><?php echo $has_account_req[$i]['branch'] ?></td>
                          <td><?php echo $sText; ?></td>
                          <td> <button 
                              data-toggle="modal" 
                              data-id="<?php echo $has_account_req[$i]['id']; ?>"
                              data-target="#modalAccountAction" 
                              class="btn btn-warning btn-sm"
                              onclick="$('#txtactionid').val($(this).attr('data-id'));" 
                              >ACTION</button></td>
                        </tr>
                      <?php
                        }
                      }
                      ?>
                      
                    </tbody>
                  </table>
                </div> -->
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


      <div id="modalAccountAction" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ACCOUNT  STATUS</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="formAccountStatus" id="formAccountStatus">
                <input type="hidden" class="form-control" id="txtuserid" name="txtuserid" value="<?php echo $has_data ['id']; ?>">
                <input type="hidden" class="form-control" id="txtactionid" name="txtactionid">
                 <div class="form-group" >
                  <label for="email">ACTION:</label>
                  <select class="form-control" id="txtactiontype" name="txtactiontype" required>
                    <option value="">SELECT BANK ACCOUNT STATUS</option>
                    <option value="1">ACCEPT REQUEST</option>
                    <option value="2">REJECT REQUEST</option>
                    <option value="0">DELETE PARMANENT</option>
                  </select>
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
                <div id="showmessage" name="showmessage"></div>
              </form>
            </div>
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


         $('#formAccountStatus').on('submit', function(e){       
            e.preventDefault();

            $('#showmessage').removeClass(' alert alert-info');
            $('#showmessage').removeClass(' alert alert-success');
            $('#showmessage').removeClass(' alert alert-danger');
 
            $('#showmessage').html('Please wait');
            $('#showmessage').show().delay(5000).fadeOut();
            $('#showmessage').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $superAdminScript;?>bank-account-action.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#showmessage').removeClass(' alert alert-info');
                    $('#showmessage').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#showmessage').html('Successfully changed');
                        $('#showmessage').show().delay(5000).fadeOut();
                        $('#showmessage').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                     
                    $('#showmessage').html('Error to chnge shopkeeper bank account status, retry');
                    $('#showmessage').show().delay(5000).fadeOut();
                    $('#showmessage').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });
        
      </script>
  </body>
</html>