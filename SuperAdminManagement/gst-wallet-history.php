<?php

@session_start();

include('url.php');

// print_r($has_data);

$service_url = $apiurl."getGstWalletHistory";
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
$has_no_wallet = $response['error'];
$has_wallet = $response['message'];


// print_r($has_wallet);



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
    <title>Jalpans.com | GST Wallet History</title>
 <style type="text/css">
      .maintable td{
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
          <div >
            <h1> GST Wallet History
              <!-- <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addRetailers">Add <?php echo $mainText; ?></button> -->
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              
              <div class="table-responsive">
                
                   <table class="table table-hover table-striped">
                    <tr class="maintable">
                        <td>SL NO</td>
                        <td>DATE</td>
                        <td>ORDER ID</td>
                        <td>TRANSACTION ID</td>
                        <td>TRANSACTION REASON</td>
                        <td>AMOUNT BEFORE</td>
                        <td>TRANSACTION AMOUNT </td>
                        <td>AMOUNT AFTER</td>
                        <td>TRANSACTION TYPE </td>
                    </tr>
                    <?php 

                    if( count($has_wallet)){
                        $count = 0;
                        for ($i=0; $i < count($has_wallet); $i++) { 
                    ?> 
                    <tr>
                      <td><?php echo ++$count; ?></td>
                      <td><?php echo date('d M, Y', strtotime($has_wallet[$i]['creation_date'])) ;?></td>
                        <td> <b style="color: #7d0d0d;"> <?php echo $has_wallet[$i]['order_id']; ?> </b> </td>
                        <td> <?php echo $has_wallet[$i]['transaction_id']; ?> </td>
                        <td> <?php echo $has_wallet[$i]['transaction_reason']; ?> </td>

                        <td> ₹ <?php echo $has_wallet[$i]['amount_before']; ?> </td>
                        <td> ₹ <?php echo $has_wallet[$i]['amount']; ?> </td>
                        <td> ₹ <?php echo $has_wallet[$i]['amount_after']; ?> </td>
                        <td> <?php echo $has_wallet[$i]['transaction_type']; ?> </td>
                          
                    </tr> 
                
                 <?php 
                      }
                  }
                  ?>
                  </table>
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



        
      </script>
  </body>
</html>