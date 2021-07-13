<?php



@session_start();



include('url.php');

$service_url = $apiurl."getCancelledOrderByAdmin";

$curl = curl_init($service_url);

$curl_post_data = array(

  "api_key" => $api_key

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



$service_url = $apiurl."refundStatus";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);



?>



<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php echo $vendorimages ?>logo.png" type="image/x-icon">

    <!-- CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main2.css">

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

              <div class="col-md-9"> <h1>  Place Orders </h1> </div>

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



                        if($has_data != 'error'){

                            $count = 0;

                            for ($i=0; $i < count($has_data); $i++) {



                              // print_r($has_data[$i]);



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

                            <th><button style="padding: 1px 5px;" data-order="<?php echo $has_data[$i]['order']['order_id']; ?>" data-refund_amount="<?php echo $has_data[$i]['order']['transaction_amount']; ?>"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalRefundAmount" onclick="$('#refundorderid').val($(this).attr('data-order')); $('#refund_amount').val($(this).attr('data-refund_amount'))">
                              <i class="fa fa-exchange"></i>
                            </button> ORDER ID</th>

                            <th>ORDER TYPE</th>

                            <th>CONTACT NO</th>

                            <th>ORDER STATUS </th>

                            <th>TOTAL AMOUNT</th>

                            <th>DATE </th>

                        </tr>



                        <tr >

                            <td> <?php echo $has_data[$i]['order']['order_id']; ?> </td>

                            <td> <?php echo $has_data[$i]['order']['order_type']; ?> </td>

                            <td> <?php echo $has_data[$i]['order']['phone']; ?> </td>

                            <td>

                              <?php 
                              if($has_data[$i]['order']['refund'] == 1){
                              ?>
                              <button class="btn btn-xs btn-danger"> Refund </button>
                              <?php
                              }
                              else{
                              ?>

                             <button class="btn btn-xs <?php echo $cls; ?>" data-order="<?php echo $has_data[$i]['order']['order_id']; ?>" data-toggle="modal" data-target="#modalChangeStatus" onclick="$('#txtorderid').val($(this).attr('data-order'))" > <?php echo $has_data[$i]['order']['order_text']; ?> </button>
                           <?php } ?>
                            </td>

                            <!-- <td> ₹ <?php echo $has_data[$i]['order']['total_amount']; ?> </td> -->

                            <td> ₹<?php echo $has_data[$i]['order']['transaction_amount'].'<div><small>(+'.$has_data[$i]['order']['commission'].'% conv charge)</small></div>'; ?> </td>

                            <td> 

                              <?php echo $has_data[$i]['order']['creation_date']; ?> 

                              <!-- <div><small>  <?php echo $has_data[$i]['order']['time']; ?> </small></div> -->

                          </td>
                           <?php 
                            if($has_data[$i]['order']['refund'] == 1){
                            ?>

                          <tr>
                            <td colspan="3">
                              Refund Status : <?php echo $has_data[$i]['order']['refund_status']; ?>,
                              Refund Date : <?php echo date('d M,Y', strtotime($has_data[$i]['order']['refund_date'])); ?>,
                              Refund Amount : <?php echo $has_data[$i]['order']['refund_amount']; ?>                        
                            </td>
                            <td colspan="4">
                              
                              <div><small>Refund Msg : <?php echo $has_data[$i]['order']['refund_message']; ?></small></div>,                              
                            </td>
                          </tr>

                        <?php } ?>



                          <tr>

                            <th>#</th>

                            <th colspan="2">PRODUCT NAME</th>

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

                            <td colspan="2"> 

                              <?php echo $has_data[$i]['products'][$j] ['name']; ?> 

                              <div class="text-uppercase" style="color: #c60808;"><b><small><?php echo $has_data[$i]['products'][$j]['pquantity'].' '.$has_data[$i]['products'][$j]['unit']; ?></small></b></div>

                            </td>

                            <td> ₹ <?php echo $has_data[$i]['products'][$j]['rate']; ?> </td>

                            <td> <?php echo $has_data[$i]['products'][$j]['quantity']; ?> </td>

                            <td> ₹ <?php echo $has_data[$i]['products'][$j]['total_price']; ?> </td>

                          </tr>

                          <?php } ?>

                        </tr>

  

                         <tr class="footrtbl">

                            <td colspan="3"> <b>Shopname : </b> <?php echo $has_data[$i]['order']['shopname']; ?> </td>

                             <td > <b>OTP : </b> <?php echo $has_data[$i]['order']['unlock_opt']; ?> </td>

                            <td colspan="2" class="text-right"> <b>Owner : </b><?php echo $has_data[$i]['order']['name']."[".$has_data[$i]['order']['shopcontact']."]"; ?> </td>

                             

                          </tr>

                     

                </table>

                 <?php 

                            }

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

              <h4 class="modal-title">Shopkeeper</h4>

            </div>

            <div class="modal-body">

              <form action="#" name="formDeliveryStatus" id="formDeliveryStatus">

                <input type="hidden" class="form-control" id="txtorderid" name="txtorderid">

                <input type="hidden" class="form-control" id="txtactionbty" name="txtactionbty" value="admin">

                 <div class="form-group" >

                  <label for="email">Action:</label>

                  <select class="form-control" id="txtactiontype" name="txtactiontype" required>

                    <option value="">Select</option>

                    <option value="1">Procesing</option>

                    <option value="2">Out For Delivery</option>

                    <option value="3">Delivered</option>

                    <option value="4">Cancelled</option>

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



      <div id="modalRefundAmount" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Refund Order Amount</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="formRefundAmount" id="formRefundAmount">
                <input type="text" class="form-control" id="refundorderid" name="refundorderid">
                <div class="form-group" >
                  <label for="email">Refund Amount:</label>
                 <input type="text" class="form-control" id="refund_amount" name="refund_amount" value="">
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
                <div id="showrefmsg" name="showrefmsg"></div>
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

            if($('#txtemail').val() == "" || $('#txtpassword').val() == "" ){
              $('#showmessage').html('Enter a valid Email and password');
              $('#showmessage').show().delay(3000).slideUp(1000);
              $('#showmessage').addClass(' alert alert-danger');
              return false;
            }

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

                    $('#showmessage').html('Error to change status, retry');
                    $('#showmessage').show().delay(5000).fadeOut();
                    $('#showmessage').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });


        $('#formRefundAmount').on('submit', function(e){       
            e.preventDefault();

            $('#showrefmsg').removeClass(' alert alert-info');
            $('#showrefmsg').removeClass(' alert alert-success');
            $('#showrefmsg').removeClass(' alert alert-danger');

            $('#showrefmsg').html('Please wait');
            $('#showrefmsg').show().delay(5000).fadeOut();
            $('#showrefmsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({

                url: '<?php echo $domain; ?>paytmPayout/refund-order-transaction.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 
                    console.log(data);
                    $('#showrefmsg').removeClass(' alert alert-info');
                    $('#showrefmsg').removeClass(' alert alert-warning');

                    if(data == "success"){
                        $('#showrefmsg').html('Refund request was raised for this transaction. But it is pending state');
                        $('#showrefmsg').show().delay(5000).fadeOut();
                        $('#showrefmsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }

                    
                    if(data == "error"){
                        $('#showrefmsg').html('Refund failure, error to refund amount for this order id, retry');
                        $('#showrefmsg').show().delay(5000).fadeOut();
                        $('#showrefmsg').addClass(' alert alert-danger');
                        return true;
                    }

                    $('#showrefmsg').html(data);
                    $('#showrefmsg').show().delay(5000).fadeOut();
                    $('#showrefmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });

        

      </script>

  </body>

</html>