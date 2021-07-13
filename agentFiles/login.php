<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $vendorimages ?>logo.png" type="image/x-icon">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main.css">
     
    <title>Jalpans.com | Shop Agent</title>

    <style type="text/css">
  
       .pgbackground {
          background: url(<?php echo $vendorimages ?>shopkeeper-back.jpg) no-repeat;
          background-size: cover;
          width: 100%;
          height: 100%;
          position: absolute;
          background-attachment: fixed;
        }

      .imgcont{
        background-color: #fff;
        padding: 5px;
        /*border-radius: 4px;*/
        margin-bottom: 25px;
        /*border-top: 2px solid #b3b3b3;*/
        margin: 0 0 15px 0;
        /*padding-bottom: 15px;*/
        border-bottom: 2px solid #b3b3b3;
      }

      .registercont{
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.3);
    margin-top: 25%;
      }

     .hotel-title{
            font-size: 18px;
        font-weight: bold;
        margin: 8px 0;
        text-transform: uppercase;
        letter-spacing: 1px;
            font-family: 'Roboto Condensed', sans-serif;
            color: #000;
      }

      .login-content {
        display: -ms-flexbox;
        display: contents;
      }

      .signup{
        font-weight: bold;
      }

      .textlogo {
    color: #0e8df2;
    font-weight: bold;
    font-size: 20px;
}   .logo img {
    height: 90px;
    width: 98px;
}

    .control-label span{
      color: #bf1010;
    }

#google_translate_element{
      position: absolute;
    right: 0;
    margin-right: 5px;
    margin-top: -30px;
}
select.goog-te-combo{
  height: 30px;
}

@media(max-width: 480px){
  #google_translate_element {
     position: initial; 
    text-align: center;
    margin-right: 0px;
}
}

.lnkforgot{
  padding: 5px;
    margin-bottom: 10px;
    font-weight: bold;
    letter-spacing: 0px;
    /*text-transform: uppercase;*/
    text-align: right;
}
    </style>
  </head>
  <body class="pgbackground">

     
    
    <section class="login-content">
      <div class="containera">
          <div class="col-md-offset-4 col-md-4">
              <div class="registercont card">
                <a href="<?php echo $domain; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;Back</button></a>
                <div id="google_translate_element"></div>
                <form class="login-form" id="formLogin" name="formLogin">
                  
                  <div class="imgcont text-center logo">
                    <img src="<?php echo $user_asset; ?>images/logo.jpg" alt="">
                    <div class="hotel-title">SHOP AGNET LOGIN</div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">REGISTERED MOBILE NUMBER</label>
                    <input class="form-control" type="text" id="txtphone" name="txtphone" placeholder="Mobile No" autofocus  pattern="[6789][0-9]{9}" required="">
                  </div>
                  <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" id="txtpassword" name="txtpassword" placeholder="Password" required="">
                  </div>
                  <div class="lnkforgot">
                    <a href="" data-toggle="modal" data-target="#modalForgotPassword">Forgot Password </a>
                  </div>

                  <div class="">
                       <!-- <div class="col-md-8">
                        <div class="signup" >Shopkeeper <a href="<?php echo $vendorRedirect ?>signup"> <b>Register</b> </a> here </div>
                      </div> -->
                      <div class="col-md-12">
                        <div class="form-group btn-container text-center">
                          <button class="btn btn-primary">SIGN IN <i class="fa fa-sign-in fa-lg"></i></button>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <div id="loginMessage"></div>
                </form>
              </div>
          </div>
      </div>
    </section>


<div id="modalForgotPassword" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #000;"> FORGOT PASSWORD </h4>
      </div>
        <div class="modal-body">

          <div id="modalmsg"> </div>

            <form name="sendOtpToMobile" id="sendOtpToMobile">
             <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">MOBILE NO</label>
                  <input id="txtmobilenoforotp" name="txtmobilenoforotp" type="text" class="form-control" required placeholder="Enter Mobile No">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <div class="form-group text-center">
                    <button type="button" class="btn btn-primary btn-sm" id="validateotp" onclick="verifyMobileNo();">SEND OTP</button>
                    <!-- <button type="button" class="btn btn-sm btn-danger pull-right" onclick="resendOtp();">RESEND</button> -->
                </div>
              </div>
            </form>
            <div class="clearfix"></div>
            <form name="validatesentOtp" id="validatesentOtp">
             <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">ENTER OTP</label>
                  <input id="txtvalidateotp" name="txtvalidateotp" type="text" class="form-control" required placeholder="Enter OTP">
                </div>
                <div class="form-group">
                  <label class="control-label">PASSWORD</label>
                  <input id="txtcpassword" name="txtcpassword" type="password" class="form-control" required placeholder="**********">
                </div>
                <div class="form-group">
                  <label class="control-label">CONFIRM PASSWORD</label>
                  <input id="txtconpassword" name="txtconpassword" type="password" class="form-control" required placeholder="**********">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <div class="form-group text-center">
                    <button type="button" class="btn btn-primary btn-sm" id="validateotp" onclick="verifyEnteredOtp();">VALIDATE</button>
                    <button type="button" class="btn btn-danger btn-sm pull-right" onclick="verifyMobileNo();">RESEND</button>
                </div>  
              </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
  </div>
</div>  
    
  </body>
  <script src="<?php echo $vendorAssets; ?>js/jquery-2.1.4.min.js"></script>
  <script src="<?php echo $vendorAssets; ?>js/bootstrap.min.js"></script>
  <script src="<?php echo $vendorAssets; ?>js/plugins/pace.min.js"></script>
  <script src="<?php echo $vendorAssets; ?>js/main.js"></script>

<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
  }
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <script type="text/javascript">

         $('#validatesentOtp').hide();

        $('#formLogin').on('submit', function(e){       
            e.preventDefault();

            $('#loginMessage').removeClass(' alert alert-info');
            $('#loginMessage').removeClass(' alert alert-success');
            $('#loginMessage').removeClass(' alert alert-danger');

            if($('#txtemail').val() == "" || $('#txtpassword').val() == "" ){
              $('#loginMessage').html('Enter a valid Email and password');
              $('#loginMessage').show().delay(3000).slideUp(1000);
              $('#loginMessage').addClass(' alert alert-danger');
              return false;
            }

            $('#loginMessage').html('Please wait');
            $('#loginMessage').show().delay(5000).fadeOut();
            $('#loginMessage').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $shopAgentScript; ?>login.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#loginMessage').removeClass(' alert alert-info');
                    if(data == "success"){
                        $('#loginMessage').html('Login Success');
                        $('#loginMessage').show().delay(5000).fadeOut();
                        $('#loginMessage').addClass(' alert alert-success');
                        window.location.href = '<?php echo $shopAgentRedirect; ?>dashboard';
                        return true;
                    }
                    $('#loginMessage').html('Login Error, retry');
                    $('#loginMessage').show().delay(5000).fadeOut();
                    $('#loginMessage').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });

 

      function verifyMobileNo(){

        $('#modalmsg').removeClass(' alert alert-info');
        $('#modalmsg').removeClass(' alert alert-success');
        $('#modalmsg').removeClass(' alert alert-danger');


        $('#modalmsg').html('Please wait...');
              $('#modalmsg').show().delay(5000).fadeOut();
              $('#modalmsg').addClass(' alert alert-info');

              var phone = $('#txtmobilenoforotp').val();
              var mob = /^[6789][0-9]{9}$/;
                
              if (mob.test(phone) == false) {
                $('#modalmsg').html('Enter valid mobile number');
                $('#modalmsg').show().delay(3000).slideUp(1000);
                $('#modalmsg').addClass(' alert alert-danger');
                return false;
              }


              $.ajax({
                  url: '<?php echo $shopAgentScript; ?>forgot-password-send-otp.php',
                  type: "POST",
                   data: {
                      phone: phone
                  },
                  success: function (data) { 
                      // console.log(data);   

                      if(data == "phone"){                        

                          $('#modalmsg').html('Your mobile no is not registered with us.');
                     
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').removeClass(' alert alert-info');
                        $('#modalmsg').removeClass(' alert alert-success');
                        $('#modalmsg').addClass(' alert alert-danger');

                        return true;
                      }

                      if(data == "success"){                        

                          $('#modalmsg').html('Otp Send on your registered mobile no.');
                     
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').removeClass(' alert alert-info');
                        $('#modalmsg').removeClass(' alert alert-danger');
                        $('#modalmsg').addClass(' alert alert-success');
                        
                        $('#validatesentOtp').show();
                        $('#sendOtpToMobile').hide();

                        return true;
                      }

                      $('#modalmsg').removeClass(' alert alert-info');
                      $('#modalmsg').removeClass(' alert alert-success');

                      $('#modalmsg').html('Error to send OTP on your mobile Number, retry.');
                      $('#modalmsg').show().delay(5000).fadeOut();
                      $('#modalmsg').addClass(' alert alert-danger');
                      // $('#myloader').hide();
                      return false;
                  }
              });
          }


      function verifyEnteredOtp(){

        $('#modalmsg').removeClass(' alert alert-info');
        $('#modalmsg').removeClass(' alert alert-success');
        $('#modalmsg').removeClass(' alert alert-danger');


            var phone = $('#txtmobilenoforotp').val();
            var otp = $('#txtvalidateotp').val();
            var password = $('#txtcpassword').val();
            var con_password = $('#txtconpassword').val();

            $('#modalmsg').html('Please wait...');
            $('#modalmsg').show().delay(5000).fadeOut();
            $('#modalmsg').addClass(' alert alert-info');

            if(otp ==""){

              $('#modalmsg').removeClass(' alert alert-info');

              $('#modalmsg').html('Please enter a valid OTP...');
              $('#modalmsg').show().delay(5000).fadeOut();
              $('#modalmsg').addClass(' alert alert-danger');
              return false;

            }

            if(password == "" || con_password == "" ){
              $('#modalmsg').html('Enter a valid password and confirm password');
              $('#modalmsg').show().delay(3000).slideUp(1000);
              $('#modalmsg').addClass(' alert alert-danger');
              return false;
            }

            if(password != con_password){
              $('#modalmsg').html('Password and Confirm password not match');
              $('#modalmsg').show().delay(3000).slideUp(1000);
              $('#modalmsg').addClass(' alert alert-danger');
              return false;
            }

            $.ajax({
                url: '<?php echo $shopAgentScript; ?>forgot-password-otp-validation.php',
                type: "POST",
                data: {
                    phone: phone,
                    otp: otp,
                    password: password,
                    con_password: con_password
                },
                success: function (data) { 
                    // console.log(data);                   
                     
                    if(data == "success"){                        
                        $('#modalmsg').html('OTP successfully verified and password changed.');
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }

                    $('#modalmsg').html('Error to verify otp, retry.');
                    $('#modalmsg').show().delay(5000).fadeOut();
                    $('#modalmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        }

        
  </script>
</html>