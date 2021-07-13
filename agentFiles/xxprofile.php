<?php
@session_start();

$id = $_SESSION['vendor']['id'];

$service_url = $apiurl."getDistributorsProfile";
$curl = curl_init($service_url);
$curl_post_data = array(
    "api_key" => $api_key,
    "id" => $id
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
    <link rel="icon" href="<?php echo $hotelimages ?>logo.png" type="image/x-icon">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $vendorAssets; ?>css/main4.css">
    <title>Recharge Portal | AGENT | Profile</title>

    <style type="text/css">
      .profiletitle{
        background-color: #2196f3;
        color: #fff;
      }

      .profiletitle td{
        text-align: center;
        letter-spacing: 1.5px;
      }

     /* .back-img{
        background-image: url(<?php echo $vendorimages ?>agent-dashboard.jpg);
       background-repeat: no-repeat;
    background-size: cover;
    background-position: center top;
    }*/

    .content-wrapper {
     
        background-color: transparent;
    }
    .card {
        /*background: #2f2f2f3b;*/
    }
    table tr{
        /*color: #fff !important;*/
    }

      /*.user-profile{   box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.3); } */
      
    </style>
  </head>
  <body class="sidebar-mini fixed back-img">
    <div class="wrapper">
      
      <?php include ('header.php'); ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>PROFILE</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Profile</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                
                <div class=" col-md-12">
                    <div class="user-profile">
                        <div class="table-responsive">
                            <table class="table   table-bordered  ">
                                <tr class="profiletitle">
                                    <th colspan="3"> PROFILE</th>
                                </tr>
                                <tr>

                                    <?php
                                        $profileimg = $vendorAssets.'icons/profile.ico';
                                        if($has_data['image'] != ""){
                                            $profileimg = $vendorimages.$has_data['image'];
                                        }
                                    ?>
                                    <th>Name</th>
                                    <td><?php echo $has_data['name'] ?></td>
                                    <td rowspan="4">
                                        <center>
                                            <img style="height: 120px; width: 120px; border-radius: 4px;" src="<?php echo $profileimg ?> "> 
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td style="color: #f00;">@<?php echo $has_data['username'] ?></td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td><?php echo $has_data['phone'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $has_data['email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td colspan="2"><?php echo $has_data['user_type'] ?></td>
                                </tr>
                                <tr>
                                    <th>Account Status</th>
                                    <td colspan="2">
                                        <?php 
                                            if($has_data['status'] == 0){
                                        ?>
                                            <b style="color: #f00">Not Active</b>

                                        <?php } else if($has_data['status'] == 1){ ?>

                                            <b style="color: green">Active</b>

                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td colspan="2"><?php echo $has_data['address'] ?></td>
                                </tr>

                                <tr>
                                    <th colspan="3"><center><button  data-toggle="modal" data-target="#updateprofilemodal" class="btn btn-primary btn-sm  ">EDIT PROFILE</button></center></th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>

 

        <div id="updateprofilemodal" class="modal fade" role="dialog">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><b>UPDATE PROFILE</b></h4>
              </div>
              <div class="modal-body">
                <form class=""  method="post" id="formUpdateprofile">
                    <input type="hidden" class="form-control" id="txtupdetprofileid" name="txtupdetprofileid" value="<?php echo $has_data['id'] ?>">

                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Name : </label>
                            <input type="text" class="form-control" id="txtname" name="txtname" placeholder="name" value="<?php echo $has_data['name'] ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Mobile No : </label>
                            <input type="text" class="form-control" id="txtphone" name="txtphone" placeholder="mobile no" value="<?php echo $has_data['phone'] ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email : </label>
                            <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="email" value="<?php echo $has_data['email'] ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Profile image : </label>
                            <input type="file" class="form-control" id="txtprofileing" name="txtprofileing">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Address : </label>
                            <textarea  class="form-control" id="txtaddress" name="txtaddress" placeholder="address"><?php echo $has_data['address'] ?></textarea>
                        </div>
                    </div>


                    </div> 
                    <div class="text-center"><button type="submit" class="btn btn-primary btn-sm">SAVE PROFILE</button></div>
                    <div class="clearfix"></div>
                    <div id="showmsg"></div>
                   <div class="clearfix"></div>
                </form>
              </div>
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
            $('#formUpdateprofile').on('submit', function(e){       
                e.preventDefault();

                $('#showmsg').removeClass(' alert alert-info');
                $('#showmsg').removeClass(' alert alert-success');
                $('#showmsg').removeClass(' alert alert-danger');

                $('#showmsg').html('Please wait');
                $('#showmsg').show().delay(5000).fadeOut();
                $('#showmsg').addClass(' alert alert-info');
                // $('#myloader').show();
                $.ajax({
                    url: '<?php echo $vendorScript; ?>update-profile.php',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    async: true,
                    success: function (data) { 

                        // console.log(data);
                        $('#showmsg').removeClass(' alert alert-info');
                        $('#showmsg').removeClass(' alert alert-warning');
                        if(data == "success"){
                            $('#showmsg').html('Profile successfully updated...');
                            $('#showmsg').show().delay(5000).fadeOut();
                            $('#showmsg').addClass(' alert alert-success');
                            location.reload();
                            return true;
                        }
                        else if(data == "phoneemail"){
                            $('#showmsg').html('Email or phone already exists, ');
                            $('#showmsg').show().delay(5000).fadeOut();
                            $('#showmsg').addClass(' alert alert-warning');
                            // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                            // location.reload();
                            return true;
                        }
                        $('#showmsg').html('Error to updated profile...');
                        $('#showmsg').show().delay(5000).fadeOut();
                        $('#showmsg').addClass(' alert alert-danger');
                        // $('#myloader').hide();
                        return false;
                    }
                });
            });
        })
    </script>

  </body>
</html>