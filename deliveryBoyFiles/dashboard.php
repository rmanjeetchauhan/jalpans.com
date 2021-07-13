<?php

@session_start();

 

include('url.php');
$service_url = $apiurl."deliveryBoyProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $_SESSION['delivery-boy']['id']
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


$service_url = $apiurl."getDeliveryBoyOrders";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "delivery_boy_id" => $_SESSION['delivery-boy']['id'],
  "status" => 0
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_orders = $response['error'];
$has_orders = $response['message']; 

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $vendorimages ?>logo.png" type="image/x-icon">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main3.css">
    <title>Jalpans.com | Profile</title>

    <style>
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
                 
                 <div class="col-md-12">
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
                                  <td> <?php echo $has_data['phone2']; ?> </td>
                                  <!-- <td> <?php echo $has_data['email']; ?> </td> -->
                                  <td><?php echo $has_data['address']; ?></td>
                                  <!-- <td><?php echo $has_data['pincode']; ?></td> -->
                                  <!-- <td>₹ <?php echo $has_data['min_order_amount']; ?></td> -->
                                  <td><?php echo $has_data['creation_date']; ?></td>
                                  <td><b><?php echo $textshow ?></b></td>
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

                    <div class="main-title">TODAY ORDER</div>
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Sl No.</th>
                              <th>Order Id</th>
                              <th>Contact No.</th>
                              <th>Date</th>
                              <th>Deliver</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if(count($has_orders) > 0){
                              $count = 0;
                              for ($i=0; $i < count($has_orders); $i++) { 
                            ?>
                              <tr>
                                <td><?php echo ++$count; ?></td>
                                <td><?php echo $has_orders[$i]['order_id'] ?></td>
                                <td><?php echo $has_orders[$i]['phone'] ?></td>
                                <td><?php echo $has_orders[$i]['creation_date'] ?></td>
                                <td><button 
                                class="btn btn-sm btn-primary" 
                                data-order="<?php echo $has_orders[$i]['order_id']; ?>" 
                                              data-toggle="modal" 
                                              data-target="#modalChangeStatus" 
                                              onclick="$('#txtorderid').val($(this).attr('data-order'))" >
                                                Deliver Order
                                              </button></td>
                              </tr>
                            <?php
                              } 
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                 </div>                 
              </div> 
                            
            </div>
          </div>          
        </div>        
      </div>

 <div id="modalChangeStatus" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ORDER DELIVERY</h4>
      </div>
      <div class="modal-body">
        <form action="#" name="formDeliveryStatus" id="formDeliveryStatus">
          <input type="hidden" class="form-control" id="txtorderid" name="txtorderid">
          <input type="hidden" class="form-control" id="txtactionbty" name="txtactionbty" value="delivery_boy">
           <div class="form-group" >
            <label for="email">DELIVERY OTP:</label>
            <input type="text" class="form-control" id="txtplaceotp" name="txtplaceotp">
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
    </div>
    <!-- Javascripts-->
    <script src="<?php echo $vendorAssets; ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/plugins/pace.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/main.js"></script>

    <script type="text/javascript"> 

     $('#formDeliveryStatus').on('submit', function(e){       
              e.preventDefault();

              $('#showmessage').removeClass(' alert alert-info');
              $('#showmessage').removeClass(' alert alert-success');
              $('#showmessage').removeClass(' alert alert-danger');


              $('#showmessage').html('Please wait');
              $('#showmessage').show().delay(5000).fadeOut();
              $('#showmessage').addClass(' alert alert-info');
              // $('#myloader').show();
              $.ajax({
                  url: '<?php echo $superAdminScript; ?>change-order-status.php',
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
                      if(data == "otp"){
                          $('#showmessage').html('You entered a wrong OTP.');
                          $('#showmessage').show().delay(5000).fadeOut();
                          $('#showmessage').addClass(' alert alert-danger');
                          return true;
                      }
                       
                      $('#showmessage').html('Error to change status, retry');
                      $('#showmessage').show().delay(5000).fadeOut();
                      $('#showmessage').addClass(' alert alert-danger');
                      // $('#myloader').hide();
                      return false;
                  }
              });
     });


    $(function(){
        $('#shopSearch').keyup(function(){
            var searchText = $(this).val();
            if(searchText == ''){
              $('.shopinfo').css('display', 'block');
            }
            else if(searchText != ""){
              searchText = searchText.trim().toLowerCase();
              $('.shopinfo').css('display', 'none');
              $('.shopinfo').each(function(){
                  var searctShop = $(this).find('.shopname').html();
                  searctShop = searctShop.trim().toLowerCase();
                  if (searctShop.indexOf(searchText) > -1) {
                    $(this).css('display', 'block');
                  }
              });
            }
        })
    })
  </script>
  </body>
</html>