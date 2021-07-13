<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $vendorimages ?>logo.png" type="image/x-icon">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main.css">
     <title>Jalpans.com | Shopkeeper</title>

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
     
    background-color: #fff;
    padding: 15px;
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
      .logindata{
        float: left;
        font-weight: bold;
      }
    .textlogo {
        color: #0e8df2;
        font-weight: bold;
        font-size: 20px;
    }
     .logo img {
    height: 90px;
    width: 98px;
}

    .control-label span{
      color: #bf1010;
    }

#google_translate_element{
      position: absolute;
    right: 0;
    margin-right: 30px;
    margin-top: -25px;
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

    </style>
  </head>
  <body class="pgbackground"> <br>
      <section class="shopkeeper-signup">
        <div class="container">
            <div class="col-md-offset-2 col-md-8">
                <div class="registercont">
                  <a href="<?php echo $domain; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;Back</button></a>
                  <div class="clearfix"></div>

                  <div id="google_translate_element"></div>
                  <form id="registerShopkeeper" name="registerShopkeeper" enctype="multipart/form-data">
                   
                   <div class="imgcont text-center logo">
                    <!-- <img src="<?php echo $vendorimages ?>logo.png"> -->
                    <img src="<?php echo $user_asset; ?>images/logo.jpg" alt="">
                    <div class="hotel-title">SHOPKEEPER SIGNUP</div>
                  </div>
                   
  
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">OWNER NAME <span>*</span></label>
                          <input id="txtname" name="txtname" type="text" class="form-control" required>
                          <input id="txtagentid" name="txtagentid" type="hidden" class="form-control" value="0" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">SHOP NAME <span>*</span></label>
                          <input id="txtshopname" name="txtshopname" type="text" class="form-control" required>
                        </div>
                      </div>

                       <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label">CONTACT NUMBER <span>*</span></label>
                          <input id="txtphone" name="txtphone" type="text" class="form-control" pattern="[6789][0-9]{9}" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">EMAIL ID </label>
                          <input id="txtemail" name="txtemail" type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
                        </div>                        
                      </div>
                       <div class="clearfix"></div>

                       <div class="col-md-6">
                        <div class="form-group ">
                          <label class="control-label">MINIMUM AMOUNT FOR HOME DELIVERY </label>
                          <input id="txtminorder" name="txtminorder" type="number" min="0" class="form-control" value="0" required>
                        </div>
                      </div>

                     <div class="col-md-6">
                        <div class="form-group "> 
                          <label class="control-label">PINCODE <span>*</span></label>
                          <input id="txtpincode" name="txtpincode" type="text" class="form-control" pattern="[0-9]{6}" required>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                   
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">SHOP ADDRESS <span>*</span></label>
                          <textarea id="txtfulladdress" name="txtfulladdress" class="form-control"></textarea>
                        </div>                        
                      </div>  

                      <div class=" col-md-12">  
                        <div class="form-group">
                          <label class="control-label">SHOP IMAGE </label>
                          <input type="file" accept=".jpg, .jpeg, .png, .gif" id="fileimg" name="fileimg" class="form-control">
                        </div>
                      </div>


                      <div class=" col-md-12">  
                        <div class="form-group">
                          <label class="control-label">BANK NAME <span>*</span></label>
                          <input type="text"  id="txtbankname" name="txtbankname" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">ACCOUNT NUMBER <span>*</span></label>
                          <input id="txtaccountno" name="txtaccountno" type="text" class="form-control" required>
                        </div>                        
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">IFSC CODE <span>*</span></label>
                          <input id="txtifsccode" name="txtifsccode" type="text" class="form-control" required>
                        </div>                        
                      </div>
                      <div class="clearfix"></div>

                      <div class=" col-md-12">  
                        <div class="form-group">
                          <label class="control-label">BRANCH ADDRESS <span>*</span></label>
                          <input type="text"  id="txtbankbranch" name="txtbankbranch" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">PASSWORD <span>*</span></label>
                          <input id="txtpassword" name="txtpassword" type="password" class="form-control" required>
                        </div>                        
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">CONFIRM PASSWORD <span>*</span></label>
                          <input id="txtconpass" name="txtconpass" type="password" class="form-control" required>
                        </div>                        
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                         <label class=""> <input id="txttermscondition" name="txttermscondition" type="checkbox" required> Click to accept our <a href="<?php echo $domain ?>terms&conditions">Terms & Conditions</a><span style="color: red;">*</span></label>
                        </div>                        
                      </div>
                      
                       <input id="tokens" name="tokens" type="hidden" class="form-control" required>
                      
                      <div class="clearfix"></div>

                  </div>
 

                  <div class="row text-center">
                      <div class="col-md-12">
                        <span class="logindata">
                          <a href="<?php echo $vendorRedirect; ?>"> Login </a> Click here
                        </span>
                          <input type="button" class="btn btn-primary" value="Submit" id="validate-phone" name="validate-phone">
                      </div>
                  </div>
                  <div id="loginMessage"></div>
              </form>
                </div>
            </div>
        </div>
      </section><br>
  



    <div id="modalvalidateotp" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color: #000;"> Validate OTP</h4>
          </div>
          <div class="modal-body">
             <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">Enter Otp</label>
                  <input id="txtvalidateotp" name="txtvalidateotp" type="text" class="form-control" required placeholder="Enter OTP">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <div class="form-group text-center">
                    <button type="button" class="btn btn-sm btn-primary" id="validateotp" onclick="VerifyMobileOTP();">VALIDATE</button>
                    <button type="button" class="btn btn-sm btn-danger pull-right" onclick="verifyMobileNo();">RESEND</button>
                </div>
              </div>
              <div class="clearfix"></div>

              <div class="col-md-12">
                <div id="modalmsg"> </div>
              </div>
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

        $('#registerShopkeeper').on('submit', function(e){       
            e.preventDefault();

            $('#loginMessage, #modalmsg').removeClass(' alert alert-info');
            $('#loginMessage, #modalmsg').removeClass(' alert alert-success');
            $('#loginMessage, #modalmsg').removeClass(' alert alert-danger');
            
            var checkbx = $('#txttermscondition');
            if(checkbx.prop('checked') == false){
                alert('Terms and condition must be checked.');
            }
           

            $('#loginMessage, #modalmsg').html('Please wait');
            $('#loginMessage, #modalmsg').show().delay(5000).fadeOut();
            $('#loginMessage, #modalmsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>signup.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#loginMessage, #modalmsg').removeClass(' alert alert-info');
                    $('#loginMessage, #modalmsg').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#loginMessage, #modalmsg').html('Register Success');
                        $('#loginMessage, #modalmsg').show().delay(5000).fadeOut();
                        $('#loginMessage, #modalmsg').addClass(' alert alert-success');
                        window.location.href = '<?php echo $vendorRedirect; ?>dashboard/';
                        return true;
                    }
                    else if(data == "phoneemail"){
                        $('#loginMessage, #modalmsg').html('Email or phone already exists.');
                        $('#loginMessage, #modalmsg').show().delay(5000).fadeOut();
                        $('#loginMessage, #modalmsg').addClass(' alert alert-warning');
                         
                        return true;
                    }
                    $('#loginMessage, #modalmsg').html('Error to register, retry');
                    $('#loginMessage, #modalmsg').show().delay(5000).fadeOut();
                    $('#loginMessage, #modalmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });


        // =========================================================================





        $(function(){
            $('#validate-phone').on('click', function(){

              $('#loginMessage, #modalmsg').removeClass(' alert alert-info');
              $('#loginMessage, #modalmsg').removeClass(' alert alert-success');
              $('#loginMessage #modalmsg').removeClass(' alert alert-danger');

              var name = $('#txtname').val();
              var phone = $('#txtphone').val();
              var email = $('#txtemail').val();


              var shop = $('#txtshopname').val().trim();
              var pin = $('#txtpincode').val().trim();
              var bank = $('#txtbankname').val().trim();
              var accno = $('#txtaccountno').val().trim();
              var ifsc = $('#txtifsccode').val().trim();

              if(name == '' || phone == '' || shop == '' || pin == '' || bank == '' || accno == '' || ifsc == ''){
                $('#loginMessage').html('All <span>*</span> fields are required.');
                $('#loginMessage').show().delay(3000).slideUp(1000);
                $('#loginMessage').addClass(' alert alert-danger');
                return false;
              }
              

              if($('#txtpassword').val() == "" || $('#txtconpass').val() == "" ){
                $('#loginMessage').html('Enter a valid password and confirm password');
                $('#loginMessage').show().delay(3000).slideUp(1000);
                $('#loginMessage').addClass(' alert alert-danger');
                return false;
              }


              if($('#txtpassword').val() != $('#txtconpass').val()){

                $('#loginMessage').html('Password and confirm password match error');
                $('#loginMessage').show().delay(3000).slideUp(1000);
                $('#loginMessage').addClass(' alert alert-danger');
                return false;
              }



              if(name == ""){
                $('#loginMessage').html('Enter your name');
                $('#loginMessage').show().delay(3000).slideUp(1000);
                $('#loginMessage').addClass(' alert alert-danger');
                return false;
              }

              var mob = /^[6789][0-9]{9}$/;
              
              if (mob.test(phone) == false) {
                $('#loginMessage').html('Enter valid mobile number');
                $('#loginMessage').show().delay(3000).slideUp(1000);
                $('#loginMessage').addClass(' alert alert-danger');
                return false;
              }


              if(email != ""){
                var reg = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
                if (reg.test(email) == false) {
                  $('#loginMessage').html('Enter a valid email');
                  $('#loginMessage').show().delay(3000).slideUp(1000);
                  $('#loginMessage').addClass(' alert alert-danger');
                  return false;
                }
              }


              var pn = /^[0-9]{6}$/;
              if (pn.test(pin) == false) {
                $('#loginMessage').html('Enter a valid Pincode');
                $('#loginMessage').show().delay(3000).slideUp(1000);
                $('#loginMessage').addClass(' alert alert-danger');
                return false;
              }

            var checkbx = $('#txttermscondition');
            if(checkbx.prop('checked') == false){
                 
                $('#loginMessage').html('Terms and condition must be checked.');
                $('#loginMessage').show().delay(3000).slideUp(1000);
                $('#loginMessage').addClass(' alert alert-danger');
                return false;
            }
              
             
              var retdata = verifyMobileNo();
          });


            // $('#validateotp').on('click', function(){

            //     var otpenter = $('#txtvalidateotp').val();
            //     if(otpenter == opt){
            //       $('#formsignup').submit();
            //       return true;
            //     }

            //     $('#modalmsg').html('You enter a wrong otp.');
            //     $('#modalmsg').show().delay(3000).slideUp(1000);
            //     $('#modalmsg').addClass(' alert alert-danger');
            //     return false;



            // })
        })


         
        function verifyMobileNo(){

          var phone = $('#txtphone').val();
          var email = $('#txtemail').val();

          $.ajax({
                url: '<?php echo $vendorScript; ?>verify-mobile-send-otp.php',
                type: "POST",
                 data: {
                    phone: phone,
                    email: email
                },
                success: function (data) { 

                    // console.log(data);
                   
                    if(data == "phoneemail"){                        

                        $('#loginMessage').html('Mobile no or Email already Exists. Please try with another Email/Mobile No.');
                        $('#loginMessage').show().delay(5000).fadeOut();
                        $('#loginMessage').addClass(' alert alert-danger');
                        // $('#myloader').hide();
                        return false;
                    }
                    if(data == "error"){                        

                        $('#loginMessage').html('Error to send OTP on your mobile Number, retry.');
                        $('#loginMessage').show().delay(5000).fadeOut();
                        $('#loginMessage').addClass(' alert alert-danger');
                        // $('#myloader').hide();
                        return false;
                    }
                   
                    $('#modalmsg').html('Otp Send on your mobile no.');
                    $('#tokens').val(data);
                    $('#modalmsg').show().delay(5000).fadeOut();
                    $('#modalmsg').addClass(' alert alert-success');
                    $('#modalvalidateotp').modal('show');
                    
                }
            });
        }


        function resendOtp(){

          var phone = $('#txtphone').val();
          var token = $('#tokens').val();

          $.ajax({
                url: '<?php echo $vendorScript; ?>resend-otp-mobile.php', 
                type: "POST",
                 data: {
                    phone: phone,
                    token: token
                },
                success: function (data) { 

                    // console.log(data);
                   if(data == "error"){                        

                        $('#modalmsg').html('Error to send OTP on your mobile Number, retry.');
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').addClass(' alert alert-danger');
                        // $('#myloader').hide();
                        return false;
                    }
                    
                    $('#modalmsg').html('Otp Send on your mobile no.');
                    $('#modalmsg').show().delay(5000).fadeOut();
                    $('#modalmsg').addClass(' alert alert-success');
                }
            });
        }

        function VerifyMobileOTP(){

          var phone = $('#txtphone').val();
          var token = $('#tokens').val();
          var otp = $('#txtvalidateotp').val();

          $.ajax({
                url: '<?php echo $vendorScript; ?>verify-send-otp.php', 
                type: "POST",
                 data: {
                    phone: phone,
                    otp: otp,
                    token: token
                },
                success: function (data) { 

                    // console.log(data);
                   if(data == "success"){                        

                        $('#modalmsg').html('OTP validate successfully.');
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').addClass(' alert alert-success');
                        $('#registerShopkeeper').submit();

                        return false;
                    }
                    else if(data == "validate"){                        

                        $('#modalmsg').html('You entered a worng OTP. Error to validate .');
                        $('#modalmsg').show().delay(5000).fadeOut();
                        $('#modalmsg').addClass(' alert alert-danger');

                        return false;
                    }
                    
                    $('#modalmsg').html('Error to validate mobile number.');
                    $('#modalmsg').show().delay(5000).fadeOut();
                    $('#modalmsg').addClass(' alert alert-danger');
                }
            });
        }



        
  </script>
</html>