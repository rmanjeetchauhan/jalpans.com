<?php

@session_start();

include('url.php');
$service_url = $apiurl."getShopkeepers";
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
    <title>Jalpans.com | Shopkeepers</title>
    <style type="text/css">
      .btn-black{
        background-color:  #000;
        color:  #fff;
      }
    </style>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      
      <?php include ('header.php'); ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div >
            <h1> Shopkeepers
            </h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- <h3 class="card-title">Responsive Table</h3> -->
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>NAME</th>
                            <th>CONTACT</th>
                            <!-- <th>EMAIL</th> -->
                            <!-- <th>ADDRESS</th> -->
                            <th>PINCODE</th>
                            <th>MIN. ORDER</th>
                            <!-- <th>JOIN DATE</th> -->
                            <th>STATUS</th>
                            <th>SOLD AMOUNT</th>
                            <th>PAY AMOUNT</th>
                            <th>PROFILE</th>
                            <th>EDIT PROFILE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        if($has_data != 'error'){
                            $count = 0;
                            for ($i=0; $i < count($has_data); $i++) {
                              $backcolor = "danger";
                              $textshow = "Deactive";
                              if($has_data[$i]['status']  == 1){
                                $backcolor = "info";
                                $backcolor = "";
                                $textshow = "Active";
                              }

                              $image = $vendorimages."vendorimg.png";
                              if($has_data[$i]['image'] != ""){
                                $image = $vendorimages.$has_data[$i]['image'];
                              }

                              $profileUrl = $superAdminRedirect."profile/".$has_data[$i]['username']."/".$has_data[$i]['shopcode'];
                              $profileEditUrl = $superAdminRedirect."edit-profile/".$has_data[$i]['username']."/".$has_data[$i]['shopcode'];

                              $soldAmountHistory = $superAdminRedirect."shop-sold-amount-history/".$has_data[$i]['username']."/".$has_data[$i]['shopcode'];

                        ?>

                        <tr class="<?php echo $backcolor; ?>">
                            <th><?php echo ++$count; ?></th>
                            <th> <center><img src="<?php echo $image; ?>" style="height: 40px; width:40px;"></center></th>
                            <td> <?php echo $has_data[$i]['name']; ?> </td>
                            <td> <?php echo $has_data[$i]['phone']; ?> </td>
                            <!-- <td> <?php echo $has_data[$i]['email']; ?> </td> -->
                            <!-- <td><?php echo $has_data[$i]['address']; ?></td> -->
                            <td><?php echo $has_data[$i]['pincode']; ?></td>
                            <td>₹ <?php echo $has_data[$i]['min_order_amount']; ?></td>
                            <!-- <td><?php echo $has_data[$i]['creation_date']; ?></td> -->
                            <td><b><?php echo $textshow ?></b></td>

                            <td>
                              <a class="btn btn-success btn-sm" href="<?php echo $soldAmountHistory; ?>">SOLD HISTORY</a>
                            </td>
                            <td>
                              <button class="btn btn-black btn-block btn-sm" >₹ <?php echo $has_data[$i]['wallet']; ?></button>
                            </td>

                            <td>
                              <a class="btn btn-primary btn-sm" href="<?php echo $profileUrl; ?>">PROFILE</a>
                            </td>

                            <td>
                              <a class="btn btn-info btn-sm" href="<?php echo $profileEditUrl; ?>">EDIT PROFILE</a>
                            </td>

                            <td>
                              <button 
                              data-toggle="modal" 
                              data-id="<?php echo $has_data[$i]['id']; ?>"
                              data-target="#profileAction" 
                              class="btn btn-warning btn-sm"
                              onclick="$('#txtuserid').val($(this).attr('data-id'));" 
                              >ACTION</button>
                            </td>
 
                        </tr>

                       <!--  <tr  >
                            <th colspan="6">BANK NAME</th>
                            <th colspan="2"> ACCOUNT NUMBER</th>
                            <th colspan="3"> IFSC CODE</th>
                        </tr>
                        <tr  >
                            <td colspan="6"> <?php if($has_data[$i]['bank_name'] != ""){ echo $has_data[$i]['bank_name']; }else { echo '-'; } ?> </td>
                            <td colspan="2"> <?php if($has_data[$i]['account_no'] != ""){ echo $has_data[$i]['account_no']; }else { echo '-'; } ?> </td>
                            <td colspan="3"> <?php if($has_data[$i]['ifsc_code'] != ""){ echo $has_data[$i]['ifsc_code']; }else { echo '-'; } ?> </td>
                        </tr> -->

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

      <div id="profileAction" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">SHOPKEEPER STATUS</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="formProfileAction" id="formProfileAction">
                <input type="hidden" class="form-control" id="txtuserid" name="txtuserid">
                 <div class="form-group" >
                  <label for="email">ACTION:</label>
                  <select class="form-control" id="txtactiontype" name="txtactiontype" required>
                    <option value="">SELECT SHOP STATUS</option>
                    <option value="1">ACTIVE</option>
                    <option value="2">DEACTIVE</option>
                    <option value="0">DELETE PARMANENT</option>
                  </select>
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



       <div id="modalPayShopkeeperAmount" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">PAY SHOPKEEPER AMOUNT</h4>
            </div>
            <div class="modal-body">
              <form id="formAddAccount" name="formAddAccount"> 
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">NAME:</label>
                    <div class="col-sm-9">
                      <input type="text" id="txtname" name="txtname" class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">CONTACT NUMBER:</label>
                    <div class="col-sm-9">
                      <input id="txtphone" name="txtphone" type="text" class="form-control" pattern="[6789][0-9]{9}"  required>
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">CONTACT NUMBER2 <small>(optional)</small>:</label>
                    <div class="col-sm-9">
                      <input id="txtphone2" name="txtphone2" pattern="[6789][0-9]{9}" type="text" class="form-control" >
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">EMAIL <small>(optional)</small>:</label>
                    <div class="col-sm-9">
                     <input id="txtemail" name="txtemail" type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
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
    </div>



    <!-- Javascripts-->
    <script src="<?php echo $vendorAssets; ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/plugins/pace.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/main.js"></script>

      <script type="text/javascript">

        $('#formProfileAction').on('submit', function(e){       
            e.preventDefault();

            $('#showmessage').removeClass(' alert alert-info');
            $('#showmessage').removeClass(' alert alert-success');
            $('#showmessage').removeClass(' alert alert-danger');

            if($('#txtemail').val() == "" || $('#txtpassword').val() == "" ){
              $('#showmessage').html('Enter a valid Email and password');
              $('#showmessage').show().delay(3000).slideUp(1000);
              $('#showmessage').addClass(' alert alert-danger');
              return false;
            }

            $('#showmessage').html('Please wait');
            $('#showmessage').show().delay(5000).fadeOut();
            $('#showmessage').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $superAdminScript; ?>shopkeeper-action.php',
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
                        $('#showmessage').html('Successfully updated');
                        $('#showmessage').show().delay(5000).fadeOut();
                        $('#showmessage').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                     
                    $('#showmessage').html('Error to update shopkeeper account, retry');
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