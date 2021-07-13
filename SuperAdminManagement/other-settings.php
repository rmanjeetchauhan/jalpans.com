<?php

@session_start();

// include('url.php');
 

$service_url = $apiurl."getAdminProfile";
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
    <title>Jalpans.com | Other Settings</title>
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
            <h1> Other Settings
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
               
               <form id="formSettings" name="formSettings"> 

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label" for="email">COMMISSION(%):</label>
                        <div class="">
                          <input id="txtcommission" name="txtcommission" type="number" class="form-control" value="<?php echo $has_data['comission']; ?>" required>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label" for="email">AGENT COMMISSION(%):</label>
                          <div class="">
                            <input id="txtagentcommission" name="txtagentcommission" type="number" class="form-control" value="<?php echo $has_data['agent_commission']; ?>" required>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label" for="email">MAX DELIVERY HOUR:</label>
                          <div class="">
                            <input id="txtmaxdeliveryhour" name="txtmaxdeliveryhour" type="number" class="form-control" value="<?php echo $has_data['max_delivery_hour']; ?>" required>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="email">WEBSITE NOTICE:</label>
                    <div class="">
                      <textarea id="txtnotice" name="txtnotice" class="form-control" ><?php echo $has_data['notice']; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                   <div class="form-group">
                    <label class="control-label" for="email">SHOPKEEPER NOTICE:</label>
                    <div class="">
                      <textarea id="txtshopnotice" name="txtshopnotice" class="form-control" ><?php echo $has_data['shop_notice']; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                   <div class="form-group">
                    <label class="control-label" for="email">AGENT NOTICE:</label>
                    <div class="">
                      <textarea id="txtagentnotice" name="txtagentnotice" class="form-control" ><?php echo $has_data['agent_notice']; ?></textarea>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group text-center">
                    <div class="savemsg"></div>
                    <button type="submit"  class="btn btn-primary"> SAVE DETAILS </button>
                    <div class="clearfix"></div>
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


      $('#formSettings').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');

            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $superAdminScript; ?>other-settings.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 
 
                    $('.savemsg').removeClass(' alert alert-info');
                    $('.savemsg').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('.savemsg').html('Saved successfully');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    if(data == "error"){
                        $('.savemsg').html('Error to save data');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-danger');
                        return true;
                    }
                     
                    $('.savemsg').html('Error to  save data, something went wrong, retry');
                    $('.savemsg').show().delay(5000).fadeOut();
                    $('.savemsg').addClass(' alert alert-danger');
                    return false;
                }
            });
        });




        
      </script>
  </body>
</html>