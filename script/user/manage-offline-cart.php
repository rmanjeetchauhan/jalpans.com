<?php

$product_id = $_POST['productid'];
$product_name = $_POST['productname'];
$product_image = $_POST['productimage'];
$cart_products = $_POST['cart_products'];
$rate = $_POST['productrate'];
$shop_id = $_POST['shopid'];
$total = $_POST['subtotal']; 

$cart_data = array();
$saveCart = array();

if(isset($_COOKIE["jalpansCart"])){
	// $cookie_data = stripslashes($_COOKIE['jalpansCart']);
  	// $cart_data = json_decode(unserialize($_COOKIE["jalpansCart"]), true);
  	$saveCart  = unserialize($_COOKIE["jalpansCart"]);
  	array_push($cart_data, $saveCart);
}

$item_array = array(
	"api_key" => $api_key,
	'id'   => $product_id,
	'name'   => $product_name,
	'image'  => $product_image,
	'quantity'  => $cart_products,
	'rate'  => $rate,
	'total'  => $total,
	'shop'  => $shop_id
);
 
array_push($cart_data, $item_array);

echo $item_data = serialize($cart_data);

 
// $item_data = json_encode($cart_data);
if(setcookie('jalpansCart', $item_data, time() + (86400 * 30))){
 // header("location:index.php?success=1");
	echo "success";
	exit();
}
 
echo "error";

?>