<?php
require 'dbconn.php';
require_once 'toyyibpay_key.php';
session_start();

$order_id = $_SESSION['order_id'];
$stmt = $conn -> prepare('SELECT t.`billRef_no`, b.`first_name`, b.`last_name`, b.`email`, b.`phone_number`, o.`order_final_amount` FROM orders o, buyers b, transactions t WHERE o.`order_id` = ? AND b.`buyer_id` = o.`buyer_id` AND t.`billRef_no` = o.`billRef_no`');
$stmt -> bind_param('s', $order_id);
$stmt -> execute();
$result = $stmt -> get_result();
$stmt -> close();
$row = $result -> fetch_assoc();

// api request data
$post_data = array(
    'userSecretKey'           => $secret_key,
    'categoryCode'            => $category_code,
    'billName'                => 'PustakaIlmiah Order Payment',
    'billDescription'         => 'Order ID: '.$order_id,
    'billPriceSetting'        => 1,
    'billPayorInfo'           => 1,
    'billAmount'              => $row['order_final_amount'] * 100,
    'billReturnUrl'           => 'http://bizapp.my',
    'billCallbackUrl'         => 'http://bizapp.my/paystatus',
    'billExternalReferenceNo' => $order_id,
    'billTo'                  => $row['first_name']." ".$row['last_name'],
    'billEmail'               => $row['email'],
    'billPhone'               => $row['phone_number'],
    'billSplitPayment'        => 0,
    'billSplitPaymentArgs'    => '',
    'billPaymentChannel'      => '0',
    'billContentEmail'        => 'Thank you for purchasing our product!',
    'billChargeToCustomer'    => 1
);

// php curl to post data to payment gateway
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);
$result = json_decode($result, true);

// echo '<pre>';
// print_r($result);
// echo '</pre>';
// exit;

$post_data['billCode'] = $result[0]['BillCode'];
$post_data['paymentURL'] = 'https://toyyibpay.com/' . $result[0]['BillCode'];

header('Location: ' . $post_data['paymentURL']);

?>