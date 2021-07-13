<?php

@session_start();

 

include('url.php');
$service_url = $apiurl."getShopkeeperBankAccount";
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
           <div class="titlecont">
            <div class="row">
              <div class="col-md-7"> <h1>  BANK ACCOUNT </h1> </div>              
              <div class="col-md-3">                 
                 <form id="searchform">
                    <input type="text" name="search" id="search" class="form-control input-sm" placeholder="search">
                 </form>
              </div> 
              <div class="col-md-2"><button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modalChangeBankAccount">Change Bank Account</button></div>             
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
                        <th>BANK NAME</th>
                        <th>ACCOUNT NUMBER</th>
                        <th>IFSC CODE</th>
                        <th>BRANCH ADDRESS</th>
                        <th>STATUS</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                      if(count($has_data) > 0){
                        for ($i=0; $i < count($has_data); $i++) { 
                          $class = 'warning';
                          $sText = 'Pending';
                          if($has_data[$i]['status'] == 1){
                            $class = 'info';
                            $sText = 'Active';
                          }
                      ?>
                        <tr class="<?php echo $class; ?>">
                          <td><?php echo $has_data[$i]['bank_name'] ?></td>
                          <td><?php echo $has_data[$i]['account_no'] ?></td>
                          <td><?php echo $has_data[$i]['ifsc_code'] ?></td>
                          <td><?php echo $has_data[$i]['branch'] ?></td>
                          <td><?php echo $sText; ?></td>
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

      <div id="modalChangeBankAccount" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">REQUEST TO CHANGE BANK ACCOUNT</h4>
            </div>
            <div class="modal-body">
              <form id="formNewAccountRequest" name="formNewAccountRequest"> 
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">BANK NAME:</label>
                    <div class="col-sm-9">
                      <input type="text" id="txtbankname" name="txtbankname" class="form-control" required>
                      <input type="hidden" name="txtuserid" id="txtuserid" value="<?php echo $_SESSION['vendor']['id']; ?>">
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">ACCOUNT NUMBER:</label>
                    <div class="col-sm-9">
                      <input id="txtaccountno" name="txtaccountno" type="text" class="form-control"  required>
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">IFSC CODE:</label>
                    <div class="col-sm-9">
                      <input id="txtifsccode" name="txtifsccode" type="text" class="form-control" required>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="email">BANK BRANCH ADDRESS:</label>
                    <div class="col-sm-9">
                      <textarea id="txtbankbranch" name="txtbankbranch" class="form-control" required></textarea>
                    </div>
                    <div class="clearfix"></div>
                  </div> 

                  <div class="form-group text-center">
                    <div class="savemsg"></div>
                    <button type="submit" class="btn btn-primary"> SEND REQUEST </button>
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

        $('#formNewAccountRequest').on('submit', function(e){       
            e.preventDefault();

            $('.savemsg').removeClass(' alert alert-info');
            $('.savemsg').removeClass(' alert alert-success');
            $('.savemsg').removeClass(' alert alert-danger');

            $('.savemsg').html('Please wait');
            $('.savemsg').show().delay(5000).fadeOut();
            $('.savemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>change-bank-account.php',
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
                        $('.savemsg').html('Request successfully submitted');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-success');
                        location.reload();
                        return true;
                    }
                    if(data == "pending"){
                        $('.savemsg').html('A change request is already in pending.');
                        $('.savemsg').show().delay(5000).fadeOut();
                        $('.savemsg').addClass(' alert alert-warning');
                        return true;
                    }
                    $('.savemsg').html('Error to  send request, retry');
                    $('.savemsg').show().delay(5000).fadeOut();
                    $('.savemsg').addClass(' alert alert-danger');
                    return false;
                }
            });
        });



       
        
      </script>
  </body>
</html>