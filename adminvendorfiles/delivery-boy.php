<?php

@session_start();

 

include('url.php');
$service_url = $apiurl."getDeliveryBoyList";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "id" => $_SESSION['vendor']['id']
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
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main.css">
    <title>Jalpans.com |  DELIVERY BOY</title>

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
          <div class="titlecont">
            <div class="row">
              <div class="col-md-7"> <h1>  DELIVERY BOY  </h1> </div>
              <div class="col-md-3">
                 
                 <form id="searchform">
                    <input type="text" name="search" id="search" class="form-control input-sm" placeholder="search">
                 </form>
              </div>
              <div class="col-md-2">
                 <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modalAddDelBoyAccount">ADD DELIVERY BOY</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
             <div class="card">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NAME</th>
                        <th>CONTACT NO</th>
                        <th>ALTERNET NUMBER</th>
                        <th>ADDRESS</th>
                        <th>STATUS</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                      $count = 0;
                      if(count($has_data) > 0){
                        for ($i=0; $i < count($has_data); $i++) { 
                          $class = 'danger';
                          $sText = 'Deactive';
                          $cval =  1;
                          $ctxt =  'ACTIVE';
                          if($has_data[$i]['status'] == 1){
                            $class = '';
                            $sText = 'Active';
                            $ctxt =  'DEACTIVE';
                            $cval =  2;
                          }
                      ?>
                        <tr class="<?php echo $class; ?>">
                          <td><?php echo ++$count; ?></td>
                          <td><?php echo $has_data[$i]['name'] ?></td>
                          <td><?php echo $has_data[$i]['phone'] ?></td>
                          <td><?php echo $has_data[$i]['phone2'] ?></td>
                          <td><?php echo $has_data[$i]['address'] ?></td>
                          <td><button 
                            class="btn btn-sm btn-primary"                            
                            data-id="<?php echo $has_data[$i]['id']; ?>"
                            data-text="<?php echo $ctxt; ?>"
                            data-value="<?php echo $cval; ?>"
                            data-toggle="modal" data-target="#modalStatusDelBoyAccount"
                            onclick="
                            $('#stxtid').val($(this).attr('data-id'));
                            $('#txtstatus').val($(this).attr('data-value'));
                            $('.stxt').html($(this).attr('data-text')); 
                            "><?php echo $sText; ?></button></td>
                          <td><button 
                          class="btn btn-sm btn-success"
                          data-id="<?php echo $has_data[$i]['id']; ?>"
                          data-name="<?php echo $has_data[$i]['name']; ?>"
                          data-phone="<?php echo $has_data[$i]['phone']; ?>"
                          data-phone2="<?php echo $has_data[$i]['phone2']; ?>"
                          data-address="<?php echo base64_encode($has_data[$i]['address']); ?>"
                          data-toggle="modal" data-target="#modalEditDelBoyAccount"
                          onclick="
                          $('#etxtid').val($(this).attr('data-id'));
                          $('#etxtdelboyname').val($(this).attr('data-name'));
                          $('#etxtphone1').val($(this).attr('data-phone'));
                          $('#etxtphone2').val($(this).attr('data-phone2'));
                          $('#etxtaddress').val(atob($(this).attr('data-address')));
                          "> Edit</button></td>
                          <td><button 
                            class="btn btn-sm btn-danger"
                            data-id="<?php echo $has_data[$i]['id']; ?>"
                            data-toggle="modal" data-target="#modalDeleteDelBoyAccount"
                            onclick="$('#dtxtid').val($(this).attr('data-id'));"> DELETE</button></td>
                        </tr>
                      <?php
                        }
                      }
                      ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div id="modalAddDelBoyAccount" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD DELIVERY BOY</h4>
            </div>
            <div class="modal-body">
              <form id="formAddAccount" name="formAddAccount"> 
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">NAME:</label>
                    <div class="col-sm-9">
                      <input type="text" id="txtdelboyname" name="txtdelboyname" class="form-control" required>
                      <input type="hidden" name="txtuserid" id="txtuserid" value="<?php echo $_SESSION['vendor']['id']; ?>">
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">CONTACT NUMBER:</label>
                    <div class="col-sm-9">
                      <input id="txtphone1" name="txtphone1" type="text" class="form-control"  required>
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">OPTIONAL NUMBER:</label>
                    <div class="col-sm-9">
                      <input id="txtphone2" name="txtphone2" type="text" class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">ADDRESS:</label>
                    <div class="col-sm-9">
                      <textarea id="txtaddress" name="txtaddress" class="form-control" required></textarea>
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
                    <button type="submit" class="btn btn-primary"> CREATE ACCOUNT </button>
                    <div class="clearfix"></div>
                  </div>  
              </form>
            </div>
            
          </div>

        </div>
      </div>

      <div id="modalEditDelBoyAccount" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ADD DELIVERY BOY</h4>
            </div>
            <div class="modal-body">
              <form id="formEditAccount" name="formEditAccount"> 
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">NAME:</label>
                    <div class="col-sm-9">
                      <input type="text" id="etxtdelboyname" name="etxtdelboyname" class="form-control" required>
                      <input type="hidden" name="etxtid" id="etxtid">
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">CONTACT NUMBER:</label>
                    <div class="col-sm-9">
                      <input id="etxtphone1" name="etxtphone1" type="text" class="form-control"  required>
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">OPTIONAL NUMBER:</label>
                    <div class="col-sm-9">
                      <input id="etxtphone2" name="etxtphone2" type="text" class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">ADDRESS:</label>
                    <div class="col-sm-9">
                      <textarea id="etxtaddress" name="etxtaddress" class="form-control" required></textarea>
                    </div>
                    <div class="clearfix"></div>
                  </div> 
 
                  <div class="form-group text-center">
                    <div class="savemsg"></div>
                    <button type="submit" class="btn btn-primary"> SAVE ACCOUNT </button>
                    <div class="clearfix"></div>
                  </div>  
              </form>
            </div>
            
          </div>

        </div>
      </div>

      <div id="modalDeleteDelBoyAccount" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">DELETE DELIVERY BOY</h4>
            </div>
            <div class="modal-body">
              <form id="formDeleteAccount" name="formDeleteAccount"> 
                  <div class="form-group">
                   <h4 class="text-center">ARE YOU SURE YOU WANT TO DELETE THIS ACCOUNT ?</h4>
                    <input type="hidden" name="dtxtid" id="dtxtid">
                  </div> 
 
                  <div class="form-group text-center">
                    <div class="savemsg"></div>
                    <button type="submit" class="btn btn-danger"> DELETE ACCOUNT </button>
                    <div class="clearfix"></div>
                  </div>  
              </form>
            </div>            
          </div>
        </div>
      </div>

      <div id="modalStatusDelBoyAccount" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">STATUS DELIVERY BOY</h4>
            </div>
            <div class="modal-body">
              <form id="formStatusAccount" name="formStatusAccount"> 
                  <div class="form-group">
                   <h4 class="text-center">ARE YOU SURE YOU WANT TO <span class="stxt"></span> THIS ACCOUNT ?</h4>
                    <input type="hidden" name="stxtid" id="stxtid">
                    <input type="hidden" name="txtstatus" id="txtstatus"> 
                  </div> 
 
                  <div class="form-group text-center">
                    <div class="savemsg"></div>
                    <button type="submit" class="btn btn-primary"> <span class="stxt"></span> ACCOUNT </button>
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

        $('#formAddAccount').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');

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
                url: '<?php echo $vendorScript; ?>add-delivery-boy.php',
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
                        $('.savemsg').html('Successfully added');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    if(data == "phoneemail"){
                        $('.savemsg').html('Contact number already registered');
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



      $('#formEditAccount').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');
 
            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>edit-delivery-boy.php',
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
                        $('.savemsg').html('Successfully saved');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    if(data == "phoneemail"){
                        $('.savemsg').html('Contact number already registered');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-danger');
                        return true;
                    }                     
                    $('.savemsg').html('Error to save profile, retry');
                    $('.savemsg').show().delay(5000).fadeOut();
                    $('.savemsg').addClass(' alert alert-danger');
                    return false;
                }
            });
        });



       $('#formDeleteAccount').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');
 
            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>delete-delivery-boy.php',
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
                        $('.savemsg').html('Successfully deleted');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    $('.savemsg').html('Error to delete profile, retry');
                    $('.savemsg').show().delay(5000).fadeOut();
                    $('.savemsg').addClass(' alert alert-danger');
                    return false;
                }
            });
        });


       $('#formStatusAccount').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');
 
            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>status-delivery-boy.php',
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
                        $('.savemsg').html('Successfully deleted');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    $('.savemsg').html('Error to delete profile, retry');
                    $('.savemsg').show().delay(5000).fadeOut();
                    $('.savemsg').addClass(' alert alert-danger');
                    return false;
                }
            });
        });



       
        
      </script>
  </body>
</html>