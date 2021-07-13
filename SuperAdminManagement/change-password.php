<?php

@session_start();

// include('url.php');
 

// $service_url = $apiurl."getAdminWalletHistory";
// $curl = curl_init($service_url);
// $curl_post_data = array(
//   "api_key" => $api_key
// );

// $curl_post_data_json = json_encode($curl_post_data);

// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

// $curl_response = curl_exec($curl);
// // print_r($curl_response);
// curl_close($curl);

// $response = json_decode($curl_response, true);
// $has_no_wallet = $response['error'];
// $has_wallet = $response['message'];


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
    <title>Jalpans.com | Change Password</title>
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
            <h1> Change Password
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
               
               <form id="formAddAccount" name="formAddAccount"> 
                  
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">OLD PASSWORD:</label>
                    <div class="col-sm-9">
                      <input id="txtoldpassword" name="txtoldpassword" type="password" class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">PASSWORD:</label>
                    <div class="col-sm-9">
                      <input id="txtpassword" name="txtpassword" type="password" class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">CONFIRM PASSWORD:</label>
                    <div class="col-sm-9">
                      <input id="txtconpassword" name="txtconpassword" type="password" class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group text-center">
                    <div class="savemsg"></div>
                    <button type="button" id="sendOTPToVerifyOTP" class="btn btn-primary"> CREATE ACCOUNT </button>
                    <div class="clearfix"></div>
                  </div>  
              </form>
            </div>
          </div>          
        </div>        
      </div>
      
       <div id="modalChangeOTP" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD SHOP AGENT</h4>
            </div>
            <div class="modal-body">
              <form id="formvalidateAndChangePassord" name="formvalidateAndChangePassord"> 
                  <div class="form-group">
                    <label class="control-label" for="email">OTP:</label>
                    <div class="row">
                       <div class="col-md-4">
                          <input type="text" id="txtotp1" name="txtotp1" class="form-control" placeholder="OTP-1" required>
                        </div>
                        <div class="col-md-4">
                          <input type="text" id="txtotp2" name="txtotp2" class="form-control" placeholder="OTP-2" required>
                        </div>
                        <div class="col-md-4">
                          <input type="text" id="txtotp3" name="txtotp3" class="form-control" placeholder="OTP-3" required>
                          <input type="hidden" id="txtchangepassword" name="txtchangepassword" class="form-control" required>
                        </div>
                        <div class="clearfix"></div>
                      </div>                    
                  </div> 

                  <div class="form-group text-center">
                    <div class="savemsg"></div>
                    <button type="submit" class="btn btn-primary btn-sm"> CHANGE PASSWORD </button>
                    <button type="button" class="btn btn-danger  btn-sm pull-right"> RESEND OTP </button>
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

        $(function(){
            $('#sendOTPToVerifyOTP').click(function(){
             changePasswordOTP();
          })
      })

        
      function changePasswordOTP(){
         $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');

            var old_password = $('#txtoldpassword').val();
            var pass = $('#txtpassword').val();
            var con_pass = $('#txtconpassword').val();

            if(pass.trim() == ''){
                $('.savemsg').html('Please enter a valid password');
                $('.savemsg').show().delay(5000).fadeOut();
                $('.savemsg').addClass(' alert alert-danger');
                return true;
            }

          if(pass.trim() != con_pass.trim()){
              $('.savemsg').html('Password and confirm password not match');
              $('.savemsg').show().delay(5000).fadeOut();
              $('.savemsg').addClass(' alert alert-danger');
              return true;
          } 

          $('.savemsg').html('Please wait');
          $('.savemsg').show().delay(5000).fadeOut();
          $('.savemsg').addClass(' alert alert-info');
          // $('#myloader').show();
          $.ajax({
              url: '<?php echo $superAdminScript; ?>verify-password-send-otp.php',
              type: "POST",
              data: {
                old_password : old_password,
                password : con_pass,
              },
              success: function (data) { 

                  $('.savemsg').removeClass(' alert alert-info');
                  $('.savemsg').removeClass(' alert alert-warning');
                  if(data == "success"){
                      $('.savemsg').html('OTP successfully sent');
                      $('.savemsg').show().delay(5000).fadeOut();
                      $('.savemsg').addClass(' alert alert-success');
                      $('#txtchangepassword').val(con_pass);
                      $('#modalChangeOTP').modal('show');
                      return true;
                  }
                  if(data == "oldpass"){
                      $('.savemsg').html('Error to verify old password.');
                      $('.savemsg').show().delay(5000).fadeOut();
                      $('.savemsg').addClass(' alert alert-danger');
                      return true;
                  }
                   
                  $('.savemsg').html('Error to  send opt, retry');
                  $('.savemsg').show().delay(5000).fadeOut();
                  $('.savemsg').addClass(' alert alert-danger');
                  return false;
              }
          });
      }




      $('#formvalidateAndChangePassord').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');

            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $superAdminScript; ?>change-admin-password.php',
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
                        $('.savemsg').html('Password successfully changed');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    if(data == "otp"){
                        $('.savemsg').html('Error to validate OTP');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-danger');
                        return true;
                    }
                     
                    $('.savemsg').html('Error to  add delivery boy, retry');
                    $('.savemsg').show().delay(5000).fadeOut();
                    $('.savemsg').addClass(' alert alert-danger');
                    return false;
                }
            });
        });




        
      </script>
  </body>
</html>