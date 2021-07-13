<?php

@session_start();

include('url.php');

$search = '';
if(!empty($_GET['search'])){
	$search = $_GET['search'];
}

$service_url = $apiurl."getAllSoldAmountHistory";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "search" => $search
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
    <title>Jalpans.com | Sold History</title>

    <style type="text/css">
      .maintable th{
        background-color: #51025a;
    color: #fff;
      }

      .footrtbl td{
        background-color: #7d0d0d;
    color: #ffff;
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
         
           <div class="titlecont">
            <div class="row">
              <div class="col-md-9"> <h1> Sold History </h1> </div>
              <div class="col-md-3">                 
                 <form id="searchform">
                    <input type="text" name="search" id="search" class="form-control input-sm" placeholder="search" value="<?php echo $search; ?>">
                 </form>
              </div>                          
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              
              <div class="table-responsive">
                
                   <table class="table table-hover table-striped">
                    <tr class="maintable">
                        <th>DATE</th>
                        <th>ORDER ID</th>
                        <th>SHOP DETAIL</th>
                        <th>NO OF ITEMS</th>
                        <th>TOTAL AMT SOLD</th>
                        <!-- <th>ORDER CONFIRMATION </th> -->
                        <th>DELIVERY CONFIRMATION</th>
                        <th>TRANSACTION STATUS </th>
                    </tr>
                    <?php 

                    if( count($has_data)){
                        $count = 0;
                        for ($i=0; $i < count($has_data); $i++) {
                          $color = '#3370cc';
                          $delText = 'PENDING';
                          if($has_data[$i]['order_status'] == 1){
                            $color = 'green';
                            $delText = 'DELIVERED';
                          }
                          if($has_data[$i]['order_status'] == 2){
                            $color = '#f00';
                            $delText = 'CANCELLED';
                          }

                           $profileUrl = $superAdminRedirect."profile/".$has_data[$i]['username']."/".$has_data[$i]['shopcode'];

                    ?>
                   

                    <tr >
                      <td><?php echo date('d M, Y', strtotime($has_data[$i]['creation_date'])) ;?></td>
                        <td> <b style="color: #7d0d0d;"> <?php echo $has_data[$i]['order_id']; ?> </b> </td>
                        <td> 
                          <div><b> <a target="_blank" href="<?php echo $profileUrl; ?>"><?php echo strtoupper($has_data[$i]['shopname']); ?></a> </b></div>
                          <div> <i class="fa fa-map-marker"></i> <?php echo strtoupper($has_data[$i]['pincode']); ?> </div>
                        </td>

                        <td> <?php echo $has_data[$i]['items']; ?> </td>
                        <td> ₹ <?php echo $has_data[$i]['total_amount']; ?> </td>
                        <!-- <td> - </td> -->
                        <td> <div style="color: <?php echo $color; ?>"><b><?php echo $delText; ?></b></div> </td>
                        <td> - </td> 
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

    </div>



    <!-- Javascripts-->
    <script src="<?php echo $vendorAssets; ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/plugins/pace.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/main.js"></script>


    
      <script type="text/javascript">
	$(function(){
		$("#search").keyup(function () {
		    var value = this.value.toLowerCase().trim();
		    $("table tr").each(function (index) {
		        if (!index) return;
		        $(this).find("td").each(function () {
		            var id = $(this).text().toLowerCase().trim();
		            var not_found = (id.indexOf(value) == -1);
		            $(this).closest('tr').toggle(!not_found);
		            return not_found;
		        });
		    });
		});
	})
</script>
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
        
      </script>
  </body>
</html>