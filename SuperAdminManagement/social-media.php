<?php

@session_start();

// include('url.php');
 

$service_url = $apiurl."getSocialMedia";
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
               
               <form id="formSocialMedia" name="formSocialMedia"> 

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label" for="email">WhatsApp:</label>
                        <div class="">
                          <input id="txtwhatsapp" name="txtwhatsapp" type="number" class="form-control" value="<?php echo $has_data['whatsapp']; ?>" required>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label" for="email">Facebook:</label>
                          <div class="">
                            <input id="txtfacebook" name="txtfacebook" type="text" class="form-control" value="<?php echo $has_data['facebook']; ?>" required>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label" for="email">Twitter:</label>
                          <div class="">
                            <input id="txttwitter" name="txttwitter" type="text" class="form-control" value="<?php echo $has_data['twitter']; ?>" required>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label" for="email">Linkedin:</label>
                          <div class="">
                            <input id="txtlinkedin" name="txtlinkedin" type="text" class="form-control" value="<?php echo $has_data['linkedin']; ?>" required>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                    
                     <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label" for="email">Instagram:</label>
                          <div class="">
                            <input id="txtinstagram" name="txtinstagram" type="text" class="form-control" value="<?php echo $has_data['instagram']; ?>" required>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label" for="email">Youtube:</label>
                          <div class="">
                            <input id="txtyoutube" name="txtyoutube" type="text" class="form-control" value="<?php echo $has_data['youtube']; ?>" required>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    </div>
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


      $('#formSocialMedia').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');

            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $superAdminScript; ?>social-media.php',
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