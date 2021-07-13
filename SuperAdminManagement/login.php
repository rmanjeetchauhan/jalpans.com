<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $vendorimages ?>logo.png" type="image/x-icon">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main2.css">
    <title>Jalpans.com | Login</title>

    <style type="text/css">
                .pgbackground {
          background: url(<?php echo $vendorimages ?>hotel-login-bg.png) no-repeat;
          background-size: cover;
          width: 100%;
          height: 100%;
          position: absolute;
      }

      .imgcont{
        background-color: #e8e8e8;
        padding: 5px;
        border-radius: 4px;
        margin-bottom: 25px;
        border-top: 2px solid #b3b3b3;
        margin: 15px 0;
        padding-bottom: 15px;
        border-bottom: 2px solid #b3b3b3;
      }

      .registercont{
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.3);
        margin-top: 30%;
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
    color: #5e35a8;
    font-weight: bold;
    font-size: 20px;
}
 .logo img{
      height: 70px;
         
        width: 105px;
    }

    .control-label span{
      color: #bf1010;
    }

    </style>
  </head>
  <body>

    <div class="pgbackground">  
    <div class="pull-right"><div id="google_translate_element"></div></div>    
      <section class="login-content">
        <div class="containera">
            <div class="col-md-offset-4 col-md-4">
                <div class="registercont card">
                  <form class="login-form" id="formLogin" name="formLogin">
                    
                    <div class="imgcont text-center logo">
                      <img src="<?php echo $user_asset; ?>images/logo.png" alt="">
                      <div class="hotel-title">ADMIN LOGIN</div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">USERNAME</label>
                      <input class="form-control" type="text" id="txtemail" name="txtemail" placeholder="Email" autofocus>
                    </div>
                    <div class="form-group">
                      <label class="control-label">PASSWORD</label>
                      <input class="form-control" type="password" id="txtpassword" name="txtpassword" placeholder="Password">
                    </div>

                    <div class="">
                        <div class="col-md-8">
                          <!-- <div class="signup" > Adventure Vendor<a href="<?php echo $vendorRedirect ?>signup"> <b>Register</b> </a> here </div> -->
                        </div>
                        <div class="col-md-4">
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
                url: '<?php echo $superAdminScript; ?>login.php',
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
                        window.location.href = '<?php echo $superAdminRedirect; ?>shopkeepers/';
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
        
      </script>
</html>