<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author
 */
// include('../../assets/send-mail/emailHelper.php');
include('../send-message.php');
include('../micro.php');
class DbHandler {

    public function getDbConnection($input) {

        $api_key = $input->api_key;

        $con = mysqli_connect("localhost","jalpansc_dbjalpa", "*JalPansDB@2020#", "jalpansc_dbjalpans");
        // $con = mysqli_connect("localhost","root", "", "my_jalpans.com");
        
        if(!$con) {
            die('Connection Failed'.mysqli_error());
        }
  
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id FROM super_admin WHERE secure_key = "'.$api_key.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
          return $con;
        }
        return NULL;
    }


    public function superAdminLogin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $email = $input->email;
        $password = $input->password;

        $array['status'] = 0;
        $array['data'] = [];
 
        $sql = 'SELECT id, name, phone, email, image FROM super_admin WHERE email = "'.$email.'" AND password = "'.$password.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $data = mysqli_fetch_assoc($result);
            $data['id'] = (int)$data['id'];

            $array['status'] = 1;
            $array['data'] = $data;           
        }
        return $array;     
    }


    public function signupShopkeeper($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $agent_id = $input->agent_id;
        $name = $input->name;
        $shopname = $input->shopname;
        $phone = $input->phone;
        $email = $input->email;
        $min_order = $input->min_order;
        $address = $input->address;
        $pincode = $input->pincode;
        $password = $input->password;
        $image = $input->image;
        
        if(empty($phone) || empty($password)|| empty($shopname) || empty($pincode) || empty($shopname)){
            return NULL;
        }
       

        $shopcode = 'JLP'.substr(time(), -7);

        $array['status'] = 0;
        $array['data'] = [];

        $sql = 'SELECT phone, email FROM shopkeeper WHERE (phone = "'.$phone.'")';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            // return "phoneemail";
            $array['status'] = 4;
            return $array;
        }

         
        $username = preg_replace( '/\s+/', '-', strtolower($shopname));
        $username = str_replace(" ", "-", $username);
        $username = str_replace("/", "", $username);
        $tmpusername = $username;
        $unstatus = 0;
        $usrnameAssign = 1;
        
        // return $username;

        while ($unstatus == 0) {             
            $sql = 'SELECT username FROM shopkeeper WHERE username = "'.$tmpusername.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $tmpusername = $username.$usrnameAssign;
                $usrnameAssign++;
            }else{
                $username = $tmpusername;
                $unstatus = 1;
                break;
            }
        }
        // status deactive.
        $status = 1;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO shopkeeper (agent_id, min_order_amount, name, shopname, username, shopcode, phone, email, password, address, pincode, image, status, creation_date, modification_date)  VALUES ("'.$agent_id.'","'.$min_order.'", "'.$name.'", "'.$shopname.'", "'.$username.'", "'.$shopcode.'",  "'.$phone.'", "'.$email.'",  "'.$password.'", "'.$address.'", "'.$pincode.'", "'.$image.'", "'.$status.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);        
        if($result){

            $input->id = mysqli_insert_id($con);
            $dbObj->addShopkeeperAccount($input);
            $userData = $dbObj->shopkeeperLogin($input);
            return $userData;
        }
        return $array;
    }


    public function addShopkeeperAccount($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $bank = $input->bank;
        $ac_no = $input->ac_no;
        $ifsc = $input->ifsc;
        $branch = $input->branch;
        $status = 0;


        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date FROM shopkeeper_account WHERE user_id = "'.$id.'" AND status = 0';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            // $ret_array = mysqli_fetch_assoc($result);    
            return "pending";       
        }

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO shopkeeper_account (user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date )  VALUES ("'.$id.'", "'.$bank.'", "'.$ac_no.'", "'.$ifsc.'", "'.$branch.'", "'.$status.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);
        
        if($result){
            return "success";
        }
        return NULL;
    }


    public function getShopkeeperAccountDetail($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date FROM shopkeeper_account WHERE user_id = "'.$id.'" AND status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $ret_array = mysqli_fetch_assoc($result);           
        }
        return $ret_array;   
    }

     public function getShopkeeperBankAccount($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date FROM shopkeeper_account WHERE user_id = "'.$id.'" AND status >= 0';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;   
    }





    
    public function shopkeeperLogin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $phone = $input->phone;
        $password = $input->password;

        $array['status'] = 0;
        $array['data'] = [];
 
        $sql = 'SELECT id, name, username, shopcode, photo, phone, email, address, status, creation_date FROM shopkeeper WHERE phone = "'.$phone.'" AND password = "'.$password.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $data = mysqli_fetch_assoc($result);
            $data['id'] = (int)$data['id'];
            $array['status'] = (int)$data['status'];
            
            $array['data'] = $data;           
        }
        return $array;     
    }


    public function getShopkeepers($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $search = $input->search;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, name, username, shopcode, image, phone, email, pincode, address, status, min_order_amount, wallet, creation_date FROM shopkeeper WHERE status > 0 ORDER BY id DESC';

        if(!empty($search)){
            $search = '%'.$search.'%';
            $sql = 'SELECT id, name, username, shopcode, image, phone, email, pincode, address, status, min_order_amount, wallet, creation_date FROM shopkeeper WHERE (name LIKE "'.$search.'" || shopcode LIKE "'.$search.'" || phone LIKE "'.$search.'" || email LIKE "'.$search.'" || pincode LIKE "'.$search.'" || address LIKE "'.$search.'") AND status > 0 ORDER BY id DESC';
        }
       
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $row['creation_date'] = date("d/m/Y", strtotime($row['creation_date']));
                array_push($ret_array, $row);
            }
            return $ret_array; 
        }
        return NULL;     
    }



    public function getShopkeeperProfile($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, agent_id, name, username, shopname, shopcode, phone, email, pincode, address, image, status, min_order_amount, enabled, home_delivery, open_time, close_time, wallet, creation_date, modification_date FROM shopkeeper WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);        
        if($num_rows > 0){
            $ret_array = mysqli_fetch_assoc($result);
        }
        return $ret_array;
    }


    public function shopkeeperProfileAction($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $action = $input->action;

        mysqli_set_charset($con,'utf8mb4'); 
        $sql = 'UPDATE shopkeeper SET status = "'.$action.'", modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        if($action == 0){
            // $sql = 'DELETE FROM shopkeeper WHERE id = "'.$id.'"';
            // $images = $dbObj->getShopkeeperProfile($input)['image'];
            // $path = "../../assets/images/".$images;
            // try{ unlink($path); }catch(Exception $eee){}
            
            $dphone = '';
            $demail = '';
            
            $sql2 = 'SELECT id, phone, email FROM shopkeeper WHERE id = "'.$id.'"';
            $result2 = mysqli_query($con, $sql2);
            $num_rows2 = mysqli_num_rows($result2);
            if ($num_rows2 > 0) {
                $tarray = mysqli_fetch_assoc($result2);
                // $array['comission'] = $data['comission'];   
                $dphone = $tarray['phone'];
                $demail = $tarray['email'];
            }
        
            $dphone = $dphone.'#del';
            $demail = $demail.'#del';
            $sql = 'UPDATE shopkeeper SET phone = "'.$dphone.'", email = "'.$demail.'", status = "'.$action.'", modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        }
        $result = mysqli_query($con, $sql);
        
        return "success";
    }



    public function getAdminCommission($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);
 
        $sql = 'SELECT id, comission, wallet, gst_wallet, agent_commission  FROM super_admin WHERE id = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $ret_array = mysqli_fetch_assoc($result);
            // $array['comission'] = $data['comission'];           
        }
        return $ret_array;     
    }


    public function getUnit($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $sql = 'SELECT id, name, sort_name, type FROM unit WHERE status =  1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;     
    }

 

    public function addProduct($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $name = $input->name;
        $quantity = $input->quantity;
        $unit = $input->unit;
        $rate = $input->rate;
        $discount = $input->discount;
        $gst = $input->gst;
        $amount = $input->amount;
        $description = $input->description;
        $image = $input->image;

        $unique_product = $dbObj->generateProductCode($input);

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO products (name, shopkeeper_id, unique_product, description, creation_date, modification_date)  VALUES ("'.$name.'", "'.$id.'", "'.$unique_product.'", "'.$description.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);
        if($result){
            $product_id = mysqli_insert_id($con);

            $sql = 'INSERT INTO product_attributes (product_id, name, quantity, unit, image, rate, gst, discount,  amount, creation_date, modification_date)  VALUES ("'.$product_id.'", "'.$name.'", "'.$quantity.'", "'.$unit.'", "'.$image.'", "'.$rate.'", "'.$gst.'", "'.$discount.'", "'.$amount.'", "'.$date.'", "'.$date.'")';
            $result = mysqli_query($con, $sql);

            return "success";
        }
        return NULL;
    }


    public function generateProductCode($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $referal_code = substr($string_shuffled, 1, 10);
        $data = 0;

        while ($data == 0) {           

            $sql = 'SELECT  referral_code FROM user WHERE referral_code = "'.$referal_code.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows <= 0) {
                $data  = 1;            
            }

            if($data == 0){
                $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $string_shuffled = str_shuffle($string);
                $referal_code = substr($string_shuffled, 1, 10);
            }
        }       
        return $referal_code;
    }


    public function addProductAttribute($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        // $name = $input->name;
        $quantity = $input->quantity;
        $unit = $input->unit;
        $rate = $input->rate;
        $discount = $input->discount;
        $gst = $input->gst;
        $amount = $input->amount;
        // $description = $input->description;
        $image = $input->image;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO product_attributes (product_id, quantity, unit, image, rate, gst, discount, amount, creation_date, modification_date)  VALUES ("'.$id.'", "'.$quantity.'", "'.$unit.'", "'.$image.'", "'.$rate.'", "'.$gst.'", "'.$discount.'", "'.$amount.'", "'.$date.'", "'.$date.'")';
            $result = mysqli_query($con, $sql);
        if($result){
            return "success";
        }
        return NULL;
    }



    public function getProductsList($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $shopkeeper_id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, name, shopkeeper_id, unique_product, description, modification_date  FROM  products WHERE shopkeeper_id = "'.$shopkeeper_id.'" AND status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $row['modification_date'] = date("d/m/Y", strtotime($row['modification_date']));
                $input->id = $row['id'];
                $row['products'] = $dbObj->getProductAttributes($input);
                array_push($ret_array, $row);
            }
        }
       return $ret_array;
    }

    public function getProductAttributes($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT pa.id, pa.product_id, pa.name, pa.quantity, pa.unit, pa.image, pa.rate, pa.gst, pa.discount, pa.status, pa.comission, pa.amount, pa.modification_date, u.name as measure, u.sort_name FROM product_attributes pa INNER JOIN unit u ON pa.unit = u.id WHERE pa.product_id = "'.$id.'" AND (pa.status = 1 || pa.status = 2)';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                
                $input->product_id = $row['product_id'];
                $input->attribute_id = $row['id'];
                $row['added_quantity'] = $dbObj->getUserCartItems($input);
                $row['modification_date'] = date("d/m/Y", strtotime($row['modification_date']));
                array_push($ret_array, $row);
            }
        }
        return $ret_array; 
    }


     public function getHomeShopkeeper($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, username, shopname, name, shopcode, pincode, min_order_amount, status, image, address, open_time, close_time FROM shopkeeper WHERE enabled = 1 AND status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                array_push($ret_array, $row);
            }
            return $ret_array; 
        }
        return NULL;
    }

    public function searchShopkeeper($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $search = $input->search;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, username, shopname, name, shopcode, pincode, min_order_amount, status, image, address, open_time, close_time  FROM shopkeeper WHERE 1 AND status = 1 AND enabled = 1';
        
        if(!empty($search)){
            $search = '%'.$search.'%';
            $sql = 'SELECT id, username, shopname, name, shopcode, pincode, min_order_amount, status, image, address, open_time, close_time  FROM shopkeeper WHERE (pincode LIKE "'.$search.'" || shopname LIKE "'.$search.'" ) AND status = 1 AND enabled = 1';
        }

        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                array_push($ret_array, $row);
            }
            return $ret_array; 
        }
        return NULL;
    }






    public function getProductsListByAdmin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT p.id, p.name, p.unit, p.shopkeeper_id, p.unique_product, p.rate, p.commission, p.discount, p.amount, p.image, p.description, p.creation_date, u.id as user_id, u.username,  u.name as user_name, u.shopcode, u.phone, u.email, u.pincode,  u.min_order_amount, u.status  FROM  products p INNER JOIN shopkeeper u ON p.shopkeeper_id = u.id';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $row['creation_date'] = date("d/m/Y", strtotime($row['creation_date']));
                array_push($ret_array, $row);
            }
            return $ret_array; 
        }
        return NULL;
    }






    public function VerifyPhoneAndSendOTP($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;
        // $email = $input->email;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT phone, email FROM shopkeeper WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $array['status'] = 2;
            $array['data'] = "";

            return $array;
        }
        
        
        $sql = 'SELECT otp FROM otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);

            $otp = $row['otp'];
            // $message = 'Welcome Shopkeeper: '.$phone.'.Your Sign up OTP is: '.$otp.'.';
            $message = 'Welcome Shopkeeper:'.$phone.'. Your Sign Up OTP is:'.$otp.'. at jalpans.com';

            $array['status'] = 1;
            $array['data'] = "success";
            sendMobileMessage($phone, $message);

            return $array;
        }
        

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp = substr($string_shuffled, 1, 6);
        
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $token = substr($string_shuffled, 1, 25);
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO otp_validator (phone, tokens, otp, creation_date)  VALUES ("'.$phone.'", "'.$token.'", "'.$otp.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);        
        if($result){
            // $message = "Hello ".$phone.", Your OTP is : ".$otp;
            // $message = 'Welcome Shopkeeper: '.$phone.'.Your Sign up OTP is: '.$otp.'.';
            $message = 'Welcome Shopkeeper:'.$phone.'. Your Sign Up OTP is:'.$otp.'. at jalpans.com';
            sendMobileMessage($phone, $message);
            $array['status'] = 1;
            $array['data'] = $token;
            return $array;
        }
        
        return NULL;
    }

   

    // public function resendMobileOTP($input) {

    //     $ret_array = array();
    //     $dbObj = new DbHandler();
    //     $con = $dbObj->getDbConnection($input);

    //     date_default_timezone_set("Asia/Calcutta");
    //     $date = date('Y-m-d H:i:s');

    //     $phone = $input->phone;
    //     $token = $input->token;

    //     $array['status'] = 0;
    //     $array['data'] = "";

    //     $sql = 'SELECT otp FROM otp_validator WHERE (tokens = "'.$token.'" AND phone = "'.$phone.'")';
    //     $result = mysqli_query($con, $sql);
    //     $num_rows = mysqli_num_rows($result);
    //     if ($num_rows > 0) {
    //         $row = mysqli_fetch_assoc($result);

    //         $otp = $row['otp'];
    //         $message = "Your OTP is : ".$otp;

    //         $array['status'] = 1;
    //         $array['data'] = "success";
    //         sendMobileMessage($phone, $message);

    //         return $array;
    //     }
    //     return NULL;
    // }


    public function verifySendOTP($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;
        $otp = $input->otp;
        $token = $input->token;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT otp FROM otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);

            $dbotp = $row['otp'];
            if($dbotp == $otp){
                $array['status'] = 1;
                $array['data'] = "success";

                $sql = 'DELETE FROM otp_validator WHERE phone = "'.$phone.'"';
                $result = mysqli_query($con, $sql);

                return $array;
            }

            $array['status'] = 2;
            $array['data'] = "validate";
             
            return $array;
        }
        
        return NULL;
    }

    public function getProductDetails($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $unique_product = $input->unique_product;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT p.id, p.name, p.shopkeeper_id, p.unique_product, p.description, p.creation_date, u.id as user_id,  u.username,  u.name as user_name, u.phone, u.shopcode, u.email, u.pincode,  u.min_order_amount, u.status  FROM  products p INNER JOIN shopkeeper u ON p.shopkeeper_id = u.id WHERE p.unique_product = "'.$unique_product.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $row['creation_date'] = date("d/m/Y", strtotime($row['creation_date']));
            
            // $input->unique_product = $row['unique_product'];
            // $row['quantity'] = $dbObj->getUserCartItems($input);
            $input->id = $row['id'];
            $row['products'] = $dbObj->getProductAttributes($input);
            
            $ret_array = $row;
            
            return $ret_array; 
        }
        return NULL;
    }




    public function editProductAttribute($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $quantity = $input->quantity;
        $unit = $input->unit;
        $rate = $input->rate;
        $discount = $input->discount;
        $gst = $input->gst;
        $amount = $input->amount; 
        $image = $input->image;

        mysqli_set_charset($con,'utf8mb4');

        if($image != ""){
            $dataimg = '';
            $sql = 'SELECT image FROM product_attributes WHERE id = "'.$id.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $dataimg = $row['image'];
            }

            $sql = 'UPDATE product_attributes SET image = "'.$image.'", modification_date = "'.$date.'"  WHERE id = "'.$id.'"';
            $result = mysqli_query($con, $sql);

            $path = "../../assets/images/".$dataimg;
            try{ unlink($path); }catch(Exception $eee){}
        }

        $sql = 'UPDATE product_attributes SET quantity = "'.$quantity.'", unit = "'.$unit.'", rate = "'.$rate.'", gst = "'.$gst.'", discount = "'.$discount.'", amount = "'.$amount.'", modification_date =   "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);
        
        if($result){
            return "success";
        }
        return NULL;
    }


    public function deleteProductAttribute($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        

        mysqli_set_charset($con,'utf8mb4');
        // $dataimg = '';
        // $sql = 'SELECT image FROM  products WHERE unique_product = "'.$unique_product.'"';
        // $result = mysqli_query($con, $sql);
        // $num_rows = mysqli_num_rows($result);
        // if ($num_rows > 0) {
        //     $row = mysqli_fetch_assoc($result);
        //     $dataimg = $row['image'];
        // }

        $sql = 'UPDATE product_attributes SET status = 0 WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql); 
        if($result){
            // $path = "../../assets/images/".$dataimg;
            // try{ unlink($path); }catch(Exception $eee){}
            return "success";
        }
        return NULL;
    }
    
    public function deleteProduct($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        

        mysqli_set_charset($con,'utf8mb4');
        // $dataimg = '';
        // $sql = 'SELECT image FROM  products WHERE unique_product = "'.$unique_product.'"';
        // $result = mysqli_query($con, $sql);
        // $num_rows = mysqli_num_rows($result);
        // if ($num_rows > 0) {
        //     $row = mysqli_fetch_assoc($result);
        //     $dataimg = $row['image'];
        // }

        $sql = 'UPDATE products SET status = 0 WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql); 
        if($result){
            // $path = "../../assets/images/".$dataimg;
            // try{ unlink($path); }catch(Exception $eee){}
            
             $sql = 'UPDATE product_attributes SET status = 0 WHERE product_id = "'.$id.'"';
            $result = mysqli_query($con, $sql); 
        
            return "success";
        }
        return NULL;
    }

    public function productAttributeEnabledDisabled($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $status = $input->status;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE product_attributes SET status = "'.$status.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql); 
        if($result){
            return "success";
        }
        return NULL;
    }

    public function shopEnabledDisabled($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $action = $input->action;

        $sql = 'UPDATE shopkeeper SET enabled = "'.$action.'", modification_date = "'.$date.'"  WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);
                
        if($result){
            return "success";
        }
        return NULL;
    }
    
    
    public function homeDeliveryEnabledDisabled($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $action = $input->action;

        $sql = 'UPDATE shopkeeper SET home_delivery = "'.$action.'", modification_date = "'.$date.'"  WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);
                
        if($result){
            return "success";
        }
        return NULL;
    }


    public function getUserProducts($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $username = $input->username;
        $ip_address = $input->ip_address;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT p.id, p.name, p.shopkeeper_id, p.unique_product, p.description FROM  products p inner join shopkeeper s on p.shopkeeper_id = s.id WHERE p.status = 1 AND s.username = "'.$username.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){               
                // $input->unique_product = $row['unique_product'];               
                $input->id = $row['id'];
                $row['products'] = $dbObj->getProductAttributesdata($input);
                array_push($ret_array, $row);
            }
            return $ret_array; 
        }
        return NULL;
    }
    
    
    
    public function getProductAttributesdata($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT pa.id, pa.product_id, pa.name, pa.quantity, pa.unit, pa.image, pa.rate, pa.gst, pa.discount, pa.status, pa.comission, pa.amount, pa.modification_date, u.name as measure, u.sort_name FROM product_attributes pa INNER JOIN unit u ON pa.unit = u.id WHERE pa.product_id = "'.$id.'" AND pa.status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                
                $input->product_id = $row['product_id'];
                $input->attribute_id = $row['id'];
                $row['added_quantity'] = $dbObj->getUserCartItems($input);
                $row['modification_date'] = date("d/m/Y", strtotime($row['modification_date']));
                array_push($ret_array, $row);
            }
        }
        return $ret_array; 
    }
    
    
    
    public function getUserCartItems($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $product_id = $input->product_id;
        $attribute_id = $input->attribute_id;
        $ip_address = $input->ip_address;

        $qty = 0;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT quantity FROM cart WHERE ip_address = "'.$ip_address.'" AND product_id = "'.$product_id.'" AND product_attr_id = "'.$attribute_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $qty = $row['quantity'];
        }
        return $qty;
    }



    public function addUpdateCart($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $ip_address = $input->ip_address;
        $cart_products = $input->cart_products;
        $product_id = $input->product_id;
        $attribute_id = $input->attribute_id;
        $rate = $input->rate;
        $total = $input->total;
        $shop_id = $input->shop_id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT shopkeeper_id  FROM  cart  WHERE ip_address = "'.$ip_address.'" AND shopkeeper_id != "'.$shop_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {             
            return "shop";
        }

        $update = 0;
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT ip_address, shopkeeper_id, product_id, product_attr_id, quantity, rate, total_price  FROM cart  WHERE ip_address = "'.$ip_address.'" AND product_id = "'.$product_id.'" AND product_attr_id = "'.$attribute_id.'" AND shopkeeper_id = "'.$shop_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            
            $sql = 'UPDATE cart SET quantity = "'.$cart_products.'", rate = "'.$rate.'", total_price = "'.$total.'"  WHERE ip_address = "'.$ip_address.'" AND product_id = "'.$product_id.'" AND product_attr_id = "'.$attribute_id.'" AND shopkeeper_id = "'.$shop_id.'"';
            $result = mysqli_query($con, $sql);

           return "update";
        }
        if($update == 0){
            $sql = 'INSERT INTO cart (ip_address, shopkeeper_id, product_id, product_attr_id, quantity, rate, total_price) VALUES ("'.$ip_address.'", "'.$shop_id.'", "'.$product_id.'", "'.$attribute_id.'", "'.$cart_products.'", "'.$rate.'", "'.$total.'")';
            $result = mysqli_query($con, $sql);

            $update = 1;
        }

        if($update == 1){
            return "success";
        }
        return NULL;
    }


    public function getCartCount($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $ip_address = $input->ip_address;

        $array['total_amount'] = 0;
        $array['added_product'] = 0;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT sum(total_price) as total_amount, count(ip_address) as added_product FROM cart  WHERE ip_address = "'.$ip_address.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $array = mysqli_fetch_assoc($result);
            $array['total_amount'] = $array['total_amount'];
            $array['added_product'] = $array['added_product'];
        }
        return $array;
    }


     public function getCartProducts($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $ip_address = $input->ip_address;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT c.id as cartid, c.total_price, c.quantity, p.name, p.shopkeeper_id, p.unique_product, s.min_order_amount, s.home_delivery, s.username, s.shopcode, s.pincode, pa.id as attribute_id, pa.product_id, pa.name as attrpname, pa.quantity as pquantity, pa.unit, pa.image, pa.rate, pa.gst, pa.discount, pa.comission, pa.amount, u.name as measure, u.sort_name FROM products p INNER JOIN  cart c ON c.product_id = p.id INNER JOIN shopkeeper s ON s.id = c.shopkeeper_id INNER JOIN product_attributes pa on c.product_attr_id = pa.id INNER JOIN unit u On u.id = pa.unit WHERE pa.status = 1 AND c.ip_address = "'.$ip_address.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){               
                // $input->unique_product = $row['unique_product'];
                array_push($ret_array, $row);
            }
            return $ret_array; 
        }
        return NULL;
    }



    public function sendOtpForProceedPayment($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT phone, tokens, otp FROM payment_otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $array = mysqli_fetch_assoc($result);

            $otp = $array['otp'];
            // $message = 'Your payment proceed OTP is : '.$otp;
            $message = 'OTP is: '.$otp.' for your payment procced.';
            // 'Your payment proceed  OTP is :'.$otp;
            sendMobileMessage($phone, $message);

            $array['status'] = 2;
            $array['data'] = "tokens";

            return $array;
        }

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp =  substr($string_shuffled, 1, 6);
        
        // $message = 'Your payment proceed OTP is : '.$otp;
        $message = 'OTP is: '.$otp.' for your payment procced.';
        
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $token = substr($string_shuffled, 1, 25);

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO payment_otp_validator (phone, tokens, otp, creation_date)  VALUES ("'.$phone.'", "'.$token.'", "'.$otp.'", "'.$date.'")';
        $result = mysqli_query($con, $sql); 
        if($result){

            sendMobileMessage($phone, $message);
            $array['status'] = 1;
            $array['data'] = $token;
            return $array;
        }
        return $array;
    }


    public function VerifyProceedPaymentOTP($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $otp = $input->otp;
        $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT phone, tokens, otp FROM payment_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $sql = 'DELETE FROM payment_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
            $result = mysqli_query($con, $sql);

            // $array = mysqli_fetch_assoc($result);

            // $otp = $array['otp'];
            // $message = 'Your payment proceed  OTP is :'.$otp;
            // sendMobileMessage($phone, $message);

            $array['status'] = 1;
            $array['data'] = "tokens";
        }
       return $array;
    }


    public function placeOrder($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $ip_address = $input->ip_address;
        // $order_type = $input->order_type;
        // $phone = $input->phone;
        $order_id = $input->order_id;
        $mid = $input->mid;
        $txnid = $input->txnid;
        $txn_amt = $input->txn_amt;
        $pay_mode = $input->pay_mode;
        $currency = $input->currency;
        $txn_date = $input->txn_date;
        $status = $input->status;
        $res_code = $input->res_code;
        $gateway = $input->gateway;
        $bnk_txn_id = $input->bnk_txn_id;
        $bnk_name = $input->bnk_name;
        $checksum = $input->checksum;

        $order_data = $dbObj->getOrderData($input);
        $order_type = $order_data['order_type'];
        $phone = $order_data['phone'];
        
        mysqli_set_charset($con,'utf8mb4');
        $sql0 = 'INSERT INTO payment_order_history (order_id, mid, txn_id, txn_amt, pay_mode, currency, txn_date, txn_status, res_code, gateway, bank_txn_id, bank_name, checksum, creation_date, modification_date)VALUES ("'.$order_id.'", "'.$mid.'", "'.$txnid.'", "'.$txn_amt.'", "'.$pay_mode.'", "'.$currency.'", "'.$txn_date.'", "'.$status.'", "'.$res_code.'", "'.$gateway.'", "'.$bnk_txn_id.'", "'.$bnk_name.'", "'.$checksum.'", "'.$date.'", "'.$date.'")';
        $result0 = mysqli_query($con, $sql0);

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT c.ip_address, c.shopkeeper_id, c.product_id, c.product_attr_id, c.quantity, c.rate, c.total_price, pa.gst, pa.comission, pa.discount FROM cart c INNER JOIN product_attributes pa ON pa.id = c.product_attr_id WHERE ip_address = "'.$ip_address.'" AND c.quantity > 0';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }

        $order['status'] = "error";
        $order['order_id'] = "";

        if (count($ret_array) > 0) {

            $total_amount = 0;
            $shopkeeper_id = $ret_array[0]['shopkeeper_id'];

            $input->id = $shopkeeper_id;
            $shopkeeper = $dbObj->getShopkeeperProfile($input);
 
            $ip_address = $ret_array[0]['ip_address'];
            for ($i=0; $i < count($ret_array); $i++) {

                $total_amount = $total_amount + $ret_array[$i]['total_price'];
                
                $product_id =  $ret_array[$i]['product_id'];
                $product_attr_id =  $ret_array[$i]['product_attr_id'];
                $quantity =  $ret_array[$i]['quantity'];
                $rate =  $ret_array[$i]['rate'];
                $total_price =  $ret_array[$i]['total_price'];
                $gst = $ret_array[$i]['gst'];                
                $discount = $ret_array[$i]['discount'];
                // $comission = $ret_array[$i]['comission'];

                $sql = 'INSERT INTO order_product (order_id, product_id, product_attr_id, quantity, rate, gst, discount, total_price)VALUES ("'.$order_id.'", "'.$product_id.'", "'.$product_attr_id.'", "'.$quantity.'", "'.$rate.'", "'.$gst.'", "'.$discount.'", "'.$total_price.'")';
                $result = mysqli_query($con, $sql);
            }

            $string = '0123456789';
            $string_shuffled = str_shuffle($string);
            $otp =  substr($string_shuffled, 1, 6);

            $comission_data = $dbObj->getAdminCommission($input);
            $commission = $comission_data['comission'];
            $agent_commission = $comission_data['agent_commission'];

            // $total_amount = $total_amount + (($total_amount * $commission) /100);
            $sql = 'INSERT INTO orders (order_id, order_type, phone, shopkeeper_id, total_amount, transaction_amount, payment_status, payment_id, commission, agent_commission, unlock_opt, ip_address, creation_date,  modification_date) VALUES ("'.$order_id.'", "'.$order_type.'", "'.$phone.'", "'.$shopkeeper_id.'", "'.$total_amount.'", "'.$txn_amt.'", "'.$status.'", "'.$txnid.'", "'.$commission.'", "'.$agent_commission.'", "'.$otp.'", "'.$ip_address.'", "'.$date.'", "'.$date.'")';
            $result = mysqli_query($con, $sql);

            $sql = 'DELETE FROM cart WHERE  ip_address = "'.$ip_address.'"';
            $result = mysqli_query($con, $sql);

            $order['status'] = "success";
            $order['order_id'] = $order_id;

            $mode = "Self";
            if($order_type == 2){
                $mode = "Home";
            }
            // $cusmessage = 'Order Placed Successfully.Delvry Mode:'.$mode.'.Order Id:'.$order_id.'&Receiving OTP is:'.$otp.'.Amt:Rs.'.$txn_amt.'.Shop Mob No:'.$shopkeeper['phone'].'.Order Track at www.jalpans.com';
            // $cusmessage = 'Order placed successfully.Delv mode:'.$mode.'. Order id:'.$order_id.' & receiving otp is:'.$otp.'. Amt.:Rs. '.$txn_amt.'.Shop Mob No.:'.$shopkeeper['phone'].'.Track on jalpans.com';
            
            $cusmessage = 'Order Placed Successfully.Delvry Mode:'.$mode.'.Order Id:'.$order_id.'&Receiving OTP is:'.$otp.'.Amt:Rs.'.$txn_amt.'.Shop Mob No:'.$shopkeeper['phone'].'.Order Track at www.jalpans.com';
            sendMobileMessage($phone, $cusmessage);

            // $shopmesage = 'Order received, order Id:'.$order_id.'. For Delv address contact on Customer Mob No. '.$phone.'. Delv Mode: '.$mode.'. For details login your shop at jalpans.com';
            // $shopmessage = 'Order Received, Order Id:'.$order_id.'. For Delvry address contact on Customer Mob No.'.$phone.'.Delvry Mode: '.$mode.'.For details login your shop at www.jalpans.com';
            
            $shopmessage = 'Order Received, Order Id:'.$order_id.'. For Delvry address contact on Customer Mob No.'.$phone.'.Delvry Mode: '.$mode.'.For details login your shop at www.jalpans.com';
            sendMobileMessage($shopkeeper['phone'], $shopmessage);
        }        
        return $order;
    }



    public function getPlaceOrderByAdmin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');


        $tmpArray['order'] = [];
        $tmpArray['products'] = [];

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, o.order_type, o.phone, o.unlock_opt, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.total_amount, o.transaction_amount, o.order_status, o.creation_date, s.shopname, s.name, s.phone as shopcontact FROM orders o INNER JOIN shopkeeper s ON o.shopkeeper_id = s.id ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                

                $input->order_id = $array['order_id'];
                
                $order_type = "Self Shipping";
                if($array['order_type'] == 2){
                    $order_type = "Delivery Boy";
                }
                $array['order_type'] = $order_type;

                $order_status = "Pending";
                if($array['order_status'] == 1){
                    $order_status = "Delivered";
                }
                else if($array['order_status'] == 2){
                    $order_status = "Cancelled";
                }
                $array['order_text'] = $order_status;

                $array['time'] = date('h:i a', strtotime($array['creation_date']));
                $array['creation_date'] = date('d M Y', strtotime($array['creation_date']));
                
                $tmpArray['order'] = $array;
                $tmpArray['products'] = $dbObj->getPlaceOrderProducts($input);

                array_push($ret_array, $tmpArray);
            }
        }
        return $ret_array;
    }
    
    
    
    
    public function getCancelledOrderByAdmin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');


        $tmpArray['order'] = [];
        $tmpArray['products'] = [];

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, o.order_type, o.phone, o.unlock_opt, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.total_amount, o.transaction_amount, o.order_status, o.creation_date, s.shopname, s.name, s.phone as shopcontact, o.refund_order_id, o.refund, o.refund_date, o.refund_amount, o.refund_status, o.refund_message FROM orders o INNER JOIN shopkeeper s ON o.shopkeeper_id = s.id WHERE o.order_status = 2 ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                

                $input->order_id = $array['order_id'];
                
                $order_type = "Self Shipping";
                if($array['order_type'] == 2){
                    $order_type = "Delivery Boy";
                }
                $array['order_type'] = $order_type;

                $order_status = "Pending";
                if($array['order_status'] == 1){
                    $order_status = "Delivered";
                }
                else if($array['order_status'] == 2){
                    $order_status = "Cancelled";
                }
                $array['order_text'] = $order_status;

                $array['time'] = date('h:i a', strtotime($array['creation_date']));
                $array['creation_date'] = date('d M Y', strtotime($array['creation_date']));
                
                $tmpArray['order'] = $array;
                $tmpArray['products'] = $dbObj->getPlaceOrderProducts($input);

                array_push($ret_array, $tmpArray);
            }
        }
        return $ret_array;
    }


     public function getPlaceOrderProducts($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $oredr_id = $input->order_id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT op.id, p.name, u.name as unit, pa.image, op.product_id, op.quantity,  pa.quantity as pquantity, op.rate, op.gst, op.discount, op.commission, op.total_price FROM order_product op INNER JOIN products p ON op.product_id = p.id INNER JOIN product_attributes pa ON op.product_attr_id = pa.id INNER JOIN unit u ON pa.unit = u.id WHERE order_id = "'.$oredr_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
               
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


    public function removeItemFromCart($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $remove_id = $input->remove_id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'DELETE FROM cart WHERE id = "'.$remove_id.'"';
        $result = mysqli_query($con, $sql);
         
        if ($result) {
             return "success";
        }
        return NULL;
    }

 
    public function getPlaceOrderByShopkeeper($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $shopkeeper_id = $input->shopkeeper_id;
        $status = $input->status;

        $statusText = '';
        if($status != -1){ 
            $statusText = ' AND o.order_status = ' . $status;
        }

        $tmpArray['order'] = [];
        $tmpArray['products'] = [];

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, o.order_type, o.phone, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.total_amount, o.transaction_amount, o.delivery_boy, o.order_status, o.creation_date, s.shopname, s.name, s.phone as shopcontact, db.name as dname, db.phone as dphone, db.phone2 as dphone2 FROM orders o INNER JOIN shopkeeper s ON o.shopkeeper_id = s.id LEFT JOIN delivery_boy db ON o.delivery_boy = db.id WHERE o.shopkeeper_id = "'.$shopkeeper_id.'"'.$statusText.'  ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){

                $input->order_id = $array['order_id'];

                $order_type = "Self Shipping";
                if($array['order_type'] == 2){
                    $order_type = "Home Delivery";
                }
                $array['order_type_text'] = $order_type;

                $order_status = "Pending";
                if($array['order_status'] == 1){
                    $order_status = "Delivered";
                }
                else if($array['order_status'] == 2){
                    $order_status = "Cancelled";
                }
                
                $array['order_text'] = $order_status;

                $array['time'] = date('h:i a', strtotime($array['creation_date']));
                $array['creation_date'] = date('d M Y', strtotime($array['creation_date']));
                
                $tmpArray['order'] = $array;
                $tmpArray['products'] = $dbObj->getPlaceOrderProducts($input);

                array_push($ret_array, $tmpArray);
            }
        }
        return $ret_array;
    }

 
    public function updateOrderStatus($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $order_id = $input->order_id;
        $otp = $input->otp;
        $action_by = $input->action_by;

        $save_otp = '';
        $sql = 'SELECT id, unlock_opt FROM orders WHERE order_id = "'.$order_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $array = mysqli_fetch_assoc($result);
            $save_otp = $array['unlock_opt'];
        }
        if($save_otp != trim($otp)){
            return "otp";
        }

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE orders SET order_status = 1, action_by = "'.$action_by.'", delivery_date_time = "'.$date.'" WHERE order_id = "'.$order_id.'"';
        $result = mysqli_query($con, $sql);
        if ($result) {

            $dbObj->manageWallet($input);
            return "success";
        }
        return NULL;
    }


    public function manageWallet($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $order_id = $input->order_id;
        $order = $dbObj->getTrackOrder($input);        
        $admin = $dbObj->getAdminCommission($input);
        
        $agent = [];
        if($order['agent_id'] > 0){
            $mydata['id'] = $order['agent_id'];
            $mydata['api_key'] = $input->api_key;
            $agent = $dbObj->shopAgentProfile(json_decode(json_encode($mydata)));
        }

        // for Shopkeeper
        $transaction_type = 'CR';
        $transaction_reason = 'wallet credited for order delivered';
        $after_credited = $order['wallet'] + $order['total_amount'];

        $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
        $sql = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, total_amount, transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$order['shopkeeper_id'].'", 1, "'.$order['id'].'", "'.$order['commission'].'", "'.$order['transaction_amount'].'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$order['wallet'].'", "'.$order['total_amount'].'", "'.$after_credited.'", "'.$date.'" )';
        $result = mysqli_query($con, $sql);

        $sql1 = 'UPDATE shopkeeper SET wallet = "'.$after_credited.'" WHERE id = "'.$order['shopkeeper_id'].'"';
        $result1 = mysqli_query($con, $sql1);

        $admin_amount = $order['transaction_amount'] - $order['total_amount'];
        $agent_amount = 0;
        // for admin
        $transaction_type = 'CR';
        $transaction_reason = 'wallet credited for order delivered';

        if(!empty($agent)){
            $agent_commission = $order['agent_commission'];
            $agent_amount = ($order['transaction_amount'] * $agent_commission)/100;
            $admin_amount = $admin_amount - $agent_amount;

            // for agent commisiion
            $transaction_type = 'CR';
            $transaction_reason = 'wallet credited for order delivered';
            $after_credited = $agent['wallet'] + $agent_amount;

            $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
            $sql4 = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, agent_commission, total_amount,  transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$agent['id'].'", 3, "'.$order['id'].'", "'.$order['commission'].'", "'.$order['agent_commission'].'", "'.$order['transaction_amount'].'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$agent['wallet'].'", "'.$agent_amount.'", "'.$after_credited.'", "'.$date.'" )';
            $result4 = mysqli_query($con, $sql4);

            $sql5 = 'UPDATE shop_agent SET wallet = "'.$after_credited.'" WHERE id = "'.$agent['id'].'"';
            $result5 = mysqli_query($con, $sql5);

        }
        $after_credited = $admin['wallet'] + $admin_amount;

        $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
        $sql2 = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, total_amount,  transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$admin['id'].'", 2, "'.$order['id'].'", "'.$order['commission'].'", "'.$order['transaction_amount'].'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$admin['wallet'].'", "'.$admin_amount.'", "'.$after_credited.'", "'.$date.'" )';
        $result2 = mysqli_query($con, $sql2);

        $sql3 = 'UPDATE super_admin SET wallet = "'.$after_credited.'" WHERE id = "'.$admin['id'].'"';
        $result3 = mysqli_query($con, $sql3);

        return 'success';
    }


    // public function manageWallet($input) {

    //     $ret_array = array();
    //     $dbObj = new DbHandler();
    //     $con = $dbObj->getDbConnection($input);

    //     date_default_timezone_set("Asia/Calcutta");
    //     $date = date('Y-m-d H:i:s');

    //     $order_id = $input->order_id;
    //     $order = $dbObj->getTrackOrder($input);
    //     // shopkeeper_id, wallet
    //     $product = $dbObj->getPlaceOrderProducts($input);
    //     $admin = $dbObj->getAdminCommission($input);
    //     // wallet, gst_wallet

    //     $admin_wallet = 0;
    //     $shop_wallet = 0;
    //     $gst_wallet = 0;

    //     $order_amount = 0;
    //     $ordr_commission = 0;
    //     $ordr_commission = 0;

    //     for ($i=0; $i < count($product); $i++) { 
            
    //         // $total_amt = $product[$i]['total_price'];
    //         $rate = $product[$i]['rate'];
    //         $gst = $product[$i]['gst'];
    //         $commission = $product[$i]['commission'];
            
    //         $adminper = ($rate * $commission)/100;
    //         $gstper =   ($rate * $gst)/100;

    //         $admin_wallet = $admin_wallet + $adminper;
    //         $gst_wallet = $gst_wallet + $gstper;
    //         $shop_wallet = $shop_wallet +($rate - $gstper);

    //         $order_amount = $order_amount + $product[$i]['total_price'];
    //         $ordr_commission = $commission;
    //     }
        
    //     // return $admin_wallet.'-----'.$shop_wallet.'---------'.$gst_wallet;

    //     // for Shopkeeper
    //     $transaction_type = 'CR';
    //     $transaction_reason = 'wallet credited for order delivered';
    //     $after_credited = $order['wallet'] + $shop_wallet;

    //     $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
    //     $sql = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, total_amount, transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$order['shopkeeper_id'].'", 1, "'.$order['id'].'", "'.$ordr_commission.'", "'.$order_amount.'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$order['wallet'].'", "'.$shop_wallet.'", "'.$after_credited.'", "'.$date.'" )';
    //     $result = mysqli_query($con, $sql);

    //     $sql1 = 'UPDATE shopkeeper SET wallet = "'.$after_credited.'" WHERE id = "'.$order['shopkeeper_id'].'"';
    //     $result1 = mysqli_query($con, $sql1);

    //     // for admin
    //     $transaction_type = 'CR';
    //     $transaction_reason = 'wallet credited for order delivered';
    //     $after_credited = $admin['wallet'] + $admin_wallet;

    //     $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
    //     $sql2 = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, total_amount,  transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$admin['id'].'", 2, "'.$order['id'].'", "'.$ordr_commission.'", "'.$order_amount.'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$admin['wallet'].'", "'.$admin_wallet.'", "'.$after_credited.'", "'.$date.'" )';
    //     $result2 = mysqli_query($con, $sql2);

    //     $sql3 = 'UPDATE super_admin SET wallet = "'.$after_credited.'" WHERE id = "'.$admin['id'].'"';
    //     $result3 = mysqli_query($con, $sql3);

    //     // for GST
    //     $transaction_type = 'CR';
    //     $transaction_reason = 'wallet credited for order delivered';
    //     $after_credited = $admin['gst_wallet'] + $gst_wallet;

    //     $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
    //     $sql4 = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, total_amount,  transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$admin['id'].'", 3, "'.$order['id'].'", "'.$ordr_commission.'", "'.$order_amount.'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$admin['gst_wallet'].'", "'.$gst_wallet.'", "'.$after_credited.'", "'.$date.'" )';
    //     $result4 = mysqli_query($con, $sql4);

    //     $sql5 = 'UPDATE shopkeeper SET gst_wallet = "'.$after_credited.'" WHERE id = "'.$order['shopkeeper_id'].'"';
    //     $result5 = mysqli_query($con, $sql5);
         
    //     return 'success';
    // }




  

    public function submitUserComment($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $product_id = $input->product_id;
        $contactno = $input->contactno;
        $comment = $input->comment;


        $commentaccess = 0;
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.order_id FROM orders o INNER JOIN  order_product op ON  o.order_id = op.order_id WHERE o.phone = "'.$contactno.'" AND op.product_id = "'.$product_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            // $array = mysqli_fetch_assoc($result);
             $commentaccess = 1;
        }
        if($commentaccess == 0){
            return "ph";
        }

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO user_comment (product_id, contact_number, comment, creation_date)  VALUES ("'.$product_id.'", "'.$contactno.'", "'.$comment.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);        
        if($result){
            return "success";
        }
        return NULL;
    }

    public function getUserComment($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $product_id = $input->product_id;
  
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT product_id, contact_number, comment, creation_date FROM user_comment WHERE product_id = "'.$product_id.'" ORDER BY id desc';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                // $array['creation_date'] = data('d M, Y', strtotime($array['creation_date']));
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


    public function getOrderHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $mobile = $input->mobile;
  
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, o.order_type, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.total_amount, o.transaction_amount,  o.order_status, o.creation_date, s.name, s.shopname, s.shopcode, s.phone , s.address, s.pincode FROM orders o INNER JOIN shopkeeper s ON s.id = o.shopkeeper_id WHERE o.phone = "'.$mobile.'" ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                // $array['creation_date'] = data('d M, Y', strtotime($array['creation_date']));
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


    public function getOrderProducts($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $order_id = $input->order_id;
  
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT p.name, pa.image, pa.quantity as pquantity, u.name as unit, p.description, op.quantity, op.rate, op.total_price FROM products p INNER JOIN order_product op ON op.product_id = p.id INNER JOIN product_attributes pa ON op.product_attr_id = pa.id INNER JOIN unit u ON u.id = pa.unit WHERE op.order_id = "'.$order_id.'" ORDER BY op.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                // $array['creation_date'] = data('d M, Y', strtotime($array['creation_date']));
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


     public function cancelOrder($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $order_id = $input->order_id;
  
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE orders SET order_status = 4 WHERE order_id = "'.$order_id.'"';
        $result = mysqli_query($con, $sql);        
        if ($result) {
           return "success";
        }
        return NULL;
    }



    public function getTrackOrder($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $order_id = $input->order_id;
  
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, o.order_type, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.agent_commission, o.total_amount, o.transaction_amount, o.order_status, o.creation_date, s.agent_id, s.name, s.shopname, s.shopcode, s.phone , s.address, s.pincode, s.wallet FROM orders o INNER JOIN shopkeeper s ON s.id = o.shopkeeper_id WHERE o.order_id = "'.$order_id.'" ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $ret_array = mysqli_fetch_assoc($result);
        }
        return $ret_array;
    }


    public function saveShopkeeperProfile($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $name = $input->name;
        $shopname = $input->shopname;
        $phone = $input->phone;
        $email = $input->email;
        $min_order = $input->min_order;
        $address = $input->address;
        $pincode = $input->pincode;        
        $profileimg = $input->profileimg;
        $image = $input->image;

        $open_time = $input->open_time;
        $close_time = $input->close_time;
        

        $sql = 'SELECT phone, email FROM shopkeeper WHERE (phone = "'.$phone.'") AND id != "'.$id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return "phoneemail";
        }
 
        $username = preg_replace( '/\s+/', '', strtolower($shopname));
        $username = str_replace("/", "", $username);
        $username = str_replace(" ", "-", $username);
        $tmpusername = $username;
        $unstatus = 0;
        $usrnameAssign = 1;

        while ($unstatus == 0) {             
            $sql = 'SELECT username FROM shopkeeper WHERE username = "'.$tmpusername.'" AND id != "'.$id.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $tmpusername = $username.$usrnameAssign;
                $usrnameAssign++;
            }else{
                $username = $tmpusername;
                $unstatus = 1;
                break;
            }
        }
        // status deactive.
        // $status = 1;


        mysqli_set_charset($con,'utf8mb4');
        if($image != ''){
            $sql = 'UPDATE shopkeeper SET image = "'.$image.'" WHERE id = "'.$id.'"';
            $result = mysqli_query($con, $sql);
        }

        if(!empty($profileimg)){
            $sql = 'UPDATE shopkeeper SET photo = "'.$profileimg.'" WHERE id = "'.$id.'"';
            $result = mysqli_query($con, $sql);
        }
        
        $sql = 'UPDATE shopkeeper SET min_order_amount = "'.$min_order.'", name = "'.$name.'", shopname = "'.$shopname.'", username = "'.$username.'", phone = "'.$phone.'", email = "'.$email.'", address ="'.$address.'", pincode ="'.$pincode.'", open_time ="'.$open_time.'", close_time ="'.$close_time.'", modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){  
            return "success";
        }
        return NULL;
    }


    public function getSoldAmountHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $shopkeeper_id = $input->shopkeeper_id;
  
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, count(op.order_id) as items, o.order_type, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.total_amount, o.order_status, o.creation_date, s.name, s.shopname, s.shopcode, s.phone , s.address, s.pincode FROM orders o INNER JOIN shopkeeper s ON s.id = o.shopkeeper_id INNER JOIN order_product op ON op.order_id = o.order_id WHERE o.shopkeeper_id = "'.$shopkeeper_id.'" GROUP BY o.order_id ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }



    public function getShopkeeperProfileByShopCode($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $shopcode = $input->shopcode;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, agent_id, name, username, shopname, shopcode, phone, email, pincode, address, image, status, min_order_amount, enabled, open_time, close_time, wallet, creation_date, modification_date FROM shopkeeper WHERE shopcode = "'.$shopcode.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);        
        if($num_rows > 0){
            $ret_array = mysqli_fetch_assoc($result);
        }
        return $ret_array;
    }



    public function shopkeeperBankAccountAction($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $action = $input->action;
        $action_id = $input->action_id;

        if($action == 1){

            $sql = 'UPDATE shopkeeper_account SET status = -1, modification_date = "'.$date.'" WHERE user_id = "'.$id.'"';
            $result = mysqli_query($con, $sql);
        }

        mysqli_set_charset($con,'utf8mb4'); 
        $sql = 'UPDATE shopkeeper_account SET status = "'.$action.'", modification_date = "'.$date.'" WHERE id = "'.$action_id.'"';
        $result = mysqli_query($con, $sql);
        
        return "success";
    }




    public function addDeliveryBoy($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id;       
        $name = $input->name;       
        $phone = $input->phone;
        $phone2 = $input->phone2;       
        $address = $input->address;      
        $password = $input->password;
         
        $delboy_code = 'DELBOY'.substr(time(), -6);

        $sql = 'SELECT phone FROM delivery_boy WHERE (phone = "'.$phone.'")';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return "phoneemail";
        }
         
        $username = preg_replace( '/\s+/', '', strtolower($name));
        $username = str_replace("/", "", $username);
        $tmpusername = $username;
        $unstatus = 0;
        $usrnameAssign = 1;

        while ($unstatus == 0) {             
            $sql = 'SELECT username FROM delivery_boy WHERE username = "'.$tmpusername.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $tmpusername = $username.$usrnameAssign;
                $usrnameAssign++;
            }else{
                $username = $tmpusername;
                $unstatus = 1;
                break;
            }
        }
        // status deactive.
        $status = 1;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO delivery_boy (name, username, shopkeeper_id, delboy_code, phone, phone2, password, address, status, creation_date, modification_date)  VALUES ( "'.$name.'", "'.$username.'", "'.$id.'", "'.$delboy_code.'", "'.$phone.'", "'.$phone2.'",  "'.$password.'", "'.$address.'", "'.$status.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);        
        if($result){

            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }


    public function getDeliveryBoyList($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, shopkeeper_id, name, username, delboy_code, phone, phone2, address, status, creation_date FROM delivery_boy WHERE shopkeeper_id = "'.$id.'" AND status >= 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);        
        if($num_rows > 0){
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


    public function editDeliveryBoy($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id;       
        $name = $input->name;       
        $phone = $input->phone;
        $phone2 = $input->phone2;       
        $address = $input->address;      
         
        $sql = 'SELECT phone FROM delivery_boy WHERE phone = "'.$phone.'" AND id != "'.$id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return "phoneemail";
        }
         
        $username = preg_replace( '/\s+/', '', strtolower($name));
        $username = str_replace("/", "", $username);
        $tmpusername = $username;
        $unstatus = 0;
        $usrnameAssign = 1;

        while ($unstatus == 0) {             
            $sql = 'SELECT username FROM delivery_boy WHERE username = "'.$tmpusername.'" AND id != "'.$id.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $tmpusername = $username.$usrnameAssign;
                $usrnameAssign++;
            }else{
                $username = $tmpusername;
                $unstatus = 1;
                break;
            }
        }
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE delivery_boy SET name = "'.$name.'", username = "'.$username.'", phone = "'.$phone.'", phone2 = "'.$phone2.'", address = "'.$address.'", modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){

            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }
 
    public function deleteDeliveryBoy($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id; 

        $id = $input->id;
        $phone = $dbObj->deliveryBoyProfile($input)['phone'].'#del';      
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE delivery_boy SET phone = "'.$phone.'", status = 0, modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){
            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }

    public function statusDeliveryBoy($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id;       
        $status = $input->status;       
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE delivery_boy SET status = "'.$status.'", modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){
            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }



    // ===========================================



    public function sendOtpToChangeMobileNo($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $phone = $input->phone;
 
        $sql = 'SELECT id, phone FROM shopkeeper WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $array = mysqli_fetch_assoc($result);
            if($array['id'] == $id){
                return "same";
            }
            return "phoneemail";
        }

        $sql = 'SELECT phone, tokens, otp FROM otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $array = mysqli_fetch_assoc($result);

            $otp = $array['otp'];
            
            // $message = 'Your Mobile Number change OTP is : '.$otp;
            //'Your Mobile Number change OTP is :'.$otp;
            
            $message = 'OTP is:'.$otp.' for change your Mob. No.';
            sendMobileMessage($phone, $message);

            return "success";
        }

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp =  substr($string_shuffled, 1, 6);
        // $message = 'Your Mobile Number change OTP is :'.$otp;
        // $message = 'Your Mobile Number change OTP is : '.$otp;
        
        $message = 'OTP is:'.$otp.' for change your Mob. No.';
        
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $token = substr($string_shuffled, 1, 25);

 
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO otp_validator (phone, tokens, otp, creation_date)  VALUES ("'.$phone.'", "'.$token.'", "'.$otp.'", "'.$date.'")';
        $result = mysqli_query($con, $sql); 
        if($result){

            sendMobileMessage($phone, $message);
            return "success";
        }
        return NULL;
    }


    public function VerifyOTPChangeMobileNo($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $otp = $input->otp;
        $phone = $input->phone;

        $sql = 'SELECT phone, tokens, otp FROM otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $sql = 'DELETE FROM otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
            $result = mysqli_query($con, $sql);

            $sql = 'UPDATE shopkeeper SET phone = "'.$phone.'" WHERE id = "'.$id.'"';
            $result = mysqli_query($con, $sql);

            return "success";
        }
       return NULL;
    }


    public function getAllSoldAmountHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $search = $input->search;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, count(op.order_id) as items, o.order_type, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.transaction_amount as total_amount, o.order_status, o.creation_date, s.name, s.shopname, s.username, s.shopcode, s.phone , s.address, s.pincode FROM orders o INNER JOIN shopkeeper s ON s.id = o.shopkeeper_id INNER JOIN order_product op ON op.order_id = o.order_id WHERE 1 GROUP BY o.order_id ORDER BY o.id DESC';
        
        if(!empty($search)){
            $search = '%'.$search.'%';
            $sql = 'SELECT o.id, o.order_id, count(op.order_id) as items, o.order_type, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.transaction_amount as total_amount, o.order_status, o.creation_date, s.name, s.shopname, s.username, s.shopcode, s.phone , s.address, s.pincode FROM orders o INNER JOIN shopkeeper s ON s.id = o.shopkeeper_id INNER JOIN order_product op ON op.order_id = o.order_id WHERE (o.order_id LIKE "'.$search.'" || s.shopname LIKE "'.$search.'" || s.shopcode LIKE "'.$search.'" || s.phone LIKE "'.$search.'" || s.pincode LIKE "'.$search.'") GROUP BY o.order_id ORDER BY o.id DESC';
        }
        
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


    public function getBankAccountRequest($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $search = $input->search;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT sa.id, sa.user_id, sa.bank_name, sa.account_no, sa.ifsc_code, sa.branch, sa.status, sa.creation_date, sa.modification_date, s.username, s.name, s.shopname, s.shopcode, s.phone, s.email, s.pincode FROM shopkeeper_account sa  INNER JOIN shopkeeper s ON sa.user_id = s.id  WHERE sa.status = 0';
        if(!empty($search)){
            $search = '%'.$search.'%';
             $sql = 'SELECT sa.id, sa.user_id, sa.bank_name, sa.account_no, sa.ifsc_code, sa.branch, sa.status, sa.creation_date, sa.modification_date, s.username, s.name, s.shopname, s.shopcode, s.phone, s.email, s.pincode FROM shopkeeper_account sa  INNER JOIN shopkeeper s ON sa.user_id = s.id  WHERE (sa.bank_name LIKE "'.$search.'" || sa.account_no LIKE "'.$search.'" || sa.ifsc_code LIKE "'.$search.'" || sa.branch LIKE "'.$search.'" || s.name LIKE "'.$search.'" || s.shopname LIKE "'.$search.'" || s.shopcode LIKE "'.$search.'" || s.phone LIKE "'.$search.'" || s.email LIKE "'.$search.'" || s.pincode LIKE "'.$search.'") AND sa.status = 0';
        }
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }           
        }
        return $ret_array;   
    }

    public function getShopkeeperWalletHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $transaction_for = 1;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT wh.id, wh.user_id, wh.total_amount, wh.commission, wh.agent_commission, wh.transaction_for, wh.order_id as wallet_order_id, wh.pay_order_id, wh.transaction_id, wh.transaction_type, wh.transaction_reason, wh.amount_before, wh.amount, wh.amount_after, wh.status, wh.creation_date, o.order_id, wh.pay_order_id, pph.acount_number, pph.ifsc_code FROM wallet_history wh LEFT JOIN orders o ON wh.order_id = o.id LEFT JOIN paytm_payout_history pph ON wh.pay_order_id = pph.order_id WHERE wh.user_id = "'.$id.'" AND wh.transaction_for = "'.$transaction_for.'" ORDER BY wh.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }           
        }
        return $ret_array;   
    }


    public function assignDeliveryBoy($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id;       
        $order_id = $input->order_id;       
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE orders SET delivery_boy = "'.$id.'", assign_date_time = "'.$date.'", modification_date = "'.$date.'" WHERE order_id = "'.$order_id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){
            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }





    public function deliveryBoyLogin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $phone = $input->phone;
        $password = $input->password;

        $array['status'] = 0;
        $array['data'] = [];
 
        $sql = 'SELECT id, shopkeeper_id, name, username, delboy_code, phone, address, status, creation_date FROM delivery_boy WHERE phone = "'.$phone.'" AND password = "'.$password.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $data = mysqli_fetch_assoc($result);
            $data['id'] = (int)$data['id'];
            $array['status'] = (int)$data['status'];
            
            $array['data'] = $data;           
        }
        return $array;     
    }


    public function deliveryBoyProfile($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $id = $input->id;

        $sql = 'SELECT id, shopkeeper_id, name, username, delboy_code, phone, phone2, address, status, creation_date FROM delivery_boy WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $ret_array = mysqli_fetch_assoc($result);
        }
        return $ret_array;     
    }

    public function getDeliveryBoyOrders($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->delivery_boy_id;
        $status = $input->status;

        $statusText = '';
        if($status != -1){ 
            $statusText = ' AND o.order_status = ' . $status;
        }

        // $tmpArray['order'] = [];
        // $tmpArray['products'] = [];

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, o.order_type, o.phone, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.total_amount, o.delivery_boy, o.order_status, o.creation_date, s.shopname, s.name, s.phone as shopcontact, db.name as dname, db.phone as dphone, db.phone2 as dphone2 FROM orders o INNER JOIN shopkeeper s ON o.shopkeeper_id = s.id LEFT JOIN delivery_boy db ON o.delivery_boy = db.id WHERE o.delivery_boy = "'.$id.'"'.$statusText.'  ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){

                $input->order_id = $array['order_id'];

                $order_type = "Self Shipping";
                if($array['order_type'] == 2){
                    $order_type = "Home Delivery";
                }
                $array['order_type_text'] = $order_type;

                $order_status = "Pending";
                if($array['order_status'] == 1){
                    $order_status = "Delivered";
                }
                else if($array['order_status'] == 2){
                    $order_status = "Cancelled";
                }
                
                $array['order_text'] = $order_status;

                $array['time'] = date('h:i a', strtotime($array['creation_date']));
                $array['creation_date'] = date('d M Y', strtotime($array['creation_date']));
                
                // $tmpArray['order'] = $array;
                // $tmpArray['products'] = $dbObj->getPlaceOrderProducts($input);

                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


    public function failPaymentHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $ip_address = $input->ip_address;
        $order_id = $input->order_id;
        $mid = $input->mid;
        $txnid = $input->txnid;
        $txn_amt = $input->txn_amt;
        $pay_mode = $input->pay_mode;
        $currency = $input->currency;
        $txn_date = $input->txn_date;
        $status = $input->status;
        $res_code = $input->res_code;
        $res_msg = $input->res_msg;
        $gateway = $input->gateway;
        $bnk_txn_id = $input->bnk_txn_id;
        $bnk_name = $input->bnk_name;
        $checksum = $input->checksum;

        $order_data = $dbObj->getOrderData($input);
        $order_type = $order_data['order_type'];
        $phone = $order_data['phone'];
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO fail_payment_order_history (ip_address, phone, order_type, order_id, mid, txn_id, txn_amt, pay_mode, currency, txn_date, txn_status, res_code, res_message, gateway, bank_txn_id, bank_name, checksum, creation_date, modification_date)VALUES ("'.$ip_address.'", "'.$phone.'", "'.$order_type.'", "'.$order_id.'", "'.$mid.'", "'.$txnid.'", "'.$txn_amt.'", "'.$pay_mode.'", "'.$currency.'", "'.$txn_date.'", "'.$status.'", "'.$res_code.'", "'.$res_msg.'", "'.$gateway.'", "'.$bnk_txn_id.'", "'.$bnk_name.'", "'.$checksum.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);

        return "success";
    }



    public function sendOtpVerifyShopkeeper($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT id, phone FROM shopkeeper WHERE phone = "'.$phone.'" AND status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows <= 0) {

            // $array = mysqli_fetch_assoc($result);

            // $otp = $array['otp'];
            // $message = 'Your payment proceed  OTP is :'.$otp;
            // // sendMobileMessage($phone, $message);

            $array['status'] = 0;
            $array['data'] = "phone";

            return $array;
        }

        $sql = 'SELECT phone, tokens, otp FROM shopkeeper_forgot_otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $array = mysqli_fetch_assoc($result);

            $otp = $array['otp'];
            // $message = 'Your Forgot Pasword OTP at www.jalpans.com is : '.$otp;
            //'Your Forgot Pasword  OTP is :'.$otp;
            
            $message = 'Your forget Password OTP is:'.$otp.' at jalpans.com';
            sendMobileMessage($phone, $message);

            $array['status'] = 2;
            $array['data'] = "success";

            return $array;
        }

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp =  substr($string_shuffled, 1, 6);
        // $message = "Your payment proceed OTP is : ".$otp;
        // $message = 'Your Forgot Pasword OTP at www.jalpans.com is : '.$otp;
        
        $message = 'Your forget Password OTP is:'.$otp.' at jalpans.com';
        
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $token = substr($string_shuffled, 1, 25);

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO shopkeeper_forgot_otp_validator (phone, tokens, otp, creation_date)  VALUES ("'.$phone.'", "'.$token.'", "'.$otp.'", "'.$date.'")';
        $result = mysqli_query($con, $sql); 
        if($result){

            sendMobileMessage($phone, $message);
            $array['status'] = 1;
            $array['data'] = 'success';
            return $array;
        }
        return $array;
    }



    public function resetShopkeeperPassword($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $otp = trim($input->otp);
        $phone = $input->phone;
        $password = $input->password;
        // $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT phone, tokens, otp FROM shopkeeper_forgot_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $sql1 = 'DELETE FROM shopkeeper_forgot_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
            $result1 = mysqli_query($con, $sql1);

            // $array = mysqli_fetch_assoc($result);

            // $otp = $array['otp'];
            // $message = 'Your payment proceed  OTP is :'.$otp;
            // sendMobileMessage($phone, $message);


            $sql2 = 'UPDATE shopkeeper SET password = "'.$password.'", modification_date = "'.$date.'" WHERE phone = "'.$phone.'" AND status = 1';
            $result2 = mysqli_query($con, $sql2);


            $array['status'] = 1;
            $array['data'] = "tokens";
        }
       return $array;
    }




    public function sendOtpVerifyDeliveryBoy($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";



        $sql = 'SELECT id, phone FROM delivery_boy WHERE phone = "'.$phone.'" AND status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows <= 0) {

            // $array = mysqli_fetch_assoc($result);

            // $otp = $array['otp'];
            // $message = 'Your payment proceed  OTP is :'.$otp;
            // // sendMobileMessage($phone, $message);

            $array['status'] = 0;
            $array['data'] = "phone";

            return $array;
        }

        $sql = 'SELECT phone, tokens, otp FROM deliveryboy_forgot_otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $array = mysqli_fetch_assoc($result);

            $otp = $array['otp'];
            // $message = 'Your Forgot Pasword  OTP is :'.$otp;
            // $message = 'Your Forgot Pasword OTP at www.jalpans.com is : '.$otp;
            $message = 'Your forget Password OTP is:'.$otp.' at jalpans.com';
            sendMobileMessage($phone, $message);

            $array['status'] = 2;
            $array['data'] = "success";

            return $array;
        }

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp =  substr($string_shuffled, 1, 6);
        // $message = 'Your Forgot Pasword OTP at www.jalpans.com is : '.$otp;
        
        $message = 'Your forget Password OTP is:'.$otp.' at jalpans.com';
        
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $token = substr($string_shuffled, 1, 25);

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO deliveryboy_forgot_otp_validator (phone, tokens, otp, creation_date)  VALUES ("'.$phone.'", "'.$token.'", "'.$otp.'", "'.$date.'")';
        $result = mysqli_query($con, $sql); 
        if($result){

            sendMobileMessage($phone, $message);
            $array['status'] = 1;
            $array['data'] = 'success';
            return $array;
        }
        return $array;
    }



    public function resetDeliveryBoyPassword($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $otp = trim($input->otp);
        $phone = $input->phone;
        $password = $input->password;
        // $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT phone, tokens, otp FROM deliveryboy_forgot_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $sql1 = 'DELETE FROM deliveryboy_forgot_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
            $result1 = mysqli_query($con, $sql1);

            // $array = mysqli_fetch_assoc($result);

            // $otp = $array['otp'];
            // $message = 'Your payment proceed  OTP is :'.$otp;
            // sendMobileMessage($phone, $message);


            $sql2 = 'UPDATE delivery_boy SET password = "'.$password.'", modification_date = "'.$date.'" WHERE phone = "'.$phone.'" AND status = 1';
            $result2 = mysqli_query($con, $sql2);


            $array['status'] = 1;
            $array['data'] = "tokens";
        }
       return $array;
    }




    public function getAdminWalletHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $transaction_for = 2;

        $search = $input->search;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT wh.id, wh.user_id, wh.total_amount, wh.commission, wh.agent_commission,  wh.transaction_for, wh.order_id, wh.transaction_id, wh.transaction_type, wh.transaction_reason, wh.amount_before, wh.amount, wh.amount_after, wh.status, wh.creation_date, o.order_id FROM wallet_history wh LEFT JOIN orders o ON wh.order_id = o.id WHERE wh.transaction_for = "'.$transaction_for.'" ORDER BY wh.id DESC';
        
        if(!empty($search)){
            $search = '%'.$search.'%';
            $sql = 'SELECT wh.id, wh.user_id, wh.total_amount, wh.commission, wh.agent_commission,  wh.transaction_for, wh.order_id, wh.transaction_id, wh.transaction_type, wh.transaction_reason, wh.amount_before, wh.amount, wh.amount_after, wh.status, wh.creation_date, o.order_id FROM wallet_history wh LEFT JOIN orders o ON wh.order_id = o.id WHERE(o.order_id LIKE "'.$search.'" ||wh.transaction_id LIKE "'.$search.'") AND wh.transaction_for = "'.$transaction_for.'" ORDER BY wh.id DESC';
        }
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }           
        }
        return $ret_array;   
    }

    public function getGstWalletHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $transaction_for = 3;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT wh.id, wh.user_id, wh.transaction_for, wh.order_id, wh.transaction_id, wh.transaction_type, wh.transaction_reason, wh.amount_before, wh.amount, wh.amount_after, wh.status, wh.creation_date, o.order_id FROM wallet_history wh LEFT JOIN orders o ON wh.order_id = o.id WHERE wh.transaction_for = "'.$transaction_for.'" ORDER BY wh.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }           
        }
        return $ret_array;   
    }


    // ------------------- Shop Agent  -----------------------



     public function VerifyShopAgentPhoneAndSendOTP($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;
        // $email = $input->email;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT phone, email FROM shop_agent WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $array['status'] = 2;
            $array['data'] = "";

            return $array;
        }
        
        
        $sql = 'SELECT otp FROM shop_agent_otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);

            $otp = $row['otp'];
            // $message = 'Welcome Agent: '.$phone.'.Your Sign Up OTP is: '.$otp;
            //"Hello ".$phone.", Your OTP is : ".$otp;

            $message = 'Welcome Mr. Agent:'.$phone.'. your sign up OTP is:'.$otp.' at jalpans.com';
            $array['status'] = 1;
            $array['data'] = "success";
            sendMobileMessage($phone, $message);

            return $array;
        }
        

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp = substr($string_shuffled, 1, 6);
        
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $token = substr($string_shuffled, 1, 25);
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO shop_agent_otp_validator (phone, tokens, otp, creation_date)  VALUES ("'.$phone.'", "'.$token.'", "'.$otp.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);        
        if($result){
            // $message = "Hello ".$phone.", Your OTP is : ".$otp;
            // $message = 'Welcome Agent: '.$phone.'.Your Sign Up OTP is: '.$otp;
            
            $message = 'Welcome Mr. Agent:'.$phone.'. your sign up OTP is:'.$otp.' at jalpans.com';
            sendMobileMessage($phone, $message);
            $array['status'] = 1;
            $array['data'] = $token;
            return $array;
        }
        
        return NULL;
    }


    public function verifyShopAgentSendOTP($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;
        $otp = $input->otp;
        $token = $input->token;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT otp FROM shop_agent_otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);

            $dbotp = $row['otp'];
            if($dbotp == $otp){
                $array['status'] = 1;
                $array['data'] = "success";

                $sql = 'DELETE FROM shop_agent_otp_validator WHERE phone = "'.$phone.'"';
                $result = mysqli_query($con, $sql);

                return $array;
            }

            $array['status'] = 2;
            $array['data'] = "validate";
             
            return $array;
        }
        
        return NULL;
    }




    public function addShopAgent($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $name = $input->name;       
        $phone = $input->phone;
        $phone2 = $input->phone2;   
        $email = $input->email;    
        $address = $input->address;      
        $password = $input->password;
        
        if(empty($phone) || empty($password)){
            return NULL;
        }
         
        $shop_agent_code = 'SAGENT'.substr(time(), -6);

        $sql = 'SELECT phone FROM shop_agent WHERE (phone = "'.$phone.'")';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return "phoneemail";
        }
         
        $username = preg_replace( '/\s+/', '', strtolower($name));
        $username = str_replace("/", "", $username);
        $tmpusername = $username;
        $unstatus = 0;
        $usrnameAssign = 1;

        while ($unstatus == 0) {             
            $sql = 'SELECT username FROM shop_agent WHERE username = "'.$tmpusername.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $tmpusername = $username.$usrnameAssign;
                $usrnameAssign++;
            }else{
                $username = $tmpusername;
                $unstatus = 1;
                break;
            }
        }
        // status deactive.
        $status = 1;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO shop_agent (name, username, shop_agent_code, phone, phone2, email, password, address, status, creation_date, modification_date)  VALUES ( "'.$name.'", "'.$username.'", "'.$shop_agent_code.'", "'.$phone.'", "'.$phone2.'", "'.$email.'", "'.$password.'", "'.$address.'", "'.$status.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);        
        if($result){

            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }


    public function getShopAgentList($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $search = $input->search;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, name, username, shop_agent_code, phone, phone2, address, wallet, status, creation_date FROM shop_agent WHERE 1 AND status >= 1';
        
        if(!empty($search)){
            $search = '%'.$search.'%';
            $sql = 'SELECT id, name, username, shop_agent_code, phone, phone2, address, wallet, status, creation_date FROM shop_agent WHERE (name LIKE "'.$search.'" || shop_agent_code LIKE "'.$search.'" || phone LIKE "'.$search.'" || phone2 LIKE "'.$search.'" ||  address LIKE "'.$search.'") AND status >= 1';
        }
        
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);        
        if($num_rows > 0){
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }


    public function editShopAgent($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id;       
        $name = $input->name;       
        $phone = $input->phone;
        $phone2 = $input->phone2;       
        $address = $input->address;      
         
        $sql = 'SELECT phone FROM shop_agent WHERE phone = "'.$phone.'" AND id != "'.$id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            return "phoneemail";
        }
         
        $username = preg_replace( '/\s+/', '', strtolower($name));
        $username = str_replace("/", "", $username);
        $tmpusername = $username;
        $unstatus = 0;
        $usrnameAssign = 1;

        while ($unstatus == 0) {             
            $sql = 'SELECT username FROM shop_agent WHERE username = "'.$tmpusername.'" AND id != "'.$id.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $tmpusername = $username.$usrnameAssign;
                $usrnameAssign++;
            }else{
                $username = $tmpusername;
                $unstatus = 1;
                break;
            }
        }
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE shop_agent SET name = "'.$name.'", username = "'.$username.'", phone = "'.$phone.'", phone2 = "'.$phone2.'", address = "'.$address.'", modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){

            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }
 
    public function deleteShopAgent($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id;
        $phone = $dbObj->shopAgentProfile($input)['phone'].'#del';    
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE shop_agent SET phone = "'.$phone.'", status = 0, modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){
            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }

    public function statusShopAgent($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
 
        $id = $input->id;       
        $status = $input->status;       
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE shop_agent SET status = "'.$status.'", modification_date = "'.$date.'" WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);        
        if($result){
            // $input->id = mysqli_insert_id($con);
            return 'success';
        }
        return NULL;
    }

    public function shopAgentLogin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $phone = $input->phone;
        $password = $input->password;

        $array['status'] = 0;
        $array['data'] = [];
 
        $sql = 'SELECT id, name, username, shop_agent_code, phone, address, status, creation_date FROM shop_agent WHERE phone = "'.$phone.'" AND password = "'.$password.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $data = mysqli_fetch_assoc($result);
            $data['id'] = (int)$data['id'];
            $array['status'] = (int)$data['status'];
            
            $array['data'] = $data;           
        }
        return $array;     
    }


    public function shopAgentProfile($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $id = $input->id;

        $sql = 'SELECT id, name, username, shop_agent_code, phone, phone2, address, wallet, status, creation_date FROM shop_agent WHERE id = "'.$id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $ret_array = mysqli_fetch_assoc($result);
        }
        return $ret_array;     
    }


    public function getAgentShopkeepers($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, agent_id, name, username, shopcode, image, phone, email, pincode, address, status, min_order_amount, creation_date FROM shopkeeper WHERE agent_id = "'.$id.'" AND  status > 0 ORDER BY id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)){
                $row['creation_date'] = date("d/m/Y", strtotime($row['creation_date']));
                array_push($ret_array, $row);
            }
            return $ret_array; 
        }
        return NULL;     
    }






    public function sendOtpVerifyShopAgent($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";



        $sql = 'SELECT id, phone FROM shop_agent WHERE phone = "'.$phone.'" AND status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows <= 0) {

            // $array = mysqli_fetch_assoc($result);

            // $otp = $array['otp'];
            // $message = 'Your payment proceed  OTP is :'.$otp;
            // // sendMobileMessage($phone, $message);

            $array['status'] = 0;
            $array['data'] = "phone";

            return $array;
        }

        $sql = 'SELECT phone, tokens, otp FROM shopagent_forgot_otp_validator WHERE phone = "'.$phone.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $array = mysqli_fetch_assoc($result);

            $otp = $array['otp'];
            // $message = 'Your Forgot Pasword  OTP is :'.$otp;
            // $message = 'Your Forgot Pasword OTP at www.jalpans.com is : '.$otp;
            
            $message = 'Your forget Password OTP is:'.$otp.' at jalpans.com';
            sendMobileMessage($phone, $message);

            $array['status'] = 2;
            $array['data'] = "success";

            return $array;
        }

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp =  substr($string_shuffled, 1, 6);
        // $message = "Your payment proceed OTP is : ".$otp;
        // $message = 'Your Forgot Pasword OTP at www.jalpans.com is : '.$otp;
        
        $message = 'Your forget Password OTP is:'.$otp.' at jalpans.com';
        
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string_shuffled = str_shuffle($string);
        $token = substr($string_shuffled, 1, 25);

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO shopagent_forgot_otp_validator (phone, tokens, otp, creation_date)  VALUES ("'.$phone.'", "'.$token.'", "'.$otp.'", "'.$date.'")';
        $result = mysqli_query($con, $sql); 
        if($result){

            sendMobileMessage($phone, $message);
            
            $array['status'] = 1;
            $array['data'] = 'success';
            return $array;
        }
        return $array;
    }


    public function resetShopAgentPassword($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $otp = trim($input->otp);
        $phone = $input->phone;
        $password = $input->password;
        // $phone = $input->phone;

        $array['status'] = 0;
        $array['data'] = "";

        $sql = 'SELECT phone, tokens, otp FROM shopagent_forgot_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $sql1 = 'DELETE FROM shopagent_forgot_otp_validator WHERE phone = "'.$phone.'" AND otp = "'.$otp.'"';
            $result1 = mysqli_query($con, $sql1);

            // $array = mysqli_fetch_assoc($result);

            // $otp = $array['otp'];
            // $message = 'Your payment proceed  OTP is :'.$otp;
            // sendMobileMessage($phone, $message);


            $sql2 = 'UPDATE shop_agent SET password = "'.$password.'", modification_date = "'.$date.'" WHERE phone = "'.$phone.'" AND status = 1';
            $result2 = mysqli_query($con, $sql2);


            $array['status'] = 1;
            $array['data'] = "tokens";
        }
       return $array;
    }



    public function getShopAgentWalletHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $agent_id = $input->id;
        $transaction_for = 3;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT wh.id, wh.user_id, wh.total_amount, wh.commission, wh.agent_commission, wh.transaction_for, wh.order_id as wallet_order_id, wh.pay_order_id, wh.transaction_id, wh.transaction_type, wh.transaction_reason, wh.amount_before, wh.amount, wh.amount_after, wh.status, wh.creation_date, o.order_id, pph.acount_number, pph.ifsc_code FROM wallet_history wh LEFT JOIN orders o ON wh.order_id = o.id  LEFT JOIN shopkeeper s ON o.shopkeeper_id = s.id LEFT JOIN paytm_payout_history pph ON wh.pay_order_id = pph.order_id WHERE wh.transaction_for = "'.$transaction_for.'" AND wh.user_id = "'.$agent_id.'" ORDER BY wh.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }           
        }
        return $ret_array;   
    }


     public function getAgentTodaySoldAmountHistory($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $agent_id = $input->id;

        $del_date = '%'.date('Y-m-d').'%';

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT o.id, o.order_id, count(op.order_id) as items, o.order_type, o.shopkeeper_id, o.payment_status, o.payment_id, o.commission, o.transaction_amount as total_amount, o.order_status, o.creation_date, s.name, s.shopname, s.username, s.shopcode, s.phone , s.address, s.pincode FROM orders o INNER JOIN shopkeeper s ON s.id = o.shopkeeper_id INNER JOIN order_product op ON op.order_id = o.order_id WHERE 1 AND s.agent_id = "'.$agent_id.'" AND o.creation_date LIKE "'.$del_date.'" GROUP BY o.order_id ORDER BY o.id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;
    }

 
    public function verifyAdminPassword($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $old_passord = $input->old_passord;
        $password = $input->password;

        $sql = 'SELECT password FROM super_admin WHERE password = "'.$old_passord.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows <= 0) {            
            return "oldpass";
        }
        
        $phone = ['9610534411', '9682124132', '9571828691'];

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, otp1, otp2, otp3, creation_date FROM admin_otp_validator ';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $array = mysqli_fetch_assoc($result);

            // $message = "Hello Admin change password  OTP is : ".$array['otp1'];
            // $message = 'Hello Admin password change OTP is : '.$array['otp1'];
            
            $message = 'Hello Admin, OTP is:'.$array['otp1'].' for your PW Reset.';
            sendMobileMessage($phone[0], $message);

            // $message = "Hello Admin change password  OTP is : ".$array['otp2'];
            // $message = 'Hello Admin password change OTP is : '.$array['otp2'];
            
            $message = 'Hello Admin, OTP is:'.$array['otp2'].' for your PW Reset.';
            sendMobileMessage($phone[1], $message);

            // $message = "Hello Admin change password  OTP is : ".$array['otp3'];
            // $message = 'Hello Admin password change OTP is : '.$array['otp3'];
            
            $message = 'Hello Admin, OTP is:'.$array['otp3'].' for your PW Reset.';
            sendMobileMessage($phone[2], $message);

            return "success";
        }

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp1 = substr($string_shuffled, 1, 6);
        // $message = "Hello Admin change password  OTP is : ".$otp1;
        // $message = 'Hello Admin password change OTP is : '.$otp1;
        
        $message = 'Hello Admin, OTP is:'.$otp1.' for your PW Reset.';
        sendMobileMessage($phone[0], $message);
        
        
        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp2 = substr($string_shuffled, 1, 6);
        // $message = "Hello Admin change password  OTP is : ".$otp2;
        // $message = 'Hello Admin password change OTP is : '.$otp2;
        
        $message = 'Hello Admin, OTP is:'.$otp2.' for your PW Reset.';
        sendMobileMessage($phone[1], $message);

        $string = '0123456789';
        $string_shuffled = str_shuffle($string);
        $otp3 = substr($string_shuffled, 1, 6);
        // $message = "Hello Admin change password  OTP is : ".$otp3;
        // $message = 'Hello Admin password change OTP is : '.$otp3;
        
        $message = 'Hello Admin, OTP is:'.$otp3.' for your PW Reset.';
        sendMobileMessage($phone[2], $message);

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO admin_otp_validator (otp1, otp2, otp3, creation_date)  VALUES ("'.$otp1.'", "'.$otp2.'", "'.$otp3.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);        
        if($result){            
            return 'success';
        }
        
        return NULL;
    }

    public function changeAdminPassword($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $password = $input->password;
        $otp1 = $input->otp1;
        $otp2 = $input->otp2;
        $otp3 = $input->otp3;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, otp1, otp2, otp3, creation_date FROM admin_otp_validator ';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $array = mysqli_fetch_assoc($result);

            $list = array($array['otp1'], $array['otp2'], $array['otp3']);

            if(!in_array($otp1, $list)){
                return 'otp';
            }

            if(!in_array($otp2, $list)){
                return 'otp';
            }

            if(!in_array($otp3, $list)){
                return 'otp';
            }
            
            mysqli_set_charset($con,'utf8mb4');
            $sql0 = 'UPDATE super_admin SET  password = "'.$password.'" WHERE id = 1';
            $result0 = mysqli_query($con, $sql0);

            mysqli_set_charset($con,'utf8mb4');
            $sql1 = 'DELETE FROM admin_otp_validator WHERE 1';
            $result1 = mysqli_query($con, $sql1);


            return "success";
        }

        return NULL;
    }


    public function getAdminProfile($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);
 
        $sql = 'SELECT name, phone, email, image, password, comission, agent_commission, wallet, gst_wallet, notice, shop_notice, agent_notice, max_delivery_hour FROM super_admin WHERE id = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {

            $ret_array = mysqli_fetch_assoc($result);
            // $array['comission'] = $data['comission'];           
        }
        return $ret_array;     
    }


    public function saveOtherSettings($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $commission = $input->commission;
        $agent_commission = $input->agent_commission;
        $notice = $input->notice;
        $shop_notice = $input->shop_notice;
        $agent_notice = $input->agent_notice;
        $max_delivery_hour = $input->max_delivery_hour;

        $sql = 'UPDATE super_admin SET comission = "'.$commission.'", agent_commission = "'.$agent_commission.'",  notice = "'.$notice.'", shop_notice = "'.$shop_notice.'", agent_notice = "'.$agent_notice.'", max_delivery_hour = "'.$max_delivery_hour.'"  WHERE id = 1';
        $result = mysqli_query($con, $sql);
         
        if ($result) {
          return "success";
        }
        return NULL;     
    }


    public function getShopkeeperProfileDetails($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        $data['error'] = "error";
        $data['data'] = [];

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT sa.id, sa.user_id, sa.bank_name, sa.account_no, sa.ifsc_code, sa.branch, sa.status, sa.creation_date, sa.modification_date, s.username, s.name, s.shopname, s.shopcode, s.phone, s.email, s.pincode, s.wallet FROM shopkeeper_account sa  INNER JOIN shopkeeper s ON sa.user_id = s.id  WHERE sa.user_id = "'.$id.'" AND sa.status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            
            $array = mysqli_fetch_assoc($result);  
            
            $data['error'] = "success";
            $data['data'] = $array; 

        }
        return $data;   
    }
    
    public function getShopkeeperAccountDetails($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $account_id = $input->account_id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date FROM shopkeeper_account WHERE id = "'.$account_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
           $array = mysqli_fetch_assoc($result);
           return $array;
        }
        return NULL;   
    }
    
    
    public function manageWalletPayOut($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $order_id = $input->order_id;
        $order = $dbObj->getTrackOrder($input);        
        $admin = $dbObj->getAdminCommission($input);
        
        $agent = [];
        if($order['agent_id'] > 0){
            $mydata['id'] = $order['agent_id'];
            $mydata['api_key'] = $input->api_key;
            $agent = $dbObj->shopAgentProfile(json_decode(json_encode($mydata)));
        }

        // for Shopkeeper
        $transaction_type = 'CR';
        $transaction_reason = 'wallet credited for order delivered';
        $after_credited = $order['wallet'] + $order['total_amount'];

        $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
        $sql = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, total_amount, transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$order['shopkeeper_id'].'", 1, "'.$order['id'].'", "'.$order['commission'].'", "'.$order['transaction_amount'].'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$order['wallet'].'", "'.$order['total_amount'].'", "'.$after_credited.'", "'.$date.'" )';
        $result = mysqli_query($con, $sql);

        $sql1 = 'UPDATE shopkeeper SET wallet = "'.$after_credited.'" WHERE id = "'.$order['shopkeeper_id'].'"';
        $result1 = mysqli_query($con, $sql1);

        $admin_amount = $order['transaction_amount'] - $order['total_amount'];
        $agent_amount = 0;
        // for admin
        $transaction_type = 'CR';
        $transaction_reason = 'wallet credited for order delivered';

        if(!empty($agent)){
            $agent_commission = $order['agent_commission'];
            $agent_amount = ($admin_amount * $agent_commission)/100;
            $admin_amount = $admin_amount - $agent_amount;

            // for agent commisiion
            $transaction_type = 'CR';
            $transaction_reason = 'wallet credited for order delivered';
            $after_credited = $agent['wallet'] + $agent_amount;

            $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
            $sql4 = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, agent_commission, total_amount,  transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$agent['id'].'", 3, "'.$order['id'].'", "'.$order['commission'].'", "'.$order['agent_commission'].'", "'.$order['transaction_amount'].'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$agent['wallet'].'", "'.$agent_amount.'", "'.$after_credited.'", "'.$date.'" )';
            $result4 = mysqli_query($con, $sql4);

            $sql5 = 'UPDATE shop_agent SET wallet = "'.$after_credited.'" WHERE id = "'.$agent['id'].'"';
            $result5 = mysqli_query($con, $sql5);

        }
        
        $after_credited = $admin['wallet'] + $admin_amount;

        $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
        $sql2 = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, commission, total_amount,  transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES("'.$admin['id'].'", 2, "'.$order['id'].'", "'.$order['commission'].'", "'.$order['transaction_amount'].'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$admin['wallet'].'", "'.$admin_amount.'", "'.$after_credited.'", "'.$date.'" )';
        $result2 = mysqli_query($con, $sql2);

        $sql3 = 'UPDATE super_admin SET wallet = "'.$after_credited.'" WHERE id = "'.$admin['id'].'"';
        $result3 = mysqli_query($con, $sql3);

        return 'success';
    }


    public function paytmShopkeeperPayOut($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $order_id = $input->order_id;
        $user_id = $input->id;
        $account_id = $input->account_id;
        $account_number = $input->account_number;
        $ifsc_code = $input->ifsc_code;
        $amount = $input->amount;
        $response_status = $input->response_status;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO paytm_payout_history (order_id, user_type, user_id, account_id, acount_number, ifsc_code, amount, response_status, status, creation_date, modification_date)VALUES ("'.$order_id.'", 1, "'.$user_id.'", "'.$account_id.'", "'.$account_number.'", "'.$ifsc_code.'", "'.$amount.'", "'.$response_status.'", 1, "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);
        
        if($result){
            
            $shopkeeper = $dbObj->getShopkeeperProfileDetails($input);
            $transaction_type = 'PENDING';
            $transaction_reason = 'Transaction in process...';
            $after_debited = $shopkeeper['data']['wallet'] - $amount;
    
            $transaction_id = 'JLPNSWLTS'.substr(time(), -6); 
            $sql = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, pay_order_id, commission, total_amount, transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, status, creation_date) VALUES
            ("'.$user_id.'", 1, 0, "'.$order_id.'", 0, "'.$amount.'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$shopkeeper['data']['wallet'].'", "'.$amount.'", "'.$after_debited.'", 0, "'.$date.'" )';
            $result = mysqli_query($con, $sql);
    
            // $sql1 = 'UPDATE shopkeeper SET wallet = "'.$after_debited.'" WHERE id = "'.$user_id.'"';
            // $result1 = mysqli_query($con, $sql1);
            
             return "success";
        }
        return NULL;
    }
    
    public function _croneJob() {
         $mydata['api_key'] = 'bcb8a9a740d3d322bbed353c97087857';
        
        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection(json_decode(json_encode($mydata)));
        // print_r($con);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $ipp = $_SERVER['REMOTE_ADDR'];
        $dbObj->paytmShopkeeperPayOutTransactionStatus();
        // $sql = 'INSERT INTO _crone_job (date,ip, creation_date)VALUES ("'.$date.'", "'.$ipp.'", "'.$date.'")';
        // $result = mysqli_query($con, $sql);

        
    }
    
    
    public function autoCancelledOrder() {
        $mydata['api_key'] = 'bcb8a9a740d3d322bbed353c97087857';
        
        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection(json_decode(json_encode($mydata)));
        
        $delivery_hour = $this->getAdminProfile(json_decode(json_encode($mydata)))['max_delivery_hour'];
        
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $delivery_date = date('Y-m-d H:i:s', strtotime('-'.$delivery_hour.' hour'));
        // return  $delivery_date;
        $orders_for_cancel = [];
        echo $sql = 'SELECT id, order_id, order_type, order_status FROM orders WHERE order_type = 2 AND order_status = 0 AND creation_date <= "'.$delivery_date.'" ORDER BY id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($orders_for_cancel, $array);
            }
        }
        
        // print_r($orders_for_cancel);
        // return $orders_for_cancel;
        
        for($i = 0; $i < count($orders_for_cancel); $i++){
            $order_id = $orders_for_cancel[$i]['order_id'];
            $order_status = 2;
            $auto_cancelled = 1;
            
            $sql1 = 'UPDATE orders SET order_status = "'.$order_status.'", order_status = "'.$order_status.'", auto_cancelled = "'.$auto_cancelled.'", action_by = "auto_cancelled", delivery_date_time = "'.$date.'", modification_date = "'.$date.'"  WHERE order_id = "'.$order_id.'"';
            $result1 = mysqli_query($con, $sql1);
        }

        $dbObj->refundStatus();
        
        return 'success';
    }





    public function refundStatus() {
        $mydata['api_key'] = 'bcb8a9a740d3d322bbed353c97087857';
        
        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection(json_decode(json_encode($mydata)));
        
        $delivery_hour = $this->getAdminProfile(json_decode(json_encode($mydata)))['max_delivery_hour'];
        
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
        $delivery_date = date('Y-m-d H:i:s', strtotime('-'.$delivery_hour.' hour'));
        // return  $delivery_date;
        $refund_orders = [];
        $sql = 'SELECT id, order_id, ref_id, refund_status FROM order_refund WHERE refund_status =  "PENDING"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($refund_orders, $array);
            }
        }
        
        // return $refund_orders;
        for($i = 0; $i < count($refund_orders); $i++){
            $order_id = $refund_orders[$i]['order_id'];
            $ref_id = $refund_orders[$i]['ref_id'];
            
            $ref_status = $dbObj->paytmRefundStatus($order_id, $ref_id);

            $result_status = $ref_status->body->resultInfo->resultStatus;
            $result_code = $ref_status->body->resultInfo->resultCode;
            $result_message = $ref_status->body->resultInfo->resultMsg;
            $result_date = $ref_status->body->txnTimestamp;
            // return $ref_status;

            if($result_status == 'TXN_FAILURE'){

                $sql2 = 'UPDATE order_refund SET refund_code = "'.$result_code.'", refund_status = "'.$result_status.'", refund_message = "'.$result_message.'", refund_timestamp = "'.$result_date.'", modification_date = "'.$date.'" WHERE order_id = "'.$order_id.'"';
                $result2 = mysqli_query($con, $sql2);
            }

            $sql1 = 'UPDATE orders SET refund_status = "'.$result_status.'", refund_message = "'.$result_message.'", refund_date = "'.$result_date.'", modification_date = "'.$date.'" WHERE order_id = "'.$order_id.'"';
            $result1 = mysqli_query($con, $sql1);
            
            
            $sql = 'SELECT phone, refund_amount FROM orders WHERE order_id = "'.$order_id.'"';
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
    
                $phone = $row['phone'];
                $ref_amt = $row['refund_amount'];
                
                $message = 'Hi Customer.Your Refund Amt Rs. '.$ref_amt.' of Order Id- '.$order_id.'has been credited successfully to the same A/C by which you paid. By jalpans.com';
                sendMobileMessage($phone, $message);
            }
            
            // return 'success';
        }
        return 'success';
    }



    public function paytmRefundStatus($order_id, $ref_id) {
    
        require_once("../../paytmPayout/PaytmChecksum.php");
        
        $paytmParams = array();

        $paytmParams["body"] = array(
            "mid"         => "tPWyFC22266459414087",
            "orderId"     => $order_id,
            "refId"       => $ref_id,
        );

        /*
        * Generate checksum by parameters we have in body
        * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
        */
        $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "x8tR9lvP3RIVs@jG"); 


        $paytmParams["head"] = array(
            "signature"   => $checksum
        );

        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

        /* for Staging */
        // $url = "https://securegw-stage.paytm.in/v2/refund/status";

        /* for Production */
        $url = "https://securegw.paytm.in/v2/refund/status";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
        $response = curl_exec($ch);
        // print_r($response);  

        $res_array = json_decode($response);
        // echo "Refud Response Result Data <br/>";
        // echo "========================== <br/>";           
        // print_r($res_array);
        
        return $res_array;
    }

    
    
    public function paytmShopkeeperPayOutTransactionStatus() {

        $mydata['api_key'] = 'bcb8a9a740d3d322bbed353c97087857';
        
        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection(json_decode(json_encode($mydata)));
        // print_r($con);
        
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $ipp = $_SERVER['REMOTE_ADDR'];
       
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $accepted = 'ACCEPTED';
        $pending_payout = [];
        
        $sql = 'SELECT id, order_id, user_type, user_id, response_status, amount FROM paytm_payout_history WHERE response_status = "'.$accepted.'" ORDER BY id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($pending_payout, $array);
            }
        }
        
        // return $pending_payout;
        
        for($i = 0; $i < count($pending_payout); $i++){
            
            $order_id = $pending_payout[$i]['order_id'];
            $user_id = $pending_payout[$i]['user_id'];
            $amount = $pending_payout[$i]['amount'];
            $mytransaction_response = json_decode($dbObj->paytmShopkeeperPayOutTransaction($order_id));
            
            // return $mytransaction_response;
        
            if(!empty($mytransaction_response)){
                
                $response_status = trim($mytransaction_response->status);
                $response_message = $mytransaction_response->statusMessage;
                    
                if(trim($response_status) == 'SUCCESS'){
                    
                    $inputdata['id'] = $user_id;
                    $inputdata['api_key'] = 'bcb8a9a740d3d322bbed353c97087857';
                    
                    $transaction_type = 'DR';
                    
                    $shopkeeper = $dbObj->getShopkeeperProfileDetails(json_decode(json_encode($inputdata))); 
                    
                    $after_debited = $shopkeeper['data']['wallet'] - $amount;
                    if($after_debited < 0){
                        return NULL;
                    }
            
                    
                    $sql = 'UPDATE paytm_payout_history SET response_status = "'.$response_status.'", response_message = "'.$response_message.'" WHERE order_id = "'.$order_id.'"';
                    $result = mysqli_query($con, $sql);
                    
                    $sql1 = 'UPDATE wallet_history SET transaction_type = "'.$transaction_type.'", transaction_reason = "'.$response_message.'", status = 1 WHERE pay_order_id = "'.$order_id.'"';
                    $result1 = mysqli_query($con, $sql1);

                    $sql2 = 'UPDATE shopkeeper SET wallet = "'.$after_debited.'" WHERE id = "'.$user_id.'"';
                    $result2 = mysqli_query($con, $sql2);
                    
                    // Send Message to shopkeeper.
                    $message =  'Hi Mr. Shopkeeper your wallet Amt Rs. '.$amount.'has credited to your Bank Account successfully. By jalpans.com';
                    $phone = $shopkeeper['data']['phone'];
            
                    sendMobileMessage($phone, $message);
                   
                    // usleep(3000000);
                }
                else if($response_status == 'FAILURE'){
                    $sql = 'UPDATE paytm_payout_history SET response_status = "'.$response_status.'", response_message = "'.$response_message.'" WHERE order_id = "'.$order_id.'"';
                    $result = mysqli_query($con, $sql);
                    
                    $transaction_type = 'FAILED';
                    
                    $sql1 = 'UPDATE wallet_history SET transaction_type = "'.$transaction_type.'", transaction_reason = "'.$response_message.'", status = 1 WHERE pay_order_id = "'.$order_id.'"';
                    $result1 = mysqli_query($con, $sql1);
                }
            }
        }
        
       return "success";
    }
    
    public function paytmShopkeeperPayOutTransaction($order_id) {
    
        require_once("../../paytmPayout/PaytmChecksum.php");
        
        $paytmParams = array();
        
        $paytmParams["orderId"] = $order_id;
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
        
        /*
        * Generate checksum by parameters we have in body
        * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
        */
        $checksum = PaytmChecksum::generateSignature($post_data, "sGuXe_HzAh4sDMtj");
        
        $x_mid      = "jalpan98982103950355";
        $x_checksum = $checksum;
        
        /* for Staging */
        // $url = "https://staging-dashboard.paytm.com/bpay/api/v1/disburse/order/query";
        
        /* for Production */
        $url = "https://dashboard.paytm.com/bpay/api/v1/disburse/order/query";
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "x-mid: " . $x_mid, "x-checksum: " . $x_checksum)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $response = curl_exec($ch);
        
        return $response;
    }




    public function shopAgentProfileWalletByAdmin($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        $agent_code = $input->agent_code;

        $data['profile'] = [];
        $data['wallet'] = [];

        $sql = 'SELECT id, name, username, shop_agent_code, phone, phone2, address, wallet, status, creation_date FROM shop_agent WHERE shop_agent_code = "'.$agent_code.'" ORDER BY id DESC';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $data['profile'] = mysqli_fetch_assoc($result);

            $input->id = $data['profile']['id'];
            $data['wallet'] = $dbObj->getShopAgentWalletHistory($input);
        }
        return $data;     
    }

    // public function shopAgentProfileForPay($input) {

    //     $ret_array = array();
    //     $dbObj = new DbHandler();
    //     $con = $dbObj->getDbConnection($input);

    //     $id = $input->id;
        
    //     $sql = 'SELECT sa.name, sa.username, sa.shop_agent_code, sa.phone, saa.id, saa.user_id, saa.bank_name, saa.account_no, saa.ifsc_code, saa.branch,  saa.status FROM shop_agent sa INNER JOIN shop_agent_account saa ON sa.id= saa.user_id WHERE sa.id = "'.$id.'" AND saa.status = 1';
    //     $result = mysqli_query($con, $sql);
    //     $num_rows = mysqli_num_rows($result);
    //     if ($num_rows > 0) {
    //         $ret_array = mysqli_fetch_assoc($result);
    //     }
    //     return $ret_array;     
    // }



     public function shopAgentProfileForPay($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        $data['error'] = "error";
        $data['data'] = [];

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT sa.name, sa.username, sa.shop_agent_code, sa.phone, sa.wallet, saa.id, saa.user_id, saa.bank_name, saa.account_no, saa.ifsc_code, saa.branch,  saa.status FROM shop_agent sa INNER JOIN shop_agent_account saa ON sa.id= saa.user_id WHERE sa.id = "'.$id.'" AND saa.status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            
            $array = mysqli_fetch_assoc($result);  
            
            $data['error'] = "success";
            $data['data'] = $array; 

        }
        return $data;   
    }

    public function getAgentAccountDetails($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $account_id = $input->account_id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date FROM shop_agent_account WHERE id = "'.$account_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
           $array = mysqli_fetch_assoc($result);
           return $array;
        }
        return NULL;   
    }


    public function paytmAgentPayOut($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $order_id = $input->order_id;
        $user_id = $input->id;
        $account_id = $input->account_id;
        $account_number = $input->account_number;
        $ifsc_code = $input->ifsc_code;
        $amount = $input->amount;
        $response_status = $input->response_status;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO paytm_payout_history (order_id, user_type, user_id, account_id, acount_number, ifsc_code, amount, response_status, status, creation_date, modification_date)VALUES ("'.$order_id.'", 2, "'.$user_id.'", "'.$account_id.'", "'.$account_number.'", "'.$ifsc_code.'", "'.$amount.'", "'.$response_status.'", 1, "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);
        
        if($result){
            
            $shop_agent = $dbObj->shopAgentProfileForPay($input);
            $transaction_type = 'DR';
            $transaction_reason = 'wallet debited for amount payout';
            $after_debited = $shop_agent['data']['wallet'] - $amount;
    
            $transaction_id = 'JLPNSWLTS'.substr(time(), -6);
            $sql = 'INSERT INTO wallet_history (user_id, transaction_for, order_id, pay_order_id, commission, total_amount, transaction_id, transaction_type, transaction_reason, amount_before, amount, amount_after, creation_date) VALUES ("'.$user_id.'", 3, 0, "'.$order_id.'", 0, "'.$amount.'", "'.$transaction_id.'", "'.$transaction_type.'", "'.$transaction_reason.'", "'.$shop_agent['data']['wallet'].'", "'.$amount.'", "'.$after_debited.'", "'.$date.'" )';
            $result = mysqli_query($con, $sql);
    
            $sql1 = 'UPDATE shop_agent SET wallet = "'.$after_debited.'" WHERE id = "'.$user_id.'"';
            $result1 = mysqli_query($con, $sql1);
            
             return "success";
        }
        return NULL;
    }


    public function getAgentBankAccount($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date FROM shop_agent_account WHERE user_id = "'.$id.'" AND status >= 0';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }
        }
        return $ret_array;   
    }


     public function addAgentAccount($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $bank = $input->bank;
        $ac_no = $input->ac_no;
        $ifsc = $input->ifsc;
        $branch = $input->branch;
        $status = 0;


        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date FROM shop_agent_account WHERE user_id = "'.$id.'" AND status = 0';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            // $ret_array = mysqli_fetch_assoc($result);    
            return "pending";       
        }

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO shop_agent_account (user_id, bank_name, account_no, ifsc_code, branch, status, creation_date, modification_date )  VALUES ("'.$id.'", "'.$bank.'", "'.$ac_no.'", "'.$ifsc.'", "'.$branch.'", "'.$status.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);
        
        if($result){
            return "success";
        }
        return NULL;
    }



     public function getAgentBankAccountRequest($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $search = $input->search;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT sa.id, sa.user_id, sa.bank_name, sa.account_no, sa.ifsc_code, sa.branch, sa.status, sa.creation_date, sa.modification_date, s.username, s.name, s.shop_agent_code, s.phone, s.email FROM shop_agent_account sa  INNER JOIN shop_agent s ON sa.user_id = s.id  WHERE sa.status = 0';
        if(!empty($search)){
            $search = '%'.$search.'%';
            $sql = 'SELECT sa.id, sa.user_id, sa.bank_name, sa.account_no, sa.ifsc_code, sa.branch, sa.status, sa.creation_date, sa.modification_date, s.username, s.name, s.shop_agent_code, s.phone, s.email FROM shop_agent_account sa  INNER JOIN shop_agent s ON sa.user_id = s.id  WHERE (sa.bank_name LIKE "'.$search.'" || sa.account_no LIKE "'.$search.'" || sa.ifsc_code LIKE "'.$search.'" || sa.branch LIKE "'.$search.'" || s.name LIKE "'.$search.'" || s.shop_agent_code LIKE "'.$search.'" || s.phone LIKE "'.$search.'" || s.email LIKE "'.$search.'") AND sa.status = 0';
        
        }
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while($array = mysqli_fetch_assoc($result)){
                array_push($ret_array, $array);
            }           
        }
        return $ret_array;   
    }



    public function agentBankAccountAction($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $id = $input->id;
        $action = $input->action;
        $action_id = $input->action_id;

        if($action == 1){

            $sql = 'UPDATE shop_agent_account SET status = -1, modification_date = "'.$date.'" WHERE user_id = "'.$id.'"';
            $result = mysqli_query($con, $sql);
        }

        mysqli_set_charset($con,'utf8mb4'); 
        $sql = 'UPDATE shop_agent_account SET status = "'.$action.'", modification_date = "'.$date.'" WHERE id = "'.$action_id.'"';
        $result = mysqli_query($con, $sql);
        
        return "success";
    }

    public function manageOrderData($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $order_id = $input->order_id;
        $order_type = $input->order_type;
        $phone = $input->phone;

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO manage_order_data (order_id, order_type, phone, creation_date)VALUES ("'.$order_id.'", "'.$order_type.'", "'.$phone.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);
        
        if($result){
            return "success";
        }
        return NULL;
    }
    
    public function getOrderData($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $order_id = $input->order_id;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT id, order_id, order_type, phone, creation_date FROM manage_order_data  WHERE order_id = "'.$order_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $ret_array = mysqli_fetch_assoc($result);          
        }
        return $ret_array;   
    }
    
    public function addWebsiteVisitors($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $visitor = $input->visitor;
        $visitor_user = $input->visitor_user;
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO visitors (user_id, visiters_id, creation_date)VALUES ("'.$visitor_user.'", "'.$visitor.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);
        
        if($result){
            return "success";
        }
        return NULL;
    }
    
    public function getWebsiteVisitors($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT distinct count(visiters_id) as website_visitors FROM visitors WHERE 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $ret_array = mysqli_fetch_assoc($result);          
        }
        return $ret_array;   
    }
    
    
    public function addSocialMedia($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $whatsapp = $input->whatsapp;
        $facebook = $input->facebook;
        $twitter = $input->twitter;
        $linkedin = $input->linkedin;
        $instagram = $input->instagram;
        $youtube = $input->youtube;
     
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE social_media SET whatsapp = "'.$whatsapp.'", facebook = "'.$facebook.'", twitter = "'.$twitter.'", linkedin = "'.$linkedin.'", instagram = "'.$instagram.'", youtube = "'.$youtube.'",  modification_date ="'.$date.'"  WHERE id = 1';
        $result = mysqli_query($con, $sql);
        
        if($result){
            return "success";
        }
        return NULL;
    }
    
    
    public function getSocialMedia($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        mysqli_set_charset($con,'utf8mb4');
        $sql = 'SELECT *FROM social_media WHERE 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $ret_array = mysqli_fetch_assoc($result);          
        }
        return $ret_array;   
    }
    
    
    public function paytmShopkeeperPayOutTransactionOrderTest($input) {
    
        require_once("../../paytmPayout/PaytmChecksum.php");
        
        $paytmParams = array();
        
        $paytmParams["orderId"] = $input->order_id;
        $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
        
        /*
        * Generate checksum by parameters we have in body
        * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
        */
        $checksum = PaytmChecksum::generateSignature($post_data, "sGuXe_HzAh4sDMtj");
        
        $x_mid      = "jalpan98982103950355";
        $x_checksum = $checksum;
        
        /* for Staging */
        // $url = "https://staging-dashboard.paytm.com/bpay/api/v1/disburse/order/query";
        
        /* for Production */
        $url = "https://dashboard.paytm.com/bpay/api/v1/disburse/order/query";
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "x-mid: " . $x_mid, "x-checksum: " . $x_checksum)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $response = curl_exec($ch);
        
        return $response;
    }



    public function refundOrder($input) {

        $ret_array = array();
        $dbObj = new DbHandler();
        $con = $dbObj->getDbConnection($input);

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');


        $signature = $input->signature;
        $response_timestamp = $input->response_timestamp;
        $order_id = $input->order_id;
        $refund_order_id = $input->refund_order_id;
        $ref_id = $input->ref_id;
        $txn_timestamp = $input->txn_timestamp;
        $order_txn_id = $input->order_txn_id;
        $refund_txn_id = $input->refund_txn_id;
        $refund_amount = $input->refund_amount;
        $refund_status = $input->refund_status;
        $refund_code = $input->refund_code;
        $refund_message = $input->refund_message;
        $refund_id = $input->refund_id;

        $status = 1;


        $sql = 'SELECT id, refund_status FROM order_refund WHERE order_id = "'.$order_id.'" AND status = 1';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            
            $r_array = mysqli_fetch_assoc($result);
            if($r_array['refund_status'] == 'TXN_FAILURE'){
                mysqli_set_charset($con,'utf8mb4');
                $sql = 'UPDATE refund_status SET status = 0 WHERE id = "'.$r_array['id'].'"';
                $result = mysqli_query($con, $sql);
                
                mysqli_set_charset($con,'utf8mb4');
                $sql = 'INSERT INTO order_refund(order_id, refund_order_id, ref_id, signature, response_timestamp, txn_timestamp, order_txn_id, refund_txn_id, refund_status, refund_code, refund_message, refund_id, refund_amount, status, creation_date, modification_date)VALUES ("'.$order_id.'", "'.$refund_order_id.'", "'.$ref_id.'", "'.$signature.'", "'.$response_timestamp.'", "'.$txn_timestamp.'", "'.$order_txn_id.'", "'.$refund_txn_id.'", "'.$refund_status.'", "'.$refund_code.'", "'.$refund_message.'", "'.$refund_id.'", "'.$refund_amount.'", "'.$status.'", "'.$date.'", "'.$date.'")';
                $result = mysqli_query($con, $sql);
        
        
                mysqli_set_charset($con,'utf8mb4');
                $sql = 'UPDATE orders SET refund_order_id = "'.$refund_order_id.'", refund = "'.$status.'", refund_date = "'.$date.'", refund_amount = "'.$refund_amount.'", refund_status = "'.$refund_status.'", refund_message = "'.$refund_message.'",  modification_date ="'.$date.'"  WHERE order_id = "'.$order_id.'"';
                $result = mysqli_query($con, $sql);
    
                if($result){
                    return "success";
                }
                return NULL;
                
            }
            return $refund_message;
        }

        mysqli_set_charset($con,'utf8mb4');
        $sql = 'INSERT INTO order_refund(order_id, refund_order_id, ref_id, signature, response_timestamp, txn_timestamp, order_txn_id, refund_txn_id, refund_status, refund_code, refund_message, refund_id, refund_amount, status, creation_date, modification_date)VALUES ("'.$order_id.'", "'.$refund_order_id.'", "'.$ref_id.'", "'.$signature.'", "'.$response_timestamp.'", "'.$txn_timestamp.'", "'.$order_txn_id.'", "'.$refund_txn_id.'", "'.$refund_status.'", "'.$refund_code.'", "'.$refund_message.'", "'.$refund_id.'", "'.$refund_amount.'", "'.$status.'", "'.$date.'", "'.$date.'")';
        $result = mysqli_query($con, $sql);


        mysqli_set_charset($con,'utf8mb4');
        $sql = 'UPDATE orders SET refund_order_id = "'.$refund_order_id.'", refund = "'.$status.'", refund_date = "'.$date.'", refund_amount = "'.$refund_amount.'", refund_status = "'.$refund_status.'", refund_message = "'.$refund_message.'",  modification_date ="'.$date.'"  WHERE order_id = "'.$order_id.'"';
        $result = mysqli_query($con, $sql);
        
        
        $sql = 'SELECT phone FROM orders WHERE order_id = "'.$order_id.'"';
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            $row = mysqli_fetch_assoc($result);

            $phone = $row['phone'];
            $message = 'Hi Customer. Your Refund Raised against your cancelled order ID '.$order_id.'and Amt Rs. '.$refund_amount.' will be credited within 7 working days. By jalpans.com';
            sendMobileMessage($phone, $message);
        }
        
        // 
        if($result){
            return "success";
        }
        return NULL;
    }



    



  










 



}

?>