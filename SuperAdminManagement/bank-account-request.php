<?php

@session_start();

$search = '';
if(!empty($_GET['search'])){
	$search = $_GET['search'];
}

include('url.php');

$service_url = $apiurl."getBankAccountRequest";
$curl = curl_init($service_url);
$curl_post_data = array(
  "api_key" => $api_key,
  "search" => $search
);

$curl_post_data_json = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data_json);

$curl_response = curl_exec($curl);
// print_r($curl_response);
curl_close($curl);

$response = json_decode($curl_response, true);
$has_no_account_req = $response['error'];
$has_account_req = $response['message'];


// print_r($has_account_req);

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

.shopstatus{

}

.main-title{
  background-color: #000;
    color: #fff;
    padding: 4px 10px;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
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
              <div class="col-md-9"> <h1> Request To change Bank Account </h1> </div>
              <div class="col-md-3">                 
                 <form id="searchform">
                    <input type="text" name="search" id="search" class="form-control input-sm" placeholder="search" value="<?php echo $search; ?>">
                 </form>
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
                        <th>SHOP DETAIL</th>
                        <th>BANK NAME</th>
                        <th>ACCOUNT NUMBER</th>
                        <th>IFSC CODE</th>
                        <th>BRANCH ADDRESS</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                      if(count($has_account_req) > 0){
                        for ($i=0; $i < count($has_account_req); $i++) { 
                          $class = 'warning';
                          $sText = 'Pending';
                          if($has_account_req[$i]['status'] == 1){
                            $class = 'info';
                            $sText = 'Active';
                          }
                          if($has_account_req[$i]['status'] == 2){
                            $class = 'danger';
                            $sText = 'Rejected';
                          }

                           $profileUrl = $superAdminRedirect."profile/".$has_account_req[$i]['username']."/".$has_account_req[$i]['shopcode'];

                      ?>
                        <tr class="<?php echo $class; ?>">

                           <td> 
                            <div><b> <a target="_blank" href="<?php echo $profileUrl; ?>"><?php echo strtoupper($has_account_req[$i]['shopname']); ?></a> </b></div>
                            <div> <i class="fa fa-map-marker"></i> <?php echo strtoupper($has_account_req[$i]['pincode']); ?> </div>
                          </td>

                          <td><?php echo $has_account_req[$i]['bank_name'] ?></td>
                          <td><?php echo $has_account_req[$i]['account_no'] ?></td>
                          <td><?php echo $has_account_req[$i]['ifsc_code'] ?></td>
                          <td><?php echo $has_account_req[$i]['branch'] ?></td>
                          <td><?php echo $sText; ?></td>
                          <td> <button 
                              data-toggle="modal" 
                              data-id="<?php echo $has_account_req[$i]['id']; ?>"
                              data-user_id="<?php echo $has_account_req[$i]['user_id']; ?>"
                              data-target="#modalAccountAction" 
                              class="btn btn-warning btn-sm"
                              onclick="$('#txtactionid').val($(this).attr('data-id'));$('#txtuserid').val($(this).attr('data-user_id'))" 
                              >ACTION</button></td>
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
      
      <div id="modalViewShopImage" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
               <img src="<?php echo $image; ?>" style="width: 100%; max-height: 500px;"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>


      <div id="modalAccountAction" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ACCOUNT  STATUS</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="formAccountStatus" id="formAccountStatus">
                <input type="hidden" class="form-control" id="txtuserid" name="txtuserid">
                <input type="hidden" class="form-control" id="txtactionid" name="txtactionid">
                 <div class="form-group" >
                  <label for="email">ACTION:</label>
                  <select class="form-control" id="txtactiontype" name="txtactiontype" required>
                    <option value="">SELECT BANK ACCOUNT STATUS</option>
                    <option value="1">ACCEPT REQUEST</option>
                    <option value="2">REJECT REQUEST</option>
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

       
    </div>
    <!-- Javascripts-->
    <script src="<?php echo $vendorAssets; ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/plugins/pace.min.js"></script>
    <script src="<?php echo $vendorAssets; ?>js/main.js"></script>

    <script type="text/javascript">
    $(function(){
        $("#search").keyup(function () {
            var value = this.value.toLowerCase().trim();
            $("table tr").each(function (index) {
                if (!index) return;
                $(this).find("td").each(function () {
                    var id = $(this).text().toLowerCase().trim();
                    var not_found = (id.indexOf(value) == -1);
                    $(this).closest('tr').toggle(!not_found);
                    return not_found;
                });
            });
        });
    })
</script>

      <script type="text/javascript">


         $('#formAccountStatus').on('submit', function(e){       
            e.preventDefault();

            $('#showmessage').removeClass(' alert alert-info');
            $('#showmessage').removeClass(' alert alert-success');
            $('#showmessage').removeClass(' alert alert-danger');
 
            $('#showmessage').html('Please wait');
            $('#showmessage').show().delay(5000).fadeOut();
            $('#showmessage').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $superAdminScript;?>bank-account-action.php',
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
                        $('#showmessage').html('Successfully changed');
                        $('#showmessage').show().delay(5000).fadeOut();
                        $('#showmessage').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                     
                    $('#showmessage').html('Error to chnge shopkeeper bank account status, retry');
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