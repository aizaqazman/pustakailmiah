<?php
require 'dbconn.php';
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur'); // set the date and timezone to 'Kuala Lumpur' region

if(isset($_GET['action'])) {
  $action = $_GET['action'];
} else {
  header("Location: 403.html");
  die();
  exit();
}

if($action == 'buyerForm') {
  // insert data into buyers
  $buyer_id = mysqli_real_escape_string($conn, "B".date("Ymdhis"));
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
  $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $address1 = mysqli_real_escape_string($conn, $_POST['address1']);
  $address2 = mysqli_real_escape_string($conn, $_POST['address2']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $zip = mysqli_real_escape_string($conn, $_POST['zip']);
  $order_notes = mysqli_real_escape_string($conn, $_POST['order_notes']);
  $agree_terms_conditions = mysqli_real_escape_string($conn, $_POST['agree_terms_conditions']);

  $stmt = $conn -> prepare('INSERT INTO `buyers` VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
  $stmt -> bind_param(
    'sssssssssssss', 
    $buyer_id, 
    $first_name, 
    $last_name,
    $company_name,
    $phone_number,
    $email,
    $address1,
    $address2,
    $city,
    $state,
    $zip,
    $order_notes,
    $agree_terms_conditions
  );
  $stmt -> execute();
  $result = $stmt;
  $stmt -> close();
  
  if($result) {
    echo "1";
    $_SESSION['buyer_id'] = $buyer_id;
  }
  else {
    echo "2";
  }

  exit();
} 
else if($action == 'orderForm') {
  if(isset($_SESSION['buyer_id'])){
    // create transaction bill details
    $billRef_no = mysqli_real_escape_string($conn, "T".uniqid().date("Ymdhis"));
    $amount = mysqli_real_escape_string($conn, $_POST['order_final_amount']);
    $transaction_timestamp = "";

    $stmt = $conn -> prepare('INSERT INTO `transactions`(`billRef_no`, `amount`, `transaction_timestamp`) VALUES(?, ?, ?)');
    $stmt -> bind_param(
      'sds', 
      $billRef_no,
      $amount,
      $transaction_timestamp
    );
    $result_transaction_query = $stmt -> execute();
    $stmt -> close();

    // insert data into orders
    $order_id = mysqli_real_escape_string($conn, date("Ymdhis").uniqid());
    $buyer_id = mysqli_real_escape_string($conn, $_SESSION['buyer_id']);
    $cart_total_price = mysqli_real_escape_string($conn, $_POST['cart_total_price']);
    $shipping_fee = mysqli_real_escape_string($conn, $_POST['shipping_fee']);
    $order_final_amount = mysqli_real_escape_string($conn, $_POST['order_final_amount']);

    $stmt = $conn -> prepare('INSERT INTO `orders`(`order_id`, `buyer_id`, `billRef_no`, `cart_total_price`, `shipping_fee`, `order_final_amount`) VALUES(?, ?, ?, ?, ?, ?)');
    $stmt -> bind_param(
      'sssddd', 
      $order_id,
      $buyer_id,
      $billRef_no,
      $cart_total_price,
      $shipping_fee,
      $order_final_amount
    );
    $result_order_query = $stmt -> execute();
    $stmt -> close();

    // insert data into order_items
    for ($i = 0; $i < count($_POST['id']); $i++) {
      $id = mysqli_real_escape_string($conn, $_POST['id'][$i]);
      $qty = mysqli_real_escape_string($conn, $_POST['qty'][$i]);
      $subtotal = mysqli_real_escape_string($conn, $_POST['subtotal'][$i]);
  
      $stmt = $conn -> prepare('INSERT INTO `order_items`(`order_id`, `item_id`, `quantity`, `subtotal_price`) VALUES(?, ?, ?, ?)');
      $stmt -> bind_param(
        'ssdd',
        $order_id,
        $id,
        $qty,
        $subtotal
      );
      $result_order_items_query = $stmt -> execute();
      $stmt -> close();
    }

    if($result_transaction_query && $result_order_query && $result_order_items_query) {

      unset($_SESSION['buyer_id']);
      $_SESSION['order_id'] = $order_id;
      $success = false;

      // add order_id to orders_list cookie
      if(isset($_COOKIE['orders_list'])) {
        $cookie_data = stripslashes($_COOKIE['orders_list']);
        $order_data = json_decode($cookie_data, true);
      } else {
        $order_data = array();
      }

      $item_array = array(
        'order_id' => $order_id
      );
      $order_data[] = $item_array;

      $item_data = json_encode($order_data);
      $success = setcookie('orders_list', $item_data, time() + (86400 * 30));

      if($success) {
        echo "order successfully created";
        header("Location: payment-gateway-request.php");
        die();
      } 
      else {
        echo "failed to create order";
      }
    } 
    else {
      echo "failed to create order";
    }
  } 
  else {
    header("Location: 403.html");
    die();
    exit();
  }
}
else {
  header("Location: 403.html");
  die();
  exit();
}


?>