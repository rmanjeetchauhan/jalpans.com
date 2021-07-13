<?php

@session_start();

 $shopcode = $url->segment(4);

include('url.php');
$service_url = $apiurl."getShopkeeperProfileByShopCode";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "shopcode" => $shopcode
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
    <title>Jalpans.com | Profile</title>

    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.main-title{
  background-color: #000;
    color: #fff;
    padding: 4px 10px;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
}

.switch-shop{
  text-align: center;
    padding: 8px;
    background-color: #eeeeeee1;

}
 
</style>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      
      <?php include ('header.php'); ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div >
            <h1> PROFILE
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <form id="updateProfile" name="updateProfile">
                  <div class="card">
                    <div class="single-detail">
                      <div class="main-title">PROFILE SETTINGS</div>
                      <div class="info-desc">
                        <div class="row">
                            <div class="col-md-12">                        
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">OWNER NAME:</label>
                                    <div class="col-sm-9">
                                       <input id="txtname" name="txtname" type="text" class="form-control" value="<?php echo $has_data['name']; ?>" required>
                                       <input id="txtshopkeeperid" name="txtshopkeeperid" type="hidden"  value="<?php echo $has_data['id']; ?>" required>
                                    </div>
                                    <div class="clearfix"></div>
                                  </div> 
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">PROFILE IMAGE:</label>
                                    <div class="col-sm-9">
                                       <input id="profileimg" name="profileimg" type="file" class="form-control" >
                                      
                                    </div>
                                    <div class="clearfix"></div>
                                  </div> 
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-3" for="email">CONTACT NUMBER:</label>
                                <div class="col-sm-9">
                                  <input id="txtphone" name="txtphone" type="text" class="form-control" pattern="[6789][0-9]{9}" value="<?php echo $has_data['phone']; ?>" required>
                                </div>
                                <div class="clearfix"></div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-3" for="email">EMAIL ID:</label>
                                <div class="col-sm-9">
                                  <input id="txtemail" name="txtemail" type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $has_data['email']; ?>" required>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                              


                            <div class="row">
                            <div class="col-md-9"> 

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">SHOP NAME:</label>
                                <div class="col-sm-8">
                                  <input id="txtshopname" name="txtshopname" type="text" class="form-control" value="<?php echo $has_data['shopname']; ?>" required>
                                </div>
                                <div class="clearfix"></div>
                              </div> 

                               <div class="form-group">
                                <label class="control-label col-sm-4" for="email">SHOP IMAGE:</label>
                                <div class="col-sm-8">
                                   <input type="file" accept=".jpg, .jpeg, .png, .gif" id="fileimg" name="fileimg" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                              </div> 


                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">MINIMUM AMOUNT FOR HOME DELIVERY:</label>
                                <div class="col-sm-8">
                                   <input id="txtminorder" name="txtminorder" type="number" min="0" class="form-control" value="<?php echo $has_data['min_order_amount']; ?>" required>
                                </div>
                                <div class="clearfix"></div>
                              </div>

                                
                            </div>
                            <div class="col-md-3">
                               <div class="shop-img">
                                  <?php 
                                    $image = $vendorimages."shopkeeper.jpg";
                                    if($has_data != 'error'){
                                      if($has_data['image'] != ""){  
                                          $image = $vendorimages.$has_data['image'];
                                      }
                                    }
                                  ?>
                                  <div class="img-cont">
                                      <img style="width: 100%; max-height: 150px;"  src="<?php  echo $image; ?>">
                                  </div>
                               </div>
                              
                            </div>
                            <div class="clearfix"></div>


                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">SHOP ADDRESS:</label>
                                <div class="col-sm-9">
                                  <textarea id="txtfulladdress" name="txtfulladdress" class="form-control" required><?php echo $has_data['address']; ?></textarea>
                                </div>
                                <div class="clearfix"></div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-3" for="email">PINCODE:</label>
                                <div class="col-sm-9">
                                   <input id="txtpincode" name="txtpincode" type="text" class="form-control" pattern="[0-9]{6}" value="<?php echo $has_data['pincode']; ?>" required >
                                </div>
                                <div class="clearfix"></div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label col-sm-6" for="email">SHOP OPEN TIME:</label>
                                      <div class="col-sm-6">
                                         <input id="txtopentime" name="txtopentime" type="time" class="form-control" pattern="[0-9]{6}" value="<?php echo $has_data['open_time']; ?>" required >
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="control-label col-sm-6" for="email">SHOP CLOSE TIME:</label>
                                      <div class="col-sm-6">
                                         <input id="txtclosetime" name="txtclosetime" type="time" class="form-control" value="<?php echo $has_data['close_time']; ?>" required >
                                      </div>
                                      <div class="clearfix"></div>
                                    </div>
                                </div>
                              </div>

                            <div class="savemsg"></div>
                             <div class="form-group text-center">
                                 <button class="btn btn-primary" type="submit"> SAVE PROFILE </button>
                                <div class="clearfix"></div>
                              </div>
                            </div>

        
                            </div>
                        </div>
                      </div>
                    </div> 
                  </div>
              </form>
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

        // function switchShop(){
        //   alert('helllo');
        // }

        $(function(){

            
            $('.main-title').parent().find('.info-desc').hide();
            $('.single-detail:first-child').find('.info-desc').show();

            $('.main-title').click(function(){
              $('.info-desc').slideUp(500);
              $(this).parent().find('.info-desc').slideDown(500);
            })



            $('#storeOnOff').change(function(){
            // alert('helllo');
              var chechData  = 0; 
              if($(this).prop("checked") == true){
                chechData  = 1; 
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
        })


        $('#updateProfile').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');

            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>save-profile.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('.savemsg').removeClass(' alert alert-info');
                    $('.savemsg').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('.savemsg').html('Successfully saved');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    if(data == "phoneemail"){
                        $('.savemsg').html('Error to save profile mobile no register with other shop');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-warning');
                        return true;
                    }
                    $('.savemsg').html('Error to  save profile, retry');
                    $('.savemsg').show().delay(5000).fadeOut();
                    $('.savemsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });



       
        
      </script>
  </body>
</html>