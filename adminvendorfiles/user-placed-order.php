<?php

@session_start();

// print_r($_SESSION);

$current_page = $url->segment(2);
$orderStatus = -1;

if($current_page == 'pending-orders'){
  $orderStatus = 0;
}
if($current_page == 'delivered-orders'){
  $orderStatus = 1;
}
$shopkeeper_id = $_SESSION['vendor']['id'];

include('url.php');
$service_url = $apiurl."getPlaceOrderByShopkeeper";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "shopkeeper_id" => $shopkeeper_id,
  "status" => $orderStatus
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


$service_url = $apiurl."getDeliveryBoyList";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $shopkeeper_id
);
$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_delivery_boy = $response['error'];
$has_delivery_boy = $response['message'];

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
    <title>Jalpans.com | Place Orders</title>

    <style type="text/css">
      .maintable th{
        background-color: #51025a;
    color: #fff;
      }

      .footrtbl td{
        background-color: #7d0d0d;
    color: #ffff;
      }
    </style>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      
      <?php include ('header.php'); ?>
      <div class="content-wrapper">
        <div class="page-title">
           
          <div class="titlecont">
            <div class="row">
              <div class="col-md-9"> <h1>  ORDERS </h1> </div>
              <div class="col-md-3">                 
                 <form id="searchform">
                    <input type="text" name="search" id="search" class="form-control input-sm" placeholder="search">
                 </form>
              </div>              
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- <h3 class="card-title">Responsive Table</h3> -->
              <div class="table-responsive">
                
                    <?php


                    if(count($has_data) > 0){
                        $count = 0;
                        for ($i=0; $i < count($has_data); $i++) {

                          $cls = "btn-warning";
                          
                          if( $has_data[$i]['order']['order_status'] == 1){
                            $cls = "btn-primary";
                            $clstext = "Delivered";
                          }
                          else if( $has_data[$i]['order']['order_status'] == 2){
                            $cls = "btn-info";
                          }
                          
                         
                    ?>
                    <table class="table table-hover table-striped">
                    <tr class="maintable">
                        <th>ORDER ID</th>
                        <th>ORDER TYPE</th>
                        <th>CONTACT NO</th>
                        <th>ORDER STATUS </th>
                        <th>TOTAL AMOUNT</th>
                        <th>DATE </th>
                        <th>DELIVERY BOY </th>
                    </tr>

                    <tr class="searchorderdata" > 
                        <td> <b style="color: #7d0d0d;"> <?php echo $has_data[$i]['order']['order_id']; ?> </b> </td>
                        <td> <?php echo $has_data[$i]['order']['order_type_text']; ?> </td>
                        <td> <?php echo $has_data[$i]['order']['phone']; ?> </td>
                        <td> 

                          <?php 
                            if($has_data[$i]['order']['order_status'] == 0){
                          ?>
                            <button class="btn btn-xs <?php echo $cls; ?>" data-order="<?php echo $has_data[$i]['order']['order_id']; ?>" 
                          data-toggle="modal" data-target="#modalChangeStatus" onclick="$('#txtorderid').val($(this).attr('data-order'))" >
                              &nbsp;&nbsp;&nbsp;<?php echo $has_data[$i]['order']['order_text']; ?> &nbsp;&nbsp;&nbsp;
                            </button>

                          <?php
                            }
                            else{
                          ?>
                          <button class="btn btn-xs <?php echo $cls; ?>"></i>&nbsp;&nbsp;&nbsp;<?php echo $has_data[$i]['order']['order_text']; ?>&nbsp;&nbsp;&nbsp;</button>

                          <?php
                            }
                          ?>

                          </td>
                       
                        <td> ₹<?php echo $has_data[$i]['order']['transaction_amount'].'<div><small>(+'.$has_data[$i]['order']['commission'].'% conv charge)</small></div>'; ?> </td>
                        <td> 
                          <?php echo $has_data[$i]['order']['creation_date']; ?> 
                         
                        </td>
                        <td>
                          <?php
                          if($has_data[$i]['order']['order_status'] == 0){ 
                            if($has_data[$i]['order']['order_type'] == 2){
                              if($has_data[$i]['order']['delivery_boy'] > 0){
                          ?>
                          <div>
                            <?php echo $has_data[$i]['order']['dname'] ?>
                            <div><small><i class="fa fa-phone"></i> <?php echo $has_data[$i]['order']['dphone'].", ".$has_data[$i]['order']['dphone2'] ?></small></div>
                          </div>
                          <?php
                              }
                              else{
                              ?>
                              <button 
                                data-order="<?php echo $has_data[$i]['order']['order_id']; ?>"
                                data-toggle="modal" 
                                data-target="#modalDeliveryBoy" 
                                class="btn btn-sm btn-primary"
                                onclick="$('#txtassignorderid').val($(this).attr('data-order'))" 
                                >Assign D.Boy</button>
                              <?php
                              }
                            }
                            else{
                            ?>
                            <div><?php echo $has_data[$i]['order']['order_type_text']; ?></div>
                            <?php
                            }
                          }
                          else{
                          ?>
                            <div>Delivered</div>
                          <?php
                          }
                            ?>
                        </td>
                      </tr>

                      <tr class="">
                        <th>#</th>
                        <th colspan="3">PRODUCT NAME</th>
                        <th>RATE</th>
                        <th>QUANTITY</th>
                        <th>SUB AMOUNT</th>
                      </tr>

                          <?php  
                          $count = 0;
                          for ($j=0; $j < count( $has_data[$i]['products']); $j++) {

                          ?>
                          <tr>
                            <td> <?php echo ++$count; ?> </td>
                            <td colspan="3"> 
                              <?php echo ucwords(strtolower($has_data[$i]['products'][$j]['name'])); ?>
                              <div class="text-uppercase" style="color: #c60808;"><b><small><?php echo $has_data[$i]['products'][$j]['pquantity'].' '.$has_data[$i]['products'][$j]['unit']; ?></small></b></div>
                            </td>
                            <td> ₹ <?php echo $has_data[$i]['products'][$j]['rate']; ?> </td>
                            <td> <?php echo $has_data[$i]['products'][$j]['quantity']; ?> </td>
                            <td> ₹ <?php echo $has_data[$i]['products'][$j]['total_price']; ?> </td>
                          </tr>
                          <?php } ?>
                        </tr>
                     
                </table>
                <?php 
                    }
                }
                else{
                ?>
                  <div class="alert alert-danger">No Order available</div>
                <?php
                  }
                  ?>
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
                <input type="hidden" class="form-control" id="txtactionbty" name="txtactionbty" value="shopkeeper">
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

      <div id="modalDeliveryBoy" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ASSIGN DRIVER</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="formAssignDeliveryBoy" id="formAssignDeliveryBoy">
                <input type="hidden" class="form-control" id="txtassignorderid" name="txtorderid">
                 <div class="form-group" >
                  <label for="email">DELIVERY BOY:</label>
                  <select class="form-control" id="txtdeliveryboy" name="txtdeliveryboy" required>
                    <option selected value="" disabled>Select Delivery Boy</option>
                    <?php 
                    if(count($has_delivery_boy) > 0){
                      for ($i=0; $i < count($has_delivery_boy); $i++) { 
                    ?>
                    <option value="<?php echo $has_delivery_boy[$i]['id'] ?>"><?php echo $has_delivery_boy[$i]['name'] ?></option>
                    <?php
                      }
                    } 
                    ?>
                  </select>
                </div>
                <div id="dboymessage" name="dboymessage"></div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
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


        $('#formAssignDeliveryBoy').on('submit', function(e){       
            e.preventDefault();

            $('#dboymessage').removeClass(' alert alert-info');
            $('#dboymessage').removeClass(' alert alert-success');
            $('#dboymessage').removeClass(' alert alert-danger');


            $('#dboymessage').html('Please wait');
            $('#dboymessage').show().delay(5000).fadeOut();
            $('#dboymessage').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>assign-delivery-boy.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#dboymessage').removeClass(' alert alert-info');
                    $('#dboymessage').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#dboymessage').html('Successfully assigned');
                        $('#dboymessage').show().delay(5000).fadeOut();
                        $('#dboymessage').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                     
                    $('#dboymessage').html('Error to assign Delivery boy, retry');
                    $('#dboymessage').show().delay(5000).fadeOut();
                    $('#dboymessage').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });
        

     
        // searchTable searchorderdata

        function searchData(){
          // Declare variables 
          var input, filter, table, tr, td, i;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          // table = document.getElementById("table");
          // tr = table.getElementsByTagName("table");
          tr = $('table tr.searchorderdata');

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td") ; 
            for(j=0 ; j<td.length ; j++)
            {
              let tdata = td[j] ;
              if (tdata) {
                if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  // tr[i].style.display = "";
                   $(this).closest('table').show();
                  break ; 
                } else {
                  // tr[i].style.display = "none";
                  $(this).closest('tr').parent().hide();
                }
              } 
            }
          }
        }

        $(function(){
          $('#search').keyup(function(){
            searchData();
          })
        })
      </script>
  </body>
</html>