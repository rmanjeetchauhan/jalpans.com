<?php

@session_start();

 

include('url.php');
$service_url = $apiurl."getAdminCommission";
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
$has_no_commission = $response['error'];
$has_commission = $response['message'];

// print_r($has_data);


$service_url = $apiurl."getProductsList";
$curl = curl_init($service_url);
$curl_post_data = array( 
  "id" => $_SESSION['vendor']['id'],
  "ip_address" => '',
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

$service_url = $apiurl."getUnit";
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
$has_no_unit = $response['error'];
$has_unit = $response['message'];

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
    <title>Jalpans.com | Products</title>
    <style type="text/css">
      .maintr{
        background-color: #040d3c !important;
        color: #fff;
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
              <div class="col-md-7"> <h1> Products </h1> </div>   
               <div class="col-md-3">                 
                 <form id="searchform">
                    <input type="text" name="search" id="search" class="form-control input-sm" placeholder="search">
                 </form>
              </div>            
              <div class="col-md-2">                 
                <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modalAddProduct">Add Product</button>
              </div> 
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- <h3 class="card-title">Responsive Table</h3> -->
              <div class="table-responsive">
                <table class="table table-hover table-striped table-condensed">

                    <tbody>
                        <?php

                        if( count($has_data)){                            
                            for ($i=0; $i < count($has_data); $i++) {
                        ?>
                          <tr class="maintr">
                            <th>Name</th>
                            <th colspan="5">Description</th>
                            <td> 
                              <button data-id="<?php echo $has_data[$i]['id'];?>" data-toggle="modal" data-target="#modalAddProductAttribute" class="btn btn-sm btn-info" onclick="$('#txtproductid').val($(this).attr('data-id'))">&nbsp;&nbsp;<i class="fa fa-plus-square-o"></i> Add&nbsp; </button>
                            </td>
                             <td> 
                              <button data-id="<?php echo $has_data[$i]['id'];?>" data-toggle="modal" data-target="#modalDeleteProduct" class="btn btn-sm btn-danger" onclick="$('#txtproductdeleteid').val($(this).attr('data-id'))">&nbsp;&nbsp;<i class="fa fa-trash"></i> Delete&nbsp; </button>
                            </td>
                          </tr>
                          <tr> 
                            <td><div><b><?php echo ucwords(strtolower($has_data[$i]['name'])); ?></b></div></td>
                            <td colspan="7"><?php echo $has_data[$i]['description'];?></td>
                            
                          </tr>
                          <tr>
                            <th>Sl No</th>
                            <th>Photo</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <!-- <th>Comission</th> -->
                            <th>GST</th>
                            <th>STATUS</th>
                            <th>Action</th>
                          </tr>
                        <?php
                              $count = 0;
                              for ($j=0; $j < count($has_data[$i]['products']); $j++) { 
                                $image = $vendorimages."default_product.jpg";
                                if($has_data[$i]['products'][$j]['image'] != ""){
                                  $image = $vendorimages.$has_data[$i]['products'][$j]['image'];
                                }
                                // print_r($has_data[$i]['products']);
                        ?>
                        <tr>
                          <td><b><?php echo ++$count; ?></b></td>
                          <td> <img src="<?php echo $image; ?>" style="height: 40px; width:60px;"></td>
                       
                        <td> 
                           <?php echo $has_data[$i]['products'][$j]['quantity']." ".$has_data[$i]['products'][$j]['measure']; ?> 
                        </td>
                        <td> 
                          <b>₹ <?php echo $has_data[$i]['products'][$j]['amount'] ?></b> 
                        </td>
                        <td> ₹ <?php echo $has_data[$i]['products'][$j]['discount']; ?></td>
                        <!-- <td>  <?php echo (int) $has_data[$i]['products'][$j]['comission']; ?>%  </td> -->
                        <td> <?php echo (int)$has_data[$i]['products'][$j]['gst']; ?>%</td>

                        <td> 
                          <select data-attribute="<?php echo $has_data[$i]['products'][$j]['id'] ?>" class="form-controlt txtattributeonoff" name="txtattributeonoff" onchange="changeattributestatus(thisObj)" >
                              <option value="1" <?php if($has_data[$i]['products'][$j]['status'] == 1){ echo 'selected'; } ?>>ON</option>
                              <option value="2" <?php if($has_data[$i]['products'][$j]['status'] == 2){ echo 'selected'; } ?>>OFF</option>
                          </select> 
                        </td> 
                        
                        
                        <td> 
                          <button 
                          class="btn btn-sm btn-success"
                          data-toggle="modal"
                          data-target="#modalEditProductAttribute"
                          data-id="<?php echo $has_data[$i]['products'][$j]['id'] ?>"
                          data-quantity="<?php echo $has_data[$i]['products'][$j]['quantity'] ?>"
                          data-unit="<?php echo $has_data[$i]['products'][$j]['unit'] ?>"
                          data-rate="<?php echo $has_data[$i]['products'][$j]['rate'] ?>"
                          data-discount="<?php echo $has_data[$i]['products'][$j]['discount'] ?>"
                          data-gst="<?php echo $has_data[$i]['products'][$j]['gst'] ?>"                           
                          onclick="findEditdata(this);"
                          ><i class="fa fa-pencil-square-o"></i></button>
                          <button 
                          class="btn btn-sm btn-danger"
                          data-toggle="modal"
                          data-target="#modalDeleteProductAttribute"
                          data-id="<?php echo $has_data[$i]['products'][$j]['id'] ?>"
                          onclick="$('#txtdeleteattrid').val($(this).attr('data-id'))"
                          ><i class="fa fa-trash"></i></button>
                        </td>
                         
                         </tr>
                        <?php
                              }
                        ?> 

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

      <div id="modalAddProduct" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Products</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="addproducts" id="addproducts">
                <input type="hidden" class="form-control" id="txtuserid" name="txtuserid" value="<?php echo $_SESSION['vendor']['id']; ?>">
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Name:</label>
                    <input type="text" class="form-control" id="txtname" name="txtname" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Quantity:</label>
                    <input type="number" min="1" class="form-control" id="txtquantity" name="txtquantity" required>
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Product Unit:</label>
                    <select class="form-control" id="txtselectunit" name="txtselectunit"  required>
                        <option> Select Unit</option>
                         <?php 
                         if(!empty($has_unit)){
                            foreach ($has_unit as $unit) {
                        ?>
                            <option value="<?php echo $unit['id']; ?>"> <?php echo $unit['name']; ?></option>
                        <?php
                            }
                         }
                         ?>
                    </select>
                  </div>
                </div>
 
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Rate:</label>
                    <input type="number" class="form-control" id="txtrate" name="txtrate" min="1">
                  </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Discount(Rs.):</label>
                    <input type="number" class="form-control" id="txtdiscount" name="txtdiscount" value="0" min="0">
                  </div>
                </div>
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">GST(%):</label>
                    <input type="number" class="form-control" id="txtgst" name="txtgst" value="0" min="0">
                  </div>
                </div>

               
                <div class="clearfix"></div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Amount:</label>
                    <input type="number" min="0" class="form-control" id="txtamount" name="txtamount" readonly required>
                    <div id="showamt"><small></small></div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Image:</label>
                    <input type="file" class="form-control" id="txtimage" name="txtimage" required>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="pwd">Description:</label>
                    <textarea class="form-control" id="txtdescription" name="txtdescription"></textarea>
                  </div>
                </div>
                <div class="clearfix"></div>
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

      <div id="modalAddProductAttribute" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Products</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="addproductAttributes" id="addproductAttributes">
                <input type="hidden" class="form-control" id="txtproductid" name="txtproductid" />
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Quantity:</label>
                    <input type="number" min="1" class="form-control" id="atxtquantity" name="txtquantity" required>
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Product Unit:</label>
                    <select class="form-control" id="atxtselectunit" name="txtselectunit"  required>
                        <option> Select Unit</option>
                         <?php 
                         if(!empty($has_unit)){
                            foreach ($has_unit as $unit) {
                        ?>
                            <option value="<?php echo $unit['id']; ?>"> <?php echo $unit['name']; ?></option>
                        <?php
                            }
                         }
                         ?>
                    </select>
                  </div>
                </div>
 
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Rate:</label>
                    <input type="number" class="form-control" id="atxtrate" name="txtrate" min="1">
                  </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Discount(Rs.):</label>
                    <input type="number" class="form-control" id="atxtdiscount" name="txtdiscount" value="0" min="0">
                  </div>
                </div>
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">GST(%):</label>
                    <input type="number" class="form-control" id="atxtgst" name="txtgst" value="0" min="0">
                  </div>
                </div>
 

                <div class="clearfix"></div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Amount:</label>
                    <input type="number" min="0" class="form-control" id="atxtamount" name="txtamount" readonly required>
                    <div id="ashowamt"><small></small></div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Image:</label>
                    <input type="file" class="form-control" id="atxtimage" name="txtimage" required>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
                
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
                <div id="ashowmessage" name="ashowmessage"></div> 
              </form>
            </div>          
          </div>
        </div>
      </div>



       <div id="modalEditProductAttribute" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update Product</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="editproductAttributes" id="editproductAttributes">
                <input type="hidden" class="form-control" id="etxtattrid" name="txtattrid" />
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Quantity:</label>
                    <input type="number" min="1" class="form-control" id="etxtquantity" name="txtquantity" required>
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Product Unit:</label>
                    <select class="form-control" id="etxtselectunit" name="txtselectunit"  required>
                        <option> Select Unit</option>
                         <?php 
                         if(!empty($has_unit)){
                            foreach ($has_unit as $unit) {
                        ?>
                            <option value="<?php echo $unit['id']; ?>"> <?php echo $unit['name']; ?></option>
                        <?php
                            }
                         }
                         ?>
                    </select>
                  </div>
                </div>
 
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Rate:</label>
                    <input type="number" class="form-control" id="etxtrate" name="txtrate" min="1">
                  </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Discount(Rs.):</label>
                    <input type="number" class="form-control" id="etxtdiscount" name="txtdiscount" value="0" min="0">
                  </div>
                </div>
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">GST(%):</label>
                    <input type="number" class="form-control" id="etxtgst" name="txtgst" value="0" min="0">
                  </div>
                </div>

               

                <div class="clearfix"></div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Amount:</label>
                    <input type="number" min="0" class="form-control" id="etxtamount" name="txtamount" readonly required>
                    <div id="eshowamt"><small></small></div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Image:</label>
                    <input type="file" class="form-control" id="etxtimage" name="txtimage" >
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
                <div id="showupdatemsg" name="showupdatemsg"></div> 
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
                
              </form>
            </div>
          
          </div>
        </div>
      </div>


       <div id="modalDeleteProductAttribute" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete Products</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="deleteProductAttribute" id="deleteProductAttribute">
                 <input type="hidden" class="form-control" id="txtdeleteattrid" name="txtdeleteattrid" required>
                 <h4 class="text-center">Are you sure, you want to delete this product ?</h4><br>
                
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-danger">DELETE PRODUCT</button>
                </div>
                <div id="showdelmsg" name="showdelmsg"></div> 
              </form>
            </div>
          
          </div>
        </div>
      </div>
      
      <div id="modalDeleteProduct" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Delete Products</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="formdeleteProduct" id="formdeleteProduct">
                 <input type="hidden" class="form-control" id="txtproductdeleteid" name="txtproductdeleteid" required>
                 <h4 class="text-center">Are you sure, you want to delete this product and its sub-products?</h4><br>
                
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-danger">DELETE PRODUCT</button>
                </div>
                <div id="showdelmsg" name="showdelmsg"></div> 
              </form>
            </div>
          
          </div>
        </div>
      </div>
      
       <div id="modalProductOnOff" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">ON/OFF Products</h4>
            </div>
            <div class="modal-body">
              <form action="#" name="formProductOnOff" id="formProductOnOff">
                 <input type="hidden" class="form-control" id="txtproductattributeid" name="txtproductattributeid" required>
                 <input type="hidden" class="form-control" id="txtproductattributeonoff" name="txtproductattributeonoff" required>
                 <h4 class="text-center">Are you sure, you want to <span id="ponoff"></span> this product attribute?</h4><br>
                
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-danger">CHANGE PRODUCT STATUS</button>
                </div>
                <div id="showdelmsg" name="showdelmsg"></div> 
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

        $('#addproducts').on('submit', function(e){       
            e.preventDefault();

            $('#showmessage').removeClass(' alert alert-info');
            $('#showmessage').removeClass(' alert alert-success');
            $('#showmessage').removeClass(' alert alert-danger');

            $('#showmessage').html('Please wait');
            $('#showmessage').show().delay(5000).fadeOut();
            $('#showmessage').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>add-product.php',
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
                        $('#showmessage').html('Product added successfully');
                        $('#showmessage').show().delay(5000).fadeOut();
                        $('#showmessage').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                    $('#showmessage').html('Error to  add product, retry');
                    $('#showmessage').show().delay(5000).fadeOut();
                    $('#showmessage').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });


        $('#addproductAttributes').on('submit', function(e){       
            e.preventDefault();

            $('#ashowmessage').removeClass(' alert alert-info');
            $('#ashowmessage').removeClass(' alert alert-success');
            $('#ashowmessage').removeClass(' alert alert-danger');

            $('#ashowmessage').html('Please wait');
            $('#ashowmessage').show().delay(5000).fadeOut();
            $('#ashowmessage').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>add-product-attribute.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#ashowmessage').removeClass(' alert alert-info');
                    $('#ashowmessage').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#ashowmessage').html('Product added successfully');
                        $('#ashowmessage').show().delay(5000).fadeOut();
                        $('#ashowmessage').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                    $('#ashowmessage').html('Error to  add product, retry');
                    $('#ashowmessage').show().delay(5000).fadeOut();
                    $('#ashowmessage').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });




        $('#editproductAttributes').on('submit', function(e){       
            e.preventDefault();

            $('#showupdatemsg').removeClass(' alert alert-info');
            $('#showupdatemsg').removeClass(' alert alert-success');
            $('#showupdatemsg').removeClass(' alert alert-danger');

            $('#showupdatemsg').html('Please wait');
            $('#showupdatemsg').show().delay(5000).fadeOut();
            $('#showupdatemsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>edit-product-attribute.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#showupdatemsg').removeClass(' alert alert-info');
                    $('#showupdatemsg').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#showupdatemsg').html('Product updated successfully');
                        $('#showupdatemsg').show().delay(5000).fadeOut();
                        $('#showupdatemsg').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                    $('#showupdatemsg').html('Error to  update product, retry');
                    $('#showupdatemsg').show().delay(5000).fadeOut();
                    $('#showupdatemsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });

        $('#deleteProductAttribute').on('submit', function(e){       
            e.preventDefault();

            $('#showdelmsg').removeClass(' alert alert-info');
            $('#showdelmsg').removeClass(' alert alert-success');
            $('#showdelmsg').removeClass(' alert alert-danger');

            $('#showdelmsg').html('Please wait');
            $('#showdelmsg').show().delay(5000).fadeOut();
            $('#showdelmsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>delete-product-attribute.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#showdelmsg').removeClass(' alert alert-info');
                    $('#showdelmsg').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#showdelmsg').html('Product deleted successfully');
                        $('#showdelmsg').show().delay(5000).fadeOut();
                        $('#showdelmsg').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                    $('#showdelmsg').html('Error to  delete product, retry');
                    $('#showdelmsg').show().delay(5000).fadeOut();
                    $('#showdelmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });


         $('#formdeleteProduct').on('submit', function(e){       
            e.preventDefault();

            $('#showdelmsg').removeClass(' alert alert-info');
            $('#showdelmsg').removeClass(' alert alert-success');
            $('#showdelmsg').removeClass(' alert alert-danger');

            $('#showdelmsg').html('Please wait');
            $('#showdelmsg').show().delay(5000).fadeOut();
            $('#showdelmsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>delete-product.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#showdelmsg').removeClass(' alert alert-info');
                    $('#showdelmsg').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#showdelmsg').html('Product deleted successfully');
                        $('#showdelmsg').show().delay(5000).fadeOut();
                        $('#showdelmsg').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                    $('#showdelmsg').html('Error to  delete product, retry');
                    $('#showdelmsg').show().delay(5000).fadeOut();
                    $('#showdelmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });
        
        // txtattributeonoff data-attribute
        
        // function changeattributestatus(thisObj){
            
        // }
        $(function(){
            $('.txtattributeonoff').change(function(){
                $('#txtproductattributeid').val($(this).attr('data-attribute'));
                $('#txtproductattributeonoff').val($(this).val());
                var showData = 'ON';
                
                if($(this).val() == 2){
                    showData = 'OFF';
                    $('#ponoff').val(showData)
                }
                $('#modalProductOnOff').modal('show');
                     
            })
        })


        $('#formProductOnOff').on('submit', function(e){       
            e.preventDefault();

            $('#showdelmsg').removeClass(' alert alert-info');
            $('#showdelmsg').removeClass(' alert alert-success');
            $('#showdelmsg').removeClass(' alert alert-danger');

            $('#showdelmsg').html('Please wait');
            $('#showdelmsg').show().delay(5000).fadeOut();
            $('#showdelmsg').addClass(' alert alert-info');
            // $('#myloader').show();
            $.ajax({
                url: '<?php echo $vendorScript; ?>change-product-status.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                async: true,
                success: function (data) { 

                    // console.log(data);
                    $('#showdelmsg').removeClass(' alert alert-info');
                    $('#showdelmsg').removeClass(' alert alert-warning');
                    if(data == "success"){
                        $('#showdelmsg').html('Product deleted successfully');
                        $('#showdelmsg').show().delay(5000).fadeOut();
                        $('#showdelmsg').addClass(' alert alert-success');
                        // window.location.href = '<?php echo $superAdminRedirect; ?>distributors';
                        location.reload();
                        return true;
                    }
                    $('#showdelmsg').html('Error to  delete product, retry');
                    $('#showdelmsg').show().delay(5000).fadeOut();
                    $('#showdelmsg').addClass(' alert alert-danger');
                    // $('#myloader').hide();
                    return false;
                }
            });
        });
        
        function findEditdata(thisObj){

          $('#etxtattrid').val($(thisObj).attr('data-id'));
          $('#etxtquantity').val($(thisObj).attr('data-quantity'));
          $('#etxtselectunit').val($(thisObj).attr('data-unit'));
          $('#etxtrate').val($(thisObj).attr('data-rate'));
          $('#etxtdiscount').val($(thisObj).attr('data-discount'));
          $('#etxtgst').val($(thisObj).attr('data-gst'));

          calculateEditAttributeAmount();
        }




        $(function(){
            $('#txtrate, #txtdiscount, #txtgst').keyup(function(){
              calculateAmount();
            })
            $('#txtrate, #txtdiscount, #txtgst').change(function(){
              calculateAmount();
            });

            $('#atxtrate, #atxtdiscount, #atxtgst').keyup(function(){
              calculateAttributeAmount();
            })
            $('#atxtrate, #atxtdiscount, #atxtgst').change(function(){
              calculateAttributeAmount();
            })
            $('#etxtrate, #etxtdiscount, #etxtgst').change(function(){
              calculateEditAttributeAmount();
            })
        });

        function calculateAmount(){

          var rate = $('#txtrate').val();
          var discount = $('#txtdiscount').val();          
          var gst = $('#txtgst').val();
           
          if(rate == ""){
            rate = 0;
          }
          
          if(discount == ""){
            discount = 0;
          }
          if(gst == ""){
            gst = 0;
          }

          rate =  parseFloat(rate);
          discount =  parseFloat(discount);          
          gst =  parseFloat(gst);

          var amount = (rate - discount);
          var gst = ((amount*gst)/100);          
          amount = amount + gst;

          var str = "+Rate : Rs."+rate+", -discount : Rs."+discount+", +GST : Rs."+gst;
          $('#showamt small').html(str);

          $('#showamt').css({"color":"#e91e63", "font-weight":"bold"});
          if(amount < 0){
            $('#showamt').css({"color":"#f00", "font-weight":"bold"});
          }
          $('#txtamount').val(amount);
        }

        function calculateAttributeAmount(){

          var rate = $('#atxtrate').val();
          var discount = $('#atxtdiscount').val();
          var gst = $('#atxtgst').val();

          if(rate == ""){
            rate = 0;
          }
          if(discount == ""){
            discount = 0;
          }
          if(gst == ""){
            gst = 0;
          }

          rate =  parseFloat(rate);
          discount =  parseFloat(discount);          
          gst =  parseFloat(gst);

          var amount = (rate - discount);
          var gst = ((amount*gst)/100);          
          amount = amount + gst;

          var str = "+Rate : Rs."+rate+", -discount : Rs."+discount+", +GST : Rs."+gst;
          $('#ashowamt small').html(str);

          $('#ashowamt').css({"color":"#e91e63", "font-weight":"bold"});
          if(amount < 0){
            $('#ashowamt').css({"color":"#f00", "font-weight":"bold"});
          }
          $('#atxtamount').val(amount);
        }

        function calculateEditAttributeAmount(){

          var rate = $('#etxtrate').val();
          var discount = $('#etxtdiscount').val();          
          var gst = $('#etxtgst').val();

          if(rate == ""){
            rate = 0;
          }
          if(discount == ""){
            discount = 0;
          }
          if(gst == ""){
            gst = 0;
          }

          rate =  parseFloat(rate);
          discount =  parseFloat(discount);          
          gst =  parseFloat(gst);

          var amount = (rate - discount);
          var gst = ((amount*gst)/100); 
          amount = amount + gst;

          var str = "+Rate : Rs."+rate+", -discount : Rs."+discount+", +GST : Rs."+gst;
          $('#eshowamt small').html(str);

          $('#eshowamt').css({"color":"#e91e63", "font-weight":"bold"});
          if(amount < 0){
            $('#eshowamt').css({"color":"#f00", "font-weight":"bold"});
          }
          $('#etxtamount').val(amount.toFixed(2));
        }
        
      </script>
  </body>
</html>