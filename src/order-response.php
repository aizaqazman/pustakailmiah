<?php
// echo "<h1>Order Response Page</h1>";
// if(isset($_COOKIE['orders_list'])) {
//   echo "Order List(from local cookie):<br>";
//   $cookie_data = stripslashes($_COOKIE['orders_list']);
//   $order_data = json_decode($cookie_data, true);
//   if(!empty($order_data)) {
//     foreach($order_data as $keys => $values){
//       echo "Order ID: ".$values['order_id']."<br>";
//     }
//   } else {
//     echo "no order";
//   }
// }
// else {
//   echo "no cookie order";
// }
echo '<pre>';
echo 'GET Data';
print_r($_GET);
echo 'POST Data';
print_r($_POST);
echo '</pre>';
?>